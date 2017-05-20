<!Doctype html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="static/headerFooter/headerFooter.css"> <!-- Attention à bien remplacer le lien vers le fichier CSS -->
  <link rel="icon" type="image/png" href="static/accueil/msf_logo _fichiers/hamster_1.jpeg" />
  <meta charset="utf-8" />
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
            <?php
            if (empty($_SESSION['idUtilisateur'])){
                ?>
                <li>
                    <a href="<?php echo(SOUS_DOMAINE) ?>">
                        <div>
                            <img src="static/headerFooter/home.png" width=21/>
                            <p>Accueil</p>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="https://www.google.fr/advanced_search">
                        <div>
                            <img src="static/headerFooter/loupe.png" width=21/>
                            <p>Recherche</p>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="<?php echo(SOUS_DOMAINE."?page=signin") ?>">
                        <div>
                            <img src="static/headerFooter/engrenages_1.png" width=21/>
                            <p>Login</p>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="<?php echo(SOUS_DOMAINE."?page=signup") ?>">
                        <div>
                            <img src="static/headerFooter/signup.png" width=21/>
                            <p>S'inscrire</p>
                        </div>
                    </a>
                </li>
                <?php
            }
            else {
                ?>
                <li>
                    <a href="<?php echo(SOUS_DOMAINE) ?>">
                        <div>
                            <img src="static/headerFooter/home.png" width=21/>
                            <p>Accueil</p>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="https://www.google.fr/advanced_search">
                        <div>
                            <img src="static/headerFooter/loupe.png" width=21/>
                            <p>Recherche</p>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="http://www.partage.org/">
                        <div>
                            <img src="static/headerFooter/share.png" width=21/>
                            <p>Partage</p>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="<?php echo(SOUS_DOMAINE."?page=profil") ?>">
                        <div>
                            <img src="static/headerFooter/Profil.png" width=21/>
                            <p>Mon Profil</p>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="https://fr.wikipedia.org/wiki/Param%C3%A8tre">
                        <div>
                            <img src="static/headerFooter/engrenages_1.png" width=21/>
                            <p>Paramètres</p>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="<?php echo(SOUS_DOMAINE."?page=logout") ?>">
                        <div>
                            <img src="static/headerFooter/logout.png" width=21/>
                            <p>Logout</p>
                        </div>
                    </a>
                </li>
                <?php
            }
            ?>
        </ul>
    </header>

    <div id="main">
      <?php echo $contenu; ?>
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

