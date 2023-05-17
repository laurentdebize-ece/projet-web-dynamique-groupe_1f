<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Récupérer les compétences sélectionnées
  $selectedSkills = $_POST['skills'];

  // Traiter les compétences sélectionnées (enregistrement dans une base de données, etc.)
  // ...

  // Redirection vers une page de confirmation ou autre
  header('Location: confirmation.php');
  exit();
}
?>
