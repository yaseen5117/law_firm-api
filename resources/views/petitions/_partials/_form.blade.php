<form action="{{ $url }}" method="POST" role="form" class="m-b-20">

    {{ csrf_field() }}

    @if(isset($record))
        <input type="hidden" name="_method" value="put">
    @endif



    <div class="row">
        <div class="col-md-5">
            <div class="form-group">
                <label for="title">Name <span style="color: red">*</span></label>
                <input autofocus="" type="text" value="{{ isset($record) ? $record->name : old('name') }}" class="form-control" name="name" id="name" placeholder="" >
            </div>
        </div>    
        <div class="col-md-5">
            <div class="form-group">
                <label for="title">Writ Number <span style="color: red">*</span></label>
                <input type="text" value="{{ isset($record) ? $record->writ_number : old('writ_number') }}" class="form-control" name="writ_number" id="writ_number" placeholder="" >
            </div>

            
        </div>
    </div>

    <div class="row">
        <div class="col-md-5">
            <div class="form-group">
                <label for="title">Client <span style="color: red">*</span></label>
                <select name="client_id" class="form-control">
                    <option value="">--Select--</option>
                    @foreach($clients as $client)
                    <option value="{{$client->id}}">{{$client->fullName()}}</option>
                    @endforeach()
                </select>
            </div>
        </div>
        <div class="col-md-5">    
            <div class="form-group">
                <label for="court_id">Court<span style="color: red">*</span></label>
                <select name="court_id" class="form-control">
                    <option value="">--Select--</option>
                    <option value="2">Dummy 2</option>
                    <option value="3">Dummy 3</option>
                </select>
            </div>
        </div>

        <div class="col-md-5">    
            <div class="form-group">
                <label for="status_id">Status<span style="color: red">*</span></label>
                <select name="status" class="form-control">
                    <option value="">--Select--</option>
                    <option value="1">Dummy 1</option>
                    <option value="2">Dummy 2</option>
                    <option value="3">Dummy 3</option>
                </select>
            </div>
        </div>
    </div>

       <div class="row">
        <div class="col-md-5">
            <div class="form-group">
                <label for="title">Judgement <span style="color: red"></span></label>
                <textarea class="form-control" name="judgement">{{ isset($record) ? $record->judgement : old('judgement') }}</textarea>
            </div>
        </div>
        <div class="col-md-5">    
            <div class="form-group">
                <label for="title">Order Sheet <span style="color: red"></span></label>
                <textarea class="form-control" name="judgement">{{ isset($record) ? $record->judgement : old('judgement') }}</textarea>
            </div>
        </div>
    </div>

    




    

    <button type="submit" class="btn btn-primary m-t-10">{{ isset($record) ? 'Edit '.$title_singular : 'Add '.$title_singular }}</button>

</form>
