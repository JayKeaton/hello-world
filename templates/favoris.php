

<link rel="stylesheet" href="static/favoris/favoris.css"/>


  
  <?php
  $NbrColonne = 4;
  $NbrLigne = 0;

  if ($NbrData != 0) {
  	$j = 1; ?>
    <thead>
    <tr>
      <td>Nom</td>
      <td>Catégorie</td>
      <td>Site Internet</td>
    </tr>
    </thead>
  	<table border="1">
  	<tbody>
  <?php
  	foreach ( $rowAll as $row )
  	{
  		if ($j%$NbrColonne == 1) {
  			$NbrLigne++;
  			$fintr = 0;
  ?>		<tr>
  <?php		}
  ?>
  <td> <?php echo $row[1]; ?> </td>
  <td> <?php echo $row[2]; ?> </td>
  <td> <?php echo $row[3]; ?> </td>
  <td> <input type="checkbox" name="suppr" value="suppr">; </td>
  <?php		if ($j%$NbrCol == 0) {
  			$fintr = 1;
  ?>		
  </tr>
  <?php		}
  		$j++;
  	}
  	// dernière balise /tr
  	if ($fintr!=1) {
  ?>		</tr>
  <?php	} ?>
  	</tbody>
  	</table>
  <?php
  } else { ?>
    <div>
      <p>pas de favoris</p>
    </div>
  <?php
  }
  ?>

<form action="supprimerFavoris.php" method="post">
<p><input type="submit" value="supprimer"></p>
</form>
