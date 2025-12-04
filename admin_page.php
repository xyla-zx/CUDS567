<?php 
session_start();
include('condb.php');

if (!isset($_SESSION['user_id']) || $_SESSION['position'] != 'admin') {
    header("Location: index.php");
    exit();
}

$sql = "SELECT * FROM members";
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-light">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
  <div class="container">
    <a class="navbar-brand" href="#"><i class="fa-solid fa-shield-halved me-2"></i>Admin Panel</a>
    <div class="d-flex text-white align-items-center">
        <span class="me-3"><i class="fa-solid fa-user me-1"></i> <?php echo $_SESSION['fullname']; ?></span>
        <a href="logout.php" class="btn btn-sm btn-danger">Logout</a>
    </div>
  </div>
</nav>

<div class="container mt-5">
    <div class="card shadow">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h4 class="mb-0">Member Management</h4>
            <a href="form_add.php" class="btn btn-light text-primary fw-bold"><i class="fa-solid fa-plus"></i> Add Member</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-bordered align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>Username</th>
                            <th>Fullname</th>
                            <th>Email</th>
                            <th>Position</th>
                            <th class="text-center" width="150">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($row = mysqli_fetch_assoc($result)) { ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><span class="badge bg-secondary"><?php echo $row['username']; ?></span></td>
                            <td><?php echo $row['fullname']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td>
                                <?php if($row['position'] == 'admin'){ ?>
                                    <span class="badge bg-warning text-dark">Admin</span>
                                <?php } else { ?>
                                    <span class="badge bg-info">User</span>
                                <?php } ?>
                            </td>
                            <td class="text-center">
                                <a href="form_edit.php?id=<?php echo $row['id']; ?>" class="btn btn-warning btn-sm"><i class="fa-solid fa-pen"></i></a>
                                <a href="del_member.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?');"><i class="fa-solid fa-trash"></i></a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>