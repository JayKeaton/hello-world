<head>
  <link rel="stylesheet" type="text/css" href="static/pageServiceAdmin/pageServiceAdmin.css"> <!-- Attention à bien remplacer le lien vers le fichier CSS -->
  <meta charset="utf-8" />
  <title>Test</title>
</head>

<main>
  <div id="EnTete">
      <div id="h"> Médecin Sans Frontière <br> Page d'ajout de séance </div>
  </div>
  <form action="" method="post" id="formulaireSeance">
    <label for="nom"> Nom: <input type="text" name="nom" id="nom"/> </br>
    <label for="description"> Description : <input type="text" name="description" id="description"/> </br>
    <label for="date"> Date : <input type="date" name="datepicker" id="date"/>
    <label for="heure"> Heure :<input type="time" name="heure" id="heure"/> </br>
    <label for="capacite"> Capacité : <input type="number" name="capacite" id="capacite"/> </br>
    <input type="button" value="Valider" name="valider" id="valider"/>
  </form>
</main>
