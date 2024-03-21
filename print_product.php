<?php 

session_start();
require_once "conn.php";
$user_id = '';
if (isset($_SESSION['user_login'])) {
    $user_id = $_SESSION['user_login'];
    $stmt = $conn->query("SELECT * FROM user WHERE user_id = $user_id");
    $stmt->execute();
    $row2 = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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
                <?php 
                    if ($row2) {
                        echo "ชื่อผู้ใช้: " . $row2['user_fullname'] . "<br>";
                        echo "อีเมล: " . $row2['user_email'] . "<br>";
                        echo "ที่อยู่: " . $row2['user_address'] . "<br>";
                        echo "เบอร์โทร: " . $row2['tel'] . "<br>";
                    } else {
                        echo "ไม่พบข้อมูลผู้ใช้";
                    }
                ?>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th>รหัสสินค้า</th>
                        <th>ชื่อสินค้า</th>
                        <th>ราคา</th>
                        <th>จำนวน</th>
                        <th>ราคารวม</th>
                        <th>สถานะ</th>
                        <th>สลิปการโอน</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $totalPrice = 0; // Initialize total price

                    for ($i = 0; $i <= (isset($_SESSION["intLine"]) ? (int)$_SESSION["intLine"] : 0); $i++) {
                        if (isset($_SESSION["strProductID"][$i]) && $_SESSION["strProductID"][$i] != "") {
                            // Fetch product details from database
                            $sql = "SELECT * FROM course WHERE course_id = :product_id";
                            $result = $conn->prepare($sql);
                            $result->bindParam(':product_id', $_SESSION["strProductID"][$i]);
                            $result->execute();
                            $row = $result->fetch(PDO::FETCH_ASSOC);
                            // print_r($row);
                            // exit;
                            $price = $row['course_price'];
                            $qty = $_SESSION["strQty"][$i];
                            $subtotal = $qty * $price;

                            $totalPrice += $subtotal; // Add subtotal to total price

                            // Display product details in table rows
                            echo "<tr>";
                            echo "<td>" . $row['course_id'] . "</td>";
                            echo "<td>" . $row['course_name'] . "</td>";
                            echo "<td>" . $price . "</td>";
                            echo "<td>" . $qty . "</td>"; 
                            echo "<td>" . $subtotal . "</td>";
                            // echo $user_id;

                            $sql_sale = "SELECT payment_status_id, insert_img FROM sale WHERE user_id = :user_id AND coures_id = :coures_id ";
                            $stmt2 = $conn->prepare($sql_sale);
                            $stmt2->bindParam(':user_id', $_SESSION['user_login']);
                            $stmt2->bindParam(':coures_id', $row['course_id']);
                            $stmt2->execute();
                            $sale_rows = $stmt2->fetch(PDO::FETCH_ASSOC);
                            $status = isset($sale_rows['payment_status_id']) ? $sale_rows['payment_status_id'] : '';
                            $img = isset($sale_rows['insert_img']) ? $sale_rows['insert_img'] : '';
                            echo "<td>";
                            if($status  == 1){
                                echo "<button type='button' class='btn btn-danger'>รอชำระเงิน</button>";
                            } else if($status == 2){
                                echo "<button type='button' class='btn btn-warning'>รอยืนยันจากผู้ขาย</button>";
                            } else if($status == 3){
                                echo "<button type='button' class='btn btn-success'>ชำระเงินเรียนร้อย</button>";
                            } else { 
                                echo "<button type='button' class='btn btn-danger'>รอชำระเงิน</button>";
                            };
                            echo "</td>";

                            // Determine and display slip status
                            echo "<td>";
                                if($img == 1){
                                    // echo "<a type='button' class='btn btn-success' href='slip.php?id=".$_SESSION['user_login']."'>แนบแล้ว</a>";
                                    echo "<a type='button' class='btn btn-success' href='slip.php?productId=".$row['course_id']."&price=".$row['course_price']."&user=".$_SESSION['user_login']."'>แนบแล้ว</a>";
                                } else {
                                    // echo "<a type='button' class='btn btn-warning' href='slip.php?id=".$_SESSION["user_login"]."'>ยังไม่แนบ กดเพื่อแนบ</a>";
                                    echo "<a type='button' class='btn btn-warning' href='slip.php?productId=".$row['course_id']."&price=".$row['course_price']."&user=".$_SESSION['user_login']."'>ยังไม่แนบ กดเพื่อแนบ</a>";
                                }
                            echo "</td>";

                            echo "</tr>";
                        }
                    }
                    ?>

                    <!-- Display total price row -->
                    <tr>
                        <td class="text-end" colspan="3">รวมเป็นเงิน</td>
                        <td class="text-center" colspan="1"><?= $totalPrice ?></td>
                        <td>บาท</td>
                    </tr>
                </tbody>
            </table>
            <!-- Buttons for navigation -->
            <div class="">
                <a href="cart_2.php" class="btn btn-primary">กลับหน้าตะกร้า</a>
                <a href="productCatalogPagination.php" class="btn btn-primary">กลับไปหน้าสินค้า</a>
            </div>
        </div>
    </div>
</body>

</html>