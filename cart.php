<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>ตะกร้าสินค้า</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>ตะกร้าสินค้า</h1>
    <table>
        <thead>
            <tr>
                <th>รายการคอร์ส</th>
                <th>ราคา</th>
                <th>จำนวน</th>
                <th>รวม</th>
                <th>ลบ</th>
            </tr>
        </thead>
        <tbody>
            <?php
            session_start();
            require_once "conn.php";

            if (isset($_SESSION["strProductID"]) && !empty($_SESSION["strProductID"])) {
                $in = str_repeat('?,', count($_SESSION["strProductID"]) - 1) . '?';
                $stmt = $conn->prepare("SELECT course.*, type.type_name FROM course INNER JOIN type ON course.type_id = type.type_id WHERE course.course_id IN ($in)");
                $stmt->execute($_SESSION["strProductID"]);
                $courses = $stmt->fetchAll(PDO::FETCH_ASSOC);
                
                $totalPrice = 0; // Initialize totalPrice
                
                foreach ($courses as $course) {
                    $course_id = $course['course_id'];
                    $key = array_search($course_id, $_SESSION["strProductID"]);
                    $quantity = $_SESSION["strQty"][$key];
                    $subtotal = $course['course_price'] * $quantity;
                    $totalPrice += $subtotal;
            ?>
                <tr>
                    <td><?php echo $course['course_name']; ?></td>
                    <td><?php echo $course['course_price']; ?> บาท</td>
                    <td><?php echo $quantity; ?></td>
                    <td><?php echo $subtotal; ?> บาท</td>
                    <td>
                        <form action="remove_from_cart.php" method="post">
                            <input type="hidden" name="course_id" value="<?php echo $course['course_id']; ?>">
                            <button type="submit">ลบ</button>
                        </form>
                    </td>
                </tr>
            <?php } // End foreach
            } ?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="3"><strong>รวมทั้งหมด</strong></td>
                <td colspan="2"><?php echo $totalPrice; ?> บาท</td>
            </tr>
        </tfoot>
    </table>
    <br>
    <a href="checkout.php">ดำเนินการชำระเงิน</a>
</body>
</html>
