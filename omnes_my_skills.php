<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OMNES MySkills</title>
    <link rel="stylesheet" href="menu.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css" integrity="sha384">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <?php include "premiere_connexion.php"?>
</head>
<body>

    <h1>OMNES MySkills</h1>
    <img src="ece1.png" alt="ece" class="logo">
    
    <div class="form-container">
        <div class="form-tab">
            <button class="tablink active" onclick="openForm('Login')">Se connecter</button>
            <button class="tablink" onclick="openForm('Register')">S'inscrire</button>
        </div>

        <form id="Login" class="tabcontent" action="accueil.html" method="post">
            <label for="login">Identifiant</label>
            <input type="text" name="login" id="login"> <br> <br>
            <label for="password">Mot de passe</label>
            <div class="password-container">
                <input type="password" name="password" id="password">
                <span toggle="#password" class="toggle-password">👁️</span>
            </div>
            <br>
            <input type="submit" value="Connexion">
        </form>

        <form id="Register" class="tabcontent" style="display:none" action="accueil.html" method="post">
            <label for="firstname">Prénom</label>
            <input type="text" name="firstname" id="firstname"> <br> <br>
            <label for="lastname">Nom</label>
            <input type="text" name="lastname" id="lastname"> <br> <br>
            <label for="email">Email</label>
            <input type="email" name="email" id="email"> <br> <br>
            <label for="class">Classe</label>
            <select name="class" id="class">
                <option value="etudiant">Etudiant</option>
                <option value="scolarite">Scolarité</option>
                <option value="administrateur">Administrateur</option>
            </select> <br> <br>
            <label for="code">Code de vérification</label>
            <input type="text" name="code" id="code"> <br> <br>
            <label for="passwordReg">Mot de passe</label>
            <div class="password-container">
                <input type="password" name="passwordReg" id="passwordReg">
                <span toggle="#passwordReg" class="toggle-password">👁️</span>
            </div> <br>
            <label for="passwordConfirm">Confirmer le mot de passe</label>
            <div class="password-container">
                <input type="password" name="passwordConfirm" id="passwordConfirm">
                <span toggle="#passwordConfirm" class="toggle-password">👁️</span>
            </div> <br>
            <input type="submit" value="S'inscrire">
        </form>
    </div>
    
    <script src="menu.js"></script>
</body>
</html>

