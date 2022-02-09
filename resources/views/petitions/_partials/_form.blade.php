<form id="petition_form" action="{{ $url }}" method="POST" role="form" class="m-b-20">

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
              <input class="form-check-input" type="checkbox" value="1" name="check_client_cb" id="check_client_cb" onclick="checkExistingClient()">
              <label class="form-check-label" for="check_client_cb">
                Existing Client
              </label>
            </div>
        </div>

    </div>

    <div class="row" id="existing_client">
        <div class="col-md-5">
            <div class="form-group">
                <label for="title">Client <span style="color: red">*</span></label>
                <select name="client_id" id="client_id" class="form-control">
                    <option value="">--Select--</option>
                    @foreach($clients as $client)
                    <option value="{{$client->id}}" @if(@$record->client_id == $client->id) selected @endif>{{$client->fullName()}}</option>
                    @endforeach()
                </select>
            </div>
        </div>
    </div>

    <div class="row" id="new_client">
        
        <div class="col-md-5">
            <div class="form-group">
                <label for="title">First Name <span style="color: red">*</span></label>
                  <input type="text" value="" class="form-control" name="first_name" id="first_name" placeholder="" >
              </div>
        </div>
        
        <div class="col-md-5"><div class="form-group">
            <label for="title">Last Name <span style="color: red">*</span></label>
            <input type="text" value="" class="form-control" name="last_name" id="last_name" placeholder="" >
        </div>
        </div>

        <div class="col-md-5">
            <div class="form-group"><label for="title">Phone<span style="color: red">*</span></label>
                <input type="text" value="" class="form-control" name="phone" id="phone" placeholder="" maxlength = "12" >
            </div>
        </div>

        <div class="col-md-5">
            <div class="form-group">
                <label for="title">Email<span style="color: red">*</span></label>
                <input type="text" value="" class="form-control" name="email" id="email" placeholder="" >
            </div>
        </div>

    </div>

    <div class="row">
    @php $check_var = false; @endphp
        <div class="col-md-5">    
            <div class="form-group">
                <label for="court_id">Judges</label>
                <select class="form-control" multiple aria-label="select example" id="judges_dropdown" name="judges[]">

                        @if(isset($record))
                           
                           @foreach($judges as $judge)
                                
                                @foreach($record->petition_judges as $selected_judge)

                                    @if($selected_judge->judge_id == $judge->id)
                                    
                                      @php $check_var = true; @endphp
                                    
                                    @endif

                                @endforeach

                                @if($check_var)     
                                    <option value="{{$judge->id}}" selected>{{$judge->first_name}} {{$judge->last_name}}</option>
                                    @php $check_var = false; @endphp
                                @else
                                    <option value="{{$judge->id}}">{{$judge->first_name}} {{$judge->last_name}}</option>
                                @endif
                           
                           @endforeach 

                        @else

                            @foreach($judges as $judge)

                                <option value="{{$judge->id}}">{{$judge->first_name}} {{$judge->last_name}}</option>

                            @endforeach

                        @endif

                </select>
            </div>
        </div>
    
        @php $check_var = false; @endphp
        <div class="col-md-5">    
            <div class="form-group">
                <label for="court_id">Lawyer</label>
                <select class="form-control" multiple aria-label="select example" id="lawyers_dropdown" name="lawyers[]">     
                        
                        @if(isset($record))

                           @foreach($lawyers as $lawyer)

                                @foreach($record->petition_lawyers as $selected_lawyer)
                                    
                                    @if($selected_lawyer->lawyer_id == $lawyer->id)
                                    
                                      @php $check_var = true; @endphp
                                    
                                    @endif

                                @endforeach

                                @if($check_var)
                                    <option value="{{$lawyer->id}}" selected>{{$lawyer->first_name}} {{$lawyer->last_name}}</option>
                                    @php $check_var = false; @endphp
                                @else
                                    <option value="{{$lawyer->id}}">{{$lawyer->first_name}} {{$lawyer->last_name}}</option>
                                @endif
                           
                           @endforeach 

                        @else

                            @foreach($lawyers as $lawyer)

                                <option value="{{$lawyer->id}}">{{$lawyer->first_name}} {{$lawyer->last_name}}</option>

                            @endforeach

                        @endif
                        
                </select>
            </div>
        </div>
    
        <div class="col-md-5">    
            <div class="form-group">
                <label for="petition_type_id">Petition Type<span style="color: red">*</span></label>
                <select name="petition_type_id" class="form-control">
                    <option value="">--Select--</option>
                    @foreach($petition_types as $petition_type)
                        
                        <option value="{{$petition_type->id}}" @if(@$record->petition_type_id == $petition_type->id) selected @endif>{{$petition_type->title}}</option>
                    
                    @endforeach
                </select>
            </div>
        </div>

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
    
    <div id="validation_errors"></div>
    <button type="submit" class="btn btn-primary m-t-10">{{ isset($record) ? 'Edit '.$title_singular : 'Add '.$title_singular }}</button>

</form>
