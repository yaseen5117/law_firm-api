@extends('layouts.master')

@section('content')

<!-- ======= Hero Section ======= -->
<section id="hero">
  <div class="hero-container" data-aos="fade-up">
    <!-- <h1>Welcome to DogPrive</h1> -->
    <!-- <h2>We are team of talented designers making websites with Bootstrap</h2> -->
    <form action="{{ url('members') }}" type="get" role="search">
      <div class="row g-3 align-items-center">
        <div class="offset-lg-8 offset-md-8 offset-sm-0 col-lg-4 col-md-4 col-sm-12">
          <input type="text" placeholder="type the race you search" id="surname" name="surname" class="form-control" aria-describedby="surname">
        </div>
        <div class="offset-lg-8 offset-md-8 offset-sm-0 col-lg-4 col-md-4 col-sm-12">
          <select id="region_id" name="region_id" style="width: 100%;" class="form-control" value="">
            <option value=""> type region </option>
            @foreach ($regions as $region)
            <option value="{{$region->id}}">
              {{$region->title}}
            </option>
            @endforeach
          </select>

        </div>

        <div class="offset-lg-8 offset-md-8 offset-sm-0 col-lg-4 col-md-4 col-sm-12">
          <select id="province_id" name="province_id" style="width: 100%;" class="province_dropdown form-control" value="">
            <option value=""> type province </option>
            @foreach ($provinces as $province)
            <option value="{{$province->id}}">
              {{$province->title}}
            </option>
            @endforeach
          </select>

        </div>
        <div class="offset-lg-8 offset-md-8 offset-sm-0 col-lg-4 col-md-4 col-sm-12">
          <select id="city_id" name="city_id" style="width: 100%;" class="city_dropdown form-control" value="">
            <option value="">type city </option>
            @foreach ($cities as $citylist)
            <option @if($citylist->id == @$developmentApplication->city_id) selected="" @endif value="{{$citylist->id}}">
              {{$citylist->title}}
            </option>
            @endforeach
          </select>
        </div>
        <div class="offset-lg-8 offset-md-8 offset-sm-0 col-lg-4 col-md-4 col-sm-12">
          <select class="form-control" id="sex" name="sex">
            <option>Choose Sex</option>
            <option value="1">male</option>
            <option value="0">female</option>
          </select>
        </div>
        <div class="offset-lg-8 offset-md-8 offset-sm-0 col-lg-4 col-md-4 col-sm-12">
          <button class="btn btn-get-started">Search</button>
        </div>
      </div>
    </form>

  </div>
</section><!-- End Hero -->

