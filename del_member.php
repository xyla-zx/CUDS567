<?php
include('condb.php');
$id = $_GET['id'];
$sql = "DELETE FROM members WHERE id = $id";
if (mysqli_query($conn, $sql)) {
    echo "<script>alert('Deleted Successfully!'); window.location='admin_page.php';</script>";
} else {
    echo "Error: " . mysqli_error($conn);
}
?>