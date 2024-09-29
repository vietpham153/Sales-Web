<?php
if(empty($_GET['iddanhmuc'])){
	$_GET['iddanhmuc'] = '';
}
	$sql_sua_danhmucsp = "SELECT * FROM products WHERE id='$_GET[iddanhmuc]' LIMIT 1";
	$query_sua_danhmucsp = mysqli_query($mysqli, $sql_sua_danhmucsp);
?>
<p>Sửa danh mục sản phẩm</p>
<table borde="1" width="50%" style="border-collapse: collapse;">
	<form method="POST" action="modules/quanlydanhmucsp/xuly.php?iddanhmuc=<?php echo $_GET['iddanhmuc'] ?>">
		<?php
			while ($dong = mysqli_fetch_array($query_sua_danhmucsp)) {

		?>
		<tr>
			<td>name</td>
			<td><input type="text" value="<?php echo $dong['name'] ?>" name="name"></td>
		</tr>
		<tr>
			<td><input type="file" name="txtpic" /><img src="modules/quanlydanhmucsp/uploads/<?php echo $dong['thumbnail'] ?>" width="80" height="80"></td>
		</tr>
		<tr>
			<td>Title</td>
			<td><input type="text" value="<?php echo $dong['title'] ?>" name="title"></td>
		</tr>
		<tr>
			<td>Price</td>
			<td><input type="number" value="<?php echo $dong['price'] ?>" name="price"></td>
		</tr>
		<tr>
			<td colspan="2"><input type="submit" name="suadanhmuc" value="Sửa danh mục sản phẩm"></td>
		</tr>
		<?php
		}
		?>
	</form>
</table>