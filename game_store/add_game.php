<?php
session_start();
include 'db.php';

if(isset($_SESSION['loggedin']) && isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    
    $sql = "SELECT * FROM admins WHERE id='$user_id'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $title = $_POST['title'];
            $price = $_POST['price'];
            $image = $_POST['image'];
            $genre = $_POST['genre'];
            $rating = $_POST['rating'];
            
            $sql_insert = "INSERT INTO Games (title, price, image, genre, rating) VALUES ('$title', '$price', '$image', '$genre', '$rating')";
            if ($conn->query($sql_insert) === TRUE) {
                echo "New game added successfully.";
            } else {
                echo "Error adding game: " . $conn->error;
            }
        }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Game</title>
</head>
<body>
    <h2>Add New Game</h2>
    <form action="add_game.php" method="post">
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" required><br>
        <label for="title">Price:</label>
        <input type="decimal" id="price" name="price" required><br>
        <label for="title">Image</label>
        <input type="text" id="image" name="image" required><br>
        <label for="title">Genre:</label>
        <input type="text" id="genre" name="genre" required><br>
        <label for="title">Rating</label>
        <input type="text" id="rating" name="rating" required><br>
        
        <button type="submit">Add Game</button>
    </form>
</body>
</html>

<?php
    } else {
        echo "You are not authorized to add games.";
    }
} else {
    echo "You are not logged in.";
}
$conn->close();
?>
