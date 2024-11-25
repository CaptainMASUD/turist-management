<?php
include 'includes/db.php';
include 'includes/functions.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    redirect('login.php');
}

$user_id = $_SESSION['user_id'];
$package_id = $_GET['id'];

// Check if the user has already purchased this package
$check_purchase = "SELECT * FROM payments WHERE user_id = '$user_id' AND package_id = '$package_id'";
$result = $conn->query($check_purchase);

if ($result->num_rows > 0) {
    // User has already purchased this package
    $error = "You have already purchased this package.";
    $disable_button = 'disabled'; // Disable the button if the user has already purchased the package
    $button_text = 'You have already purchased this package';
} else {
    $disable_button = ''; // Allow purchase if not yet purchased
    $button_text = 'Complete Purchase';
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && !isset($error)) {
    $payment_method = sanitize($_POST['payment_method']);
    $payment_details = sanitize($_POST['payment_details']);

    // Insert payment record into the payments table
    $query = "INSERT INTO payments (user_id, package_id, payment_method, payment_details) 
              VALUES ('$user_id', '$package_id', '$payment_method', '$payment_details')";
    
    if ($conn->query($query)) {
        // Redirect to the packages page after successful payment
        redirect('packages.php');
    } else {
        $error = "Error processing payment.";
    }
}

// Fetch the package details
$query = "SELECT * FROM packages WHERE id = '$package_id'";
$package = $conn->query($query)->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Purchase</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Parkinsans:wght@300..800&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: "Parkinsans", sans-serif;
            background-color: #f4f9f4;
        }

        .card {
            border: 1px solid #28a745;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .card:hover {
            transform: translateY(-10px);
        }

        .card-header {
            background-color: #28a745;
            color: white;
            text-align: center;
            font-weight: bold;
            font-size: 1.5rem;
            padding: 15px;
        }

        .card-body {
            padding: 30px;
        }

        .form-group label {
            font-weight: bold;
        }

        .btn-primary {
            background-color: #28a745;
            border-color: #28a745;
            font-weight: bold;
        }

        .btn-primary:hover {
            background-color: #218838;
            border-color: #218838;
        }

        .error {
            color: #721c24;
            background-color: #f8d7da;
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
        }

        .fa-credit-card, .fa-mobile-alt {
            color: #28a745;
            margin-right: 10px;
        }

        .btn-disabled {
            background-color: #ddd;
            border-color: #ccc;
            color: #6c757d;
        }

        .package-name {
            font-size: 1.3rem;
            font-weight: bold;
            color: #28a745;
        }

        .package-price {
            font-size: 1.4rem;
            font-weight: bold;
            color: #28a745;
        }
    </style>
</head>
<body>

<?php include 'includes/navbar.php'; ?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Purchase Package
                </div>
                <div class="card-body">
                    <?php if (isset($error)) echo "<div class='error'>$error</div>"; ?>
                    <form method="POST">
                        <div class="form-group mb-3">
                            <label for="package-name">Package Name</label>
                            <input type="text" class="form-control" id="package-name" value="<?= $package['hotel_name'] ?>" disabled>
                        </div>

                        <div class="form-group mb-3">
                            <label for="payment-method">Payment Method</label>
                            <select name="payment_method" id="payment-method" class="form-control" required>
                                <option value="Mobile Banking"> <i class="fas fa-mobile-alt"></i> Mobile Banking</option>
                                <option value="Bank"> <i class="fas fa-credit-card"></i> Bank</option>
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label for="payment-details">Payment Details</label>
                            <textarea name="payment_details" id="payment-details" class="form-control" rows="3" required></textarea>
                        </div>

                        <div class="d-flex justify-content-between align-items-center">
                            <div class="package-price">
                                ৳<?= $package['price'] ?>
                            </div>
                            <button type="submit" class="btn btn-primary <?= $disable_button ?>" <?= $disable_button ?>>
                                <?= $button_text ?>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

</body>
</html>
