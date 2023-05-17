<!DOCTYPE html>
<html>
<head>
  <title>Catégories</title>
  <style>
    .category {
      margin-bottom: 20px;
    }
    .category h2 {
      margin-bottom: 10px;
    }
    .skills-list {
      list-style-type: none;
      padding: 0;
    }
    .skills-list li {
      margin-bottom: 5px;
    }
  </style>
</head>
<body>
  <h1>Catégories</h1>

  <form method="POST" action="save_skills.php">
    <div class="category">
      <h2>Mathématiques</h2>
      <ul class="skills-list">
        <li><label><input type="checkbox" name="skills[]" value="algèbre"> Algèbre</label></li>
        <li><label><input type="checkbox" name="skills[]" value="géométrie"> Géométrie</label></li>
        <li><label><input type="checkbox" name="skills[]" value="calcul différentiel"> Calcul différentiel</label></li>
      </ul>
    </div>

    <div class="category">
      <h2>Physique</h2>
      <ul class="skills-list">
        <li><label><input type="checkbox" name="skills[]" value="mécanique"> Mécanique</label></li>
        <li><label><input type="checkbox" name="skills[]" value="optique"> Optique</label></li>
        <li><label><input type="checkbox" name="skills[]" value="électromagnétisme"> Électromagnétisme</label></li>
      </ul>
    </div>

    <!-- Ajoutez le reste des catégories ici -->

    <input type="submit" value="Enregistrer">
  </form>
</body>
</html>