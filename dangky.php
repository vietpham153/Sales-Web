<?php
$conn = mysqli_connect("localhost","root","","doan") or die($conn);

if (isset($_POST['btn'])){

$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$phone = $_POST['phone'];
$address = $_POST['address'];


$query = mysqli_query($conn, "INSERT INTO user (Username, Password, Phone, Email, Address) VALUES ('$username','$password', '$phone', '$email', '$address')");
session_start();
$_SESSION['username'] = $username;
header('location: index.php');

}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Đăng ký</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <style>
        table{
            border: 2px solid #00ccff; 
            padding: 0 30px 0 30px; 
            width: 25%; 
            border-radius: 15px; 
            margin: 0 auto 0 auto
        }
        th{
            padding-top: 50px; 
            font-size: 30px; 
            color: #00ccff;
        }
        span{
            color:red;
            display: block;
            padding: 5px 0px;
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
        .register{
            padding: 30px 0 40px 0;
        }
        .register>input{
            padding: 11px 25px; 
            background-color: #00ccff; 
            border-radius: 4px; 
            border: 1px solid #00ccff;
            width: 320px;
            color: white;
            font-size: 18px;
        }
        .register>input:hover{
            background-color: rgb(247, 185, 72); 
            border: 1px solid #00ccff;
        }
        </style>
        <script>

            /* VALIDATE FORM
             * 1. Username không được trống, tối thiểu 5 ký tự, ko chứa ký tự đặc biệt
             * 2. Mật khẩu không được trống, tối thiểu 8 ký tự
             * 3. Mật khẩu nhập lại phải trùng
             * 4. Phone phải là những con số và 10 ký tự
             * 5. Email phải đúng định dạng, va bat buoc nhap
             */

            // Lấy giá trị của một input
            function getValue(id){
                return document.getElementById(id).value.trim();
            }

            // Hiển thị lỗi
            function showError(key, mess){
                document.getElementById(key + '_error').innerHTML = mess;
            }

            function validate()
            {
                var flag = true;

                // 1 username
                var username = getValue('username');
                if (username == '' || username.length < 5 || !/^[a-zA-Z0-9]+$/.test(username)){
                    flag = false;
                    showError('username', 'Vui lòng kiểm tra lại Username');
                }

                // 2. password
                var password = getValue('password');
                var repassword = getValue('repassword');
                if (password == '' || password.length < 8 || password != repassword){
                    flag = false;
                    showError('password', 'Vui lòng kiểm tra lại Password');
                }

                // 3. Phone
                var phone = getValue('phone');
                if (phone == '' &&  !/^[0-9]{10}$/.test(phone)){
                    flag = false;
                    showError('phone', 'Vui lòng kiểm tra lại Phone');
                }

                // 4. Email
                var email = getValue('email');
                var mailformat = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
                if (!mailformat.test(email)){
                    flag = false;
                    showError('email', 'Vui lòng kiểm tra lại Email');
                }

                // 4. Address
                var address = getValue('address');
                if (address == ''){
                    flag = false;
                    showError('address', 'Vui lòng nhập địa chỉ');
                }
                return flag;
            }
        </script>
    </head>
    <body style="margin: 50px;">
        <form method="post" action="<?php ($_SERVER['PHP_SELF'])?>" id="loginform">
            <table>
                <th>
                    Đăng ký
                </th>
                <tr>
                    <td style="padding: 30px 0 20px 0">
                        <div class="textbox"><input type='text' id="username" name="username" size="30" placeholder = "Tên đăng nhập"/></div>
                        <span id="username_error"></span>
                    </td>
                </tr>
                <tr>
                    <td style="padding-bottom: 20px;">
                        <div class="textbox"><input type='text' id="password" name="password" placeholder="Mật khẩu" size="30"/><br></div>
                        <span id="password_error"></span>
                    </td>
                </tr>
                <tr>
                    <td style="padding-bottom: 20px;">
                        <div class="textbox"><input type='text' id="repassword" name="repassword" placeholder="Nhập lại mật khẩu" size="30"/><br></div>
                        <span id="repassword_error"></span>
                    </td>
                </tr>
                <tr>
                    <td style="padding-bottom: 20px;">
                        <div class="textbox"><input type='text' id="phone" name="phone" placeholder="Phone" size="30"/><br></div>
                        <span id="phone_error"></span>
                    </td>
                </tr>
                <tr>
                    <td style="padding-bottom: 20px;">
                        <div class="textbox"><input type='text' id="email" name="email" placeholder="Email" size="30"/><br></div>
                        <span id="email_error"></span>
                    </td>
                </tr>
                <tr>
                    <td style="padding-bottom: 20px;">
                        <div class="textbox"><input type='text' id="address" name="address" placeholder="Địa chỉ" size="30"/><br></div>
                        <span id="address_error"></span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="register"><input type="submit" onclick="return validate();" id="btn" name="btn" value="Đăng ký"/></div>
                    </td>
                </tr>
            </table>
        </form>   
    </body>
</html>