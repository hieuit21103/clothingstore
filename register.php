<?php
    include "connect.php";

    if($_SERVER['REQUEST_METHOD'] == "POST") {
        try {
            $conn = new PDO("mysql:host=$server;dbname=$database", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                $username = $_POST['username'];
                $password = $_POST['password'];
                $re_password = $_POST['re-password'];
                if($password == $re_password) {
                    $hashed_password = md5($password);
                    $query = "SELECT * FROM account where username = :username";
                    $stmt = $conn->prepare($query);
                    $stmt->bindParam('username', $username);
                    $stmt->execute();
                    if($stmt->rowcount()>0) {
                        echo "<script>alert('Tên đăng ký đã được khởi tạo từ trước!')</script>";
                    } else {
                        $query = "INSERT INTO account (username, password) values (:username, :password)";
                        $stmt = $conn->prepare($query);
                        $stmt->bindParam(':username', $username);
                        $stmt->bindParam(':password', $hashed_password);
                        $stmt->execute();
                        header("location: login.php");
                    }
                } else {
                    echo "<script>alert('Mật khẩu nhắc lại không khớp!')</script>";
                }
            }

        } catch (PDOException $ex) {
            echo "Connect failed" . $ex->getMessage();
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
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
                                        <i class="fas fa-user-plus fa-3x me-3"></i>
                                        <span class="h1 fw-bold mb-0 logo">Register</span>
                                    </div>
                                    <h5 class="fw-normal mb-4">Create a new account</h5>
                                    <div class="form-outline mb-4">
                                        <input type="text" id="username" name="username" class="form-control form-control-lg" />
                                        <label class="form-label" for="username">Username</label>
                                    </div>
                                    <div class="form-outline mb-4">
                                        <input type="password" id="password" name="password" class="form-control form-control-lg" />
                                        <label class="form-label" for="password">Password</label>
                                    </div>
                                    <div class="form-outline mb-4">
                                        <input type="password" id="re-password" name="re-password" class="form-control form-control-lg" />
                                        <label class="form-label" for="password">Re-Password</label>
                                    </div>
                                    <div class="pt-1 mb-4">
                                        <input type="submit" value="Register" class="btn btn-dark btn-lg btn-block">
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <p class="mb-0" style="color: #393f81;">Already have an account? <a href="login.php" style="color: #393f81;">Sign in here</a></p>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
