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
			<h5 class="card-header">Thêm bài viết</h5>
			<div class="card-body">
				<form action="baiviet_them_xuly.php" method="post">
					<div class="form-group">
						<label for="MaChuDe">Chủ đề</label>
						<select class="form-control custom-select" id="MaChuDe" name="MaChuDe">
							<option value="">-- Chọn --</option>
							<?php
								$sql = "SELECT * FROM tbl_chude";
								$danhsach = mysqli_query($link, $sql);
								while($dong = mysqli_fetch_array($danhsach))
								{
									echo "<option value='".$dong['ID']."'>".$dong['TenChuDe']."</option>";
								}
							?>
						</select>
					</div>
					<div class="form-group">
						<label for="TieuDe">Tiêu đề</label>
						<input type="text" class="form-control" id="TieuDe" name="TieuDe" placeholder="" />
					</div>
					<div class="form-group">
						<label for="TomTat">Tóm tắt</label>
						<textarea class="form-control" id="TomTat" name="TomTat" placeholder=""></textarea>
					</div>
					<div class="form-group">
						<label for="NoiDung">Nội dung bài viết</label>
						<textarea class="form-control ckeditor" id="NoiDung" name="NoiDung" placeholder=""></textarea>
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