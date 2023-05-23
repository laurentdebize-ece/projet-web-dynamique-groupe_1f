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
        <form id="Login" class="tabcontent" action="action_connexion.php" method="post">
            <label>Satut :</label>
            <div style="display: flex; justify-content: space-between; width: 90%;">
                <div>
                    <input type="radio" id="3" name="class" value="3">
                    <label for="etudiant">Etudiant</label>

                </div>
                <div>
                    <input type="radio" id="2" name="class" value="2">
                    <label for="scolarite">Professeur</label>
                </div>
                <div>
                    <input type="radio" id="1" name="class" value="1">
                    <label for="administrateur">Administrateur</label>
                </div>
            </div>
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
    </div>
    <button onclick="topFunction()" id="scrollTop" class="scrollTop" title="Haut de page">Haut de page</button>
    <script src="menu.js"></script>
    <script src="connexion.js"></script>
</body>

</html>