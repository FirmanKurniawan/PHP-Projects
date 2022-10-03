$(document).ready(function() {

	function searchMovie() {
		$('#list-movie').html('')

		$.ajax({
			url: 'http://www.omdbapi.com',
			type: 'GET',
			dataType: 'json',
			data: {
				apiKey: 'd538f133',
				s: $('#keyword').val()
			},
			success: function(result) {
				if(result.Response === 'True') {
					let movies = result.Search

					$.each(movies, function(index, data) {
						$('#list-movie').append(`
							<div class="col-sm-3 text-center mt-2">
								<div class="card">
								  <div class="card-header">
								    ${data.Title}
								  </div>
								  <div class="card-body">
								    <img src="${data.Poster}" alt="${data.Title}" width="200">
								    <p><strong class="badge badge-warning"><h5>${data.Type}</h5></strong></p>
								    <p class="card-text">${data.Year}</p>
								    <a href="#" class="btn btn-primary btn-sm detail-movie" 
								    	data-toggle="modal" 
								    	data-target="#detailMovie" data-id="${data.imdbID}">See detail</a>
								  </div>
								</div>
							</div>
						`)
					})

					$('#keyword').val('')

				} else {
					$('#list-movie').html(`
						<div class="col-sm-12">
							<p class="alert alert-danger">${result.Error}</p>
						</div>
					`)
				}
			}
		})
	}

	$('#search').click(function() {
		searchMovie()
	})

	$('#keyword').on('keyup', function(e){
		if(e.which === 13) {
			searchMovie()
		}
	})

	$('#list-movie').on('click', '.detail-movie', function() {
		let movieId = $(this).data('id')
		
		$.ajax({
			url: 'http://www.omdbapi.com',
			type: 'GET',
			dataType: 'json',
			data: {
				apiKey: 'd538f133',
				i: movieId
			}, 
			success: function(movie) {
				console.log(movie)
				if(movie.Response === 'True') {
					$('.modal-body').html(`
						<div class="row">
							<div class="col-sm-5">
								<img src="${movie.Poster}" class="img-fluid img-thumbnail" alt="${movie.Title}" />	
							</div>
							<div class="col-sm-7">
								<h3 class="text-title">${movie.Title}</h3>
								<p>${movie.Plot}</p>
							</div>
						</div>
					`)
				}
			}
		})
	})
})

