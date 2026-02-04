<?php include 'header.php'; ?>
<link rel="stylesheet" type="text/css" href="css/register.css">
<div class="content">
    <h2>Register</h2>
    <form action="register.php" method="post" onsubmit="return validateForm()">
        <label for="username">Username:</label>
        <input type="text" name="username" required><br>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required><br>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required><br>
        <input type="submit" value="Register">
    </form>
    <script>
        function validateForm() {
            var password = document.getElementById('password').value;
            if (password.length < 8) {
                alert("Password must be at least 8 characters long.");
                return false;
            }
            return true;
        }

    </script>
    <?php
    include 'db.php';
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "Invalid email format.";
        } elseif (strlen($_POST['password']) < 8) {
            echo "Password must be at least 8 characters long.";
        } else {
            $sql = "INSERT INTO Users (username, email, password) VALUES ('$username', '$email', '$password')";
            if ($conn->query($sql) === TRUE) {
                echo "Registration successful!";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    }
    ?>
</div>
<?php include 'footer.php'; ?>
