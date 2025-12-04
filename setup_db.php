<?php
include('condb.php');

// 1. à¸ªà¸£à¹‰à¸²à¸‡à¸•à¸²à¸£à¸²à¸‡ members à¸–à¹‰à¸²à¸¢à¸±à¸‡à¹„à¸¡à¹ˆà¸¡à¸µ
$sql_table = "CREATE TABLE IF NOT EXISTS members (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL,
    fullname VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    position ENUM('admin', 'user') DEFAULT 'user'
)";

if (mysqli_query($conn, $sql_table)) {
    echo "<h3>Table 'members' created successfully.</h3>";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}

// 2. à¹€à¸žà¸´à¹ˆà¸¡ Admin à¹€à¸£à¸´à¹ˆà¸¡à¸•à¹‰à¸™ (Username: admin, Pass: admin123) à¹à¸šà¸š Hash
$pass_hash = password_hash("admin123", PASSWORD_DEFAULT);
$sql_admin = "INSERT INTO members (username, password, fullname, email, position) 
              SELECT 'admin', '$pass_hash', 'System Admin', 'admin@example.com', 'admin'
              WHERE NOT EXISTS (SELECT username FROM members WHERE username = 'admin')";

if (mysqli_query($conn, $sql_admin)) {
    echo "<h3>Default Admin created (User: admin / Pass: admin123)</h3>";
}

echo "<br><a href='index.php'>Go to Login Page</a>";
?>