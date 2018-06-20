var route = "http://127.0.0.1:8000/";

function activaDesactivaFiltro(checked) {

	//alert($("#token_info").val());
	
	$.ajax({
		url: route + 'setcheckbox',
		headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
		type: 'POST',
		dataType: 'json',
		data: {checked: checked},
	    processData: true,
	    success: function (response) {
	    	//alert(response.mensaje);
	    	location.reload();
	    },
	    error: function(jqXHR, textStatus, errorThrown) {
	        /*console.log(JSON.stringify(jqXHR));
	        console.log("AJAX error: " + textStatus + ' : ' + errorThrown);*/
	    }
	});
}