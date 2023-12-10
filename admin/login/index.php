<!DOCTYPE html>
<html>
<head>
</head>
<body>
<div class="login-container">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: "Times New Roman",sans-serif;
            font-size: 18px;
            background-color: #343a40;
        }

        .login-container {
            width: 300px;
            padding: 20px;
            border-radius: 5px;
            background-color: #212529;
        }

        .login-container h2 {
            text-align: center;
        }

        .login-container form {
            display: flex;
            flex-direction: column;
        }

        .login-container label, .login-container input {
            margin: 10px 0;
        }

        .login-container input[type="text"], .login-container input[type="password"] {
            color: white;
            padding: 5px;
            background-color: #343a40;
        }

        .login-container input[type="submit"] {
            padding: 10px;
            background: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .login-container input[type="submit"]:hover {
            background: #0056b3;
        }
    </style>
    <h2 style="color: #ffffff">Đăng nhập</h2>

    <form method="post" action="login.php">
        <label for="username" style="color: #ffffff">Tên đăng nhập:</label>
        <input type="text" id="username" name="username" required>
        <label for="password" style="color: #ffffff">Mật khẩu:</label>
        <input type="password" id="password" name="password" required>
        <input type="submit" value="Đăng nhập">
    </form>
</div>
</body>
</html>
