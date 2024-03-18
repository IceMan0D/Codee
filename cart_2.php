<?php 
session_start();
require_once "conn.php";

$sql = "SELECT * FROM course WHERE course_id = :id";
$result = $conn->prepare($sql);
$result->bindParam(':id', $id); // Bind the parameter
$result->execute(); // Execute the query
$row = $result->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <form action="" id="form1" method="post">
        <div class="row">
            <div class="col-10">
                <table class="table table-hover"> 
                    <tr>
                        <th>ลำดับที่</th>
                        <th>ชื่อสินค้า</th>
                        <th>ราคา</th>
                        <th>จำนวน</th>
                        <th>ราคารวม</th>
                    </tr>
                    <?php 
                    $Total = 0;
                    $sumprice = 0;
                    $m = 1;
                    for ($i = 0; $i <= (int)$_SESSION["intLine"]; $i++) {
                        if ($_SESSION["strProductID"][$i] != "") {
                            $sql1 = "SELECT * FROM course WHERE course_id = :product_id";
                            $result1 = $conn->prepare($sql1);
                            $result1->bindParam(':product_id', $_SESSION["strProductID"][$i]);
                            $result1->execute();
                            $row_pro = $result1->fetch(PDO::FETCH_ASSOC);

                            $price = $row_pro['course_price'];
                            $qty = $_SESSION["strQty"][$i];
                            $subtotal = $qty * $price;
                            $sumprice += $subtotal;
                            ?>
                            <tr>
                                <td><?= $m ?></td>  
                                <td><?= $row_pro['course_name'] ?></td> <!-- แก้ไขการแสดงชื่อสินค้า -->
                                <td><?= $price ?></td>  
                                <td><?= $qty ?></td>  
                                <td><?= $subtotal ?></td> <!-- แสดงราคารวม -->
                            </tr>
                            <?php 
                            $m++;
                        }
                    }
                    ?>
                </table>
            </div>
        </div>
        </form> 
    </div>
</body>
</html>
