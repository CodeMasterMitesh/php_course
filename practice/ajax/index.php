<?php include("header.php"); ?>
<style>
    #error-message{
        display:none;
        font-size:25px;
        padding:10px;
        margin:10px;
        background-color:#f8d7da;
        color:#721c24;
        position: absolute;
        border-radius:.25rem;
        border:1px solid #f5c6cb;
        top:80%;
        left:35%;
        /* transform:translate(-50%,-50%); */
    }
    #success-message{
        font-size:25px;
        padding:10px;
        margin:10px;
        background-color:#d4edda;
        color:#155724;
        position: absolute;
        border-radius:.25rem;
        border:1px solid #c3e6cb;
        top:80%;
        left:35%;
        display:none;
    }
</style>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary bg-gradient">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Student Management</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="index.php">Student Details</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Admin_Panel.php">Admin Panel</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Content -->
    <div class="container-fluid mt-5">
        <a href="addStudent.php" class="btn btn-primary">Add Data</a>
        <h2 class="text-center">Student Records</h2>

        <!-- Search Input -->
        <div class="mb-3">
            <input type="text" id="searchInput" class="form-control" placeholder="Search by any field...">
        </div>

        <!-- Table -->
        <div class="table-responsive">
            <table class="table table-striped table-bordered text-center" id="dataTable">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Age</th>
                        <th>Date of Birth</th>
                        <th>Gender</th>
                        <th>Phone</th>
                        <th>City</th>
                        <th>Percentage</th>
                        <th>Course</th>
                        <th>View/Update Student</th>
                        <th>Delete Student</th>
                    </tr>
                </thead>
                <tbody id="studentData"></tbody>
            </table>
        </div>
    </div>
    <div id="error-message"></div>
    <div id="success-message"></div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <!-- JavaScript for Search -->
    <script>
        $(document).ready(function(){
            function loadData(){
                $.ajax({
                    url:"getStudentData.php",
                    type : "POST",
                    success: function(data){
                        // console.log(data);
                        $("#studentData").html(data);
                    }
                }); 
            }
            loadData();
            
            $(document).on("click",".delete-button",function(){
                if(confirm("Do you Really want to delete this record?")){
                    var studentId = $(this).data("id");
                    var element = this;
                    // alert(studentId);
                    $.ajax({
                        url:"deleteStudent.php",
                        type : "POST",
                        data : {id : studentId},
                        success: function(response){
                            if (response == 1) {
                                $(element).closest("tr").fadeOut();
                                // $("#success-message").html("Data Deleted successfully.").slideDown();
                                // loadData();
                                // setTimeout(function () {
                                //     $("#success-message").slideUp();
                                // }, 2000); // 1000 milliseconds = 1 second
                                // $("#error-message").slideUp();
                            } else {
                                $("#error-message").html("Error: " + response).slideDown();
                                setTimeout(function () {
                                    $("#error-message").slideUp();
                                }, 2000); // Show error message for 3 seconds
                            }
                        }
                    });
                }
            });
        });
    </script>
</body>
</html>