<?php
	ob_start();
	session_start();
    require_once "conn.php";
	
	if(isset($_GET["Line"]))
    
	{
		$Line = $_GET["Line"];
		$_SESSION["strProductID"][$Line] = "";
		$_SESSION["strQty"][$Line] = "";
	}
	header("location:cart_2.php");
?>