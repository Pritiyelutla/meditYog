<?php

require('connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['login_email'];
    $pass = $_POST['login_password'];
    
    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        if (password_verify($pass, $row['password'])) {
            echo "Login successful!";
        } else {
            echo "Invalid password."; 
        }
    } else {
        echo "No user found with this email.";
    }

    $conn->close();
}
?>
