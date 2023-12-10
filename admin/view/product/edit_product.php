<?php
session_start();
include("../connect.php");
if(isset($_SESSION['username'])){
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $conn = new mysqli($server,$user,$pwd,$database);
        $stmt = $conn->prepare("SELECT * FROM products WHERE id=?");
        $stmt->bind_param('i',$_POST['productId']);
        $stmt->execute();
        $productData = mysqli_fetch_assoc($stmt->get_result());
    }
}
?>
<div class="modal-header" style="color: black">
    <h1 class="modal-title" id="editProductModalLabel">Chỉnh sửa sản phẩm</h1>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
    <form id="editForm" style="color: black" method="post" action="view/product/edit_product_process.php?id=<?php echo htmlspecialchars($productData['id']);?>" enctype="multipart/form-data">
        <label>Tên sản phẩm</label>
        <input class="form-control" type="text" name="productName" value="<?php echo $productData['name']; ?>" required>
        <label>Đường dẫn hình ảnh</label>
        <input class="form-control" type="file" name="productImage" required><br>
        <label>Phân loại</label>
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
        <label>Đơn giá</label>
        <input class="form-control" type="text" name="productPrice" value="<?php echo $productData['price']; ?>" required>
        <label>Tồn kho</label>
        <input class="form-control" type="text" name="productQuantity" value="<?php echo $productData['stock_quantity']; ?>" required><br>
        <input class="form-control btn btn-primary" type="submit">
    </form>
</div>
