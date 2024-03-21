<?php
session_start();
require_once "conn.php";

// Define results per page and current page
$results_per_page = 12;
$current_page = isset($_GET['page']) ? $_GET['page'] : 1;

// Calculate offset for pagination
$offset = ($current_page - 1) * $results_per_page;

// Fetch courses with pagination
$stmt = $conn->prepare("SELECT course.*, type.type_name FROM course INNER JOIN type ON course.type_id = type.type_id LIMIT :offset, :results_per_page");
$stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
$stmt->bindParam(':results_per_page', $results_per_page, PDO::PARAM_INT);
$stmt->execute();
$courses = $stmt->fetchAll(PDO::FETCH_ASSOC);
// Get total number of pages for pagination
$total_pages = ceil($conn->query("SELECT COUNT(*) FROM course")->fetchColumn() / $results_per_page);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Home</title>
</head>

<body>
    <a class="btn btn-lg btn-primary" href="home.php" role="button">Home</a>
    <br><br>

    <h1>รายชื่อคอร์สเรียน</h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ชื่อคอร์ส</th>
                <th>ราคา</th>
                <th>โปรโมชั่น</th>
                <th>ประเภท</th>
                <th>รายละเอียดสินค้า</th>
                <th>ดูตัวอย่างเนื้อหา</th>
                <th>เพิ่มเติม</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($courses as $course): ?>
            <tr>
                <td><?= $course['course_name'] ?></td>
                <td><?= $course['course_price'] ?> บาท</td>
                <td><?= $course['course_promotion'] ?> บาท</td>
                <td><?= $course['type_name'] ?></td>
                <td><?= $course['course_detail'] ?></td>
                <td><a href="<?= $course['course_example'] ?>">ดูตัวอย่างเนื้อหา</a></td>
                <td>
                    <form action="order.php" method="post">
                        <input type="hidden" name="course_id" value="<?= $course['course_id'] ?>">
                        <button type="submit" class="btn btn-primary">Add to Cart</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div>
        <?php for ($page = 1; $page <= $total_pages; $page++): ?>
        <a href='home.php?page=<?= $page ?>'><?= $page ?></a>
        <?php endfor; ?>
    </div>

    <a class="btn btn-lg btn-primary" href="cart.php" role="button">ตระกร้าสินค้า</a>
</body>

</html>