<?php
require_once '../admin/check_permission.php';

require_once('../conn.php');
include_once('navbarsaller.php');


if(isset($_SESSION['sale_login'])){
    $status = $_SESSION['sale_login'];
    $stmt = $conn->prepare('SELECT * FROM user WHERE user_id = :user_id');
    $stmt->bindParam(':user_id', $status);
    $stmt->execute();
    $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

foreach($row as $user){
?>
<head>

<!-- bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Saller</title>
</head>

<body>
<div class="display-1 fw-bold"><?php echo$user['user_fullname'];?> </div>
<div class="display-1 fw-bold"><?php echo$user['user_email'];?> </div>
<div class="display-1 fw-bold">PHONE :<?php echo$user['tel'];?> </div>
<div class="display-1 fw-bold"><?php echo$user['user_address'];?> </div>


</body>



<?php } ?>

