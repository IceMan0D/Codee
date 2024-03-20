<?php 
    $title = 'จัดการสินค้า';
    require_once '../conn.php'; 
    require_once 'check_permission.php';
    include_once 'views/partials/header.php';
    include_once 'views/partials/navbar.php';

    //Search
    $search = isset($_GET['search_course']) ? trim($_GET['search_course']) : '';
    $searchTerm = "%$search%";
    
    if(!empty($search)){
        $sql_search = 'SELECT course.course_id, course.course_name, course.course_price, type.type_name FROM course INNER JOIN type ON course.type_id = type.type_id WHERE course.course_name LIKE :search_course';
        $stmt = $conn->prepare($sql_search);
        $stmt->bindValue(':search_course', $searchTerm);
    }else {
        $sql_select_product = 'SELECT course_id,course_name, course_price, type.type_name FROM course INNER JOIN type ON course.type_id = type.type_id';
        $stmt = $conn->prepare($sql_select_product);
    }
    $stmt->execute();
    $course = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // function substring($str) {
    //     if (strlen($str) >= 50 ){
    //            $output = mb_substr($str, 0, 50, 'UTF-8');
    //            return $output.'...';
    //     }else{
    //         return $str;
    //     }
    // }
?>


<body>
    <?php 
        if(isset($_POST['id'])){
            $course_id = $_POST['id'];
            echo '<script>
                // Use SweetAlert2 to show a confirmation dialog
                Swal.fire({
                    title: "Are you sure?",
                    text: "You won\'t be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                    // If the user clicks the confirm button
                    if (result.isConfirmed) {
                    // Redirect to a page to perform the actual delete
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
                <input type="text" class="form-control" placeholder="กรอกชื่อสินค้า" name="search_course"
                    value="<?php echo $search ?>">
                <button class="btn btn-outline-secondary" type="submit" id="button-addon2">ค้นหา</button>
            </div>
        </form>
        <!-- search ประเภท -->
        <!-- <form action="">
            <select class="form-select" aria-label="Default select example">
                <option selected>เลือกประเภท</option>
                <option value="1">Full Stack Developer</option>
                <option value="2">Back End Developer</option>
                <option value="3">Front-End Developer</option>
                <option value="3">UX/UI Design</option>
                <option value="3">Free Course</option>
            </select>
        </form> -->
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