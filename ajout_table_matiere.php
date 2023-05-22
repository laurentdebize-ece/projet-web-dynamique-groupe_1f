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
echo 'successed 1 <br>';
?>
<form method="post">
    <label for="id">ID : </label>
    <input type="text" name="id"> <br>
    <label for="matiere">Nom de la matière reliée à la compétence : </label>
    <input type="text" name="matiere"> <br>
    <label for="competence">Nom de la compétence : </label>
    <input type="text" name="competence"> <br>
    <input type="submit" value="Ajouter cette compétence"> <br>
</form>
<?php
$reqtot = $bdd->query('SELECT * FROM Competence');
if(isset($_POST["id"],$_POST["matiere"],$_POST["competence"]) && !empty($_POST["id"]) && !empty($_POST["matiere"]) && !empty($_POST["competence"])) {
    echo 'successed 2 <br>';
    $row = $reqtot->fetch();
    if(!$row) {
        echo 'successed 3 <br>';
        $response = $bdd->prepare("INSERT INTO Competence VALUES ('{$_POST["id"]}','{$_POST["matiere"]}','{$_POST["competence"]}','1','0','0')");
        echo 'successed <br>';
        
    }
    else {
        echo 'failed <br>';
    }
}
?>