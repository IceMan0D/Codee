<?php 
    session_start();
    require_once 'conn.php';
   // require_once'product_show.php'; 

    if (!isset($_SESSION['user_login'])) {
        $_SESSION['error'] = 'กรุณาเข้าสู่ระบบ!';
        header('location: Login_User.php');
    }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=h, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>user page</title>
</head>

<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link active" aria-current="page" href="user.php">HOME</a>
        <a class="nav-link" href="edituser.php">EDIT PROFLIE</a>
        <a class="nav-link" href="Logout.php">LOG-OUT</a>
      </div>
    </div>
  </div>
</nav>
<!-- hedder -->

    <div class="container">
        <!-- secsion  show data user -->
        <?php 

if (isset($_SESSION['user_login'])) {
    $user_id = $_SESSION['user_login'];
    $stmt = $conn->query("SELECT * FROM user WHERE user_id = $user_id");
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>
        <h3 class="mt-4">Welcome <?php echo $row['user_fullname']; ?></h3>
        <br>
        <?php if(!empty($row['profile'])): ?>
        <img src="<?php echo $row['profile']; ?>" alt="profile" style="width: 150px;">
        <?php endif; ?>
        <br>
        <br>
        <p>email: <?php echo $row['user_email']; ?></p>
        <p>address: <?php echo $row['user_address']; ?></p>
        <p>telephone: <?php echo $row['tel']; ?></p>
        <p>Occupation: <?php echo $row['occupation']; ?></p>
        <p>Detail: <?php echo $row['detail']; ?></p>
        <a href="home.php" class="btn btn-primary">หน้าหลัก</a>
        <br>
        <br>
        <a href="edituser.php" class="btn btn-primary">แก้ไขข้อมูลส่วนตัว</a>
        <br>
        <br>
        <a href="Logout.php" class="btn btn-primary" name="logout"  >ออกจากระบบ</a>
    </div>
    
</body>

</html>
<?php  ?>
