<form action="{{ $url }}" method="POST" role="form" class="m-b-20" enctype="multipart/form-data">

    {{ csrf_field() }}

    @if(isset($record))
        <input type="hidden" name="_method" value="put">
    @endif



    <div class="row">
        <div class="col-md-5">
            <div class="form-group">
                <label for="first_name">First Name <span style="color: red">*</span></label>
                <input autofocus="" type="text" value="{{ isset($record) ? $record->first_name : old('first_name') }}" class="form-control" name="first_name" id="first_name" placeholder="" >
            </div>
        </div>

        <div class="col-md-5">
            <div class="form-group">
                <label for="last_name">Last Name <span style="color: red">*</span></label>
                <input  type="text" value="{{ isset($record) ? $record->last_name : old('last_name') }}" class="form-control" name="last_name" id="last_name" placeholder="" >
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-5">
            <div class="form-group">
                <label for="email">Email <span style="color: red">*</span></label>
                <input  type="email" value="{{ isset($record) ? $record->email : old('email') }}" class="form-control" name="email" id="email" placeholder="" >
            </div>
        </div>

        <div class="col-md-5">
            <div class="form-group">
                <label for="password">Password @if(!isset($record)) <span>*</span> @endif</label>
                <input  type="password" value="" class="form-control" name="password" id="password" placeholder="" >
            </div>
        </div>
        <div class="col-md-5">
            <div class="form-group">
                <label for="password">Profile Picture</label>                 
                <input type="file" accept="image/x-png,image/gif,image/jpeg" id="profile_image_file" name="profile_image_file" value="">
                @if(@$record->profile_image && isset($record->id))
                    <img class="img-profile" width="70" height="70" src="{{asset('').'storage/users/'.$record->id.'/'.$record->profile_image}}" alt="">
                @endif                 
            </div>
        </div>
    </div>

    



    

    <button type="submit" class="btn btn-primary m-t-10">{{ isset($record) ? 'Edit '.$title_singular : 'Add '.$title_singular }}</button>

</form>
