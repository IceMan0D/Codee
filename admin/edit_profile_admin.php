<?php
    require_once 'check_permission.php';
    require_once '../conn.php';

    $user = $_SESSION['admin_login']; 
    $stmt = $conn->prepare("SELECT user_username, user_fullname, tel FROM user WHERE user_id = :status");
    $stmt->bindParam(':status', $user, PDO::PARAM_INT);
    $stmt->execute();
    $admin_data = $stmt->fetch(PDO::FETCH_ASSOC);
    
    // var_dump($admin_data);

    // update user
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
        $user_username = htmlspecialchars($_POST['user_name']);
        $user_fullname = htmlspecialchars($_POST['full_name']);
        $tel = htmlspecialchars($_POST['tel']);

        $stmt2 = $conn->prepare("UPDATE user SET user_username = :user_username, user_fullname = :user_fullname, tel = :tel WHERE user_id = :user_id");
        $stmt2->bindParam(':user_username', $user_username, PDO::PARAM_STR);
        $stmt2->bindParam(':user_fullname', $user_fullname, PDO::PARAM_STR);
        $stmt2->bindParam(':tel', $tel, PDO::PARAM_STR);
        $stmt2->bindParam(':user_id', $user, PDO::PARAM_INT);
        $stmt2->execute();
        $message = 'success';
        // header('location: edit_profile_admin.php');
        // exit();

    }
?>

<?php
    $title = 'แก้ไขบัญชี';
    include_once 'views/partials/header.php';
    include_once 'views/partials/navbar.php';
?>

<body>
    <?php if(!empty($message)): ?>
    <?php 
        echo '
        <script>
            Swal.fire({
                title: "แก้ไขสำเร็จ",
                icon: "success"
              });
              setTimeout(() => {
                window.location.href = "edit_profile_admin.php";
              }, 1000);
        </script>'
        
        ?>
    <?php endif; ?>
    <div class="container">
        <form action="" method="POST" class="my-5">
            <h2 class="text-center mb-3">แก้ไขข้อมูลส่วนตัว</h2>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="" class="form-label">ชื่อผู้ใช้</label>
                    <input type="text" class="form-control" placeholder="กรอกชื่อผู้ใช้" name="user_name"
                        value="<?php echo $admin_data['user_username']; ?>">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="" class="form-label">ชื่อ-นามสกุล</label>
                    <input type="text" class="form-control" placeholder="กรอกชื่อ-นามสกุล" name="full_name"
                        value="<?php echo $admin_data['user_fullname'];  ?>">
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mb-3">
                    <label for="" class="form-label">เบอร์โทรศัพท์</label>
                    <input type="text" class="form-control" placeholder="เบอโทรศัพ" name="tel"
                        value="<?php echo $admin_data['tel'];  ?>">
                </div>
            </div>
            <input class="btn btn-warning" type="submit" value="อัพเดท" name="submit">
        </form>
    </div>
</body>

</html>