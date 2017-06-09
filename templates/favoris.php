

<link rel="stylesheet" href="static/favoris/favoris.css"/>

  <?php
  $NbrColonne = 3;
  $NbrLigne = 0;

  if ($NbrData != 0) {
  	$j = 1; ?>
    <table border="1">

    <thead>
    <tr>
      <td>Nom</td>
      <td>Catégorie</td>
      <td>Site Internet</td>
    </tr>
    </thead>
  	
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
  <td> <?php echo $row[0]; ?> </td>
  <td> <?php echo $row[1]; ?> </td>
  <td> <a href="<?php echo $row[2]; ?>"><?php echo $row[2] ?></a> </td>
  <?php		if ($j%$NbrColonne == 0) {
  			$fintr = 1;
  ?>		
  </tr>
  <?php		}
  		$j++;
  	}
  	// dernière balise /tr
  	if ($fintr!=1) {
  ?>
      </tr>
  <?php	} ?>
  	</tbody>
  	</table>
  <?php
  } else { ?>
    <div>
      <p>Vous n'avez pas encore de favoris</p>
    </div>
  <?php } ?>
