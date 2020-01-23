<?php session_start(); ?>
<html>
	<head>
		<meta charset="UTF-8">
		<link href="style.css" rel="stylesheet" type="text/css">
	</head>
	<body>
		<div class="page">
			<?php include('./generate_header.php'); ?>
			<form action="create_utils.php" method="POST">
				Identifiant: <input type="text" name="login"/>
				<br />
				e-mail : <input type="text" name="mail"/>
				<br />
				Mot de passe: <input type="password" name="passwd"/>
				<input name="submit" type="submit" value="Creer">
				<!--
				<?php # if ($_SESSION['error_id_taken'] === TRUE): ?>
					<p style="color:red;">Cet identifiant est deja pris</p>
				<?php # elseif ($_SESSION['error_format'] === TRUE): ?>
					<p style="color:red;">le format de l'identifiant ou du mdp est incorrect</p>
				<?php # endif; $_SESSION['error_id_taken'] = FALSE; $_SESSION['error_format'] = FALSE;?>
-->
			</form>
		</div>
	</body>
</html>