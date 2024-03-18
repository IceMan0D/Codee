<?php 
    $title = 'จัดการสินค้า';
    require_once '../conn.php'; 
    require_once 'check_permission.php';
    include_once 'views/partials/header.php';
    include_once 'views/partials/navbar.php';
    
    $sql_select_product = 'SELECT * FROM course';
    $stmt = $conn->prepare($sql_select_product);
    $stmt->execute();
    
    $course = $stmt->fetchAll(PDO::FETCH_ASSOC);

    function substring($str) {
        if (strlen($str) >= 50 ){
               $output = mb_substr($str, 0, 50, 'UTF-8');
               return $output.'...';
        }else{
            return $str;
        }
    }
?>


<body>
    <div class="container my-5">
        <table class="table">
            <a href="create_product.php" class="btn btn-success">เพิ่มบทเรียน</a>
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <!-- <th scope="col">ภาพ</th> -->
                    <th scope="col">ชื่อบทเรียน</th>
                    <th scope="col">ราคา</th>
                    <th scope="col">รายละเอียด</th>
                    <th scope="col">ตั้งค่า</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($course as $i => $courses): ?>
                <tr>
                    <th scope="row"><?php echo $i+1 ?></th>
                    <!-- <td><img src="../img/course_img/<?php echo $courses['pro_img']?>" style='width:200px;'></td> -->
                    <td><?php echo $courses['course_name']?></td>
                    <td><?php echo $courses['course_price']?></td>
                    <td><?php echo substring($courses['course_detail']) ?></td>
                    <td>
                        <a href="edit_product.php?id=<?php echo $courses['course_id'];?>"
                            class="btn btn-primary">แก้ไข</a>
                        <form action="delete_product.php" method="post" style="display: inline-block;">
                            <input type="hidden" name="id" value="<?php echo $courses['course_id'];?>">
                            <button type="submit" class="btn btn-danger"
                                onclick="return confirm('คุณแน่ใจหรือไม่ที่จะลบบทเรียนนี้?')">ลบ</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>

</html>