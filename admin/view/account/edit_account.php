<?php
session_start();
include("../connect.php");
if(isset($_SESSION['username'])){
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $conn = new mysqli($server,$user,$pwd,$database);
        $stmt = $conn->prepare("SELECT * FROM account WHERE id=?");
        $stmt->bind_param('i',$_POST['accountId']);
        $stmt->execute();
        $accountData = mysqli_fetch_assoc($stmt->get_result());
    }
}
?>
<div class="modal-header" style="color: black">
    <h1 class="modal-title" id="editAccountModalLabel">Edit account incredential</h1>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
    <form id="editAccountForm" style="color: black" method="post" onsubmit="return checkMatchingPassword('editAccountForm','view/account/edit_account_process.php?id=<?php echo htmlspecialchars($accountData['id']);?>','edit-password','edit-repassword')">
        <label>Password</label>
        <input class="form-control" id='edit-password' type="password" placeholder="Password" aria-label="default input example" name="accountPwd" required>
        <label>Re-password</label>
        <input class="form-control" id='edit-repassword' type="password" placeholder="Re-password" aria-label="default input example" name="accountRePwd" required>
        <label>Role</label>
        <select class="form-control" name="accountRole">
            <option>Administrator</option>
            <option>User</option>
        </select>
        <br>
        <input class="form-control btn btn-primary" type="submit">
    </form>
</div>
