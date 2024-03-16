<?php
session_start();

// Check if user is not logged in, then redirect to login page
if (!isset($_SESSION['user_login'])) {
    header('Location: login.php');
    exit();
}

// Get the username from session
$user_username = $_SESSION['user_login'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
<a class="btn btn-lg btn-primary" href="home.php" role="button">home</a>
<br>
<br>
<?php
// Include database connection file
require_once "conn.php";

// Define how many results you want per page
$results_per_page = 12;

// Get current page number from URL, if not available default is page 1
$current_page = isset($_GET['page']) ? $_GET['page'] : 1;

// Calculate the starting limit parameter for the query
$offset = ($current_page - 1) * $results_per_page;

// Prepare SQL query to fetch data from database with pagination
$sql = "SELECT * FROM course LIMIT $offset, $results_per_page";
$result = $conn->query($sql);

// Display the data fetched from database
while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
    // Output data here
    //echo "<p>{$row['course_name']}</p>";
}

// Pagination links
$sql = "SELECT COUNT(*) AS total FROM course";
$result = $conn->query($sql);
$row = $result->fetch(PDO::FETCH_ASSOC);
$total_pages = ceil($row['total'] / $results_per_page);

echo "<div>";
for ($page = 1; $page <= $total_pages; $page++) {
    echo "<a href='home.php?page={$page}'>{$page}</a> ";
}
echo "</div>";
?>
<br>    
<a class="btn btn-lg btn-primary" href="cart.php" role="button">ตระกร้าสินค้า</a>
<?php
// Define how many results you want per page (This line is redundant and can be removed)
//$results_per_page = 12;

// Calculate the starting limit parameter for the query (This line is redundant and can be removed)
//$offset = ($current_page - 1) * $results_per_page;

// Include database connection file (This line is redundant and can be removed)
//require_once "conn.php";

// Retrieve course data from the database
$stmt = $conn->query("SELECT * FROM course LIMIT $offset, $results_per_page");
$courses = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<h1>รายชื่อคอร์สเรียน</h1>
<ul>
    <?php foreach ($courses as $course): ?>
        <li>
            <h2><?php echo $course['course_name']; ?></h2>
            <p><strong>ราคา:</strong> <?php echo $course['course_price']; ?> บาท</p>
            <p><strong>โปรโมชั่น:</strong> <?php echo $course['course_promotion']; ?> บาท</p>
            <p><strong>รายละเอียด:</strong> <?php echo $course['course_detail']; ?></p>
            <p><strong>ตัวอย่างเนื้อหา:</strong> <a href="<?php echo $course['course_example']; ?>">ดูตัวอย่างเนื้อหา</a></p>
            <p><strong>certificate:</strong> <?php echo $course['course_certificate']; ?></p>
            <!-- Add course to cart form -->
            <form action="cart.php" method="post">
    <input type="hidden" name="course_id" value="<?php echo $course['course_id']; ?>"> <!-- เพิ่ม input hidden สำหรับรับค่า course_id -->
    <button type="submit">Add to Cart</button>
</form>
        </li>
    <?php endforeach; ?>
</ul>
</body>
</html>