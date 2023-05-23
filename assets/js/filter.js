document.addEventListener("DOMContentLoaded", function () {
  // On récupère les li
  let categoryButton = document.getElementsByClassName("category-button");
  let allCategories = document.getElementsByClassName("all-categories");

  // Fonction pour afficher toutes les data-category
  function afficherToutesLesCategories() {
    let products = document.querySelectorAll('[data-category]');

    for (let j = 0; j < products.length; j++) {
      products[j].style.display = "block";
    }
  }

  // Ajouter un écouteur d'événement au bouton allCategories
  allCategories[0].addEventListener("click", function () {
    afficherToutesLesCategories();
  });

  // Ajouter le style "pointer" au curseur lorsque survolé
  allCategories[0].style.cursor = "pointer";

  // Pour chaque bouton, on ajoute un écouteur d'événement
  for (let i = 0; i < categoryButton.length; i++) {
    // Ajouter le style "pointer" au curseur lorsque survolé
    categoryButton[i].style.cursor = "pointer";

    categoryButton[i].addEventListener("click", function () {
      let category = this.getAttribute("data-id");
      let products = document.querySelectorAll('[data-category]');

      for (let j = 0; j < products.length; j++) {
        if (products[j].getAttribute("data-category") !== category) {
          products[j].style.display = "none";
        } else {
          products[j].style.display = "block";
        }
      }
    });
  }
});
