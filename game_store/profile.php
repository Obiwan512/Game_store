<?php
session_start();
include 'header.php';
include 'db.php';

if (isset($_SESSION['loggedin'])) {
    $username = $_SESSION['username'];

    $sql = "SELECT * FROM Users WHERE username='$username'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>User Profile</title>
            <link rel="stylesheet" type="text/css" href="css/library.css">
        </head>
        <body>
            <div class="content">
                <h2>User Profile</h2>
                <div class="profile-info">
                    <p><strong>Username:</strong> <?php echo $user['username']; ?></p>
                    <p><strong>Email:</strong> <?php echo $user['email']; ?></p>
                </div>

                <h2>Your Library</h2>
                <div class="library">
                    <?php
                    $user_id = $_SESSION['user_id'];
                    $sql = "SELECT G.title, G.price, G.genre, G.rating, G.image FROM Games G INNER JOIN Purchases P ON G.id = P.game_id WHERE P.user_id = '$user_id'";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<div class='game'>";
                            echo "<img class='myimage' src='" . $row['image'] . "' alt='" . $row['title'] . "'>";
                            echo "<h3>" . $row['title'] . "</h3>";
                            echo "<p>Price: $" . $row['price'] . "</p>";
                            echo "<p>Genre: " . $row['genre'] . "</p>";
                            echo "<p>Rating: " . $row['rating'] . "</p>";
                            echo "</div>";
                        }
                    } else {
                        echo "<p>No games found in your library.</p>";
                    }
                    ?>
                </div>
            </div>
            <?php include 'footer.php'; ?>
        </body>
        </html>
        <?php
    } else {
        echo "User not found.";
    }
} else {
    echo "You are not logged in.";
}
?>
