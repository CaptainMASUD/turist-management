<?php
include '../includes/db.php';
include '../includes/functions.php';
session_start();

// Ensure only admins can access this page
if ($_SESSION['role'] !== 'admin') {
    redirect('../login.php');
}

// Fetch necessary data for the dashboard
$users = $conn->query("SELECT * FROM users");
$packages = $conn->query("SELECT * FROM packages");
$payments = $conn->query("SELECT * FROM payments");  // Assuming a payments table exists

// Set default section to manage users
$section = isset($_GET['section']) ? $_GET['section'] : 'users';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .sidebar {
            height: 100vh;
            background-color: #f8f9fa;
            padding-top: 20px;
        }
        .sidebar a {
            display: block;
            padding: 10px 15px;
            color: #333;
            text-decoration: none;
        }
        .sidebar a:hover {
            background-color: #007bff;
            color: white;
        }
        .content-area {
            padding: 20px;
        }
        .sidebar a.active {
            background-color: #007bff;
            color: white;
        }
    </style>
</head>
<body>

<?php include '../includes/navbar.php'; ?>

<div class="container-fluid mt-5">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-3 sidebar">
            <h4 class="text-center">Admin Dashboard</h4>
            <a href="?section=users" class="active">Manage Users</a>
            <a href="?section=packages">Manage Packages</a>
            <a href="?section=payments">Payment History</a>
        </div>

        <!-- Main Content Area -->
        <div class="col-md-9 content-area">
            <?php 
                if ($section == 'users') {
                    include 'manage_users_section.php';
                } elseif ($section == 'packages') {
                    include 'manage_packages_section.php';
                } elseif ($section == 'payments') {
                    include 'payment_history_section.php';
                } else {
                    echo "<h3>Welcome to the Admin Dashboard</h3>";
                }
            ?>
        </div>
    </div>
</div>

<?php include '../includes/footer.php'; ?>

</body>
</html>
