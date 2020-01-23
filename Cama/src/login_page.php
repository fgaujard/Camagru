<?php session_start(); ?>
<html>
	<head>
        
		<meta charset="UTF-8">
		<link href="style.css" rel="stylesheet" type="text/css">
	</head>
	<body>
		<div class="page">
			<?php include('./generate_header.php'); ?>
			<form action="login_utils.php" name="login.php" method="POST">
				Identifiant: <input type="text" name="login"/>
				<br />
				Mot de passe: <input type="password" name="passwd"/>
				<input name="submit" type="submit" value="OK">

				<?php if ($_SESSION['error_login'] === TRUE): ?>
					<p style="color:red;">mdp ou id incorrect</p>
				<?php endif; $_SESSION['error_login'] = FALSE; ?>

				<br />
				<a href="./forgetpass_page.php">Mot de passe oublié ?</a>
			</form>
		</div>
	</body>
</html>