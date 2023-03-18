<?php
$hostname = "localhost";
$db_user = "id19791715_root";
$db_pass = "6XI$[(e#hR28@pHe";
$db_name = "id19791715_db_ecom";
// Create connection
$conn = new mysqli($hostname, $db_user, $db_pass, $db_name);


// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>