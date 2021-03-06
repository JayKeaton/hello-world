

<link rel="stylesheet" type="text/css" href="static/gestionCategories/gestionCategories.css">



<h1>Gérer les catégories possibles des services :</h1>



<form action="" method="post" enctype="multipart/form-data">
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
        <p>Icone de la catégorie :</p>
        <img style="display: none" src="" id="iconeCategorie" height="60" width="60"/>
        <input type="file" name="iconeCategorie" id="iconeCategorie"/>
        <?php echo((empty($erreur['iconeCategorie']) ? "" : "<p>".$erreur['iconeCategorie']."</p><br/>")); ?>
    </div>
    <div>
        <?php $form_categorie->submit("Valider les modifications"); ?>
    </div>
    <div id="delete">
        <?php $form_categorie->submit("Supprimer cette categorie"); ?>
    </div>
</form>


<form action="" method="post" enctype="multipart/form-data">
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
        <p>Icone :</p>
        <input type="file" name="iconeCategorie"/>
        <?php echo((empty($erreur['iconeCategorieAjout']) ? "" : "<p>".$erreur['iconeCategorieAjout']."</p><br/>")); ?>
    </div>
    <div>
        <?php $form_ajouterCategorie->submit("Ajouter cette categorie"); ?>
    </div>
</form>
















<script>
    var listeCategories = [];
    listeCategories[0] = {code: "",traduction: ""};
    <?php
    foreach($listeCategories as $categorie){
        echo('listeCategories['.$categorie['idCategorie'].'] = {code: "'.$categorie['code'].'",traduction: "'.$categorie['traduction'].'"};');
    }
    ?>
    function selectCategorie(){
        var code = document.getElementById('code');
        var traduction = document.getElementById('traduction');
        var idCategorie = document.getElementById('categorie').value;
        var iconeCategorie = document.getElementById('iconeCategorie');
        code.innerHTML = listeCategories[idCategorie]['code'];
        traduction.value = listeCategories[idCategorie]['traduction'];
        if (idCategorie == 0){
            iconeCategorie.src = "";
            iconeCategorie.style.display = "none";
        }
        else {
            iconeCategorie.src = "../media/pictogrammes/" + listeCategories[idCategorie]['code'] + ".png";
            iconeCategorie.style.display = "";
        }
    }
    document.getElementById('categorie').onchange = selectCategorie;
    selectCategorie();
</script>
