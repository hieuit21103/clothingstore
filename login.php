<?php
session_start();
    include "connect.php";
    try {
        $conn = new PDO("mysql:host=$server;dbname=$database", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        function sanitizeInput($data) {
            // Hàm này để làm sạch dữ liệu đầu vào để tránh tấn công SQL Injection
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            if(isset($_POST['username']) && isset($_POST['password'])) {
                $username = sanitizeInput($_POST['username']);
                $password = sanitizeInput($_POST['password']);
                $hashed_password = md5($password);
                if(empty($password)) {
                    echo "<script>alert('Vui lòng nhập mật khẩu')</script>";
                } else {
                    // Sử dụng prepared statement để tránh SQL Injection
                    $query = "SELECT * FROM account WHERE username = :username AND password = :password";
                    $stmt = $conn->prepare($query);
                    $stmt->bindParam(':username', $username);
                    $stmt->bindParam(':password', $hashed_password);
                    $stmt->execute();

                    // Kiểm tra xem có kết quả hay không
                    if($stmt->rowCount() > 0) {
                        $result = $stmt->fetch(PDO::FETCH_ASSOC);
                        $_SESSION['username'] = $result['username'];
                        $_SESSION['role'] = $result['role'];
                        header("location: index.php");
                        exit();
                    } else {
                        echo "<script>alert('Sai tên đăng nhập hoặc mật khẩu!')</script>";
                    }
                }
            } else {
                echo "<script>alert('Vui lòng điền đầy đủ thông tin đăng nhập!')</script>";
            }
        }
    } catch (PDOException $ex) {
        echo "Connection failed" . $ex->getMessage();
    }


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #D19C97;
        }
        .card {
            border-radius: 1rem;
        }
        .logo {
            color: #ff6219;
            font-size: 2.5rem;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <section class="vh-100">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-xl-8">
                    <div class="card">
                        <div class="row g-0">
                            <div class="col-md-6 col-lg-5 d-flex align-items-center justify-content-center">
                                <a href="" class="text-decoration-none">
                                    <h1 class="m-0 display-5 font-weight-semi-bold">
                                        <span class="text-primary font-weight-bold border px-3 mr-1">E</span>Shopper
                                    </h1>
                                </a>
                            </div>
                            <div class="col-md-6 col-lg-7 d-flex align-items-center">
                                <div class="card-body p-4 p-lg-5 text-black">
                                    <form method="post">
                                        <div class="d-flex align-items-center mb-4">
                                            <i class="fas fa-cubes fa-3x me-3"></i>
                                            <span class="h1 fw-bold mb-0 logo">Logo</span>
                                        </div>
                                        <h5 class="fw-normal mb-4">Sign into your account</h5>
                                        <div class="form-outline mb-4">
                                            <input type="text" id="username" name="username" class="form-control form-control-lg" />
                                            <label class="form-label" for="form2Example17">Account</label>
                                        </div>
                                        <div class="form-outline mb-4">
                                            <input type="password" id="password" name="password" class="form-control form-control-lg" />
                                            <label class="form-label" for="form2Example27">Password</label>
                                        </div>
                                        <div class="pt-1 mb-4">
                                            <input name="submit" type="submit" value="Login" class="btn btn-dark btn-lg btn-block">
<!--                                           < button class="btn btn-dark btn-lg btn-block" type="button">Login</button>-->
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <p class="mb-10" style="color: #393f81; text-align: center;">You don't have an account? <a href="./register.php" style="color: #393f81;">Register in here</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>