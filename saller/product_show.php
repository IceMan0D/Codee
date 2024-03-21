<?php
require_once('../conn.php');
require_once('headsale.php');

require_once('navbarsaller.php');
$perpage = 9;
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$offset = ($page - 1) * $perpage;

$stmt = $conn->prepare('SELECT * FROM course LIMIT :limit OFFSET :offset ');
$stmt->bindParam(':limit', $perpage, PDO::PARAM_INT);
$stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">


<body>
    <header>
        <div class="container">
            <div class="row">
                <?php foreach ($result as $row) {  ?>
                    <div class="col-lg-4">
                        <div class="card card-top m-3" style="width: 18rem;">
                            <div class="showproduct ">
                                <img src="../img/course_img/?php echo $row['course_img']; ?>" class="img-fluid">
                            </div>
                            <div>
                                <p class="title"><?php echo $row['course_name']; ?></p>
                                <p class=""><?php echo $row['course_detail']; ?></p>
                                <p class=""><?php echo $row['course_price']; ?></p>
                                
                                <form action="../order.php" method="post">
                           <input type="hidden" name="course_id" value="<?= $course['course_id'] ?>">
                           <button type="submit" class="btn btn-success">Add to Cart</button>
                           </form>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </header>

    
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


