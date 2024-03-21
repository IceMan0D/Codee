<?php

require_once ('../conn.php');
require_once('navbarsaller.php');

$perpage = 9;
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$offset = ($page - 1) * $perpage;

// เรียกข้อมูลผู้ใช้
$user_id = $_SESSION['sale_login'];
$stmt_user = $conn->prepare('SELECT user_username FROM user WHERE user_id = :user_id');
$stmt_user->bindParam(':user_id', $user_id);
$stmt_user->execute();
$user = $stmt_user->fetch(PDO::FETCH_ASSOC);


//echo $user['user_username'];

// เรียกข้อมูลคอร์สที่ผู้ใช้คนนั้นเป็นผู้ขาย
$stmt_course = $conn->prepare('SELECT course.*, user.user_username AS course_seller 
                               FROM course 
                               INNER JOIN user ON course.user_username = user.user_username 
                               WHERE user.user_id = :user_username');
$stmt_course->bindParam(':user_username', $user_id);
$stmt_course->execute();
$courses = $stmt_course->fetchAll(PDO::FETCH_ASSOC);

// แสดงผลข้อมูลคอร์ส
//var_dump($courses);
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
             
                        <div class="col-lg-4">
                            <div class="card card p-2 m-3" style="width: 18rem;">
                                <div class="showproduct ">
                                    <img src="<?php echo $course['course_img']; ?>" class="">
                                </div>
                                <div>
                                    <p class="title"><?php echo $course['course_name']; ?></p>
                                    <p class=""><?php echo $course['course_detail']; ?></p>
                                    <p class=""><?php echo $course['course_price']; ?></p>
                                    <button class="btn btn-success">Order</button>
                                </div>
                            </div>
                        </div>
               
            <?php } ?>
        </div>
    </div>
    <div class='container d-flex justify-content-between'>
        <?php
        $stmt = $conn->prepare('SELECT COUNT(*) as count FROM course');
        $stmt->execute();
        $total = $stmt->fetch(PDO::FETCH_ASSOC)['count'];
        $pages = ceil($total / $perpage);

        for ($i = 1; $i <= $pages; $i++) {
            if ($i == $page) {
                echo "<buttun class='btn btn-primary '>$i</buttun>";
            } else {
                echo "<a href='?page=$i'>$i</a>";
            }
        }
        ?>
    </div>
</body>

</html>