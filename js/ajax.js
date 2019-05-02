
function ajaxUpdate(data, id, model) {
	$.ajax({
		type: "POST",
		url : `${g.SROOT}boards/update/${id}/${model}`,
		data : data,
		success : function(resp){
			if (resp) {
				console.log(resp);
			} else {
				console.log('error');
			}		
		},
		error: function() {
			console.log('error updating: ajaxUpdate');
		}
	});
}


function ajaxAdd(data, model){
	return new Promise(function(resolve, reject) {
		$.ajax({
			type: "POST",
			url : `${g.SROOT}boards/add/${model}`,
			data : data,
			success : function(resp){
				if (resp) {
					console.log(resp);
					data = JSON.parse(resp);
					resolve(data.lastInsertID);
				} else {
					reject();
				}
			},
			error: function() {
				console.log('error adding: ajaxAdding');
			}
		});							 
	});
	
}





function ajaxDelete(data, model){
	$.ajax({
		type: "POST",
		url : `${g.SROOT}boards/delete/${model}`,
		data : data,
		success : function(resp){
			if (resp) {
				console.log(resp);
			} else {
				console.log('error');
			}		
		},
		error: function() {
			console.log('error deleting: ajaxDelete');
		}
	});
}