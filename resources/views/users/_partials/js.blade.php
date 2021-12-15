<script type="text/javascript">
	$(document).ready(function() {
		
		 $('#search_form').on('submit', function (e) {
		       
		       var name = $("#name").val();
		       var email = $("#email").val();
		       var phone = $("#phone").val();

		       if(name == "" && email == "" && phone == "")
		       {
		         e.preventDefault();
		       }

		    });

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