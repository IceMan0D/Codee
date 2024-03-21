<?php
    session_start();
	require("conn.php");
	$id = $_GET['id'];

$rs = $conn->query("update sale set img = '0', name_img = '0'
					where sale_id = '$id'");
					
	
	if($rs){
?>
		<script>
			alert("ยกเลิกสำเร็จ");
			window.location.href="index.php";
		</script>
<?php
	}else{
?>
		<script>
			alert("ยกเลิกไม่สำเร็จ");
			window.location.href="index.php";
		</script>
<?php
	}
?>