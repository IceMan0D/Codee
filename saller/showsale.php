<?php

require_once('../conn.php');
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

                <div class="col-md-4">
                   

                    <!-- cardtest -->
                    <div class="card M-3">
                        <div class="card-image ">
                        <img src="../img/course_img/<?php echo $course['course_img'] ?>" class="img-thumbnail"  alt="...">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $course['course_name'] ?></h5>
                            <p class="card-text"><?php echo $course['description'] ?></p>
                            <p class="card-text"><?php echo $course['course_price'] ?></p>
                            <a href="updateproduct.php?id=<?php echo $course['course_id']; ?>" class="btn btn-primary">แก้ไข</a>
                            <!-- ปุ่มลบ -->
                            <a href="addpartsale.php?id=<?php echo $course['course_id']; ?>">
                                <div class="btn btn-warning">เพิ่มบทเรียน</div>
                            </a>
                        </div>
                    </div>
                </div>

            <?php } ?>
        </div>
    </div>
    <div class='pagination d-flex justify-content-center mt-5'>
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
    <style>
        .card-image img {
        width: 100%; /* Ensures the image fills its container */
        height: auto; /* Maintains aspect ratio */
    }
        .card {
            padding: 20px;
            width: 330px;
            min-height: 370px;
            border-radius: 20px;
            background: #212121;
            box-shadow: 5px 5px 8px #1b1b1b,
                -5px -5px 8px #272727;
            transition: 0.4s;
        }

        .card:hover {
            translate: 0 -10px;
        }

        .card-title {
            font-size: 18px;
            font-weight: 600;
            color: #b2eccf;
            margin: 15px 0 0 10px;
        }

        .card-image {
            min-height: 170px;
            background-color: #313131;
            border-radius: 15px;
            background: #313131;
            box-shadow: inset 5px 5px 3px #2f2f2f,
                inset -5px -5px 3px #333333;
        }

        .card-body {
            margin: 13px 0 0 10px;
            color: rgb(184, 184, 184);
            font-size: 15px;
        }

        .footer {
            float: right;
            margin: 28px 0 0 18px;
            font-size: 13px;
            color: #b3b3b3;
        }

        .by-name {
            font-weight: 700;
        }
    </style>
    <?php include "../CodeDee/footer.php" ?>
</body>

</html>