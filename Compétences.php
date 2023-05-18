<?php
session_start();

try {
    $bdd = new PDO('mysql:host=localhost;dbname=omnesmyskills;charset=utf8', 'root', 'root');
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('Erreur : ' . $e->getMessage());
}

// Suppression d'une compétence
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_skill'])) {
    $skillId = $_POST['delete_skill'];

    // Requête de suppression
    $sql = "DELETE FROM " . $_POST['subject'] . " WHERE id = ?";

    // Préparation de la requête
    $stmt = $bdd->prepare($sql);

    // Exécution de la requête avec les valeurs des paramètres
    if ($stmt->execute([$skillId])) {

    } else {
        echo "Erreur lors de la suppression de la compétence: " . $stmt->errorInfo();
    }
}

// Ajout d'une compétence
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['new_skill'])) {
    // Récupérer la matière sélectionnée et la nouvelle compétence
    $subject = $_POST['subject'];
    $newSkill = htmlspecialchars($_POST['new_skill']);

    // Requête d'insertion dans la base de données
    $sql = "INSERT INTO " . $subject . " (Competences) VALUES (?)";

    // Préparation de la requête
    $stmt = $bdd->prepare($sql);

    // Exécution de la requête avec les valeurs des paramètres
    if ($stmt->execute([$newSkill])) {

    } else {
        echo "Erreur lors de l'insertion de la compétence: " . $stmt->errorInfo();
    }

}

// Récupération de la matière sélectionnée
$selectedSubject = isset($_POST['subject']) ? $_POST['subject'] : ($selectedSubject ?? null);

// Récupération des compétences de la matière sélectionnée
if ($selectedSubject) {
    $sql = "SELECT * FROM " . $selectedSubject;
    $stmt = $bdd->query($sql);
    $subjectSkills = $stmt->fetchAll(PDO::FETCH_ASSOC);
} else {
    $subjectSkills = [];
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Ajouter une compétence</title>
</head>
<body>
  <h1>Ajouter une compétence</h1>

  <form method="POST" action="">
    <div>
      <label for="subject">Matière :</label>
      <select name="subject" id="subject">
        <option value="mathematiques">Mathématiques</option>
        <option value="physique">Physique</option>
        <!-- Ajouter les autres matières ici -->
      </select>
    </div>

    <div>
      <label for="new_skill">Nouvelle compétence :</label>
      <input type="text" name="new_skill" id="new_skill">
    </div>

    <input type="submit" value="Ajouter">
  </form>

  <h2>Liste des compétences :</h2>
  <ul>
    <?php foreach ($subjectSkills as $skill) { ?>
      <li>
        <?php echo $skill['Competences']; ?>
        <form method="POST" action="">
          <input type="hidden" name="subject" value="<?php echo $selectedSubject; ?>">
          <input type="hidden" name="delete_skill" value="<?php echo $skill['id']; ?>">
          <button type="submit">Supprimer</button>
        </form>
      </li>
    <?php } ?>
  </ul>
</body>
</html>
