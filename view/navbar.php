<nav>
        <ul>
            <li><a href="index.php">Accueil</a></li>
            <li><a href="index.php?tag=gallery">Galerie</a></li>
            <li><a href="index.php?tag=reservation">Réservation</a></li>
            <li><a href="index.php?tag=contact">Contact</a></li>
            <?php if (!isset($_SESSION['login'])):?>
                <li><a href="index.php?tag=login">Login</a></li>
                <li><a href="index.php?tag=signup">Sign up</a></li>
            <?php endif;?>
            <?php if (isset($_SESSION['login'])):?>
                <?php if ($_SESSION['is_admin'] == true):?>
                    <li><a href="index.php?tag=gestion_panel">Panneau de gestion</a></li>
                <?php endif; ?>
                <li><a href="./controller/controller-user.php?session_login=logout">déconnexion</a></li>
            <?php endif; ?>
        </ul>
</nav>