$(document).ready(function() {
	'use strict';


	$('.yii-softkomi-class-test').click(function() {

		var query = 'id_store=' + $(this).data('id');
		//var idModal = $(this).data('modalId');

		$.ajax({
			type: 'post',
			url: '?r=device/list',
			data: query,
			cache: true,
			processData: true,
			contentType: 'application/x-www-form-urlencoded',
		
			success: function(data) {
				$('.modal').find('.modal-body').html(data);
				$('.modal').modal('toggle');
			},

			error: function(data, status, xhr) {
				$('.modal').find('.modal-body').html('<p>Ошибка при выполнении запроса!</p>');
				$('.modal').modal('toggle');
			},
			statusCode: {
				404: function() {
					document.location.href = '/not-found';
				}
			}
		});
	});
});