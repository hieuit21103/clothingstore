function loadDataTable(page,url,content,pagination) {
    axios.get(url, { params: { page: page } })
        .then(response => {
            document.getElementById(content).innerHTML = response.data.content;
            document.getElementById(pagination).innerHTML = response.data.pagination;
        })
        .catch(error => {
            console.error('Error loading content:', error);
        })
}

function loadFiltedDataTable(page,search,url,content,pagination) {
    axios.get(url, { params: { page: page , search: search} })
        .then(response => {
            document.getElementById(content).innerHTML = response.data.content;
            document.getElementById(pagination).innerHTML = response.data.pagination;
        })
        .catch(error => {
            console.error('Error loading content:', error);
        })
}

function setPagination(id,url,content,pagination) {
    document.getElementById(id).addEventListener('click', function (event) {
        if (event.target.tagName === 'A') {
            event.preventDefault();
            const page = event.target.getAttribute('data-page');
            loadDataTable(page,url,content,pagination);
        }
    });
}
function setSearchInputAlt(elementId,tableId){
    document.getElementById(elementId).addEventListener('input', function() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById(elementId);
        filter = input.value.toUpperCase();
        table = document.getElementById(tableId);
        tr = table.getElementsByTagName('tr');

        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName('td')[1];
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = '';
                } else {
                    tr[i].style.display = 'none';
                }
            }
        }
    })
}
function setSearchInput(elementId,url,content,pagination){
    document.getElementById(elementId).addEventListener('input', function() {
        if (document.getElementById(elementId).value === ""){
            loadDataTable(1,url,content,pagination)
        }else {
            loadFiltedDataTable(1, document.getElementById(elementId).value, url, content, pagination)
        }
    });
}

function retrieveAccountId(element) {
    let dataId = element.getAttribute('data-id');
    jQuery.ajax({
        url: 'view/account/edit_account.php',
        type: 'post',
        data: { accountId: dataId },
        dataType: 'html',
        success: function (modalContent) {
            jQuery('#editAccountModal .modal-content').html(modalContent);
        },
        error: function (error) {
            console.log(error);
        }
    });
}

function retrieveCategoryId(element) {
    let dataId = element.getAttribute('data-id');
    jQuery.ajax({
        url: 'view/category/edit_category.php',
        type: 'post',
        data: { categoryId: dataId },
        dataType: 'html',
        success: function (modalContent) {
            jQuery('#editCategoryModal .modal-content').html(modalContent);
        },
        error: function (error) {
            console.log(error);
        }
    });
}

function retrieveProductId(element) {
    let dataId = element.getAttribute('data-id');
    jQuery.ajax({
        url: 'view/product/edit_product.php',
        type: 'post',
        data: { productId: dataId },
        dataType: 'html',
        success: function (modalContent) {
            jQuery('#editProductModal .modal-content').html(modalContent);
        },
        error: function (error) {
            console.log(error);
        }
    });
}