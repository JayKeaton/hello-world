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
          <div id="h"> Médecin Sans Frontière <br> Page de Service </div>
      </div>

      <section id="Service">
        <div id="IconeCategorie"> <img src=<?php
          switch($contact["categorie"]){ /* Rajouter des Cases ici et des images dans Média/Pictogrammes/ pour couvrir plus de catégorie */
            case "logement":
              echo "Média/Pictogrammes/logement.png";
              break;
            case "connaissance":
              echo "Média/Pictogrammes/connaissance.png";
              break;
            case "soin":
              echo "Média/Pictogrammes/soin.png";
              break;
            case "nourriture":
              echo "Média/Pictogrammes/nourriture.png";
              break;
          }
        ?> width="50" height="50"> </div> <!-- Icone du service -->
        <div id="b1">
          <div id="t1"> <?php echo $contact["nom"] ?> </div> <!-- Nom du service !-->
          <article>
            <h1> Description du Service:</h1>
            <div id="Description">
              <div id="alinea">
                <?php echo $description["texte"] ?> </br>
                Note: <?php echo $note[0]?>
              </div>
            </div>
            <h1>Nous Joindre:</h1>
            <div id="Contact">
              Adresse: <?php echo $contact["adresse"] ?> </br> <?php echo $contact["codePostal"] ?>
              Numéro de téléphone: <?php echo $contact["telephone"] ?> </br>
              Mail: <?php echo $contact["email"]; ?> </br>
              <a id="Mail" href="<?php echo $contact["lien_site"]; ?>"> Notre Site </a>
            </div>
            <h1>Historique des services proposés:</h1>
            <table>
              <thead>
                <tr>
                  <td>Date</td>
                  <!-- <td>Type de Service</td> -->
                  <td>Nombre d inscrits</td>
                  <td>Satisfaction</td>
                </tr>
              </thead>
              <tbody>
                <?php for ($index=0;$index<$longueur;$index ++){ ?>
                  <tr>
                    <td> <?php echo $seances[$index]["date"] ?> </td>
                    <!-- <td> <?php /* echo $seances[$index][2] */ ?> </td> -->
                    <td> <?php echo $lesInscrits[$index+$seances[0][0]][0] ?> </td>
                    <td> <?php echo $satisfaction[0][$index] ?> </td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
            <h1>Commentaires</h1>
            <article id="Commentaires"> <!<!-- ATTENTION AU S DE Commentaire -->
              <?php for ($index=0;$index<$longComment;$index ++){ ?>
                <article id="Commentaire">
                  <aside id="Avatar">
                    <img src=<?php echo "Média/Avatars/".$profil[$index]["avatar"]?> width="75" height="75"> <?php /* echo <img src="???"+$commentaires[?] width="50" height="50"> */ ?>
                  </br> <div id="center"> <?php echo $profil[$index]["pseudo"] ?> </div> <!-- Pseudo de l'utilisateur !-->
                  </aside>
                  <div id="b2">
                    <article id="TexteComment">
                      <p>Commentaire:</p> <div id="alinea"> <?php echo $commentaires[$index]["texte"] ?> </div>
                    </article>
                    <div id="Note">
                      <p>Note:
                        <?php $note=$commentaires[$index]["note"];
                          $index2=1;
                          while ($index2<$note){ ?>
                            <img src="static/pageServiceAdmin/etoileRouge.png" width="30" height="30">
                            <?php $index2++;
                          }
                        if ($note>=((int)$note+0.5)){ ?>
                          <img src="static/pageServiceAdmin/demiEtoileRouge.png" width="15" height="30">
                        <?php } ?>
                      </p>
                    </div>
                  </div>
                </article>
              <?php } ?>



              <article id="Commentaire">
                <aside id="Avatar">
                  <img src=<?php echo "Média/Avatars/".$profilSession["avatar"]?> width="75" height="75">
                </br> <div id="center"> <?php echo $profilSession["pseudo"] ?> </div>
                </aside>

                  <form action="" method="post" id="formulaireCommentaire">
                    <article id="TexteComment">
                      <p>
                        <label for="texte"> Commentaire </label>: </br> <textarea type="text" id="text" name="text" placeholder="Votre Commentaire"></textarea>
                      </p>
                    </article>
                    <div id="Note">
                      <p>
                        <label for="note"> Note sur 5 </label>: </br> <input type="number" id="note" name="note" min=0, max=5, step=0.5 placeholder="/5"/>
                      </p>
                    </div>
                    <div>
                      <input type="submit" value="valider">
                    </div>
                  </form>

              </article>



            </article>
            <h1>Note du Contributeur:</h1>
            <article id="NoteContrib">
            </article>
          </article>
        </div>
        <div id="vide">  </div>
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
