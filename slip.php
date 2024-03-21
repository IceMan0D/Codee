<?php 
    session_start();
    require_once "conn.php"; 
    $productId = $_GET['productId'];
    $coursePrice = $_GET['price'];
    $user = $_GET['user'];
    $_SESSION['productId'] = $productId;
    $_SESSION['course_price'] = $coursePrice;
    $_SESSION['user'] = $user;
    // $id = $_GET['id'];
    // echo $id;
    // $rslip = $conn->query("SELECT * FROM sale WHERE sale_id = '$id'");
    // // $rslip->execute();
    // $result = $rslip->fetchAll(PDO::FETCH_ASSOC);
    // foreach($result as $row){
    //     $sale_id = $row['sale_id'];
    //     // $name = $row['course_id'];
    //     $price = $row['sale_paid'];
    //     $course_id = $row['coures_id'];
    //     // $name_img = $row['name_img'];
    // }
    $img_bank = '';
    // $no_bank = "";
    // $bimg = $conn->query("SELECT * FROM sale WHERE sale_id ='$id'");
    // $result2 = $bimg->fetchAll(PDO::FETCH_ASSOC);
    // foreach($result2 as $row){
    //     $img_bank = $row['name_img'];
    //     $no_bank = $row['insert_img'];
    // }
    
    // ตรวจสอบว่ามีการส่งรูปหลักฐานการโอนเงินหรือไม่
    // if(isset($_FILES['namepic']) && $_FILES['namepic']['name'] != "") {
    //     // ทำการบันทึกรูปหลักฐานการโอนเงินลงในโฟลเดอร์ที่กำหนด
    //     $target_dir = "./images/slip/";
    //     $target_file = $target_dir . basename($_FILES["namepic"]["name"]);
    //     move_uploaded_file($_FILES["namepic"]["tmp_name"], $target_file);
        
    //     // อัปเดตฐานข้อมูลหรือทำการประมวลผลอื่น ๆ ตามที่คุณต้องการ
        
    //     // Redirect ไปยังหน้า print_product.php พร้อมส่งค่ารหัสการขายไปด้วย
    //     header("Location: print_product.php?id=$sale_id&status=waiting_confirmation");
    //     exit(); // ออกจากสคริปต์
    // }

    $sql = 'SELECT name_img FROM sale WHERE user_id = :user_id AND coures_id = :product_product';
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':user_id',$user);
    $stmt->bindParam(':product_product',$productId);
    $stmt->execute();

    if($stmt->rowCount() > 0){
        $img_bank = 1;
    }else {
        $img_bank = 0;
    }

?>
<br><br><br><br>

<center>
    <div class="shadow p-3 mb-5 bg-white rounded" class="card text-dark bg-light mb-3" style="max-width: 800px;">
        <div class="card mb-3">
            <div class="card-body">
                <h3 class="card-title">ข้อมูลการโอนเงิน</h3>
                <form action="insert_slip_todb.php" method="post" enctype="multipart/form-data">
                    <?php if($img_bank == 0){ ?>
                    <div class="card mb-3">
                        <!-- <input type="hidden" name="sid" value="<?php //echo $_SESSION['login_user'];?>"> -->
                        <img src="./images/bank/bank.jpg" width="auto" height="500" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">บัญชีเลขที่:666666666</h5>
                            <p class="card-text">ธนาคาร : กรุงไทย</p>
                        </div>
                        <font color="#dc3545"> * หมายเหตุ : <b>ยังไม่ได้แนบไฟล์</b> *</font><br>
                        <div class="input-group mb-3">
                            <!-- <button class="btn btn-outline-secondary" type="button"
                                id="inputGroupFileAddon03">รูปสลิป</button> -->
                            <label for="">กรุณาอัพโหลดสลิป</label> <br>
                            <input name="namepic" type="file" class="form-control">
                        </div>
                        <hr>
                        <button type="submit" name='insert' class="btn btn-dark">Save</button>
                        <p>ท่านยังไม่ได้แนบสลิป</p>
                    </div>
                    <?php }else { ?>
                    <font color="#dc3545"> * หมายเหตุ : <b>แนบไฟล์แล้ว</b> *</font><br>
                    <img src="./images/bank/bank.jpg" <?php echo $img_bank;?>" class="img-fluid" alt="" /><br>
                    <a type="button" class="btn btn-danger " href="undoslip.php?id=<?php echo $sale_id;?>">
                        <h6>ยกเลิกการแนบไฟล์</h6>
                    </a>
                    <p>Slip attached.</p>
                    <?php } ?>
                </form>
            </div>
            <a type="button" class="btn btn-secondary " href="print_product.php?id=<?php echo $sale_id;?>">
                <h6>ย้อนกลับ</h6>
            </a>
        </div>
    </div>
    </div>