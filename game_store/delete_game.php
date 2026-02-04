<?php
session_start();
include 'db.php';

if(isset($_SESSION['loggedin']) && isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    
    $sql = "SELECT * FROM admins WHERE id='$user_id'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
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
    <title>Delete Game</title>
</head>
<body>
    <h2>Delete Game</h2>
    <form action="delete_game.php" method="post">
        <label for="game_id">Game ID:</label>
        <input type="text" id="game_id" name="game_id" required><br>
        
        <button type="submit">Delete Game</button>
    </form>
</body>
</html>
<?php
    } else {
        echo "You are not authorized to delete games.";
    }
} else {
    echo "You are not logged in.";
}
$conn->close();
?>
