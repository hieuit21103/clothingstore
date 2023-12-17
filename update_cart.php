<?php
session_start();
include "connect.php";
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST['op'])){
        $productId = $_POST['productId'];
        $conn = new mysqli($server,$username,$password,$database);
        $stmt = $conn->prepare('SELECT * FROM CARTS INNER JOIN ACCOUNT ON ACCOUNT.ID=CARTS.USER_ID WHERE USERNAME=?');
        $stmt->bind_param('s',$_SESSION['username']);
        $stmt->execute();
        $result = mysqli_fetch_assoc($stmt->get_result());
        $oldProducts = json_decode($result['product'],true);
        foreach ($oldProducts as $key => $value) {
            if($value['product_id'] == $productId) {
                switch ($_POST['op']) {
                    case 0:
                        $oldProducts[$key]['quantity']++;
                        break;
                    case 1:
                        $oldProducts[$key]['quantity']--;
                        break;
                }
            }
        }
        $newProduct = json_encode($oldProducts);
        $stmt->close();
        $sql = "UPDATE CARTS INNER JOIN ACCOUNT ON ACCOUNT.ID=CARTS.USER_ID SET PRODUCT=? WHERE USERNAME=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('ss',$newProduct,$_SESSION['username']);
        $stmt->execute();
    }
}