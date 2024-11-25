<?php
include 'includes/db.php';
include 'includes/functions.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = sanitize($_POST['name']);
    $username = sanitize($_POST['username']);
    $address = sanitize($_POST['address']);
    $role = sanitize($_POST['role']);
    $password = password_hash(sanitize($_POST['password']), PASSWORD_BCRYPT);

    $query = "INSERT INTO users (name, username, address, role, password) 
              VALUES ('$name', '$username', '$address', '$role', '$password')";
    if ($conn->query($query)) {
        redirect('login.php');
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
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
            font-size: 1.6rem;
            padding: 20px;
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

        .fa-user, .fa-address-card, .fa-key {
            color: #28a745;
            margin-right: 10px;
        }

        .form-control:focus {
            border-color: #28a745;
            box-shadow: 0 0 5px rgba(40, 167, 69, 0.5);
        }

        .register-link {
            font-weight: bold;
            color: #28a745;
        }

        .register-link:hover {
            color: #218838;
        }

        .mt-5 {
            margin-top: 5rem !important;
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
                    <i class="fas fa-user-plus"></i> Create Your Account
                </div>
                <div class="card-body">
                    <?php if (isset($error)) echo "<div class='error'>$error</div>"; ?>
                    <form method="POST">
                        <div class="form-group mb-3">
                            <label for="name">
                                <i class="fas fa-user"></i> Full Name
                            </label>
                            <input type="text" name="name" class="form-control" id="name" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="username">
                                <i class="fas fa-user-circle"></i> Username
                            </label>
                            <input type="text" name="username" class="form-control" id="username" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="address">
                                <i class="fas fa-address-card"></i> Address
                            </label>
                            <textarea name="address" class="form-control" id="address" required></textarea>
                        </div>

                        <div class="form-group mb-3">
                            <label for="role">
                                <i class="fas fa-briefcase"></i> Role
                            </label>
                            <select name="role" class="form-control" id="role" required>
                                <option value="user">User</option>
                                <option value="manager">Manager</option>
                                <option value="admin">Admin</option>
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label for="password">
                                <i class="fas fa-key"></i> Password
                            </label>
                            <input type="password" name="password" class="form-control" id="password" required>
                        </div>

                        <button type="submit" class="btn btn-primary w-100">Register</button>
                    </form>

                    <p class="mt-3 text-center">
                        Already have an account? <a href="login.php" class="register-link">Login here</a>.
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
