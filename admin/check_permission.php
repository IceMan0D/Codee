<?php
    // session_start();
    if($_SESSION['sale_login']||$_SESSION['admin_login']){
        
    }else{
        echo '<script>alert("ท่านไม่มีสิทธิเข้าถึงหน้านี้.");</script>';
        echo 
        '<script>
                setTimeout(() => {
                },1000)
                window.location.href = "../CodeDee/index.php";
        </script>';
        exit;
    }
?>