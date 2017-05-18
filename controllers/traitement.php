<!DOCTYPE html>
<html>
	<head>
		<title>Ma première page PHP </title>
	</head>
	<body>
	<?php
        $nom=mysql_real_escape_string(htmlspecialchars($_POST['nom']));
        mysql_query("INSERT INTO Descriptions VALUES('','$nom','','','')");
        ?>
	<?php echo "Votre service a bien été créé"; ?>
	
	
	</body>
</html>

