<?php 
    include ("connect_db.php");
    include("header.php");
 ?>
<body>
<?php
    include("nav.php");
 ?>
 <style>
    #success-msg{
        position: absolute;
        top:450px;
        right:100px;
        background-color:#d4edda;
        color:#155724;
        border:1px solid #c3e6cb;
        border-radius:.25rem;
        padding:10px;
        margin:10px;
        display:none;
    }
    #error-msg{
        position: absolute;
        top:450px;
        right:100px;
        background-color:#f8d7da;
        color:#721c24;
        border:1px solid #f5c6cb;
        border-radius:.25rem;
        padding:10px;
        margin:10px;
        display:none;
    }
 </style>
    <div class="container mt-5">
        <h2 class="text-center">Registration Form</h2>
        <form id="registrationForm">
            <!-- Name -->
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name">
                <div class="invalid-feedback">Please enter your name.</div>
            </div>
            
            <!-- Age -->
            <div class="mb-3">
                <label for="age" class="form-label">Age</label>
                <input type="number" class="form-control" id="age" name="age" placeholder="Enter your age">
                <div class="invalid-feedback">Please enter a valid age.</div>
            </div>
            
            <!-- Date of Birth -->
            <div class="mb-3">
                <label for="date_of_birth" class="form-label">Date of Birth</label>
                <input type="date" class="form-control" id="date_of_birth" name="date_of_birth">
                <div class="invalid-feedback">Please select your date of birth.</div>
            </div>
            
            <!-- Gender -->
            <div class="mb-3">
                <label class="form-label">Gender</label>
                <div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="genderMale" value="Male">
                        <label class="form-check-label" for="genderMale">Male</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="genderFemale" value="Female">
                        <label class="form-check-label" for="genderFemale">Female</label>
                    </div>
                    <div class="invalid-feedback d-block">Please select your gender.</div>
                </div>
            </div>
            
            <!-- Phone -->
            <div class="mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input type="tel" class="form-control" id="phone" name="phone" placeholder="Enter your phone number">
                <div class="invalid-feedback">Please enter a valid phone number.</div>
            </div>

            <!-- Email -->
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="example@gmail.com">
                <div class="invalid-feedback">Please enter a valid email id.</div>
            </div>

            <!-- Password -->
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>

            <!-- Confirm Password -->
            <div class="mb-3">
                <label for="confirmPassword" class="form-label">Confirm Password</label>
                <input type="text" class="form-control" id="confirmPassword" name="confirm_password">
            </div>
            
            <!-- City -->
            <div class="mb-3">
                <label for="city_id" class="form-label">City</label>
                <select class="form-select" id="city_id" name="city_id">
                    <option value="">Select your city</option>
                <?php
                    
                    $sql = "SELECT * FROM city";
                    $query = mysqli_query($conn,$sql);
                    while($row = mysqli_fetch_assoc($query)){
                        // debug($row);
                        ?>  
                            <option value="<?php echo $row['id'] ?>"><?php echo $row['city_name'] ?></option>
                        <?php
                    }
                ?>
                    
                </select>
                <div class="invalid-feedback">Please select your city.</div>
            </div>
            
            <!-- Course -->
            <div class="mb-3">
                <label for="course_id" class="form-label">Course</label>
                <select class="form-select" id="course_id" name="course_id">
                <option value="">Select your course</option>
                    <?php 
                        $course = "SELECT * FROM course";
                        $query = mysqli_query($conn,$course);
                        while($courseData = mysqli_fetch_assoc($query)){
                            ?>
                            <option value="<?php echo $courseData['id'] ?>"><?php echo $courseData['course_name'] ?></option>
                            <?php
                        }
                    ?>
                </select>
                <div class="invalid-feedback">Please select your course.</div>
            </div>
            
            <!-- Percentage -->
            <div class="mb-3">
                <label for="percentage" class="form-label">Percentage</label>
                <input type="number" class="form-control" id="percentage" name="percentage" placeholder="Enter your percentage">
                <div class="invalid-feedback">Please enter a valid percentage.</div>
            </div>
            
            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary w-100 saveData">Register</button>
        </form>
    </div>
    <div id="success-msg"></div>
    <div id="error-msg"></div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function(){
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
                        console.log(data);
                        if(data == 1){
                            alert('Data inserted successfully');
                            window.location.href = 'index.php';
                            // $("#registrationForm")[0].reset();
                            // $("#success-msg").html("Data Insert Sucessfully").slideDown();
                            // setInterval(function(){
                            //     $("#success-msg").slideUp();
                            // },2000);
                            // $("#error-msg").slideUp();
                        }else{
                            // alert(data);
                            $("#error-msg").html(data).slideDown();
                            setInterval(function(){
                                $("#error-msg").slideUp();
                            },3000);
                            $("#success-msg").slideUp();
                        }
                    }
                });
            });
        });
    </script>
    <script>
        // Bootstrap Form Validation
        (() => {
            'use strict';
            const forms = document.querySelectorAll('.needs-validation');
            Array.from(forms).forEach(form => {
                form.addEventListener('submit', event => {
                    if (!form.checkValidity()) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        })();
    </script>
</body>
</html>
