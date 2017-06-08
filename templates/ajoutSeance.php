<head>
  <link rel="stylesheet" type="text/css" href="static/ajoutSeance/ajoutSeance.css"> <!-- Attention à bien remplacer le lien vers le fichier CSS -->
  <title>Test</title>
</head>


<div id="EnTete">
    <div id="h"> Médecin Sans Frontière </br> Page d'ajout de séance </div>
</div>
<form action="" method="post" id="formulaireSeance">
  <label for="nom"> Nom: <input type="text" name="nom" id="nom"/> </br>
  <label for="description"> Description : <input type="text" name="description" id="description"/> </br>
  <label for="date"> Date : <input type="datepicker" name="date" id="date"/>
  <label for="heure"> Heure :<input type="time" name="heure" id="heure"/> </br>
  <label for="capacite"> Capacité : <input type="number" name="capacite" id="capacite"/> </br>
  <input type="submit" value="Valider" name="valider" id="valider"/>
</form>
