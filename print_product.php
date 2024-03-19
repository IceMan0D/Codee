<?php 
    session_start();
    require_once "conn.php";

    if (isset($_SESSION['user_login'])) {
        $user_id = $_SESSION['user_login'];
        $stmt = $conn->query("SELECT * FROM user WHERE user_id = $user_id");
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col"></div>
            <div class="alert alert-primary h4 text-center mt-5" role="alert">
                รายการสั่งซื้อ
            </div>
            <div class="col">
            ชื่อผู้สั่งซื้อ:<?= $row['user_fullname'] ?><br>
            ที่อยู่:<?= $row['user_address'] ?><br>
            เบอร์โทร<?= $row['tel'] ?><br>
            <table class="table">
            </div>
                <thead>
                    <tr>
                        <th>รหัสสินค้า</th>
                        <th>ชื่อสินค้า</th>
                        <th>ราคา</th>
                        <th>จำนวน</th>
                        <th>ราคารวม</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        // วนลูปเพื่อแสดงรายการสินค้าที่เพิ่มเข้าตะกร้า
                        for ($i = 0; $i <= (int)$_SESSION["intLine"]; $i++) {
                            if ($_SESSION["strProductID"][$i] != "") {
                                // ดึงข้อมูลสินค้าจากฐานข้อมูล
                                $sql = "SELECT * FROM course WHERE course_id = :product_id";
                                $result = $conn->prepare($sql);
                                $result->bindParam(':product_id', $_SESSION["strProductID"][$i]);
                                $result->execute();
                                $row = $result->fetch(PDO::FETCH_ASSOC);

                                // คำนวณราคารวม
                                $price = $row['course_price'];
                                $qty = $_SESSION["strQty"][$i];
                                $subtotal = $qty * $price;

                                // แสดงข้อมูลในตาราง
                                echo "<tr>";
                                echo "<td>" . $row['course_id'] . "</td>";
                                echo "<td>" . $row['course_name'] . "</td>";
                                echo "<td>" . $price . "</td>";
                                echo "<td>" . $qty . "</td>";
                                echo "<td>" . $subtotal . "</td>";
                                echo "</tr>";
                            }
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
