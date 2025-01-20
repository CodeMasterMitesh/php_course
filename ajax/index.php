<?php
include ("connect_db.php");
include ("header.php");
?>
<body>
    <!-- Navbar -->
    

    <!-- Content -->
    <div class="container-fluid mt-5">
        <a href="addStudent.php" class="btn btn-primary">Add Data</a>
        <button class="btn btn-primary showData">Show Data</button>
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

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function(){
            $(".showData").on("click",function(e){
                $.ajax({
                    url : "getStudent.php",
                    type : "POST",
                    success : function(data){
                        // console.log(data);
                        $("#studentData").html(data);
                    }
                });
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