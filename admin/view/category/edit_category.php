<?php
session_start();
include("../connect.php");
if(isset($_SESSION['username'])){
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $conn = new mysqli($server,$user,$pwd,$database);
        $stmt = $conn->prepare("SELECT * FROM category WHERE id=?");
        $stmt->bind_param('i',$_POST['categoryId']);
        $stmt->execute();
        $productData = mysqli_fetch_assoc($stmt->get_result());
    }
}
?>
<div class="modal-header">
    <h1 style="color: black" class="modal-title" id="editCategoryModalLabel">Chỉnh sửa danh mục</h1>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body" style="color: black">
    <form id="editForm" action="view/category/edit_category_process.php?id=<?php echo htmlspecialchars($productData['id']);?>" method="post">
        <label>Tên danh mục</label>
        <input class="form-control" name="catName" type="text" placeholder="Tên danh mục" aria-label="default input example" required>
        <hr>
        <input type="submit" class="btn btn-primary" style="float: right">
    </form>
</div>