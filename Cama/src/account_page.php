<?php session_start(); ?>
<html>
	<head>
		<meta charset="UTF-8">
		<link href="style.css" rel="stylesheet" type="text/css">
	</head>
	<body>
		<div class="page">
			<?php include('./generate_header.php'); ?>
			<a href="./modif_passwd.php">Modifier mon mdp</a>
			<a href="./delete_page.php">Supprimer mon compte</a>
			<!-- email notif for comment true:false-->
		</div>
	</body>
</html>