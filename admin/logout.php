<?php
    // ยังไม่ดี
    session_start();
    unset($_SESSION['admin_login']);
    header('location: ../Login_User.php');
    exit;

?>