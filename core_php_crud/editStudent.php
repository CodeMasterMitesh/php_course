<?php 
    include ("connect_db.php");
    $id = $_GET['id'];
    $sql = "SELECT s.id,s.name,s.age,s.phone,s.date_of_birth,s.gender,s.percentage,c.city_name,cs.course_name,s.city_id,s.course_id FROM students as s LEFT JOIN city as c ON s.city_id = c.id 
    LEFT JOIN course as cs ON s.course_id = cs.id WHERE s.id = ".$id."";
    $query = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($query);
    
    // debug($row);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student Details</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Update Student Details</h2>
        <form id="registrationForm" action="Update_Student_Data.php" method="POST" class="needs-validation" novalidate>
            <!-- Name -->
            <div class="mb-3">
                <input type="hidden" name="student_id" value="<?php echo $row['id'] ?>">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo $row['name'] ?>" placeholder="Enter your name" required>
                <div class="invalid-feedback">Please enter your name.</div>
            </div>
            
            <!-- Age -->
            <div class="mb-3">
                <label for="age" class="form-label">Age</label>
                <input type="number" class="form-control" id="age" value="<?php echo $row['age'] ?>" name="age" placeholder="Enter your age" required>
                <div class="invalid-feedback">Please enter a valid age.</div>
            </div>
            
            <!-- Date of Birth -->
            <div class="mb-3">
                <label for="date_of_birth" class="form-label">Date of Birth</label>
                <input type="date" class="form-control" id="date_of_birth" value="<?php echo $row['date_of_birth'] ?>" name="date_of_birth" required>
                <div class="invalid-feedback">Please select your date of birth.</div>
            </div>
            
            <!-- Gender -->
            <div class="mb-3">
                <label class="form-label">Gender</label>
                <div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="genderMale" value="M"<?php echo ($row['gender'] == "M") ? 'Checked' : '' ?> required>
                        <label class="form-check-label" for="genderMale">Male</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="genderFemale" value="F"<?php echo ($row['gender'] == "F") ? 'Checked' : '' ?> required>
                        <label class="form-check-label" for="genderFemale">Female</label>
                    </div>
                </div>
            </div>
            
            <!-- Phone -->
            <div class="mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input type="tel" class="form-control" id="phone" value="<?php echo $row['phone'] ?>" name="phone" placeholder="Enter your phone number" required>
                <div class="invalid-feedback">Please enter a valid phone number.</div>
            </div>
            
            <!-- City -->
            <div class="mb-3">
                <label for="city_id" class="form-label">City</label>
                <select class="form-select" id="city_id" name="city_id" required>
                <?php
                    $selected_city_id = $row['city_id'];
                    $sql1 = "SELECT * FROM city where 1";
                    $query1 = mysqli_query($conn,$sql1);
                    while($city = mysqli_fetch_assoc($query1)){
                        // debug($row);
                        $is_selected = ($city['id'] == $selected_city_id) ? 'selected' : '';
                        ?>  
                            <option value="<?php echo $city['id'] ?>"<?php echo $is_selected; ?>><?php echo $city['city_name'] ?></option>
                        <?php
                    }
                ?>
                    
                </select>
                <div class="invalid-feedback">Please select your city.</div>
            </div>
            
            <!-- Course -->
            <div class="mb-3">
                <label for="course_id" class="form-label">Course</label>
                <select class="form-select" id="course_id" name="course_id" required>
                    <?php 
                        $couse_id = $row['course_id'];
                        $course = "SELECT * FROM course where 1";
                        $query = mysqli_query($conn,$course);
                        while($courseData = mysqli_fetch_assoc($query)){
                            $is_selected_course = ($courseData['id'] == $couse_id) ? 'selected' : '';
                            ?>
                            <option value="<?php echo $courseData['id'] ?>" <?php echo $is_selected_course ?>><?php echo $courseData['course_name'] ?></option>
                            <?php
                        }
                    ?>
                </select>
                <div class="invalid-feedback">Please select your course.</div>
            </div>
            
            <!-- Percentage -->
            <div class="mb-3">
                <label for="percentage" class="form-label">Percentage</label>
                <input type="number" class="form-control" value="<?php echo $row['percentage'] ?>" id="percentage" name="percentage" placeholder="Enter your percentage" required>
                <div class="invalid-feedback">Please enter a valid percentage.</div>
            </div>
            
            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary w-100">Update Student Details</button>
        </form>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
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
