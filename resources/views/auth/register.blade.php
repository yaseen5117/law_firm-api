@extends('layouts.app')
@section('title','Register')
@section('content')

<div class="col-md-6 col-lg-5 d-none d-lg-block">
    <img src="{{ asset('dog-prive/assets/img/hero.jpeg')}}" alt="" class="vh-100 img-fluid" style="border-radius: 1rem 0 0 1rem;">

</div>
<div class="col-md-6 col-lg-7">



    <div class="row">
        <div class="col-md-12 col-sm-12">
            <form id="msform" action="{{ route('register') }}" method="post" enctype="multipart/form-data">
                <!-- progressbar -->
                @csrf
                <ul id="progressbar">
                    <li class="active" id="account"><strong>OWNER DETAIL</strong></li>
                    <li id="personal"><strong>DOG DETAIL</strong></li>
                    <li id="payment"><strong>PROFILE DETAIL</strong></li>

                    <li id="confirm"><strong>FINISH</strong></li>
                </ul> <!-- fieldsets -->

                <fieldset>

                    <div class="form-card">
                        <h3 class="">OWNER DETAIL</h3>

                        <div class="ffl-wrapper">
                            <input required type="text" id="owner_name" placeholder="NAME" name="owner_name" class="form-control" />
                        </div>


                        <div class="ffl-wrapper">                             
                            <input required type="text" id="surname" placeholder="SURNAME" name="surname" class="form-control" class="form-control" />
                        </div>

                        <div class="ffl-wrapper">
                            <label for="dob" class="ffl-label">BIRTH</label>
                            <input type="date" id="dob" name="dob" placeholder="DOB" class="form-control" />

                        </div><br>
                        <h5 class="color">LIVE</h5>
                        <div class="ffl-wrapper dropdown" style="margin-top: 20px">


                            <select id="region_id" name="region_id" required class="form-control" value="">
                                <option value="">-- SELECT REGION --</option>
                                @foreach ($regions as $region)
                                <option value="{{$region->id}}">
                                    {{$region->title}}
                                </option>
                                @endforeach
                            </select>


                        </div>

                        <div class="ffl-wrapper" style="margin-top: 20px">
                            <select id="province_id" name="province_id" required class="province_dropdown form-control" value="">
                                <option value="">-- SELECT PROVINCE --</option>
                                @foreach ($provinces as $province)
                                <option value="{{$province->id}}">
                                    {{$province->title}}
                                </option>
                                @endforeach
                            </select>


                        </div>

                        <div class="ffl-wrapper" style="margin-top: 20px">
                            <select id="city_id" name="city_id" required class="city_dropdown form-control" value="">
                                <option value="">--SELECT CITY--</option>
                                @foreach ($cities as $citylist)
                                <option @if($citylist->id == @$developmentApplication->city_id) selected="" @endif value="{{$citylist->id}}">
                                    {{$citylist->title}}
                                </option>
                                @endforeach
                            </select>
                        </div>

                    </div>
                    <button type="button" name="next" id="owner-detail" class="next action-button btn-sm">Next Step</button>
                </fieldset>
                <fieldset>
                    <div class="form-card">
                        <h3 class="">DOG DETAIL</h3>

                        <div class="ffl-wrapper">
                            <input type="text" class="form-control" placeholder="NAME" name="dog_name" id="dog_name" placeholder="" />
                        </div><br>


                        <div class="ffl-wrapper">
                            <span class="color mt-2"><b> SEX: </b></span>
                            <div style="margin-left: 15px" class="form-check form-check-inline ml-4">
                                <input class="form-check-input" type="radio" id="sex" name="sex" value="1">
                                <label class="form-check-label" for="male">MALE</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" id="sex" name="sex" value="0">
                                <label class="form-check-label" for="female">FEMALE</label>
                            </div>
                        </div>


                        <span class="color" style="margin-top: 10px"><b> AGE: </b></span> <br>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="ffl-wrapper">
                                 
                                    <input type="text" id="age_month"  placeholder="MONTH" name="age_month" class="form-control" />
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="ffl-wrapper">                                     
                                    <input type="text" id="age_year" placeholder="YEARS" name="age_year" class="form-control" />
                                </div>
                            </div>
                        </div>                    
                          
                        <div class="ffl-wrapper" style="margin-top: 20px">
                            <select id="race_type_id" name="race_type_id" style="width: 100%" required class="race_type_dropdown form-control" value="">
                                <option value="">-- SELECT RACE --</option>
                                @foreach ($race_types as $race_type)
                                <option value="{{$race_type->id}}">
                                    {{$race_type->title}}
                                </option>
                                @endforeach
                            </select>


                        </div>
                        <div class="ffl-wrapper">

                            <select id="relation_race" class="js-example-basic-single js-states form-control" name="relation_race">
                                <option value="Country Not Selected">SELECT SIZE IN RELATION RACE</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                            </select>

                        </div>


                        <div class="ffl-wrapper" style="margin-top: 25px">
                            <span class="color mt-2"><b> PEDIGREE: </b></span>
                            <div style="margin-left: 15px" class="form-check form-check-inline ml-4">
                                <input class="form-check-input" type="radio" id="pedegree" name="pedigree" value="1">
                                <label class="form-check-label" for="pedigree">YES</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" id="pedigree" name="pedigree" value="0">
                                <label class="form-check-label" for="pedigree">NO.</label>
                            </div>
                        </div>


                        <div class="ffl-wrapper">
                            <textarea type="text" rows="4" cols="50" placeholder="PARTICULAR DETAIL" name="particular_detail" class="form-control"></textarea>
                        </div>

                    </div> <button type="button" name="previous" class="previous action-button-previous btn-sm">Previous</button> <button type="button" name="next" class="next action-button btn-sm">Next Step</button>
                </fieldset>


                <fieldset>
                    <div class="form-card">
                        <h3 class="">PROFILE DETAIL</h3>

                        <div class="ffl-wrapper">
                            <input type="text" name="email" id="email" placeholder="EMAIL" class="form-control" />

                        </div>

                        <div class="ffl-wrapper">
                            <input type="password" placeholder="PASSWORD" id="password" name="password" class="form-control" />
                        </div>

                        <div class="ffl-wrapper mt-1">
                            <div class="row">
                                <div class="ml-2 col-sm-4 " style="margin-top: 30px;">
                                    <h6 class="color"><b>PROFILE PHOTO:</b> </h6>
                                </div>
                                <div class="ml-2 col-sm-4">


                                    <input type="file" name="profile_image_file" id="profile_image_file" class="file" accept="image/*">
                                    <div class="input-group my-3">
                                        <div class="input-group-append">
                                            <button type="button" class="browse btn btn-primary btn-sm">Browse...</button>
                                        </div>
                                    </div>

                                </div>
                                <div class="ml-2 col-sm-4" style="margin-top: 10px;">
                                    <img src="" id="preview" class="img-thumbnail">
                                </div>
                            </div>
                        </div>
                        <div class="ffl-wrapper">
                            <textarea type="text" rows="4" cols="50" placeholder="I WANT TO FIND AN OWNER THAT IS" name="owner_detail" id="owner_detail" class="form-control"></textarea>
                        </div>
                        <div class="ffl-wrapper">
                            <textarea type="text" rows="4" cols="50" placeholder="I WANT TO FIND A DOG THAT IS" name="dog_detail" id="dog_detail" class="form-control"></textarea>
                        </div>

                    </div> <button type="button" name="previous" class="previous action-button-previous btn-sm">Previous</button> <button type="submit" name="next" class="btn next action-button btn-sm">Next Step</button>
                </fieldset>




                <fieldset>


                    <div class="form-card">
                        <h1 class="text-center"> FINISHED</h1>

                    </div>

                </fieldset>

            </form>
        </div>
    </div>




</div>

<!-- @if (Route::has('password.request'))
                    <div class="text-center">
                        <a class="small" href="{{ route('password.request') }}">Forgot Password?</a>
                    </div>
                @endif
                
                @if (Route::has('password.request'))
                    <div class="text-center">
                        <a class="small" href="{{ url('/login') }}">Already have an account? Login!</a>
                    </div>
                @endif -->
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
                    console.log(data);
                    // var html ='<select id="district_id" name="district_id" class="form-control" value="{{@$developmentApplication->district_id}}">'
                    op += '<option value="0" selected disabled>--SELECT PROVINCE--</option>';
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

                    op += '<option value="0" selected disabled>--SELECT CITY--</option>';
                    for (var i = 0; i < data.length; i++) {
                        op += '<option value="' + data[i].id + '">' + data[i].title + '</option>';
                    }

                    $('.city_dropdown').empty().append(op);

                }
            })

        });
    })
</script>
@endsection