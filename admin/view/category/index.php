<div class="container mt-4">
    <h1>Category Management</h1>
    <form style="float: right">
        <input class="form-control" type="text" id="searchCategoryInput" placeholder="Category name">
    </form>
    <button class="btn btn-success mb-2" data-toggle="modal" data-target="#addCategoryModal">Add Category</button>
    <div id="content-Category">
        <table class="table" id='categoryTable' style="color: #ffffff">
            <thead>
            <tr>
                <th>ID</th>
                <th>Category Name</th>
            </tr>
            </thead>
            <tbody>
            <?php
                include("../connect.php");
                $conn = new mysqli($server,$user,$pwd,$database);
                $sql = "select * from category";
                $result = mysqli_query($conn,$sql);
                $categories = [];
                while($row = mysqli_fetch_assoc($result)){
                    $categories[] = $row;
                }
                foreach ($categories as $category){
                    echo  '<tr>';
                    echo  '<td>' . $category['id'] . '</td>';
                    echo  '<td>' . $category['name'] . '</td>';
                    echo  '<td><a onclick="retrieveCategoryId(this)" class="btn btn-primary" style="margin-right: 10px" data-toggle="modal" data-target="#editCategoryModal" data-id="'.$category['id'].'">Edit</a><a href="view/category/del_category.php?id='.$category['id'].'" class="btn btn-danger">Delete</a></td>';
                    echo  '</tr>';
                }
            ?>
            </tbody>
        </table>
    </div>
    </ul>
</div>
<div class="modal fade" id="addCategoryModal" tabindex="-1" role="dialog" aria-labelledby="addCategoryModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addCategoryModalLabel">Add Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="addCategoryForm" action="view/category/add_category.php" method="post">
                    <h1 style="color: black">Thêm danh mục sản phẩm</h1>
                    <input class="form-control" type="text" placeholder="Tên danh mục" name="catName" aria-label="default input example" required>
                    <hr>
                    <button type="submit" class="btn btn-success" style="float: right">Add Category</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="editCategoryModal" tabindex="-1" role="dialog" aria-labelledby="editCategoryModalLabel"
     aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        </div>
    </div>
</div>
<script>
    setSearchInputAlt('searchCategoryInput','categoryTable')
</script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>