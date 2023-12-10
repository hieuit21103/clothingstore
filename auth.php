<?php
session_start();
//tiến hành kiểm tra là người dùng đã đăng nhập hay chưa
//nếu chưa, chuyển hướng người dùng ra lại trang đăng nhập
if (isset($_SESSION['username']) || $_SESSION['username'] == null) {
    header('Location: login.php');
}
?>