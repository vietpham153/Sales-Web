<?php
	$sql_lietke_danhmucsp = "SELECT * FROM users_table ORDER BY name DESC";
	$query_lietke_danhmucsp = mysqli_query($mysqli, $sql_lietke_danhmucsp);

?>
<p>Liệt kê sản phẩm</p>
<table style="width: 100%" border="1" style="border-collapse: collapse;">
	<tr>
		<th>ID</th>
		<th>Name</th>
		<th>Thumbnail</th>
		<th>Title</th>
		<th>Price</th>
		<th>Quản lý</th>
	</tr>
	<?php
		$i = 0;
		while ($row = mysqli_fetch_array($query_lietke_danhmucsp)) {
			$i++;
		?>
		<tr>
			<td align="center"><?php echo $i ?></td>
			<td align="center"><?php echo $row['name'] ?></td>
			<td><?php echo $row['title'] ?></td>
			<td align="center"><?php echo $row['price'] ?></td>
			<td align="center">
				<a href="modules/quanlydanhmucsp/xuly.php?iddanhmuc=<?php echo $row['id'] ?>">Xóa</a> | <a href="?action=quanlydanhmucsanpham&query=sua&iddanhmuc=<?php echo $row['id'] ?>">Sửa</a>
			</td>
		</tr>
		<?php
		}
		?>
</table>