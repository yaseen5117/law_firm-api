@extends('layouts.master')

@section('content')
<style>
  .card-img-top {
    width: 100%;
    height: 18vw;
    object-fit: cover;
  }

  .ml {
    float: left;
    margin-top: 5px;
    color: grey;
  }

  .mrgn-left {
    margin-left: 10px;
    color: black;
  }

  .report {
    margin-right: 20px;
    margin-top: 5px;
    color: black;
  }
</style>
<main id="main">
  <!-- ======= Breadcrumbs ======= -->
  <section id="breadcrumbs" class="breadcrumbs">
    <div class="breadcrumb-hero">
      <div class="container">
        <div class="row">
          <div class="col-md-2">
            @if(!@$logged_user_profile)
            <button data-bs-toggle="modal" @if(@$logged_user_profile) disabled @endif data-bs-target="#userImgUpload" class="btn btn-light">change profile image</button>              
            @endif
          </div>
          <div class="col-md-3">
            <h6>{{@$user->surname}}</h6>
            @if(@$user->profile_image)
            <img class="rounded-circle z-depth-2" alt="profile image" width="125px" height="125px" src="{{asset('').'storage/users/'.@$user->id.'/'.@$user->profile_image}}" data-holder-rendered="true">
            @else
            <img class="rounded-circle z-depth-2" alt="profile image" width="125px" height="125px" src="{{ asset('dog-prive/assets/img/user.png') }}" data-holder-rendered="true">

            @endif
          </div>
          <div class="col-md-3">
            <input type="text" class="form-control mt-4" style="border-radius: 1.5rem;" value="Race: {{@$user->race->title}}" disabled>
            <input type="text" class="form-control mt-2" style="border-radius: 1.5rem;" value="Age: {{@$user->age_month}} Month {{@$user->age_year}} Years" disabled>
            <input type="text" class="form-control mt-2" style="border-radius: 1.5rem;" value="City: {{@$user->city->title}}" disabled>
          </div>
          <div class="col-md-4">

            <div class="row">
              <div class="col-6">
                <input readonly placeholder="I'm Looking for" class="form-control mb-2" aria-describedby="passwordHelpInline">
              </div>
              <div class="col-6">
                <button data-bs-toggle="modal" @if(@$logged_user_profile) disabled @endif data-bs-target="#fileUpload" class="btn btn-light">POST PHOTO</button>
              </div>
            </div>


            <textarea class="form-control form-rounded mb-2" readonly placeholder="Particular Detail Of Dog" rows="2">{{@$user->particular_detail}}</textarea>
            <textarea class="form-control form-rounded" readonly placeholder="Looking For Particular Detail Of Search Dog" rows="2">{{@$user->dog_detail}}</textarea>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-4 mt-3">
          <b>Users Like You</b>

          <div class="row mt-3 mb-3">
            <div class="col-md-3 col-lg-3 col-sm-3">
              <img class="rounded-circle z-depth-2" alt="100x100" width="80px" height="80px" src="{{ asset('dog-prive/assets/img/user.png')}}" data-holder-rendered="true">

            </div>
            <div class="col-md-2 col-lg-2 col-sm-2">
              <div class="row mt-3">
                <div class="col-md-12 col-lg-12 col-sm-12">
                  <span>UserName</span>
                </div>
                <div class="col-md-12 col-lg-12 col-sm-12">
                  <span>Age:</span>
                </div>
              </div>
            </div>
          </div>

        </div>
        <div class="col-md-6">
          <div class="row">
            <div class="col-md-6 offset-md-6">
              <div class="d-flex justify-content-between mb-2">
                <div class="d-flex justify-content-between align-items-center">
                  <div class="rate py-3">
                  <form>
                      @csrf
                    <div class="rating" @if(!Auth::user()) style="pointer-events: none;" @endif> 
                    <input class="rate" type="radio" name="rating" value="5" id="1">
                    <label class="rate" for="1">☆</label> 
                    <input class="rate" type="radio" name="rating" value="4" id="2">
                    <label class="rate" for="2">☆</label> 
                    <input class="rate" type="radio" name="rating" value="3" id="3">
                    <label class="rate" for="3">☆</label> 
                    <input class="rate" type="radio" name="rating" value="2" id="4">
                    <label class="rate" for="4">☆</label> 
                    <input class="rate" type="radio" name="rating" value="1" id="5">
                    <label class="rate" for="5">☆</label> 
                  </div>
                  </form>
                  </div>
                  <div class="f-size">
                    (3.2 Reviews)
                  </div>
                </div>
              </div>
            </div>
            @foreach(@$user->posts as $post)
            <div class="col-md-12 mb-1">
              <div class="justify-content-between">
                <div class="justify-content-between">
                  <div class="card">
                    <div class="embed-responsive">
                      <img alt="Card image cap" class="card-img-top embed-responsive-item" src="{{asset('').'storage/public/posts/'.@$post->user_id.'/'.@$post->file_name}}" />
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-12 mb-5">
              <div class="justify-content-right">
                <div class="justify-content-right">
                  <div class="text-end">
                    <span @if(!Auth::user()) style="pointer-events: none;" @endif class="small text-danger ml"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16">
                        <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z" />
                      </svg><span class="mrgn-left">Reactions</span></span>
                    <span class="report">
                      <a href="javascript:void(0);" @if(!Auth::user()) style="pointer-events: none;" @endif class="report">REPORT</a></span>
                     </div>
