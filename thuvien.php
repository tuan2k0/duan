<?php
	function ThongBao($msg)
	{
		echo '<div class="alert alert-success alert-dismissible fade show mb-0" role="alert">
			<i class="fal fa-check-circle"></i> '.$msg.'
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>';
	}
	
	function ThongBaoLoi($msg)
	{
		echo '<div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
			<i class="fal fa-exclamation-triangle"></i> '.$msg.'
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>';
	}
	
	function LayHinhDauTien($strNoiDung)
	{
		$first_img = "";
		ob_start();
		ob_end_clean();
		$output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $strNoiDung, $matches);
		if(empty($output))
			return "images/noimage.png";
		else
			return $matches[1][0];
	}
?>