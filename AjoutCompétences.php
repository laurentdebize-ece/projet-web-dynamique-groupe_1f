<?php
session_start();

try {
    $bdd = new PDO('mysql:host=localhost;dbname=bdmyskills;charset=utf8', 'root', 'root');
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('Erreur : ' . $e->getMessage());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['supp_competence'])) {
        $idCompetence = $_POST['id_competence'];

        $sql = "DELETE FROM competence WHERE NomCompetence = ?";
        $stmt = $bdd->prepare($sql);

        if ($stmt->execute([$idCompetence])) {
            echo "Compétence supprimée avec succès !";
        } else {
            echo "Erreur lors de la suppression de la compétence: " . $stmt->errorInfo()[2];
        }
    } elseif (isset($_POST['ajout_competence'])) {
        $matiere = $_POST['Matiere'];
        $competence = htmlspecialchars($_POST['NomCompetence']);

        // Vérification si la compétence existe déjà
        $sql = "SELECT COUNT(*) FROM competence WHERE Matiere = ? AND NomCompetence = ?";
        $stmt = $bdd->prepare($sql);
        $stmt->execute([$matiere, $competence]);
        $count = $stmt->fetchColumn();

        if ($count > 0) {
            echo "Cette compétence existe déjà.";
        } else {
            $sql = "INSERT INTO competence (Matiere, NomCompetence, Acquisition) VALUES (?, ?, '3')";
            $stmt = $bdd->prepare($sql);

            if ($stmt->execute([$matiere, $competence])) {
                echo "Compétence ajoutée avec succès !";
            } else {
                echo "Erreur lors de l'insertion de la compétence: " . $stmt->errorInfo()[2];
            }
        }
    }
}
?>





<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une compétence</title>
    <link rel="stylesheet" href="menu.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <button class="menu-btn">☰
        <span class="text">Menu</span>
    </button>
    <nav class="sidebar">
        <a href="accueilAdmin.html"><i class="fa fa-home"></i> Accueil</a>
        <a href="competences.html">Compétences</a>
        <a href="matieres.html">Matières</a>
        <a href="competences_transverses.html">Compétences transverses</a>
        <a href="toutes_compétences.html">Toutes les compétences</a>
        <a href="profil.html">Profil</a>
    </nav>

    <h1>Ajouter une compétence</h1>
    <div class="form-container">
        <div class="form-tab">
            <button class="tablink" onclick="openForm('cAdd')">Créer nouvelle compétence</button>
        </div>
        <form id="cAdd" class="tabcontent" style="display:none" action="" method="post">
            <div class="form-control">
              <input type="text" id="Matiere" name="Matiere" required>
              <label for="Matiere">
                    <span style="transition-delay:50ms">M</span>
                    <span style="transition-delay:100ms">a</span>
                    <span style="transition-delay:150ms">t</span>
                    <span style="transition-delay:200ms">i</span>
                    <span style="transition-delay:250ms">è</span>
                    <span style="transition-delay:300ms">r</span>
                    <span style="transition-delay:350ms">e</span>
                    <span style="transition-delay:400ms">:</span>
                </label>
            </div>
            <div>
              <label for="description">Description de la compétence :</label>
              <textarea id="NomCompetence" name="NomCompetence" rows="5" cols="70" required></textarea>
            </div>
            <br></br>

            <button type="submit" name="ajout_competence" class="button">Ajouter une compétence</button>

            
            <br></br>
            <input type="hidden" name="id_competence" value="">
            <input type="submit" value="Supprimer cette compétence" name="supp_competence">
        </form>
    </div>
    <button onclick="topFunction()" id="scrollTop" class="scrollTop" title="Haut de page">Haut de page</button>
    <script src="menu.js"></script>
    <script src="ajouterCompetence.js"></script>
</body>

</html>

