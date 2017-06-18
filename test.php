<?php


$form = new Formulaire('test');
$form->add('text', 'coordsA');
$form->add('text', 'coordsB');
$form->set_values($_POST);

echo("</br></br></br></br></br></br>");




if ($form->isValid()){
    $data = $form->get_cleaned_values();
    $coords = explode(',', $data['coordsA']);
    $coordsA = array();
    $coordsA['lat'] = $coords[0];
    $coordsA['lon'] = $coords[1];
    $coords = explode(',', $data['coordsB']);
    $coordsB = array();
    $coordsB['lat'] = $coords[0];
    $coordsB['lon'] = $coords[1];
    print_r($coordsA);
    print_r($coordsB);
    $distance = distance($coordsA, $coordsB);
    echo($distance);
}



echo("<form action='' method='POST'>");
$form->echoInput('coordsA');
$form->echoInput('coordsB');
$form->submit();
echo("</form>");

?>
<div id="infoposition"></div>
<script>
    if(navigator.geolocation) {
        console.log("true");
    } else {
        console.log("false");
    }

    function maPosition(position) {
        var infopos = "Position déterminée :\n";
        infopos += "Latitude : "+position.coords.latitude +"\n";
        infopos += "Longitude: "+position.coords.longitude+"\n";
        infopos += "Altitude : "+position.coords.altitude +"\n";
        document.getElementById("infoposition").innerHTML = infopos;
    }

    if(navigator.geolocation)
        navigator.geolocation.getCurrentPosition(maPosition);
</script>
