var geocoder;
var map;
// initialisation de la carte Google Map de départ

function afficheServices(){
	for (var e in listeb){
    	var ligne = listeb[e];
	
		
		document.getElementById('servicesA').innerHTML+='<p>Localisation : '+ligne.localisation+'</p>';
		document.getElementById('servicesA').innerHTML+='<p>Categorie : '+ligne.categorie+'</p>';
		document.getElementById('servicesA').innerHTML+='<p>Phone : '+ligne.telephone+'</p>';
	}
}



function initialiserCarte() {
  geocoder = new google.maps.Geocoder();
  // Ici j'ai mis la latitude et longitude du vieux Port de Marseille pour centrer la carte de départ
  var latlng = new google.maps.LatLng(48.855013, 2.372018);
  var mapOptions = {
    zoom      : 14,
    center    : latlng,
    mapTypeId : google.maps.MapTypeId.ROADMAP
  }
  // map-canvas est le conteneur HTML de la carte Google Map
  map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
	
}
 
function TrouverAdresse() {
  // Récupération de l'adresse tapée dans le formulaire

	for (var e in liste){
    	var adresse = liste[e];
	
	  geocoder.geocode( { 'address': adresse}, function(results, status) {
		if (status == google.maps.GeocoderStatus.OK) {
		  map.setCenter(results[0].geometry.location);
		  // Récupération des coordonnées GPS du lieu tapé dans le formulaire
		  var strposition = results[0].geometry.location+"";
		  strposition=strposition.replace('(', '');
		  strposition=strposition.replace(')', '');
		  // Création du marqueur du lieu (épingle)
		  var marker = new google.maps.Marker({
			  map: map,
			  position: results[0].geometry.location,
			  title: "Test"
			  
		  });
		} else {
		  	alert('Adresse introuvable: ' + status);
		}
	  });
	}
	
}
// Lancement de la construction de la carte google map
google.maps.event.addDomListener(window, 'load', initialiserCarte);
