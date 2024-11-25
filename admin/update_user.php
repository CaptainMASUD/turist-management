<?php
include '../includes/db.php';
include '../includes/functions.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
    $user_id = sanitize($_GET['id']);
    $result = $conn->query("SELECT * FROM users WHERE id = '$user_id'");
    $user = $result->fetch_assoc();

    if (!$user) {
        die("User not found.");
    }
}

// Update logic
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = sanitize($_POST['name']);
    $username = sanitize($_POST['username']);
    $address = sanitize($_POST['address']);
    $role = sanitize($_POST['role']);
    
    $conn->query("UPDATE users SET name = '$name', username = '$username', address = '$address', role = '$role' WHERE id = '$user_id'");
    header("Location: manage_users.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h3>Update User</h3>
        <form method="POST">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" id="name" class="form-control" value="<?= $user['name'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" name="username" id="username" class="form-control" value="<?= $user['username'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <input type="text" name="address" id="address" class="form-control" value="<?= $user['address'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="role" class="form-label">Role</label>
                <select name="role" id="role" class="form-control" required>
                    <option value="admin" <?= $user['role'] == 'admin' ? 'selected' : ''; ?>>Admin</option>
                    <option value="manager" <?= $user['role'] == 'manager' ? 'selected' : ''; ?>>Manager</option>
                    <option value="user" <?= $user['role'] == 'user' ? 'selected' : ''; ?>>User</option>
                </select>
            </div>
            <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Save Changes</button>
        </form>
    </div>
</body>
</html>
