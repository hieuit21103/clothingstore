<?php
include('../connect.php');
if(isset($_GET['search'])) {
    $search = '%'.$_GET['search'].'%';
    $ordersPerPage = 10;
    $page = $_GET['page'] ?? 1;
    $start = ($page - 1) * $ordersPerPage;
    $sql = "SELECT *,orders.id as oid,orderstatus.name as oname FROM orders INNER JOIN orderstatus on orders.status = orderstatus.id WHERE orders.id LIKE ? LIMIT ?,?";
    $connection = new mysqli($server, $user, $pwd, $database);
    $stmt = $connection->prepare($sql);
    $stmt->bind_param('iii',$search, $start, $ordersPerPage);
    $stmt->execute();
    $result = $stmt->get_result();
    $orders = $result->fetch_all(MYSQLI_ASSOC);
    $stmt->close();
    $result->close();
    mysqli_close($connection);
}else{
    $ordersPerPage = 10;
    $page = $_GET['page'] ?? 1;
    $start = ($page - 1) * $ordersPerPage;

    $sql = "SELECT *,orders.id as oid,orderstatus.name as oname FROM orders INNER JOIN orderstatus on orders.status = orderstatus.id LIMIT ?,?";
    $connection = new mysqli($server, $user, $pwd, $database);
    $stmt = $connection->prepare($sql);
    $stmt->bind_param('ii', $start, $ordersPerPage);
    $stmt->execute();
    $result = $stmt->get_result();
    $orders = $result->fetch_all(MYSQLI_ASSOC);
    $stmt->close();
    $result->close();
    mysqli_close($connection);
}

$html = '<table class="table" style="color: #ffffff">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>User ID</th>
                    <th>Order Date</th>
                    <th>Done Date</th>
                    <th>Product</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>';
foreach ($orders as $order) {
    $html .= '<tr>';
    $html .= '<td>' . $order['oid'] . '</td>';
    $html .= '<td>' . $order['cus_id'] . '</td>';
    $html .= '<td>' . $order['order_date'] . '</td>';
    $html .= '<td>' . $order['done_date'] . '</td>';
    $html .= '<td>' . $order['product'] . '</td>';
    $html .= '<td>' . $order['total'] . '</td>';
    $html .= '<td>' . $order['oname'] . '</td>';
    switch ($order['status']){
        case 1:
            $html .= '<td><a class="btn btn-success" href="view/order/updatestatus.php?id='.$order['oid'].'">Accept</a> <a href="view/order/del.php?id='.$order['oid'].'" class="btn btn-danger">Cancel</a></td>';
            break;
        case 2:
            $html .= '<td><a class="btn btn-primary" href="view/order/updatestatus.php?id='.$order['oid'].'">Update</a> <a href="view/order/del.php?id='.$order['oid'].'" class="btn btn-danger">Cancel</a></td>';
            break;
        case 3:
            $html .= '<td><a href="view/order/del.php?id='.$order['oid'].'" class="btn btn-danger">Delete</a></td>';
    }
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

