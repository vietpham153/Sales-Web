<?php
include('../../config/config.php');
$name = $_POST["name"];
$thumbnail = $_POST["txtpic"];
$title = $_POST["title"];
$price = $_POST["price"];
if(isset($_POST['themdanhmuc'])){
	$sql_them = "INSERT INTO users_table(name, thumbnail, title, price) VALUE('".$name."','".$thumbnail."', '".$title."','".$price."')";
	mysqli_query($mysqli,$sql_them);
	header('Location:../../index.php?action=quanlydanhmucsanpham&query=them1');
}elseif (isset($_POST['suadanhmuc'])) {
	$sql_update = "UPDATE users_table SET name='".$name."',thumbnail='".$thumbnail."', title='".$title."', price='".$price."' WHERE id='$_GET[iddanhmuc]' ";
	mysqli_query($mysqli,$sql_update);
	header('Location:../../index.php?action=quanlydanhmucsanpham&query=them1');
}else{
	$id=$_GET['iddanhmuc'];
	$sql_xoa = "DELETE FROM users_table WHERE id='".$id."'";
	mysqli_query($mysqli,$sql_xoa);
	header('Location:../../index.php?action=quanlydanhmucsanpham&query=them1');
}
?>