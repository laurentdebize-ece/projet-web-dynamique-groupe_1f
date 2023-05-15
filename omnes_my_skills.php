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
    <a href="https://ece.campusonline.me/fr-fr/Pages/home.aspx">
        <img src="ece1.png" alt="ece" class="logo">
    </a>
    <div class="form-container">
        <div class="form-tab">
            <button class="tablink active" onclick="openForm('Login')">Se connecter</button>
        </div>

        <form id="Login" class="tabcontent" action="accueil.html" method="post">
            <div class="form-control">
                <input type="text" id="login" name="login" required>
                <label for="login">
                    <span style="transition-delay:0ms">I</span>
                    <span style="transition-delay:50ms">d</span>
                    <span style="transition-delay:100ms">e</span>
                    <span style="transition-delay:150ms">n</span>
                    <span style="transition-delay:200ms">t</span>
                    <span style="transition-delay:250ms">i</span>
                    <span style="transition-delay:300ms">f</span>
                    <span style="transition-delay:350ms">i</span>
                    <span style="transition-delay:400ms">a</span>
                    <span style="transition-delay:450ms">n</span>
                    <span style="transition-delay:500ms">t :</span>
                </label>
            </div>
            <div class="form-control">
                <div class="password-container">
                    <input type="password" id="password" name="password" required>
                    <label for="password">
                        <span style="transition-delay:0ms">P</span>
                        <span style="transition-delay:50ms">a</span>
                        <span style="transition-delay:100ms">s</span>
                        <span style="transition-delay:150ms">s</span>
                        <span style="transition-delay:200ms">w</span>
                        <span style="transition-delay:250ms">o</span>
                        <span style="transition-delay:300ms">r</span>
                        <span style="transition-delay:350ms">d :</span>
                    </label>
                    <span toggle="#password" class="toggle-password-co">👁️</span>
                </div>
            </div>
            <br>
            <a href="mot-de-passe-oublie.html">Mot de passe oublié ?</a>
            <br><br>
            <input type="submit" value="Connexion">
        </form>
<<<<<<< HEAD
=======

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
>>>>>>> a1179a9cdfe2f90b5158fdec69a4115d37266c42
    </div>
    <button onclick="topFunction()" id="scrollTop" class="scrollTop" title="Haut de page">Haut de page</button>
    <script src="menu.js"></script>
</body>

</html>