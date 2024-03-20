<?php 
    session_start();
    require_once 'conn.php';

    if(isset($_POST['signin'])){
       $user_username = $_POST['user_username'];
       $user_password = $_POST['user_password'];

       if(empty($user_username)){
            $_SESSION['error'] ='กรุณากรอกชื่อผู้ใช้';
            header('location: Login_User.php');
       }elseif(empty($user_password)){
        $_SESSION['error'] ='กรุณากรอกรหัสผ่าน';
        header('location: Login_User.php');
       }else{
            try{
                
                $check_data = $conn->prepare("SELECT * FROM user WHERE user_username = :user_username");
                $check_data -> bindParam(":user_username",$user_username);
                $check_data -> execute();
                $row = $check_data->fetch(PDO::FETCH_ASSOC);
                $hash = password_hash($user_password, PASSWORD_DEFAULT);
                
                if($check_data -> rowCount() > 0){

                    if($user_username == $row['user_username']){
                       echo $user_password.' '.$row['user_password'].' '.$user_password;
                        if(password_verify($user_password,$hash)){
                        // if(password_verify($user_password, PASSWORD_DEFAULT)){
                            echo 'est';
                            if($row['status_id'] == 1){
                                $_SESSION['admin_login'] = $row['user_id'];
                                header("location: admin/main_admin.php");
                            }elseif($row['status_id'] == 2){
                                $_SESSION['sale_login'] = $row['user_id'];
                                header("location: saller/sale.php");
                            }elseif($row['status_id'] == 3){
                                $_SESSION['user_login'] = $row['user_id'];
                                header("location: user.php");
                            }elseif($row['status_id'] == 4){
                                $_SESSION['meter_login'] = $row['user_id'];
                                header("location: meter.php");
                            }else{
                                $_SESSION['error'] = 'รหัสผ่านไม่ถูกต้อง';
                                header("location: Login_User.php");
                            }
                        }
                    }else{
                                $_SESSION['error'] = 'ชื่อไม่ถูกต้อง';
                                header("location: Login_User.php");
                    }
                
                }else{
                    $_SESSION['error']="ไม่มีข้อมูลในระบบ";
                    header("location: Login_User.php");
                }

            }catch(PDOException $e){
                echo $e->getMessage();
            }
       }

    }


?>