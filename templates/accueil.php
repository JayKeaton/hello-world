<?php


ob_start();
?>
<link rel="stylesheet" href="static/accueil/accueil.css" />
<h1 id="myTitle">Pour <strong>VOUS</strong></h1>
<h3 id="LittleTitle">Par le groupe Error 404</h3>
<p id="description">MSF a été créé pour contribuer à la protection de la vie et à l'allégement des souffrances en respect de la dignité humaine. MSF apporte des soins à des personnes en situation précaire et travaille à leur permettre de reprendre le contrôle sur leur futur.<br/></p>
<section id="articles">
	<div id="presentation">
		<h2>Fonctionnalités:</h2>
		<p>
		-services classés par catégories: onglets où dormir, où manger, où se faire soigner, où trouver une aide juridique, des vêtements, des services administratifs dédiés, etc. <br/>
		- services classés par proximité géographique<br/>
		-Affichage des services en liste, ou par carte
		-Langues: français,anglais, arabe, farsi + API traduction Google<br/>
		-Géolocalisation pour repérer les services d’aide lien vers Maps, Citymapper, etc.<br/>
		-Mode hors connexion<br/>
		-Partage via réseaux sociaux, etc.<br/>
		-Interface contributeur(particulier, ONG) avec login/mot de passe: permet d’ajouter un service à proposer<br/>
		Interface super admin avec login/mot de passe pour vérifier l'authenticité des informations saisies.<br/>
		-Le projet est fait en Open Source<br/></p>
	</div>
	<div id = "recherche">
		<h1>Recherche de services</h1>
    	<form action="" method="POST" id="form">
    		<div class="element">
    			<p>Que recherchez-vous ?</p>
	    		<select name="categorie" id="categorie">
	    			<option name="soins">Soins</option>
	    			<option name="nourriture">Nourriture</option>
	    			<option name="logement">Logement</option>
	    			<option name="aide_juridique">Aide juridique</option>
	    			<option name="services_administratifs">Services administratifs</option>
	    			<option name="vetements">Vêtements</option>
	    		</select>
	    		<p>   <a href="https://www.google.fr/advanced_search">Recherche Avancée</a></p>
    		</div>
    		<div class="element">
	   			<p>Quel lieu?</p>
	   			<input type="text" name="adresse" id="adresse" /><br/>			   
	   			<input type="checkbox">Geolocalisation</input>
	   		</div>
    		<div class="element">
    			<input type="submit" value="Go!"/>
    		</div>
    	</form>
    </div>
	<div id="contenu">
		<p><a href="https://soutenir.msf.fr/b/mon-don?esv_source=Google&esv_medium=sea_brand&esv_campaign=W%2A%2AW00001&esv_term=msf&gclid=COKwx8uJvdMCFccp0wodkDMP4Q">
				<div id="article 2" class="article">
					Nom random 1 - 643m<br/>
					<img src="static/accueil/msf_logo _fichiers/maison.jpeg" width=240 class="floatl" title="photo non contractuelle"/>
						Peut-être votre futur logement?<br/>.........................<br/>
		...<br/>...............................
		..............................................<br/><br/><br/>
			DESCRIPTION
				</div>
			</a>
		</p>
		<p><a href="http://www.lecrystalparis.com/menu.html#mix">
				<div id="article 1" class="article">
					<figure>
						<img src="static/accueil/msf_logo _fichiers/Worlds-Largest-Pizza.jpg" width=240 class=floatl title="photo non contractuelle" />
						<figcaption>Repas à partager en famille<br/>.........................<br/>
							...<br/>...............................
							...........................................<br/><br/><br/></figcaption>
					</figure>
				</div>
			</a>
		</p>
		<br/><br/><br/><br/><br/>
	</div>
	<div id="fil_actu">
		<h3>Actu 1</h3><p>Blablabla<br/>BlablablaBlablablaBlablabla<br/>BlablablaBlablabla<br/></p>
		<h3>Actu 2</h3><p>Blablabla<br/>BlablablaBlablablaBlablabla<br/>BlablablaBlablabla<br/></p>
		<h3>Actu 3</h3><p>Blablabla<br/>BlablablaBlablablaBlablablabla<br/>BlablablaBlablabla<br/></p>
	</div>
</section>	
	

<nav id="partage">
	
	<ul>
		<li><a href="https://www.facebook.com/"><img src="static/accueil/msf_logo _fichiers/fb_32x32.png" title="Poke-nous sur Facebook!"/></a>
		</li>
		<li><a href="https://twitter.com/?lang=fr"> <img src="static/accueil/msf_logo _fichiers/twitter_32x32.png" title="RT si t'es src!"/></a></li>
		<li><a href="https://plus.google.com/?hl=fr"><img src="static/accueil/msf_logo _fichiers/gplus_32x32.png" title="Nous aussi, on croyait que ça avait disparu"> </a></li>
		
		<li><a href="https://www.instagram.com/?hl=fr"> <img src="static/accueil/msf_logo _fichiers/instagram.png" title="Envoie-nous ce que tu manges, ça nous intéresse!"/></a></li>
		<li><a href="https://www.snapchat.com/l/fr-fr/"> <img src="static/accueil/msf_logo _fichiers/snapchat-40x40.png" title="404SkillNotFound sur Snap! ;)"/></a></li>
		<li><a href="https://www.tumblr.com/"> <img src="static/accueil/msf_logo _fichiers/tumblr.jpeg" title="Si t'es un vrai, retrouve-nous sur Tumblr!"/></a></li>
		<li><a href="https://fr.pinterest.com/"> <img src="static/accueil/msf_logo _fichiers/pinterest.png" title="Si tu n'as rien de mieux à faire, tu peux nous piner sur Pinterest..."/></a></li>
		<li><a href="https://www.reddit.com/"> <img src="static/accueil/msf_logo _fichiers/reddit-up.png" title="Une suggestion concernant le développement de l'application? C'est par ici!"/></a></li>
		<li><a href="https://www.youtube.com/watch?v=_wzGjMw6N-E"> <img src="static/accueil/msf_logo _fichiers/You_Tube_moche.png" title="Viens voir la sextape de ta maman!"/></a></li>
		<!--<li><a href=""> <img src="msf_logo _fichiers/" title="un truc utile"/></a></li>" </form-->
	</ul>
</nav>

<?php
$contenu = ob_get_clean();

include("gabarit.php");