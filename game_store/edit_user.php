<?php
include 'header.php';
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $user_id = $_GET['id'];
    $sql = "SELECT * FROM Users WHERE id='$user_id'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();

        $username = $user['username'];
        $email = $user['email'];

    } else {
        echo "User not found.";
    }
} elseif($_SERVER["REQUEST_METHOD"] == "POST"){ 
    $user_id = $_POST['id'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $update_sql = "UPDATE Users SET username='$username', email='$email' WHERE id='$user_id'";
    if ($conn->query($update_sql) === TRUE) {
        echo "User details updated successfully!";
        header('Location:admin.php');
    } else {
        echo "Error updating user details: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link rel="stylesheet" href="css/edit_user.css">
</head>
<body>
    <div class="content">
        <h2>Edit User</h2>
        <form action="" method="post">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" value="<?php echo $user['username']; ?>" required><br>
            
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo $user['email']; ?>" required><br>
            <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
            <button type="submit">Update</button>
        </form>
    </div>
</body>
</html>

<?php include 'footer.php'; ?>
