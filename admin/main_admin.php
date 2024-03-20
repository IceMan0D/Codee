<?php
    $title = 'หน้าหลัก';
?>
<?php
    require_once 'check_permission.php';
    include_once 'views/partials/header.php';
    include_once 'views/partials/navbar.php';
?>

<body>
    welcome admin <?php //echo 'test' ?>
    <button class="btn btn-primary">fd</button>


    <?php
        //   $sql2 = 'SELECT user.status_id, status.status_name
        //           FROM user
        //           INNER JOIN status 
        //           ON user.status_id = status.status_id';
        //   $stmt = $conn->prepare($sql2);
        //   $stmt->execute();
        //   $result2 = $stmt->fetchAll(PDO::FETCH_ASSOC);
        //   echo '<pre>';
        //   var_dump($result2);
        //   echo '</pre>';
    ?>
</body>

</html>