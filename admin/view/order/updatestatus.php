<?php
session_start();
include("../connect.php");
if(isset($_SESSION['username'])){
    try{
        $conn = new mysqli($server,$user,$pwd,$database);
        $sql = "SELECT * FROM orders WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('i',$_GET['id']);
        $stmt->execute();
        $result = $stmt->get_result();
        $rows = $result->fetch_all(MYSQLI_ASSOC);;
        foreach ($rows as $row) {
            switch ($row['status']){
                case 1:
                    $sql = "UPDATE orders SET status=2 WHERE id=?";
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param('i',$_GET['id']);
                    $stmt->execute();
                    break;
                case 2:
                    $sql = "UPDATE orders SET status=3 WHERE id=?";
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param('i',$_GET['id']);
                    $stmt->execute();
                    $stmt->close();
                    $sql = "SELECT product_id,quantity,stock_quantity FROM orders INNER JOIN products on products.id = orders.product_id WHERE orders.id=?";
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param('i',$_GET['id']);
                    $stmt->execute();
                    $result = mysqli_fetch_assoc($stmt->get_result());
                    $product_id = $result['product_id'];
                    $quantity = $result['stock_quantity'] - $result['quantity'];
                    $stmt->close();
                    $stmt = $conn->prepare("UPDATE products SET stock_quantity=? WHERE id =?");
                    $stmt->bind_param('ii',$quantity,$product_id);
                    $stmt->execute();
                    break;
            }
        }
        header("Location: http://localhost/clothingstore/admin/index.php#orders");
    }catch (mysqli_sql_exception $exception){
        die($exception->getMessage());
    } finally
    {
        mysqli_close($conn);
    }
}else{
    header("Location: http://localhost/clothingstore/admin/login/index.php");
}