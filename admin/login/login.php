<?php
include '../connect.php';
session_start();
if($_SERVER['REQUEST_METHOD'] == "POST"){
    $u = $_POST['username'];
    $p = $_POST['password'];

    try {
        $conn = new PDO("mysql:host=$server;dbname=$database", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $conn->prepare("SELECT password,role FROM account WHERE username = :username");
        $stmt->bindParam(':username', $u);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if (isset($result['password'])) {
            if (md5($p) == $result['password']) {
                $_SESSION['role'] = $result['role'];
                $_SESSION['username'] = $_POST['username'];
                header('Location: ../index.php');
            } else {
                header("Location: index.php");
            }
        }else{
            echo "<p style='color:red;display: none'>Sai thông tin đăng nhập</p>";
            header("Location: index.php");

        }
    } catch (PDOException $e) {
        echo "Lỗi kết nối CSDL: " . $e->getMessage();
    }
}
unset($_POST['submit']);
?>
