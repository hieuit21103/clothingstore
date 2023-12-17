<?php
include "connect.php";
$conn = new mysqli($server,$username,$password,$database);
$stmt = $conn->prepare('SELECT * FROM ACCOUNT WHERE USERNAME=?');
$stmt->bind_param('s',$_POST['username']);
$stmt->execute();
$result = $stmt->get_result()->fetch_assoc();
if(!$result){
    echo "Your account doesn't exist!";
}else{
    echo "Your account exists!";
}

