<div class="container mt-4">
    <h1>Account Management</h1>
    <form style="float: right">
        <input class="form-control" type="text" id="searchAccountInput" placeholder="Username">
    </form>
    <button class="btn btn-success mb-2" data-toggle="modal" data-target="#addAccountModal">Add Account</button>
    <div id="content-account">
    </div>
    <ul class="pagination" id="pagination-account">
    </ul>
</div>
<div class="modal fade" id="addAccountModal" tabindex="-1" role="dialog" aria-labelledby="addAccountModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addAccountModalLabel">Add Account</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="color: black">
                <form id="addAccountForm" onsubmit="return checkMatchingPassword('addAccountForm','view/account/add_account.php','add-password','add-repassword')" method="post">
                    <h1>Add a new account</h1>
                    <label>Username</label>
                    <input class="form-control" type="text" placeholder="Username" aria-label="default input example" name="accountName" required>
                    <label>Password</label>
                    <input class="form-control" id='add-password' type="password" placeholder="Password" aria-label="default input example" name="accountPwd" required>
                    <label>Re-password</label>
                    <input class="form-control" id='add-repassword' type="password" placeholder="Re-password" aria-label="default input example" name="accountRePwd" required>
                    <label>Role</label>
                    <select class="form-control" name="accountRole">
                        <option>Administrator</option>
                        <option>User</option>
                    </select>
                    <br>
                    <input type="submit" class="btn btn-success" style="float: right">
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="editAccountModal" tabindex="-1" role="dialog" aria-labelledby="editAccountModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    loadDataTable(1,'view/account/get_accounts.php','content-account','pagination-account')
    setPagination('pagination-account','view/account/get_accounts.php','content-account','pagination-account')
    setSearchInput('searchAccountInput','view/account/get_accounts.php','content-account','pagination-account')
</script>
