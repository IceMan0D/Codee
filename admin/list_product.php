<?php 
    $title = 'จัดการสินค้า';
    require_once '../conn.php'; 
    require_once 'check_permission.php';
    include_once 'views/partials/header.php';
    include_once 'views/partials/navbar.php';

    //Search
    $search = isset($_GET['search_course']) ? trim($_GET['search_course']) : '';
    $searchTerm = "%$search%";
    $sql = 'SELECT course_id, course_name, course_price, type.type_name , type.type_id FROM course INNER JOIN type ON course.type_id = type.type_id';
    
    if(!empty($search)){
        $sql .= ' WHERE course.course_name LIKE :search_course';
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':search_course', $searchTerm);
    }
    else if(isset($_GET['course_type']) && $_GET['course_type'] !== 'all'){
        $course_type = $_GET['course_type'];
        $sql .= ' WHERE course.type_id = :type';
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':type',$course_type);
    }
    else {
        // $sql_select_product = 'SELECT course_id, course_name, course_price, type.type_name FROM course INNER JOIN type ON course.type_id = type.type_id';
        $stmt = $conn->prepare($sql);
    }
    $stmt->execute();
    $course = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<body>
    <?php 
        if(isset($_POST['id'])){
            $course_id = $_POST['id'];
            echo '<script>
                Swal.fire({
                    title: "คุณแน่ใจใช่หรือไม่?",
                    text: "หากลบจะไม่สามารถเรียกคืนได้",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "ใช่, ลบมัน!",
                    cancelButtonText: "ยกเลิก"
                }).then((result) => {
                    if (result.isConfirmed) {
                    window.location.href = "delete_product.php?id='.$course_id.'";
                }
                });
            </script>';
        }
    ?>
    <div class="container my-5">
        <a href="create_product.php" class="btn btn-success">เพิ่มบทเรียน</a>

        <!-- search แบบกรอกข้อความ -->
        <form action="">
            <div class="input-group my-3">
                <input type="text" class="form-control" placeholder="กรอกชื่อบทเรียน" name="search_course"
                    value="<?php echo $search ?>">
                <button class="btn btn-outline-secondary" type="submit" id="button-addon2">ค้นหา</button>
            </div>
        </form>
        <?php
            //ดึงข้อมูล ประเภทคอส
            $sql_course_type = 'SELECT * FROM type';
            $stmt_course_type = $conn->prepare($sql_course_type);
            $stmt_course_type->execute();
            $course_types = $stmt_course_type->fetchAll();
        ?>
        <div class="mt-4 mb-5 container">
            <a href="list_product.php?course_type=all"
                class="btn <?php if($_GET['course_type'] == 'all'){echo 'btn-primary';}?> border border-1 p-3">ทั้งหมด</a>
            <!-- Loop คอส -->
            <?php foreach($course_types as $course_type): ?>
            <a href="list_product.php?course_type=<?php echo $course_type['type_id'] ?>"
                class="btn <?php if($_GET['course_type'] == $course_type['type_id']){echo 'btn-primary';}?> border border-1 p-3"><?php echo $course_type['type_name']?></a>
            <?php endforeach; ?>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <!-- <th scope="col">ภาพ</th> -->
                    <th scope="col">ชื่อบทเรียน</th>
                    <th scope="col">ราคา</th>
                    <th scope="col">ประเภท</th>
                    <th scope="col">ตั้งค่า</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($course as $i => $courses): ?>
                <tr>
                    <th scope="row"><?php echo $i+1 ?></th>
                    <td><?php echo $courses['course_name'] ?></td>
                    <td><?php echo $courses['course_price'] ?></td>
                    <td><?php echo $courses['type_name'] ?></td>
                    <td>
                        <!-- ปุ่มแก้ไข -->
                        <a href="edit_product.php?id=<?php echo $courses['course_id'];?>"
                            class="btn btn-primary">แก้ไข</a>
                        <!-- ปุ่มลบ -->
                        <form action="" method="post" style="display: inline-block;" id="delete_form">
                            <input type="hidden" name="id" value="<?php echo $courses['course_id'];?>">
                            <input type="submit" value="ลบ" class="btn btn-danger">
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>

</html>