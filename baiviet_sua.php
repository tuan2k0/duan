<?php
	include_once "ketnoi.php";
	$id = $_GET['id'];
	$sql = "SELECT * FROM tbl_baiviet WHERE ID = $id";
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
			<h5 class="card-header">Sửa bài viết</h5>
			<div class="card-body">
				<form action="baiviet_sua_xuly.php" method="post">
					<input type="hidden" class="form-control" value="<?php echo $dong['ID']; ?>" id="ID" name="ID" placeholder="" />
				
					<div class="form-group">
						<label for="MaChuDe">Chủ đề</label>
						<select class="form-control custom-select" id="MaChuDe" name="MaChuDe">
							<option value="">-- Chọn --</option>
							<?php
								$sql_cd = "SELECT * FROM tbl_chude";
								$danhsach_cd = mysqli_query($link, $sql_cd);
								while($dong_cd = mysqli_fetch_array($danhsach_cd))
								{
									if($dong['MaChuDe'] == $dong_cd['ID'])
										echo "<option value='".$dong_cd['ID']."' selected>".$dong_cd['TenChuDe']."</option>";
									else
										echo "<option value='".$dong_cd['ID']."'>".$dong_cd['TenChuDe']."</option>";
								}
							?>
						</select>
					</div>
					<div class="form-group">
						<label for="TieuDe">Tiêu đề</label>
						<input type="text" class="form-control" id="TieuDe" name="TieuDe" placeholder="" value="<?php echo $dong['TieuDe']; ?>" />
					</div>
					<div class="form-group">
						<label for="TomTat">Tóm tắt</label>
						<textarea class="form-control" id="TomTat" name="TomTat" placeholder=""><?php echo $dong['TomTat']; ?></textarea>
					</div>
					<div class="form-group">
						<label for="NoiDung">Nội dung bài viết</label>
						<textarea class="form-control ckeditor" id="NoiDung" name="NoiDung" placeholder=""><?php echo $dong['NoiDung']; ?></textarea>
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