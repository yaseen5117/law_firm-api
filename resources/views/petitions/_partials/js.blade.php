<script type="text/javascript">

	$(document).ready(function () {

		$('#judges_dropdown').selectpicker();
    $('#lawyers_dropdown').selectpicker();

		$('#search_form').on('submit', function (e) {
			       
			       var title = $("#title").val();
			       var client_id = $("#client_id").val();
			       var court_id = $("#court_id").val();

			       if(title == "" && client_id == "" && court_id == "")
			       {
			         e.preventDefault();
			       }

		});

	});

	function checkExistingClient() {

      $(document).ready(function() {

		    var existingClientDiv = $("#existing_client");
	      var newClientDiv = $("#new_client");

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
	 
	   var url_path = "{{@$record}}";
		 
			 if(url_path)
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
			
			if ($(this).is(':checked')) 
			{	
				$('#rates').hide();
			}
			else
			{
				$('#rates').show();
			}

		});

		$('#is_free').trigger('change');

	});

</script>