<?php 
    require_once("conn.php");
	$id = $_GET['id'];
	$rslip = $conn->query("select * from sale where sale_id = '$id'");
	foreach($rslip as $row){
							$sale_id = $row ['sale_id'];
							$name = $row ['name'];
							$product_id = $row['product_id'];
							$tel = $row['tel'];
							$addr = $row['addr'];
							$zip = $row['zip'];
							$qty = $row['qty'];
							$siz = $row['siz'];
							$send = $row['send'];
							$total = $row['total'];
							$ds = $row['ds'];
							$img = $row['img'];
							$name_img = $row['name_img'];
							$user_id = $row['user_id'];
							$saler = $row['saler'];
	}
	$bimg = $conn->query("select*from user where user_id = '$saler'");
			foreach($bimg as $row){
				$img_bank = $row['img_bank'];
				$no_bank = $row['no_bank'];
		
			}
	
?><br><br><br><br>

<center>
<div class="shadow p-3 mb-5 bg-white rounded" class="card text-dark bg-light mb-3" style="max-width: 800px;">
  <div class="card mb-3">
  <div class="card-body">
    <h3 class="card-title">ข้อมูลการโอนเงิน</h3>
	<form action="upslip.php" method="post" enctype="multipart/form-data">
					<input type="hidden" name="sid" value="<?php echo $sale_id;?>">
					
</div>
    <?php
						if($img == 0){
							
?>
<div class="card mb-3">
  <img src="./images/bank.jpg" width="auto" height="500" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">บัญชีเลขที่ : <?php echo $no_bank;?></h5>
    <p class="card-text">ธนาคาร : กรุงไทย</p>
  </div>
<font color="#dc3545"> * หมายเหตุ : <b>ยังไม่ได้แนบไฟล์</b> *</font><br>
<div class="input-group mb-3">
					  <button class="btn btn-outline-secondary" type="button" id="inputGroupFileAddon03">รูปสลิป</button>
					  <input value="<?php echo $name_img;?>" name="namepic" type="file" class="form-control" id="inputGroupFile03" aria-describedby="inputGroupFileAddon03" aria-label="Upload">
					</div>	
					<hr>
					<button type="submit" class="btn btn-dark">Save</button>
	</form>					
				
							<?php
						}else{
?>
<font color="#dc3545"> * หมายเหตุ : <b>แนบไฟล์แล้ว</b> *</font><br>
<img src="../images/slip/<?php echo $name_img;?>" class="img-fluid" alt="" /><br>
<a type="button" class="btn btn-danger " href="undoslip.php?id=<?php echo $sale_id;?>"><h6>ยกเลิกการแนบไฟล์</h6></a>
<?php
						}
?>
	
	
	
  </div> <a type="button" class="btn btn-secondary " href="print_product.php"><h6>ย้อนกลับ</h6></a>
</div>
</div>

