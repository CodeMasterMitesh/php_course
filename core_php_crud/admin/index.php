<?php
include ("../connect_db.php");
// debug(session_id());
// debug(session_name());
if(!$_SESSION['student_id']){
    header("Location: login.php");
}
$student_id = $_SESSION['student_id'];
// session  -> data store over server 
// like user id 
// username

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Table with Search</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
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
                <tbody>
                <?php
                    $limit = 3;
                    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
                    $offset = ($page - 1) * $limit;

                    $sql_count = "SELECT count(*) AS total FROM students";
                    $result_count  = mysqli_query($conn, $sql_count);
                    $total_rows  = $result_count->fetch_assoc()['total'];
                    $total_pages = ceil($total_rows/$limit); //3
                    // debug($total_rows);
                    // exit;

                    // $sql = "SELECT s.id, s.name, s.age, s.date_of_birth, s.gender, s.phone, s.percentage, c.city_name, cs.course_name 
                    //         FROM students AS s 
                    //         LEFT JOIN city AS c ON s.city_id = c.id 
                    //         LEFT JOIN course AS cs ON s.course_id = cs.id LIMIT $offset,$limit";

                    $sql = "SELECT s.id, s.name, s.age, s.date_of_birth, s.gender, s.phone, s.percentage, c.city_name, cs.course_name 
                            FROM students AS s 
                            LEFT JOIN city AS c ON s.city_id = c.id 
                            LEFT JOIN course AS cs ON s.course_id = cs.id WHERE s.id = '".$student_id."'";
                    $query = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_assoc($query);
                    // while ($row = mysqli_fetch_assoc($query)) {
                ?>
                    <tr>
                        <td><?php echo $row['id'] ?></td>
                        <td><?php echo $row['name'] ?></td>
                        <td><?php echo $row['age'] ?></td>
                        <td><?php echo $row['date_of_birth'] ?></td>
                        <td><?php echo $row['gender'] ?></td>
                        <td><?php echo $row['phone'] ?></td>
                        <td><?php echo $row['city_name'] ?></td>
                        <td><?php echo $row['percentage'] ?></td>
                        <td><?php echo $row['course_name'] ?></td>
                        <td><a href="editStudent.php?id=<?php echo $row['id'] ?>" class="btn btn-primary">Edit</a></td>
                        <td><a href="deleteStudent.php?id=<?php echo $row['id'] ?>" class="btn btn-danger">Delete</a></td>
                    </tr>
                <?php
                    // }
                ?>
                </tbody>
            </table>
            <!-- Pagination Links -->
                <nav>
                    <ul class="pagination justify-content-center">
                        <li class="page-item  <?php if($page <= 1) echo 'disabled'; ?>">
                            <a class="page-link" href="?page=<?php echo $page - 1; ?>">Previous</a>
                        </li>
                        <?php 
                            for($i = 1;$i <= $total_pages;$i++){
                                ?>
                                <li class="page-item">
                                    <a class="page-link <?php if($i == $page) echo 'active'; ?>" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                                </li>
                            <?php } ?>
                        <li class="page-item <?php if($page >= $total_pages) echo 'disabled'; ?>">
                            <a class="page-link" href="?page=<?php echo $page + 1; ?>">Next</a>
                        </li>
                    </ul>
                </nav>
        </div>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    
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