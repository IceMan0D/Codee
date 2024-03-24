<?php 
    session_start();
    require_once 'conn.php';

    if (isset($_POST['update'])) {
        $user_id = $_SESSION['user_login'];
        $user_fullname = $_POST['user_fullname'];
        $user_email = $_POST['user_email'];
        $user_address = $_POST['user_address'];
        $tel = $_POST['tel'];
        $occupation = $_POST['occupation'];
        $detail = $_POST['detail'];

        $sql = "UPDATE user 
                SET user_fullname = :user_fullname, 
                    user_email = :user_email, 
                    user_address = :user_address, 
                    tel = :tel, 
                    occupation = :occupation, 
                    detail = :detail 
                WHERE user_id = :user_id";

        $stmt = $conn->prepare($sql);

        $stmt->bindParam(':user_fullname', $user_fullname, PDO::PARAM_STR);
        $stmt->bindParam(':user_email', $user_email, PDO::PARAM_STR);
        $stmt->bindParam(':user_address', $user_address, PDO::PARAM_STR);
        $stmt->bindParam(':tel', $tel, PDO::PARAM_STR);
        $stmt->bindParam(':occupation', $occupation, PDO::PARAM_STR);
        $stmt->bindParam(':detail', $detail, PDO::PARAM_STR);
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);

        $stmt->execute();

        if(isset($_FILES['profile'])) {
            $file_name = $_FILES['profile']['name'];
            $file_tmp = $_FILES['profile']['tmp_name'];
            $file_size = $_FILES['profile']['size'];
            $file_error = $_FILES['profile']['error'];

            if($file_error === 0) {
                if($file_size <= 10485760) {
                    $file_destination = 'images/profile/' . $file_name; 
                    move_uploaded_file($file_tmp, $file_destination); 

                    $sql_image = "UPDATE user SET profile = :profile WHERE user_id = :user_id";
                    $stmt_image = $conn->prepare($sql_image);
                    $stmt_image->bindParam(':profile', $file_destination, PDO::PARAM_STR);
                    $stmt_image->bindParam(':user_id', $user_id, PDO::PARAM_INT);
                    $stmt_image->execute();
                } else {
                    echo "File is too large.";
                }
            } else {
                echo "There was an error uploading your file.";
            }
        }

        header("location: user.php");
        exit; 
    }

    $user_id = $_SESSION['user_login'];
    $stmt = $conn->prepare("SELECT * FROM user WHERE user_id = :user_id");
    $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Edit User Information</title>
</head>
<body>
    <div class="container">
    <h2>Edit User Information</h2>
    <form method="post" action="" enctype="multipart/form-data">
        <label for="user_fullname">Full Name:</label><br>
        <input type="text" id="user_fullname" name="user_fullname" value="<?php echo $row['user_fullname']; ?>" required><br>
        <label for="user_email">Email:</label><br>
        <input type="email" id="user_email" name="user_email" value="<?php echo $row['user_email']; ?>" required><br>
        <label for="user_address">Address:</label><br>
        <input type="text" id="user_address" name="user_address" value="<?php echo $row['user_address']; ?>" required><br>
        <label for="tel">Telephone:</label><br>
        <input type="tel" id="tel" name="tel" value="<?php echo $row['tel']; ?>" required><br>
        <label for="occupation">Occupation:</label><br>
        <input type="text" id="occupation" name="occupation" value="<?php echo $row['occupation']; ?>"><br>
        <label for="detail">Detail:</label><br>
        <textarea id="detail" name="detail"><?php echo $row['detail']; ?></textarea><br>
        <label for="profile">Profile Picture:</label><br>
        <input type="file" id="profile" name="profile"><br><br>
        <input type="submit" name="update" value="Update" class="btn btn-primary">
        <a href="user.php" class="btn btn-primary">Cancel</a>
    </form>
    </div>
</body>
</html>
