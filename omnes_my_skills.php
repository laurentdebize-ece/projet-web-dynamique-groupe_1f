<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OMNES MySkills</title>
    <link rel="stylesheet" href="menu_leopold.css">
</head>
<body>
    <h1>OMNES MySkills</h1>
    <form action="action_connexion_esteban.php" method="post">
        <select name="selection">
            <option value="0">--Veuillez sélectionner une option--</option>
            <option value="1" name="1">Administrateur</option>
            <option value="2" name="2">Professeur</option>
            <option value="3" name="3">Étudiant</option>
        </select> <br>
        <label for="id">Identifiant</label>
        <input type="text" name="login" id="login"> <br> <br>
        <label for="id">Mot de passe</label>
        <input type="password" name="password" id="password"> <br> <br>
        <input type="submit" value="Connexion">
    </form>
</body>
</html>
