<?php
session_start();
header("no-cache, no-store, must-revalidate");
try
{
   $bdd = new PDO('mysql:host=localhost;dbname=BDMYSKILLS;
      charset=utf8', 'root','root',
   array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch (Exception $e)
{
   die('Erreur :'.$e->getMessage());
}

echo '<br>';

switch ($_POST["class"]) {
    case 1:
        $reqtot = $bdd->query("SELECT * FROM Administrateur");
        if(isset($_POST["login"],$_POST["password"]) && !empty($_POST["login"] && !empty($_POST["password"]))){
            while ($row = $reqtot->fetch()) {
                if(htmlspecialchars($_POST["login"]) == $row['Email'] 
                && htmlspecialchars($_POST["password"]) == $row['MotDePasse']){
                    $_SESSION['userID'] = $row['ID'];
                    $_SESSION['accountType'] = 'administrateur';
                    if($row["FirstCo"] == 1) {
                        $bdd->query("UPDATE Administrateur SET FirstCo = '0' WHERE ID = '{$row['ID']}'");
                        
                        header('Location: 1erConnexionChangePwd.html');                        
                    } else {
                        echo 'ok <br>';
                        header('Location: accueilAdmin.html');                        
                    }
                    break;
                }
            }
        } else {
            echo 'failed <br>';
        }
        break;
    case 2:
        $reqtot = $bdd->query("SELECT * FROM Professeur");
        if(isset($_POST["login"],$_POST["password"]) && !empty($_POST["login"] && !empty($_POST["password"]))){
            while ($row = $reqtot->fetch()) {
                if(htmlspecialchars($_POST["login"]) == $row['Email'] 
                && htmlspecialchars($_POST["password"]) == $row['MotDePasse']){
                    $_SESSION['userID'] = $row['ID'];
                    $_SESSION['accountType'] = 'professeur';
                    if($row["FirstCo"] == 1) {
                        $bdd->query("UPDATE Professeur SET FirstCo = '0' WHERE ID = '{$row['ID']}'");
                        header('Location: 1erConnexionChangePwd.html');
                    } else {
                        header('Location: accueilProf.html');
                    }
                    break;
                }
            }
        } else {
            echo 'failed <br>';
        }
        break;
    case 3:
        $reqtot = $bdd->query("SELECT * FROM Etudiant");
        if(isset($_POST["login"],$_POST["password"]) && !empty($_POST["login"] && !empty($_POST["password"]))){
            while ($row = $reqtot->fetch()) {
                if(htmlspecialchars($_POST["login"]) == $row['Email'] 
                && htmlspecialchars($_POST["password"]) == $row['MotDePasse']){
                    $_SESSION['userID'] = $row['ID'];
                    $_SESSION['accountType'] = 'etudiant';
                    if($row["FisrtCo"] == 1) {
                        $bdd->query("UPDATE Etudiant SET FirstCo = '0' WHERE ID = '{$row['ID']}'");
                        header('Location: 1erConnexionChangePwd.html');                        
                    } else {
                        header('Location: accueilEtudiant.html');                        
                    }                    
                    break;
                }
            }
        } else {
            echo 'failed <br>';
        }
        break;
}
?>