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

     <div class="row" id="checkbox_div">

        <div class="col-md-10 mt- mb-3">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="1" id="check_client_cb" onclick="checkFunction()">
              <label class="form-check-label" for="check_client_cb">
                Existing Client
              </label>
            </div>
        </div>

    </div>

    <div class="row" id="existing_client">
    
    </div>

    <div class="row" id="new_client">
        

    </div>

    <div class="row">
        <div class="col-md-5">    
            <div class="form-group">
                <label for="court_id">Court<span style="color: red">*</span></label>
                <select name="court_id" class="form-control">
                    <option value="">--Select--</option>
                    @foreach($courts as $court)
                        
                        <option value="{{$court->id}}" @if(@$record->court_id == $court->id) selected @endif>{{$court->title}}</option>
                    
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-md-5">    
            <div class="form-group">
                <label for="status_id">Status<span style="color: red">*</span></label>
                <select name="status" class="form-control">
                       <option value="">--Select--</option>
                    
                    @foreach($petition_status as $status)
                        
                        <option value="{{$status->id}}" @if(@$record->status == $status->id) selected @endif>{{$status->title}}</option>
                    
                    @endforeach
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
                <textarea class="form-control" name="order_sheet">{{ isset($record) ? $record->order_sheet : old('order_sheet') }}</textarea>
            </div>
        </div>
    </div>

    




    

    <button type="submit" class="btn btn-primary m-t-10">{{ isset($record) ? 'Edit '.$title_singular : 'Add '.$title_singular }}</button>

</form>
