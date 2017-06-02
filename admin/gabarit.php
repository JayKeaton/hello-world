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
                <img src="static/headerFooter/msf2.jpeg" width="120" height="80"/>
            </a>
        </div>
        <ul>
            <li>
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
        <ul>
            <li> <a href="http://hugobriet.000webhostapp.com/?page=accueil"> Plan du Site </a> </li>
            <li> <a href="http://hugobriet.000webhostapp.com/?page=accueil"> Contact </a> </li>
            <li> <a href="http://hugobriet.000webhostapp.com/?page=accueil"> En savoir plus </a> </li>
        </ul>
        <ul id="copyright">
            <li> ©Error404 </li>
        </ul>
    </footer>
  </body>
</html>