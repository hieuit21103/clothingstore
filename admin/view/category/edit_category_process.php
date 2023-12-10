<?php
session_start();
include("../connect.php");
if(isset($_SESSION['username'])) {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $conn = new mysqli($server, $user, $pwd, $database);
        if (isset($_GET['id'])) {
            $stmt = $conn->prepare("UPDATE category SET name=? WHERE id=?");
            $stmt->bind_param('si', $_POST['catName'], $_GET['id']);
            $stmt->execute();
            $stmt->close();
            header("Location: http://localhost/clothingstore/admin/index.php#categories");
        }
    }
}