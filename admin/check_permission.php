<?php
    session_start();
    if(!$_SESSION['admin_login']){
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