<?php
include('condb.php');

$username = $_POST['username'];
$password = $_POST['password'];
$fullname = $_POST['fullname'];
$email = $_POST['email'];
$position = $_POST['position'];

// Hash Password à¸à¹ˆà¸­à¸™à¸šà¸±à¸™à¸—à¸¶à¸
$password_hashed = password_hash($password, PASSWORD_DEFAULT);

$sql = "INSERT INTO members (username, password, fullname, email, position) 
        VALUES ('$username', '$password_hashed', '$fullname', '$email', '$position')";

if (mysqli_query($conn, $sql)) {
    echo "<script>alert('Member Added Successfully!'); window.location='admin_page.php';</script>";
} else {
    echo "Error: " . mysqli_error($conn);
}
?>