<?php
include("connection.php");

// Handle adding or updating a document
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['add_document'])) {
        $student_id = $_POST['student_id'];
        $document_name = $_POST['document_name'];
        $document_path = 'files/' . $_FILES['document_file']['name'];
        
        // Move uploaded document
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
    } elseif (isset($_POST['update_image'])) {
        $doc_id = $_POST['doc_id'];
        $image_path = 'uploads/' . $_FILES['image_file']['name'];
        
        // Move uploaded image
        if (move_uploaded_file($_FILES['image_file']['tmp_name'], $image_path)) {
            $update_query = "UPDATE studentdocuments SET image_path = ? WHERE id = ?";
            $stmt = $conn->prepare($update_query);
            $stmt->bind_param('si', $image_path, $doc_id);
            $stmt->execute();
            echo "Image updated successfully!";
        } else {
            echo "Failed to upload image.";
        }
        exit();
    }
}

// Handle delete document
if (isset($_POST['delete_document'])) {
    $doc_id = $_POST['doc_id'];
    $select_query = "SELECT document_path, image_path FROM studentdocuments WHERE id = ?";
    $stmt = $conn->prepare($select_query);
    $stmt->bind_param('i', $doc_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $document = $result->fetch_assoc();

    // Delete files
    if (file_exists($document['document_path'])) {
        unlink($document['document_path']);
    }
    if (file_exists($document['image_path'])) {
        unlink($document['image_path']);
    }

    $delete_query = "DELETE FROM studentdocuments WHERE id = ?";
    $stmt = $conn->prepare($delete_query);
    $stmt->bind_param('i', $doc_id);
    $stmt->execute();
    exit();
}

// Fetch students with documents
$query = "SELECT s.id AS student_id, s.name, s.email, d.id AS document_id, d.document_name, d.document_path, d.image_path
          FROM student s
          LEFT JOIN studentdocuments d ON s.id = d.student_id";
$result = $conn->query($query);

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

    <?php foreach ($students as $studentId => $studentData): ?>
        <div class="card my-3">
            <div class="card-header">
                <h5><?php echo $studentData['info']['name']; ?></h5>
                <p><?php echo $studentData['info']['email']; ?></p>
            </div>
            <div class="card-body">
                <h5>Documents:</h5>
                <?php if (!empty($studentData['documents'])): ?>
                    <ul class="list-group">
                        <?php foreach ($studentData['documents'] as $document): ?>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <a href="<?php echo $document['document_path']; ?>" target="_blank">
                                    <?php echo $document['document_name']; ?>
                                </a>
                                <div>
                                    <?php if ($document['image_path']): ?>
                                        <img src="<?php echo $document['image_path']; ?>" alt="Document Image" class="img-thumbnail" style="width: 100px;">
                                    <?php endif; ?>
                                    <button class="btn btn-warning btn-sm" onclick="updateImage(<?php echo $document['document_id']; ?>)">Update Image</button>
                                    <button class="btn btn-danger btn-sm" onclick="deleteDocument(<?php echo $document['document_id']; ?>)">Delete</button>
                                </div>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php else: ?>
                    <p>No documents uploaded for this student.</p>
                <?php endif; ?>
                <button class="btn btn-success btn-sm" onclick="addDocument(<?php echo $studentId; ?>)">Add Document</button>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<!-- Add Document Modal -->
<div id="addDocumentModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="addDocumentForm" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5>Add Document</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="student_id" id="studentId">
                    <input type="text" name="document_name" class="form-control mb-3" placeholder="Document Name" required>
                    <input type="file" name="document_file" class="form-control" required>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Update Image Modal -->
<div id="updateImageModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="updateImageForm" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5>Update Image</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="doc_id" id="docId">
                    <input type="file" name="image_file" class="form-control" required>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
function addDocument(studentId) {
    document.getElementById('studentId').value = studentId;
    $('#addDocumentModal').modal('show');
}

$('#addDocumentForm').submit(function (e) {
    e.preventDefault();
    let formData = new FormData(this);
    formData.append('add_document', true);
    $.ajax({
        url: 'student_data.php',
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function () {
            location.reload();
        }
    });
});

function updateImage(docId) {
    document.getElementById('docId').value = docId;
    $('#updateImageModal').modal('show');
}

$('#updateImageForm').submit(function (e) {
    e.preventDefault();
    let formData = new FormData(this);
    formData.append('update_image', true);
    $.ajax({
        url: 'student_data.php',
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function () {
            location.reload();
        }
    });
});

function deleteDocument(docId) {
    if (confirm('Are you sure?')) {
        $.post('', { delete_document: true, doc_id: docId }, function () {
            location.reload();
        });
    }
}
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
