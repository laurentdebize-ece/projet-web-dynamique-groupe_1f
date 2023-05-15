document.addEventListener('DOMContentLoaded', (event) => {
    const menuBtn = document.querySelector('.menu-btn');
    const sidebar = document.querySelector('.sidebar');

    menuBtn.addEventListener('click', () => {
        sidebar.classList.toggle('show');
    });
});

function openForm(formName, event) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(formName).style.display = "block";
  if (event) {
    event.currentTarget.className += " active";
  }
}

// Afficher le formulaire de connexion par défaut
window.onload = function() {
  openForm('Login');
}

// Bouton de défilement vers le haut
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  const scrollTopBtn = document.getElementById("scrollTop");
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    scrollTopBtn.style.display = "block";
  } else {
    scrollTopBtn.style.display = "none";
  }
}

function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}

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
// Fonction de masquage / affichage du mot de passe connexion
document.querySelector(".toggle-password-co").addEventListener("click", function() {
  let passwordInput = document.querySelector("#password");
  if (passwordInput.type === "password") {
      passwordInput.type = "text";
  } else {
      passwordInput.type = "password";
  }
});
  
// Plus tard changer 'remember', 'PasswordRecovery', 'email' par les bonnes infos

// Gestion de la case à cocher "Rester connecté"
const rememberCheckbox = document.getElementById('remember');

rememberCheckbox.addEventListener('change', function() {
  if (this.checked) {
    // L'utilisateur a coché la case "Rester connecté"
    // Mettez en place votre logique pour maintenir la connexion active
    console.log('Rester connecté activé');
  } else {
    // L'utilisateur a décoché la case "Rester connecté"
    // Mettez en place votre logique pour désactiver la connexion active
    console.log('Rester connecté désactivé');
  }
});

// Soumission du formulaire de récupération du mot de passe
const passwordRecoveryForm = document.getElementById('PasswordRecovery');

passwordRecoveryForm.addEventListener('submit', function(event) {
  event.preventDefault();

  // Récupérez l'adresse e-mail saisie par l'utilisateur
  const emailInput = document.getElementById('email');
  const email = emailInput.value;

  // Mettez en place votre logique pour envoyer les instructions de réinitialisation du mot de passe
  console.log('Instructions de réinitialisation envoyées à :', email);

  // Réinitialisez le formulaire
  passwordRecoveryForm.reset();
});
