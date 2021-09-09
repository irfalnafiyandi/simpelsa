

function validate($id,$url,$redirect){
	$($id).on('submit', function(event){
		event.preventDefault();


		$.ajax({
			url:$url,
			type: "POST",
			contentType: false,
			processData: false,
			enctype: 'multipart/form-data',
			data:new FormData(this),
			beforeSend:function(){
				$('#bsubmit').attr('disabled', 'disabled');
			},

			success: function(data)   // A function to be called if request succeeds
			{
				$data = data;
				if($data == ""){
					window.location.replace($redirect);
				}else{
					$('#result').append('<p><u>' + $data +'</u></p>');
					alert("Error : " + $data);
					$('#bsubmit').removeAttr('disabled', 'disabled');
				}
				$('#bsubmit').removeAttr('disabled', 'disabled');
			},

		})
	});
}

function validate_delete($url,$redirect){
		$.ajax({
			type: 'POST',
			url:  $url,
			contentType: 'application/json',
			error: function (err) {
				alert("error - " + err);
			},
			success: function (data) {
				$data = data;
				if($data == ""){
					window.location.replace($redirect);
				}else{
					alert("Error : " + $data + "");
				}
			}
		});
}

function validateurl($url,$redirect){
	$.ajax({
		type: 'POST',
		url:  $url,
		contentType: 'application/json',
		error: function (err) {
			alert("error - " + err);
		},
		success: function (data) {
			$data = data;
			if($data == ""){
				window.location.replace($redirect);
			}else{
				alert("Error : " + $data + "");
			}
		}
	});
}









