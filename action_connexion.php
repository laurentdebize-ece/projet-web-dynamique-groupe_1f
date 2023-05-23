<?php
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
        $reqemail = $bdd->query("SELECT Email FROM Administrateur");
        $reqpass = $bdd->query("SELECT MotDePasse FROM Administrateur");
        if(isset($_POST["login"],$_POST["password"]) && !empty($_POST["login"] && !empty($_POST["password"]))){
            while ($row = $reqtot->fetch()) {
                if(htmlspecialchars($_POST["login"]) == $row['Email'] 
                && htmlspecialchars($_POST["password"]) == $row['MotDePasse']){
                    if($row["FirstCo"] == 1) {
                        $bdd->query("UPDATE Administrateur SET FirstCo = '0' WHERE ID = '{$row['ID']}'");
                        header('Location: 1erConnexionChangePwd.html');
                    } else {
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
        $reqemail = $bdd->query("SELECT Email FROM Professeur");
        $reqpass = $bdd->query("SELECT MotDePasse FROM Professeur");
        if(isset($_POST["login"],$_POST["password"]) && !empty($_POST["login"] && !empty($_POST["password"]))){
            while ($row = $reqtot->fetch()) {
                if(htmlspecialchars($_POST["login"]) == $row['Email'] 
                && htmlspecialchars($_POST["password"]) == $row['MotDePasse']){
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
        $reqemail = $bdd->query("SELECT Email FROM Etudiant");
        $reqpass = $bdd->query("SELECT MotDePasse FROM Etudiant");
        if(isset($_POST["login"],$_POST["password"]) && !empty($_POST["login"] && !empty($_POST["password"]))){
            while ($row = $reqtot->fetch()) {
                if(htmlspecialchars($_POST["login"]) == $row['Email'] 
                && htmlspecialchars($_POST["password"]) == $row['MotDePasse']){
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