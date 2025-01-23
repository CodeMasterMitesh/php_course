<?php
include ("connect_db.php");
include ("header.php");
?>
<body>
    <?php 
        include("nav.php"); 
        include("addStudentModal.php");
        include("editStudentModal.php");
    ?>

    <!-- Content -->
    <div class="container-fluid mt-5">
        <a class="btn btn-primary addStudent">Add Data</a>
        <!-- <button class="btn btn-primary showData">Show Data</button> -->
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
    <script>
        $(document).ready(function(){
             // show student data ajax
             function loadData(){
                // $(".showData").on("click",function(e){
                    $.ajax({
                        url : "getStudent.php",
                        type : "POST",
                        success : function(data){
                            // console.log(data);
                            $("#studentData").html(data);
                        }
                    });
                // });
             }
             loadData();
             
            // open addform modal
            $(".addStudent").on("click",function(e){
                $("#addStudentModal").show();
            });
            // close addform modal
            $("#close-btn").on("click",function(e){
                $("#addStudentModal").hide();
            });

            // add student data ajax 
            $(".saveData").on("click",function(e){
                e.preventDefault();
                var formData = {
                    name : $("#name").val(),
                    age : $("#age").val(),
                    date_of_birth : $("#date_of_birth").val(),
                    gender : $("input[name='gender']:checked").val(),
                    phone : $("#phone").val(),
                    email : $("#email").val(),
                    password : $("#password").val(),
                    confirm_password : $("#confirmPassword").val(),
                    city_id : $("#city_id").val(),
                    course_id : $("#course_id").val(),
                    percentage : $("#percentage").val(),
                }
                $.ajax({
                    url : "insert_Student.php",
                    type : "POST",
                    data : formData,
                    success : function(data){
                        // console.log(data);
                        if(data == 1){
                            $("#registrationForm")[0].reset();
                            loadData();
                            $("#success-message").html("Data Insert Sucessfully").slideDown();
                            setInterval(function(){
                                $("#success-message").slideUp();
                                $("#addStudentModal").hide();
                            },2000);
                            $("#error-message").slideUp();
                        }else{
                            // alert(data);
                            $("#error-message").html(data).slideDown();
                            setInterval(function(){
                                $("#error-message").slideUp();
                            },3000);
                            $("#success-message").slideUp();
                        }
                    }
                });
            });
            // open editform modal
            $(document).on("click",".edit-btn",function(){
                // $("#editstudentModal").show();
                var studentId = $(this).data("eid");
                // alert(studentId);
                $.ajax({
                    url : "getEditStudentDetails.php",
                    type : "POST",
                    data : {id:studentId},
                    success : function(data){
                        // console.log(data);
                        $("#editstudentModal").html(data).show();
                    }
                });
            });
            // close editform modal
            $(document).on("click","#editClose-btn",function(){
                $("#editstudentModal").hide();
            });
            // update student data
            $(document).on("click",".update-btn",function(e){
                var name = $("#editStudent_name").val();
                // console.log(name);
                e.preventDefault();
                var formData = {
                    studentId : $("#student_id").val(),
                    Student_name : $("#editStudent_name").val(),
                    Student_age : $("#editStudent_age").val(),
                    Student_date_of_birth : $("#editStudent_date_of_birth").val(),
                    Student_gender : $("input[name='gender']:checked").val(),
                    Student_phone : $("#editStudent_phone").val(),
                    Student_city_id : $("#editStudent_city_id").val(),
                    Student_course_id : $("#editStudent_course_id").val(),
                    Student_percentage : $("#editStudent_percentage").val(),
                }
                $.ajax({
                    url : "updateStudent.php",
                    type : "POST",
                    data : formData,
                    success : function(data){
                        console.log(data);
                        if(data == 1){
                            // $("#registrationForm")[0].reset();
                            loadData();
                            $("#success-message").html("Data Update Sucessfully").slideDown();
                            setInterval(function(){
                                $("#success-message").slideUp();
                                $("#editstudentModal").hide();
                            },2000);
                            $("#error-message").slideUp();
                        }else{
                            // alert(data);
                            $("#error-message").html(data).slideDown();
                            setInterval(function(){
                                $("#error-message").slideUp();
                            },5000);
                            $("#success-message").slideUp();
                        }
                    }
                });
                // $("#editstudentModal").hide();
            });

            // delete data
            $(document).on("click",".delete-btn",function(){
            if(confirm("Do you Really want to delete this record?")){
                var studentId = $(this).data("id");
                // alert(studentId);
                    var element = this;
                    $.ajax({
                        url:"deleteStudent.php",
                        type :"POST",
                        data : {id:studentId},
                        success : function(data){
                            if(data == 1){
                                $(element).closest("tr").fadeOut();
                            }else{
                                $("#error-message").html("Error: " + data).slideDown();
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
    <!-- JavaScript for Search -->
    <script>
        document.getElementById('searchInput').addEventListener('keyup', function () {
            const filter = this.value.toLowerCase();
            const rows = document.querySelectorAll('#dataTable tbody tr');
            
            rows.forEach(row => {
                const cells = Array.from(row.querySelectorAll('td'));
                const match = cells.some(cell => cell.textContent.toLowerCase().includes(filter));
                row.style.display = match ? '' : 'none';
            });
        });
    </script>
</body>
</html>