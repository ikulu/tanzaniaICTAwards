$(document).ready(function(){
	$('#data_table').Tabledit({
		deleteButton: false,
		editButton: false,   		
		columns: {
		  identifier: [0, 'id'],                    
		  editable: [[1, 'cname']]
		},
		hideIdentifier: true,
		url: 'live_edit.php'		
	});
});