<?php
session_start();
require_once '../conn.php';

// เรียกข้อมูลผู้ใช้
$user_id = $_SESSION['sale_login'];
$stmt_user = $conn->prepare('SELECT user_username FROM user WHERE user_id = :user_id');
$stmt_user->bindParam(':user_id', $user_id);
$stmt_user->execute();
$user = $stmt_user->fetch(PDO::FETCH_ASSOC);

// แสดงผลข้อมูลผู้ใช้
echo $user['user_username'];

// เรียกข้อมูลคอร์สที่ผู้ใช้คนนั้นเป็นผู้ขาย
$stmt_course = $conn->prepare('SELECT course.*, user.user_username AS course_seller 
                               FROM course 
                               INNER JOIN user ON course.user_username = user.user_username 
                               WHERE user.user_id = :user_username');
$stmt_course->bindParam(':user_username', $user_id);
$stmt_course->execute();
$courses = $stmt_course->fetchAll(PDO::FETCH_ASSOC);

// แสดงผลข้อมูลคอร์ส
var_dump($courses);
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>your product</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <?php
            foreach ($courses as $course) {  ?>
                <div class="col-4">
                    <div class="card">
                        <div class="col-lg-4">
                            <div class="card card-top" style="width: 18rem;">
                                <div class="showproduct ">
                                    <img src="<?php echo $course['course_img']; ?>" class="img-fluid">
                                </div>
                                <div>
                                    <p class="title"><?php echo $course['course_name']; ?></p>
                                    <p class=""><?php echo $course['course_detail']; ?></p>
                                    <button class="btn btn-success">Order</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</body>

</html>