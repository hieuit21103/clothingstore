<?php
session_start();
include "connect.php";
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $conn = new mysqli($server,$username,$password,$database);
    $stmt = $conn->prepare('SELECT * FROM customers INNER JOIN ACCOUNT ON ACCOUNT.ID = CUSTOMERS.ACCOUNT_ID WHERE USERNAME = ?');
    $stmt->bind_param('s',$_SESSION['username']);
    $stmt->execute();
    $result = mysqli_fetch_assoc($stmt->get_result());
    $stmt->close();
    if($result == null){
        $sql = 'INSERT INTO customers VALUES (id,?,?,?,?,?)';
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('issis',$_SESSION['user_id'],$_POST['name'],$_POST['email'],$_POST['phone'],$_POST['address']);
        $stmt->execute();
        $stmt->close();
    }
    if(isset($_POST['shipto']) && $_POST['shipto'] == 'on'){
        $sql = 'UPDATE customers SET name=?,email=?,phone=?,address=? WHERE account_id=?';
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('ssisi',$_POST['name'],$_POST['email'],$_POST['phone'],$_POST['address'],$_SESSION['user_id']);
        $stmt->execute();
        $stmt->close();
    }
    $stmt = $conn->prepare("SELECT * FROM CARTS WHERE user_id=?");
    $stmt->bind_param('i',$_SESSION['user_id']);
    $stmt->execute();
    $result = mysqli_fetch_assoc($stmt->get_result());
    $product = $result['product'];
    $stmt->close();
    $stmt = $conn->prepare('INSERT INTO orders VALUES(id,?,current_timestamp(),null,?,?,1)');
    $stmt->bind_param('isi',$_SESSION['user_id'],$product,$_POST['total']);
    $stmt->execute();
    $stmt = $conn->prepare('DELETE FROM CARTS WHERE user_id=? ');
    $stmt->bind_param('i',$_SESSION['user_id']);
    $stmt->execute();
    header('Location: index.php');
}
