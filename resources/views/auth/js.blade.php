<script>
    $(function() {
        
        $('#region_id').on('change', function(e) {

            var regionId = $('#region_id').val()

            var div = $(this).parent();

            var op = " ";

            $.ajax({
                url: "{{url('provinces')}}",
                type: 'get',
                data: {
                    'region_id': regionId
                },
                success: function(data) {

                    // var html ='<select id="district_id" name="district_id" class="form-control" value="{{@$developmentApplication->district_id}}">'
                    op += '<option value="0" selected disabled>--Select--</option>';
                    for (var i = 0; i < data.length; i++) {
                        op += '<option value="' + data[i].id + '">' + data[i].title + '</option>';
                    }
                    // html += '</select>'

                    $('.province_dropdown').empty().append(op);

                }
            })

        });

        $('#province_id').on('change', function(e) {

            var provinceId = $('#province_id').val()

            var div = $(this).parent();

            var op = " ";

            $.ajax({
                url: "{{url('cities')}}",
                type: 'get',
                data: {
                    'province_id': provinceId
                },
                success: function(data) {

                    op += '<option value="0" selected disabled>--Select--</option>';
                    for (var i = 0; i < data.length; i++) {
                        op += '<option value="' + data[i].id + '">' + data[i].title + '</option>';
                    }

                    $('.city_dropdown').empty().append(op);

                }
            })

        });
    })
</script>