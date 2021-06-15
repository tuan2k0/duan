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
			<h5 class="card-header">Đăng nhập</h5>
			<div class="card-body">
				<?php
					$TenDangNhap = $_POST['TenDangNhap'];
					$MatKhau = $_POST['MatKhau'];
					
					if(trim($TenDangNhap) == "")
						ThongBaoLoi("Tên đăng nhập không được bỏ trống!");
					elseif(trim($MatKhau) == "")
						ThongBaoLoi("Mật khẩu không được bỏ trống!");
					else
					{
						$MatKhau = md5($MatKhau);
						
						$sql = "SELECT * FROM tbl_nguoidung WHERE TenDangNhap = '$TenDangNhap' AND MatKhau = '$MatKhau'";
						$kq = mysqli_query($link, $sql);
						
						if(mysqli_num_rows($kq) == 0)
							ThongBaoLoi("Tên đăng nhập hoặc mật khẩu không đúng!");
						else
						{
							$dong = mysqli_fetch_array($kq);
							if($dong['Khoa'] == 1)
								ThongBaoLoi("Tài khoản đã bị khóa!");
							else
							{
								// Đăng ký phiên
								$_SESSION['MaND'] = $dong['ID'];
								$_SESSION['HoVaTen'] = $dong['HoVaTen'];
								$_SESSION['QuyenHan'] = $dong['QuyenHan'];
								
								// Quay về trang chủ
								 header("Location: index.php");

							}
						}
					}
				?>
			</div>
		</div>
		
		<?php include_once "footer.php"; ?>
	</div>
	
	<?php include_once "javascript.php"; ?>
</body>

</html>