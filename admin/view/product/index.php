<div class="container mt-4">
    <h1>Product Management</h1>
    <form style="float: right">
        <input class="form-control" type="text" id="searchProductInput" placeholder="Product Name">
    </form>
    <button class="btn btn-success mb-2" data-toggle="modal" data-target="#addProductModal">Add Product</button>
    <div id="content-product">
    </div>
    <ul class="pagination" id="pagination-product">
    </ul>
</div>
<div class="modal fade" id="addProductModal" tabindex="-1" role="dialog" aria-labelledby="addProductModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addProductModalLabel">Add Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="addProductForm" action="view/product/add_product.php" method="post" enctype="multipart/form-data">
                    <h1 style="color: black">Thêm sản phẩm</h1>
                    <input class="form-control" type="text" placeholder="Tên sản phẩm" aria-label="default input example" name="productName" required>
                    <br>
                    <select class="form-control" name="productCat">
                        <?php
                            include "../connect.php";
                            if(isset($server) && isset($user) && isset($pwd) && isset($database)){
                                try {
                                    $conn = new mysqli($server,$user,$pwd,$database);
                                    $sql = "SELECT * FROM CATEGORY";
                                    $results = mysqli_query($conn,$sql);
                                    $cats = [];
                                    while ($row = mysqli_fetch_assoc($results)){
                                        $cats[] = $row;
                                    }
                                    foreach ($cats as $row){
                                        echo "<option>".$row['name']."</option>";
                                    }
                                }catch (mysqli_sql_exception $e){
                                    die($e->getMessage());
                                }
                            }
                        ?>
                    </select>
                    <br>
                    <input class="form-control" type="file" name="productImg" required>
                    <br>
                    <input class="form-control" type="text" name="productQty" placeholder="Số lượng" min="0" required>
                    <br>
                    <input class="form-control" type="text" name="productPrice" placeholder="Đơn giá" min="0" required>
                    <hr>
                    <button type="submit" class="btn btn-success" style="float: right">Add Product</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="editProductModal" tabindex="-1" role="dialog" aria-labelledby="editProductModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        </div>
    </div>
</div>
<script>
        loadDataTable(1,'view/product/get_products.php','content-product','pagination-product');
        setPagination('pagination-product','view/product/get_products.php','content-product','pagination-product')
        setSearchInput('searchProductInput','view/product/get_products.php','content-product','pagination-product')
</script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
