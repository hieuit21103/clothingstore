<?php
session_start();
include("../connect.php");
if(isset($_SESSION['username'])){
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
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
        $stmt = $conn->prepare("INSERT INTO account VALUES (id,?,?,?)");
        $stmt->bind_param('ssi',$_POST['accountName'],$pwd,$role);
        $stmt->execute();
        $stmt->close();
        header("Location: http://localhost/clothingstore/admin/index.php#accounts");
        die();
    }
}else{
    header("Location: http://localhost/clothingstore/admin/index.php#");
    die();
} ?>