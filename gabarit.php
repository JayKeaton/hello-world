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
                <img style="background-color: white" src="static/headerFooter/LogoSoli.png" width="120" height="80"/>
            </a>
        </div>
        <img src="https://image.flaticon.com/icons/svg/149/149199.svg" id="menuDeroulant" width="40" height="40"/>
        <ul>
            <?php
            if (empty($_SESSION['idUtilisateur'])){
                ?>
                <li class="border_bottom">
                    <a href="<?php echo(SOUS_DOMAINE) ?>">
                        <div>
                            <img src="static/headerFooter/home.png" width=20 height=20/>
                            <p>Accueil</p>
                        </div>
                    </a>
                </li>
                <li class="border_bottom">
                    <a href="<?php echo(SOUS_DOMAINE."?page=recherche") ?>">
                        <div>
                            <img src="static/headerFooter/loupe.png" width=20 height=20/>
                            <p>Recherche</p>
                        </div>
                    </a>
                </li>
                <li class="border_bottom">
                    <a href="<?php echo(SOUS_DOMAINE."?page=servicesAffiche") ?>">
                        <div>
                            <img src="static/headerFooter/map.png" width=20 height=20/>
                            <p>Carte</p>
                        </div>
                    </a>
                </li>
                <li class="border_bottom">
                    <a href="<?php echo(SOUS_DOMAINE."?page=signin") ?>">
                        <div>
                            <img src="static/headerFooter/engrenages_1.png" width=20 height=20/>
                            <p>Login</p>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="<?php echo(SOUS_DOMAINE."?page=signup") ?>">
                        <div>
                            <img src="static/headerFooter/signup.png" width=20 height=20/>
                            <p>S'inscrire</p>
                        </div>
                    </a>
                </li>
                <!--
                 <li>
                    <a href="<?php echo(SOUS_DOMAINE."?page=ajoutServices") ?>">
                        <div>
                            <img src="static/headerFooter/addServices.png" width=21/>
                            <p>Contributeur</p>
                        </div>
                    </a>
                </li>-->
                <?php
            }
            else {
                ?>
                <li class="border_bottom">
                    <a href="<?php echo(SOUS_DOMAINE) ?>">
                        <div>
                            <img src="static/headerFooter/home.png" width=20 height=20/>
                            <p>Accueil</p>
                        </div>
                    </a>
                </li>
                <li class="border_bottom">
                    <a href="<?php echo(SOUS_DOMAINE."?page=recherche") ?>">
                        <div>
                            <img src="static/headerFooter/loupe.png" width=20 height=20/>
                            <p>Recherche</p>
                        </div>
                    </a>
                </li>
                <li class="border_bottom">
                    <a href="<?php echo(SOUS_DOMAINE."?page=servicesAffiche") ?>">
                        <div>
                            <img src="static/headerFooter/map.png" width=20 height=20/>
                            <p>Carte</p>
                        </div>
                    </a>
                </li>
               <!-- <li>
                    <a href="http://www.partage.org/">
                        <div>
                            <img src="static/headerFooter/share.png" width=21/>
                            <p>Partage</p>
                        </div>
                    </a>
                </li>-->
                <li class="border_bottom">
                    <a href="<?php echo(SOUS_DOMAINE."?page=profil") ?>">
                        <div>
                            <img src="static/headerFooter/Profil.png" width=20 height=20/>
                            <p>Mon Profil</p>
                        </div>
                    </a>
                </li>
                <li class="border_bottom">
                    <a href="<?php echo(SOUS_DOMAINE."?page=ajoutServices") ?>">
                        <div>
                            <img src="static/headerFooter/addServices.png" width=20 height=20/>
                            <p>Contributeur</p>
                        </div>
                    </a>
                </li>
               <!-- <li>
                    <a href="https://fr.wikipedia.org/wiki/Param%C3%A8tre">
                        <div>
                            <img src="static/headerFooter/engrenages_1.png" width=21/>
                            <p>Paramètres</p>
                        </div>
                    </a>
                </li>-->
                <li>
                    <a href="<?php echo(SOUS_DOMAINE."?page=logout") ?>">
                        <div>
                            <img src="static/headerFooter/logout.png" width=20 height=20/>
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
      <?php include($path); ?>
    </div>
    
    <footer>
        <ul>
            <li> <a href=<?php echo(SOUS_DOMAINE."?page=planDuSite") ?>> Plan du Site </a> </li>
            <li> <a href=<?php echo(SOUS_DOMAINE."?page=contact") ?>> Contact </a> </li>
            <li> <a href=<?php echo(SOUS_DOMAINE."?page=enSavoirPlus") ?>> En savoir plus </a> </li>
            <li> <a href=<?php echo(SOUS_DOMAINE."?page=FAQ") ?>> FAQ </a> </li>
        </ul>
        <ul id="copyright">
            <li> ©Error404 </li>
        </ul>
    </footer>
  </body>
</html>