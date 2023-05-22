// Fonction de masquage / affichage du mot de passe pour les champs de mot de passe de l'inscription
document.querySelector(".toggle-password-reg").addEventListener("click", function() {
    let passwordInput = document.querySelector("#passwordReg");
    if (passwordInput.type === "password") {
        passwordInput.type = "text";
    } else {
        passwordInput.type = "password";
    }
  });
  
  // Fonction de masquage / affichage du mot de passe pour les champs de mot de passe de la confirmation
  document.querySelector(".toggle-password-confirm").addEventListener("click", function() {
    let passwordInput = document.querySelector("#passwordConfirm");
    if (passwordInput.type === "password") {
        passwordInput.type = "text";
    } else {
        passwordInput.type = "password";
    }
  });
  // Afficher le formulaire d'inscription par défaut
window.onload = function() {
    openForm('Register');
}