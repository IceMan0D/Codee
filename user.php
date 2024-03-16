<?php 

    session_start();
    require_once 'conn.php';
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
    <title>user page</title>
</head>
<body>
    <div class="container">
    <?php 

if (isset($_SESSION['user_login'])) {
    $user_id = $_SESSION['user_login'];
    $stmt = $conn->query("SELECT * FROM user WHERE user_id = $user_id");
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>
        <h3 class="mt-4">ยินดีต้อนรับ, <?php echo $row['user_username'] . ' ' . $row['user_fullname'] ?></h3>
    </div>
</body>
</html>