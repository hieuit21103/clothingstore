<?php
session_start();
include("../connect.php");
if(isset($_SESSION['username'])) {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $conn = new mysqli($server, $user, $pwd, $database);
        $role = $_POST['accountRole'];
        $pwd = md5($_POST['accountPwd']);
        switch ($role){
            case 'Administrator':
                $role = 0;
                break;
            case 'User':
                $role = 1;
                break;
        }
        if (isset($_GET['id'])) {
            $stmt = $conn->prepare("UPDATE account SET password=?,role=? WHERE id=?");
            $stmt->bind_param('sii',$pwd,$role , $_GET['id']);
            $stmt->execute();
            var_dump($stmt);
            $stmt->close();
            header("Location: http://localhost/clothingstore/admin/index.php#accounts");
        }
    }
}