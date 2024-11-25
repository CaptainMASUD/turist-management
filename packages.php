<?php
include 'includes/db.php';
include 'includes/functions.php';

$query = "SELECT * FROM packages WHERE status = 'Available'";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Packages</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: "Parkinsans", sans-serif;
        }

        .card {
            border: 1px solid #28a745;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .card:hover {
            transform: translateY(-10px);
        }

        .card-title {
            font-size: 1.5rem;
            font-weight: bold;
            color: #212529;
        }

        .card-text {
            font-size: 1rem;
            color: #555;
        }

        .card-body {
            padding: 20px;
        }

        .btn-primary {
            background-color: #28a745;
            border-color: #28a745;
        }

        .btn-primary:hover {
            background-color: #218838;
            border-color: #218838;
        }

        .btn-disabled {
            background-color: #ddd;
            border-color: #ccc;
            color: #6c757d;
        }

        .package-icons {
            font-size: 1.2rem;
            color: #28a745;
            margin-right: 10px;
        }

        .package-details {
            display: flex;
            flex-wrap: wrap;
        }

        .package-details div {
            flex: 1 1 50%;
            margin-bottom: 10px;
        }

        .package-price {
            font-size: 1.3rem;
            font-weight: bold;
            color: #28a745;
        }

        .discount {
            background-color: #f8d7da;
            color: #721c24;
            padding: 5px 10px;
            border-radius: 5px;
        }
        .hotel{
            text-align: center;
        }
    </style>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Parkinsans:wght@300..800&display=swap" rel="stylesheet">
    <style>
.card {
    transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
    border-radius: 15px;
    overflow: hidden;
}

.card:hover {
    transform: translateY(-10px);
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
}

.card-header {
    border-bottom: none;
    position: relative;
}

.card-header i {
    background: rgba(255, 255, 255, 0.3);
    padding: 15px;
    border-radius: 50%;
    font-size: 1.5rem;
}

.card-title {
    font-size: 1.25rem;
    font-weight: bold;
}

.badge {
    font-size: 1rem;
    padding: 0.5rem 1rem;
}

.btn-success {
    transition: all 0.3s ease;
    font-size: 1.2rem;
    font-weight: bold;
}

.btn-success:hover {
    background-color: #1e7e34;
    color: #fff;
}
</style>

</head>
<body>
<?php include 'includes/navbar.php'; ?>
<div class="container mt-5">
    <h2 class="text-center mb-4" style="font-weight: bold; font-size: 2rem; color: #333;">Explore Our Best Packages</h2>
    <div class="row d-flex align-items-stretch">
        <?php while ($package = $result->fetch_assoc()): ?>
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-lg rounded border-0 overflow-hidden">
                    <!-- Card Header -->
                    <div class="card-header p-0" style="height: 150px; background: linear-gradient(45deg, #28a745, #218838);">
                        <div class="text-center text-white p-4 h-100 d-flex flex-column justify-content-center align-items-center">
                            <i class="fas fa-hotel fa-2x mb-2"></i>
                            <h5 style="font-weight: bold; font-size: 1.5rem;"><?= $package['hotel_name'] ?></h5>
                        </div>
                    </div>

                    <!-- Card Body -->
                    <div class="card-body p-4">
                        <!-- Package Details -->
                        <ul class="list-unstyled mb-4">
                            <li class="mb-2 d-flex align-items-center">
                                <i class="fas fa-calendar-alt me-2 text-success"></i> 
                                <strong>Departure:</strong> <?= $package['go_date'] !== '0000-00-00' ? $package['go_date'] : 'None' ?>
                            </li>
                            <li class="mb-2 d-flex align-items-center">
                                <i class="fas fa-calendar-check me-2 text-success"></i> 
                                <strong>Return:</strong> <?= $package['back_date'] !== '0000-00-00' ? $package['back_date'] : 'None' ?>
                            </li>
                            <li class="mb-2 d-flex align-items-center">
                                <i class="fas fa-bed me-2 text-success"></i> 
                                <strong>Bed Type:</strong> <?= $package['bed_type'] ?>
                            </li>
                            <li class="mb-2 d-flex align-items-center">
                                <i class="fas fa-swimmer me-2 text-success"></i> 
                                <strong>Pool:</strong> <?= $package['pool_status'] ?>
                            </li>
                            <li class="mb-2 d-flex align-items-center">
                                <i class="fas fa-user-tie me-2 text-success"></i> 
                                <strong>Guide:</strong> <?= $package['guide_status'] ?>
                            </li>
                        </ul>

                        <!-- Price and Discount -->
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="badge bg-success text-white p-2" style="font-size: 1.2rem;">৳<?= $package['price'] ?></span>
                            <?php if ($package['discount_percentage'] > 0): ?>
                                <span class="badge bg-danger text-white p-2" style="font-size: 1rem;"><?= $package['discount_percentage'] ?>% Off</span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <!-- Card Footer -->
                    <div class="card-footer text-center bg-white border-0">
                        <a href="purchase.php?id=<?= $package['id'] ?>" 
                           class="btn btn-success w-100 py-2 <?= $package['status'] == 'Sold Out' ? 'disabled' : '' ?>" 
                           <?= $package['status'] == 'Sold Out' ? 'disabled' : '' ?>>
                           <?= $package['status'] == 'Sold Out' ? 'Sold Out' : 'Purchase Now' ?>
                        </a>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
</div>


<?php include 'includes/footer.php'; ?>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

</body>
</html>
