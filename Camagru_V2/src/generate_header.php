<?php
if ($_SESSION['is_logged']):
?>
    <div class="header">
        <span>Bienvenue sur Camagru <?php echo $_SESSION['is_logged']?></span>
        <a href="./index.php">Camagru</a>
        <a href="./account_page.php">Mon compte</a>
        <a href="./upload_page.php">Upload</a>
        <a href="./logout.php">Deconnexion</a>
        </a>
    </div>
<?php else: ?>
    <div class="header">
        <a href="./index.php">Camagru</a>
        <a href="./create_account_page.php">Creer un compte</a>
        <a href="./login_page.php">Se connecter</a>
    </div>
<?php endif; ?>