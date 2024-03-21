<?php
    session_start();
    require "conn.php";
    $message = '';

    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['insert'])){
        // $sid = $_POST['sid'];
        $user = $_SESSION['user'];
        $course_id = $_SESSION['productId'];
        $course_price = $_SESSION['course_price'];
        $namepic = $_FILES['namepic']['name'];
        
        $dir = "./images/slip/";
        $fileimage1 = $dir . basename($_FILES["namepic"]["name"]);
        $name1 = basename($_FILES["namepic"]["name"]);
        
        if(move_uploaded_file($_FILES["namepic"]["tmp_name"], $fileimage1)){
            // echo "ไฟล์ภาพชื่อ ". basename($_FILES["namepic"]["name"] ). " อัพโหลดแล้ว";
            
            $sql = 'INSERT INTO sale (user_id, coures_id, sale_paid, insert_img, name_img, payment_status_id) VALUES (:user_id, :course_id, :sale_paid, :insert_img, :name_img, :paymet_status_id)';
            $stmt = $conn->prepare($sql);
            $stmt->execute(
                array(
                    ':user_id' => $user,
                    ':course_id' => $course_id,
                    ':sale_paid' => $course_price,
                    ':insert_img' => 1,
                    ':name_img' => $name1,
                    ':paymet_status_id' => 2
                )
            );
            $message = 'อัพเดทสำเร็จ';
        } else {
            echo "เกิดข้อผิดพลาด กรุณาเลือกรูปภาพ";
        }
    }
?>

<?php if(!empty($message)) {?>
<div class="alert alert-success" role="alert">
    <?php echo "
        <script>
            alert('$message');
            window.location.href = 'print_product.php';
        </script>
    "?>
</div>
<?php }else {?>
<?php echo "
        <script>
            alert('อัปเดทล้มเหลว');
            window.location.href = 'slip.php';
        </script>
    "?>
<?php } ?>