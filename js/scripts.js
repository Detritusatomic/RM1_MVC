$(document).ready(function(){
	$(document).on('click','#debug',function(){
		$(this).toggleClass('show');
	});
	$(document).on('input','#logs',function(){
		var logs=$('#logs').val();
		$.ajax({
			url:'ajax/loginAjax.php',
			type:'POST',
			data:{logs:logs},
			success:function(data){
				if(data.charAt(2)==1){
					if(data.indexOf('@')>-1){
						$('#logslabel').removeClass('red-text errorlogs logspseudo');
						$('#logslabel').addClass('teal-text successlogs logsmail');
						console.log('valide le mail')
					}else{
						$('#logslabel').removeClass('red-text errorlogs logsmail');
						$('#logslabel').addClass('teal-text successlogs logspseudo');						
						console.log('valide le pseudo')
					}
				}else{
					if(data.indexOf('@')>-1){
						$('#logslabel').removeClass('teal-text successlogs logspseudo');						
						$('#logslabel').addClass('red-text errorlogs logsmail');
						console.log('non valide le mail')
					}else{
						$('#logslabel').removeClass('teal-text successlogs logsmail');						
						$('#logslabel').addClass('red-text errorlogs logspseudo');
						console.log('non valide le pseudo')
					}
				}
			}
		});
	});
});