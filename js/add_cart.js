// document.addEventListener("DOMContentLoaded", function() {
    const btn_add = document.querySelectorAll('.add-to-cart-btn');
    btn_add.forEach(btn => {
        btn.addEventListener('click', function () {
            retrieveProductId(btn);
        });
    });
//});

function retrieveProductId(element) {
    let dataId = element.getAttribute('data-product-id');
    // window.location.href = 'insert_item.php?id='+dataId
    jQuery.ajax({
        url: "./insert_item.php",
        type: 'post',
        data: { productId: dataId },
        dataType: 'html',
        success: function () {
            const notificationBox = document.getElementById('notification');
            notificationBox.style.display = 'block';
            setTimeout(function () {
                notificationBox.style.display = 'none';
            }, 3000);
        },
        error: function (error) {
            console.log(error);
        }
    });
}

    $(document).ready(function(){
    $(".nav-name.dropdown").hover(function(){
        $(".dropdown-content", this).stop().slideDown(200);
    }, function(){
        $(".dropdown-content", this).stop().slideUp(200);
    });
});

