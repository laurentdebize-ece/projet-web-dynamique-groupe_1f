<?php
session_start();

try {
    $bdd = new PDO('mysql:host=localhost;dbname=omnesmyskills;charset=utf8', 'root', 'root');
} catch (PDOException $e) {
    die('Erreur : ' . $e->getMessage());
}

if (isset($_POST['Email']) && isset($_POST['Motdepasse'])) {
    $username = $_POST['Email'];
    $password = $_POST['Motdepasse'];

    $sql = "SELECT * FROM administrateur WHERE Email = :username AND Motdepasse = :password";
    $stmt = $bdd->prepare($sql);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $password);

    if ($stmt->execute()) {
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            $_SESSION['Email'] = $username;
            echo "Bienvenue " . $username;
            header("Location: menu.php");
            exit();
        } else {
            echo "Nom d'utilisateur ou mot de passe incorrect.";
        }
    } else {
        echo "Une erreur s'est produite lors de l'exécution de la requête.";
    }
}
?>



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
    <form action="" method="post">
        <label for="login">Identifiant</label>
        <input type="text" name="Email" id="login"> <br><br>
        <label for="password">Mot de passe</label>
        <input type="password" name="Motdepasse" id="password">
        <br><br>
        <input type="submit" value="Se connecter">
    </form>
</body>

</html>