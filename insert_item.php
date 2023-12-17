<?php
session_start();
include "connect.php"; // Import file kết nối CSDL

// Khởi tạo kết nối CSDL
$conn  = new mysqli($server,$username,$password,$database);
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['productId'])) {
    try {
        $query = "SELECT * FROM account WHERE username=?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('s', $_SESSION['username']);
        $stmt->execute();
        $id = mysqli_fetch_assoc($stmt->get_result())['id'];
        $stmt->close();
        $query = "SELECT product,username FROM carts INNER JOIN account on carts.user_id = account.id WHERE username=?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('s', $_SESSION['username']);
        $stmt->execute();
        $result = mysqli_fetch_assoc($stmt->get_result());
        $stmt->close();
        if(!$result){
            $productArray = [[
                "product_id" => $_POST['productId'],
                "quantity" => 1
            ]];

            // Chuyển đổi mảng này thành chuỗi JSON
            $productJSON = json_encode($productArray);

            // Tiếp tục thực hiện INSERT vào database như bạn đã làm
            $stmt = $conn->prepare('INSERT INTO carts VALUES (id, ?, ?, current_timestamp());');
            $stmt->bind_param('is', $id, $productJSON);
            $stmt->execute();
        }else {
            $products = json_decode($result['product'], true);
            $newProduct = [
                "product_id" => $_POST['productId'],
                "quantity" => 1
            ];
            $products[] = $newProduct;
            $products = json_encode($products);
            $stmt = $conn->prepare("UPDATE carts INNER JOIN account on carts.user_id = account.id SET product=? where username=?");
            $stmt->bind_param('ss', $products, $_SESSION['username']);
            $stmt->execute();
        }
    } catch(mysqli_sql_exception $e) {
        echo "Error: " . $e->getMessage(); // Xử lý lỗi nếu có
    }
}
?>