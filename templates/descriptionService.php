<head>
  <link rel="stylesheet" type="text/css" href="static/descriptionService/descriptionService.css"> <!-- Attention à bien remplacer le lien vers le fichier CSS -->
  <meta charset="utf-8" />
  <title>Test</title>
</head>

    <main>
      <div id="EnTete">
          <div id="h"> Médecin Sans Frontière <br> Page de Service </div>
      </div>

      <section id="Service">
        <div id="IconeCategorie"> </br> <img src=<?php echo "media/pictogrammes/".$contact["categorie"].".png"  ?> width="50" height="50"> </div> <!-- Icone du service -->
        <div id="b1">
          <div id="t1"> <?php echo $contact["nom"] ?> </div> <!-- Nom du service !-->
          <article>
            <h1> Description du Service:</h1>
            <div id="Description">
              <div id="alinea">
                <?php echo $description["texte"] ?> </br>
                Note: <?php echo $noteService[0]?>
              </div>
            </div>
            <h1>Nous Joindre:</h1>
            <div id="Contact">
              Adresse: <?php echo $contact["adresse"] ?> </br> <?php echo $contact["codePostal"] ?>
              Numéro de téléphone: <?php echo $contact["telephone"] ?> </br>
              Mail: <?php echo $contact["email"]; ?> </br>
              <a id="Mail" href="<?php echo $contact["lien_site"]; ?>"> Notre Site </a>
            </div>
            <?php if ($login==1){ ?>
              <form action="" method="post" id="formulaireFavoris">
                <input type="submit" value="<?php if (!$isFavoris){
                  echo 'Ajouter aux Favoris';
                }
                else{
                  echo 'Supprimer des Favoris';
                } ?>" name="validerFavoris" id="validerFavoris"/>
              </form>
            <?php } ?>
            <h1>Les séances à venir:</h1>
            <form action="" method="post" id="formulaireCommentaire">

              <table>
                <thead>
                  <tr>
                    <td>Date</td>
                    <td>Heure</td>
                    <td>Nom</td>
                    <td>Description</td>
                    <!-- <td>Type de Service</td> -->
                    <td>Nombre d inscrits</td>
                    <td>Capacité de l'évènement</td>
                    <!--<td>Note de la séance</td>-->
                    <!--<td>Satisfaction</td> -->
                    <?php if ($login==1){ ?> <td>Inscription</td> <?php } ?>
                  </tr>
                </thead>
                <tbody>
                  <?php for ($index=0;$index<$longueur;$index ++){
                    if($seances[$index]["date"]>=date("Y m d")){ ?>
                      <tr>
                        <td> <?php echo $seances[$index]["date"]; ?> </td>
                        <td> <?php echo $seances[$index]["heure"]; ?> </td>
                        <td> <?php echo $seances[$index]["nom"]; ?> </td>
                        <td> <?php echo $seances[$index]["description"]; ?> </td>
                        <!-- <td> <?php /* echo $seances[$index][2] */ ?> </td> -->
                        <td> <?php foreach($lesInscrits as $element){
                          if($seances[$index]["idSeance"]==$element["idSeance"]){
                            echo $element["count(*)"] ;
                          }
                        }?> </td>
                        <td><?php echo $seances[$index]["capacite"];?></td>
                        <!-- <td><?php /* if(!empty($notesSeances[$index])){
                          echo $notesSeances[$index];
                        } */?></td> -->
                        <!-- <td> <?php /* echo $satisfaction[0][$index] */?> </td> -->
                        <?php if ($login==1){ ?> <td><?php
                        $check = false;
                        foreach ($estInscrit as $element){
                          if ($element["idSeance"]==$seances[$index]["idSeance"]){
                            $check = true;
                          }

                        }
                        if ($check){
                          echo ('<input type="checkbox" name="inscription[]" value="'.$seances[$index]["idSeance"].'" checked="checked"/>') ;
                        }
                        else{
                          echo ('<input type="checkbox" name="inscription[]" value="'.$seances[$index]["idSeance"].'"/>') ;
                        }/*echo($check ? "Inscrits" : "Non inscrits");*/
                        ?></td> <?php } ?>
                      </tr>
                    <?php }
                   } ?>
                </tbody>
              </table>

              <?php if ($login==1){ ?> <input type="submit" name="validerInscript" value="Valider"/> <?php } ?>
            </form>


            <h1>Historique des séances:</h1>
            <table>
              <thead>
                <tr>
                  <td>Date</td>
                  <td>Heure</td>
                  <td>Nom</td>
                  <td>Description</td>
                  <td>Nombre d inscrits</td>
                  <td>Capacité de l'évènement</td>
                </tr>
              </thead>
              <tbody>
                <?php for ($index=0;$index<$longueur;$index++){
                  if($seances[$index]["date"]<date("Y m d")){ ?>
                    <tr>
                      <td> <?php echo $seances[$index]["date"]; ?> </td>
                      <td> <?php echo $seances[$index]["heure"]; ?> </td>
                      <td> <?php echo $seances[$index]["nom"]; ?> </td>
                      <td> <?php echo $seances[$index]["description"]; ?> </td>
                      <td> <?php foreach($lesInscrits as $element){
                        if($seances[$index]["idSeance"]==$element["idSeance"]){
                          echo $element["count(*)"] ;
                        }
                      }?> </td>
                      <td><?php echo $seances[$index]["capacite"];?></td>

                    </tr>
                  <?php }
                 } ?>
              </tbody>
            </table>

            <article id="Commentaires"> <!<!-- ATTENTION AU S DE Commentaire -->
              <div id="commentairesTitre">Commentaires</div>
              <form action="" method="post" id="censureCommentaire">

                <?php for ($index=0;$index<$longComment;$index ++){
                  if($commentaires[$index]["censure"]==0){ ?>
                    <article id="Commentaire">

                      <aside id="Avatar">
                        <?php echo date("d/m/Y ", strtotime($commentaires[$index]["date"])); ?> </br>
                        <img src="<?php echo "media/avatars/".$profil[$index]["avatar"]?>" width="75" height="75"/> <?php /* echo <img src="???"+$commentaires[?] width="50" height="50"> */ ?>
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
                              while ($index2<=$note){ ?>
                                <img src="static/descriptionService/etoileRouge.png" width="30" height="30">
                                <?php $index2++;
                              }
                            if ($note>=((int)$note+0.5)){ ?>
                              <img src="static/descriptionService/demiEtoileRouge.png" width="15" height="30">
                            <?php } ?>
                          </p>
                        </div>

                        <?php if($admin){
                          if ($commentaires[$index]["censure"]==0){
                            echo '<input type="submit" name="censureCommentaire'.$commentaires[$index]["idCommentaire"].'" value="Masquer le Commentaire"/>';
                          }
                          else{
                            echo '<input type="submit" name="rehabiliterCommentaire'.$commentaires[$index]["idCommentaire"].'" value="Afficher le Commentaire"/>';
                          }
                        }?>
                      </div>
                    </article>
                  <?php }
                } ?>

              </form>

              <?php if ($login==1){ ?>
                <article id="Commentaire">
                  <aside id="Avatar">
                    <img src=<?php echo "media/avatars/".$profilSession["avatar"]?> width="75" height="75">
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
                        <input type="submit" name="valider" value="Valider">
                      </div>
                    </form>

                </article>
              <?php } ?>



            </article>
          </article>
        </div>
        <div id="vide">  </div>
      </section>

    </main>
