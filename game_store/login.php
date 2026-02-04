<?php
session_start();
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $login_as = $_POST['login_as'];

    if ($login_as == 'user') {
        $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    } elseif ($login_as == 'admin') {
        $sql = "SELECT * FROM admins WHERE username='$username' AND password='$password'";
    } else {
        echo "Invalid login option.";
        exit;
    }

    $result = $conn->query($sql);

    if ($result && $result->num_rows >= 1) {
        $row = $result->fetch_assoc();
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['login_as'] = $login_as;

        if ($login_as == 'user') {
            header("Location: index.php");
            exit;
        } elseif ($login_as == 'admin') {
            header("Location: admin.php");
            exit;
        }
    } else {
        $error = "Login failed. Please check your credentials.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Game Store</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <div class="container">
        <h2>Login to Game Store</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="login_as">Login As:</label>
                <select name="login_as" id="login_as">
                    <option value="user">User</option>
                    <option value="admin">Admin</option>
                </select>
            </div>
            <div class="form-group">
                <input type="submit" value="Login">
            </div>
        </form>
        <p class="error-message"><?php echo isset($error) ? $error : ''; ?></p>
        <p class="register-message">Don't have an account? <a href="register.php">Register here</a></p>
    </div>
</body>
</html>
