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
        $username = sanitizeInput($_POST['username']);
        $phone = sanitizeInput($_POST['phone']);
        $query = "SELECT * FROM ACCOUNT INNER JOIN CUSTOMERS ON CUSTOMERS.account_id = ACCOUNT.ID WHERE USERNAME=:username AND phone=:phone";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':phone', $phone);
        $stmt->execute();
        if($stmt->rowCount() > 0){
            echo "<script>alert('Retake password success! Your new password is: `abc`. Please change your password ASAP')</script>";
            $newPassword = md5('abc');
            $query = "UPDATE ACCOUNT SET PASSWORD=:password WHERE USERNAME=:username";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':password', $newPassword);
            $stmt->execute();
        }else{
            echo "<script>alert('Wrong information')</script>";
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
    <title>Forgot Password</title>
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
                                <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?> ">
                                    <div class="d-flex align-items-center mb-4">
                                        <i class="fas fa-cubes fa-3x me-3"></i>
                                        <span class="h1 fw-bold mb-0 logo">Logo</span>
                                    </div>
                                    <h5 class="fw-normal mb-4">Find your account</h5>
                                    <div class="form-outline mb-4">
                                        <input type="text" id="username" name="username" class="form-control form-control-lg d-md-flex" />
                                        <label class="form-label" for="form2Example17">Username</label>
                                        <button style="float: right" class="btn" type="button" onclick="checkUsername()">Check</button>
                                    </div>
                                    <div class="form-outline mb-4">
                                        <input type="number" id="password" name="phone" class="form-control form-control-lg" />
                                        <label class="form-label" for="form2Example27">Phone Number</label>
                                    </div>
                                    <div class="pt-1 mb-4">
                                        <input name="submit" type="submit" value="Request" class="btn btn-dark btn-lg btn-block">
                                        <!--                                           < button class="btn btn-dark btn-lg btn-block" type="button">Login</button>-->
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <p class="mb-10" style="color: #393f81; text-align: center;">Already have an account? <a href="./login.php" style="color: #393f81;">Login here</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script>
    function checkUsername(){
        let username = document.getElementById('username').value
        $.ajax({
            url: "./checkuser.php",
            type: 'post',
            data: { username: username },
            dataType: 'html',
            success: function (response) {
                alert(response);
            },
            error: function (error) {
                console.log(error);
            }
        });
    }
</script>
</body>
</html>