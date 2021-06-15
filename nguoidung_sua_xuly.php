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
			<h5 class="card-header">Sửa người dùng</h5>
			<div class="card-body">
				<?php
					$ID = $_POST['ID'];
					$HoVaTen = $_POST['HoVaTen'];
					$TenDangNhap = $_POST['TenDangNhap'];
					$MatKhau = $_POST['MatKhau'];
					$XacNhanMatKhau = $_POST['XacNhanMatKhau'];
					
					if(trim($HoVaTen) == "")
						ThongBaoLoi("Họ và tên không được bỏ trống!");
					elseif(trim($TenDangNhap) == "")
						ThongBaoLoi("Tên đăng nhập không được bỏ trống!");
					else
					{
						if(!isset($_POST['DoiMatKhau'])) // Không đổi mật khẩu
						{
							$sql = "UPDATE	`tbl_nguoidung`
									SET		`HoVaTen` = '$HoVaTen',
											`TenDangNhap` = '$TenDangNhap'
									WHERE	`ID` = $ID";
							$kq = mysqli_query($link, $sql);
						}
						else // Có đổi mật khẩu
						{
							if($MatKhau != $XacNhanMatKhau)
								ThongBaoLoi("Xác nhận mật khẩu không chính xác!");
							else
							{
								$MatKhau = md5($MatKhau);
								
								$sql = "UPDATE	`tbl_nguoidung`
										SET		`HoVaTen` = '$HoVaTen',
												`TenDangNhap` = '$TenDangNhap',
												`MatKhau` = '$MatKhau'
										WHERE	`ID` = $ID";
								$kq = mysqli_query($link, $sql);
							}
						}
						
						if($kq)
							ThongBao("Cập nhật tài khoản thành công!");
						else if(mysqli_errno($link) == 1062)
							ThongBaoLoi("Tên đăng nhập <strong>$TenDangNhap</strong> đã tồn tại!");
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