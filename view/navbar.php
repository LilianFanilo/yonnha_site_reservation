<nav class="navbar container">
    <img src="./images/logo.png" alt="Logo link home">
        <ul class="nav-list">
            <li class="nav-item"><a href="../index.php" class="nav-link">Accueil</a></li>
            <li class="nav-item"><a href="../index.php?tag=gallery" class="nav-link">Galerie</a></li>
            <li class="nav-item"><a href="../index.php?tag=reservation" class="nav-link">Réservation</a></li>
            <li class="nav-item"><a href="../index.php?tag=contact" class="nav-link">Contact</a></li>
            <div class="active"></div>
            <?php if (!isset($_SESSION['login'])):?>
                <li class="nav-item"><a href="../index.php?tag=login" class="nav-link">Login</a></li>
                <li class="nav-item"><a href="../index.php?tag=signup" class="nav-link">Sign up</a></li>
            <?php endif;?>
            <?php if (isset($_SESSION['login'])):?>
                <?php if ($_SESSION['is_admin'] == true):?>
                    <li class="nav-item"><a href="../index.php?tag=gestion_panel" class="nav-link">Panneau de gestion</a></li>
                <?php endif; ?>
                <li class="nav-item"><a href="./controller/controller-user.php?session_login=logout" class="nav-link">déconnexion</a></li>
            <?php endif; ?>
        </ul>
</nav>