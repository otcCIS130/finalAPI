<?php
    include 'index.html';
?>

<?php

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];

    $apiKey = bin2hex(random_bytes(16)); 

    $sql = "INSERT INTO users (email, api_key) VALUES ('$email', '$apiKey')";

    if ($conn->query($sql) === TRUE) {
        echo "API Key: " . $apiKey;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();

?>