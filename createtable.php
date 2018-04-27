<?php
$servername = "localhost";
$username = "username";
$password = "";
$dbname = "markets";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// sql to create table
$sql = "CREATE TABLE orders (
source: BIGINT,
duration: INT,
is_buy_order: TINYINT,
issued: BIGINT,
location_id: BIGINT,
min_volume: BIGINT,
order_id: BIGINT,
price: DECIMAL(22,2),
range: VARCHAR(32),
type_id: INT,
volume_remain: BIGINT,
volume_total: BIGINT,
last_seen: BIGINT
)";



if ($conn->query($sql) === TRUE) {
    echo "Table orders created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>
