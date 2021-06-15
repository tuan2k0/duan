<?php
	session_start();
	$link = mysqli_connect("localhost", "root", "", "trangtin");
	if($link)
		mysqli_set_charset($link, "utf8");
	else
		die("Không thể kết nối đến server!");
?>