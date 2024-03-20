<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

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
    <?php include "navbar.php"?>

    <h2 class="container mt-5 ">ค้นหาหลักสูตร</h2>

    <div class="filter-container mt-4 mb-5 container">
        <a href="" class="btn border border-1 p-3">💻 Web Deverlopment</a>
        <a href="" class="btn border border-1 p-3">📱 Mobile Deverlopment</a>
        <a href="" class="btn border border-1 p-3">👾 Game Deverlopment</a>
        <a href="" class="btn border border-1 p-3">💾 Data Analytics</a>
    </div>

    <div class="container">
        <h3>ค้นหารายการ</h3>
        <h5>มีรายการที่ตรงกัน 81 รายการ</h5>
    </div>

    <div class="container-fluid">
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-3 row-cols-md-4"></div>
        </div>
    </div>

    <?php include "footer.php"?>
</body>
</html>