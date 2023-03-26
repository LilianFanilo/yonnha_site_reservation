<nav id="nav">
    <div class="navbar">
        <img src="./images/logo.png" alt="Logo link home">
        <div class="container">
            <ul class="nav-list">
                <li class="nav-item"><a href="./index.php" class="nav-link">Accueil</a></li>
                <li class="nav-item"><a href="./index.php?tag=gallery" class="nav-link">Galerie</a></li>
                <li class="nav-item"><a href="./index.php?tag=reservation" class="nav-link">Réservation</a></li>
                <li class="nav-item"><a href="./index.php?tag=contact" class="nav-link">Contact</a></li>
                <div class="active"></div>
                <?php if (!isset($_SESSION['login'])) : ?>
                    <li class="nav-item"><a href="./index.php?tag=account&action=login" class="nav-link">Login</a></li>
                    <li class="nav-item"><a href="./index.php?tag=account&action=signup" class="nav-link">Signup</a></li>
                <?php endif; ?>
                <?php if (isset($_SESSION['login'])) : ?>
                    <?php if ($_SESSION['is_admin'] == true) : ?>
                        <li class="nav-item"><a href="./index.php?tag=gestion_panel" class="nav-link">Panneau de gestion</a></li>
                    <?php endif; ?>
                    <li class="nav-item"><a href="./index.php?tag=account&action=logout" class="nav-link">Déconnexion</a></li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>