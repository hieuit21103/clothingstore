<?php
session_start();
//check privillege for header
if(!isset($_SESSION['username'])){
    header('Location: ../login/index.php');
}
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container-xl">
    <div class="row row-mg">
        <div class="col-md-5 col-lg-4 d-md-block">
            <p style="font-size: 40px">Thông tin của bạn</p>
        </div>
        <div class="col-md-7 col-lg-8 d-md-block">
            <!-- Thay đổi mật khẩu -->
        </div>
    </div>
    <div class="row row-mg">
        <div class="col-md-5 col-lg-4 d-md-block">
            <div class="avatar-container">
                <img src="img/default.png" class="avatar">
                <button class="btn" onclick="triggerFileInput()">Add Image</button>
                <input type="file" id="fileInput" style="display: none" />
            </div>
        </div>
    </div>
    <div class="row row-mg">
        <div class="col-md-5 col-lg-4 d-md-block">
            <label class='label-title'>Full Name:</label>
        </div>
        <div class="col-md-7 col-lg-8 d-md-flex align-items-center">
            <label id="name" style="color: #ffffff;margin-right: auto;">Sample</label>
            <input type="text" id="nameInput" required>
            <label id='edit-name-btn' style="margin-left: auto;"><a onclick="triggerInput('name','nameInput',this,'editing-name')">Edit</a></label>
            <label class="editing-name" style="display: none;margin-right: 10px"><a onclick="saveChange('name','nameInput')">Save Change</a></label>
            <label class="editing-name" style="display: none;"><a onclick="cancel()">Cancel</a></label>
        </div>
    </div>
    <hr>
    <div class="d-md-block">Profile Information</div>
    <br>
    <div class="row row-mg">
        <div class="col-md-5 col-lg-4">
            <div class="d-md-block">
                <label class="label-title">Date of Birth:</label>
            </div>
        </div>
        <div class="col-md-7 col-lg-8 d-md-flex align-items-center">
            <label id="dob" style="color: #ffffff;margin-right: auto;">6/9/1969</label>
            <input type="date" id="dobInput">
            <label id='edit-dob-btn' style="margin-left: auto;"><a onclick="triggerInput('dob','dobInput',this,'editing-dob')">Edit</a></label>
            <label class="editing-dob" style="display: none;margin-right: 10px"><a onclick="saveChange('dob','dobInput')">Save Change</a></label>
            <label class="editing-dob" style="display: none;"><a onclick="cancel()">Cancel</a></label>
        </div>
    </div>
    <div class="row row-mg">
        <div class="col-md-5 col-lg-4 d-md-block">
            <label class="label-title">Address:</label>
        </div>
        <div class="col-md-7 col-lg-8 d-md-flex align-items-center">
            <label id="address" style="color: #ffffff;margin-right: auto;">Hải Phòng</label>
            <input type="text" id="addressInput">
            <label id='edit-address-btn' style="margin-left: auto;"><a onclick="triggerInput('address','addressInput',this,'editing-address')">Edit</a></label>
            <label class="editing-address" style="display: none;margin-right: 10px"><a onclick="saveChange('address','addressInput')">Save Change</a></label>
            <label class="editing-address" style="display: none;"><a onclick="cancel()">Cancel</a></label>
        </div>
    </div>
    <hr>
    <div class="d-md-block">Account Credential</div>
    <br>
    <div class="row row-mg">
        <div class="col-md-5 col-lg-4 d-md-block">
            <label class="label-title">Email:</label>
        </div>
        <div class="col-md-7 col-lg-8 d-md-flex align-items-center">
            <label id="email" style="color: #ffffff;margin-right: auto;">example@gmail.com</label>
            <input type="email" id="emailInput">
            <label id='edit-email-btn' style="margin-left: auto;"><a onclick="triggerInput('email','emailInput',this,'editing-email')">Edit</a></label>
            <label class="editing-email" style="display: none;margin-right: 10px"><a onclick="saveChange('email','emailInput')">Save Change</a></label>
            <label class="editing-email" style="display: none;"><a onclick="cancel()">Cancel</a></label>
        </div>
    </div>
    <div class="row row-mg">
        <div class="col-md-5 col-lg-4 d-md-block">
            <label class="label-title">Phone Number:</label>
        </div>
        <div class="col-md-7 col-lg-8 d-md-flex align-items-center">
            <label id="tel" style="color: #ffffff;margin-right: auto;">0123456789</label>
            <input type="number" id="telInput">
            <label id='edit-tel-btn' style="margin-left: auto;"><a onclick="triggerInput('tel','telInput',this,'editing-tel')">Edit</a></label>
            <label class="editing-tel" style="display: none;margin-right: 10px"><a onclick="saveChange('tel','telInput')">Save Change</a></label>
            <label class="editing-tel" style="display: none;"><a onclick="cancel()">Cancel</a></label>
        </div>
    </div>
    <div class="row row-mg">
        <div class="col-md-5 col-lg-4 d-md-block">
            <label class="label-title">Password:</label>
        </div>
        <div class="col-md-7 col-lg-8 d-md-flex align-items-center">
            <label id="pwd" style="color: #ffffff;margin-right: auto;">*************</label>
            <input type="password" id="pwdInput">
            <label id='edit-pwd-btn' style="margin-left: auto;"><a onclick="triggerInput('pwd','pwdInput',this,'editing-pwd')">Edit</a></label>
            <label class="editing-pwd" style="display: none;margin-right: 10px"><a onclick="saveChange('pwd','pwdInput')">Save Change</a></label>
            <label class="editing-pwd" style="display: none;"><a onclick="cancel()">Cancel</a></label>
        </div>
    </div>
</div>
<script>
    function triggerFileInput(){
        document.getElementById('fileInput').click();
    }
    function triggerInput(pre,input,currentButton,editingButton){
        document.getElementById(pre).style.display = 'none';
        document.getElementById(input).style.display = 'inline-block';
        let elements = document.getElementsByClassName(editingButton);
        for (let i = 0; i < elements.length; i++) {
            elements[i].style.display = 'inline-block';
        }
        currentButton.style.display = 'none'
    }
    function saveChange(inf,input){
        if (document.getElementById(input).value == null){
            location.reload();
        }
        document.getElementById(inf).value = document.getElementById(input).value;
        switch (inf){

        }
        location.reload();
    }
    function cancel(){
        location.reload();
    }
</script>
</body>
</html>