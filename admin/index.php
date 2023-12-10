<?php
session_start();
if(!isset($_SESSION['username'])){
    header("Location: login/index.php");
}else{
    if($_SESSION['role'] == 1){
        header("Location: http://localhost/clothingstore/");
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="style.css">
  <title>Admin Panel</title>
</head>
<body>
  <div class="container-fluid">
    <div class="row row-pd">
      <div class="col-md-4 col-lg-3 d-md-block">
        <a href="#dashboard" class="text-decoration-none">
          <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold px-3 mr-1">E</span>Shopper</h1>
        </a>
      </div>
      <div class="col-md-8 col-lg-9 d-md-block">
        <div class='dropdown'>
          <?php
          echo "<div class='dropbtn'>Xin chào ".$_SESSION['username']."</div>";
          ?>
          <div class="dropdown-content">
              <a href="http://localhost/clothingstore/admin/account/index.php">
                  Account setting
              </a>
              <a href="http://localhost/clothingstore/admin/login/logout.php">
                  Logout
              </a>
          </div>
        </div>
      </div>
    </div>
    <div class="row row-pd">
        <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link active" href="index.php#dashboard" id="nav-dashboard" onclick="loadContent('http://localhost/clothingstore/admin/view/dashboard.html');setActiveLink('nav-dashboard')">
                  Dashboard
                </a>
              </li>
              <li class="nav-item">
                <a href='index.php#accounts' class="nav-link" id="nav-accounts" onclick="loadContent('http://localhost/clothingstore/admin/view/account/index.php');setActiveLink('nav-accounts')">
                    Accounts
                </a>
              </li>
              <li class="nav-item">
                <a href='index.php#products' class="nav-link" id="nav-products" onclick="loadContent('http://localhost/clothingstore/admin/view/product/index.php');setActiveLink('nav-products')">
                  Products
                </a>
              </li>
              <li class="nav-item">
                <a href='index.php#categories' class="nav-link" id="nav-categories" onclick="loadContent('http://localhost/clothingstore/admin/view/category/index.php');setActiveLink('nav-categories')">
                    Categories
                </a>
              </li>
			  <li class="nav-item">
                <a class="nav-link" href="index.php#orders" id="nav-orders" onclick="loadContent('http://localhost/clothingstore/admin/view/order/index.php');setActiveLink('nav-orders')">
                  Orders
                </a>
              </li>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="http://localhost/clothingstore/admin/login/logout.php">
                  Logout
                </a>
              </li>
            </ul>
          </div>
        </nav>
      <div class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
        <div id="content"></div>
      </div>
    </div>
    <footer>
      <hr style="background-color: #ffffff">
    </footer>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
  <script src="http://localhost/clothingstore/admin/js/account.js"></script>
  <script src="http://localhost/clothingstore/admin/js/common.js"></script>
  <script>
    function loadContent(file) {
      jQuery.noConflict()
      jQuery.ajax({
        url: file,
        dataType: "html",
        success: function (data) {
          $("#content").html(data);
        },
        error: function (error) {
          console.log("Error loading content: ", error);
        }
      });
    }
    function setActiveLink(id) {
        document.querySelectorAll('.nav-link').forEach(function (navLink) {
            navLink.classList.remove('active');
        });
        document.getElementById(id).classList.add('active');
        document.getElementById(id).focus();
    }
    $(document).ready(function (){
        let sub = window.location.href.split("#");
        switch (sub[1]) {
            case 'dashboard':
                loadContent('http://localhost/clothingstore/admin/view/dashboard.html')
                setActiveLink('nav-dashboard')
                break
            case 'accounts':
                loadContent('http://localhost/clothingstore/admin/view/account/index.php')
                setActiveLink('nav-accounts')
                break
            case 'products':
                loadContent('http://localhost/clothingstore/admin/view/product/index.php')
                setActiveLink('nav-products')
                break
            case 'orders':
                loadContent('http://localhost/clothingstore/admin/view/order/index.php')
                setActiveLink('nav-orders')
                break
            case 'categories':
                loadContent('http://localhost/clothingstore/admin/view/category/index.php')
                setActiveLink('nav-categories')
                break
        }
    });
  </script>
</body>
</html>
