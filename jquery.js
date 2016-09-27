function callAPI() {
  var apiURL = "http://api.openweathermap.org/data/2.5/weather";//Definimos una variable con la URL
  var placeID = $("#id").val();
  console.log(placeID);
    $.get({ //a la funcion get de jquery, la llenamos con un objeto json. este funcion hace el llamado a la api automaticamente.
      url: apiURL,
      data: {
          id: placeID,
          appId: "38442bf3df9d7fdb004b10ceba923c38"
      },
      dataType : "json",
    }).done(function( json ) { //Definimos una funcion done, osea, que ocurre si el query sale bien
       console.log(json);
       $("#result").val("Nombre: " + json["name"] + "\n" + "Temperatura: " + Math.round(json["main"]["temp"] - 273) + "ºC \n" + "Humedad: " + json["main"]["humidity"] + "% \n" + "Velocidad del Viento: " + json["wind"]["speed"] + "km/h \n");
       $.post("/climaJQuery/pagclima.php", {"memoria": "Nombre: " + json["name"] + "\n"});

     // $_SESSION["memoria"] = "Nombre: " . $result[1][0] . ". ID: " . $id . "\n" . $_SESSION["memoria"]  ;
    })
    .fail(function( xhr, status, errorThrown ) { //Que ocurre si falla el query
      alert( "Sorry, there was a problem!" );
      console.log( "Error: " + errorThrown );
      console.log( "Status: " + status );
      console.dir( xhr );
    })
    .always(function( xhr, status ) { //Algo que ocurre siempre
      console.log("request completa");
    });


}