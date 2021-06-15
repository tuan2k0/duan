<?php
	include_once "thuvien.php";
	include_once "ketnoi.php";
	
	$id = $_GET['id'];
	
	$sql = "SELECT b.*, c.TenChuDe, n.HoVaTen
			FROM tbl_baiviet b, tbl_chude c, tbl_nguoidung n
			WHERE b.MaChuDe = c.ID AND b.MaNguoiDung = n.ID AND b.KiemDuyet = 1 AND b.ID = $id";
	$danhsach = mysqli_query($link, $sql);
	
	$dong = mysqli_fetch_array($danhsach);
	
	// Xử lý tăng lượt xem
	if(!isset($_SESSION['DaXem' . $id]))
	{
		$sql_tlx = "UPDATE tbl_baiviet SET LuotXem = LuotXem + 1 WHERE ID = $id";
		mysqli_query($link, $sql_tlx);
		$_SESSION['DaXem' . $id] = 1;
	}
?>
<!DOCTYPE html>
<html lang="en">

<?php include_once "header.php"; ?>

<body>
	<div class="container">
		<?php include_once "navbar.php"; ?>
		
		<div class="card mt-3">
			<h5 class="card-header"><?php echo $dong['TieuDe']; ?></h5>
			<div class="card-body">
				<?php
					echo '<p class="small text-muted mb-1">['.$dong['TenChuDe'].'] Đăng bởi '.$dong['HoVaTen'].' vào lúc '.$dong['NgayDang'].', có '.$dong['LuotXem'].' lượt xem.</p>';
					echo '<p class="text-justify font-weight-bold">'.$dong['TomTat'].'</p>';
					echo '<p class="text-justify mb-0">'.$dong['NoiDung'].'</p>';
				?>
				<h5 class="border-bottom border-info pb-1 mb-3">Ý kiến bạn đọc</h5>
				<?php
					$sql_bl = "SELECT b.*, n.HoVaTen, n.TenDangNhap, n.avatar
							   FROM tbl_binhluan b, tbl_nguoidung n
							   WHERE b.MaNguoiDung = n.ID AND b.MaBaiViet = $id AND b.KiemDuyet = 1";
					$danhsach_bl = mysqli_query($link, $sql_bl);
				?>
				<ul class="list-unstyled">
					<?php
						while ($dong = mysqli_fetch_array($danhsach_bl))
						{
							echo'<li class="media mb-3">
								<div style="
    width: 100px;
    height: 75px;
    background-color: #3e3e3e;
    background-image: none;
    background-repeat: no-repeat;
    background-position: center center;
    background-size: cover;
    background-image: url('.$dong["avatar"].');"></div>
								<div class="media-body">
									<h5 class="mt-0 mb-1">'.$dong['HoVaTen'].'</h5>
									<p class="small text-muted mb-1">'.$dong['NgayDang'].'</p>
									'.$dong['NoiDungBinhLuan'].'
								</div>
							</li>';
						}
					?>
				</ul>
				<?php
					if(isset($_SESSION['MaND']))
					{
				?>
						<form action="binhluan_them_xuly.php" method="post">
							<input type="hidden" class="form-control" value="<?php echo $id; ?>" id="MaBaiViet" name="MaBaiViet" placeholder="" />
							<div class="form-group">
								<label for="NoiDungBinhLuan">Ý kiến</label>
								<textarea class="form-control" id="NoiDungBinhLuan" name="NoiDungBinhLuan" placeholder=""></textarea>
							</div>
							
							<button type="submit" class="btn btn-primary"><i class="fal fa-paper-plane"></i> Gởi</button>
						</form>
				<?php
					}
					else
					{
						echo "Vui lòng <a href='dangnhap.php'>đăng nhập</a> để gởi bình luận!";
					}
				?>
			</div>
		</div>
		
		<?php include_once "footer.php"; ?>
	</div>
	
	<?php include_once "javascript.php"; ?>
</body>

</html>