<?php
session_start();

try {
    $bdd = new PDO('mysql:host=localhost;dbname=BDMYSKILLS;charset=utf8', 'root', 'root');
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('Erreur : ' . $e->getMessage());
}

// Récupération de la matière sélectionnée
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['subject'])) {
    $selectedSubject = $_POST['subject'];
} else {
    // Valeur par défaut si aucune matière sélectionnée
    $selectedSubject = "competence";
}

try {
    // Récupération des compétences de la matière sélectionnée
    $sql = "SELECT * FROM " . $selectedSubject;
    $stmt = $bdd->query($sql);
    $subjectSkills = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die('Erreur : ' . $e->getMessage());
}

try {
    // Récupération de l'ID de l'étudiant connecté
    if (isset($_SESSION['ID_Etudiant'])) {
        $idEtudiant = $_SESSION['ID_Etudiant'];
    } else {
        echo "Vous n'etes pas connecté";
    }

    // Mettre à jour l'état de la compétence dans la base de données
    foreach ($_POST as $key => $value) {
        if (strpos($key, 'avancement') === 0) {
            $skillId = substr($key, 11);
            if ($value === 'acquis') {
                $acquisition = 1;
            } elseif ($value === 'en-cours') {
                $acquisition = 2;
            } else {
                $acquisition = 3;
            }
            $sql = "UPDATE Acquisition SET Acquisition = ? WHERE ID_Competence = ? AND ID_Etudiant = ?";
            $stmt = $bdd->prepare($sql);
            $stmt->execute([$acquisition, $skillId, $idEtudiant]);
        }
    }
} catch (PDOException $e) {
    die('Erreur : ' . $e->getMessage());
}
?>



<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OMNES MySkills - Compétences</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="menu.css">
    <link rel="stylesheet" href="competences.css">
</head>

<body>
    <h1>Compétences</h1>
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

    <div class="main">
        <div class="filter-options">
            <label for="filter">Matière :</label>
            <p>&ensp;</p>
            <select id="filter">
                <option value="statut">Mathématiques</option>
                <option value="statut">Physique</option>
                <option value="statut">Informatiques</option>
            </select>
            <p>&ensp;</p>
            <label for="filter">Avancement :</label>
            <p>&ensp;</p>
            <select id="filter">
                <option value="statut">Aquis</option>
                <option value="statut">En cours d'aquisition</option>
                <option value="statut">Non aquis</option>
            </select>
            <p>&ensp;</p>

            <input type="text" id="search" placeholder="Rechercher...">
        </div>
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <table class="competences-table">
            <thead>
                <tr>
                    <th>Avancement</th>
                    <th>Matière</th>
                    <th>Description</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($subjectSkills as $skill) { ?>
                <tr>
                    <td>
                        <label>
                            <input type="radio" name="avancement-<?php echo $skill['Acquisition']; ?>" value="non-acquis">
                            Non acquis
                        </label>
                        <label>
                            <input type="radio" name="avancement-<?php echo $skill['Acquisition']; ?>" value="en-cours">
                            En cours
                        </label>
                        <label>
                            <input type="radio" name="avancement-<?php echo $skill['Acquisition']; ?>" value="acquis">
                            Acquis
                        </label>
                    </td>
                    <td><?php echo $selectedSubject; ?></td>
                    <td><?php echo $skill['NomCompetence']; ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>


        <button class="button2">Envoyer les résultats</button>
        </form>
        <button onclick="topFunction()" id="scrollTop" class="scrollTop" title="Haut de page">Haut de page</button>

        <script src="menu.js"></script>
        <script src="competences.js"></script>
</body>

</html>
