<script type="text/javascript">
	$(document).ready(function() {
		
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
<script>
    const inputElement1 = document.querySelector('input[id="file_name"]');
    const pond1 = FilePond.create( inputElement1 );
	 
   
    // FilePond.setOptions({
    //     server: {
    //     url:"{{url('pictures_of_proposed_upload')}}",
    //         headers:{
    //             'X-CSRF-TOKEN': '{{ csrf_token()}}',
    //         }
    //     }
    // });
console.log(222);
</script>