<?php
	include_once "ketnoi.php";
	$sql = "SELECT bl.*, bv.TieuDe, nd.HoVaTen
			FROM tbl_binhluan bl, tbl_baiviet bv, tbl_nguoidung nd
			WHERE bl.MaBaiViet = bv.ID AND bl.MaNguoiDung = nd.ID";
	$danhsach = mysqli_query($link, $sql);
?>
<!DOCTYPE html>
<html lang="en">

<?php include_once "header.php"; ?>

<body>
	<div class="container">
		<?php include_once "navbar.php"; ?>
		
		<div class="card mt-3">
			<h5 class="card-header">Danh sách bình luận</h5>
			<div class="card-body">
				<table class="table table-bordered table-sm mb-0">
					<thead>
						<tr>
							<th width="5%">#</th>
							<th width="15%">Người đăng</th>
							<th width="15%">Bài viết</th>
							<th width="35%">Bình luận</th>
							<th width="15%">Ngày đăng</th>
							<th width="10%">Duyệt?</th>
							<th width="5%">Xóa</th>
						</tr>
					</thead>
					<tbody>
						<?php
							while($dong = mysqli_fetch_array($danhsach))
							{
								echo "<tr>";
									echo "<th>{$dong['ID']}</th>";
									echo "<td class='small'>{$dong['HoVaTen']}</td>";
									echo "<td class='small'>{$dong['TieuDe']}</td>";
									echo "<td class='small'>{$dong['NoiDungBinhLuan']}</td>";
									echo "<td class='small'>{$dong['NgayDang']}</td>";
									echo "<td class='text-center'>";
										if($dong['KiemDuyet'] == 0)
											echo "<a href='binhluan_duyet.php?id={$dong['ID']}'><i class='fal fa-ban text-danger'></i></a>";
										else
											echo "<a href='binhluan_duyet.php?id={$dong['ID']}'><i class='fal fa-check text-primary'></i></a>";
									echo "</td>";
									echo "<td class='text-center'><a href='binhluan_xoa.php?id={$dong['ID']}' onclick='return confirm(\"Bạn có muốn xóa bình luận này không?\")'><i class='fal fa-trash-alt text-danger'></i></a></td>";
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