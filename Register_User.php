<?php
    session_start();
    require_once 'conn.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <title>Document</title>
</head>
<body>
  <div class="container">
    <h3>สมัครสมาชิก</h3>
    <hr>
    <form action="signup_db.php" method="post">
      <?php if(isset($_SESSION['error'])):?>
        <div class="alert alert-danger" role="alert">
          <?php 
            echo $_SESSION['error'];
            unset($_SESSION['error']);
          ?>
        </div>
      <?php endif?>
      <?php if(isset($_SESSION['succsus'])):?>
        <div class="alert alert-success" role="alert">
          <?php 
            echo $_SESSION['succsus'];
            unset($_SESSION['succsus']);
          ?>
        </div>
      <?php endif?>
      <?php if(isset($_SESSION['warning'])):?>
        <div class="alert alert-warning" role="alert">
          <?php 
            echo $_SESSION['warning'];
            unset($_SESSION['warning']);
          ?>
        </div>
      <?php endif?>
  <div class="mb-3">
    <label for="user_username" class="form-label">Username</label>
    <input type="text" class="form-control" name="user_username" aria-describedby="username">
  </div>
  
  <div class="mb-3">
    <label for="user_fullname" class="form-label">Fullname</label>
    <input type="text" class="form-control" name="user_fullname" aria-describedby="fullname">
  </div>
  <div class="mb-3">
    <label for="user_email" class="form-label">Email</label>
    <input type="email" class="form-control" name="user_email" aria-describedby="email">
  </div>

  <div class="mb-3">
    <label for="user_address" class="form-label">Address</label>
    <input type="text" class="form-control" name="user_address" aria-describedby="addres">
  </div>

  <div class="mb-3">
    <label for="tel" class="form-label">Telephone</label>
    <input type="tel" class="form-control" name="tel" aria-describedby="tel">
  </div>

  <div class="mb-3">
    <label for="user_password" class="form-label">Password</label>
    <input type="password" class="form-control" name="user_password" >
  </div>


  <button type="submit" name="signup"  class="btn btn-primary">Signup</button>
</form>
<hr>
  <p>เป็นสมาชิกแล้วใช่ไหม คลี๊กตรงนี้เพื่อเข้าสู่ระบบ<a href="Login_User.php" >เข้าสู่ระบบ</a></p>
  </div>
</body>
</html>