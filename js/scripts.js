$(document).ready(function(){
	$(document).on('click','#debug',function(){
		$(this).toggleClass('show');
	});

	var $uploadCrop;

	function readFile(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			
			reader.onload = function (e) {
				$uploadCrop.croppie('bind', {
					url: e.target.result
				});
				$('.upload-demo').addClass('ready');
			}
			reader.readAsDataURL(input.files[0]);
		}
	}

	$uploadCrop = $('#crop_avatar').croppie({
		viewport: {
			width: 200,
			height: 200,
			type: 'circle'
		},
		boundary: {
			width: 200,
			height: 200
		},
		exif: true
	});
	$uploadCrop.croppie('bind',{url:$('#cropped_avatar').val()});


	$('#image_avatar').on('change', function () { readFile(this); });
	$('#valider_avatar').on('click', function (ev) {
		$uploadCrop.croppie('result', {
			type: 'canvas',
			size: 'viewport'
		}).then(function (resp) {
			$('#cropped_avatar').val(resp);
			$('#editprofilform').submit();
		});
	});
});