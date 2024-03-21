<?php 
require_once('../conn.php');


$stmt=$conn->prepare('SELECT * FROM course ');
$stmt->execute();
$course_sale = $stmt->fetchAll(PDO::FETCH_ASSOC);
var_dump($course_sale);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>salecourse</title>
</head>
<body>
    <h1>your sele</h1>
    <div>
        <?php 
        foreach ($course_sale as $row) {
        ?>
        <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Handle</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row"><?php $row['course_id']; ?></th>
      <td><?php echo $row['course_name'] ;?></td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>
  </tbody>
</table>

        <?php }?>
    </div>
    
</body>
</html>