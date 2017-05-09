<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Signup</title>
<link href="static/signup/style.css" rel="stylesheet" type="text/css">
</head>

<body>
	<h1 id="title">Veuillez renseigner vos informations pour completer l'inscription</h1>
    <h4 id="titlebis">Chez Error404, nous prenons à coeur la sécurité de vos données, et les données que vous entrez ne peuvent être utilisées que par nous, afin de garantir une meilleure utilisation de nos services.</h4>
   	<article id="remplissage">
    
    <form method="post" action="">

    <div id="flexto">

        <h4>Informations personnelles</h4> 
        	<label for="name">Nom: <span class="required">*</span>

        	</label>
		

        	<input type="text" id="name1" name="nom" value="<?php echo((empty($_POST['nom'])) ? "" : $_POST['nom']); ?>" placeholder="Votre nom" required="required" autofocus />
		
			<label for="name">Prenom: <span class="required">*</span>

        	</label>

        	<input type="text" id="name2" name="prenom" placeholder="Votre prénom" required="required" autofocus value="<?php echo((empty($_POST['prenom'])) ? "" : $_POST['prenom']); ?>"  />
		
    </div>

    <div>

        <h4>Contact</h4> 

        <label for="email">Email ou courriel: <span class="required">*</span>

        </label>

        <input type="email" id="email" name="email" value="<?php echo((empty($_POST['email'])) ? "" : $_POST['email']); ?>" placeholder="example@email.fr" required="required" />
        
        <label for="phone">Numéro de téléphone: <span class="required">*</span>

        </label>

        <input type="phone" id="phone" name="phone" value="<?php echo((empty($_POST['phone'])) ? "" : $_POST['phone']); ?>" required="required" />

    </div>



    <div>

        <h4>Mot de passe</h4> 

        <label for="password">Votre mot de passe: <span class="required">*</span>

        </label>

        <input type="password" id="password" name="mdp" value="" placeholder="" required="required" />
        
        <label for="password">Confirmation: <span class="required">*</span>

        </label>

        <input type="password" id="mdpv" name="mdpv" value="" placeholder="" required="required" />

    </div>

    <div>

        <h4>Autre</h4> 

        <label for="gender">Sexe:</label>

        <select id="gender" name="sexe" value="<?php echo((empty($_POST['sexe'])) ? "" : $_POST['sexe']); ?>">

            <option value="sexe1">Homme</option>

            <option value="sexe2">Femme</option>

            <option value="sexe3">Autre</option>

        </select>

    </div>



    <div>

        <h4>Adresse</h4> 

        <label for="message">Votre adresse:

        </label>

        <textarea id="adresse" name="adresse" value="<?php echo((empty($_POST['adresse'])) ? "" : $_POST['adresse']); ?>" placeholder="Entrez votre adresse ici"></textarea>

    </div>




    <div>

        <h4>Géolocalisation</h4>

        <label for="checkbox">Activer</label>

        <input type="checkbox" name="checkbox" value="<?php echo((empty($_POST['checkbox'])) ? "" : $_POST['checkbox']); ?>">



    </div>



    <div>

        <input type="submit" value="Suivant" id="submit" />

    </div>

</form>

    
    </article>
    


</body>
</html>
