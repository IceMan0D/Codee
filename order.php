<?php
ob_start();
session_start();
require_once "conn.php";

// ตรวจสอบว่ามีการส่ง course_id มาหรือไม่
if (!isset($_SESSION["intLine"])) {
  // เริ่มต้นค่าเริ่มต้น
  $_SESSION["intLine"] = 0;
  $_SESSION["strProductID"] = array(); // เก็บรหัสสินค้า
  $_SESSION["strQty"] = array(); // เก็บจำนวนสินค้า
}

// ตรวจสอบว่ามีการส่ง course_id มาหรือไม่
if (isset($_POST["course_id"]) && !empty($_POST["course_id"])) {
  $course_id = $_POST["course_id"];

  // ค้นหาว่าสินค้าอยู่ในตะกร้าแล้วหรือไม่
  $key = array_search($course_id, $_SESSION["strProductID"]);


  // สินค้าอยู่ในตะกร้า แสดงข้อความแจ้งเตือน
  if ($key !== false) {
    // echo "<script>alert('สินค้าอยู่ในตะกร้าแล้ว');</script>";
    // header("location: productCatalogPagination.php");
    echo 
    "<script>
      alert('สินค้านี้อยู่ในตะกร้าแล้ว!')
      window.location.href = 'productCatalogPagination.php'
    </script>";
  } else {
    // สินค้าไม่อยู่ในตะกร้า เพิ่มสินค้าใหม่
    $intnewLine = $_SESSION["intLine"];
    $_SESSION["intLine"]++;
    $_SESSION["strProductID"][$intnewLine] = $course_id;
    $_SESSION["strQty"][$intnewLine] = 1;
    header("location: cart_2.php");
  }
} else {
  // แสดงข้อผิดพลาด
  echo "Error: Course ID is missing.";
}

// Redirect ไปยังหน้าตะกร้า (cart_2.php)

?>