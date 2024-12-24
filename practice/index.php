<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Form</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>
<body>
    <div class="container mt-5">
        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                <h4 class="text-center mb-0">Student Registration Form</h4>
            </div>
            <div class="card-body">
                <form action="insertdb.php" method="post" enctype="multipart/form-data">
                    <!-- Student Information -->
                    <input type="hidden" name="mainTable" value="student">
                    <h5 class="mb-4">Student Information</h5>
                    <div class="mb-3">
                        <label for="name" class="form-label">Name:</label>
                        <input type="text" name="mainData[name]" value="" id="name" class="form-control" placeholder="Enter student name" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email:</label>
                        <input type="email" name="mainData[email]" value="" id="email" class="form-control" placeholder="Enter student email" required>
                    </div>

                    <!-- Student Documents -->
                    <h5 class="mt-4 mb-3">Student Documents</h5>
                    <div id="documents">
                        <div class="row align-items-center mb-3 document-item">
                            <div class="col">
                            <input type="hidden" name="fileData" value='[{
                                "table": "studentdocuments",
                                "columns": ["student_id", "document_name", "document_path"]
                            }]'>
                                <input type="file" name="files[]" value="" class="form-control" required multiple>
                            </div>
                            <div class="col-auto">
                                <button type="button" class="btn btn-danger remove-document d-none">Remove</button>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-secondary mb-4" id="addMore">Add More Documents</button>

                    <!-- Submit Button -->
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary w-100">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- jQuery Script -->
    <script>
        $(document).ready(function () {
            // Add more document fields
            $('#addMore').click(function () {
                const documentField = `
                    <div class="row align-items-center mb-3 document-item">
                        <div class="col">
                            <input type="file" name="files[]" class="form-control" required multiple>
                        </div>
                        <div class="col-auto">
                            <button type="button" class="btn btn-danger remove-document">Remove</button>
                        </div>
                    </div>`;
                $('#documents').append(documentField);
            });

            // Remove document fields
            $(document).on('click', '.remove-document', function () {
                $(this).closest('.document-item').remove();
            });
        });
    </script>
</body>
</html>