<!Doctype html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="static/headerFooter/headerFooter.css"> <!-- Attention à bien remplacer le lien vers le fichier CSS -->
  <meta charset="utf-8" />
  <title>HeaderFooter</title>
</head>

  <body>

    <header>
      <div id="rouge">  </div> <!-- Sert à créer la bande rouge à gauche de l'image -->
          <div id="imageBanniere"> <a href="http://hugobriet.000webhostapp.com/?page=accueil">
            <img src="static/headerFooter/msf2.jpeg" width="120" height="80"/>
            </a> </div>
          <ul>
            <a href="http://www.msf.fr/"><li><div><img src="static/headerFooter/home.png" width=21  /><br/>Accueil</div></li></a>
            <a href="https://www.google.fr/advanced_search"><li><div>
            <img src="static/headerFooter/loupe.png" width =21/><br/>Recherche
          </div></li></a>
            <a href="http://www.partage.org/"><li><div>
            <img src="static/headerFooter/share.png" width=20/>
            <br/>Partage</div></li>
          </a>
          <a href="https://www.profilplus.fr"><li><div><img src="static/headerFooter/Profil.png" width=21/>
            <br/>Mon Profil</div></li></a>
          <a href="https://fr.wikipedia.org/wiki/Param%C3%A8tre">
            <li><div><img src="static/headerFooter/engrenages_1.png"width=20><br/>Paramètres</div></li></a>        
          </ul>
    </header>


    <div>
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

