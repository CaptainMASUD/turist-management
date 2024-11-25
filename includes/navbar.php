<nav class="navbar navbar-expand-lg navbar-dark shadow-lg" style="background: linear-gradient(135deg, #28a745, #2b8a3e);">
    <a class="navbar-brand d-flex align-items-center" href="index.php" style="font-family: 'Parkinsans', sans-serif; font-weight: bold; font-size: 1.5rem; color: white;">
        <i class="fas fa-map-marker-alt" style="margin-right: 10px;"></i>
        <span>Tourist Management</span>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
            <li class="nav-item">
                <a class="nav-link" href="index.php" style="color: white; transition: all 0.3s ease;" onmouseover="this.style.backgroundColor='#007B5F'; this.style.borderRadius='10px';" onmouseout="this.style.backgroundColor=''; this.style.borderRadius='';">
                    <i class="fas fa-home"></i> <span class="d-none d-lg-inline">Home</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="packages.php" style="color: white; transition: all 0.3s ease;" onmouseover="this.style.backgroundColor='#007B5F'; this.style.borderRadius='10px';" onmouseout="this.style.backgroundColor=''; this.style.borderRadius='';">
                    <i class="fas fa-suitcase"></i> <span class="d-none d-lg-inline">Packages</span>
                </a>
            </li>

            <?php if (isset($_SESSION['user_id'])): ?>
                <!-- Logged-in User Links -->
                <li class="nav-item">
                    <a class="nav-link" href="logout.php" style="color: white; transition: all 0.3s ease;" onmouseover="this.style.backgroundColor='#007B5F'; this.style.borderRadius='10px';" onmouseout="this.style.backgroundColor=''; this.style.borderRadius='';">
                        <i class="fas fa-sign-out-alt"></i> <span class="d-none d-lg-inline">Logout</span>
                    </a>
                </li>
            <?php else: ?>
                <!-- Not Logged-in User Links -->
                <li class="nav-item">
                    <a class="nav-link" href="login.php" style="color: white; transition: all 0.3s ease;" onmouseover="this.style.backgroundColor='#007B5F'; this.style.borderRadius='10px';" onmouseout="this.style.backgroundColor=''; this.style.borderRadius='';">
                        <i class="fas fa-sign-in-alt"></i> <span class="d-none d-lg-inline">Login</span>
                    </a>
                </li>
            <?php endif; ?>
        </ul>
    </div>
</nav>
