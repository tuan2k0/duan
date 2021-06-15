<img src="http://localhost/TrangTinDienTu/images/a.png" class="img-fluid" alt="Responsive image">
<nav class="navbar navbar-expand-xl navbar-light" style="background-color:#afeeee;">
	<a class="navbar-brand" href="http://localhost/TrangTinDienTu/index.php">
		<img src="http://localhost/TrangTinDienTu/images/new.png" width="30" height="30" class="d-inline-block align-top" alt="" /> Tin Tức
	</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav mr-auto">
			<li class="nav-item">
				<a class="nav-link" href="#"><i class="fal fa-eye"></i> Xem nhiều nhất</a>
			</li>
			<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<i class="fal fa-calendar-alt"></i> Chủ đề
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdown">
							<?php	
													
								$danhsach_chude = mysqli_query($link,"SELECT * FROM tbl_chude");
								while($dong_chude = mysqli_fetch_array($danhsach_chude))
								{    	
							 ?>												
							<a class="dropdown-item" href="baiviet_chude.php?chude=<?php echo $dong_chude['ID']; ?>"><i class="fal fa-link"></i><?php echo $dong_chude['TenChuDe'] ?></a>
							<?php
								}
							  
							?>

						</div>
					</li>			
			<?php if(!isset($_SESSION['MaND'])) { ?>
				<li class="nav-item">
					<a class="nav-link" href="http://localhost/TrangTinDienTu/dangnhap.php"><i class="fal fa-sign-in-alt"></i> Đăng nhập</a>
				</li>
			<?php } else { ?>
				<?php if($_SESSION['QuyenHan'] == 1) { ?>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<i class="fal fa-cog"></i> Quản lý
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdown">
							<a class="dropdown-item" href="http://localhost/TrangTinDienTu/baiviet.php"><i class="fal fa-link"></i> Bài viết</a>
							<a class="dropdown-item" href="http://localhost/TrangTinDienTu/binhluan.php"><i class="fal fa-link"></i> Bình luận</a>
							<a class="dropdown-item" href="http://localhost/TrangTinDienTu/chude.php"><i class="fal fa-link"></i> Chủ đề</a>
							<a class="dropdown-item" href="http://localhost/TrangTinDienTu/nguoidung.php"><i class="fal fa-link"></i> Người dùng</a>
						</div>
					</li>
				<?php } ?>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<i class="fal fa-user-circle"></i> <?php echo $_SESSION['HoVaTen']; ?>
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="http://localhost/TrangTinDienTu/baiviet_them.php"><i class="fal fa-link"></i> Đăng bài viết</a>
						<a class="dropdown-item" href="http://localhost/TrangTinDienTu/baiviet_nguoidung.php"><i class="fal fa-link"></i> Bài viết của tôi</a>
						<a class="dropdown-item" href="http://localhost/TrangTinDienTu/binhluan_cuatoi.php"><i class="fal fa-link"></i> Bình luận của tôi</a>
						<a class="dropdown-item" href="http://localhost/TrangTinDienTu/qtthuvien/qt-thuvien.php"><i class="fal fa-link"></i> Thư viện</a>
						<a class="dropdown-item" href="http://localhost/TrangTinDienTu/qtcaidattaikhoan/caidattaikhoan.php"><i class="fal fa-link"></i> Cài đặt tài khoản</a>
					</div>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="http://localhost/TrangTinDienTu/dangxuat.php"><i class="fal fa-sign-out-alt"></i> Đăng xuất</a>
				</li>
			<?php } ?>
		</ul>
		<form class="form-inline my-2 my-lg-0" action="index.php" method="post">
			<div class="input-group">
				<input type="text" name="timkiem" class="form-control" placeholder="Bạn muốn tìm gì?" aria-label="Tìm kiếm" aria-describedby="button-addon2">
				<div class="input-group-append">
					<button name="submit_timkiem" class="btn btn-outline-secondary" type="submit" id="button-addon2"><i class="fal fa-search"></i> Tìm kiếm</button>
				</div>
			</div>
		</form>
	</div>
</nav>