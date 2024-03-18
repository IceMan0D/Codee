<?php 
require_once('conn.php');


$stmt=$conn->prepare('SELECT * FROM course ');
$stmt->execute();
$course_sale = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>salecourse</title>
</head>
<body>
    <h1>your sele</h1>
    <div>
        <?php 
        foreach ($course_sale as $row) {
            echo $row['course_name'];
      
        
        ?>

        <?php }?>
    </div>
    
</body>
</html>