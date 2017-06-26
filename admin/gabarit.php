<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="static/headerFooter/headerFooter.css"> <!-- Attention à bien remplacer le lien vers le fichier CSS -->
  <link rel="icon" type="image/png" href="static/accueil/msf_logo_fichiers/hamster_1.jpeg" />
  <meta charset="utf-8"/>
  <title>MSF</title>
</head>
  <body>
    <header>
        <!--div id="rouge"></div> <!-- Sert à créer la bande rouge à gauche de l'image -->
        <div id="imageBanniere">
            <a href="<?php echo(SOUS_DOMAINE) ?>">
                <img style="background-color: white" src="static/headerFooter/LogoSoli.png" width="125" height="90"/>
            </a>
        </div>
        <img src="https://image.flaticon.com/icons/svg/149/149199.svg" id="menuDeroulant" width="40" height="40"/>
        <ul>
            <li class="border_bottom">
                <a href="<?php echo(SOUS_DOMAINE) ?>">
                    <div>
                        <img src="static/headerFooter/home.png" width=20 height=20/>
                        <p>Accueil</p>
                    </div>
                </a>
            </li>
            <li class="border_bottom">
                <a href="<?php echo(SOUS_DOMAINE."?page=ajoutAdmin") ?>">
                    <div>
                        <img src="static/headerFooter/ajoutAdmin.ico" width=21/>
                        <p>Ajouter un admin</p>
                    </div>
                </a>
            </li>
            <li>
                <a href="<?php echo(SOUS_DOMAINE."?page=gestionCategories") ?>">
                    <div>
                        <img src="static/headerFooter/categories.png" width=21/>
                        <p>Categories</p>
                    </div>
                </a>
            </li>
            <li class="border_bottom">
                <a href="<?php echo(SOUS_DOMAINE."?page=logout") ?>">
                    <div>
                        <img src="static/headerFooter/logout.png" width=21/>
                        <p>Logout</p>
                    </div>
                </a>
            </li>
        </ul>
    </header>

    <div id="main">
      <?php include($path); ?>
    </div>

    <footer>
        <ul id="copyright">
            <li> ©SoliLink </li>
        </ul>
    </footer>
  </body>
</html>