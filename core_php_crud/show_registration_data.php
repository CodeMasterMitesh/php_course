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
    <div class="container mt-5">
        <a href="registration.php" class="btn btn-primary">Add Data</a>
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
                    </tr>
                </thead>
                <tbody>
                <?php
                    
                    include ("connect_db.php");

                    // get data usng left join 
                    $sql = "SELECT s.id,s.name,s.age,s.date_of_birth,s.gender,s.phone,s.percentage,c.city_name,cs.course_name FROM students as s LEFT JOIN city as c ON s.city_id = c.id 
                    LEFT JOIN course as cs ON s.course_id = cs.id";
                    // mysqli_query exucutre query in db which is connected by mysqli_connect function
                    $query = mysqli_query($conn,$sql);
                    while($row = mysqli_fetch_assoc($query)){
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
                    </tr>
                <?php
                    }
                ?>
                    
                </tbody>
            </table>
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
