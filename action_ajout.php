<?php
header("no-cache, no-store, must-revalidate");
try {
    $bdd = new PDO(
        'mysql:host=localhost;dbname=BDMYSKILLS;
      charset=utf8',
        'root',
        'root',
        array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)
    );
} catch (Exception $e) {
    die('Erreur :' . $e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OMNES MySkills : Inscription</title>
    <link rel="stylesheet" href="menu.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css" integrity="sha384">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
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
    <h1>OMNES MySkills: Inscription</h1>
    <a href="https://ece.campusonline.me/fr-fr/Pages/home.aspx">
        <img src="ece1.png" alt="ece" class="logo">
    </a>
    <?php
    switch ($_GET["class"]) {
        case 1:
    ?>
            <div class="form-container">
                <div class="form-tab">
                    <button class="tablink" onclick="openForm('Register')">S'inscrire</button>
                </div>
                <form id="Register" class="tabcontent" style="display:none" method="post">
                    <div class="form-control">
                        <input type="text" id="nom" name="nom" required>
                        <label for="nom">
                            <span style="transition-delay:150ms">N</span>
                            <span style="transition-delay:200ms">o</span>
                            <span style="transition-delay:250ms">m</span>
                            <span style="transition-delay:300ms">:</span>
                        </label>
                    </div>
                    <div class="form-control">
                        <input type="text" id="prenom" name="prenom" required>
                        <label for="prenom">
                            <span style="transition-delay:0ms">P</span>
                            <span style="transition-delay:50ms">r</span>
                            <span style="transition-delay:100ms">é</span>
                            <span style="transition-delay:150ms">n</span>
                            <span style="transition-delay:200ms">o</span>
                            <span style="transition-delay:250ms">m</span>
                            <span style="transition-delay:300ms">:</span>
                        </label>
                    </div>
                    <div class="form-control">
                        <input type="text" id="email" name="email" required>
                        <label for="email">
                            <span style="transition-delay:150ms">E</span>
                            <span style="transition-delay:200ms">m</span>
                            <span style="transition-delay:250ms">a</span>
                            <span style="transition-delay:300ms">i</span>
                            <span style="transition-delay:300ms">l</span>
                            <span style="transition-delay:300ms">:</span>
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
                            <span toggle="#password" class="toggle-password-reg">👁️</span>
                        </div>
                    </div>
                    <div class="form-control">
                        <input type="text" id="poste" name="poste" required>
                        <label for="poste">
                            <span style="transition-delay:150ms">P</span>
                            <span style="transition-delay:200ms">o</span>
                            <span style="transition-delay:250ms">s</span>
                            <span style="transition-delay:300ms">t</span>
                            <span style="transition-delay:300ms">e</span>
                            <span style="transition-delay:300ms">:</span>
                        </label>
                    </div>
                    <input type="submit" value="Inscrire l'administrateur">
                </form>
            </div>
            <button onclick="topFunction()" id="scrollTop" class="scrollTop" title="Haut de page">Haut de page</button>
            <script src="menu.js"></script>
            <script src="inscription.js"></script>
            <?php
            $reqtot = $bdd->query("SELECT * FROM Administrateur");
            $row = $reqtot->fetch();
            echo 'ok 1.1 <br>';
            if (
                isset($_POST["nom"], $_POST["prenom"], $_POST["email"], $_POST["password"], $_POST["poste"])
                && !empty($_POST["nom"]) && !empty($_POST["prenom"]) && !empty($_POST["email"])
                && !empty($_POST["password"]) && !empty($_POST["poste"])
            ) {
                echo 'ok 1.2 <br>';
                if ($_POST["email"] != $row["Email"] && $_POST["password"] != $row["MotDePasse"]) {
                        $response = $bdd->prepare("INSERT INTO Administrateur (Nom,Prenom,Email,MotDePasse,Poste) VALUES (?,?,?,?,?)");
                        $response->execute([$_POST["nom"], $_POST["prenom"], $_POST["email"], $_POST["password"], $_POST["poste"]]);
                        echo 'successed 1 <br>';
                        break;                    
                } else {
                    echo 'failed 1 <br>';
                }
            }
            break;
        case 2:
            ?>
            <div class="form-container">
                <div class="form-tab">
                    <button class="tablink" onclick="openForm('Register')">S'inscrire</button>
                </div>
                <form id="Register" class="tabcontent" style="display:none" method="post">
                    <div class="form-control">
                        <input type="text" id="nom" name="nom" required>
                        <label for="nom">
                            <span style="transition-delay:150ms">N</span>
                            <span style="transition-delay:200ms">o</span>
                            <span style="transition-delay:250ms">m</span>
                            <span style="transition-delay:300ms">:</span>
                        </label>
                    </div>
                    <div class="form-control">
                        <input type="text" id="prenom" name="prenom" required>
                        <label for="prenom">
                            <span style="transition-delay:0ms">P</span>
                            <span style="transition-delay:50ms">r</span>
                            <span style="transition-delay:100ms">é</span>
                            <span style="transition-delay:150ms">n</span>
                            <span style="transition-delay:200ms">o</span>
                            <span style="transition-delay:250ms">m</span>
                            <span style="transition-delay:300ms">:</span>
                        </label>
                    </div>
                    <div class="form-control">
                        <input type="text" id="email" name="email" required>
                        <label for="email">
                            <span style="transition-delay:150ms">E</span>
                            <span style="transition-delay:200ms">m</span>
                            <span style="transition-delay:250ms">a</span>
                            <span style="transition-delay:300ms">i</span>
                            <span style="transition-delay:300ms">l</span>
                            <span style="transition-delay:300ms">:</span>
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
                            <span toggle="#password" class="toggle-password-reg">👁️</span>
                        </div>
                    </div>
                    <div class="form-control">
                        <input type="text" id="classe" name="classe" required>
                        <label for="classe">
                            <span style="transition-delay:150ms">C</span>
                            <span style="transition-delay:200ms">l</span>
                            <span style="transition-delay:250ms">a</span>
                            <span style="transition-delay:300ms">s</span>
                            <span style="transition-delay:300ms">s</span>
                            <span style="transition-delay:300ms">e</span>
                            <span style="transition-delay:300ms">s</span>
                            <span style="transition-delay:300ms">:</span>
                        </label>
                    </div>
                    <div class="form-control">
                        <input type="text" id="matiere" name="matiere" required>
                        <label for="matiere">
                            <span style="transition-delay:150ms">M</span>
                            <span style="transition-delay:200ms">a</span>
                            <span style="transition-delay:250ms">t</span>
                            <span style="transition-delay:300ms">i</span>
                            <span style="transition-delay:300ms">è</span>
                            <span style="transition-delay:300ms">r</span>
                            <span style="transition-delay:300ms">e</span>
                            <span style="transition-delay:300ms">:</span>
                        </label>
                    </div>
                    <input type="submit" value="Inscrire le professeur">
                </form>
            </div>
            <button onclick="topFunction()" id="scrollTop" class="scrollTop" title="Haut de page">Haut de page</button>
            <script src="menu.js"></script>
            <script src="inscription.js"></script>
            <?php
            echo 'ok 2.1 <br>';
            $reqtot = $bdd->query("SELECT * FROM Professeur");
            $row = $reqtot->fetch();
            if (
                isset($_POST["nom"], $_POST["prenom"], $_POST["email"], $_POST["password"], $_POST["classe"], $_POST["matiere"])
                && !empty($_POST["nom"]) && !empty($_POST["prenom"]) && !empty($_POST["email"])
                && !empty($_POST["password"]) && !empty($_POST["classe"]) && !empty($_POST["matiere"])
            ) {
                echo 'ok 2.2 <br>';
                if ($_POST["email"] != $row["Email"] && $_POST["password"] != $row["MotDePasse"]) {
                    echo 'ok 2.3 <br>';
                   
                        $response = $bdd->prepare("INSERT INTO Professeur (Nom,Prenom,Email,MotDePasse,Classes,Matiere) VALUES (?,?,?,?,?,?)");
                        $response->execute([$_POST["nom"], $_POST["prenom"], $_POST["email"], $_POST["password"], $_POST["classe"], $_POST["matiere"]]);
                        echo 'successed 2 <br>';
                        break;
                    } else {
                        echo 'failed 2 <br>';
                }
            }
            break;
        case 3:
            ?>
            <div class="form-container">
                <div class="form-tab">
                    <button class="tablink" onclick="openForm('Register')">S'inscrire</button>
                </div>
                <form id="Register" class="tabcontent" style="display:none" method="post">
                    <div class="form-control">
                        <input type="text" id="nom" name="nom" required>
                        <label for="nom">
                            <span style="transition-delay:150ms">N</span>
                            <span style="transition-delay:200ms">o</span>
                            <span style="transition-delay:250ms">m</span>
                            <span style="transition-delay:300ms">:</span>
                        </label>
                    </div>
                    <div class="form-control">
                        <input type="text" id="prenom" name="prenom" required>
                        <label for="prenom">
                            <span style="transition-delay:0ms">P</span>
                            <span style="transition-delay:50ms">r</span>
                            <span style="transition-delay:100ms">é</span>
                            <span style="transition-delay:150ms">n</span>
                            <span style="transition-delay:200ms">o</span>
                            <span style="transition-delay:250ms">m</span>
                            <span style="transition-delay:300ms">:</span>
                        </label>
                    </div>
                    <div class="form-control">
                        <input type="text" id="email" name="email" required>
                        <label for="email">
                            <span style="transition-delay:150ms">E</span>
                            <span style="transition-delay:200ms">m</span>
                            <span style="transition-delay:250ms">a</span>
                            <span style="transition-delay:300ms">i</span>
                            <span style="transition-delay:300ms">l</span>
                            <span style="transition-delay:300ms">:</span>
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
                            <span toggle="#password" class="toggle-password-reg">👁️</span>
                        </div>
                    </div>
                    <div class="form-control">
                        <input type="text" id="ecole" name="ecole" required>
                        <label for="ecole">
                            <span style="transition-delay:150ms">É</span>
                            <span style="transition-delay:200ms">c</span>
                            <span style="transition-delay:250ms">o</span>
                            <span style="transition-delay:300ms">l</span>
                            <span style="transition-delay:300ms">e</span>
                            <span style="transition-delay:300ms">:</span>
                        </label>
                    </div>
                    <div class="form-control">
                        <input type="text" id="groupe" name="groupe" required>
                        <label for="groupe">
                            <span style="transition-delay:150ms">G</span>
                            <span style="transition-delay:200ms">r</span>
                            <span style="transition-delay:250ms">o</span>
                            <span style="transition-delay:300ms">u</span>
                            <span style="transition-delay:300ms">p</span>
                            <span style="transition-delay:300ms">e</span>
                            <span style="transition-delay:300ms">:</span>
                        </label>
                    </div>
                    <div class="form-control">
                        <input type="text" id="promo" name="promo" required>
                        <label for="promo">
                            <span style="transition-delay:150ms">P</span>
                            <span style="transition-delay:200ms">r</span>
                            <span style="transition-delay:250ms">o</span>
                            <span style="transition-delay:300ms">m</span>
                            <span style="transition-delay:300ms">o</span>
                            <span style="transition-delay:300ms">:</span>
                        </label>
                    </div>
                    <input type="submit" value="Inscrire l'étudiant">
                </form>
            </div>
            <button onclick="topFunction()" id="scrollTop" class="scrollTop" title="Haut de page">Haut de page</button>
            <script src="menu.js"></script>
            <script src="inscription.js"></script>
    <?php
    echo 'ok 3.1 <br>';
            $reqtot = $bdd->query("SELECT * FROM Etudiant");
            $row = $reqtot->fetch();
            if (
                isset($_POST["nom"], $_POST["prenom"], $_POST["email"], $_POST["password"], $_POST["ecole"], $_POST["groupe"], $_POST["promo"])
                && !empty($_POST["nom"]) && !empty($_POST["prenom"]) && !empty($_POST["email"])
                && !empty($_POST["password"]) && !empty($_POST["ecole"]) && !empty($_POST["groupe"]) && !empty($_POST["promo"])
            ) {
                echo 'ok 3.2 <br>';
                if ($_POST["email"] != $row["Email"] && $_POST["password"] != $row["MotDePasse"]) {
                    echo 'ok 3.3 <br>';
                        $response = $bdd->prepare("INSERT INTO Etudiant (Nom,Prenom,Email,MotDePasse,Ecole,Groupe,Promo) VALUES (?,?,?,?,?,?,?)");
                        $response->execute([$_POST["nom"], $_POST["prenom"], $_POST["email"], $_POST["password"], $_POST["ecole"], $_POST["groupe"], $_POST["promo"]]);
                        echo 'successed 3 <br>';
                        break;                    
                } else {
                    echo 'failed 3 <br>';
                }
            }
            break;
    }
    ?>
</body>

</html>