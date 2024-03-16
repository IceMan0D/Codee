<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
            // เชื่อมต่อกับฐานข้อมูล
            require_once "conn.php";

            // ดึงข้อมูลคอร์สที่เพิ่มเข้าตะกร้าจากฐานข้อมูล
            $stmt = $conn->query("SELECT * FROM cart INNER JOIN course ON cart.course_id = course.course_id");
            $courses = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $totalPrice = 0;

            foreach ($courses as $course): ?>
                <tr>
                    <td><?php echo $course['course_name']; ?></td>
                    <td><?php echo $course['course_price']; ?> บาท</td>
                    <td><?php 
                        $subtotal = $course['course_price']; 
                        $totalPrice += $subtotal;
                        echo $subtotal; ?> บาท</td>
                    <td>
                        <form action="remove_from_cart.php" method="post">
                            <input type="hidden" name="course_id" value="<?php echo $course['course_id']; ?>">
                            <button type="submit">ลบ</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
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