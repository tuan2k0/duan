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
			<h5 class="card-header">Thêm bình luận</h5>
			<div class="card-body">
				<?php
					$MaBaiViet = $_POST['MaBaiViet'];
					$NoiDungBinhLuan = $_POST['NoiDungBinhLuan'];
					
					if(trim($NoiDungBinhLuan) == "")
						ThongBaoLoi("Nội dung bình luận không được bỏ trống!");
					else
					{
						$MaNguoiDung = $_SESSION['MaND'];
						if($_SESSION['QuyenHan'] == 1)
							$KiemDuyet = 1;
						else
							$KiemDuyet = 0;
						
						$sql = "INSERT INTO `tbl_binhluan`( `MaBaiViet`, `MaNguoiDung`, `NoiDungBinhLuan`, `NgayDang`, `KiemDuyet`) 
								VALUES ($MaBaiViet,$MaNguoiDung,'$NoiDungBinhLuan',now(),$KiemDuyet)";
						$kq = mysqli_query($link, $sql);
						
						if($kq)
							ThongBao("Gửi bình luận thành công và đang chờ kiểm duyệt!");
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