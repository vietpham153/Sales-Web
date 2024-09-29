<!DOCTYPE html>
<html>
<head>
	<style type="text/css">
		#dangky{
			font-weight: bold;
			font-size: 15pt;
			font-family: Arial;
		}
		#dangnhap{
			font-weight: bold;
			font-size: 15pt;
			font-family: Arial;
		}
	</style>
</head>
<body>
		<div class="menu" align="right">
        	<ul>
                <?php if(empty($_SESSION['username'])){ ?>
            <li style=" display: inline-block; 
                        margin-right: 40px; ">
                <a href="Dangnhap.php" class="link" style="text-decoration: underline; 
                                                            color: white;">
                    <p style="font-size: 15px; color: white"><b>Đăng Nhập</b>
                    </p>
                </a>
            </li>
            <li style=" display: inline-block; 
                        margin-right: 40px; ">
                <a href="DangKy.php" class="link" style="text-decoration: underline; 
                                                            color: white;">
                    <p style="font-size: 15px; color: white"><b>Đăng Ký</b>
                    </p>
                </a>
            </li> <?php } else{ ?> 
                <li style=" display: inline-block; 
                        margin-right: 40px; ">
                <a href="Dangnhap.php" class="link" style="text-decoration: underline; 
                                                            color: white;">
                    <p style="font-size: 13px; color: white"><b>Xin chào, <?php echo $_SESSION['username'] ?></b>
                    </p>
                </a>
            </li>
            <?php } ?>
            </ul>
        </div>
</body>
</html>
