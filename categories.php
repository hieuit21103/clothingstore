<?php

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Products - Bootstrap Shop Template</title>
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
<div class="container-fluid pt-5">
    <div class="text-center mb-4">
        <h2 class="section-title px-5"><span class="px-2">Products</span></h2>
    </div>
    <div class="row px-xl-5 pb-3">
        <?php
        include "connect.php";
        $recordsPerPage = 8;

        $conn = new PDO("mysql:host=$server;dbname=$database", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $totalCountQuery = "SELECT COUNT(*) as total FROM products";
        $totalCountStmt = $conn->prepare($totalCountQuery);
        $totalCountStmt->execute();
        $totalCount = $totalCountStmt->fetch(PDO::FETCH_ASSOC)['total'];

        $currentPage = isset($_GET['page']) && is_numeric($_GET['page']) ? $_GET['page'] : 1;
        $offset = ($currentPage - 1) * $recordsPerPage;
        if(isset($_GET['type'])) {
            switch ($_GET['type']) {
                case 'shirts': {
                    $category_id = 1;
                    break;
                }
                case 'jeans': {
                    $category_id = 2;
                    break;
                }
                case 'jackets': {
                    $category_id = 3;
                    break;
                }
                case 'shoes': {
                    $category_id = 4;
                    break;
                }
                default :
                    break;
            }
        }

        $query = "SELECT * FROM products where category_id = :id LIMIT :offset, :recordsPerPage";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':id', $category_id);
        $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
        $stmt->bindParam(':recordsPerPage', $recordsPerPage, PDO::PARAM_INT);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                ?>
                <div class="col-lg-4 col-md-6 col-sm-12 pb-1">
                    <div class="card product-item border-0 mb-4">
                        <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                            <img class="img-fluid w-100" style="height: 280px;" src="./img/<?php echo $row['img']; ?>" alt="<?php echo $row['name']; ?>">
                        </div>
                        <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                            <h6 class="text-truncate mb-3"><?php echo $row['name']; ?></h6>
                            <div class="d-flex justify-content-center">
                                <h6><?php echo $row['price']; ?> VND</h6>
                                <h6 class="text-muted ml-2">Quantity: <?php echo $row['stock_quantity']; ?></h6>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-between bg-light border">
                            <a href="view_product.php?id=<?php echo $row['id']; ?>" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>
                            <a href="checkout.php?id=<?php echo $row['id']; ?>" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Check Out</a>
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

</body>
</html>
