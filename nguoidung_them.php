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
			<h5 class="card-header">Thêm người dùng</h5>
			<div class="card-body">
				<form action="nguoidung_them_xuly.php" method="post">
					<div class="form-group">
						<label for="HoVaTen">Họ và tên</label>
						<input type="text" class="form-control" id="HoVaTen" name="HoVaTen" placeholder="" />
					</div>
					
					<div class="form-group">
						<label for="TenDangNhap">Tên đăng nhập</label>
						<input type="text" class="form-control" id="TenDangNhap" name="TenDangNhap" placeholder="" />
					</div>
					
					<div class="form-group">
						<label for="MatKhau">Mật khẩu</label>
						<input type="password" class="form-control" id="MatKhau" name="MatKhau" placeholder="" />
					</div>
					
					<div class="form-group">
						<label for="XacNhanMatKhau">Xác nhận mật khẩu</label>
						<input type="password" class="form-control" id="XacNhanMatKhau" name="XacNhanMatKhau" placeholder="" />
					</div>
					
					<button type="submit" class="btn btn-primary"><i class="fal fa-save"></i> Thêm vào CSDL</button>
				</form>
			</div>
		</div>
		
		<?php include_once "footer.php"; ?>
	</div>
	
	<?php include_once "javascript.php"; ?>
</body>

</html>