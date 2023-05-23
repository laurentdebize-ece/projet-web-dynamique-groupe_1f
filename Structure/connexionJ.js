// Afficher le formulaire de connexion par défaut
window.onload = function() {
    openForm('Login');
}
// Fonction de masquage / affichage du mot de passe connexion
document.querySelector(".toggle-password-co").addEventListener("click", function() {
    let passwordInput = document.querySelector("#password");
    if (passwordInput.type === "password") {
        passwordInput.type = "text";
    } else {
        passwordInput.type = "password";
    }
  });