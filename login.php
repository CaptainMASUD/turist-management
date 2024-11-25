<?php
include 'includes/db.php';
include 'includes/functions.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = sanitize($_POST['username']);
    $password = sanitize($_POST['password']);

    $query = "SELECT * FROM users WHERE username = '$username'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['role'] = $user['role'];
            if ($user['role'] === 'admin') {
                redirect('admin/manage_users.php');
            } elseif ($user['role'] === 'manager') {
                redirect('admin/manage_packages.php');
            } else {
                redirect('packages.php');
            }
        } else {
            $error = "Invalid password.";
        }
    } else {
        $error = "User not found.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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

        .fa-user, .fa-lock {
            color: #28a745;
            margin-right: 10px;
        }

        .mt-5 {
            margin-top: 5rem !important;
        }

        .register-link {
            font-weight: bold;
            color: #28a745;
        }

        .register-link:hover {
            color: #218838;
        }
    </style>
</head>
<body>

<?php include 'includes/navbar.php'; ?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Login to Your Account
                </div>
                <div class="card-body">
                    <?php if (isset($error)) echo "<div class='error'>$error</div>"; ?>
                    <form method="POST">
                        <div class="form-group mb-3">
                            <label for="username">
                                <i class="fas fa-user"></i> Username
                            </label>
                            <input type="text" name="username" class="form-control" id="username" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="password">
                                <i class="fas fa-lock"></i> Password
                            </label>
                            <input type="password" name="password" class="form-control" id="password" required>
                        </div>

                        <button type="submit" class="btn btn-primary w-100">Login</button>
                    </form>

                    <p class="mt-3 text-center">
                        Don't have an account? <a href="register.php" class="register-link">Register here</a>.
                    </p>
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
