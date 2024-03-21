<header class="py-2 px-3 px-md-5 d-flex justify-content-end">
    <i class="bi bi-facebook text-white"></i>
    <i class="bi bi-instagram text-white"></i>
    <i class="bi bi-linkedin text-white"></i>
</header>

<!-- nabbar -->
<nav class="navbar navbar-expand-md mx-3 mx-md-5 px-md-5 py-4">
    <div class="container-fluid p-0">
        <a class="navbar-brand me-3" href="index.php"><img src="images/CodeDee-logo-transformed 1.png" alt=""
                class="w-75"></a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav justify-content-between w-100">

                <div class="d-flex flex-column flex-md-row">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            หมวดหมู่
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            เกี่ยวกับ
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>
                </div>

                <div class="d-flex flex-column flex-md-row">
                    <?php 
                    // ดึง username จาก Database
                    session_start();
                    require_once '../conn.php';
                    $user_id = '';
                    // หากมีค่า session ให้ดึงข้อมูล
                    if(!empty($_SESSION['user_login'])){
                        $user_id = $_SESSION['user_login'];
                        $sql = "SELECT user_username FROM user WHERE user_id = :user_id";
                        $stmt = $conn->prepare($sql);
                        $stmt->bindParam(':user_id',$user_id);
                        $stmt->execute();
                        $result = $stmt->fetch(PDO::FETCH_ASSOC);
                    }
                    ?>
                    <!-- หาก login แล้วให้มี ชื่อ  username แสดง -->
                    <?php if(isset($_SESSION['user_login'])){ ?>
                    <li>
                        <a class="nav-link" href="#">ตระกร้า</a>
                    </li>
                    <li>
                        <a class="nav-link" href="#">แจ้งเตือน</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <?php echo $result['user_username'] ?>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">จัดการบัญชี</a></li>
                            <li><a class="dropdown-item" href="../Logout.php">ออกจากระบบ</a></li>
                        </ul>
                    </li>


                    <!-- หากไม่ได้ login แสดงเหมือนเดิม -->
                    <?php }else { ?>
                    <a class="nav-link me-3" href="../Login_User.php">เข้าสู่ระบบ</a>
                    <?php }?>
                    <!-- <a href="product.php" class="btn btn-primary text-white btn-gradient">เริ่มเข้าสู่บทเรียน</a> -->
                </div>



            </div>
        </div>

    </div>
</nav>