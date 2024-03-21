<?php 
session_start();
require_once "conn.php";

// $sql = "SELECT * FROM course WHERE course_id = :id";
// $result = $conn->prepare($sql);
// $result->bindParam(':id', $id); // Bind the parameter
// $result->execute(); // Execute the query
// $row = $result->fetch(PDO::FETCH_ASSOC);
$subtotal = 0;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Cart</title>
</head>

<body>
    <div class="container">
        <form action="print_product.php" id="form1" method="post">
            <div class="row">
                <div class="col-10">
                    <table class="table table-hover">
                        <div class="alert alert-primary h4 text-center mt-3" role="alert">
                            ตระกร้าสินค้า
                        </div>
                        <tr>
                            <th>ลำดับที่</th>
                            <th>ชื่อสินค้า</th>
                            <th>ราคา</th>
                            <th>จำนวน</th>
                            <th>ราคารวม</th>
                            <th>ลบ</th>
                        </tr>
                        <?php 
                    $Total = 0;
                    $sumprice = 0;
                    $m = 1; // m คือ ลำดับที่ 
                    for ($i = 0; $i <= (isset($_SESSION["intLine"]) ? (int)$_SESSION["intLine"] : 0); $i++) {
                        if (isset($_SESSION["strProductID"][$i]) && $_SESSION["strProductID"][$i] != "") {
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
                            <td><?= $subtotal ?></td>
                            <td>
                                <a href="product_delete.php?Line=<?= $i ?>"
                                    onclick="return confirm('คุณต้องการลบสินค้าในตะกร้าหรือไม่?')">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                        <path
                                            d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5" />
                                    </svg>
                                </a>
                            </td>
                        </tr>
                        <?php 
                            $m++;
                        }
                    }
                    ?>
                        <!-- แสดงราคารวม -->
                        <tr>
                            <td class="text-end" colspan="4">รวมเป็นเงิน</td>
                            <td class="text-center"><?= $sumprice ?></td>
                            <td>บาท</td>
                        </tr>
                        <?php if($subtotal == 0): ?>
                        <tr>
                            <td colspan="6" class="text-center">ไม่มีสินค้าในตะกร้า</td>
                        </tr>
                        <?php endif; ?>
                    </table>
                    <div style="text-align: right">
                        <a href="productCatalogPagination.php" type="button" class="btn btn-primary">เลือกสินค้า</a> |
                        <button type="button" class="btn btn-danger"
                            onclick="confirmCheckout()">ยืนยันการสั่งซื้อ</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <script>
    function confirmCheckout() {
        if (<?php echo $subtotal ?> == 0) {
            alert("กรุณาเลือกสินค้าก่อนทำการสั่งซื้อ");
        } else {
            // ทำการส่งข้อมูลไปยังหน้าที่ต้องการทำการสั่งซื้อ
            document.getElementById("form1").submit();
        }
    }
    </script>

</body>

</html>