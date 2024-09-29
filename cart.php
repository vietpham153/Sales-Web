<?php
	session_start();
	require_once('db/dbhelper.php');
	require_once('utils/utility.php');
	include_once('layouts/header.php');
	include_once('layouts/menu.php');

	$cart = [];
	if(isset($_SESSION['cart'])) {
		$cart = $_SESSION['cart'];
	}
?>
<!-- body -->
<div class="container">
	<div class="row">
		<div class="col-md-12">
		<table class="table table-bordered">
			<thead>

					<th>No</th>
					<th>Thumbnail</th>
					<th>Title</th>
					<th>Price</th>
					<th>Num</th>
					<th>Total</th>
					<th></th>

			</thead>
			<tbody>
<?php
	$count = 0;
	$total = 0;
	foreach ($cart as $item) {
		$total += $item['num']*$item['price'];
		echo '
			<tr>
				<td>'.(++$count).'</td>
				<td><img src="./images/'.$item['thumbnail'].'" style="height: 100px"/></td>
				<td>'.$item['title'].'</td>
				<td>'.number_format($item['price'], 0, ',', '.').'</td>
				<td>'.$item['num'].'</td>
				
				<td>'.number_format($item['num']*$item['price'], 0, ',', '.').'</td>
				<td><button class="btn btn-danger" onclick="deleteCart('.$item['id'].')">Delete</button></td>
			</tr>';
	}
?>
			</tbody>
		</table>
		<p style="font-size: 30px; color: red">
			Total: <?=number_format($total, 0, ',', '.')?>
		</p>
		<?php if(empty($_SESSION['username'])){ ?> <?php } else{ ?>
                <a href="cart.php?id=<?php echo $each['ID'] ?>"> <a href="thanhtoan.php"><button type="submit" name="tong" class="btn btn-success" style="width: 100%; font-size: 32px;">Tiến hành thanh toán</button></a>

                    </a> <?php } ?>
		
		

		
	</div>
</div></div>

<script type="text/javascript">
	function deleteCart(id) {
		$.post('api/api-product.php', {
			'action': 'delete',
			'id': id
		}, function(data) {
			location.reload()
		})
	}
</script>
<?php
	include_once('layouts/footer.php');
?>