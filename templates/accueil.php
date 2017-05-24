<!DOCTYPE html>
	<html>
		<head>
			<link rel="stylesheet" href="static/accueil/accueil.css" />
			<link rel="stylesheet" href="static/headerFooter/headerFooter.css" />
			<meta charset="utf-8"/>
			<title>Notre appli php</title>
			<link rel="icon" type="image/png" href="static/accueil/msf_logo _fichiers/MSF_logo.jpg" />
		</head>
		<body>
			
			<header>
			    <div id="rouge">  </div> <!-- Sert à créer la bande rouge à gauche de l'image -->
			    <div id="imageBanniere"> <a href="http://hugobriet.000webhostapp.com/?page=accueil">
			    	<img src="static/accueil/msf_logo _fichiers/msf2.jpeg" width="120" height="80"/>
			    	</a> </div>
			    <ul>
			    	<a href="http://www.msf.fr/"><li><div><img src="static/accueil/msf_logo _fichiers/home.png" width=21  /><br/>Accueil</div></li></a>
			    	<a href="https://www.google.fr/advanced_search"><li><div>
						<img src="static/accueil/msf_logo _fichiers/loupe.png" width =21/><br/>Recherche
					</div></li></a>
			    	<a href="http://www.partage.org/"><li><div>
						<img src="static/accueil/msf_logo _fichiers/share.png" width=20/>
						<br/>Partage</div></li>
					</a>
					<a href="https://www.profilplus.fr"><li><div><img src="static/accueil/msf_logo _fichiers/Profil.png" width=21/>
						<br/>Mon Profil</div></li></a>
					<a href="https://fr.wikipedia.org/wiki/Param%C3%A8tre">
						<li><div><img src="static/accueil/msf_logo _fichiers/engrenages_1.png"width=20><br/>Paramètres</div></li></a>			
					
			    </ul>
   			</header>

			<h1 id="myTitle">Pour <strong>VOUS</strong></h1>
			<h3 id="LittleTitle">Par le groupe Error 404</h3>
			<p id="description">MSF a été créé pour contribuer à la protection de la vie et à l'allégement des souffrances en respect de la dignité humaine. MSF apporte des soins à des personnes en situation précaire et travaille à leur permettre de reprendre le contrôle sur leur futur.<br/></p>
				<div id="articles">
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
				    	<form action="controlers/accueil.php" method="post" id="form">
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
					    		<a href="https://www.google.fr/advanced_search"><div class="element">
				    			<input type="submit" value="Recherche avancée"/>
				    			</a>
				    		</div>
				    		<div class="element">
					   			<!--<p>Quel lieu?</p>
					   			<input type="text" name="adresse" id="adresse" /><br/>	-->
					   			<div>
							        <h4>Où chercher?</h4> 
							        <textarea id="adresse" name="adresse" value="<?php echo((empty($_POST['adresse'])) ? "" : $_POST['adresse']); ?>-+" placeholder="Entrez votre adresse ici"></textarea>
						    	</div>		   
					   			<!--<input type="checkbox">Geolocalisation</input>-->
					   		</div>
				    		<div class="element">
				    			<input type="submit" action="" value="Go!"/>
				    		</div>
				    	</form>
				    </div>
					<div id="contenu"><!--
						<? php
							



						 ?>-->
						<p><a href="https://soutenir.msf.fr/b/mon-don?esv_source=Google&esv_medium=sea_brand&esv_campaign=W%2A%2AW00001&esv_term=msf&gclid=COKwx8uJvdMCFccp0wodkDMP4Q">
								<div id="article 1" class="service">
									Nom random 1 - 343m<br/>
									<img src="static/accueil/msf_logo _fichiers/maison.jpeg" width=240 class="floatl" title="photo non contractuelle"/>
										La cabane au fond de mon jardin<br/>DESCRIPTION.........................<br/>
										...<br/>...............................
										..............................................<br/><br/><br/>
									Note:	4,4/5
								</div>
							</a>
						</p>
						<br/>
						<p><a href="http://www.lecrystalparis.com/menu.html#mix">
								<div id="article 2" class="service">
										Nom random 2 - Paris I -629 m <br/>
										<img src="static/accueil/msf_logo _fichiers/Worlds-Largest-Pizza.jpg" width=240 class=floatl title="photo non contractuelle" />
										Repas à partager en famille<br/>.........................<br/>
										...<br/>...............................
										...........................................<br/><br/><br/>
										Note:	4.8/5

								</div>
							</a>
						</p>
						<br/><br/><br/><br/><br/>
					</div>
				</div>
				<div id="fil_actu">
					<h3>Actu 1</h3><p>Blablabla<br/>BlablablaBlablablaBlablabla<br/>BlablablaBlablabla<br/></p>
					<h3>Actu 2</h3><p>Blablabla<br/>BlablablaBlablablaBlablabla<br/>BlablablaBlablabla<br/></p>
					<h3>Actu 3</h3><p>Blablabla<br/>BlablablaBlablablaBlablablabla<br/>BlablablaBlablabla<br/></p>
				</div>
			</div>	
				

			<nav id="partage">
				
				<ul>
					<li><a href="https://www.facebook.com/"><img src="static/accueil/msf_logo _fichiers/fb_32x32.png" title="Facebook"/></a>
					</li>
					<li><a href="https://twitter.com/?lang=fr"> <img src="static/accueil/msf_logo _fichiers/twitter_32x32.png" title="RT si t'es content!"/></a></li>
					<li><a href="https://plus.google.com/?hl=fr"><img src="static/accueil/msf_logo _fichiers/gplus_32x32.png" title="Google +"> </a></li>
					
					<li><a href="https://www.instagram.com/?hl=fr"> <img src="static/accueil/msf_logo _fichiers/instagram.png" title="Instagram"/></a></li>
					<li><a href="https://www.snapchat.com/l/fr-fr/"> <img src="static/accueil/msf_logo _fichiers/snapchat-40x40.png" width=32 title="404SkillNotFound sur Snap! ;)"/></a></li>
					<li><a href="https://www.tumblr.com/"> <img src="static/accueil/msf_logo _fichiers/tumblr.jpeg" title="Retrouve-nous sur Tumblr!"/></a></li>
					<li><a href="https://fr.pinterest.com/"> <img src="static/accueil/msf_logo _fichiers/pinterest.png" title="Pinterest"/></a></li>
					<li><a href="https://www.reddit.com/"> <img src="static/accueil/msf_logo _fichiers/reddit-up.png" title="Une suggestion concernant le développement de l'application? C'est par ici!"/></a></li>
					<li><a href="https://www.youtube.com/watch?v=_wzGjMw6N-E"> <img src="static/accueil/msf_logo _fichiers/You_Tube_moche.png" title="YouTube"/></a></li>
					<!--<li><a href=""> <img src="msf_logo _fichiers/" title="un truc utile"/></a></li>" </form-->
				</ul>
			</nav>
			<footer>
        		<ul>
	            	<li> <a href="http://hugobriet.000webhostapp.com/?page=accueil"> Plan du Site </a> </li>
	           		<li> <a href="http://hugobriet.000webhostapp.com/?page=accueil"> Contact </a> </li>
	            	<li> <a href="http://hugobriet.000webhostapp.com/?page=accueil"> En savoir plus </a> </li>
        		</ul>
        		<ul id="copyright">
            		<li> ©Error404 </li>
        		</ul>
    		</footer>
		</body>
	</html>
