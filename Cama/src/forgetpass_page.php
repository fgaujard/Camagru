<?php session_start(); ?>
<html>
    <head>
		<meta charset="UTF-8">
		<link href="style.css" rel="stylesheet" type="text/css">
	</head>
	<body>
        <?php include('./generate_header.php'); ?>
		<div class="page">
            Récupération de mot de passe par e-mail :
            <br />
            Identifiant: <input type="text" name="login"/>
		    <br />
		    e-mail : <input type="text" name="mail"/>
		    <input name="submit" type="submit" value="Envoyer">
        </div>
	</body>
</html>