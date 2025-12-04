<?php
include('condb.php');
$id = $_GET['id'];
$sql = "SELECT * FROM members WHERE id = $id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Member</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header bg-warning">
                    <h4 class="mb-0">Edit Member</h4>
                </div>
                <div class="card-body">
                    <form action="edit_member_action.php" method="POST">
                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                        
                        <div class="mb-3">
                            <label>Username</label>
                            <input type="text" name="username" class="form-control bg-light" value="<?php echo $row['username']; ?>" readonly>
                        </div>
                        <div class="mb-3">
                            <label>Fullname</label>
                            <input type="text" name="fullname" class="form-control" value="<?php echo $row['fullname']; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" value="<?php echo $row['email']; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label>Position</label>
                            <select name="position" class="form-select">
                                <option value="user" <?php if($row['position']=='user') echo 'selected'; ?>>User</option>
                                <option value="admin" <?php if($row['position']=='admin') echo 'selected'; ?>>Admin</option>
                            </select>
                        </div>
                        
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">Update Data</button>
                            <a href="admin_page.php" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>