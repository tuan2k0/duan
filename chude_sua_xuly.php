<?php
	include_once "thuvien.php";
	include_once "ketnoi.php";
?>
<!DOCTYPE html>
<html lang="en">

<?php include_once "header.php"; ?>

<body>
	<div class="container">
		<?php include_once "navbar.php"; ?>
		
		<div class="card mt-3">
			<h5 class="card-header">Sửa chủ đề</h5>
			<div class="card-body">
				<?php
					$ID = $_POST['ID'];
					$TenChuDe = $_POST['TenChuDe'];
					
					if(trim($TenChuDe) == "")
						ThongBaoLoi("Tên chủ đề không được bỏ trống!");
					else
					{
						$sql = "UPDATE tbl_chude SET TenChuDe = '$TenChuDe' WHERE ID = $ID";
						$kq = mysqli_query($link, $sql);
						
						if($kq)
							header("Location: chude.php");
						else if(mysqli_errno($link) == 1062)
							ThongBaoLoi("Chủ đề <strong>$TenChuDe</strong> đã tồn tại!");
						else
							ThongBaoLoi(mysqli_error($link));
					}
				?>
			</div>
		</div>
		
		<?php include_once "footer.php"; ?>
	</div>
	
	<?php include_once "javascript.php"; ?>
</body>

</html>