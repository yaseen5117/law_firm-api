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
		//submit the form 
		$('#user_form').on('submit', function (e) {
            e.preventDefault();
            
            $('.btn').attr('disabled', true);
            
            $('#validation_errors').html("Please wait...")          
           
            $.ajax({
                url : $(this).attr('action'),
                type: $(this).attr('method'),
                data: new FormData(this),                     
                contentType: false,
                processData: false
            })
            .done(function(response) {
                $('.btn').attr('disabled', false);
                window.location.href = response.redirect_url;
            })
            .fail(function(errors) {
                $('.btn').attr('disabled', false);
                // $('#validation_errors').hide();
                $('#validation_errors').html("<ul>");
                $('#validation_errors').addClass('alert alert-danger');
                
                $.each(errors.responseJSON.errors, function (indexInArray, value) {
                    console.log(value); 
                    $("#validation_errors").append("<li>"+value+"</li>")
                });

                $('#validation_errors').append("</ul>");

            })
            .always(function() {
                $('.btn').attr('disabled', false);
            });
        
            
        });
	});
</script>