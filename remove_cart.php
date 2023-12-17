<?php
session_start();
include "connect.php";
$conn = new PDO("mysql:host=$server;dbname=$database", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
try {
    $query = "select * from account where username = :username";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':username', $_SESSION['username']);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $id = $result['id'];
    $query = "select * from carts where user_id = :id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $productData = json_decode($result['product'], true);
    if(isset($_GET['remove_id'])) {
        foreach ($productData as $key => $product) {
            if((int)$product['product_id'] == $_GET['remove_id']) {
                unset($productData[$key]);
                                var_dump($productData);
                break;
            }
        }
        if(count($productData) == 0) {
            $query = "DELETE FROM carts WHERE user_id=:id;";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
        } else {
            $productDatajs = json_encode($productData);
            $query = "UPDATE carts SET product= :product where user_id= :id";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':product', $productDatajs);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
        }

    }
    header("location: cart.php");
} catch (PDOException $ex) {
    echo $ex->getMessage();
}

?>