<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'heads_down';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);

}

$sql = "SELECT user_id, username, score FROM leaderboard_info ORDER BY score DESC";
$result = $conn->query($sql);

$players = array();
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $players[] = $row;
    }
}

header('Content-Type: application/json');
echo json_encode($players);

$conn->close();
?>