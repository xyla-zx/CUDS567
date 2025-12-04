<?php
include('condb.php');
$id = $_POST['id'];
$fullname = $_POST['fullname'];
$email = $_POST['email'];
$position = $_POST['position'];

$sql = "UPDATE members SET fullname='$fullname', email='$email', position='$position' WHERE id=$id";

if (mysqli_query($conn, $sql)) {
    echo "<script>alert('Update Successfully!'); window.location='admin_page.php';</script>";
} else {
    echo "Error: " . mysqli_error($conn);
}
?>