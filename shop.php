<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>EShopper - Bootstrap Shop Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid">
        <div class="row align-items-center py-3 px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a href="" class="text-decoration-none">
                    <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">E</span>Shopper</h1>
                </a>
            </div>
            <div class="col-lg-6 col-6 text-left">
                <form action="">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for products">
                        <div class="input-group-append">
                            <span class="input-group-text bg-transparent text-primary">
                                <i class="fa fa-search"></i>
                            </span>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-3 col-6 text-right">
                <a href="cart.php" class="btn border">
                    <i class="fas fa-shopping-cart text-primary"></i>
                </a>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid">
        <div class="row border-top px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a class="btn shadow-none d-flex align-items-center justify-content-between bg-primary text-white w-100" data-toggle="collapse" href="#navbar-vertical" style="height: 65px; margin-top: -1px; padding: 0 30px;">
                    <h6 class="m-0">Categories</h6>
                    <i class="fa fa-angle-down text-dark"></i>
                </a>
                <nav class="collapse position-absolute navbar navbar-vertical navbar-light align-items-start p-0 border border-top-0 border-bottom-0 bg-light" id="navbar-vertical" style="width: calc(100% - 30px); z-index: 1;">
                    <div class="navbar-nav w-100 overflow-hidden" style="height: auto">
                        <a href="" class="nav-item nav-link">Shirts</a>
                        <a href="" class="nav-item nav-link">Jeans</a>
                        <a href="" class="nav-item nav-link">Jackets</a>
                        <a href="" class="nav-item nav-link">Shoes</a>
                    </div>
                </nav>
            </div>
            <div class="col-lg-9">
                <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
                    <a href="" class="text-decoration-none d-block d-lg-none">
                        <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">E</span>Shopper</h1>
                    </a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto py-0">
                            <a href="index.php" class="nav-item nav-link">Home</a>
                            <a href="shop.php" class="nav-item nav-link active">Shop</a>
                            <!-- <a href="detail.php" class="nav-item nav-link">Shop Detail</a>
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Pages</a>
                                <div class="dropdown-menu rounded-0 m-0">
                                    <a href="cart.php" class="dropdown-item">Shopping Cart</a>
                                    <a href="checkout.php" class="dropdown-item">Checkout</a>
                                </div>
                            </div> -->
                            <a href="contact.php" class="nav-item nav-link">Contact</a>
                        </div>
                        <div class="navbar-nav ml-auto py-0">
                            <div class="navbar-nav ml-auto py-0">
                                <div class="nav-item dropdown">
                                    <a href="#" class="nav-link" data-toggle="dropdown">
                                        <?php
                                        if(isset($_SESSION['username'])) {
                                        echo 'Hello, ' . $_SESSION['username'];
                                        ?>
                                    </a>
                                    <div class="dropdown-menu position-absolute bg-secondary border-0 rounded-0 w-150 m-0">
                                        <a href="change_password.php" class="dropdown-item">Change Password</a>
                                    </div>
                                </div>
                                <?php
                                echo '<a href="./logout.php" class="nav-item nav-link">Logout</a>';
                                } else {
                                    echo '<a href="./login.php" class="nav-item nav-link">Login</a>';
                                    echo '<a href="./register.php" class="nav-item nav-link">Register</a>';
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <!-- Navbar End -->


    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Our Shop</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="index.php">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Shop</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Shop Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <!-- Shop Sidebar Start -->
            <div class="col-lg-3 col-md-12">
                <!-- Price Start -->
                <div class="border-bottom mb-4 pb-4">
                    <h5 class="font-weight-semi-bold mb-4">Filter by price</h5>
                    <form>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" checked id="price-all">
                            <label class="custom-control-label" for="price-all">All Price</label>
                            <span class="badge border font-weight-normal">13</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="price-1">
                            <label class="custom-control-label" for="price-1">0 VND - 500,000 VND</label>
                            <span class="badge border font-weight-normal">7</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="price-2">
                            <label class="custom-control-label" for="price-2">500,000 VND - 1,000,000 VND</label>
                            <span class="badge border font-weight-normal">2</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="price-3">
                            <label class="custom-control-label" for="price-3">Over 1,000,000 VND</label>
                            <span class="badge border font-weight-normal">4</span>
                        </div>
                    </form>
                </div>
                <!-- Price End -->


<!--                <div class="border-bottom mb-4 pb-4">-->
<!--                    <h5 class="font-weight-semi-bold mb-4">Filter by </h5>-->
<!--                    <form>-->
<!--                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">-->
<!--                            <input type="checkbox" class="custom-control-input" checked id="color-all">-->
<!--                            <label class="custom-control-label" for="price-all">All Color</label>-->
<!--                            <span class="badge border font-weight-normal">1000</span>-->
<!--                        </div>-->
<!--                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">-->
<!--                            <input type="checkbox" class="custom-control-input" id="color-1">-->
<!--                            <label class="custom-control-label" for="color-1">Black</label>-->
<!--                            <span class="badge border font-weight-normal">150</span>-->
<!--                        </div>-->
<!--                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">-->
<!--                            <input type="checkbox" class="custom-control-input" id="color-2">-->
<!--                            <label class="custom-control-label" for="color-2">White</label>-->
<!--                            <span class="badge border font-weight-normal">295</span>-->
<!--                        </div>-->
<!--                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">-->
<!--                            <input type="checkbox" class="custom-control-input" id="color-3">-->
<!--                            <label class="custom-control-label" for="color-3">Red</label>-->
<!--                            <span class="badge border font-weight-normal">246</span>-->
<!--                        </div>-->
<!--                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">-->
<!--                            <input type="checkbox" class="custom-control-input" id="color-4">-->
<!--                            <label class="custom-control-label" for="color-4">Blue</label>-->
<!--                            <span class="badge border font-weight-normal">145</span>-->
<!--                        </div>-->
<!--                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between">-->
<!--                            <input type="checkbox" class="custom-control-input" id="color-5">-->
<!--                            <label class="custom-control-label" for="color-5">Green</label>-->
<!--                            <span class="badge border font-weight-normal">168</span>-->
<!--                        </div>-->
<!--                    </form>-->
<!--                </div>-->

            </div>
            <!-- Shop Sidebar End -->


            <!-- Shop Product Start -->
            <div class="col-lg-9 col-md-12">
                <div class="row pb-3">
                    <div class="col-12 pb-1">
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <form action="">
                                <div class="input-group">
<!--                                    <input type="text" class="form-control" placeholder="Search by name">-->
<!--                                    <div class="input-group-append">-->
<!--                                        <span class="input-group-text bg-transparent text-primary">-->
<!--                                            <i class="fa fa-search"></i>-->
<!--                                        </span>-->
<!--                                    </div>-->
                                </div>
                            </form>
                            <div class="dropdown ml-4">
<!--                                <button class="btn border dropdown-toggle" type="button" id="triggerId" data-toggle="dropdown" aria-haspopup="true"-->
<!--                                        aria-expanded="false">-->
<!--                                            Sort by-->
<!--                                        </button>-->
<!--                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="triggerId">-->
<!--                                    <a class="dropdown-item" href="#">Latest</a>-->
<!--                                    <a class="dropdown-item" href="#">Popularity</a>-->
<!--                                    <a class="dropdown-item" href="#">Best Rating</a>-->
<!--                                </div>-->
                            </div>
                        </div>
                    </div>
<!--                    <div class="col-lg-4 col-md-6 col-sm-12 pb-1">-->
<!--                        <div class="card product-item border-0 mb-4">-->
<!--                            <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">-->
<!--                                <img class="img-fluid w-100" src="img/product-1.jpg" alt="">-->
<!--                            </div>-->
<!--                            <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">-->
<!--                                <h6 class="text-truncate mb-3">Colorful Stylish Shirt</h6>-->
<!--                                <div class="d-flex justify-content-center">-->
<!--                                    <h6>$123.00</h6><h6 class="text-muted ml-2"><del>$123.00</del></h6>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                            <div class="card-footer d-flex justify-content-between bg-light border">-->
<!--                                <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>-->
<!--                                <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</a>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="col-lg-4 col-md-6 col-sm-12 pb-1">-->
<!--                        <div class="card product-item border-0 mb-4">-->
<!--                            <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">-->
<!--                                <img class="img-fluid w-100" src="img/product-2.jpg" alt="">-->
<!--                            </div>-->
<!--                            <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">-->
<!--                                <h6 class="text-truncate mb-3">Colorful Stylish Shirt</h6>-->
<!--                                <div class="d-flex justify-content-center">-->
<!--                                    <h6>$123.00</h6><h6 class="text-muted ml-2"><del>$123.00</del></h6>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                            <div class="card-footer d-flex justify-content-between bg-light border">-->
<!--                                <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>-->
<!--                                <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</a>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="col-lg-4 col-md-6 col-sm-12 pb-1">-->
<!--                        <div class="card product-item border-0 mb-4">-->
<!--                            <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">-->
<!--                                <img class="img-fluid w-100" src="img/product-3.jpg" alt="">-->
<!--                            </div>-->
<!--                            <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">-->
<!--                                <h6 class="text-truncate mb-3">Colorful Stylish Shirt</h6>-->
<!--                                <div class="d-flex justify-content-center">-->
<!--                                    <h6>$123.00</h6><h6 class="text-muted ml-2"><del>$123.00</del></h6>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                            <div class="card-footer d-flex justify-content-between bg-light border">-->
<!--                                <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>-->
<!--                                <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</a>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="col-lg-4 col-md-6 col-sm-12 pb-1">-->
<!--                        <div class="card product-item border-0 mb-4">-->
<!--                            <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">-->
<!--                                <img class="img-fluid w-100" src="img/product-4.jpg" alt="">-->
<!--                            </div>-->
<!--                            <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">-->
<!--                                <h6 class="text-truncate mb-3">Colorful Stylish Shirt</h6>-->
<!--                                <div class="d-flex justify-content-center">-->
<!--                                    <h6>$123.00</h6><h6 class="text-muted ml-2"><del>$123.00</del></h6>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                            <div class="card-footer d-flex justify-content-between bg-light border">-->
<!--                                <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>-->
<!--                                <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</a>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="col-lg-4 col-md-6 col-sm-12 pb-1">-->
<!--                        <div class="card product-item border-0 mb-4">-->
<!--                            <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">-->
<!--                                <img class="img-fluid w-100" src="img/product-5.jpg" alt="">-->
<!--                            </div>-->
<!--                            <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">-->
<!--                                <h6 class="text-truncate mb-3">Colorful Stylish Shirt</h6>-->
<!--                                <div class="d-flex justify-content-center">-->
<!--                                    <h6>$123.00</h6><h6 class="text-muted ml-2"><del>$123.00</del></h6>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                            <div class="card-footer d-flex justify-content-between bg-light border">-->
<!--                                <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>-->
<!--                                <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</a>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="col-lg-4 col-md-6 col-sm-12 pb-1">-->
<!--                        <div class="card product-item border-0 mb-4">-->
<!--                            <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">-->
<!--                                <img class="img-fluid w-100" src="img/product-6.jpg" alt="">-->
<!--                            </div>-->
<!--                            <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">-->
<!--                                <h6 class="text-truncate mb-3">Colorful Stylish Shirt</h6>-->
<!--                                <div class="d-flex justify-content-center">-->
<!--                                    <h6>$123.00</h6><h6 class="text-muted ml-2"><del>$123.00</del></h6>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                            <div class="card-footer d-flex justify-content-between bg-light border">-->
<!--                                <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>-->
<!--                                <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</a>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="col-lg-4 col-md-6 col-sm-12 pb-1">-->
<!--                        <div class="card product-item border-0 mb-4">-->
<!--                            <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">-->
<!--                                <img class="img-fluid w-100" src="img/product-7.jpg" alt="">-->
<!--                            </div>-->
<!--                            <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">-->
<!--                                <h6 class="text-truncate mb-3">Colorful Stylish Shirt</h6>-->
<!--                                <div class="d-flex justify-content-center">-->
<!--                                    <h6>$123.00</h6><h6 class="text-muted ml-2"><del>$123.00</del></h6>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                            <div class="card-footer d-flex justify-content-between bg-light border">-->
<!--                                <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>-->
<!--                                <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</a>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="col-lg-4 col-md-6 col-sm-12 pb-1">-->
<!--                        <div class="card product-item border-0 mb-4">-->
<!--                            <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">-->
<!--                                <img class="img-fluid w-100" src="img/product-8.jpg" alt="">-->
<!--                            </div>-->
<!--                            <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">-->
<!--                                <h6 class="text-truncate mb-3">Colorful Stylish Shirt</h6>-->
<!--                                <div class="d-flex justify-content-center">-->
<!--                                    <h6>$123.00</h6><h6 class="text-muted ml-2"><del>$123.00</del></h6>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                            <div class="card-footer d-flex justify-content-between bg-light border">-->
<!--                                <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>-->
<!--                                <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</a>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="col-lg-4 col-md-6 col-sm-12 pb-1">-->
<!--                        <div class="card product-item border-0 mb-4">-->
<!--                            <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">-->
<!--                                <img class="img-fluid w-100" src="img/product-1.jpg" alt="">-->
<!--                            </div>-->
<!--                            <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">-->
<!--                                <h6 class="text-truncate mb-3">Colorful Stylish Shirt</h6>-->
<!--                                <div class="d-flex justify-content-center">-->
<!--                                    <h6>$123.00</h6><h6 class="text-muted ml-2"><del>$123.00</del></h6>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                            <div class="card-footer d-flex justify-content-between bg-light border">-->
<!--                                <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>-->
<!--                                <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</a>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="col-12 pb-1">-->
<!--                        <nav aria-label="Page navigation">-->
<!--                          <ul class="pagination justify-content-center mb-3">-->
<!--                            <li class="page-item disabled">-->
<!--                              <a class="page-link" href="#" aria-label="Previous">-->
<!--                                <span aria-hidden="true">&laquo;</span>-->
<!--                                <span class="sr-only">Previous</span>-->
<!--                              </a>-->
<!--                            </li>-->
<!--                            <li class="page-item active"><a class="page-link" href="#">1</a></li>-->
<!--                            <li class="page-item"><a class="page-link" href="#">2</a></li>-->
<!--                            <li class="page-item">-->
<!--                              <a class="page-link" href="#" aria-label="Next">-->
<!--                                <span aria-hidden="true">&raquo;</span>-->
<!--                                <span class="sr-only">Next</span>-->
<!--                              </a>-->
<!--                            </li>-->
<!--                          </ul>-->
<!--                        </nav>-->
<!--                    </div>-->
                    <div class="container-fluid pt-5">
                        <div class="text-center mb-4">
                            <h2 class="section-title px-5"><span class="px-2">Products</span></h2>
                        </div>
                        <div class="row px-xl-5 pb-3">
                            <?php
                            include "connect.php";
                            $recordsPerPage = 8;
                            if(isset($_GET['search'])){
                                $conn = new PDO("mysql:host=$server;dbname=$database", $username, $password);
                                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                $search = "%".$_GET['search']."%";
                                $totalCountQuery = "SELECT COUNT(*) as total FROM products";
                                $totalCountStmt = $conn->prepare($totalCountQuery);
                                $totalCountStmt->execute();
                                $totalCount = $totalCountStmt->fetch(PDO::FETCH_ASSOC)['total'];

                                $currentPage = isset($_GET['page']) && is_numeric($_GET['page']) ? $_GET['page'] : 1;
                                $offset = ($currentPage - 1) * $recordsPerPage;
                                $query = "SELECT * FROM products WHERE name LIKE :name LIMIT :offset, :recordsPerPage";
                                $stmt = $conn->prepare($query);
                                $stmt->bindParam(':name', $search);
                                $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
                                $stmt->bindParam(':recordsPerPage', $recordsPerPage, PDO::PARAM_INT);
                                $stmt->execute();
                            }else {
                                $conn = new PDO("mysql:host=$server;dbname=$database", $username, $password);
                                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                                $totalCountQuery = "SELECT COUNT(*) as total FROM products";
                                $totalCountStmt = $conn->prepare($totalCountQuery);
                                $totalCountStmt->execute();
                                $totalCount = $totalCountStmt->fetch(PDO::FETCH_ASSOC)['total'];

                                $currentPage = isset($_GET['page']) && is_numeric($_GET['page']) ? $_GET['page'] : 1;
                                $offset = ($currentPage - 1) * $recordsPerPage;
                                $query = "SELECT * FROM products LIMIT :offset, :recordsPerPage";
                                $stmt = $conn->prepare($query);
                                $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
                                $stmt->bindParam(':recordsPerPage', $recordsPerPage, PDO::PARAM_INT);
                                $stmt->execute();
                            }
                            if ($stmt->rowCount() > 0) {
                                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                    ?>
                                    <div class="col-lg-4 col-md-6 col-sm-12 pb-1">
                                        <div class="card product-item border-0 mb-4">
                                            <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                                                <img class="img-fluid w-100" style="height: 480px;" src="http://localhost/clothingstore/admin/view/product/<?php echo $row['img']; ?>" alt="<?php echo $row['name']; ?>">
                                            </div>
                                            <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                                                <h6 class="text-truncate mb-3"><?php echo $row['name']; ?></h6>
                                                <div class="d-flex justify-content-center">
                                                    <h6><?php echo $row['price']; ?> VND</h6>
                                                    <h6 class="text-muted ml-2">Quantity: <?php echo $row['stock_quantity']; ?></h6>
                                                </div>
                                            </div>
                                            <div class="card-footer d-flex justify-content-between bg-light border">
                                                <button class="btn btn-sm text-dark p-0 add-to-cart-btn" data-product-id="<?php echo $row['id']; ?>">
                                                    <i class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart
                                                </button>
                                                <a href="#" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Check Out</a>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                }
                                $totalPages = ceil($totalCount / $recordsPerPage);
                                echo '<div class="pagination justify-content-center col-12">';
                                if ($currentPage > 1) {
                                    echo '<a href="?page=' . ($currentPage - 1) . '" class="page-link">Previous</a>';
                                }
                                for ($i = 1; $i <= $totalPages; $i++) {
                                    echo '<a href="?page=' . $i . '" class="page-link">' . $i . '</a>';
                                }
                                if ($currentPage < $totalPages) {
                                    echo '<a href="?page=' . ($currentPage + 1) . '" class="page-link">Next</a>';
                                }
                                echo '</div>';
                            }
                            ?>
                        </div>
                    </div>

                </div>
            </div>
            <!-- Shop Product End -->
        </div>
    </div>
    <!-- Shop End -->


    <!-- Footer Start -->
    <div class="container-fluid bg-secondary text-dark mt-5 pt-5">
        <div class="row px-xl-5 pt-5">
            <div class="col-lg-4 col-md-12 mb-5 pr-3 pr-xl-5">
                <a href="" class="text-decoration-none">
                    <h1 class="mb-4 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border border-white px-3 mr-1">E</span>Shopper</h1>
                </a>
                <p>Dolore erat dolor sit lorem vero amet. Sed sit lorem magna, ipsum no sit erat lorem et magna ipsum dolore amet erat.</p>
                <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i>123 Lach Tray, Ngo Quyen, Hai Phong, Vietnam</p>
                <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i>hieu92264@st.vimaru.edu.vn</p>
                <p class="mb-0"><i class="fa fa-phone-alt text-primary mr-3"></i>+012 345 67890</p>
            </div>
            <div class="col-lg-8 col-md-12">
                <div class="row">
                    <div class="col-md-4 mb-5">
                        <h5 class="font-weight-bold text-dark mb-4">Quick Links</h5>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="text-dark mb-2" href="index.php"><i class="fa fa-angle-right mr-2"></i>Home</a>
                            <a class="text-dark mb-2" href="shop.php"><i class="fa fa-angle-right mr-2"></i>Our Shop</a>
                            <a class="text-dark mb-2" href="detail.php"><i class="fa fa-angle-right mr-2"></i>Shop Detail</a>
                            <a class="text-dark mb-2" href="cart.php"><i class="fa fa-angle-right mr-2"></i>Shopping Cart</a>
                            <a class="text-dark mb-2" href="checkout.php"><i class="fa fa-angle-right mr-2"></i>Checkout</a>
                            <a class="text-dark" href="contact.php"><i class="fa fa-angle-right mr-2"></i>Contact Us</a>
                        </div>
                    </div>
                    <div class="col-md-4 mb-5">
                        <h5 class="font-weight-bold text-dark mb-4">Quick Links</h5>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="text-dark mb-2" href="index.php"><i class="fa fa-angle-right mr-2"></i>Home</a>
                            <a class="text-dark mb-2" href="shop.php"><i class="fa fa-angle-right mr-2"></i>Our Shop</a>
                            <a class="text-dark mb-2" href="detail.php"><i class="fa fa-angle-right mr-2"></i>Shop Detail</a>
                            <a class="text-dark mb-2" href="cart.php"><i class="fa fa-angle-right mr-2"></i>Shopping Cart</a>
                            <a class="text-dark mb-2" href="checkout.php"><i class="fa fa-angle-right mr-2"></i>Checkout</a>
                            <a class="text-dark" href="contact.php"><i class="fa fa-angle-right mr-2"></i>Contact Us</a>
                        </div>
                    </div>
                    <div class="col-md-4 mb-5">
                        <h5 class="font-weight-bold text-dark mb-4">Newsletter</h5>
                        <form action="">
                            <div class="form-group">
                                <input type="text" class="form-control border-0 py-4" placeholder="Your Name" required="required" />
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control border-0 py-4" placeholder="Your Email"
                                    required="required" />
                            </div>
                            <div>
                                <button class="btn btn-primary btn-block border-0 py-3" type="submit">Subscribe Now</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <!-- Footer End -->
        <!--    notify start-->
        <div id="notification" class="notification position-fixed rounded bg-white" style="display: none; top: 20px; right: 20px; padding: 10px; max-width: 500px; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);">
            <div class="position-relative notification-container p-3" style="border: 1px solid #ccc;">
        <span class="notification--close position-absolute cursor-pointer" style="top: 5px; right: 5px;">
            <i class="fas fa-times"></i>
        </span>
                <span class="text-nowrap notification__title" style="font-weight: bold;">
            <i class="fas fa-check-circle text-success mr-1"></i> Thêm vào giỏ hàng thành công!
        </span>
                <a href="./cart.php" class="btn btn-danger btn-block btn-sm mt-3" style="border-radius: 5px;">Xem giỏ hàng và thanh toán</a>

                <!--            <button class="btn btn-danger btn-block btn-sm mt-3" tabindex="0" style="border-radius: 5px;">Xem giỏ hàng và thanh toán</button>-->
            </div>
        </div>
        <div id="success-notification" class="notification position-fixed rounded bg-white" style="display: none; top: 20px; right: 20px; padding: 10px; max-width: 500px; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);">
            <div class="position-relative notification-container p-3" style="border: 1px solid #ccc;">
        <span class="notification--close position-absolute cursor-pointer" style="top: 5px; right: 5px;">
            <i class="fas fa-times"></i>
        </span>
                <span class="text-nowrap notification__title" style="font-weight: bold;">
            <i class="fas fa-check-circle text-success mr-1"></i> Sản phẩm đã được thêm vào giỏ hàng!
        </span>
                <a href="./cart.php" class="btn btn-danger btn-block btn-sm mt-3" style="border-radius: 5px;">Xem giỏ hàng và thanh toán</a>
            </div>
        </div>




        <!--    notify end-->

    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
        <script src="./js/add_cart.js"></script>
</body>

</html>