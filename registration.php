<?php

require('connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST['username'];
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $confirm_pass = $_POST['confirm_password'];
    
    if ($pass !== $confirm_pass) {
        die("Passwords do not match.");
    }
    
    $pass_hash = password_hash($pass, PASSWORD_BCRYPT);

    $sql = "INSERT INTO users (username, email, password) VALUES ('$user', '$email', '$pass_hash')";

    if ($conn->query($sql) === TRUE) {
        echo "Registration successful!";
        echo "<a href='Registration.html' > Go Back </a>";

    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
