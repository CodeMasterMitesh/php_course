<?php
include("connection.php");

// Function to handle updates
function updateData($mainTable, $mainData, $whereClause, $fileData = [])
{
    global $conn;

    // Prepare the main data for updating
    $updatePairs = [];
    foreach ($mainData as $column => $value) {
        $escapedValue = $conn->real_escape_string($value);
        $updatePairs[] = "$column = '$escapedValue'";
    }

    $updateSQL = "UPDATE $mainTable SET " . implode(", ", $updatePairs) . " WHERE $whereClause";
    if (!$conn->query($updateSQL)) {
        return ["success" => false, "error" => $conn->error];
    }

    // Update file data if provided
    if (!empty($fileData)) {
        foreach ($fileData as $fileItem) {
            $fileTable = $fileItem['table'];
            $columns = $fileItem['columns'];
            $columnsString = implode(", ", $columns);

            foreach ($fileItem['files'] as $key => $file) {
                $fileName = basename($file['name']);
                $fileTmpPath = $file['tmp_name'];
                $uploadDir = "files/";
                $uploadPath = $uploadDir . $fileName;

                // Ensure the file is uploaded
                if (move_uploaded_file($fileTmpPath, $uploadPath)) {
                    $fileValues = [
                        "'$whereClause'", // Reference to the main table ID
                        "'$fileName'",
                        "'$uploadPath'"
                    ];

                    // Update file table record or insert if not exists
                    $fileSQL = "INSERT INTO $fileTable ($columnsString) VALUES (" . implode(", ", $fileValues) . ") 
                                ON DUPLICATE KEY UPDATE file_name = '$fileName', file_path = '$uploadPath'";
                    if (!$conn->query($fileSQL)) {
                        return ["success" => false, "error" => $conn->error];
                    }
                } else {
                    return ["success" => false, "error" => "Failed to upload file: $fileName"];
                }
            }
        }
    }

    return ["success" => true];
}

// Handling POST request
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $mainTable = $_POST['mainTable'] ?? null;
    $mainData = $_POST['mainData'] ?? [];
    $whereClause = $_POST['whereClause'] ?? null;
    $fileData = json_decode($_POST['fileData'] ?? '[]', true);

    // Merge uploaded files into $fileData
    if (!empty($_FILES['files'])) {
        foreach ($_FILES['files']['name'] as $key => $name) {
            $fileData[0]['files'][] = [
                'name' => $_FILES['files']['name'][$key],
                'tmp_name' => $_FILES['files']['tmp_name'][$key]
            ];
        }
    }

    if ($mainTable && !empty($mainData) && $whereClause) {
        $response = updateData($mainTable, $mainData, $whereClause, $fileData);
        if ($response['success']) {
            echo "<script>
                alert('Data updated successfully!');
                window.location.href = 'index.php';
            </script>";
            exit; // Stop further PHP execution
        } else {
            echo "Error: " . $response['error'];
        }
    } else {
        echo "Invalid data, table name, or where clause!";
    }
}

$conn->close();
?>