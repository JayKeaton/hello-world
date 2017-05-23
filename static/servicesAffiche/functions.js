var geocoder;
var map;
var labels = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
var labelIndex = 0;
var i = 0;
// initialisation de la carte Google Map de départ



function afficheServices(){
	for (var e in listeb){
		
    	var ligne = listeb[e];
		document.getElementById('servicesA').innerHTML+='<tr><td>'+labels[i]+'</td>'+'<td>'+ligne.nom+'</td>'+'<td>'+ligne.adresse+'</td>'+'<td>'+ligne.categorie+'</td>'+'<td>'+ligne.telephone+'</td>'+'<td><a href="/?page=servicesMaps&adresse='+ ligne.adresse +'">GO</a></td></tr>';
		i++;
	}
}



function initialiserCarte() {
  geocoder = new google.maps.Geocoder();
 
  var latlng = new google.maps.LatLng(48.855013, 2.372018);
  
	var mapOptions = {
    	zoom      : 12,
    	center    : latlng,
		snippet: 'test',
    	mapTypeId : google.maps.MapTypeId.ROADMAP
	}
	
	
	
  // map-canvas est le conteneur HTML de la carte Google Map
  map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
	
}
 
function TrouverAdresse() {
 
	//var iconBase = 'http://maps.google.com/mapfiles/ms/icons/';
	var url;
	
	for (var e in liste){
		
		
	/*	if(categorie=="soins")
			url= iconBase + 'red-dot.png';
		
		else if(categorie=="vetements")
			url= iconBase + 'green-dot.png';
		
		else
			url = iconBase + 'blue-dot.png';
		
		*/
	  	geocoder.geocode( { 'address': liste[e].localisation}, function(results, status) {
			

			if (status == google.maps.GeocoderStatus.OK) {
		  		map.setCenter(results[0].geometry.location);
		  		// Récupération des coordonnées GPS du lieu tapé dans le formulaire
		  		var strposition = results[0].geometry.location+"";
		  		strposition=strposition.replace('(', '');
		  		strposition=strposition.replace(')', '');
		  		// Création du marqueur du lieu (épingle)
		  		var marker = new google.maps.Marker({
			  		position: results[0].geometry.location,
			  		label:labels[labelIndex],
			  		map: map,
					animation:google.maps.Animation.DROP,
					title:liste[labelIndex].categorie

					//icon: url
		  });

				var contentString = liste[labelIndex].nom +"</br>"+liste[labelIndex].localisation +'</br><a href="/?page=servicesMaps&adresse='+ liste[labelIndex].localisation +'">GO</a>' ;
				var infowindow = new google.maps.InfoWindow({
          content: contentString
        });
				
				
				
			marker.addListener('click', function() {
          		map.setZoom(15);
          		map.setCenter(marker.getPosition());
		  		map.texte;
		  		infowindow.open(map, marker);
        });
			labelIndex++;
				
				//google.maps.event.trigger(polygon, "click", {});
				/*google.maps.event.addListener(marker, 'click', function(){
    marker.open(map,marker);
});*/
		} 
			else {
		  		alert('Adresse introuvable: ' + status);
		}
	  });
	}
	
}

// Lancement de la construction de la carte google map
if (navigator.geolocation)
  var watchId = navigator.geolocation.watchPosition(successCallback, null, {enableHighAccuracy:true});
                          
else
  alert("Votre navigateur ne prend pas en compte la géolocalisation HTML5");

google.maps.event.addDomListener(window, 'load', initialiserCarte);

function successCallback(position){
  map.panTo(new google.maps.LatLng(position.coords.latitude, position.coords.longitude));
  var marker = new google.maps.Marker({
    position: new google.maps.LatLng(position.coords.latitude, position.coords.longitude),
    map: map
  });
}

