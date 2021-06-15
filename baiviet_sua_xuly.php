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
			<h5 class="card-header">Sửa bài viết</h5>
			<div class="card-body">
				<?php
					$ID = $_POST['ID'];
					$MaChuDe = $_POST['MaChuDe'];
					$TieuDe = $_POST['TieuDe'];
					$TomTat = $_POST['TomTat'];
					$NoiDung = $_POST['NoiDung'];
					
					if(trim($MaChuDe) == "")
						ThongBaoLoi("Chưa chọn chủ đề!");
					elseif(trim($TieuDe) == "")
						ThongBaoLoi("Tiêu đề không được bỏ trống");
					elseif(trim($TomTat) == "")
						ThongBaoLoi("Tóm tắt không được bỏ trống");
					elseif(trim($NoiDung) == "")
						ThongBaoLoi("Nội dung không được bỏ trống");
					else
					{
						if($_SESSION['QuyenHan'] == 1)
							$KiemDuyet = 1;
						else
							$KiemDuyet = 0;
						
						$sql = "UPDATE	`tbl_baiviet`
								SET		`MaChuDe` = $MaChuDe,
										`TieuDe` = '$TieuDe',
										`TomTat` = '$TomTat',
										`NoiDung` = '$NoiDung',
										`KiemDuyet` = $KiemDuyet
								WHERE	`ID` = $ID";
						$kq = mysqli_query($link, $sql);
						
						if($kq)
							//header("Location: baiviet.php");
							ThongBao("Cập nhật bài viết thành công!");
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