<?php
session_start();
include 'header.php';
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $card_number = $_POST['card_number'];
    $expiration_date = $_POST['expiration_date'];
    $cvv = $_POST['cvv'];

    if (isset($_SESSION['loggedin']) && isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];
        $game_id = $_POST['game_id'];

        $conn->begin_transaction();

        try {
            $sql = "INSERT INTO purchases (user_id, game_id, purchase_date) VALUES ('$user_id', '$game_id', NOW())";
            if ($conn->query($sql) !== TRUE) {
                throw new Exception("Error: " . $conn->error);
            }

            $sql = "UPDATE Games SET purchased = 1 WHERE id = '$game_id'";
            if ($conn->query($sql) !== TRUE) {
                throw new Exception("Error: " . $conn->error);
            }

            $conn->commit();

            header("Location: profile.php");
            exit;
        } catch (Exception $e) {
            $conn->rollback();
            echo $e->getMessage();
        }
    } else {
        header("Location: login.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buy Game</title>
    <link rel="stylesheet" href="css/buy.css">
</head>
<body>
    <div class="content">
        <h2>Buy Game</h2>
        <form action="buy.php" method="post">
            <input type="hidden" name="game_id" value="<?php echo $_GET['game_id']; ?>">
            <label for="card_number">Credit Card Number:</label>
            <input type="text" id="card_number" name="card_number" required><br>
            
            <label for="expiration_date">Expiration Date:</label>
            <input type="text" id="expiration_date" name="expiration_date" required><br>
            
            <label for="cvv">CVV:</label>
            <input type="text" id="cvv" name="cvv" required><br>
            
            <button type="submit">Submit</button>
        </form>
    </div>
    <?php include 'footer.php'; ?>
</body>
</html>
