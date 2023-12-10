<div class="container mt-4">
    <h1>Orders Management</h1>
    <form style="float: right">
        <input class="form-control" type="text" id="searchOrderInput" placeholder="Order Id">
    </form>
    <div id="content-order">
    </div>
    <ul class="pagination" id="pagination-order">
    </ul>
</div>
<script>
    loadDataTable(1,'view/order/get_order.php','content-order','pagination-order');
    setPagination('pagination-order','view/order/get_order.php','content-order','pagination-order')
    setSearchInput('searchOrderInput','view/order/get_order.php','content-order','pagination-order')
</script>

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
