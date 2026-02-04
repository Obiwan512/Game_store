<?php
session_start();
include 'db.php';
include 'header.php';

$message = '';

if(isset($_SESSION['loggedin']) && isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    
    $sql = "SELECT * FROM admins WHERE id='$user_id'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        if(isset($_GET['id']) && !empty($_GET['id'])) {
            $delete_user_id = $_GET['id'];
            
            $sql_user = "SELECT * FROM Users WHERE id='$delete_user_id'";
            $result_user = $conn->query($sql_user);

            if ($result_user->num_rows == 1) {
                $sql_delete = "DELETE FROM Users WHERE id='$delete_user_id'";
                if ($conn->query($sql_delete) === TRUE) {
                    $message = "User deleted successfully.";
                } else {
                    $message = "Error deleting user: " . $conn->error;
                }
            } else {
                $message = "User not found.";
            }
        } else {
            $message = "User ID not provided.";
        }
    } else {
        $message = "You are not authorized to view this page.";
    }
} else {
    $message = "You are not logged in.";
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete User</title>
    <link rel="stylesheet" href="css/delete_user.css">
</head>
<body>
    <div class="content">
        <h2>Delete User</h2>
        <div class="message">
            <?php echo $message; ?>
        </div>
        <a href="admin.php" class="btn-back">Back to Admin Panel</a>
    </div>
</body>
</html>

<?php include 'footer.php'; ?>
