<?php
$title = 'จัดการสินค้า';
require_once '../conn.php';
require_once 'check_permission.php';
include_once 'views/partials/header.php';
include_once 'views/partials/navbar.php';

//pagination eiei
$per_page = 9;
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$offset = ($page - 1) * $per_page;
//Search
$search = isset($_GET['search_course']) ? trim($_GET['search_course']) : '';
$searchTerm = "%$search%";
$sql = 'SELECT course_id, course_name, course_price, type.type_name FROM course INNER JOIN type ON course.type_id = type.type_id';



if (!empty($search)) {
    $sql .= ' WHERE course.course_name LIKE :search_course';
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':search_course', $searchTerm);
} else if (isset($_GET['course_type']) && $_GET['course_type'] !== 'all') {
    $course_type = $_GET['course_type'];
    $sql .= ' WHERE course.type_id = :type';
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':type', $course_type);
} else {
    $sql_select_product = 'SELECT course_id, course_name, course_price, type.type_name FROM course INNER JOIN type ON course.type_id = type.type_id';
    $stmt = $conn->prepare($sql_select_product);
}
$stmt->execute();
$course = $stmt->fetchAll(PDO::FETCH_ASSOC);

//check จํานวนหน้า 
$stmt_count = $conn->prepare($sql);
$stmt_count->execute();
$total_courses = $stmt_count->rowCount();
$total_pages = ceil($total_courses / $per_page);
?>

<body>
    <?php
    if (isset($_POST['id'])) {
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
                    window.location.href = "delete_product.php?id=' . $course_id . '";
                }
                });
            </script>';
    }


    $sql = 'SELECT * FROM course INNER JOIN type ON course.type_id = type.type_id  LIMIT :limit OFFSET :offset ';
    ?>
    <div class="container my-5">
        <a href="create_product.php" class="btn btn-success">เพิ่มบทเรียน</a>

        <!-- search แบบกรอกข้อความ -->
        <form action="">
            <div class="input-group my-3">
                <input type="text" class="form-control" placeholder="กรอกชื่อบทเรียน" name="search_course" value="<?php echo $search ?>">
                <button class="btn btn-outline-secondary" type="submit" id="button-addon2">ค้นหา</button>
            </div>
        </form>
        <div class="mt-4 mb-5 container">
            <a href="list_product.php?course_type=all" class="btn border border-1 p-3">💾 ทั้งหมด</a>
            <a href="list_product.php?course_type=1" class="btn border border-1 p-3">💻 Full Stack Develooper</a>
            <a href="list_product.php?course_type=2" class="btn border border-1 p-3">📱 Back End Developer</a>
            <a href="list_product.php?course_type=3" class="btn border border-1 p-3">👾 Front-End Developer</a>
            <a href="list_product.php?course_type=4" class="btn border border-1 p-3">💾 UX/UI Design</a>
            <a href="list_product.php?course_type=5" class="btn border border-1 p-3">💾 Free Course</a>
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
                <?php foreach ($course as $i => $courses) : ?>
                    <tr>
                        <th scope="row"><?php echo $i + 1 ?></th>
                        <td><?php echo $courses['course_name'] ?></td>
                        <td><?php echo $courses['course_price'] ?></td>
                        <td><?php echo $courses['type_name'] ?></td>
                        <td>
                            <!-- ปุ่มแก้ไข -->
                            <a href="edit_product.php?id=<?php echo $courses['course_id']; ?>" class="btn btn-primary">แก้ไข</a>
                            <!-- ปุ่มลบ -->
                            <form action="" method="post" style="display: inline-block;" id="delete_form">
                                <input type="hidden" name="id" value="<?php echo $courses['course_id']; ?>">
                                <input type="submit" value="ลบ" class="btn btn-danger">
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <div class="pagination">
            <?php for ($i = 1; $i <= $total_pages; $i++) : ?>
                <a href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
            <?php endfor; ?>
        </div>
        



</body>

</html>