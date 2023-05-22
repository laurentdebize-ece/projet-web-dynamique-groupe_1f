<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OMNES MySkills</title>
</head>
<body>
    <h1>OMNES MySkills</h1>
    <form action="action_suppression.php" method="get">
        <select name="selection">
            <option value="0">--Veuillez sélectionner une option--</option>
            <option value="1" name="1">Administrateur</option>
            <option value="2" name="2">Professeur</option>
            <option value="3" name="3">Étudiant</option>
        </select> <br>
        <input type="submit" value="Soumettre">
    </form>
</body>
</html>