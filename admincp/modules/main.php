<div class="clear"></div>
<div class="main">
	<?php
		if(isset($_GET['action']) && $_GET['query']){
			$tam = $_GET['action'];
			$query = $_GET['query'];
		}else{
			$tam = '';
			$query = '';
		}
		if($tam=='quanlydanhmucsanpham' && $query=='them'){
			include("modules/quanlydanhmucsp/them.php");
			include("modules/quanlydanhmucsp/lietke.php");
		}else{
			include("modules/quanlydanhmucsp/sua.php");
		}
		
	?>
</div>