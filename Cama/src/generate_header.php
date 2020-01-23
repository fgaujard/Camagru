<?php
//$_SESSION['is_logged'] = false;
if ($_SESSION['is_logged']):
?>
    <div id="header">
        <span>Bienvenue sur Camagru <?php echo $_SESSION['is_logged']?></span>
        <a href="./index.php">Camagru</a>
        <a href="./account_page.php">Mon compte</a>
        <a href="./upload_page.php">Upload</a>
        <a href="./logout.php">Deconnexion</a>
        </a>
    </div>
<?php else: ?>
    <div id="header">
        <a href="./index.php">Camagru</a>
        <a href="./create_page.php">Creer un compte</a>
        <a href="./login_page.php">Se connecter</a>
    </div>
<?php endif; ?>