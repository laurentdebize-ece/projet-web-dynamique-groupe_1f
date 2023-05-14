<!DOCTYPE html>
<html>
<head>
	<title>Formulaire d'inscription</title>
</head>
<body>
	<form method="post" action="premiere_connexion.php">
		<label for="nom">Nom :</label>
		<input type="text" id="nom" name="lastname"><br>

		<label for="prenom">Prénom :</label>
		<input type="text" id="prenom" name="firstname"><br>

		<label for="email">Email :</label>
		<input type="email" id="email" name="email"><br>

		<label for="classe">Classe :</label>
		<select id="classe" name="class">
			<option value="etudiant">Etudiant</option>
			<option value="scolarite">Professeur</option>
			<option value="administrateur">Administrateur</option>
		</select><br>

		<label for="code">Code :</label>
		<input type="text" id="code" name="code"><br>

		<label for="mdp">Mot de passe :</label>
		<input type="password" id="mdp" name="passwordReg"><br>

		<label for="mdp_confirm">Confirmation du mot de passe :</label>
		<input type="password" id="mdp_confirm" name="passwordConfirm"><br>

		<input type="submit" value="Inscription">
	</form>
</body>
</html>