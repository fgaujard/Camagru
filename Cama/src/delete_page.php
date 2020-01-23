<?php session_start(); ?>
<html>
	<head>
		<meta charset="UTF-8">
		<link href="style.css" rel="stylesheet" type="text/css">
	</head>
	<body>
		<div class="page">
			<?php include('./generate_header.php'); ?>
			<form action="delete_utils.php" name="account_del" method="POST">
				<p>Pour confirmer la suppression de votre compte, veuillez entre votre mot de passe.</p>
				Mot de passe: <input type="text" name="passwd"/>
				<?php //if ($_SESSION['error_mdp'] === TRUE): ?>
					<p style="color:red;">Le mot de passe renseigne est mauvais</p>
				<?php //endif; $_SESSION['error_mdp'] = FALSE; ?>
				<input name="submit" type="submit" value="CONFIRMER">
			</form>
		</div>
	</body>
</html>