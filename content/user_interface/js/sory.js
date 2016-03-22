$(document).ready(function(){
	$('#subscribe').click(function(){
		email = {
			email: $('#email').val()
		};

		$.ajax({
			type: 'post',
			data: email,
			url: 'http://ukrainianrealbrides.com/sory/email',
			dataType: 'json',
			success: function(data){
				if (data.result == 1){
					var url = 'http://ukrainianrealbrides.com/sorry_result';
					$(location).attr('href',url);
				}
			}
		});
	});
});