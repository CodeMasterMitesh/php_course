<?php 
include("header.php"); 
include("nav.php"); 
include("addStudentModal.php");
include("editStudentModal.php");
?>
<!-- Content -->
<div class="container-fluid mt-5">
    <a class="btn btn-primary addBtn">Add Student</a>
    <h2 class="text-center">Students Records</h2>

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
        // load student data
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
        // show modal
        $(".addBtn").on("click",function(){
            $("#addStudentModal").show();
        });

        // hide modal
        $("#close-btn").on("click",function(){
            $("#addStudentModal").hide();
        });

        // add student data
        $("#addStudent").on("click", function (e) {
            e.preventDefault();

            // Gather form data
            var formData = {
                name: $("#addStudent_name").val(),
                age: $("#addStudent_age").val(),
                date_of_birth: $("#addStudent_date_of_birth").val(),
                gender: $('input[name="gender"]:checked').val(),
                phone: $("#addStudent_phone").val(),
                email: $("#addStudent_email").val(),
                password: $("#addStudent_password").val(),
                confirm_password: $("#addStudent_confirmPassword").val(),
                city_id: $("#addStudent_city_id").val(),
                course_id: $("#addStudent_course_id").val(),
                percentage: $("#addStudent_percentage").val(),
            };

            // Basic validation
            if (!formData.name || !formData.email || !formData.password) {
                $("#error-message").html("Please fill out all required fields.").slideDown();
                setTimeout(function () {
                    $("#error-message").slideUp();
                }, 2000);
                $("#success-message").slideUp();
                // alert("Please fill out all required fields.");
                return;
            }

            // Send AJAX request
            $.ajax({
                url: "insertStudent.php",
                type: "POST",
                data: formData,
                success: function (response) {
                    if (response == 1) {
                        $("#success-message").html("Data inserted successfully.").slideDown();
                        loadData();
                        $("#studentFormData")[0].reset();
                        setTimeout(function () {
                            $("#success-message").slideUp();
                            $("#addStudentModal").hide();
                        }, 2000);
                        
                        $("#error-message").slideUp();
                    } else {
                        $("#error-message").html("Error: " + response).slideDown();
                        setTimeout(function () {
                            $("#error-message").slideUp();
                        }, 2000);
                    }
                },
                error: function (xhr, status, error) {
                    $("#error-message").html("An error occurred: " + error).slideDown();
                    setTimeout(function () {
                        $("#error-message").slideUp();
                    }, 3000); // Show error message for 3 seconds
                },
            });
        });
        // edit studentData using Ajax
        $(document).on("click",".edit-button",function(){
            var studentId = $(this).data("eid");
            // alert(studentId);
            $.ajax({
                url:"editStudent.php",
                type : "POST",
                data : {id : studentId},
                success: function(response){
                    $("#editstudentModal").show().html(response);
                    $("#editClose-btn").show();
                }
            });
        });
        // hide edit modal
        $(document).on("click","#editClose-btn",function(){
            $("#editstudentModal").hide();
            $("#editClose-btn").hide();
        });
        // delete student data            
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