<!-- <!DOCTYPE html>
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
        <label for="id">Identifiant</label>
        <input type="text" name="login" id="login"> <br> <br>
        <label for="id">Mot de passe</label>
        <input type="password" name="password" id="password">
    </form>
</body>
</html>

-->

<?php 

$database = "Connexion";
$db_handle = mysqli_connect('localhost','root',''); 
$db_found = mysqli_select_db($db_handle, $database);

$username = mysqli_real_escape_string($conn, $_POST['username']);
$password = mysqli_real_escape_string($conn, $_POST['password']);
$sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
$result = mysqli_query($conn, $sql);


if (mysqli_num_rows($result) == 1) {
  session_start();
  $_SESSION['username'] = $username;
  header("Location: index.php");
} else {
  echo "Nom d'utilisateur ou mot de passe incorrect.";
}

mysqli_close($conn);
?>

<?php
// Démarrer la session
session_start();

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['username'])) {
  header("Location: login.php");
}

// Afficher le nom d'utilisateur de l'utilisateur connecté
echo "Bonjour, " . $_SESSION['username'] . "!";

?>










?>
