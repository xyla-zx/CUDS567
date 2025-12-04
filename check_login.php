<?php
session_start();
include('condb.php');

$username = mysqli_real_escape_string($conn, $_POST['username']);
$password = $_POST['password'];

$sql = "SELECT * FROM members WHERE username = '$username'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    
    // à¸•à¸£à¸§à¸ˆà¸ªà¸­à¸šà¸£à¸«à¸±à¸ªà¸œà¹ˆà¸²à¸™ (Hash Verify)
    if (password_verify($password, $row['password'])) {
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['fullname'] = $row['fullname'];
        $_SESSION['position'] = $row['position'];

        if ($_SESSION['position'] == 'admin') {
            header("Location: admin_page.php");
        } else {
            echo "<script>alert('Login Successful! (User Role)'); window.location='index.php';</script>";
        }
    } else {
        echo "<script>alert('Incorrect Password!'); window.location='index.php';</script>";
    }
} else {
    echo "<script>alert('Username not found!'); window.location='index.php';</script>";
}
?>