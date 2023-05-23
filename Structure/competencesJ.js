document.addEventListener('DOMContentLoaded', function() {
    const sortSelect = document.getElementById('sort');
    const filterSelect = document.getElementById('filter');
    const searchInput = document.getElementById('search');
    const competencesList = document.querySelector('.competences-list');
    let competencesData = []; // Remplacez cette variable avec les données réelles des compétences
  
    // Fonction pour afficher la liste des compétences
    function displayCompetences(competences) {
      competencesList.innerHTML = '';
      competences.forEach(function(competence) {
        const competenceItem = document.createElement('div');
        competenceItem.classList.add('competence-item');
        competenceItem.textContent = competence; // Remplacez cette ligne avec le contenu HTML pour chaque compétence
        competencesList.appendChild(competenceItem);
      });
    }
  
    // Fonction de tri des compétences
    function sortCompetences(sortBy) {
      switch (sortBy) {
        case 'alphabetique_croissant':
          competencesData.sort();
          break;
        case 'alphabetique_decroissant':
          competencesData.sort().reverse();
          break;
        case 'date_croissante':
          // Implémentez le tri par date croissante
          break;
        case 'date_decroissante':
          // Implémentez le tri par date décroissante
          break;
        case 'statut':
          // Implémentez le tri par statut de la compétence
          break;
      }
      displayCompetences(competencesData);
    }
  
    // Fonction de filtrage des compétences
    function filterCompetences(filterBy, filterValue) {
      let filteredCompetences = competencesData;
      switch (filterBy) {
        case 'matiere':
          // Filtrer par matière
          filteredCompetences = filteredCompetences.filter(function(competence) {
            // Implémentez la condition de filtrage par matière
          });
          break;
        case 'professeur':
          // Filtrer par professeur
          filteredCompetences = filteredCompetences.filter(function(competence) {
            // Implémentez la condition de filtrage par professeur
          });
          break;
        case 'statut':
          // Filtrer par statut de la compétence
          filteredCompetences = filteredCompetences.filter(function(competence) {
            // Implémentez la condition de filtrage par statut
          });
          break;
      }
      displayCompetences(filteredCompetences);
    }
  
    // Événement de changement du sélecteur de tri
    sortSelect.addEventListener('change', function() {
      const sortBy = this.value;
      sortCompetences(sortBy);
    });
  
    // Événement de changement du sélecteur de filtrage
    filterSelect.addEventListener('change', function() {
      const filterBy = this.value;
      const filterValue = searchInput.value.trim();
      filterCompetences(filterBy, filterValue);
    });
  
    // Événement de saisie dans le champ de recherche
    searchInput.addEventListener('input', function() {
      const filterBy = filterSelect.value;
      const filterValue = this.value.trim();
      filterCompetences(filterBy, filterValue);
    });
  
    // Initialisation : Afficher toutes les compétences
    displayCompetences(competencesData);
  });
  