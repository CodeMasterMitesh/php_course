<?php
include('connect_db.php');
     $id = $_POST['id'];
     $sql = "SELECT s.id,s.name,s.age,s.phone,s.date_of_birth,s.gender,s.percentage,c.city_name,cs.course_name,s.city_id,s.course_id FROM students as s LEFT JOIN city as c ON s.city_id = c.id 
     LEFT JOIN course as cs ON s.course_id = cs.id WHERE s.id = ".$id."";
     $query = mysqli_query($conn,$sql);
     $row = mysqli_fetch_assoc($query);

     // Fetch Cities
$cities = $conn->query('SELECT * FROM city');

// Fetch Courses
$courses = $conn->query('SELECT * FROM course');

$output = "<div id='editFormModal'>
<div class='container mt-5'>
    <h2 class='text-center'>Update Student Details</h2>
        <!-- Hidden Student ID -->
        <input type='hidden' name='student_id' id='student_id' value='" . htmlspecialchars($row['id']) . "'>

        <!-- Name -->
        <div class='mb-3'>
            <label for='name' class='form-label'>Name</label>
            <input type='text' class='form-control' id='editStudent_name' name='name' 
                   value='" . htmlspecialchars($row['name']) . "' 
                   placeholder='Enter your name' required>
            <div class='invalid-feedback'>Please enter your name.</div>
        </div>

        <!-- Age -->
        <div class='mb-3'>
            <label for='age' class='form-label'>Age</label>
            <input type='number' class='form-control' id='editStudent_age' 
                   value='" . htmlspecialchars($row['age']) . "' 
                   name='age' placeholder='Enter your age' required>
            <div class='invalid-feedback'>Please enter a valid age.</div>
        </div>

        <!-- Date of Birth -->
        <div class='mb-3'>
            <label for='date_of_birth' class='form-label'>Date of Birth</label>
            <input type='date' class='form-control' id='editStudent_date_of_birth' 
                   value='" . htmlspecialchars($row['date_of_birth']) . "' 
                   name='date_of_birth' required>
            <div class='invalid-feedback'>Please select your date of birth.</div>
        </div>

        <!-- Gender -->
        <div class='mb-3'>
            <label class='form-label'>Gender</label>
            <div>
                <div class='form-check form-check-inline'>
                    <input class='form-check-input' type='radio' name='gender' 
                           id='genderMale' value='M' 
                           " . ($row['gender'] == 'M' ? 'checked' : '') . " required>
                    <label class='form-check-label' for='genderMale'>Male</label>
                </div>
                <div class='form-check form-check-inline'>
                    <input class='form-check-input' type='radio' name='gender' 
                           id='genderFemale' value='F' 
                           " . ($row['gender'] == 'F' ? 'checked' : '') . " required>
                    <label class='form-check-label' for='genderFemale'>Female</label>
                </div>
            </div>
        </div>

        <!-- Phone -->
        <div class='mb-3'>
            <label for='phone' class='form-label'>Phone</label>
            <input type='tel' class='form-control' id='editStudent_phone' 
                   value='" . htmlspecialchars($row['phone']) . "' 
                   name='phone' placeholder='Enter your phone number' required>
            <div class='invalid-feedback'>Please enter a valid phone number.</div>
        </div>

        <!-- City -->
        <div class='mb-3'>
            <label for='city_id' class='form-label'>City</label>
            <select class='form-select' id='editStudent_city_id' name='city_id' required>";
while ($city = $cities->fetch_assoc()) {
    $selected = ($city['id'] == $row['city_id']) ? 'selected' : '';
    $output .= "<option value='" . htmlspecialchars($city['id']) . "' $selected>" 
                . htmlspecialchars($city['city_name']) . "</option>";
}
$output .= "
            </select>
            <div class='invalid-feedback'>Please select your city.</div>
        </div>

        <!-- Course -->
        <div class='mb-3'>
            <label for='course_id' class='form-label'>Course</label>
            <select class='form-select' id='editStudent_course_id' name='course_id' required>";
while ($courseData = $courses->fetch_assoc()) {
    $selected = ($courseData['id'] == $row['course_id']) ? 'selected' : '';
    $output .= "<option value='" . htmlspecialchars($courseData['id']) . "' $selected>" 
                . htmlspecialchars($courseData['course_name']) . "</option>";
}
$output .= "
            </select>
            <div class='invalid-feedback'>Please select your course.</div>
        </div>

        <!-- Percentage -->
        <div class='mb-3'>
            <label for='percentage' class='form-label'>Percentage</label>
            <input type='number' class='form-control' id='editStudent_percentage' 
                   value='" . htmlspecialchars($row['percentage']) . "' 
                   name='percentage' placeholder='Enter your percentage' required>
            <div class='invalid-feedback'>Please enter a valid percentage.</div>
        </div>

        <!-- Submit Button -->
        <button type='submit' class='btn btn-primary w-25 update-btn'>Update</button>
</div></div>
<div id='editClose-btn'>X</div>
";
echo $output;
?>