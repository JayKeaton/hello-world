<!Doctype html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="static/pageServiceAdmin/pageServiceAdmin.css"> <!-- Attention à bien remplacer le lien vers le fichier CSS -->
  <meta charset="utf-8" />
  <title>Test</title>
</head>

    <header>
      <div id="rouge">  </div> <!-- Sert à créer la bande rouge à gauche de l'image -->
      <div id="imageBanniere"> <a href="http://hugobriet.000webhostapp.com/?page=accueil">
        <img src="msf2.jpeg" width="150" height="100">
      </a> </div>
      <ul>
        <li> <a href="http://hugobriet.000webhostapp.com/?page=accueil"> Partage </a> </li>
        <li> <a href="http://hugobriet.000webhostapp.com/?page=accueil"> Recherche </a> </li>
        <li> <a href="http://hugobriet.000webhostapp.com/?page=accueil"> Mon Profil </a> </li>
        <li> <a href="http://hugobriet.000webhostapp.com/?page=accueil"> Paramètres </a> </li>
        <li> <a href="http://hugobriet.000webhostapp.com/?page=accueil"> Accueil </a> </li>
      </ul>
    </header>


    <main>
      <div id="EnTete">
          <div id="h"> Médecin Sans Frontière <br> Page d'acceuil </div>
      </div>

      <section id="Service">
        <div id="IconeCategorie"> <img src="static/pageServiceAdmin/msf2.jpeg" width="50" height="50"> </div> <!-- Icone du service -->
        <div id="b1">
          <div id="t1">Nom du Service</div>
          <article>
            <h1> Description du Service:</h1>
            <div id="Description">
              <?php /* echo $description */ ?>
            </div>
            <h1>Nous Joindre:</h1>
            <div id="Contact">
              <?php /* echo $contact */ ?>
            </div>
            <h1>Historique des services proposés:</h1>
            <table>
              <thead>
                <tr>
                  <td>Date</td>
                  <td>Type de Service</td>
                  <td>Nombre d inscrits</td>
                  <td>Satisfaction</td>
                </tr>
              </thead>
              <tbody>
                <?php for ($index=0;$index<$longueur;$index ++){ ?>
                  <tr>
                    <td> <?php echo $seances[$index][1] ?> </td>
                    <td> <?php echo $seances[$index][2] ?> </td>
                    <td> <?php echo $seances[$index][3] ?> </td>
                    <td> <?php echo $seances[$index][4] ?> </td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
            <h1>Commentaires</h1>
            <article id="Commentaires"> <!<!-- ATTENTION AU S DE Commentaire -->
              <?php for ($index=0;$index<$longComment;$index ++){ ?>
                <article id="Commentaire">
                  <aside id="Avatar">
                    <img src="static/pageServiceAdmin/msf2.jpeg" width="50" height="50"> <?php /* echo <img src="???"+$commentaires[?] width="50" height="50"> */ ?>
                  </br>Nom de l'utilisateur <?php /* echo $commentaires[?] */ ?>
                  </aside>
                  <div id="b2">
                    <article id="TexteComment">
                      <p>Commentaire:</p> <?php /* echo $commentaires[?] */ ?>
                    </article>
                    <div id="Note">
                      <p>Note:</p>
                        <img id="Jauge" src="static/pageServiceAdmin/jauge5Stars.png" width="250" height="50"> <!-- style=" background: linear-gradient(to right, yellow, white 50%)" -->
                    </div>
                  </div>
                </article>
              <?php } ?>
            </article>
            <h1>Note du Contributeur:</h1>
            <article id="NoteContrib">
            </article>
          </article>
        </div>
      </section>

    </main>

    <footer>
      <ul>
        <li> <a href="http://hugobriet.000webhostapp.com/?page=accueil"> Plan du Site </a> </li>
        <li> <a href="http://hugobriet.000webhostapp.com/?page=accueil"> Contact </a> </li>
        <li> <a href="http://hugobriet.000webhostapp.com/?page=accueil"> En savoir plus </a> </li>
        <div id="copyright"> ©Error404 </div>
      </ul>
    </footer>

</html>
