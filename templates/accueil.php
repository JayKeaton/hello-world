<link rel="stylesheet" href="static/accueil/accueil.css" />
<h1 id="myTitle">SoliLink</h1>
<h3 id="LittleTitle">"Replacer le citoyen au coeur de l'action humanitaire"</h3>
<p id="description">MSF a été créé pour contribuer à la protection de la vie et à l'allégement des souffrances en respect de la dignité humaine. MSF apporte des soins à des personnes en situation précaire et travaille à leur permettre de reprendre le contrôle sur leur futur.<br/></p>
<section id="articles">
	
	<div id="presentation">
		<a href="<?php echo(SOUS_DOMAINE."?page=FAQ")?>"><h3 style='color:rgb(0,0,0);'>Fonctions:</h3></a>
		<p>
		-Services classés par catégories: onglets où dormir, où manger, où se faire soigner, où trouver une aide juridique, des vêtements, des services administratifs dédiés, etc. <br/>
		- services classés par proximité géographique<br/>
		-Affichage des services en liste, ou par carte
		-Langues: français, anglais, arabe, farsi + API traduction Google<br/>
		-Géolocalisation pour repérer les services d’aide lien vers Maps, Citymapper, etc.<br/>
		-Mode hors connexion<br/>
		-Partage via réseaux sociaux, etc.<br/>
		-Interface contributeur (particulier, ONG) avec login/mot de passe: permet d’ajouter un service à proposer<br/>
		Interface super admin avec login/mot de passe pour vérifier l'authenticité des informations saisies.<br/>
		-Le projet est fait en Open Source<br/></p>
	</div>
	<div class="margin">

	</div>
	<div id = "recherche">
		<h1>Recherche de services</h1>
    	<form action="" method="POST" id="form">
    		<div class="element">
    			Que recherchez-vous ?
    			
	    		<select type="categorie" id="categorie" name="categorie" />	    			
	    			<option name="" value=""<?php if($categorie=="") echo "selected"; ?>>Aucune catégorie sélectionée</option>
	    			<option name="" value="sante"<?php if($categorie=="sante") echo "selected"; ?>>Santé</option>
	    			<option name="" value="restauration"<?php if($categorie=="restauration") echo "selected"; ?>>Nourriture</option>
	    			<option name=""	value="logement"<?php if($categorie=="logement") echo "selected"; ?>>Logement</option>
	    			<option name=""	value="Aide juridique"<?php if($categorie=="Aide juridique") echo "selected"; ?>>Aide juridique</option>
	    			<option name=""	value="Services administratifs"<?php if($categorie=="Services administratifs") echo "selected"; ?>>Services administratifs</option>
	    			<option name=""	value="Vêtements"<?php if($categorie=="Vêtements") echo "selected"; ?>>Vêtements</option>
	    		</select>
	    		
    		</div>
    		<br/>
    		<div class="element">
	   			Quel lieu?
	   			<input type="adresse" id="adresse" name="adresse" value="<?php echo((empty($_POST['adresse'])) ? "" : $_POST['adresse']); ?>" placeholder="tapez une adresse" /></input>		   
	   			<input type="checkbox">Geolocalisation</input>
	   		</div>
	   		<br/>
    		<div class="element">
    			<input id="submit" class="submit" type="submit" action="" value="GO!"/></input>
    		</div>
    		<br/>
    		<div id="button">
    		<a href="<?php echo(SOUS_DOMAINE."?page=recherche")?>" ><input  class="button" type="button" value="Affiner mes critères de recherche"/></a>
			</div>    	
    	</form>
		<div id="contenu">
			<?php // print_r($data)?> 
			<?php for($i=0;$i<count($data);$i++){ ?>
				<p><a href="<?php echo(SOUS_DOMAINE."?page=descriptionService&idService=".$data[$i]["idService"]) ?>" >
						<div id="article 2" class="service">
							
							<img src="media/pictogrammes/<?php echo $data[$i]["categorie"]?>.png" width=200 class="floatl" title="Ce service affiche l'image par défaut de sa catégorie"/> </br>
							<?php echo $data[$i]["categorie"]?><br/>
							<h3><?php echo $data[$i]["nom"] ?></h3> </br>
							<?php echo $data[$i]["texte"] ?> </br>

							<div id="lienOrganisation"> <a href="<?php echo $data[$i]["lien_site"] ?>"><?php echo $data[$i]["lien_site"] ?></a></div> </br>
								<?php /*echo $dataSPECIALE[$i][DESCRIPTION] /*Peut-être votre futur logement?<br/>.........................<br/>
								...<br/>...............................
								..............................................<br/><br/><br/>
								DESCRIPTION  echo $dataSPECIALE[$i][NOTE]*/ ?>
						</div>
					</a>
				</p>
			<?php } ?>

		<!--<p><a href="http://www.lecrystalparis.com/menu.html#mix">
					<div id="article 1" class="service">
						<figure>
							<img src="static/accueil/msf_logo _fichiers/Worlds-Largest-Pizza.jpg" width=240 class=floatl title="photo non contractuelle" />
							<figcaption>Repas à partager en famille<br/>.........................<br/>
								...<br/>...............................
								...........................................<br/><br/><br/></figcaption>
						</figure>
					</div>
				</a>
			</p>-->
			<br/><br/><br/><br/><br/>
		</div>
	</div>
	<div id="fil_actu">
		<h2>Fil d'actus<h2>
		<h3>Reboot Challenge</h3><p>Nous avons été sélectionnés pour présenter notre application devant le Reboot Challenge</p>
		<h3>MSF</h3>Notre partenariat avec MSF nous a permis d' être informés sur ls besoins réels despersonnes dans le besoin, et de développer notre application afin qu'elle réponde au lieux aux besoins des contributeurs<br/>
		<h3>Nuit de l'Info</h3><p> Nous sommes très heureux d'avoir participé à la nuit de l'Info, cela fut une belle expérience, et le début d'un projet prometteur avec MSF<br/></p>
	</div>
