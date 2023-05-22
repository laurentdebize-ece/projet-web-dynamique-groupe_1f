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
switch ($_GET["class"]) {
    case 1:
        echo 'successed 1.1 <br>';
        $reqtot = $bdd->query('SELECT * FROM Administrateur');
        ?>
        <form method="post" >
            <label for="id">ID : </label>
            <input type="text" name="id">
            <input type="submit" value="Supprimer">
        </form>
        <?php
        if(isset($_POST["id"]) && !empty($_POST["id"])){
            echo 'successed 2 <br>';
            while($row = $reqtot->fetch()) {
                echo 'successed 3 <br>';
                if(htmlspecialchars($_POST["id"] == $row['ID'])) {
                $bdd->query("DELETE FROM Administrateur WHERE ID = '{$row['ID']}'");
                echo 'successed <br>';
                break;
            }
            else {
                echo 'failed <br>';
            }
            }
        }
        break;
    case 2:
        echo 'successed 1.2 <br>';
        $reqtot = $bdd->query('SELECT * FROM Professeur');
        ?>
        <form method="post">
            <label for="id">ID : </label>
            <input type="text" name="id">
            <input type="submit" value="Supprimer">
        </form>
        <?php
        if(isset($_POST["id"]) && !empty($_POST["id"])){
            echo 'successed 2 <br>';
            while($row = $reqtot->fetch()) {
                echo 'successed 3 <br>';
                if(htmlspecialchars($_POST["id"] == $row['ID'])) {
                $bdd->query("DELETE FROM Professeur WHERE ID = '{$row['ID']}'");
                echo 'successed <br>';
                break;
            }
            else {
                echo 'failed <br>';
            }
            }
        }
        break;
    case 3:
        echo 'successed 1.3 <br>';
        $reqtot = $bdd->query('SELECT * FROM Etudiant');
        ?>
        <form method="post" >
            <label for="id">ID : </label>
            <input type="text" name="id">
            <input type="submit" value="Supprimer">
        </form>
        <?php
        if(isset($_POST["id"]) && !empty($_POST["id"])){
            echo 'successed 2 <br>';
            while($row = $reqtot->fetch()) {
                echo 'successed 3 <br>';
                if(htmlspecialchars($_POST["id"] == $row['ID'])) {
                $bdd->query("DELETE FROM Etudiant WHERE ID = '{$row['ID']}'");
                echo 'successed <br>';
                break;
            }
            else {
                echo 'failed <br>';
            }
            }
        }
        break;
}