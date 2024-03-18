<?php
require_once('conn.php');


$stmt = $conn->prepare('SELECT * FROM course ');
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
//var_dump($result);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>

<body>


    <div class="container">
        <div class="row">
            <?php foreach ($result as $row) {  ?>

                <div class="col-lg-4">

                    <div class="card card-top" style="width: 18rem;">
                        <div class="showproduct ">
                            <img src="img/course_img/<?php echo $row['pro_img']; ?>" class="img-fluid">
                        </div>
                        <div>
                            <p class="title"><?php echo $row['course_name']; ?></p>
                            <p class=""></p>
                        </div>
                    </div>
                </div>
            <?php } ?>
<!-- แสดงสินค้า -->


        </div>
    </div>

</body>

</a>

</html>
