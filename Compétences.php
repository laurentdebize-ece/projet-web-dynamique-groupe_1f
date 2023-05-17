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
  $sql = "DELETE FROM mathematiques WHERE id = ?";

  // Préparation de la requête
  $stmt = $bdd->prepare($sql);

  // Exécution de la requête avec les valeurs des paramètres
  if ($stmt->execute([$skillId])) {

  } else {
    echo "Erreur lors de la suppression de la compétence: " . $stmt->errorInfo();
  }

  // Redirection vers une page de confirmation ou autre
}

// Ajout d'une compétence
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['new_skill'])) {
  // Récupérer la matière sélectionnée et la nouvelle compétence
  $subject = $_POST['subject'];
  $newSkill = htmlspecialchars($_POST['new_skill']);

  // Requête d'insertion dans la base de données
  $sql = "INSERT INTO mathematiques (Competences) VALUES (?)";

  // Préparation de la requête
  $stmt = $bdd->prepare($sql);

  // Exécution de la requête avec les valeurs des paramètres
  if ($stmt->execute([$newSkill])) {
  
  } else {
    echo "Erreur lors de l'insertion de la compétence: " . $stmt->errorInfo();
  }

  // Redirection vers une page de confirmation ou autre
}

// Récupération des compétences existantes
$sql = "SELECT * FROM mathematiques";
$stmt = $bdd->query($sql);
$skills = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
        <option value="maths">Mathématiques</option>
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
    <?php foreach ($skills as $skill) { ?>
  <li>
  <?php echo $skill['Competences']; ?>
  <form method="POST" action="">
  <input type="hidden" name="delete_skill" value="<?php echo $skill['id']; ?>">
  <button type="submit">Supprimer</button>
  </form>
  </li>
  <?php } ?>
  
    </ul>
  </body>
  </html>