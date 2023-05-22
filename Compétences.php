<?php
session_start();

try {
    $bdd = new PDO('mysql:host=localhost;dbname=omnesmyskills;charset=utf8', 'root', 'root');
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('Erreur : ' . $e->getMessage());
}

// Ajout d'une compétence
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['competence'])) {
    // Récupérer la matière sélectionnée et la nouvelle compétence
    $matiere = $_POST['matiere']; // Utilisation de 'matiere' au lieu de 'Matiere'
    $competence = htmlspecialchars($_POST['competence']);

    // Requête d'insertion dans la base de données
    $sql = "INSERT INTO competencesmatieres (Matiere, Competence, Acquis, EnCours, NonAcquis) VALUES (?, ?, 0, 0, 0)";

    // Préparation de la requête
    $stmt = $bdd->prepare($sql);
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
            <label for="description">Description de la compétence :</label>
                <textarea id="competence" name="competence" rows="5" cols="70" required></textarea>
            </div>
            <!-- Nouveau champ pour la matière -->
            <div class="form-control">
                <label for="matieres">
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
          
            <input type="submit" value="Ajouter cette compétence">
        </form>
    </div>
    <button onclick="topFunction()" id="scrollTop" class="scrollTop" title="Haut de page">Haut de page</button>
    <script src="menu.js"></script>
    <script src="ajouterCompetence.js"></script>
</body>

</html>

