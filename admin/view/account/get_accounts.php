<?php
include('../connect.php');
if(isset($_GET['search'])){
    $search = '%'.$_GET['search'].'%';
    $accountsPerPage = 10;
    $page = $_GET['page'] ?? 1;
    $start = ($page - 1) * $accountsPerPage;
    $sql = "SELECT * FROM account WHERE username LIKE ? LIMIT ?,?";
    $connection = new mysqli($server, $user, $pwd, $database);
    $stmt = $connection->prepare($sql);
    $stmt->bind_param('sii',$search, $start, $accountsPerPage);
    $stmt->execute();
    $result = $stmt->get_result();
    $accounts = $result->fetch_all(MYSQLI_ASSOC);
    $stmt->close();
    $result->close();
    mysqli_close($connection);
}else {
    $accountsPerPage = 10;
    $page = $_GET['page'] ?? 1;
    $start = ($page - 1) * $accountsPerPage;
    $sql = "SELECT * FROM account LIMIT ?,? ";
    $connection = new mysqli($server, $user, $pwd, $database);
    $stmt = $connection->prepare($sql);
    $stmt->bind_param('ii', $start, $accountsPerPage);
    $stmt->execute();
    $result = $stmt->get_result();
    $accounts = $result->fetch_all(MYSQLI_ASSOC);
    $stmt->close();
    $result->close();
    mysqli_close($connection);
}
$html = '<table class="table" id="accountTable" style="color: #ffffff">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Role</th>
                </tr>
            </thead>
            <tbody>';
foreach ($accounts as $account) {
    $html .= '<tr>';
    $html .= '<td>' . $account['id'] . '</td>';
    $html .= '<td>' . $account['username'] . '</td>';
    $html .= '<td>' . $account['password'] . '</td>';
    $html .= '<td>' . $account['role'] . '</td>';
    $html .= '<td><a class="btn btn-primary" style="margin-right: 10px" data-toggle="modal" data-target="#editAccountModal" data-id="' . $account['id'] . '" onclick="retrieveAccountId(this)">Edit</a><a href="view/account/del_account.php?id=' . $account['id'] . '" class="btn btn-danger">Delete</a></td>';
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

