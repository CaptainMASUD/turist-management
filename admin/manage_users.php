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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet"> <!-- Added FontAwesome link -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Parkinsans:wght@300..800&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: "Parkinsans", sans-serif;
            background-color: #f4f6f9;
        }
        .sidebar {
            height: 100vh;
            background-color: #28a745;
            padding-top: 20px;
            border-right: 2px solid #1e7e34;
        }
        .sidebar a {
            display: block;
            padding: 15px 20px;
            color: white;
            text-decoration: none;
            font-weight: 600;
            margin-bottom: 15px;
            border-radius: 5px;
        }
        .sidebar a:hover {
            background-color: #218838;
        }
        .sidebar a.active {
            background-color: #1e7e34;
        }
        .content-area {
            padding: 20px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .sidebar a.active:hover {
            background-color: #1c7430;
        }
        h4, h3 {
            color: #28a745;
            margin-bottom: 30px;
        }
        .icon-btn {
            margin-right: 10px;
        }
        .section-heading {
            font-size: 24px;
            color: #28a745;
            margin-bottom: 20px;
        }
        .table th {
            background-color: #28a745;
            color: white;
        }
        .table td {
            background-color: #f8f9fa;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
    <a class="navbar-brand" href="../index.php">
        <i class="fas fa-map-marker-alt"></i> Tourist Management
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
            <li class="nav-item">
                <a class="nav-link" href="../index.php">
                    <i class="fas fa-home"></i> Home
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../packages.php">
                    <i class="fas fa-suitcase"></i> Packages
                </a>
            </li>

            <?php if (isset($_SESSION['user_id'])): ?>
                <!-- Display username and logout button if the user is logged in -->
               
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../logout.php">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </a>
                </li>
            <?php else: ?>
                <!-- Display the login link if the user is not logged in -->
                <li class="nav-item">
                    <a class="nav-link" href="../login.php">
                        <i class="fas fa-sign-in-alt"></i> Login
                    </a>
                </li>
            <?php endif; ?>
        </ul>
    </div>
</nav>


<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-3 sidebar">
            <h4 class="text-center text-white">Admin Dashboard</h4>
            <a href="?section=users" class="<?php echo ($section == 'users') ? 'active' : ''; ?>"><i class="fas fa-users icon-btn"></i>Manage Users</a>
            <a href="?section=packages" class="<?php echo ($section == 'packages') ? 'active' : ''; ?>"><i class="fas fa-box-open icon-btn"></i>Manage Packages</a>
            <a href="?section=payments" class="<?php echo ($section == 'payments') ? 'active' : ''; ?>"><i class="fas fa-credit-card icon-btn"></i>Payment History</a>
        </div>

        <!-- Main Content Area -->
        <div class="col-md-9 content-area">
            <?php 
                if ($section == 'users') {
                    echo '<h3 class="section-heading"></h3>';
                    include 'manage_users_section.php';
                } elseif ($section == 'packages') {
                    echo '<h3 class="section-heading"></h3>';
                    include 'manage_packages_section.php';
                } elseif ($section == 'payments') {
                    echo '<h3 class="section-heading"></h3>';
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
