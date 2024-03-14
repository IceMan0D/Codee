<?php 
    require_once '../conn.php'; 

    $id = $_GET['id'];

    $sql_select = 'SELECT * FROM course WHERE course_id = :id';
    $stmt = $conn->prepare($sql_select);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $course = $stmt->fetch(PDO::FETCH_ASSOC);

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $course_name = htmlspecialchars($_POST['course_name']);
        $course_price = htmlspecialchars($_POST['course_price']);
        $course_detail = htmlspecialchars($_POST['course_detail']);
        $course_example = htmlspecialchars($_POST['course_example']);
        $course_type = htmlspecialchars($_POST['course_type']);
        $requirements = htmlspecialchars($_POST['requirements']);
        $description = htmlspecialchars($_POST['description']);
        $suitable_for = htmlspecialchars($_POST['suitable']);

        $sql_update = 'UPDATE course 
                        SET course_name = :course_name, course_price = :course_price, course_detail = :course_detail,
                        course_example = :course_example, type_id = :course_type, requirements = :requirements,
                        description = :description, suitable_for = :suitable_for
                        WHERE course_id = :id';

        $stmt = $conn->prepare($sql_update);
        $stmt->bindParam(':course_name', $course_name);
        $stmt->bindParam(':course_price', $course_price);
        $stmt->bindParam(':course_detail', $course_detail);
        $stmt->bindParam(':course_example', $course_example);
        $stmt->bindParam(':course_type', $course_type);
        $stmt->bindParam(':requirements', $requirements);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':suitable_for', $suitable_for);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        header('location: list_product.php');
        exit();
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
        <form action="" method="post">
            <div class="mb-3">
                <label for="" class="form-label">ชื่อบทเรียน</label>
                <input type="text" class="form-control" id="" value="<?php echo $course['course_name'];?>"
                    name="course_name" required>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">ราคา</label>
                <input type="text" name="course_price" id="" class="form-control" required
                    value="<?php echo $course['course_price'];?>">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">รายละเอียดของบทเรียน</label>
                <textarea class="form-control" id="" rows="3" name="course_detail"
                    required><?php echo $course['course_detail'];?></textarea>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">ลิ้งตัวอย่างวีดีโอ</label>
                <textarea class="form-control" id="" rows="3" name="course_example"
                    required><?php echo $course['course_example'];?></textarea>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">ประเภทของบทเรียน</label>
                <select class="form-select" name="course_type">
                    <option value="0">กรุณาเลือกประเภทของบทเรียน</option>
                    <?php
                        $choice = [
                            1 => 'Full Stack Develope',
                            2 => 'Front-End Developer',
                            3 => 'Back End Developer',
                            4 => 'UX/UI Design',
                            5 => 'Free Course',
                        ];
                        foreach ($choice as $key => $value) {
                            $selected = ($course['type_id'] == $key) ? 'selected' : '';
                            echo "<option value='$key' $selected>$value</option>";
                        }
                 ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">ผู้เรียนต้องมีพื้นฐาน</label>
                <textarea class="form-control" id="" rows="3"
                    name="requirements"><?php echo $course['requirements'];?></textarea>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">คำอธิบายเกี่ยวกับบทเรียน</label>
                <textarea class="form-control" id="" rows="3"
                    name="description"><?php echo $course['description'];?></textarea>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">เหมาะกับใคร</label>
                <textarea class="form-control" id="" rows="3"
                    name="suitable"><?php echo $course['suitable_for'];?></textarea>
            </div>
            <input class="btn btn-primary" type="submit" value="อัพเดท" name="submit">
            <a href="list_product.php" class="btn btn-danger">ยกเลิก</a>
        </form>
    </div>
</body>

</html>