<?php
require_once '../conn.php';
//pagination how many u want
$per_page = 9;
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$offset = ($page - 1) * $per_page;
///end

$sql = 'SELECT * FROM course INNER JOIN type ON course.type_id = type.type_id ';

if (isset($_GET['course_type']) && $_GET['course_type'] !== 'all') {
    $course_type = $_GET['course_type'];
    $sql .= ' WHERE course.type_id = :type';
}

// Count total number of records
$stmt_count = $conn->prepare($sql);
if (isset($course_type)) {
    $stmt_count->bindParam(':type', $course_type);
}
$stmt_count->execute();
$total_records = $stmt_count->rowCount();

//calculate total pages
$total_pages = ceil($total_records / $per_page);


$sql .= ' LIMIT :per_page OFFSET :offset';
$stmt = $conn->prepare($sql);
//end calculate pages
if (isset($course_type)) {
    $stmt->bindParam(':type', $course_type);
}
$stmt->bindParam(':per_page', $per_page, PDO::PARAM_INT);
$stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
$stmt->execute();
$course = $stmt->fetchAll(PDO::FETCH_ASSOC);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>สินค้า</title>

    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    <!-- bootstarp icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- css -->
    <link rel="stylesheet" href="css/product.css">
    <link rel="stylesheet" href="css/navbar.css">


    <!-- google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
</head>

<body>
    <?php include "navbar.php" ?>


    <h2 class="container mt-5 ">ค้นหาหลักสูตร</h2>

    <div class="filter-container mt-4 mb-5 container">
        <a href="product.php?course_type=1" class="btn border border-1 p-3">💻 Full Stack Develooper</a>
        <a href="product.php?course_type=2" class="btn border border-1 p-3">📱 Back End Developer</a>
        <a href="product.php?course_type=3" class="btn border border-1 p-3">👾 Front-End Developer</a>
        <a href="product.php?course_type=4" class="btn border border-1 p-3">💾 UX/UI Design</a>
        <a href="product.php?course_type=5" class="btn border border-1 p-3">💾 Free Course</a>
        <a href="product.php?course_type=all" class="btn border border-1 p-3">💾 ทั้งหมด</a>
    </div>

    <div class="container">
        <h3>ค้นหารายการ</h3>
        <h5>มีรายการที่ตรงกัน <?php echo $total_records ?> รายการ</h5>
    </div>

    <div class="container-fluid">
        <div class="container">
            <!-- <div class="row row-cols-1 row-cols-sm-3 row-cols-md-4"></div> -->
            <div class="row">
                <?php foreach ($course as $i) : ?>
                    <div class="col-md-4">
                        <div class="card">
                            <img src="../img/course_img/<?php echo $i['course_img'] ?>" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $i['course_name'] ?></h5>
                                <h5 class="card-title"><?php echo $i['type_name'] ?></h5>
                                <p class="card-text"><?php echo $i['description'] ?></p>
                                <a href="product.php?course_id=<?php echo $i['course_id'] ?>" class="btn btn-primary">ดูรายละเอียด</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
<!-- foot pagination -->
                <div class="container mt-3">
                    <ul class="pagination">
                        <?php for ($i = 1; $i <= $total_pages; $i++) : ?>
                            <li class="page-item <?php echo $page === $i ? 'active' : ''; ?>">
                                <a class="page-link" href="?page=<?php echo $i . (isset($course_type) ? '&course_type=' . $course_type : ''); ?>"><?php echo $i; ?></a>
                            </li>
                        <?php endfor; ?>
                    </ul>
                </div>
                <!-- end foot pagination -->
            </div>
        </div>
    </div>
    </div>

    <?php include "footer.php" ?>
</body>

</html>