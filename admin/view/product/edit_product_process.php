<?php
session_start();
include("../connect.php");
if(isset($_SESSION['username'])) {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $conn = new mysqli($server, $user, $pwd, $database);
        if (isset($_GET['id'])) {
            $name = $_GET['id'];
            $target = "img/";
            $target_file = $target . $name . ".png";
            move_uploaded_file($_FILES['productImage']['tmp_name'], $target_file);
            $sql = "SELECT id FROM CATEGORY WHERE NAME=?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('s', $_POST['productCat']);
            mysqli_stmt_execute($stmt);
            $result = $stmt->get_result();
            $id = mysqli_fetch_assoc($result);
            $stmt->close();
            $stmt = $conn->prepare("UPDATE products SET name=?,img=?,category=?,price=?,stock_quantity=? WHERE id=?");
            $stmt->bind_param('ssiiii', $_POST['productName'], $target_file, $id['id'], $_POST['productPrice'], $_POST['productQuantity'], $_GET['id']);
            $stmt->execute();
            var_dump($stmt);
            $stmt->close();
            header("Location: http://localhost/clothingstore/admin/index.php#products");
        }
    }
}