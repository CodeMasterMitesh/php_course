<?php
include("connection.php");

// Function to handle insertion
function insertData($mainTable, $mainData, $fileData = []) {
    global $conn;

    // Insert data into the main table
    $columns = implode(", ", array_keys($mainData));
    $values = implode(", ", array_map(function ($value) {
        global $conn;
        return "'" . $conn->real_escape_string($value) . "'";
    }, array_values($mainData)));

    $sql = "INSERT INTO $mainTable ($columns) VALUES ($values)";
    if (!$conn->query($sql)) {
        return ["success" => false, "error" => $conn->error];
    }

    $lastInsertedId = $conn->insert_id;

    // Insert files into the file table if provided
    if (!empty($fileData)) {
        foreach ($fileData as $fileItem) {
            $fileTable = $fileItem['table'];
            $columns = implode(", ", $fileItem['columns']);
            $valuesArray = [];

            foreach ($fileItem['files'] as $key => $file) {
                $fileName = basename($file['name']);
                $fileTmpPath = $file['tmp_name'];
                $uploadDir = "files/";
                $uploadPath = $uploadDir . $fileName;

                // Ensure the file is uploaded
                if (move_uploaded_file($fileTmpPath, $uploadPath)) {
                    $fileValues = [
                        "'$lastInsertedId'", // Reference to the main table ID
                        "'$fileName'",
                        "'$uploadPath'"
                    ];

                    $valuesArray[] = "(" . implode(", ", $fileValues) . ")";
                } else {
                    return ["success" => false, "error" => "Failed to upload file: $fileName"];
                }
            }

            // Insert all files into the file table
            if (!empty($valuesArray)) {
                $values = implode(", ", $valuesArray);
                $fileSql = "INSERT INTO $fileTable ($columns) VALUES $values";
                if (!$conn->query($fileSql)) {
                    return ["success" => false, "error" => $conn->error];
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

    if ($mainTable && !empty($mainData)) {
        $response = insertData($mainTable, $mainData, $fileData);
        if ($response['success']) {
                echo "<script>
                alert('Data inserted successfully!');
                window.location.href = 'index.php';
            </script>";
            exit; // Stop further PHP execution
        } else {
            echo "Error: " . $response['error'];
        }
    } else {
        echo "Invalid data or table name!";
    }
}

$conn->close();
?>