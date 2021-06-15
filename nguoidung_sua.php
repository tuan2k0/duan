<?php
	include_once "ketnoi.php";
	$id = $_GET['id'];
	$sql = "SELECT * FROM tbl_nguoidung WHERE ID = $id";
	$danhsach = mysqli_query($link, $sql);
	$dong = mysqli_fetch_array($danhsach);
?>
<!DOCTYPE html>
<html lang="en">

<?php include_once "header.php"; ?>

<body>
	<div class="container">
		<?php include_once "navbar.php"; ?>
		
		<div class="card mt-3">
			<h5 class="card-header">Sửa thông tin người dùng</h5>
			<div class="card-body">
				<form action="nguoidung_sua_xuly.php" method="post">
					<input type="hidden" class="form-control" value="<?php echo $dong['ID']; ?>" id="ID" name="ID" placeholder="" />
					
					<div class="form-group">
						<label for="HoVaTen">Họ và tên</label>
						<input type="text" class="form-control" id="HoVaTen" name="HoVaTen" placeholder="" value="<?php echo $dong['HoVaTen']; ?>" />
					</div>
					
					<div class="form-group">
						<label for="TenDangNhap">Tên đăng nhập</label>
						<input type="text" class="form-control" id="TenDangNhap" name="TenDangNhap" placeholder="" value="<?php echo $dong['TenDangNhap']; ?>" />
					</div>
					
					<div class="custom-control custom-checkbox mb-2">
						<input type="checkbox" class="custom-control-input" id="DoiMatKhau" name="DoiMatKhau" value="1" />
						<label class="custom-control-label" for="DoiMatKhau">Đổi mật khẩu cho tài khoản?</label>
					</div>
					
					<div id="DoiMatKhau_Panel">
						<div class="form-group">
							<label for="MatKhau">Mật khẩu mới</label>
							<input type="password" class="form-control" id="MatKhau" name="MatKhau" placeholder="" />
						</div>
						
						<div class="form-group">
							<label for="XacNhanMatKhau">Xác nhận mật khẩu mới</label>
							<input type="password" class="form-control" id="XacNhanMatKhau" name="XacNhanMatKhau" placeholder="" />
						</div>
					</div>
					
					<button type="submit" class="btn btn-primary"><i class="fal fa-save"></i> Cập nhật</button>
				</form>
			</div>
		</div>
		
		<?php include_once "footer.php"; ?>
	</div>
	
	<?php include_once "javascript.php"; ?>
	<script>
		$(document).ready(function(){
			$("#DoiMatKhau_Panel").hide();
			$("#DoiMatKhau").change(function(){
				if($(this).is(":checked"))
					$("#DoiMatKhau_Panel").show();
				else
					$("#DoiMatKhau_Panel").hide();
			});
		});
	</script>
</body>

</html>