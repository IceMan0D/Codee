<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <title>Login</title>
</head>
<body>
  <div class="container">
    <h3>เข้าสู่ระบบ</h3>
    <hr>
    <form action="signin_db.php" method="post">
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

    <div class="mb-3">
    <label for="user_username" class="form-label">Username</label>
    <input type="text" class="form-control" name="user_username" aria-describedby="username">
  </div>

  
  <div class="mb-3">
    <label for="user_password" class="form-label">Password</label>
    <input type="password" class="form-control" name="user_password" >
  </div>

  <button type="submit" name="signin"  class="btn btn-primary">Signin</button>
</form>
<hr>
  <p>ยังไม่ได้สมัครสมาชิกใช่ไหม คลิกเพื่อสมัครสมาชิก<a href="Register_User.php" >สมัครสมาชิก</a></p>
  </div>
</body>
</html>