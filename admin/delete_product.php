<?php
    require_once '../conn.php'; 
    require_once 'check_permission.php';

    $remove_id = $_GET['id'];
    // echo $remove_id;

    // if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $stmt = $conn->prepare('DELETE FROM course WHERE course_id = :id');
        $stmt->bindParam(':id', $remove_id, PDO::PARAM_INT);
        $stmt->execute();
        header('location: list_product.php');
        exit();
    // }
?>