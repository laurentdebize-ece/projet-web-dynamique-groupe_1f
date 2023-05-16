<?php
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

$reqtot = $bdd->query("SELECT * FROM Etudiant");
$reqemail = $bdd->query("SELECT Email FROM Etudiant");
$reqpass = $bdd->query("SELECT MotDePasse FROM Etudiant");

echo '<br>';

if(isset($_POST["login"],$_POST["password"]) && !empty($_POST["login"] && !empty($_POST["password"]))){
    while ($row = $reqtot->fetch()) {
        echo "<tr><td>" . $row['Email'] . "</td>    <td>" . $row['MotDePasse'] . "</td></tr> <br>";
        if(htmlspecialchars($_POST["login"]) == $row['Email'] 
        && htmlspecialchars($_POST["password"]) == $row['MotDePasse']){
            echo 'successed';
        }
        else {
            echo 'failed';
            echo '<br>';
        }
    }
}
?>