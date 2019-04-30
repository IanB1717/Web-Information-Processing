$(document).ready(function(){
	$("#view").click(function(event){
		event.preventDefault();
    	$.ajax({
		 	type:"GET",
		 	url: "../web-service/api.php/RL",
		 	data: $('#ViewB').serialize(),
		 	dataType: "text",
	      	success: function(result){
	        	$("#get_results").html(result);
			},
			error: function(result){
				$("#get_results").html(result);
			}
		});
	});
	$("#create").click(function(event){
		event.preventDefault();
		$.ajax({
		 	type:"POST",
		 	url: "../web-service/api.php/RL",
		 	data: $('#createB').serialize(),
		 	dataType: "text",
	      	success: function(result){
	        	$("#post_results").html(result);
			},
			error: function(result){
				$("#post_results").html(result);
			}
		});

    });
    $("#update").click(function(event){
		event.preventDefault();
		$.ajax({
		 	type:"PUT",
		 	url: "../web-service/api.php/RL",
		 	data: $('#UpdateB').serialize(),
		 	dataType: "text",
	      	success: function(result){
	        	$("#put_results").html(result);
			},
			error: function(result){
				$("#put_results").html(result);
			}
		});

    });
    $("#delete").click(function(event){
		event.preventDefault();
		$.ajax({
		 	type:"DELETE",
		 	url: "../web-service/api.php/RL",
		 	data: $('#DeleteB').serialize(),
		 	dataType: "text",
	      	success: function(result){
	        	$("#del_results").html(result);
			},
			error: function(result){
				$("#del_results").html(result);
			}
		});

    });
});
