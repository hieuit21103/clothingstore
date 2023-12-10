function checkMatchingPassword(formId,action,id1,id2) {
    var password = document.getElementById(id1).value;
    var repassword = document.getElementById(id2).value;

    if (password !== repassword) {
        alert("Mật khẩu nhập lại không khớp. Vui lòng kiểm tra lại.");
        return false;
    }

    var form = document.getElementById(formId);

    form.action = action;

    return true;
}
