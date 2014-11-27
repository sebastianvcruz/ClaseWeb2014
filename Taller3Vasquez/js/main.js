


function iniciarGMap(r){
	var mapOptions = {
		//Bogota
		center: new google.maps.LatLng(4.638007767332441, -74.08868197021481),
		zoom: 11,
		mapTypeId: google.maps.MapTypeId.ROADMAP
	};
	var map = new google.maps.Map(document.getElementById("map_canvas"),
		mapOptions);

	var infowindow = new google.maps.InfoWindow();
	//poner los markers
	for(i = 0;i<nombres.length;i++){
		var marcador=new google.maps.Marker({
			position: new google.maps.LatLng(latitudes[i],longitudes[i]),
			map:map
		});
		var infowindow = new google.maps.InfoWindow();
	}
}



function iniciar(){

   	//DRAG AND DROP
   	var imagenes=document.querySelectorAll('#iconos > img');
   	for(var i=0; i<imagenes.length;i++){
   		imagenes[i].addEventListener('dragstart',arrastrado,false);
   		imagenes[i].addEventListener('dragend',finalizado,false)
   	}
   	soltar=document.getElementById('lienzo');
   	lienzo=soltar.getContext('2d');
   	soltar.addEventListener('dragenter',entrando,false);
   	soltar.addEventListener('dragleave',saliendo,false);
   	soltar.addEventListener('dragover',function(e){
   		e.preventDefault();},false);

   	soltar.addEventListener('drop', soltado, false);
   }

   var llego=false;
   //DRAG AND DROP
   function entrando(e){
   	e.preventDefault();
   	llego=true;
   }

   function saliendo(e){
   	e.preventDefault();
   	soltar.style.background='#FFFFFF';

   }

   function finalizado(e){
   	elemento=e.target;
   	if(llego==true){
   		elemento.style.visibility='hidden';
   	}
   }

   function arrastrado(e){
   	elemento=e.target;
   	e.dataTransfer.setData('Text',elemento.getAttribute('id'));
   	e.dataTransfer.setDragImage(e.target,0,0);
   }

// Variables para los puntos que se buscan en el mapa 
var nombres=[];
var latitudes=[];
var longitudes=[];
	//solicitud ajax de los puntos requeridos en el evento soltar 

	function soltado(e){
		e.preventDefault();
		var id=e.dataTransfer.getData('Text');
		var elemento=document.getElementById(id);
		console.log(id);
		var posX=e.pageX-soltar.offsetLeft;
		var posY=e.pageY-soltar.offsetTop;
		lienzo.drawImage(elemento,posX,posY);

		//usar API
		$.ajax({
			type: "POST",
			url: "api/buscarLoc.php",
			data: { marcador: id }
		}).done(function(){
			console.log("Solicitud enviada");

			// leer JSON
		}).success(function(result){
			console.log("Resultado: "+result);
			nombres = [];
			latitudes = [];
			longitudes = [];
			var conca=JSON.parse(result);
			console.log("nuemro de respuestasq: "+conca.temps.length);
			for(i=0;i<conca.temps.length;i++){
				nombres[i]=conca.temps[i].nom;
				latitudes[i]=conca.temps[i].lat;
				longitudes[i]=conca.temps[i].lon;
			}
			iniciarGMap();
		}).error(function(error){
			console.log("Error: "+ error);
		})
		
	}
	function reset(){
		document.getElementById("restaurante").style.visibility="visible";
		document.getElementById("parque").style.visibility="visible";
		document.getElementById("museo").style.visibility="visible";
		document.getElementById("hotel").style.visibility="visible";
		soltar.style.background='#FFFFFF';
		lienzo.clearRect(0, 0, 290, 287);

	}

	window.addEventListener('load',iniciar,false);



