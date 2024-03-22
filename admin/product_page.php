<?php
    require_once 'check_permission.php';
    require_once '../conn.php';
    

    $sql = 'SELECT * FROM course';
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $course = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<?php
    include_once 'views/partials/header.php';
    include_once 'views/partials/navbar.php';
?>

<body>
    <div class="container">
        <div class="row">
            <?php foreach($course as $c): ?>
            <div class="col-md-4">
                <div class="card mt-5">
                    <img src="../img/course_img/<?php echo $c['course_img'] ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $c['course_name'] ?></h5>
                        <p class="card-text"><?php echo $c['course_detail'] ?></p>
                        <a href="show_all_product.php?id=<?php echo $c['course_id']?>"
                            class="btn btn-primary">กดเพื่อดู</a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

    </div>

</body>

</html>