<!--                   
                  <div class="" id="comments">                    
                  <div class="mb-3 mt-2">
                    @foreach(@$post->comments as $comment)
                    <span><a href="{{ url('user_profile/'.$comment->user_id) }}">{{postUserName($comment->user_id)}}</a></span> <br>
                    <span>{{@$comment->comment}}</span><br>
                    @endforeach
                  </div>                  
                  </div> -->
                 
                  <div class="">
                  <form id="post-comment{{@$post->id}}" method="POST" enctype="multipart/form-data" action="javascript:void(0)" >
                  @csrf  
                  <div class="input-group mb-3 mt-2">
                      <input type="hidden" value="@if(Auth::check()){{Auth::user()->id}}@endif" id="user_id" name="user_id">
                      <input type="hidden" value="{{@$post->id}}" id="post_id" name="post_id">
                      
                      <input type="text" id="comment_{{@$post->id}}" name="comment_{{@$post->id}}" required class="form-control" placeholder="comment here..." aria-label="comment here">
                      <button @if(@$logged_user_profile) disabled @endif class="btn btn-outline-secondary" onclick="sendCommentFunc('{{@$post->id}}','@if(Auth::check()){{Auth::user()->id}}@endif')"  data-bs-toggle="tooltip" data-bs-placement="top" title="Post Comment"><i class="fa fa-send"></i></button>
                    </div>
                  </form>
                  </div>
                </div>
              </div>
            </div>            
            <hr>
            @endforeach
          </div>
        </div>
        <div class="col-md-2 mt-3 mb-3">

          <span style="font-size:15px; color: #C22E2E"><i class="material-icons">&#xe8b2;</i><a href="#" type="" class="" data-bs-toggle="modal" data-bs-target="#fakeUser" @if(!Auth::user()) style="pointer-events: none;" @endif style="color: black;">Report Abuse</a></span>

        </div>
      </div>
    </div>
  </section><!-- End Breadcrumbs -->
</main>
@endsection

@include('users._partials.report_user_abuse')
@include('users._partials.upload_post_popup')
@include('users._partials.user_image_popup')

@section('javascript')
</script>
<script>
  $(document).ready(function() {
    $("#comment-section").hide();
    $("#btn-comment").click(function() {
      $("#comment-section").show();
      $('#btn-comment').hide();
    });
    //image uploading
    $('#post').submit(function(e) {
      e.preventDefault();
      var formData = new FormData(this);     
      $.ajax({
        type: 'POST',
        url: "{{ url('post_uploads')}}",
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        success: (data) => {
          this.reset();           
          console.log(data);
          window.location.href = data.redirect_url;
        },
        error: function(data) {
          console.log(data);
        }
      });
    });

    //image uploading for user profile
    $('#user-image').submit(function(e) {
      e.preventDefault();
      var formData = new FormData(this);     
      $.ajax({
        type: 'POST',
        url: "{{ url('change_user_image')}}",
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        success: (data) => {                    
          console.log(data);
          window.location.href = data.redirect_url;
        },
        error: function(data) {
          console.log(data);
        }
      });
    });

    //Comment on Post
    $('#post-comment').submit(function(e) {
      e.preventDefault();
      var formData = new FormData(this);     
      $.ajax({
        type: 'POST',
        url: "{{ url('post_comments')}}",
        data: formData, user_id,
        cache: false,
        contentType: false,
        processData: false,
        success: (data) => {
          this.reset();           
          console.log(data);
          window.location.reload();
        },
        error: function(data) {
          console.log(data);
        }
      });
    });
    //Rate a User
    $('.rating').change('.rate', function(e) { 
      
          var id = {{ request()->route('id') }};
      alert(id);
      var ratingNum = $(".rate:checked").val();          
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
      }
    });
    $.ajax({
      type: 'POST',
      cache: false,
      dataType: 'JSON',
      url: "{{ url('rate_user') }}",
      data: {'value':ratingNum},
      success: function(data) {
        console.log(data);
      }
    });
  });

  });
  function sendCommentFunc(post_id,user_id){
    var id = 'comment_'+post_id; 
    var comment = document.getElementById(id).value;
     
    $.ajax({
        type: 'POST',
        url: "{{ url('post_comments')}}",
        data: {comment: comment,post_id: post_id,user_id: user_id},           
        dataType: "json",
        success: (data) => {                  
          console.log(data);
          window.location.reload();
        },
        error: function(data) {
          console.log(data);
        }
      });
  }
  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
</script>
@endsection