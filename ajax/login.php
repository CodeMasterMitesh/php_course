<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Login Pannel</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .login-container {
            max-width: 400px;
            margin: 80px auto;
            padding: 20px;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .btn-primary {
            width: 100%;
        }
        .form-control {
            border-radius: 8px;
        }
        .logo {
            display: block;
            margin: 0 auto 20px;
            width: 80px;
        }
    </style>
</head>
<body>
    <?php 
        include ("connect_db.php");

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $email = $_POST['email'];
            $password = hash('sha256',$_POST['password']);

            $sql = "SELECT id,email,password,name FROM students WHERE email = '".$email."' LIMIT 1";
            $query = mysqli_query($conn,$sql);
            $data = mysqli_fetch_assoc($query);

            // debug($data);

            if($password == $data['password']){
                $_SESSION['student_id'] = $data['id'];
                $_SESSION['student_name'] = $data['name'];
                header("Location: index.php");
            }else{
                echo "<script>
                alert('Password Wrong');
                window.location.href = 'login.php';
              </script>";
            }
        }
    ?>
    <div class="login-container">
        <img src="https://via.placeholder.com/80" alt="Admin Logo" class="logo">
        <h4 class="text-center mb-4">Student Login</h4>
        <form action="login.php" method="POST">
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="example@gmail.com" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
            </div>
            <div class="d-flex justify-content-between align-items-center mb-3">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="rememberMe">
                    <label class="form-check-label" for="rememberMe">Remember me</label>
                </div>
                <a href="#" class="text-decoration-none">Forgot Password?</a>
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
        <p class="text-center mt-3">
            Don't have an account? <a href="addStudent.php" class="text-decoration-none">Register here</a>
        </p>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
