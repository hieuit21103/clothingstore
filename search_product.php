<?php
    if(isset($_POST['btn'])) {
        $search = $_POST['search_query'];
        header("location: shop.php?search=$search");
    }
?>