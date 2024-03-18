<?php 
    require_once '../conn.php';
    // session_start();
    $stmt = $conn->prepare('SELECT user_username FROM user WHERE user_id = :user_id');
    $stmt->bindParam(':user_id', $_SESSION['admin_login']);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<nav class="navbar navbar-expand-lg bg-body-tertiary ">
    <div class="container">
        <a class="navbar-brand" href="#">Codee</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="main_admin.php">หน้าแรก</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="list_product.php">จัดการสินค้า</a>
                </li>
            </ul>
        </div>
        <form class="d-flex align-items-center" action=" logout.php">
            <div class="logo-user d-flex align-items-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                    class="bi bi-person-circle me-2" viewBox="0 0 16 16">
                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                    <path fill-rule="evenodd"
                        d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1" />
                </svg>
                <a href="#" class="nav-link me-5"><?php echo $result['user_username']; ?></a>
            </div>
            <button class="btn btn-outline-danger" type="submit">ออกจากระบบ</button>
        </form>
    </div>
</nav>