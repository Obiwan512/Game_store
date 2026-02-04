<?php
session_start();
include 'header.php';
include 'db.php';

$sql_games_sold = "SELECT game_id, COUNT(*) AS num_sold FROM Purchases GROUP BY game_id";
$result_games_sold = $conn->query($sql_games_sold);
$games_sold = array();
if ($result_games_sold->num_rows > 0) {
    while ($row = $result_games_sold->fetch_assoc()) {
        $games_sold[$row['game_id']] = $row['num_sold'];
    }
}

$sql = "SELECT * FROM Users";
$result = $conn->query($sql);

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_game'])) {
    $title = $_POST['title'];
    $price = $_POST['price'];
    $genre = $_POST['genre'];
    $rating = $_POST['rating'];
    $image = $_POST['image'];

    $sql_add = "INSERT INTO Games (title, price, genre, rating, image) VALUES ('$title', '$price', '$genre', '$rating', '$image')";
    if ($conn->query($sql_add) === TRUE) {
        echo "Game added successfully.";
    } else {
        echo "Error adding game: " . $conn->error;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_game'])) {
    $game_id = $_POST['game_id'];

    $sql_delete = "DELETE FROM Games WHERE id='$game_id'";
    if ($conn->query($sql_delete) === TRUE) {
        echo "Game deleted successfully.";
    } else {
        echo "Error deleting game: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="css/admin.css">
</head>
<body>
    <div class="content">
        <h2>User Management</h2>
        <table class="users-table">
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['username'] . "</td>";
                    echo "<td>" . $row['email'] . "</td>";
                    echo "<td><a href='edit_user.php?id=" . $row['id'] . "' class='btn edit-btn'>Edit</a> | <a href='delete_user.php?id=" . $row['id'] . "' class='btn delete-btn'>Delete</a></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4'>No users found.</td></tr>";
            }
            ?>
        </table>

        <h2>Game Management</h2>
        <h3>Add Game</h3>
        <form action="admin.php" method="post" class="form-style">
            <input type="hidden" name="add_game" value="1">
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" required><br>
            
            <label for="price">Price:</label>
            <input type="text" id="price" name="price" required><br>
            
            <label for="genre">Genre:</label>
            <input type="text" id="genre" name="genre" required><br>
            
            <label for="rating">Rating:</label>
            <input type="text" id="rating" name="rating" required><br>
            
            <label for="image">Image Path:</label>
            <input type="text" id="image" name="image" required><br>
            
            <button type="submit" class="btn">Add Game</button>
        </form>

        <h3>Delete Game</h3>
        <form action="admin.php" method="post" class="form-style">
            <input type="hidden" name="delete_game" value="1">
            <label for="game_id">Game ID:</label>
            <input type="text" id="game_id" name="game_id" required><br>
            
            <button type="submit" class="btn">Delete Game</button>
        </form>

        <h2>Games Sold</h2>
        <table class="sales-table">
    <tr>
        <th>Game Title</th>
        <th>Game ID</th>
        <th>Number of Sales</th>
        <th>Total Earnings</th>
    </tr>
    <?php
    foreach ($games_sold as $game_id => $num_sold) {
        $sql_game_info = "SELECT title, price FROM Games WHERE id='$game_id'";
        $result_game_info = $conn->query($sql_game_info);
        if ($result_game_info->num_rows == 1) {
            $row_game_info = $result_game_info->fetch_assoc();
            $game_title = $row_game_info['title'];
            $game_price = $row_game_info['price'];

            $total_earnings = $num_sold * $game_price;

            echo "<tr>";
            echo "<td>" . $game_title . "</td>";
            echo "<td>" . $game_id . "</td>";
            echo "<td>" . $num_sold . "</td>";
            echo "<td>$" . $total_earnings . "</td>";
            echo "</tr>";
        }
    }
    ?>
</table>
        </table>
    </div>
</body>
</html>

<?php include 'footer.php'; ?>
