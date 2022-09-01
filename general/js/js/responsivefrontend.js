function fetchPlaceList(string){
	var games = $.ajax({
		method:"GET",
		url:"/general/jqueryResponsiveness/gamesGenre?genreType=" + string,
		cache:false
		}, 
	);
	games.done(function ( data ){
		$('#gamesList').html(data);
	});
}

function goPlace(id){
	window.location="/places/view?id=" + id;
}