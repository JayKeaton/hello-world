



<?php $form_categorie->echoInput('categorie'); ?>
<?php $form_categorie->echoInput('code'); ?>
<?php $form_categorie->echoInput('traduction'); ?>





<script>
var listeCategories = [];
<?php
foreach($listeCategories as $code => $traduction){
	echo('listeCategories["'.$code.'"] = "'.$traduction.'";');
}
?>

function selectCategorie(){
	var code = document.getElementById('code');
	var traduction = document.getElementById('traduction');
	var categorie = document.getElementById('categorie').value;
	code.value = categorie;
	traduction.value = listeCategories[categorie];
}

document.getElementById('categorie').onchange = selectCategorie;

</script>
