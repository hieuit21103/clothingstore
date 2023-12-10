<?php
session_start();
include("../connect.php");
if(isset($_SESSION['username'])){
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $conn = new mysqli($server, $user, $pwd, $database);
        $stmt = $conn->prepare("INSERT INTO category VALUES (id,?)");
        $stmt->bind_param('s',$_POST['catName']);
        mysqli_stmt_execute($stmt);
        header("Location: http://localhost/clothingstore/admin/index.php#categories");
    }
}else{
    header("Location: http://localhost/clothingstore/admin/login/index.php");
}
?>