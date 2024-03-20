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
                <?php 
                session_start();
                require_once "conn.php";

                if (isset($_SESSION['user_login'])) {
                    $user_id = $_SESSION['user_login'];
                    $stmt = $conn->query("SELECT * FROM user WHERE user_id = $user_id");
                    $stmt->execute();
                    $row = $stmt->fetch(PDO::FETCH_ASSOC);

                    if ($row) {
                        echo "ชื่อผู้ใช้: " . $row['user_fullname'] . "<br>";
                        echo "อีเมล: " . $row['user_email'] . "<br>";
                        echo "ที่อยู่: " . $row['user_address'] . "<br>";
                        echo "เบอร์โทร: " . $row['tel'] . "<br>";
                    } else {
                        echo "ไม่พบข้อมูลผู้ใช้";
                    }
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
                    $totalPrice = 0; // เพิ่มตัวแปรสำหรับเก็บรวมราคาสินค้า
                    
                    for ($i = 0; $i <= (isset($_SESSION["intLine"]) ? (int)$_SESSION["intLine"] : 0); $i++) {
                        if (isset($_SESSION["strProductID"][$i]) && $_SESSION["strProductID"][$i] != "") {
                            $sql = "SELECT * FROM course WHERE course_id = :product_id";
                            $result = $conn->prepare($sql);
                            $result->bindParam(':product_id', $_SESSION["strProductID"][$i]);
                            $result->execute();
                            $row = $result->fetch(PDO::FETCH_ASSOC);

                            $price = $row['course_price'];
                            $qty = $_SESSION["strQty"][$i];
                            $subtotal = $qty * $price;

                            $totalPrice += $subtotal; // เพิ่มราคารวมสำหรับแต่ละรายการสินค้า

                            echo "<tr>";
                            echo "<td>" . $row['course_id'] . "</td>";
                            echo "<td>" . $row['course_name'] . "</td>";
                            echo "<td>" . $price . "</td>";
                            echo "<td>" . $qty . "</td>";
                            echo "<td>" . $subtotal . "</td>";

                            $sql_sale = "SELECT * FROM sale WHERE sale_id = :sale_id";
                            $stmt_sale = $conn->prepare($sql_sale);
                            $stmt_sale->bindParam(':sale_id', $_SESSION["sale_id"]);
                            $stmt_sale->execute();
                            $sale_row = $stmt_sale->fetch(PDO::FETCH_ASSOC);

                            $status = isset($sale_row['payment_status_id']) ? $sale_row['payment_status_id'] : 0;
                            $img_status = isset($sale_row['name_img']) ? $sale_row['name_img'] : 0;
                            
                            echo "<td>";
                    if($status == 0){
                        echo "<button type='button' class='btn btn-danger'>รอชำระเงิน</button>";
                    } else if($status == 1){
                        echo "<button type='button' class='btn btn-success'>รอยืนยันจากผู้ขาย</button>";
                    } else {
                        echo "<button type='button' class='btn btn-success'>ชำระเงินเรียนร้อย</button>";
                    }
                    echo "</td>";
                    
                    echo "<td>";
                    if($img_status == 0){
                        echo "<a type='button' class='btn btn-warning' href='slip.php?id=".$_SESSION["sale_id"]."'>ยังไม่แนบ</a>";
                    } else {
                        echo "<a type='button' class='btn btn-success' href='slip.php?id=".$_SESSION["sale_id"]."'>แนบแล้ว</a>";
                    }
                    echo "</td>";
                    
                    echo "</tr>";
                }
            }
                    ?>
                    
                    <tr>
                    <td class="text-end" colspan="3">รวมเป็นเงิน</td>
                        <td class="text-center" colspan="1"><?= $totalPrice ?></td>
                        <td>บาท</td>
                    </tr>
                </tbody>
            </table>
            <div class="">
                <a href="cart_2.php" class="btn btn-primary">กลับหน้าตะกร้า</a>
                <a href="productCatalogPagination.php" class="btn btn-primary">กลับไปหน้าสินค้า</a>
            </div>
        </div>
    </div>
</body>

</html>
