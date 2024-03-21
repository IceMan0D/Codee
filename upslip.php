<?php
    session_start();
    require("conn.php");
    
    $sid = $_POST['sid'];
    $namepic = $_FILES['namepic']['name'];

    $dir = "./images/slip/";
    $fileimage1 = $dir . basename($_FILES["namepic"]["name"]);

    $name1 = basename($_FILES["namepic"]["name"]);

    echo $name1;

    $rs = $conn->prepare("UPDATE sale SET name_img = :name_img WHERE sale_id = :sid");
    $rs->bindParam(':name_img', $name1);
    $rs->bindParam(':sid', $sid);
    $rs->execute(); 
                    
    if(move_uploaded_file($_FILES["namepic"]["tmp_name"], $fileimage1)){
        echo "ไฟล์ภาพชื่อ ". basename($_FILES["namepic"]["name"] ). " อัพโหลดแล้ว";
        
    } else {
        echo "เกิดข้อผิดพลาด กรุณาเลือกรูปภาพ";
    }

    if($rs){
?>
    <script>
        alert("อัปเดตข้อมูลสำเร็จ");
        window.location.href="print_product.php";
    </script>
<?php
    } else {
?>
    <script>
        alert("อัปเดตข้อมูลล้มเหลว");
        window.location.href="slip.php";
    </script>
<?php
    }
?>
