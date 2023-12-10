<?php
session_start();
include("../connect.php");
if(isset($_SESSION['username'])){
    var_dump($_GET['id']);
    $conn = new mysqli($server, $user, $pwd, $database);
    $stmt = $conn->prepare("DELETE FROM products WHERE id=?");
    $stmt->bind_param('i',$_GET['id']);
    mysqli_stmt_execute($stmt);
    var_dump(mysqli_stmt_execute($stmt));
    header("Location: http://localhost/clothingstore/admin/index.php#products");
}else{
    header("Location: http://localhost/clothingstore/admin/login/index.php");
}


