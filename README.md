# yonnha_site_reservation
Site de réservation de l'entreprise Yonnha sur leur exposition impressionniste.


# Création d'une page
Le site est structuré de la manière suivante :
- /controller
- /model
- /view
- index.php

Les pages du site se situent dans le dossier /view et sont structurés de la manière suivante :
- /view
  - /style
  - home.php
  - gallery.php
  - contact.php
  - ...
  
# CSS/SASS rules
Pour le style comme convenu on utilisera du SCSS.
Tout le style des pages devra-t-être dans le dossier /style et devront être des pages différentes qui seront importées (@import) par la page style.scss:
- /view
  - /style
    - style.css
    - style.scss
    - _common.scss
    - _navbar.scss
    - _home.scss
    - _gallery.scss
    - _contact.scss
:warning:	Pour éviter des problèmes de noms de classes similaires ou des styles qui affectent plusieurs balises de différentes pages de façon involontaire, on met des classes sur les balises <html> et on imbrique tous les styles de la page dans celle-ci 
(ex: <html class="home">
  <style>
  .home {
      body {
        ...
      }
      .a-button{
        ...
      }
  }
  </style>
)
