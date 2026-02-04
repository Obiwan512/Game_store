<?php
include 'header.php';
include 'db.php';

$genres = ["Action", "Adventure", "RPG", "FPS", "Strategy", "Sports"];

$search = isset($_GET['search']) ? $_GET['search'] : '';
$genre_filter = isset($_GET['genre']) ? $_GET['genre'] : 'All';
$price_min = isset($_GET['price_min']) ? $_GET['price_min'] : '';
$price_max = isset($_GET['price_max']) ? $_GET['price_max'] : '';

$sql = "SELECT id, title, price, genre, rating, image FROM Games WHERE 1=1 ";
if (!empty($search)) {
    $sql .= " AND title LIKE '%$search%'";
}
if ($genre_filter !== 'All') {
    $sql .= " AND genre = '$genre_filter'";
}
if (!empty($price_min) && !empty($price_max)) {
    $sql .= " AND price BETWEEN $price_min AND $price_max";
}
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Game Store</title>
    <link rel="stylesheet" type="text/css" href="css/index.css">
</head>
<body style ="background-colour='black'">
    <div class="content">
        <h2>Welcome to Game Store</h2>
        <div class="filters">
            <form action="index.php" method="get">
                <label for="search">Search:</label>
                <input type="text" id="search" name="search" value="<?php echo $search; ?>">
                <label for="genre">Genre:</label>
                <select id="genre" name="genre">
                    <option value="All" <?php echo ($genre_filter === 'All') ? 'selected' : ''; ?>>All</option>
                    <?php foreach ($genres as $genre): ?>
                        <option value="<?php echo $genre; ?>" <?php echo ($genre_filter === $genre) ? 'selected' : ''; ?>><?php echo $genre; ?></option>
                    <?php endforeach; ?>
                </select>
                <label for="price_min">Price Min:</label>
                <input type="number" id="price_min" name="price_min" value="<?php echo $price_min; ?>">
                <label for="price_max">Price Max:</label>
                <input type="number" id="price_max" name="price_max" value="<?php echo $price_max; ?>">
                <button type="submit">Apply</button>
            </form>
        </div>
        <p>Discover and buy the latest games!</p>
        <div class="games-list">
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='game'>";
                    echo "<img src='" . $row['image'] . "' alt='" . $row['title'] . "'>";
                    echo "<h3>" . $row['title'] . "</h3>";
                    echo "<p>Price: $" . $row['price'] . "</p>";
                    echo "<p>Genre: " . $row['genre'] . "</p>";
                    echo "<p>Rating: " . $row['rating'] . "</p>";
                    echo "<form action='buy.php' method='get'>";
                    echo "<input type='hidden' name='game_id' value='" . $row['id'] . "'>";
                    echo "<button type='submit'>Buy</button>";
                    echo "</form>";
                    echo "</div>";
                }
            } else {
                echo "<p>No games found.</p>";
            }
            ?>
        </div>
    </div>
    <?php include 'footer.php'; ?>
</body>
</html>

<?php
$conn->close();
?>
