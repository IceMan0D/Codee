<?php 
    session_start();
    require_once("conn.php");
    $id = $_GET['id'];
    $rslip = $conn->query("select * from sale where sale_id = '$id'");
    foreach($rslip as $row){
        $sale_id = $row['sale_id'];
        $name = $row['course_name'];
        $price = $row['course_price'];
        $course_id = $row['course_id'];
        $name_img = $row['name_img'];
    }
    $img_bank = 0;
    $no_bank = "";
    $bimg = $conn->query("select * from sale where sale_id ='$id'");
    foreach($bimg as $row){
        $img_bank = $row['img_bank'];
        $no_bank = $row['no_bank'];
    }
    
    // ตรวจสอบว่ามีการส่งรูปหลักฐานการโอนเงินหรือไม่
    if(isset($_FILES['namepic']) && $_FILES['namepic']['name'] != "") {
        // ทำการบันทึกรูปหลักฐานการโอนเงินลงในโฟลเดอร์ที่กำหนด
        $target_dir = "./images/slip/";
        $target_file = $target_dir . basename($_FILES["namepic"]["name"]);
        move_uploaded_file($_FILES["namepic"]["tmp_name"], $target_file);
        
        // อัปเดตฐานข้อมูลหรือทำการประมวลผลอื่น ๆ ตามที่คุณต้องการ
        
        // Redirect ไปยังหน้า print_product.php พร้อมส่งค่ารหัสการขายไปด้วย
        header("Location: print_product.php?id=$sale_id&status=waiting_confirmation");
        exit(); // ออกจากสคริปต์
    }
?>
<br><br><br><br>

<center>
<div class="shadow p-3 mb-5 bg-white rounded" class="card text-dark bg-light mb-3" style="max-width: 800px;">
  <div class="card mb-3">
    <div class="card-body">
      <h3 class="card-title">ข้อมูลการโอนเงิน</h3>
      <form action="upslip.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="sid" value="<?php echo $sale_id;?>">
        
        <?php
            if($img_bank== 0){
        ?>
        <div class="card mb-3">
          <img src="./images/bank/bank.jpg" width="auto" height="500" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">บัญชีเลขที่:666666666</h5>
            <p class="card-text">ธนาคาร : กรุงไทย</p>
          </div>
          <font color="#dc3545"> * หมายเหตุ : <b>ยังไม่ได้แนบไฟล์</b> *</font><br>
          <div class="input-group mb-3">
            <button class="btn btn-outline-secondary" type="button" id="inputGroupFileAddon03">รูปสลิป</button>
            <input value="<?php echo $img_bank; ?>" name="namepic" type="file" class="form-control" id="inputGroupFile03" aria-describedby="inputGroupFileAddon03" aria-label="Upload">
          </div>  
          <hr>
          <button type="submit" class="btn btn-dark">Save</button>
          <p>You haven't attached a slip yet.</p>
        </div>  
        <?php
            } else {
        ?>
        <font color="#dc3545"> * หมายเหตุ : <b>แนบไฟล์แล้ว</b> *</font><br>
        <img src="./images/bank/bank.jpg" <?php echo $img_bank;?>" class="img-fluid" alt="" /><br>
        <a type="button" class="btn btn-danger " href="undoslip.php?id=<?php echo $sale_id;?>"><h6>ยกเลิกการแนบไฟล์</h6></a>
        <p>Slip attached.</p>
        <?php
            }
        ?>
        
      </form>
    </div>
    <a type="button" class="btn btn-secondary " href="print_product.php?id=<?php echo $sale_id;?>"><h6>ย้อนกลับ</h6></a>
  </div>
</div>
</div>
