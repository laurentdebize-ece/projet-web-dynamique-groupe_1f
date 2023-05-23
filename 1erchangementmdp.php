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

switch($_POST["class"]) {
    case 1:
        $reqtot = $bdd->query("SELECT * FROM Administrateur");
        $row = $reqtot->fetch();
        if (
            isset($_POST["email"], $_POST["oldPassword"], $_POST["newPassword"])
            && !empty($_POST["email"]) && !empty($_POST["oldPassword"]) && !empty($_POST["newPassword"])
        ) {
            if(htmlspecialchars($_POST["email"]) == $row['Email'] 
            && htmlspecialchars($_POST["oldPassword"]) == $row['MotDePasse']) {
                $bdd->query("UPDATE Administrateur SET MotDePasse = '{$_POST['newPassword']}' WHERE ID = '{$row['ID']}'");
                header('Location: accueilAdmin.html');
            } else {
                echo 'failed 2 <br>';
            }
        }
        break;
    case 2:
        $reqtot = $bdd->query("SELECT * FROM Professeur");
        $row = $reqtot->fetch();
        if (
            isset($_POST["email"], $_POST["oldPassword"], $_POST["newPassword"])
            && !empty($_POST["email"]) && !empty($_POST["oldPassword"]) && !empty($_POST["newPassword"])
        ) {
            if(htmlspecialchars($_POST["email"]) == $row['Email'] 
            && htmlspecialchars($_POST["oldPassword"]) == $row['MotDePasse']) {
                $bdd->query("UPDATE Professeur SET MotDePasse = '{$_POST['newPassword']}' WHERE ID = '{$row['ID']}'");
                header('Location: accueilProf.html');
            } else {
                echo 'failed 2 <br>';
            }
        }
        break;
    case 3:
        $reqtot = $bdd->query("SELECT * FROM Etudiant");
        $row = $reqtot->fetch();
        if (
            isset($_POST["email"], $_POST["oldPassword"], $_POST["newPassword"])
            && !empty($_POST["email"]) && !empty($_POST["oldPassword"]) && !empty($_POST["newPassword"])
        ) {
            if(htmlspecialchars($_POST["email"]) == $row['Email'] 
            && htmlspecialchars($_POST["oldPassword"]) == $row['MotDePasse']) {
                $bdd->query("UPDATE Etudiant SET MotDePasse = '{$_POST['newPassword']}' WHERE ID = '{$row['ID']}'");
                header('Location: accueilEtudiant.html');
            } else {
                echo 'failed 2 <br>';
            }
        }
        break;
}
?>