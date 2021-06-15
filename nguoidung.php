<?php
	include_once "ketnoi.php";
	$sql = "SELECT * FROM tbl_nguoidung";
	$danhsach = mysqli_query($link, $sql);
?>
<!DOCTYPE html>
<html lang="en">

<?php include_once "header.php"; ?>

<body>
	<div class="container">
		<?php include_once "navbar.php"; ?>
		
		<div class="card mt-3">
			<h5 class="card-header">Danh sách người dùng</h5>
			<div class="card-body">
				<p><a href="nguoidung_them.php" class="btn btn-success"><i class="fal fa-plus"></i> Thêm người dùng</a></p>
				<table class="table table-bordered table-sm mb-0">
					<thead>
						<tr>
							<th width="5%">#</th>
							<th width="10%">avatar</th>
							<th width="25%">Họ và tên</th>
							<th width="25%">Tên đăng nhập</th>
							<th width="15%">Quyền hạn</th>
							<th width="10%">Trạng thái</th>
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
									echo "<td><div style='
    width: 150px;
    height: 100px;
    background-color: #3e3e3e;
    background-image: none;
    background-repeat: no-repeat;
    background-position: center center;
    background-size: cover;
    background-image: url(".$dong['avatar'].");'></div></td>";
									echo "<td>{$dong['HoVaTen']}</td>";
									echo "<td>{$dong['TenDangNhap']}</td>";
									echo "<td>";
										if($dong['QuyenHan'] == 1)
											echo "Quản trị viên";
										else
											echo "Thành viên";
									echo "</td>";
									echo "<td class='text-center'>";
										if($dong['Khoa'] == 1)
											echo "<a href='nguoidung_kichhoat.php?id={$dong['ID']}'><i class='fal fa-ban text-danger'></i></a>";
										else
											echo "<a href='nguoidung_kichhoat.php?id={$dong['ID']}'><i class='fal fa-check text-primary'></i></a>";
									echo "</td>";
									echo "<td class='text-center'><a href='nguoidung_sua.php?id={$dong['ID']}'><i class='fal fa-edit'></i></a></td>";
									echo "<td class='text-center'><a href='nguoidung_xoa.php?id={$dong['ID']}' onclick='return confirm(\"Bạn có muốn xóa người dùng {$dong['HoVaTen']} không?\")'><i class='fal fa-trash-alt text-danger'></i></a></td>";
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