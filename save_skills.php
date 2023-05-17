<?php
session_start();

try {
    $bdd = new PDO('mysql:host=localhost;dbname=omnesmyskills;charset=utf8', 'root', 'root');
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('Erreur : ' . $e->getMessage());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Récupérer les compétences sélectionnées
  $selectedSkills = $_POST['skills'];

  foreach ($selectedSkills as $skill) {
    // Échapper les caractères spéciaux pour éviter les injections SQL
    $skill = htmlspecialchars($skill);

    // Requête d'insertion dans la base de données
    $sql = "INSERT INTO skills (skill_name) VALUES (?)";

    // Préparation de la requête
    $stmt = $bdd->prepare($sql);

    // Exécution de la requête
    if ($stmt->execute([$skill])) {
      echo "Compétence insérée avec succès";
    } else {
      echo "Erreur lors de l'insertion de la compétence: " . $stmt->errorInfo();
    }
  }

  // Redirection vers une page de confirmation ou autre
  header('Location: confirmation.php');
  exit();
}

?>
