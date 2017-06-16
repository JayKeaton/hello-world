<head>
  <link rel="stylesheet" type="text/css" href="static/gestionSeances/gestionSeances.css"> <!-- Attention à bien remplacer le lien vers le fichier CSS -->
  <title>Test</title>
</head>


<div id="EnTete">
    <div id="h"> Médecin Sans Frontière </br> Page de gestion de séance </div>
</div>

<h1>Ajouter une séance:</h1>
<form action="" method="post" id="formulaireSeance">
  <label for="nom"> Nom: <input type="text" name="nom" id="nom"/>
  <label for="description"> Description : <input type="text" name="description" id="description"/></br>
  <label for="date"> Date : <input type="datepicker" placeholder="YYYY-MM-DD" name="date" id="date"/>
  <label for="heure"> Heure :<input type="time" placeholder="HH:MM:SS" name="heure" id="heure"/> </br>
  <label for="capacite"> Capacité : <input type="number" name="capacite" id="capacite"/> </br>
  <input type="submit" value="Valider" name="valider" id="valider"/>
</form>


<h1>Séances à venir:</h1>
<table>
  <thead>
    <tr>
      <td>Date</td>
      <td>Heure</td>
      <td>Nom</td>
      <td>Description</td>
      <td>Nombre d inscrits</td>
      <td>Capacité de l'évènement</td>
      <td>Changer la séance</td>
    </tr>
  </thead>
  <tbody>
    <?php for ($index=0;$index<$longueur;$index++){
      if($seances[$index]["date"]>=date("Y m d")){ ?>
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
          <td>
            <form action="" method="post" id="formulaireSeance">
              <input type="submit" value="Supprimer la séance" name=<?php echo '"supprimerSeance'.$seances[$index]["idSeance"].'"' ?> id="supprimerSeance"/> </br>
              <input type="submit" value="Modifier la séance" name=<?php echo '"modifierSeance'.$seances[$index]["idSeance"].'"' ?> id="modifierSeance"/>
            </form>
          </td>
        </tr>
      <?php }
     } ?>
  </tbody>
</table>

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
