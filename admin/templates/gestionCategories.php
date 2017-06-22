

<link rel="stylesheet" type="text/css" href="static/gestionCategories/gestionCategories.css">



<h1>Gérer les catégories possibles des services :</h1>



<form action="" method="post">
    <div id="selectionCategorie">
        <p>Choisir une catégorie déjà existante :</p>
        <?php $form_categorie->echoInput('categorie'); ?>
    </div>
    <div>
        <p>Code de la catégorie :</p>
        <strong id="code"></strong>
    </div>
    <div>
        <p>Traduction de la catégorie :</p>
        <?php $form_categorie->echoInput('traduction'); ?>
    </div>
    <div>
        <?php $form_categorie->submit("Valider les modifications"); ?>
    </div>
    <div id="delete">
        <?php $form_categorie->submit("Supprimer cette categorie"); ?>
    </div>
</form>


<form action="" method="post">
    <h2>Ajouter une nouvelle catégorie</h2>
    <div>
        <p>Code :</p>
        <?php $form_ajouterCategorie->echoInput('code'); ?>
    </div>
    <div>
        <p>Traduction :</p>
        <?php $form_ajouterCategorie->echoInput('traduction'); ?>
    </div>
    <div>
        <?php $form_ajouterCategorie->submit("Ajouter cette categorie"); ?>
    </div>
</form>
















<script>
var listeCategories = [];
<?php
foreach($listeCategories as $categorie){
	echo('listeCategories['.$categorie['idCategorie'].'] = {code: "'.$categorie['code'].'",traduction: "'.$categorie['traduction'].'"};');
}
?>
function selectCategorie(){
	var code = document.getElementById('code');
	var traduction = document.getElementById('traduction');
	var idCategorie = document.getElementById('categorie').value;
	code.innerHTML = listeCategories[idCategorie]['code'];
	traduction.value = listeCategories[idCategorie]['traduction'];
}
document.getElementById('categorie').onchange = selectCategorie;
selectCategorie();
</script>
