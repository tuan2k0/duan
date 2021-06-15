<?php
	include_once "thuvien.php";
	include_once "ketnoi.php";
	$id = $_GET['id'];
	$sql = "DELETE FROM tbl_nguoidung WHERE ID = $id";
	$kq = mysqli_query($link, $sql);
	if($kq)
		header("Location: nguoidung.php");
	else
		ThongBaoLoi(mysqli_error($link));
?>