<main id="main">

  <!-- ======= About Section ======= -->
  <section id="about" class="about">
    <div class="container">

      <div class="row justify-content-center">
        <div class="col-lg-11">
          <div class="row justify-content-center">

            <div class="col-lg-2 col-md-5 col-6 d-md-flex align-items-md-stretch">
              <div class="count-box py-5">
                <span class="bi bi-emoji-smile"></span>
                <p>Number of Users</p>
                <p class="small"><a href="#!" class="btn btn-light rounded-pill btn-sm">{{@$users->count()}}</a></p>
              </div>
            </div>

            <div class="col-lg-2 col-md-5 col-6 d-md-flex align-items-md-stretch">
              <div class="count-box py-5">
                <span class="bi bi-journal-richtext"></span>
                <p>Maschi</p>
                <p class="small"><a href="#!" class="btn btn-light rounded-pill btn-sm">{{totalMaleUsers()}}</a></p>
              </div>
            </div>

            <div class="col-lg-2 col-md-5 col-6 d-md-flex align-items-md-stretch">
              <div class="count-box pb-5 pt-0 pt-lg-5">
                <span class="bi bi-clock"></span>
                <p>Femmine</p>
                <p class="small"><a href="#!" class="btn btn-light rounded-pill btn-sm">{{totalFemaleUsers()}}</a></p>
              </div>
            </div>

            <div class="col-lg-2 col-md-5 col-6 d-md-flex align-items-md-stretch">
              <div class="count-box pb-5 pt-0 pt-lg-5">
                <span class="bi bi-award"></span>
                <p>Mossaggi</p>
                <p class="small"><a href="#!" class="btn btn-light rounded-pill btn-sm">{{totalMessagesSent()}}</a></p>
              </div>
            </div>
            <div class="col-lg-2 col-md-5 col-6 d-md-flex align-items-md-stretch">
              <div class="count-box pb-5 pt-0 pt-lg-5">
                <span class="bi bi-award"></span>
                <p>Number Cities</p>
                <p class="small"><a href="#!" class="btn btn-light rounded-pill btn-sm">{{totalCities()}}</a></p>
              </div>
            </div>
            <div class="col-lg-2 col-md-5 col-6 d-md-flex align-items-md-stretch">
              <div class="count-box pb-5 pt-0 pt-lg-5">
                <span class="bi bi-award"></span>
                <p>Number of Races</p>
                <p class="small"><a href="#!" class="btn btn-light rounded-pill btn-sm">{{totalRaces()}}</a></p>
              </div>
            </div>

          </div>
        </div>
      </div>

      <div class="row">

        @foreach(@$users as $user)
        <div class="col-md-6 col-lg-3 mb-4 mb-md-0">

          <div class="card">
            @if($user->profile_image)
            <img height="220px" class="card-img-top" alt="image" src="{{asset('').'storage/users/'.$user->id.'/'.$user->profile_image}}" />
            @else
            <img height="220px" class="card-img-top" src="{{ asset('dog-prive/assets/img/1.jpg')}}" alt="">
            @endif

            <div class="card-body">
              <div class="d-flex justify-content-between">
                <p class="small"><a href="#!" class="btn btn-light rounded-pill btn-sm">{{@$user->race->title}}</a></p>

                <p class="small"><a id="sp" href="javascript:void(0);"><i class="fa fa-heart" @if(isFavourite($user->id)) style="color: red" @endif id="heart{{$user->id}}" onclick="changeColor({{$user->id}})"></i></a> ({{$user->like_count}})</p>

              </div>

              <div class="d-flex justify-content-between mb-3">
                <h5 class="mb-0"><a href="{{ url('user_profile/'.$user->id) }}">{{$user->surname}}</a></h5>
              </div>
              <!-- @if(Cache::has('user-is-online-' . $user->id))
                            <span class="text-success">Online</span>
                        @else
                            <span class="text-secondary">Offline</span>
                        @endif -->
              <div class="d-flex justify-content-between mb-2">
                <p class="text-muted mb-0">{{@$user->province->title}}</p>

              </div>

              <div class="d-flex justify-content-between mb-2">
                <div class="d-flex justify-content-between align-items-center">
                  <div class="rate py-3">
                    <div class="rating" @if(!Auth::user()) style="pointer-events: none;
    opacity: 0.2;" @endif>
                      <input type="radio" name="rating" value="" id="rating">
                      <label for="5">☆</label>
                    </div>
                  </div>
                  <div class="f-size">
                    (@if($user->getRatingAttributeCount()) {{round($user->getRatingAttributeCount(), 1)}} @else 0 @endif Reviews)
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        @endforeach
        
        <div class="col-md-12 col-lg-12 mb-md-0 mt-3">
        {{ $users->links() }}
          <!-- <p class="small"><a href="{{ url('members') }}" class="btn mrgn-top clr">Show More Profiles</a></p> -->
        </div>
      </div>
    </div>
  </section><!-- End About Section -->

  <!-- ======= Cta Section ======= -->
  <section id="cta" class="cta">
    <div class="container" data-aos="fade-in">
      <div class="text-center">
        <a class="cta-btn" href="#">Adds Here/Affiliate products</a>
      </div>

    </div>
  </section><!-- End Cta Section -->

  <!-- ======= Services Section ======= -->
  <section id="services" class="services ">
    <div class="container">

      <div class="section-title pt-5" data-aos="fade-up">
        <h2>More Popular Dogs</h2>
      </div>

      <div class="row">
        @foreach(@$popular_users as $popular_user)
        <div class="col-lg-4 col-md-6">
          <div class="icon-box" data-aos="fade-up">
            <div class="card">

              @if($popular_user->profile_image)
              <img height="220px" class="card-img-top" alt="image" src="{{asset('').'storage/users/'.$popular_user->item_id.'/'.$popular_user->profile_image}}" />
              @else
              <img height="220px" class="card-img-top" src="{{ asset('dog-prive/assets/img/1.jpg')}}" alt="">
              @endif
              <div class="card-body">
                <div class="d-flex justify-content-between">
                  @if(Cache::has('user-is-online-' . $popular_user->item_id))
                  <p class="small"><a href="#!" class="btn btn-success rounded-pill btn-sm">
                      online
                    </a></p>
                  @else
                  <p class="small"><a href="#!" class="btn btn-danger rounded-pill btn-sm">
                      offline
                    </a></p>
                  @endif
                  <div class="d-flex justify-content-between">
                    <p class="small"><a id="sp" href="javascript:void(0);"><i class="fa fa-heart" @if(isFavourite($popular_user->id)) style="color: red" @endif id="heart{{$popular_user->id}}" onclick="changeColor({{$popular_user->id}})"></i></a> ({{$popular_user->likeCount}})</p>

                  </div>
                </div>

                <div class="d-flex justify-content-between mb-3">
                  <h5 class="mb-0"><a href="{{ url('user_profile/'.$popular_user->item_id) }}">{{$popular_user->surname}}</a></h5>
                </div>

                <div class="d-flex justify-content-between mb-2">
                  <p class="text-muted mb-0">some text here</p>

                </div>

                <div class="d-flex justify-content-between mb-2">
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="rate py-3">
                      <div class="rating" @if(!Auth::user()) style="pointer-events: none;
    opacity: 0.2;" @endif>
                        <input type="radio" name="rating" value="" id="rating">
                        <label for="5">☆</label>
                      </div>
                    </div>
                    <div class="f-size">
                      (0 Reviews)
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        @endforeach

      </div>

    </div>
  </section><!-- End Services Section -->

  <section id="services" class="services ">
    <div class="container">

      <div class="section-title pt-5" data-aos="fade-up">
        <h2>Trending Posts Today</h2>
      </div>

      <div class="row">
        <div class="col-lg-4 col-md-6">
          <div class="icon-box" data-aos="fade-up">

            <div class="card mb-3" style="max-width: 540px;">
              <div class="row g-0">
                <div class="col-md-4 col-sm-4">
                  <img style="width: 100%; height: 100%;" src="./assets/img/hero.jpeg" class="card-img-top" alt="image" />
                </div>
                <div class="col-md-8 col-sm-8">
                  <div class="card-body">
                    <div class="d-flex justify-content-between">
                      <p class="small"><a href="#!" class="btn btn-light rounded-pill btn-sm">Razza</a></p>
                      <a href="#" class="small text-danger"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16">
                          <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z" />
                        </svg></a>
                    </div>
                    <p class="card-text">This is a wider card with supporting.</p>
                    <p class="card-text"><a class="btn btn-success" href="#">View</a></p>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
        <div class="col-lg-4 col-md-6">
          <div class="icon-box" data-aos="fade-up">

            <div class="card mb-3" style="max-width: 540px;">
              <div class="row g-0">
                <div class="col-md-4 col-sm-4">
                  <img style="width: 100%; height: 100%;" src="./assets/img/hero.jpeg" class="card-img-top" alt="image" />
                </div>
                <div class="col-md-8 col-sm-8">
                  <div class="card-body">
                    <div class="d-flex justify-content-between">
                      <p class="small"><a href="#!" class="btn btn-light rounded-pill btn-sm">Razza</a></p>
                      <a href="#" class="small text-danger"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16">
                          <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z" />
                        </svg></a>
                    </div>

                    <p class="card-text">This is a wider card with supporting.</p>
                    <p class="card-text"><a class="btn btn-success" href="#">View</a></p>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
        <div class="col-lg-4 col-md-6">
          <div class="icon-box" data-aos="fade-up">

            <div class="card mb-3" style="max-width: 540px;">
              <div class="row g-0">
                <div class="col-md-4 col-sm-4">
                  <img style="width: 100%; height: 100%;" src="./assets/img/hero.jpeg" class="card-img-top" alt="image" />
                </div>
                <div class="col-md-8 col-sm-8">
                  <div class="card-body">
                    <div class="d-flex justify-content-between">
                      <p class="small"><a href="#!" class="btn btn-light rounded-pill btn-sm">Razza</a></p>
                      <a href="#" class="small text-danger"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16">
                          <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z" />
                        </svg></a>
                    </div>
                    <p class="card-text">This is a wider card with supporting.</p>
                    <p class="card-text"><a class="btn btn-success" href="#">View</a></p>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>

        <div class="col-lg-4 col-md-6">
          <div class="icon-box" data-aos="fade-up">

            <div class="card mb-3" style="max-width: 540px;">
              <div class="row g-0">
                <div class="col-md-4 col-sm-4">
                  <img style="width: 100%; height: 100%;" src="./assets/img/hero.jpeg" class="card-img-top" alt="image" />
                </div>
                <div class="col-md-8 col-sm-8">
                  <div class="card-body">
                    <div class="d-flex justify-content-between">
                      <p class="small"><a href="#!" class="btn btn-light rounded-pill btn-sm">Razza</a></p>
                      <a href="#" class="small text-danger"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16">
                          <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z" />
                        </svg></a>
                    </div>
                    <p class="card-text">This is a wider card with supporting.</p>
                    <p class="card-text"><a class="btn btn-success" href="#">View</a></p>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
        <div class="col-lg-4 col-md-6">
          <div class="icon-box" data-aos="fade-up">

            <div class="card mb-3" style="max-width: 540px;">
              <div class="row g-0">
                <div class="col-md-4 col-sm-4">
                  <img style="width: 100%; height: 100%;" src="./assets/img/hero.jpeg" class="card-img-top" alt="image" />
                </div>
                <div class="col-md-8 col-sm-8">
                  <div class="card-body">
                    <div class="d-flex justify-content-between">
                      <p class="small"><a href="#!" class="btn btn-light rounded-pill btn-sm">Razza</a></p>
                      <a href="#" class="small text-danger"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16">
                          <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z" />
                        </svg></a>
                    </div>

                    <p class="card-text">This is a wider card with supporting.</p>
                    <p class="card-text"><a class="btn btn-success" href="#">View</a></p>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
        <div class="col-lg-4 col-md-6">
          <div class="icon-box" data-aos="fade-up">

            <div class="card mb-3" style="max-width: 540px;">
              <div class="row g-0">
                <div class="col-md-4 col-sm-4">
                  <img style="width: 100%; height: 100%;" src="./assets/img/hero.jpeg" class="card-img-top" alt="image" />
                </div>
                <div class="col-md-8 col-sm-8">
                  <div class="card-body">
                    <div class="d-flex justify-content-between">
                      <p class="small"><a href="#!" class="btn btn-light rounded-pill btn-sm">Razza</a></p>
                      <a href="#" class="small text-danger"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16">
                          <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z" />
                        </svg></a>
                    </div>
                    <p class="card-text">This is a wider card with supporting.</p>
                    <p class="card-text"><a class="btn btn-success" href="#">View</a></p>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </section>

</main><!-- End #main -->

@endsection
@section('javascript')
<script>
  // $(function() {
  //   $('.pagination a').on('click', function(e) {
  //     e.preventDefault();
  //     var url = $(this).attr('href');
  //     $.get(url, function(data) {
  //       $('html').html(data.replace(/<html>(.*)<\/html>/, "$1"));
  //     });
  //   });
  // });

  function changeColor(id) {

    $.ajax({
      url: "{{url('favourites')}}",
      type: 'POST',
      data: {
        'item_id': id
      },
      headers: {
        'X-CSRF-TOKEN': '{{csrf_token()}}'
      },
      success: function(data) {
        console.log(data.token);
        console.log(data.redirect_url);
        if (data.token == 1) {
          document.getElementById("heart" + id).style.color = "grey";
        } else if (data.token == 0) {
          document.getElementById("heart" + data.favourite.item_id).style.color = "red";
        } else {
          console.log(data.redirect_url);
          window.location.href = data.redirect_url;
        }

      }
    })
  }

  function userProfile(id) {
    $.ajax({
      url: "{{url('user_profile')}}/" + id,
      type: 'get',
      success: function(data) {
        console.log(data);
        window.location.href = data.redirect_url;
      }
    })
  }

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