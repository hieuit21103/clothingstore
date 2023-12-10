<?php
session_start();
include("../connect.php");
if(isset($_SESSION['username'])){
    $conn = new mysqli($server, $user, $pwd, $database);
    $stmt = $conn->prepare("DELETE FROM orders WHERE id=?");
    $stmt->bind_param('i',$_GET['id']);
    mysqli_stmt_execute($stmt);
    header("Location: http://localhost/clothingstore/admin/index.php#orders");
}else{
    header("Location: http://localhost/clothingstore/admin/login/index.php");
}
?>