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
<html>
<head>
  <title>Ajouter une compétence</title>
</head>
<body>
  <h1>Ajouter une compétence</h1>

  <form method="POST" action="">
    <div>
      <label for="subject">Matière :</label>
      <select name="subject" id="subject" onchange="this.form.submit()">
        <option value="mathematiques" <?php if ($selectedSubject === "mathematiques") { echo "selected"; } ?>>Mathématiques</option>
        <option value="physique" <?php if ($selectedSubject === "physique") { echo "selected"; } ?>>Physique</option>
        <!-- Ajouter les autres matières ici -->
      </select>
    </div>
  </form>

  <h2>Liste des compétences :</h2>
  <ul>
    <?php foreach ($subjectSkills as $skill) { ?>
      <li>
        <?php echo $skill['Competences']; ?>

        <!-- Formulaire pour sélectionner l'état de la compétence -->
        <form method="POST" action="">
          <input type="hidden" name="subject" value="<?php echo $selectedSubject; ?>">
          <input type="hidden" name="skill_id" value="<?php echo $skill['id']; ?>">

          <!-- Bouton pour sélectionner "Acquis" -->
          <input type="submit" name="acquis" value="Acquis">

          <!-- Bouton pour sélectionner "En Acquisition" -->
          <input type="submit" name="en_acquisition" value="En Acquisition">

          <!-- Bouton pour sélectionner "Non Acquis" -->
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