</section>	
	<br/>

<nav id="partage">
	<ul>
		<li><a href="https://www.facebook.com/"><img src="static/accueil/msf_logo _fichiers/Facebook.png" width=64 title="Facebook"/></a>
		</li>
		<li><a href="https://twitter.com/?lang=fr"> <img src="static/accueil/msf_logo _fichiers/Twitter1.png" width=64 title="RT si t'es content!"/></a></li>
		<li><a href="https://plus.google.com/?hl=fr"><img src="static/accueil/msf_logo _fichiers/Google+.png" width=64 title="Google +"> </a></li>
		
		<!--<li><a href="https://www.instagram.com/?hl=fr"> <img src="static/accueil/msf_logo _fichiers/instagram.png" title="Instagram"/></a></li>
		<li><a href="https://www.snapchat.com/l/fr-fr/"> <img src="static/accueil/msf_logo _fichiers/snapchat-40x40.png" title="404SkillNotFound sur Snap! ;)" width=32 /></a></li>
		<li><a href="https://www.tumblr.com/"> <img src="static/accueil/msf_logo _fichiers/tumblr.jpeg" title="Tumblr!"/></a></li>
		<li><a href="https://fr.pinterest.com/"> <img src="static/accueil/msf_logo _fichiers/pinterest.png" title="Pinterest"/></a></li>
		<li><a href="https://www.reddit.com/"> <img src="static/accueil/msf_logo _fichiers/reddit-up.png" title="Une suggestion concernant le développement de l'application? C'est par ici!"/></a></li>-->
		<li><a href="https://www.youtube.com/watch?v=_wzGjMw6N-E"> <img src="static/accueil/msf_logo _fichiers/YouTube.png" width=64 title="YouTube"/></a></li>
		<!--<li><a href=""> <img src="msf_logo _fichiers/" title="un truc utile"/></a></li>" </form>-->
	</ul>
</nav>