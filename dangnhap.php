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
				<form action="dangnhap_xuly.php" method="post">
					<div class="form-group">
						<label for="TenDangNhap">Tên đăng nhập</label>
						<input type="text" class="form-control" id="TenDangNhap" name="TenDangNhap" placeholder="" />
					</div>
					
					<div class="form-group">
						<label for="MatKhau">Mật khẩu</label>
						<input type="password" class="form-control" id="MatKhau" name="MatKhau" placeholder="" />
					</div>
					
					<button type="submit" class="btn btn-primary"><i class="fal fa-sign-in-alt"></i> Đăng nhập</button>					
				</form>
			</div>
		</div>

				<div class="card mt-3">
			<h5 class="card-header">Đăng ký</h5>
			<div class="card-body">
				<form action="" method="post">
					<div class="form-group">
						<label for="TenDangNhap">Họ và tên</label>
						<input type="text" class="form-control" id="TenDangNhap" name="TenDangNhap" placeholder="" />
					</div>

					<div class="form-group">
						<label for="TenDangNhap">Tên đăng nhập</label>
						<input type="text" class="form-control" id="TenDangNhap" name="email" placeholder="" />
					</div>
					
					<div class="form-group">
						<label for="MatKhau">Mật khẩu</label>
						<input type="password" class="form-control" id="MatKhau" name="password" placeholder="" />
					</div>

					<div class="form-group">
						<label for="MatKhau">Nhập lại Mật khẩu</label>
						<input type="password" class="form-control" id="MatKhau" name="password2" placeholder="" />
					</div>
					
					<button type="submit" name="submit2" class="btn btn-primary"><i class="fal fa-sign-in-alt"></i> Đăng ký</button>					
				</form>
				<?php 

$connect = mysqli_connect("localhost","root", "", "trangtin");
       $name = @trim($_POST["TenDangNhap"]);
       $email = @trim($_POST["email"]);
       $password = @md5(trim($_POST["password"]));
       $password2 = @md5(trim($_POST["password2"])); 
       $quyenhan = "2";
   $tess = "SELECT * FROM  tbl_nguoidung WHERE (TenDangNhap LIKE '$email') ";
   $ktra = "";
   $kqemail = mysqli_query($connect,$tess); 
   $rows = mysqli_fetch_array($kqemail);
   $sql = "INSERT INTO `tbl_nguoidung`(`HoVaTen`, `TenDangNhap`, `MatKhau`, `QuyenHan`) VALUES ('$name','$email','$password','$quyenhan')";

      if(isset($_POST["submit2"])){
        
           if (strcmp($ktra,$rows['TenDangNhap'])==0) {
            if (strcmp($password,$password2)==0) {           
            
         mysqli_query($connect,$sql);
         echo "đăng ký thành công";

            }else{ echo "mật khẩu k giống nhau rồi bạn êi !"; }
           }else{ echo "đã có tên đăng nhập đó rồi rồi bạn êi !"; }  
      }
?>
			</div>
		</div>
		
		<?php include_once "footer.php"; ?>
	</div>
	
	<?php include_once "javascript.php"; ?>
</body>

</html>