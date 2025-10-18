<?php

require 'include/init.php';

$conn = require 'include/db.php';

if ($conn) {
    try {
        $username = 'gemini_user';
        $password = 'gemini_pass';

        $hash = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO user (username, password) VALUES (:username, :password)";
        
        $stmt = $conn->prepare($sql);
        
        $stmt->bindValue(':username', $username, PDO::PARAM_STR);
        $stmt->bindValue(':password', $hash, PDO::PARAM_STR);
        
        if ($stmt->execute()) {
            echo "<h1>Success!</h1>";
            echo "<p>User '" . htmlspecialchars($username) . "' created successfully.</p>";
            echo "<p>You can now log in with:</p>";
            echo "<p><b>Username:</b> " . htmlspecialchars($username) . "</p>";
            echo "<p><b>Password:</b> " . htmlspecialchars($password) . "</p>";
        } else {
            echo "<h1>Error</h1>";
            echo "<p>Failed to create user.</p>";
        }

    } catch (Exception $e) {
        echo "<h1>An error occurred</h1>";
        echo "<p>" . $e->getMessage() . "</p>";
    }
} else {
    echo "<h1>Database Connection Failed</h1>";
}
