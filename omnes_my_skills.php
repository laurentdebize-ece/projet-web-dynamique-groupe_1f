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
        <input type="text" name="Identifiant" id="login"> <br> <br>
        <label for="password">Mot de passe</label>
        <input type="password" name="Motdepasse" id="password">
        <br><br>
        <input type="submit" value="Se connecter">
    </form>

    <?php 
    session_start();

    if (isset($_POST['Identifiant']) && isset($_POST['Motdepasse'])) {
        $database = "omnesmyskills.sql";
        $db_handle = mysqli_connect('localhost','root','Ficelle2003!'); 
        $db_found = mysqli_select_db($db_handle, $database);
        
        if (!$db_found) {
          die("Database not found.");
      }

        $username = mysqli_real_escape_string($db_handle, $_POST['Identifiant']);
        $password = mysqli_real_escape_string($db_handle, $_POST['Motdepasse']);
        $sql = "SELECT * FROM connexion WHERE Identifiant = '".$username."' AND Motdepasse = '".$password."'";
        $result = mysqli_query($db_handle, $sql);

        if ($result) {
            $_SESSION['Identifiant'] = $username;
            echo "Bienvenue ".$username;
            header("Location: menu.php");
            exit();
        } else {
            echo "Nom d'utilisateur ou mot de passe incorrect.";
        }

        mysqli_close($db_handle);
    }

    ?>

</body>
</html>
