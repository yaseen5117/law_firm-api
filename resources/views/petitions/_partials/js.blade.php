<script type="text/javascript">
	 

	function checkExistingClient() {

       $(document).ready(function() {

		  var existingClientDiv = $("#existing_client");
	      var newClientDiv = $("#new_client");

		  // If the checkbox is checked, display the output text
		  if($("#check_client_cb").is(':checked'))
		  {
		  

		    existingClientDiv.show()
		    newClientDiv.hide();
		   

		  }
		  else
		  {
		  
		    newClientDiv.show();
            existingClientDiv.hide();
            
		  
		  }

		});
	} 



	$(document).ready(function() {

	var existingClientDiv = $("#existing_client");
	var newClientDiv = $("#new_client");

    
     var url_path = "{{Request::path()}}";

	 const exact_path = url_path.split('/');
	 
	 if(exact_path[2] == "edit")
	 {   
            $('#check_client_cb').prop('checked', true);
            existingClientDiv.show()
		    newClientDiv.hide();
		    

	 }
	 else
	 {
         newClientDiv.show();
         existingClientDiv.hide();
         

	 }
		
		$(document).on('change', '#is_free', function(event) {
			if ($(this).is(':checked')) {	
				$('#rates').hide();
			}else{
				$('#rates').show();

			}
		});

		$('#is_free').trigger('change');
	});
</script>