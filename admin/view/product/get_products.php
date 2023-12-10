<?php
include('../connect.php');
if(isset($_GET['search'])){
    $search = '%'.$_GET['search'].'%';
    $productsPerPage = 10;
    $page = $_GET['page'] ?? 1;
    $start = ($page - 1) * $productsPerPage;
    $sql = "SELECT *,products.id as pid,category.name as cname FROM products INNER JOIN category ON products.category=category.id WHERE products.name LIKE ? LIMIT ?,? ";
    $connection = new mysqli($server, $user, $pwd, $database);
    $stmt = $connection->prepare($sql);
    $stmt->bind_param('sii', $search,$start, $productsPerPage);
    $stmt->execute();
    $result = $stmt->get_result();
    $products = $result->fetch_all(MYSQLI_ASSOC);
    $stmt->close();
    $result->close();
    mysqli_close($connection);
}else {
    $productsPerPage = 10;
    $page = $_GET['page'] ?? 1;
    $start = ($page - 1) * $productsPerPage;
    $sql = "SELECT *,products.id as pid,category.name as cname FROM products INNER JOIN category ON products.category=category.id LIMIT ?,? ";
    $connection = new mysqli($server, $user, $pwd, $database);
    $stmt = $connection->prepare($sql);
    $stmt->bind_param('ii', $start, $productsPerPage);
    $stmt->execute();
    $result = $stmt->get_result();
    $products = $result->fetch_all(MYSQLI_ASSOC);
    $stmt->close();
    $result->close();
    mysqli_close($connection);
}
$html = '<table class="table" style="color: #ffffff">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Image URL</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>';
foreach ($products as $product) {
    $html .= '<tr>';
    $html .= '<td>' . $product['pid'] . '</td>';
    $html .= '<td>' . $product['name'] . '</td>';
    $html .= '<td>' . $product['img'] . '</td>';
    $html .= '<td>' . $product['cname'] . '</td>';
    $html .= '<td>' . $product['price'] . '</td>';
    $html .= '<td>' . $product['stock_quantity'] . '</td>';
    $html .= '<td><a class="btn btn-primary" style="margin-right: 10px" data-toggle="modal" data-target="#editProductModal" data-id="'.$product['pid'].'" onclick="retrieveProductId(this)">Edit</a><a href="view/product/del_product.php?id='.$product['pid'].'" class="btn btn-danger">Delete</a></td>';
    $html .= '</tr>';
}
$html .= '</tbody></table>';

$pagination = '<li class="page-item"><a class="page-link" href="#" data-page="' . ($page - 1) . '">Previous</a></li>';
$pagination .= '<li class="page-item"><span class="page-link">' . $page . '</span></li>';
$pagination .= '<li class="page-item"><a class="page-link" href="#" data-page="' . ($page + 1) . '">Next</a></li>';

header('Content-Type: application/json');

$response = [
    'content' => $html,
    'pagination' => $pagination,
    'max_pages' => '10'
];
echo json_encode($response);

