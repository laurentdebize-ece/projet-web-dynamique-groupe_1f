// Fonction de masquage / affichage du mot de passe pour les champs de mot de passe de l'inscription
document.querySelector(".toggle-password-change").addEventListener("click", function() {
    let passwordInput = document.querySelector("#newPassword");
    if (passwordInput.type === "password") {
        passwordInput.type = "text";
    } else {
        passwordInput.type = "password";
    }
  });
  
  // Fonction de masquage / affichage du mot de passe pour les champs de mot de passe de la confirmation
  document.querySelector(".toggle-password-con").addEventListener("click", function() {
    let passwordInput = document.querySelector("#confirmPassword");
    if (passwordInput.type === "password") {
        passwordInput.type = "text";
    } else {
        passwordInput.type = "password";
    }
  });