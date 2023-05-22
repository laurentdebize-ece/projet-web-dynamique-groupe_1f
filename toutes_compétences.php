<?php
session_start();

try {
    $bdd = new PDO('mysql:host=localhost;dbname=omnesmyskills;charset=utf8', 'root', 'root');
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('Erreur : ' . $e->getMessage());
}

// Récupération de la matière sélectionnée
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['subject'])) {
    $selectedSubject = $_POST['subject'];
} else {
    // Valeur par défaut si aucune matière sélectionnée
    $selectedSubject = "mathematiques";
}

try {
    // Récupération des compétences de la matière sélectionnée
    $sql = "SELECT * FROM " . $selectedSubject;
    $stmt = $bdd->query($sql);
    $subjectSkills = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
</head>

<body>
    <h1>Toutes les compétences</h1>
    <button class="menu-btn">☰
        <span class="text">Menu</span>
    </button>
    <nav class="sidebar">
        <a href="accueil.html"><i class="fa fa-home"></i> Accueil</a>
        <a href="competences.html">Compétences</a>
        <a href="matieres.html">Matières</a>
        <a href="competences_transverses.html">Compétences transverses</a>
        <a href="toutes_compétences.php">Toutes les compétences</a>
        <a href="profil.html">Profil</a>
    </nav>

    <div class="main">
        <div class="user-info">
            <span>Bonjour, [Nom d'utilisateur]</span>
            <a href="omnes_my_skills.php">Déconnexion</a>
        </div>

    </div>

    <script src="menu.js"></script>


    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <div>
            <label for="subject">Matière :</label>
            <select name="subject" id="subject" onchange="this.form.submit()">
                <option value="mathematiques" <?php if ($selectedSubject === "mathematiques") { echo "selected"; } ?>>Mathématiques</option>
                <option value="physique" <?php if ($selectedSubject === "physique") { echo "selected"; } ?>>Physique</option>
            </select>
        </div>
    </form>

    <h2>Liste des compétences :</h2>
    <ul>
        <?php foreach ($subjectSkills as $skill) { ?>
            <li>
                <?php echo $skill['Competences']; ?>

                <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <input type="hidden" name="subject" value="<?php echo $selectedSubject; ?>">
                    <input type="hidden" name="skill_id" value="<?php echo $skill['id']; ?>">

                    <input type="submit" name="acquis" value="Acquis">
                    <input type="submit" name="en_acquisition" value="En Acquisition">
                    <input type="submit" name="non_acquis" value="Non Acquis">
                </form>
            </li>
        <?php } ?>
    </ul>

    <?php
    // Traitement du formulaire de sélection de l'état de la compétence
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['skill_id'])) {
        $skillId = $_POST['skill_id'];

        try {
            // Mettre à jour l'état de la compétence dans la base de données
            if (isset($_POST['acquis'])) {
                $sql = "UPDATE " . $selectedSubject . " SET Acquis = 1, EnAcquisition = 0, NonAcquis = 0 WHERE id = ?";
            } elseif (isset($_POST['en_acquisition'])) {
                $sql = "UPDATE " . $selectedSubject . " SET Acquis = 0, EnAcquisition = 1, NonAcquis = 0 WHERE id = ?";
            } elseif (isset($_POST['non_acquis'])) {
                $sql = "UPDATE " . $selectedSubject . " SET Acquis = 0, EnAcquisition = 0, NonAcquis = 1 WHERE id = ?";
            }

            $stmt = $bdd->prepare($sql);
            $stmt->execute([$skillId]);
        } catch (PDOException $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }
    ?>

</body>

</html>
