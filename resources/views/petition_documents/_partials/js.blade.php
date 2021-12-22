<script type="text/javascript">
    var fileUrl = '{{ asset("")."storage" }}';
    //var id = "{{request()->petition_id}}";  
    var id = $("#petition_id").val();
     
    $(document).ready(function() {

        $(document).on('change', '#is_free', function(event) {
            if ($(this).is(':checked')) {
                $('#rates').hide();
            } else {
                $('#rates').show();

            }
        });

        $('#is_free').trigger('change');

        //start fetching the stored data from petition_documents table
        fetchPetitionDocuments();

        function fetchPetitionDocuments() {

            $.ajax({
                url: "fetch_petition_documents",
                type: "GET",
                data: {'petition_id':id}, 
                dataType: "json",
                success: function(response) {
                    console.log(response.petition_documents);
                    $('tbody').html("");
                    $.each(response.petition_documents, function(key, item) {                        
                        $('tbody').append('<tr>' +
                            '<td>' + item.title + '</td>' +
                            '<td>' +
                            '<a href="{{asset("/storage/petitions/")}}/'+item.attachmentable_id+'/'+item.file_name+'" target="_blank">Open File</a>' +
                            '</td>' +
                            '<td>' + item.comment + '</td>' +
                            '<td>' +
                            '<a  href="{{url("petition_documents")}}/'+item.id+'/edit" class="editBtn btn btn-sm btn-light" id=""  data-toggle="tooltip" data-placement="top" title="edit">' +
                            '<i class="fa fa-edit"></i>' +
                            '</a>' +
                            '</td>' +
                            '</tr>');
                    });
                }

            });
        }
        //End fetching the stored data from petition_documents table

        //uploading files start
      
        const inputElement1 = document.querySelector('input[id="petition_document_file"]');
        const pond1 = FilePond.create(inputElement1);
        

        FilePond.setOptions({
            server: {
                url: "{{url('upload_petition_documents')}}",
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token()}}',
                }
            }
        });
        //uploading files End

        //Form submission start
        $('#petition_document').on('submit', function(e) {
            e.preventDefault();

            $('.btn').attr('disabled', true);

            //$('#validation_errors').html("Please wait...")          

            $.ajax({
                    url: $(this).attr('action'),
                    type: $(this).attr('method'),
                    data: new FormData(this),
                    headers: {
                        'X-CSRF-TOKEN': '{{csrf_token()}}'
                    },
                    contentType: false,
                    processData: false
                })
                .done(function(response) {
                    $('.btn').attr('disabled', false);
                    fetchPetitionDocuments();
                    //window.location.href = response.redirect_url;
                })
                .fail(function(errors) {
                    $('.btn').attr('disabled', false);
                    // $('#validation_errors').hide();
                    $('#validation_errors').html("<ul>");
                    $('#validation_errors').addClass('alert alert-danger');

                    $.each(errors.responseJSON.errors, function(indexInArray, value) {
                        console.log(value);
                        $("#validation_errors").append("<li>" + value + "</li>")
                    });

                    $('#validation_errors').append("</ul>");

                })
                .always(function() {
                    $('.btn').attr('disabled', false);
                });

        });
        //Form submission start
    });
</script>