<?php
if(isset($_POST["firstname"]) && isset($_POST["lastname"]) && isset($_POST["email"]) && isset($_POST["class"]) && isset($_POST["code"]) && isset($_POST["passwordReg"]) && isset($_POST["passwordConfirm"])) {

    // Récupération des données du formulaire
    $nom = htmlspecialchars($_POST["lastname"]);
    $prenom = htmlspecialchars($_POST["firstname"]);
    $email = htmlspecialchars($_POST["email"]);
    $classe = htmlspecialchars($_POST["class"]);
    $code = htmlspecialchars($_POST["code"]);
    $mdp = password_hash($_POST["passwordReg"], PASSWORD_DEFAULT);

    // Connexion à la base de données
    $serveur = "localhost";
    $utilisateur = "root";
    $mdp_bdd = "Ficelle2003!";
    $bdd = "bdd_projet.sql";

    $connexion = mysqli_connect($serveur, $utilisateur, $mdp_bdd, $bdd);

    // Vérification de la connexion
    if (!$connexion) {
        die("Erreur de connexion : " . mysqli_connect_error());
    }

    // Vérification si l'email est déjà utilisé dans la table correspondante
    $table = "";
    switch($classe) {
        case "etudiant":
            $table = "Etudiant";
            break;
        case "scolarite":
            $table = "Professeur";
            break;
        case "administrateur":
            $table = "Administrateur";
            break;
    }

    $sql = "SELECT Email FROM ".$table." WHERE Email='".$email."'";
    $resultat = mysqli_query($connexion, $sql);
    if (mysqli_num_rows($resultat) > 0) {
        echo "L'email est déjà utilisé dans la base de données.";
    } else {
        // Insertion des données dans la table correspondante
        $sql = "INSERT INTO ".$table." (Nom, Prenom, Email, MotDePasse) VALUES ('".$nom."', '".$prenom."', '".$email."', '".$mdp."')";

        if (mysqli_query($connexion, $sql)) {
            echo "Inscription réussie.";
        } else {
            echo "Erreur d'insertion : " . mysqli_error($connexion);
        }
    }

    mysqli_close($connexion);
}
?>