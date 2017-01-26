
var coordenadas;
function mostrarEventos(){
    if(window.XMLHttpRequest) {
        peticion_http = new XMLHttpRequest();
    }
    else if(window.ActiveXObject) {
        peticion_http = new ActiveXObject("Microsoft.XMLHTTP");
    }
    peticion_http.onreadystatechange = sacarEventos;
    peticion_http.open('post', 'servicios/eventos.php',true);
    peticion_http.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    peticion_http.send("coordenadas="+coordenadas+"&pagina=1&nocache="+Math.random());

    function sacarEventos(){
        if(peticion_http.readyState == 4) {
            if(peticion_http.status == 200) {
                var respuesta_json = peticion_http.responseText;
                var objeto_json = eval("("+respuesta_json+")");
                var imagenes = document.getElementsByTagName("img");
                for(var x = 0; x < objeto_json.total_items; x++){
                    if(objeto_json.events.event[x].image.medium !== undefined){
                        //var titulo = document.createElement("h1");
                        //titulo.innerHTML = objeto_json.events.event[x].title;
                        for(var i = 0; i < imagenes.length; i++) {
                            imagenes[i].setAttribute("src", objeto_json.events.event[x].image.medium.url);
                            imagenes[i].setAttribute("width", "200px");
                        }
                        //var imagenes = document.getElementById("imagenes");
                        //imagenes.appendChild(titulo);
                        //imagenes.appendChild(imagen);
                    }
                }
            }
        }
    }
}

window.onload = function(){

    if (!navigator.geolocation){
        alert("La geolocalizacion no esta soportada en tu navegador");
        return;
    }

    function success(position) {
        var latitud  = position.coords.latitude;
        var longitud = position.coords.longitude;
        coordenadas = latitud + "," + longitud;
        //console.log(coordenadas);

    };

    function error() {
        alert("No se puede coger tu posicion");
    };
    navigator.geolocation.getCurrentPosition(success, error);
}



window.onload() = function () {
    mostrarEventos();
}