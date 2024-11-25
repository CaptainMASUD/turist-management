<?php
include '../includes/db.php';
include '../includes/functions.php';
session_start();

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'manager') {
    redirect('../login.php');
}

$manager_id = $_SESSION['user_id'];
$packages = $conn->query("SELECT * FROM packages WHERE manager_id = '$manager_id'");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['add_package'])) {
        $hotel_name = sanitize($_POST['hotel_name']);
        $bed_type = sanitize($_POST['bed_type']);
        $pool_status = sanitize($_POST['pool_status']);
        $guide_status = sanitize($_POST['guide_status']);
        $go_date = sanitize($_POST['go_date']);
        $back_date = sanitize($_POST['back_date']);
        $price = sanitize($_POST['price']);
        $discount_percentage = sanitize($_POST['discount_percentage']);
        $status = 'Available';

        $query = "INSERT INTO packages (manager_id, hotel_name, bed_type, pool_status, guide_status, go_date, back_date, price, discount_percentage, status) 
                  VALUES ('$manager_id', '$hotel_name', '$bed_type', '$pool_status', '$guide_status', '$go_date', '$back_date', '$price', '$discount_percentage', '$status')";
        $conn->query($query);
        redirect('manage_packages.php');
    } elseif (isset($_POST['delete'])) {
        $package_id = sanitize($_POST['package_id']);
        $conn->query("DELETE FROM packages WHERE id = '$package_id'");
        redirect('manage_packages.php');
    } elseif (isset($_POST['update_status'])) {
        $package_id = sanitize($_POST['package_id']);
        $new_status = sanitize($_POST['status']);
        $conn->query("UPDATE packages SET status = '$new_status' WHERE id = '$package_id'");
        redirect('manage_packages.php');
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Packages</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Parkinsans:wght@300..800&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: "Parkinsans", sans-serif;
            background-color: #f9f9f9;
        }

        .container {
            max-width: 1200px;
            margin-top: 50px;
        }

        .card {
            border: 1px solid #ddd;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            margin-bottom: 30px;
        }

        .card-header {
            background-color: #28a745;
            color: white;
            font-size: 1.5rem;
            font-weight: bold;
            text-align: center;
            padding: 15px;
            border-radius: 8px 8px 0 0;
        }

        .form-group label {
            font-weight: bold;
        }

        .btn-primary {
            background-color: #28a745;
            border-color: #28a745;
            font-weight: bold;
            padding: 10px 20px;
        }

        .btn-primary:hover {
            background-color: #218838;
            border-color: #218838;
        }

        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
        }

        .btn-danger:hover {
            background-color: #c82333;
            border-color: #c82333;
        }

        .btn-sm {
            padding: 5px 10px;
        }

        .table th, .table td {
            vertical-align: middle;
        }

        .table th {
            background-color: #28a745;
            color: white;
        }

        .table td {
            background-color: #ffffff;
        }

        .form-control {
            border-radius: 5px;
            border: 1px solid #ddd;
        }

        .form-control:focus {
            border-color: #28a745;
        }

        .status-dropdown {
            width: 80%;
            margin-right: 5px;
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

<div class="container">
    <div class="card">
        <div class="card-header">Manage Packages</div>
        <div class="card-body">
            <h4>Add New Package</h4>
            <form method="POST">
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="hotel_name">Hotel Name</label>
                        <input type="text" name="hotel_name" id="hotel_name" class="form-control" required>
                    </div>
                    <div class="col-md-2">
                        <label for="bed_type">Bed Type</label>
                        <select name="bed_type" id="bed_type" class="form-control" required>
                            <option value="Single">Single</option>
                            <option value="Double">Double</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="pool_status">Pool Status</label>
                        <select name="pool_status" id="pool_status" class="form-control" required>
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="guide_status">Guide Status</label>
                        <select name="guide_status" id="guide_status" class="form-control" required>
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="go_date">Go Date</label>
                        <input type="date" name="go_date" id="go_date" class="form-control">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-2">
                        <label for="back_date">Back Date</label>
                        <input type="date" name="back_date" id="back_date" class="form-control">
                    </div>
                    <div class="col-md-2">
                        <label for="price">Price</label>
                        <input type="number" name="price" id="price" class="form-control" required>
                    </div>
                    <div class="col-md-2">
                        <label for="discount_percentage">Discount (%)</label>
                        <input type="number" name="discount_percentage" id="discount_percentage" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <button type="submit" name="add_package" class="btn btn-primary">Add Package</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <h4>Your Packages</h4>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Hotel Name</th>
                <th>Bed Type</th>
                <th>Pool</th>
                <th>Guide</th>
                <th>Go Date</th>
                <th>Back Date</th>
                <th>Price</th>
                <th>Discount</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($package = $packages->fetch_assoc()): ?>
                <tr>
                    <td><?= $package['id'] ?></td>
                    <td><?= $package['hotel_name'] ?></td>
                    <td><?= $package['bed_type'] ?></td>
                    <td><?= $package['pool_status'] ?></td>
                    <td><?= $package['guide_status'] ?></td>
                    <td><?= $package['go_date'] ?: 'N/A' ?></td>
                    <td><?= $package['back_date'] ?: 'N/A' ?></td>
                    <td>৳<?= $package['price'] ?></td>
                    <td><?= $package['discount_percentage'] ?>%</td>
                    <td><?= $package['status'] ?></td>
                    <td>
                        <form method="POST" style="display: inline;">
                            <input type="hidden" name="package_id" value="<?= $package['id'] ?>">
                            <select name="status" class="form-control d-inline status-dropdown">
                                <option value="Available" <?= $package['status'] == 'Available' ? 'selected' : '' ?>>Available</option>
                                <option value="Sold Out" <?= $package['status'] == 'Sold Out' ? 'selected' : '' ?>>Sold Out</option>
                            </select>
                            <button type="submit" name="update_status" class="btn btn-success btn-sm">Update</button>
                        </form>
                        <form method="POST" style="display: inline;">
                            <input type="hidden" name="package_id" value="<?= $package['id'] ?>">
                            <button type="submit" name="delete" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>

<?php include '../includes/footer.php'; ?>

</body>
</html>
