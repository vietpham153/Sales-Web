<?php

// Kết nối CSDL
$conn = mysqli_connect ('localhost', 'root', '', 'doan') or die ('Không thể kết nối tới database');
mysqli_set_charset($conn, 'UTF8');

// Khởi tạo SESSION
session_start();
if (isset($_SESSION['username'])){
unset($_SESSION['username']);
}

// Dùng Isset kiem tra
if (isset($_POST['login'])) {   

$username = addslashes($_POST['username']);
$password = addslashes($_POST['password']);

if(empty($username)){
    header("Location: dangnhap.php?error=Vui lòng nhập tên tài khoản");
    exit();
}else if(empty($password)){
    header("Location: dangnhap.php?error=Vui lòng nhập mật khẩu");
    exit();
}

// mã hóa pasword


//Kiểm tra tên đăng nhập có tồn tại không
$query = "SELECT username, password FROM user WHERE username='$username' and password='$password'";

$result = mysqli_query($conn, $query) or die( mysqli_error($conn));

$row = mysqli_fetch_array($result);

//So sánh 2 mật khẩu có trùng khớp hay không
if ($password != $row['password']) {
    header("Location: dangnhap.php?error=Tên tài khoản hoặc mật khẩu không chính xác");
    exit();
}else {
    //Lưu tên đăng nhập
    session_start();
    $_SESSION['username'] = $username;
    header("Location: index.php");
    exit();
    }
}else if(isset($_POST['register']))
    header("Location: dangky.php")
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Đăng nhập</title>
<link rel="stylesheet" href="style.css"/>

    <style>
        table{
            border: 2px solid #00ccff; 
            padding: 0 30px 0 30px; 
            width: 25%; 
            border-radius: 15px; 
            margin: 100px auto 0 auto
        }
        th{
            padding-top: 50px; 
            font-size: 30px; 
            color: #00ccff;
        }
        .textbox>input{
            border: none;
            border-bottom: 2px solid #00ccff;
            padding-left: 15px;
            font-size: 1.1em;
            height: 40px;
        }
        .textbox>input:hover{
            background-color: #00ccff;
            color: white;
            border-radius: 15px;
        }
        .textbox>input:focus{
            background-color: #00ccff;
            color: white;
            border-radius: 15px;
        }
        .login{
            padding-top: 70px;
        }
        .login>input{
            padding: 11px 25px; 
            background-color: #00ccff; 
            border-radius: 4px; 
            border: 1px solid #00ccff;
            width: 320px;
            color: white;
            font-size: 18px;
        }
        .login>input:hover{
            background-color: rgb(247, 185, 72); 
            border: 1px solid #00ccff;
        }
        .register{
            padding-top: 10px;
        }
        .register>input{
            padding: 5px 20px; 
            border-radius: 4px; 
            border: 1px solid gray;
            width: 320px;
            font-size: 18px;
        }
        .register>input:hover{
            border: 2px solid #00ccff;
        }
        .forgot_pw{
            padding-top: 20px;
        }
        .forgot_pw>a{
            color: #00ccff;
        }
        .error_login{
            background: #F2DEDE;
            color: #A94442;
            padding: 10px;
        }
    </style>
</head>
<body>
    <form action='<?php ($_SERVER['PHP_SELF'])?>' class="dangnhap" method='POST'>
        <table>
            <th>
                Đăng nhập
            </th>
            <tr>
                <td align="center" style="padding: 30px 0 20px 0">
                <!-- xuất ra lỗi -->
                <?php if(isset($_GET['error'])){ ?>
                    <p class="error_login"><?php echo $_GET['error']; ?></p>
                <?php } ?>
                    <div class="textbox"><input type='text' name='username' size="30" placeholder = "Tên đăng nhập"/></div>
                </td>
            </tr>
            <tr>
                <td align="center" style="padding-bottom: 40px;">
                    <div class="textbox"><input type='password' name='password' placeholder="Mật khẩu" size="30"/><br></div>
                    <div class="login"><input type='submit' class="button" name="login" value='Đăng nhập'/></div>
                    <div class="register"><input type='submit' name="register" value='Đăng ký'/></div>
                    <div class="forgot_pw"><a href="">Quên mật khẩu?</a></div>
                </td>
            </tr>
        </table>   
    <form>
</body>
</html>
