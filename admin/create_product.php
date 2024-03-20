<?php 
    // session_start();
    require_once '../conn.php'; 
    require_once 'check_permission.php';
    $errors = [];
    $course_name = '';
    $course_price = '';
    $course_detail = '';
    $course_example ='';
    $requirement = '';
    $description = '';
    $suitable = '';
    
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $course_name = htmlspecialchars($_POST['course_name']);
        $course_price = htmlspecialchars($_POST['course_price']);
        $course_detail = htmlspecialchars($_POST['course_detail']);
        $course_example = htmlspecialchars($_POST['course_example']);
        $course_type = htmlspecialchars($_POST['course_type']);
        $requirement = htmlspecialchars($_POST['requirement']);
        $description = htmlspecialchars($_POST['description']);
        $suitable = htmlspecialchars($_POST['suitable']);

        if($course_type == 0){
            $errors[] = 'โปรดเลือกบทเรียน';
        }

        if(!$course_name){
            $errors[] = 'กรุณากรอกชื่อบทเรียน';
        }

        if(!$course_price){
            $errors[] = 'กรุณากรอกราคา';
        }

        if(!empty($_FILES['image']['name'])){     
            $allow_img = ['png', 'jpg', 'jpeg', 'gif'];

            $file_name = $_FILES['image']['name'];
            $file_size = $_FILES['image']['size'];
            $file_tmp = $_FILES['image']['tmp_name'];

            $target_dir = "../img/course_img/$file_name";
            $file_ext = explode('.', $file_name);
            $file_ext = strtolower(end($file_ext));

            if(in_array($file_ext, $allow_img)){
                if($file_size <= 5000000){
                    move_uploaded_file($file_tmp, $target_dir);
                }else{
                    $errors[] = 'ขนาดไฟล์เกิน 5 MB';
                }
            }else{
                $errors[] = 'อัพโหลดไฟล์ png jpg jpeg gif เท่านั้น';
            }
        }else{
            $errors[] = 'กรุณาอัพโหลดไฟล์ภาพ';
        }

        // หากไม่มี error แล้วถึงจะ insert
        if(empty($errors)){
            $stmt_user = $conn->prepare("SELECT user_id FROM user WHERE email = :email");
            $stmt_user->bindParam(':email', $email);
            $stmt_user->execute();
            $row_user = $stmt_user->fetch(PDO::FETCH_ASSOC);
            $user_id = $row_user['user_id'];



            $sql_insert = 'INSERT INTO course (user_id,course_name, course_img ,course_price, 
                            course_detail, course_example, type_id ,requirements , description, suitable_for) 
                            VALUES (:course_name, :course_img ,:course_price, :course_detail,
                            :course_example, :course_type ,:requirement, :description, :suitable)';
                            
            $stmt = $conn->prepare($sql_insert);
    
            $stmt->execute(
                array(
                    ':course_name' => $course_name,
                    ':course_img' => $file_name,
                    ':course_price' => $course_price,
                    ':course_detail' => $course_detail,
                    ':course_example' => $course_example,
                    ':course_type' => $course_type,
                    ':requirement' => $requirement,
                    ':description' => $description,
                    ':suitable' => $suitable
                )
            );

            // ประกาศตัวแปร บอกว่า เพิ่มส้นค้าสำเร็จ
            $message = 'เพิ่มสินค้าสำเร็จ';

            //เคลียข้อมูลหลังจากเพิ่มสินค้า
            $course_name = '';
            $course_price = '';
            $course_detail = '';
            $course_example ='';
            $requirement = '';
            $description = '';
            $suitable = '';
            $_POST['course_type'] = '';
        }
    }
?>

<?php
    //เพิ่มส่วน header ของ html และ แถบเมนูด้านบน
    $title = 'ลงคอร์ส';
    include_once 'views/partials/header.php';
    include_once 'views/partials/navbar.php';
?>

<body>
    <div class="container my-5">
        <!-- แสดง errors -->
        <?php if(!empty($errors)):?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?php foreach ($errors as $error): ?>
            <p><?php echo $error?></p>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <?php endforeach ;?>
        </div>
        <!--  -->
        <?php endif ;?>
        <!-- แสดงว่า insert สำเร็จ -->
        <?php if(!empty($message)): ?>
        <?php echo '<script>
            Swal.fire({
                title: "'.$message.'",
                icon: "success"
              });</script>'?>
        <?php endif ;?>
        <!--  -->
        <a href="" class=""></a>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="formFile" class="form-label">อัพโหลดไฟล์ภาพสำหรับปก</label>
                <input class="form-control" type="file" id="formFile" name="image">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">ชื่อบทเรียน</label>
                <input type="text" class="form-control" id="" value="<?php echo $course_name;?>" name="course_name">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">ราคา</label>
                <input type="number" class="form-control" id="" min=0 name="course_price"
                    value="<?php echo $course_price;?>"></input>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">รายละเอียดของบทเรียน</label>
                <textarea class="form-control" id="" rows="3"
                    name="course_detail"><?php echo $course_detail;?></textarea>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">ลิ้งตัวอย่างวีดีโอ</label>
                <textarea class="form-control" id="" rows="3"
                    name="course_example"><?php echo $course_example;?></textarea>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">ประเภทของบทเรียน</label>
                <select class="form-select" name="course_type">
                    <option value="0">กรุณาเลือกประเภทของบทเรียน</option>
                    <option value="1"
                        <?php if(isset($_POST['course_type']) && $_POST['course_type'] == 1 ){echo 'selected';}?>>Full
                        Stack
                        Developer
                    </option>
                    <option value="2"
                        <?php if(isset($_POST['course_type']) && $_POST['course_type']== 2){echo 'selected';}?>>
                        Front-End
                        Developer
                    </option>
                    <option value="3"
                        <?php if(isset($_POST['course_type']) && $_POST['course_type']== 3){echo 'selected';}?>>Back End
                        Developer
                    </option>
                    <option value="4"
                        <?php if(isset($_POST['course_type'])&& $_POST['course_type']== 4){echo 'selected';}?>>UX/UI
                        Design
                    </option>
                    <option value="5"
                        <?php if(isset($_POST['course_type']) && $_POST['course_type']== 5){echo 'selected';}?>>Free
                        Course
                    </option>
                </select>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">ผู้เรียนต้องมีพื้นฐาน</label>
                <textarea class="form-control" id="" rows="3" name="requirement"><?php echo $requirement;?></textarea>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">คำอธิบายเกี่ยวกับบทเรียน</label>
                <textarea class="form-control" id="" rows="3" name="description"><?php echo $description;?></textarea>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">เหมาะกับใคร</label>
                <textarea class="form-control" id="" rows="3" name="suitable"><?php echo $suitable;?></textarea>
            </div>
            <input class="btn btn-primary" type="submit" value="เพิ่ม" name="submit">
            <a href="list_product.php" class="btn btn-danger">ยกเลิก</a>
        </form>
    </div>
</body>

</html>