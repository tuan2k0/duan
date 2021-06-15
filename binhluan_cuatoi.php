<?php
	include_once "ketnoi.php";
	$sql = "SELECT b.*, c.TenChuDe, n.HoVaTen
			FROM tbl_baiviet b, tbl_chude c, tbl_nguoidung n
			WHERE b.MaChuDe = c.ID AND b.MaNguoiDung = n.ID AND b.MaNguoiDung = " . $_SESSION['MaND'];
			
	$danhsach = mysqli_query($link, $sql);
?>
<!DOCTYPE html>
<html lang="en">

<?php include_once "header.php"; ?>

<body>
	<div class="container">
		<?php include_once "navbar.php"; ?>
		
		<div class="card mt-3">
			<h5 class="card-header">Bình luận của tôi <?php echo $_SESSION['HoVaTen']; ?></h5>
			<div class="card-body">
				<table class="table table-bordered table-sm mb-0">
					<thead>
						<tr>
							<th width="5%">#</th>
							<th width="10%">Chủ đề</th>
							<th width="10%">Tiêu đề</th>
							<th width="15%">Ngày đăng</th>
							
						</tr>
					</thead>
					<tbody>
						<?php
							while($dong = mysqli_fetch_array($danhsach))
							{
								echo "<tr>";
									echo "<th>{$dong['ID']}</th>";
									echo "<td class='small'>{$dong['TenChuDe']}</td>";
									echo "<td class='small'>{$dong['TieuDe']}</td>";
									echo "<td class='small'>{$dong['NgayDang']}</td>";
									//echo "<td class='small'>{$dong['NoiDungBinhLuan']}</td>";
									//echo "<td class='text-center'>";
										/*if($dong['KiemDuyet'] == 0)
											echo "<i class='fal fa-ban text-danger'></i>";
										else
											echo "<i class='fal fa-check text-primary'></i>";*/
									echo "</td>";
								echo "</tr>";
							}
						?>
					</tbody>
				</table>
			</div>
		</div>
		
		<?php include_once "footer.php"; ?>
	</div>
	
	<?php include_once "javascript.php"; ?>
</body>

</html>