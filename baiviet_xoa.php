<?php
	include_once "thuvien.php";
	include_once "ketnoi.php";
	$id = $_GET['id'];
	$sql = "DELETE FROM tbl_baiviet WHERE ID = $id";
	$kq = mysqli_query($link, $sql);
	if($kq)
		header("Location: baiviet.php");
	else
		ThongBaoLoi(mysqli_error($link));
?>