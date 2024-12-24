<?php
include("connection.php");

// Handle adding a new document
if (isset($_POST['add_document'])) {
    $student_id = $_POST['student_id'];
    $document_name = $_POST['document_name'];
    $document_path = 'uploads/' . $_FILES['document_file']['name'];

    // Move the uploaded document to the server directory
    if (move_uploaded_file($_FILES['document_file']['tmp_name'], $document_path)) {
        $insert_query = "INSERT INTO studentdocuments (student_id, document_name, document_path) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($insert_query);
        $stmt->bind_param('iss', $student_id, $document_name, $document_path);
        $stmt->execute();
        echo "Document added successfully!";
    } else {
        echo "Failed to upload document.";
    }
    exit();
}

// Handle delete document
if (isset($_POST['delete_document'])) {
    $doc_id = $_POST['doc_id'];

    // Fetch document path and image path to delete files
    $select_query = "SELECT document_path, image_path FROM studentdocuments WHERE id = ?";
    $stmt = $conn->prepare($select_query);
    $stmt->bind_param('i', $doc_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $document = $result->fetch_assoc();

    // Delete the document file and image if exists
    if (file_exists($document['document_path'])) {
        unlink($document['document_path']);
    }
    if (file_exists($document['image_path'])) {
        unlink($document['image_path']);
    }

    // Delete document record from database
    $delete_query = "DELETE FROM studentdocuments WHERE id = ?";
    $stmt = $conn->prepare($delete_query);
    $stmt->bind_param('i', $doc_id);
    $stmt->execute();
    exit(); // Stop further execution after delete
}

// Fetch students along with their documents
$query = "SELECT s.id AS student_id, s.name, s.email, d.id AS document_id, d.document_name, d.document_path, d.image_path
          FROM student s
          LEFT JOIN studentdocuments d ON s.id = d.student_id";
$result = $conn->query($query);

// Group documents by student ID
$students = [];
while ($row = $result->fetch_assoc()) {
    $students[$row['student_id']]['info'] = [
        'name' => $row['name'],
        'email' => $row['email'],
    ];

    if ($row['document_id']) {
        $students[$row['student_id']]['documents'][] = [
            'document_id' => $row['document_id'],
            'document_name' => $row['document_name'],
            'document_path' => $row['document_path'],
            'image_path' => $row['image_path']
        ];
    } else {
        $students[$row['student_id']]['documents'] = [];
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Documents</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>
<body>
<div class="container my-4">
    <h2>Student Documents</h2>

    <!-- Iterate over each student -->
    <?php foreach ($students as $studentId => $studentData): ?>
        <div class="card my-3">
            <div class="card-header">
                <h5 class="card-title"><?php echo $studentData['info']['name']; ?></h5>
                <p class="card-text"><?php echo $studentData['info']['email']; ?></p>
            </div>
            <div class="card-body">
                <h5>Documents:</h5>

                <!-- Display Documents -->
                <?php if (!empty($studentData['documents'])): ?>
                    <ul class="list-group">
                        <?php foreach ($studentData['documents'] as $document): ?>
                            <li class="list-group-item">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <a href="<?php echo $document['document_path']; ?>" target="_blank">
                                            <?php echo $document['document_name']; ?>
                                        </a>
                                    </div>
                                    <div>
                                        <!-- Edit Button -->
                                        <button class="btn btn-sm btn-warning" onclick="editDocument(<?php echo $document['document_id']; ?>)">Edit</button>
                                        
                                        <!-- Delete Button -->
                                        <button class="btn btn-sm btn-danger" onclick="deleteDocument(<?php echo $document['document_id']; ?>)">Delete</button>

                                        <!-- Show Image -->
                                        <?php if ($document['image_path']): ?>
                                            <img src="<?php echo $document['image_path']; ?>" alt="Document Image" class="img-thumbnail" style="width: 100px; height: auto;">
                                        <?php else: ?>
                                            <p>No image uploaded</p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php else: ?>
                    <p>No documents uploaded for this student.</p>
                <?php endif; ?>

                <!-- Add Document Button -->
                <button class="btn btn-sm btn-success" onclick="addDocument(<?php echo $studentId; ?>)">Add Document</button>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<!-- Modal for Adding Document -->
<div class="modal fade" id="addDocumentModal" tabindex="-1" aria-labelledby="addDocumentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addDocumentModalLabel">Add Document</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addDocumentForm" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="documentName" class="form-label">Document Name</label>
                        <input type="text" class="form-control" id="documentName" name="document_name" required>
                    </div>
                    <div class="mb-3">
                        <label for="documentFile" class="form-label">Select Document</label>
                        <input type="file" class="form-control" id="documentFile" name="document_file" required>
                    </div>
                    <input type="hidden" id="studentId" name="student_id">
                    <button type="submit" class="btn btn-primary">Add Document</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Include Bootstrap JS and dependencies -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

<script>
// Add Document
function addDocument(studentId) {
    document.getElementById('studentId').value = studentId;
    $('#addDocumentModal').modal('show');
}

// Handle Document Addition
$('#addDocumentForm').submit(function(e) {
    e.preventDefault();
    var formData = new FormData(this);
    $.ajax({
        url: 'student_data.php',
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        success: function(response) {
            // alert(response);
            location.reload(); // Refresh page to show the added document
        }
    });
});

// Delete Document
function deleteDocument(docId) {
    if (confirm('Are you sure you want to delete this document?')) {
        $.post('student_data.php', { delete_document: true, doc_id: docId }, function(response) {
            location.reload(); // Refresh page after deleting
        });
    }
}
</script>

</body>
</html>