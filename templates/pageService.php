<!DOCTYPE html>
<html>

    <head>
	    <meta charset="utf-8" />
	    <title>Médecin sans frontière</title>


	    <link rel="stylesheet" href="static/Services/pageService.css" />
    </head>
    <table>
    	<tr>
    		<th>mon compte</th>
    		<th>recherche de service</th>
    		<th>connexion</th>
    	</tr>
    </table>
    <nav>

    	<ul>
    		<li>page d'acceuil</li>
    		<li>mon compte</li>
    		<li>recherche de service</li>
    		<li>se déconnecter</li>
    		<li>Retour au résultat de la recherche</li>
    	</ul>


    </nav>
    <!--4 gros blocs a créer +1 barre en haut-->
    <!--faire de barres de recherches aussi-->

    <body>

    	<p>veuilles entrer les informations relatives à votre service </p>
   		<form method="post" action="C:\Users\Baudouin\Documents\MSF\controllers\traitement.php" >
   			
            <label>Nom de votre service: <input type="text" name="nom"/></label><br/>
            <!--<?php 
            if(empty($_POST['nom']))
            {
                echo"Ce champ est obligatoire";
                <div 

            }
            ?>-->
    		<p>Les catégories de services que vous proposez</p>
    		<select>
    			<option value="..." selected>...</option>
    			<option value="nourriture">Nourriture</option>
    			<option value="logement">HLM</option>
    			<option value="Formalités administrative">Formalités administrative</option>
    			<
    			<option value="accompagnement médical">Accompagnment médical</option>

    		</select>

    		<p>Les moyens de vous contacter</p>
            <label>Mail: <input type="Mail" name="mail"/></label><br/>
            <label>Téléphone: <input type="tel" name="telephone"/></label><br/>
            <label>Site Internet: <input type="url" name="site"/></label><br/>

    		<p>Conditions pour accéder aux services</p>
    		<p>La localisation de votre service</p>
            <label>Adresse: <input type="texte" name="adresse"/></label><br/>

   			
   			<label>Charactéristiques de votre service:</label><br/><textarea name="ameliorer" id="ameliorer" placeholder="Entrer une description de votre service"></textarea></form><br/>
   			
   			
   			</p>
   			<input type ="submit" value="Envoyer"/>


    	</form>
        <!--<?php
        $nom=mysql_real_escape_string(htmlspecialchars($_POST['nom']));
        mysql_query("INSERT INTO Descriptions VALUES('','$nom','','','')");
        ?>-->
        
            


    </body>

    <footer>

    </footer>


</html>