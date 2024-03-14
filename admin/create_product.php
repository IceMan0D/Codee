<?php 
    require_once '../conn.php'; 
    $error = '';
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
            $error = 'โปรดเลือกบทเรียน';
        }

        if(empty($error)){
            $sql_insert = 'INSERT INTO course (course_name,course_price, 
                            course_detail, course_example, type_id ,requirements , description, suitable_for) 
                            VALUES (:course_name, :course_price, :course_detail,
                            :course_example, :course_type ,:requirement, :description, :suitable)';
                            
            $stmt = $conn->prepare($sql_insert);
    
            $stmt->execute(
                array(
                    ':course_name' => $course_name,
                    ':course_price' => $course_price,
                    ':course_detail' => $course_detail,
                    ':course_example' => $course_example,
                    ':course_type' => $course_type,
                    ':requirement' => $requirement,
                    ':description' => $description,
                    ':suitable' => $suitable
                )
            );

            header('location: list_product.php');
            exit();
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ลงคอร์ส</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <!-- แสดง error -->
        <?php if($error):?>
        <div class="alert alert-danger" role="alert">
            <?php echo $error?>
        </div>
        <?php endif ;?>
        <form action="" method="post">
            <div class="mb-3">
                <label for="" class="form-label">ชื่อบทเรียน</label>
                <input type="text" class="form-control" id="" value="<?php echo $course_name;?>" name="course_name"
                    required>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">ราคา</label>
                <input type="text" name="course_price" id="" class="form-control" required
                    value="<?php echo $course_price;?>">
                <!-- <input type="number" class="form-control" id="" min=0 name="course_price"></input> -->
            </div>
            <div class="mb-3">
                <label for="" class="form-label">รายละเอียดของบทเรียน</label>
                <textarea class="form-control" id="" rows="3" name="course_detail"
                    required><?php echo $course_detail;?></textarea>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">ลิ้งตัวอย่างวีดีโอ</label>
                <textarea class="form-control" id="" rows="3" name="course_example"
                    required><?php echo $course_example;?></textarea>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">ประเภทของบทเรียน</label>
                <select class="form-select" name="course_type">
                    <option value="0">กรุณาเลือกประเภทของบทเรียน</option>
                    <option value="1">Full Stack Developer</option>
                    <option value="2">Front-End Developer</option>
                    <option value="3">Back End Developer</option>
                    <option value="4">UX/UI Design</option>
                    <option value="5">Free Course</option>
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