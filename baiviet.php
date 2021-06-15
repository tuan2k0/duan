<?php
	include_once "ketnoi.php";
	$sql = "SELECT b.*, c.TenChuDe, n.HoVaTen
			FROM tbl_baiviet b, tbl_chude c, tbl_nguoidung n
			WHERE b.MaChuDe = c.ID AND b.MaNguoiDung = n.ID";
	$danhsach = mysqli_query($link, $sql);
?>
<!DOCTYPE html>
<html lang="en">

<?php include_once "header.php"; ?>

<body>
	<div class="container">
		<?php include_once "navbar.php"; ?>
		
		<div class="card mt-3">
			<h5 class="card-header">Danh sách bài viết</h5>
			<div class="card-body">
				<p><a href="baiviet_them.php" class="btn btn-success"><i class="fal fa-plus"></i> Thêm bài viết</a></p>
				<table class="table table-bordered table-sm mb-0">
					<thead>
						<tr>
							<th width="5%">#</th>
							<th width="10%">Chủ đề</th>
							<th width="15%">Người đăng</th>
							<th width="35%">Tiêu đề</th>
							<th width="15%">Ngày đăng</th>
							<th width="10%">Duyệt?</th>
							<th width="5%">Sửa</th>
							<th width="5%">Xóa</th>
						</tr>
					</thead>
					<tbody>
						<?php
							while($dong = mysqli_fetch_array($danhsach))
							{
								echo "<tr>";
									echo "<th>{$dong['ID']}</th>";
									echo "<td class='small'>{$dong['TenChuDe']}</td>";
									echo "<td class='small'>{$dong['HoVaTen']}</td>";
									echo "<td class='small'>{$dong['TieuDe']}</td>";
									echo "<td class='small'>{$dong['NgayDang']}</td>";
									echo "<td class='text-center'>";
										if($dong['KiemDuyet'] == 0)
											echo "<a href='baiviet_duyet.php?id={$dong['ID']}'><i class='fal fa-ban text-danger'></i></a>";
										else
											echo "<a href='baiviet_duyet.php?id={$dong['ID']}'><i class='fal fa-check text-primary'></i></a>";
									echo "</td>";
									echo "<td class='text-center'><a href='baiviet_sua.php?id={$dong['ID']}'><i class='fal fa-edit'></i></a></td>";
									echo "<td class='text-center'><a href='baiviet_xoa.php?id={$dong['ID']}' onclick='return confirm(\"Bạn có muốn xóa bài viết {$dong['TieuDe']} không?\")'><i class='fal fa-trash-alt text-danger'></i></a></td>";
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