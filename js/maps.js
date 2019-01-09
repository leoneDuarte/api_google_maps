var map;
 //FUNÇÃO QUE INICIALIZA MAPA
function initialize() {
    var latlng = new google.maps.LatLng('-20.2332352','-42.1654784'); 
    var options = {
        zoom: 16,
        center: latlng,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };
 
    map = new google.maps.Map(document.getElementById("mapa"), options);
}
 initialize();

//INSERE OS PONTOS A PARTIR DO ARQUIVO JSON
function carregarPontos() {
 
    $.getJSON('pontos.json', function(pontos) { 
        $.each(pontos, function(index, ponto) {
             var marker = new google.maps.Marker({
		    position: new google.maps.LatLng(ponto.Latitude, ponto.Longitude),
		    map: map,
		        icon: 'marcador.png',
            id: 'marker1', 
            });

            var contentString = 
              '<div id="content">dados da cordenada'+
              '<div id="siteNotice">'+
              '</div>'+
              '<h1 id="firstHeading" class="firstHeading"><?php printr($teste); ?>latitude: ' + ponto.Latitude+ 'longitude:' +ponto.Longitude+ '</h1>'+             
              '</div>';

            var infowindow = new google.maps.InfoWindow({
                content: contentString
            });

            marker.addListener('click', function() {
                infowindow.open(map, marker);
            });

 
        });

     });

}
 
carregarPontos();