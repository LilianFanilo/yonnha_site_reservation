<nav id="nav">
    <div class="navbar">
          <div class="hamburger">
              <span class="bar"></span>
              <span class="bar"></span>
              <span class="bar"></span>
          </div>
        <img src="https://lh3.googleusercontent.com/u/0/drive-viewer/AAOQEOQAxoI6V3iXWBZIDNRi7CjDEDkFzFizAmOEJf0Z6I2gUQ8Gu0lXnjKr5iVuwLJ8E5oqupnTru4fqBH7Le1ghrNOs51I-g=w1920-h931" alt="Logo link home">
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
    </div>
</nav>