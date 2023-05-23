<?php
session_start();

// Assurez-vous que l'utilisateur est connecté
if (!isset($_SESSION['userId']) || !isset($_SESSION['accountType'])) {
    header('Location: omnes_my_skills.php');
    exit();
}

try {
    $bdd = new PDO('mysql:host=localhost;dbname=BDMYSKILLS;charset=utf8', 'root', 'root');
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('Erreur : ' . $e->getMessage());
}

// Récupération des informations du compte de l'utilisateur
$tableName = '';
switch ($_SESSION['accountType']) {
    case 'etudiant':
        $tableName = 'Etudiant';
        break;
    case 'professeur':
        $tableName = 'Professeur';
        break;
    case 'administrateur':
        $tableName = 'Administrateur';
        break;
}

$sql = "SELECT * FROM $tableName WHERE ID = ?";
$stmt = $bdd->prepare($sql);
$stmt->execute([$_SESSION['userId']]);
$userData = $stmt->fetch(PDO::FETCH_ASSOC);

// Assurez-vous que les données de l'utilisateur ont été récupérées
if (!$userData) {
    die('Erreur : impossible de récupérer les informations du compte');
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
    <h1>Profil de <?php echo $userData['Prenom'] . ' ' . $userData['Nom']; ?></h1>
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

        <div class="user-info">
            <span>Bonjour, <?php echo $userData['Prenom'] . ' ' . $userData['Nom']; ?></span>
            <a href="omnes_my_skills.php">Déconnexion</a>
        </div>
        <!-- Contenu de la page compétences -->
    </div>
    <div class="form-container">
        <ul>
            <li>Email: <?php echo $userData['Email']; ?></li>
            <li>Mot de passe: <?php echo $userData['MotDePasse']; ?></li>
        </ul>

        <?php if ($_SESSION['accountType'] === 'etudiant') { ?>
            <h2>Informations supplémentaires pour les étudiants</h2>
            <ul>
                <li>Ecole: <?php echo $userData['Ecole']; ?></li>
                <li>Groupe: <?php echo $userData['Groupe']; ?></li>
                <li>Promo: <?php echo $userData['Promo']; ?></li>
            </ul>
        <?php } elseif ($_SESSION['accountType'] === 'professeur') { ?>
            <h2>Informations supplémentaires pour les professeurs</h2>
            <ul>
                <li>Classes: <?php echo $userData['Classes']; ?></li>
                <li>Matière: <?php echo $userData['Matiere']; ?></li>
            </ul>
        <?php } elseif ($_SESSION['accountType'] === 'administrateur') { ?>
            <h2>Informations supplémentaires pour les administrateurs</h2>
            <ul>
                <li>Poste: <?php echo $userData['Poste']; ?></li>
            </ul>
        <?php } ?>
    </div>

    <script src="menu.js"></script>
</body>

</html>