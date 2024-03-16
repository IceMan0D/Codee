<?php 
    session_start();
    require_once 'conn.php';

    if(isset($_POST['signup'])){
       $user_username =$_POST['user_username'];
       $user_fullname =$_POST['user_fullname'];
       $user_email =$_POST['user_email'];
       $user_address =$_POST['user_address'];
       $tel =$_POST['tel'];
       $user_password =$_POST['user_password'];
       $status_id = 3;

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

                if($row['user_username'] == $user_username){
                    $_SESSION['warning'] ='ชื่อผู้ใช้ซ้ํา <a href="Login_User.php">คลิ๊กที่นี่เพื่อเข้าสู่ระบบ</a>';
                    header('location: Register_User.php');
                }elseif(!isset($_SESSION['error'])){
                    $passwordHash = password_hash($user_password, PASSWORD_DEFAULT);
                    $stmt = $conn->prepare("INSERT INTO user(user_username,user_fullname,user_email,user_address,tel,user_password,status_id) VALUES(:user_username,:user_fullname,:user_email,:user_address,:tel,:user_password,:status_id)");
                    $stmt->bindParam(":user_username",$user_username);
                    $stmt->bindParam(":user_fullname",$user_fullname);
                    $stmt->bindParam(":user_email",$user_email);
                    $stmt->bindParam(":user_address",$user_address);
                    $stmt->bindParam(":tel",$tel);
                    $stmt->bindParam(":user_password",$passwordHash);
                    $stmt->bindParam(":status_id",$status_id);
                    $stmt->execute();
                    $_SESSION['succsus']="สมัครสมาชิกเรียบร้อยแล้ว! <a href='Login_User.php' class='alert-link'>คลิ๊กที่นี่เพื่อเข้าสู่ระบบ</a></a>";
                    header("location: Register_User.php");
                }else{
                    $_SESSION['error']="มีบางอย่างผิดพลาด";
                    header("location: Register_User.php");
                }
            }catch(PDOException $e){
                echo $e->getMessage();
            }
       }

    }


?>