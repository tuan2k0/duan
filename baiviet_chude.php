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
			<h5 class="card-header">Bài viết được tìm kiếm</h5>
			<div class="card-body">
				<ul class="list-unstyled">
					<?php
					    $timkiem = @trim($_POST['timkiem']);
						$sql1 = "SELECT b.*, c.TenChuDe, n.HoVaTen
								FROM tbl_baiviet b, tbl_chude c, tbl_nguoidung n
								WHERE b.MaChuDe = c.ID AND b.MaNguoiDung = n.ID AND b.KiemDuyet = 1 AND b.TieuDe LIKE '$timkiem'";
						$danhsach1 = mysqli_query($link, $sql1);
						
						if (isset($_POST['submit_timkiem'])) {
							# code...
					  
						while($dong1 = mysqli_fetch_array($danhsach1))
						{
							echo '<li class="media mb-3">
									<img src="'.LayHinhDauTien($dong1['NoiDung']).'" width="120" height="100" class="mr-3" alt="...">
									<div class="media-body">
										<h5 class="mt-0 mb-1"><a href="baiviet_xem.php?id='.$dong1['ID'].'">'.$dong1['TieuDe'].'</a></h5>
										<p class="small text-muted mb-1">['.$dong1['TenChuDe'].'] Đăng bởi '.$dong1['HoVaTen'].' vào lúc '.$dong1['NgayDang'].', có '.$dong1['LuotXem'].' lượt xem.</p>
										<p class="text-justify">'.$dong1['TomTat'].'</p>
									</div>
								</li>';
						}
							}
					?>
				</ul>
			</div>
		</div>

		
		<div class="card mt-3">
			<h5 class="card-header">bài viết chủ đề</h5>
			<div class="card-body">
				<ul class="list-unstyled">
					<?php

					    $timkiem = @trim($_POST['timkiem']);
					    $chude = @$_GET['chude'];
						$sql2 = "SELECT b.*, c.TenChuDe, n.HoVaTen
								FROM tbl_baiviet b, tbl_chude c, tbl_nguoidung n
								WHERE b.MaChuDe = '$chude' AND b.MaNguoiDung = n.ID AND b.KiemDuyet = 1 AND c.ID = $chude";
						$danhsach2 = mysqli_query($link, $sql2);						
					  
						while($dong2 = mysqli_fetch_array($danhsach2))
						{
							echo '<li class="media mb-3">
									<img src="'.LayHinhDauTien($dong2['NoiDung']).'" width="120" height="100" class="mr-3" alt="...">
									<div class="media-body">
										<h5 class="mt-0 mb-1"><a href="baiviet_xem.php?id='.$dong2['ID'].'">'.$dong2['TieuDe'].'</a></h5>
										<p class="small text-muted mb-1">['.$dong2['TenChuDe'].'] Đăng bởi '.$dong2['HoVaTen'].' vào lúc '.$dong2['NgayDang'].', có '.$dong2['LuotXem'].' lượt xem.</p>
										<p class="text-justify">'.$dong2['TomTat'].'</p>
									</div>
								</li>';
						}
							
					?>
				</ul>
			</div>
		</div>
		
		<?php include_once "footer.php"; ?>
	</div>
	
	<?php include_once "javascript.php"; ?>
</body>

</html>