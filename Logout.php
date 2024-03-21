<?php 
session_start();
// ทำลาย session ทั้งหมด
session_destroy();
// ลบคุณสมบัติ session
// unset($_SESSION['user_login']);
// ลบคุณสมบัติ session อื่น ๆ ตามต้องการ (ถ้ามี)

// ตรวจสอบว่าคุณกำลังใช้งาน session หรือไม่ หากใช้งานให้ลบ session ปัจจุบัน
if (isset($_COOKIE[session_name()])) {
    setcookie(session_name(), '', time() - 86400, '/');
}
// ส่งผู้ใช้ไปยังหน้า Login_User.php
header('Location: Login_User.php');
exit();
?>