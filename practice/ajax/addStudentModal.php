<div id="addStudentModal">
    <form id="studentFormData">
        <div class="container" id="addFormModal">
            <h2 class="text-center">Add Student</h2>
                <!-- Name -->
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="addStudent_name" name="name" placeholder="Enter your name">
                    <div class="invalid-feedback">Please enter your name.</div>
                </div>
                
                <!-- Age -->
                <div class="mb-3">
                    <label for="age" class="form-label">Age</label>
                    <input type="number" class="form-control" id="addStudent_age" name="age" placeholder="Enter your age">
                    <div class="invalid-feedback">Please enter a valid age.</div>
                </div>
                
                <!-- Date of Birth -->
                <div class="mb-3">
                    <label for="date_of_birth" class="form-label">Date of Birth</label>
                    <input type="date" class="form-control" id="addStudent_date_of_birth" name="date_of_birth">
                    <div class="invalid-feedback">Please select your date of birth.</div>
                </div>
                
                <!-- Gender -->
                <div class="mb-3">
                    <label class="form-label">Gender</label>
                    <div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="addStudent_genderMale" value="Male">
                            <label class="form-check-label" for="genderMale">Male</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="addStudent_genderFemale" value="Female">
                            <label class="form-check-label" for="genderFemale">Female</label>
                        </div>
                        <div class="invalid-feedback d-block">Please select your gender.</div>
                    </div>
                </div>
                
                <!-- Phone -->
                <div class="mb-3">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="tel" class="form-control" id="addStudent_phone" name="phone" placeholder="Enter your phone number">
                    <div class="invalid-feedback">Please enter a valid phone number.</div>
                </div>

                <!-- Email -->
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="addStudent_email" name="email" placeholder="example@gmail.com">
                    <div class="invalid-feedback">Please enter a valid email id.</div>
                </div>

                <!-- Password -->
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="addStudent_password" name="password">
                </div>

                <!-- Confirm Password -->
                <div class="mb-3">
                    <label for="confirmPassword" class="form-label">Confirm Password</label>
                    <input type="text" class="form-control" id="addStudent_confirmPassword" name="confirm_password">
                </div>
                
                <!-- City -->
                <div class="mb-3">
                    <label for="city_id" class="form-label">City</label>
                    <select class="form-select" id="addStudent_city_id" name="city_id">
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
                    <select class="form-select" id="addStudent_course_id" name="course_id">
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
                    <input type="number" class="form-control" id="addStudent_percentage" name="percentage" placeholder="Enter your percentage">
                    <div class="invalid-feedback">Please enter a valid percentage.</div>
                </div>
                
                <!-- Submit Button -->
                <button type="submit" id="addStudent" class="text-center btn btn-primary w-25">Add</button>
            </div>
        </form>
    <div id="close-btn">X</div>
</div>