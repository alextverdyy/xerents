
var coordenadas;
function comprobarDisponibilidad(){
                    if(window.XMLHttpRequest) {
                        peticion_http = new XMLHttpRequest();
                    }
                    else if(window.ActiveXObject) {
                        peticion_http = new ActiveXObject("Microsoft.XMLHTTP");
                    }
					
					
					
                    
                    peticion_http.onreadystatechange = validaLogin;
                    peticion_http.open('post', 'https://api.eventful.com/json/events/search', true);
                    peticion_http.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                    peticion_http.send("app_key=rCR5P3ZZGndrHvpR&where="+coordenadas+"&page_size=100&within=25");
                    function validaLogin(){
                        if(peticion_http.readyState == 4) {
                            if(peticion_http.status == 200) {
                            var respuesta_json = peticion_http.responseText;
							var objeto_json = eval("("+respuesta_json+")");
                            console.log(objeto_json);
							if(objeto_json.total_items> 1){
                                document.getElementById("eventos").innerHTML = "";
                            for(var x = 0; x < 10; x++){
                                if(objeto_json.events.event[x].image!= undefined || objeto_json.events.event[x].image != null){
                           document.getElementById("eventos").innerHTML = document.getElementById("eventos").innerHTML + "\n"+objeto_json.events.event[x].title;
                           var pre = document.getElementById("eventos");
                           var img = document.createElement("img");
                           img.setAttribute("src",objeto_json.events.event[x].image.medium.url);
                           img.setAttribute("width","128px");
                           pre.appendChild(img);
                           }else{
                               document.getElementById("eventos").innerHTML = document.getElementById("eventos").innerHTML + "\n"+objeto_json.events.event[x].title;
                           }
                            }
                           }else{
                               alert("corto");
                               document.getElementById("eventos").innerHTML = objeto_json.events.event.title;
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
					console.log(coordenadas);

				  };

				  function error() {
					alert("No se puede coger tu posicion");
				  };
					navigator.geolocation.getCurrentPosition(success, error);
				}
			


