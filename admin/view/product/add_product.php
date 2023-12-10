<?php
session_start();
include("../connect.php");
if(isset($_SESSION['username'])){
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $conn = new mysqli($server, $user, $pwd, $database);
        $catName = $_POST['productCat'];
        $sql = "SELECT id FROM CATEGORY WHERE NAME=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('s',$catName);
        mysqli_stmt_execute($stmt);
        $result = $stmt->get_result();
        $id = mysqli_fetch_assoc($result);
        $stmt->close();
        $stmt = $conn->prepare("INSERT INTO PRODUCTS(id,name,img,category,price,stock_quantity) VALUES (id,?,null,?,?,?)");
        $stmt->bind_param('siii',$_POST['productName'],$id['id'],$_POST['productPrice'],$_POST['productQty']);
        $stmt->execute();
        $stmt->close();
        $sql = "SELECT id FROM products ORDER BY id DESC LIMIT 1";
        $result = mysqli_query($conn, $sql);
        $id = mysqli_fetch_assoc($result);
        $name = $id["id"];
        $target = "img/";
        $target_file = $target . $name . ".png";
        move_uploaded_file($_FILES['productImg']['tmp_name'], $target_file);
        $sql = "UPDATE products SET img=? WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('si',$target_file,$name);
        $stmt->execute();
        $stmt->close();
        header("Location: http://localhost/clothingstore/admin/index.php#products");
        die();
    }
}else{
    header("Location: http://localhost/clothingstore/admin/index.php#");
    die();
} ?>