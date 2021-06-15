<?php
	include_once "ketnoi.php";
	$id = $_GET['id'];
	$sql = "SELECT * FROM tbl_chude WHERE ID = $id";
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
			<h5 class="card-header">Sửa chủ đề</h5>
			<div class="card-body">
				<form action="chude_sua_xuly.php" method="post">
					<input type="hidden" class="form-control" value="<?php echo $dong['ID']; ?>" id="ID" name="ID" placeholder="" />
					
					<div class="form-group">
						<label for="TenChuDe">Tên chủ đề</label>
						<input type="text" class="form-control" value="<?php echo $dong['TenChuDe']; ?>" id="TenChuDe" name="TenChuDe" placeholder="" />
					</div>
					
					<button type="submit" class="btn btn-primary"><i class="fal fa-save"></i> Cập nhật</button>
				</form>
			</div>
		</div>
		
		<?php include_once "footer.php"; ?>
	</div>
	
	<?php include_once "javascript.php"; ?>
</body>

</html>