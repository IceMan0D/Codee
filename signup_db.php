<?php 
    session_start();
    require_once 'conn.php';
    $occupation = ""; // กำหนดค่าเริ่มต้นสำหรับตัวแปร $occupation
    $detail = ""; // กำหนดค่าเริ่มต้นสำหรับตัวแปร $detail

    
    if(isset($_POST['signup'])){
       $user_username =$_POST['user_username'];
       $user_fullname =$_POST['user_fullname'];
       $user_email =$_POST['user_email'];
       $user_address =$_POST['user_address'];
       $tel =$_POST['tel'];
       $user_password =$_POST['user_password'];
       $status_id = 3;
       $profile =$_POST['profile_picture'];


       if(isset($_FILES['profile_picture']) && $_FILES['profile_picture']['error'] === UPLOAD_ERR_OK) {
        $profile_picture_tmp = $_FILES['profile_picture']['tmp_name'];
        $profile_picture_name = $_FILES['profile_picture']['name'];
        $profile_picture_ext = pathinfo($profile_picture_name, PATHINFO_EXTENSION);
        // เช็คนามสกุลของไฟล์รูปว่าเป็นรูปภาพหรือไม่
        $allowed_extensions = array('jpg', 'jpeg', 'png', 'gif');
        if(!in_array(strtolower($profile_picture_ext), $allowed_extensions)) {
            $_SESSION['error'] = 'กรุณาอัปโหลดไฟล์รูปภาพที่ถูกต้อง (jpg, jpeg, png, gif)';
            header('location: Register_User.php');
            exit();
        }
        // สร้างชื่อไฟล์ใหม่เพื่อป้องกันชื่อทับ
        $profile_picture_new_name = uniqid('', true) . '.' . $profile_picture_ext;
        $profile_picture_destination = 'pro/' . $profile_picture_new_name;
        // ย้ายไฟล์ไปยังโฟลเดอร์ที่กำหนด
        move_uploaded_file($profile_picture_tmp, $profile_picture_destination);
       }
   }

       if(empty($user_username)){
            $_SESSION['error'] ='กรุณากรอกชื่อผู้ใช้';
            header('location: Register_User.php');
       }elseif(empty($user_fullname)){
            $_SESSION['error'] ='กรุณากรอกชื่อ';
            header('location: Register_User.php');
       }elseif(empty($user_email)){
            $_SESSION['error'] ='กรุณากรอกอีเมล';
            header('location: Register_User.php');
       }elseif(empty($user_address)){
            $_SESSION['error'] ='กรุณากรอกที่อยู่';
            header('location: Register_User.php');
       }elseif(empty($tel)){
            $_SESSION['error'] ='กรุณากรอกเบอร์โทรศัพท์';
            header('location: Register_User.php');
       }elseif(!filter_var($user_email,FILTER_VALIDATE_EMAIL)){
        $_SESSION['error'] ='รูปแบบอีเมลไม่ถูกต้อง';
        header('location: Register_User.php');
       }elseif(empty($user_password)){
        $_SESSION['error'] ='กรุณากรอกรหัสผ่าน';
        header('location: Register_User.php');
       }elseif(strlen($user_password) > 6){
        $_SESSION['error'] ='รหัสผ่านต้องมีความยาวไม่เกิน 6 ตัวอักษร';
        header('location: Register_User.php');
       }else{
            try{
                $check_user = $conn->prepare("SELECT user_username FROM user WHERE user_username = :user_username");
                $check_user -> bindParam(":user_username",$user_username);
                $check_user -> execute();
                $row = $check_user->fetch(PDO::FETCH_ASSOC);

                if ($row && $row['user_username'] == $user_username) {
                    // ตรวจสอบว่ามีชื่อผู้ใช้ซ้ำในฐานข้อมูล
                    $_SESSION['warning'] ='ชื่อผู้ใช้ซ้ำ <a href="Login_User.php">คลิ๊กที่นี่เพื่อเข้าสู่ระบบ</a>';
                    header('location: Register_User.php');

                } elseif (!isset($_SESSION['error'])) {
                    // เมื่อไม่มีข้อผิดพลาด และไม่มีชื่อผู้ใช้ซ้ำ
                    $passwordHash = password_hash($user_password, PASSWORD_DEFAULT);
                    // ทำการเพิ่มข้อมูลผู้ใช้ลงในฐานข้อมูล
                    $stmt = $conn->prepare("INSERT INTO user(profile_picture,user_username,user_fullname,user_email,user_address,tel,user_password,status_id,occupation,detail) VALUES(:profile_picture,:user_username,:user_fullname,:user_email,:user_address,:tel,:user_password,:status_id,:occupation,:detail)");
                    $stmt->bindParam(":profile_picture",$profile_picture_destination);
                    $stmt->bindParam(":user_username",$user_username);
                    $stmt->bindParam(":user_fullname",$user_fullname);
                    $stmt->bindParam(":user_email",$user_email);
                    $stmt->bindParam(":user_address",$user_address);
                    $stmt->bindParam(":tel",$tel);
                    $stmt->bindParam(":user_password",$passwordHash);
                    $stmt->bindParam(":status_id",$status_id);
                    $stmt->bindParam(":occupation",$occupation);
                    $stmt->bindParam(":detail",$detail);
                    $stmt->execute();
                    $_SESSION['success']="สมัครสมาชิกเรียบร้อยแล้ว! <a href='Login_User.php' class='alert-link'>คลิ๊กที่นี่เพื่อเข้าสู่ระบบ</a></a>";
                    header("location: Register_User.php");
                } else {
                    $_SESSION['error']="มีบางอย่างผิดพลาด";
                    header("location: Register_User.php");
                }
            }catch(PDOException $e){
                echo $e->getMessage();
            }
       }

    


?>