<?php 
include('connect_db.php');

// Fetch Student Details
$id = intval($_POST['id']); // Use intval to ensure a numeric value
$stmt = $conn->prepare(
    'SELECT s.id, s.name, s.age, s.phone, s.date_of_birth, s.gender, 
            s.percentage, c.city_name, cs.course_name, s.city_id, s.course_id 
     FROM students AS s 
     LEFT JOIN city AS c ON s.city_id = c.id 
     LEFT JOIN course AS cs ON s.course_id = cs.id 
     WHERE s.id = ?'
);
$stmt->bind_param('i', $id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

if (!$row) {
    echo "<p class='text-danger'>No student found with ID: $id</p>";
    exit;
}

// Fetch Cities
$cities = $conn->query('SELECT * FROM city');

// Fetch Courses
$courses = $conn->query('SELECT * FROM course');

$output = "<div id='editFormModal'>
<div class='container mt-5'>
    <h2 class='text-center'>Update Student Details</h2>
    <form id='registrationForm' action='Update_Student_Data.php' method='POST' class='needs-validation' novalidate>
        <!-- Hidden Student ID -->
        <input type='hidden' name='student_id' value='" . htmlspecialchars($row['id']) . "'>

        <!-- Name -->
        <div class='mb-3'>
            <label for='name' class='form-label'>Name</label>
            <input type='text' class='form-control' id='name' name='name' 
                   value='" . htmlspecialchars($row['name']) . "' 
                   placeholder='Enter your name' required>
            <div class='invalid-feedback'>Please enter your name.</div>
        </div>

        <!-- Age -->
        <div class='mb-3'>
            <label for='age' class='form-label'>Age</label>
            <input type='number' class='form-control' id='age' 
                   value='" . htmlspecialchars($row['age']) . "' 
                   name='age' placeholder='Enter your age' required>
            <div class='invalid-feedback'>Please enter a valid age.</div>
        </div>

        <!-- Date of Birth -->
        <div class='mb-3'>
            <label for='date_of_birth' class='form-label'>Date of Birth</label>
            <input type='date' class='form-control' id='date_of_birth' 
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
            <input type='tel' class='form-control' id='phone' 
                   value='" . htmlspecialchars($row['phone']) . "' 
                   name='phone' placeholder='Enter your phone number' required>
            <div class='invalid-feedback'>Please enter a valid phone number.</div>
        </div>

        <!-- City -->
        <div class='mb-3'>
            <label for='city_id' class='form-label'>City</label>
            <select class='form-select' id='city_id' name='city_id' required>";
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
            <select class='form-select' id='course_id' name='course_id' required>";
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
            <input type='number' class='form-control' id='percentage' 
                   value='" . htmlspecialchars($row['percentage']) . "' 
                   name='percentage' placeholder='Enter your percentage' required>
            <div class='invalid-feedback'>Please enter a valid percentage.</div>
        </div>

        <!-- Submit Button -->
        <button type='submit' class='btn btn-primary w-25'>Update</button>
    </form>
</div></div>
<div id='editClose-btn'>X</div>
";
echo $output;
?>