<?php
	include_once "ketnoi.php";
	
	// Hủy phiên
	unset($_SESSION['MaND']);
	unset($_SESSION['HoVaTen']);
	unset($_SESSION['QuyenHan']);
	
	// Quay về trang chủ
	header("Location: index.php");
?>