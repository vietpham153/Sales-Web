<?php session_start();?>
<?php
	require_once('db/dbhelper.php');
	require_once('utils/utility.php');
	include_once('layouts/header.php');
	include_once('layouts/menu.php');
		$productList = executeResult("select * from products");
?>
<!-- body -->

<div class="thanhtoan">
	<form>
			<table width="85%" align="center" style="background-color: #00e6e6">
				<tr>
					<td><b>Nhận hàng tại nhà</b></td>
				</tr>
				<tr>
					<td><b><br>Thông tin người nhận:</b></td>
				</tr>
			</table>
		<table width="85%" align="center" cellspacing="30" style="background-color: #00e6e6">
			<tr>
				<td width="20%">Họ và tên: </td>
				<td width="20%"><input type="text" name="" value=""></td>
				<td align="center" colspan="2" rowspan="8"><b>Thông tin đơn hàng:</b><br>
				<?php
					foreach ($productList as $item) {
						echo '
							<div class="col-md-3 col-6" style="padding: 5px; border: solid 1px #e4e3e3; text-align: center;">
								<a href="detail.php?id='.$item['id'].'"><img src="./images/'.$item['thumbnail'].'" style="width: 100%"></a>
								<a href="detail.php?id='.$item['id'].'"><p>'.$item['name'].'</p></a>
								<p style="color: red">'.number_format($item['price'], 0, '', '.').' vnđ</p>
							</div>';
						}
				?>
				<P><h2><font color="red">Tổng số tiền là : 1.900.000.000vnd</font></h2></P>
				<button id="btn" type="submit"><b>Thanh toán</b></button>
				<script language="javascript">
            	var button = document.getElementById("btn");
           		button.onclick = function(){
                	alert("Thanh toán thành công");
            	}
        		</script>
				</td>
			</tr>
				</td>
			</tr>
			<tr>
				<td width="20%">Số điện thoại: </td>
				<td width="20%"> <input type="number" name="avb" value=""></td>
				
			</tr>
			<tr>
				<td width="20%">Địa chỉ: </td>
				<td>
					<textarea rows="3" cols="35"></textarea>
				</td>
			</tr>
			<tr>
				<td>
				<b>
					Phương thức giao hàng:
				</b>
			</td>
			</tr>
			<tr><td>
                        <input type="radio" name="gender" id="gender" value="male"> Giao tiêu chuẩn <font color="green">(Miễn phí)</font>
            </td>
        	<td>
        		        <input type="radio" name="gender" id="gender" value="female"> Giao cấp tốc <font color="red">(55.000₫)</font>
        	</td></tr>
        	<tr><tr>
				<td width="20%"><b>Ghi chú cho đơn hàng: </b></td>
        	</tr></tr>
        	<tr>
				<td>
					<textarea rows="3" cols="50"></textarea>
				</td>
        	</tr>
        	<tr><tr><td><h2><b>Phương thức thanh toán</b></h2></td></tr></tr>
        	<tr><td>
                        <input type="radio" name="gender" id="gender" value="male"> Thanh toán qua VNPAY
            </td>
        	<td>
        		        <input type="radio" name="gender" id="gender" value="female"> Thanh toán bằng tiền mặt
        	</td></tr>
        	<tr>
        	<td><input type="checkbox" name="gender" id="gender" value="female"><b>Xuất hóa đơn</b></td>
        	</tr>
		</table>
</div>
<?php
	include_once('layouts/footer.php');
?>