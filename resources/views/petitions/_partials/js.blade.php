<script type="text/javascript">
	 

	var checkBox = document.getElementById("check_client_cb");
	// Get the output text
	var existingClientDiv = document.getElementById("existing_client");
	var newClientDiv = document.getElementById("new_client");

    
     var url_path = "{{Request::path()}}";

	 const exact_path = url_path.split('/');
	 
	 if(exact_path[2] == "edit")
	 {   
            checkBox.checked = true; 
            existingClientDiv.innerHTML ='<div class="col-md-5"><div class="form-group"><label for="title">Client <span style="color: red">*</span></label><select name="client_id" class="form-control"><option value="">--Select--</option>@foreach($clients as $client)<option value="{{$client->id}}" @if(@$record->client_id == $client->id) selected @endif>{{$client->fullName()}}</option>@endforeach()</select></div></div>';
		    newClientDiv.innerHTML = "";

	 }
	 else
	 {
         newClientDiv.innerHTML = '<div class="col-md-5"><div class="form-group"><label for="title">Client First Name <span style="color: red">*</span></label><input type="text" value="" class="form-control" name="first_name" id="first_name" placeholder="" ></div></div><div class="col-md-5"><div class="form-group"><label for="title">Client Last Name <span style="color: red">*</span></label><input type="text" value="" class="form-control" name="last_name" id="last_name" placeholder="" ></div></div><div class="col-md-5"><div class="form-group"><label for="title">Client Phone<span style="color: red">*</span></label><input type="text" value="" class="form-control" name="phone" id="phone" placeholder="" ></div></div><div class="col-md-5"><div class="form-group"><label for="title">Client Email<span style="color: red">*</span></label><input type="text" value="" class="form-control" name="email" id="email" placeholder="" ></div></div>';
         existingClientDiv.innerHTML = "";

	 }
	

	function checkFunction() {

		  // Get the checkbox
		  var checkBox = document.getElementById("check_client_cb");
		  // Get the output text
		  var existingClientDiv = document.getElementById("existing_client");
		  var newClientDiv = document.getElementById("new_client");

		  // If the checkbox is checked, display the output text
		  if (checkBox.checked == true)
		  {
		  
		    existingClientDiv.innerHTML ='<div class="col-md-5"><div class="form-group"><label for="title">Client <span style="color: red">*</span></label><select name="client_id" class="form-control"><option value="">--Select--</option>@foreach($clients as $client)<option value="{{$client->id}}" @if(@$record->client_id == $client->id) selected @endif>{{$client->fullName()}}</option>@endforeach()</select></div></div>';
		    newClientDiv.innerHTML = "";
		    

		  
		  }
		  else
		  {
		  
		    newClientDiv.innerHTML = '<div class="col-md-5"><div class="form-group"><label for="title">Client First Name <span style="color: red">*</span></label><input type="text" value="" class="form-control" name="first_name" id="first_name" placeholder="" ></div></div><div class="col-md-5"><div class="form-group"><label for="title">Client Last Name <span style="color: red">*</span></label><input type="text" value="" class="form-control" name="last_name" id="last_name" placeholder="" ></div></div><div class="col-md-5"><div class="form-group"><label for="title">Client Phone<span style="color: red">*</span></label><input type="text" value="" class="form-control" name="phone" id="phone" placeholder="" ></div></div><div class="col-md-5"><div class="form-group"><label for="title">Client Email<span style="color: red">*</span></label><input type="text" value="" class="form-control" name="email" id="email" placeholder="" ></div></div>';

		    existingClientDiv.innerHTML = "";

		  
		  }
	} 



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