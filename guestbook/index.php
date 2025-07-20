<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$mysqli = new mysqli("localhost", "guestuser", "guestpass", "guestbook");
if ($mysqli->connect_errno) {
    echo "Failed to connect: " . $mysqli->connect_error;
    exit();
}
$mysqli->query("CREATE TABLE IF NOT EXISTS messages (id INT AUTO_INCREMENT PRIMARY KEY, name VARCHAR(255), message TEXT)");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $mysqli->prepare("INSERT INTO messages (name, message) VALUES (?, ?)");
    $stmt->bind_param("ss", $_POST['name'], $_POST['message']);
    $stmt->execute();
}
$result = $mysqli->query("SELECT * FROM messages");
?>

<form method="POST">
    Name: <input name="name"><br>
    Message: <textarea name="message"></textarea><br>
    <button type="submit">Submit</button>
</form>

<h2>Messages:</h2>
<?php while($row = $result->fetch_assoc()): ?>
    <p><b><?=htmlspecialchars($row['name'])?></b>: <?=htmlspecialchars($row['message'])?></p>
<?php endwhile; ?>
