<?php
ob_start();
session_start();
require_once "conn.php";

if (!isset($_SESSION["intLine"])) {
    $_SESSION["intLine"] = 0;
    $_SESSION["strProductID"] = array(); // Initialize as an empty array
    $_SESSION["strQty"] = array();       // Initialize as an empty array
}

// Check if course_id is set and not empty
if (isset($_POST["course_id"]) && !empty($_POST["course_id"])) {
    $course_id = $_POST["course_id"];

    // Check if the product is already in the cart
    $key = array_search($course_id, $_SESSION["strProductID"]);
    if ($key !== false) {
        $_SESSION["strQty"][$key]++;
    } else {
        $_SESSION["intLine"]++;
        $intnewLine = $_SESSION["intLine"];
        $_SESSION["strProductID"][$intnewLine] = $course_id;
        $_SESSION["strQty"][$intnewLine] = 1;
    }
} else {
    echo "Error: Course ID is missing.";
}

// Redirect to cart page (assuming cart.php)
header("location: cart_2.php");
?>
