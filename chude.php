<?php
	include_once "ketnoi.php";
	$sql = "SELECT * FROM tbl_chude";
	$danhsach = mysqli_query($link, $sql);
?>
<!DOCTYPE html>
<html lang="en">

<?php include_once "header.php"; ?>

<body>
	<div class="container">
		<?php include_once "navbar.php"; ?>
		
		<div class="card mt-3">
			<h5 class="card-header">Danh sách chủ đề</h5>
			<div class="card-body">
				<p><a href="chude_them.php" class="btn btn-success"><i class="fal fa-plus"></i> Thêm chủ đề</a></p>
				<table class="table table-bordered table-sm mb-0">
					<thead>
						<tr>
							<th width="5%">#</th>
							<th width="85%">Tên chủ đề</th>
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
									echo "<td>{$dong['TenChuDe']}</td>";
									echo "<td class='text-center'><a href='chude_sua.php?id={$dong['ID']}'><i class='fal fa-edit'></i></a></td>";
									echo "<td class='text-center'><a href='chude_xoa.php?id={$dong['ID']}' onclick='return confirm(\"Bạn có muốn xóa chủ đề {$dong['TenChuDe']} không?\")'><i class='fal fa-trash-alt text-danger'></i></a></td>";
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