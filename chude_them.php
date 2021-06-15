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
			<h5 class="card-header">Thêm chủ đề</h5>
			<div class="card-body">
				<form action="chude_them_xuly.php" method="post">
					<div class="form-group">
						<label for="TenChuDe">Tên chủ đề</label>
						<input type="text" class="form-control" id="TenChuDe" name="TenChuDe" placeholder="" />
					</div>
					
					<button type="submit" class="btn btn-primary"><i class="fal fa-save"></i> Thêm vào CSDL</button>
				</form>
			</div>
		</div>
		
		<?php include_once "footer.php"; ?>
	</div>
	
	<?php include_once "javascript.php"; ?>
</body>

</html>