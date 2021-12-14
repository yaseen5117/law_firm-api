<form action="{{ $url }}" method="POST" role="form" class="m-b-20">

    {{ csrf_field() }}

    @if(isset($record))
        <input type="hidden" name="_method" value="put">
    @endif



    <div class="row">
        <div class="col-md-5">
            <div class="form-group">
                <label for="title">Name <span style="color: red">*</span></label>
                <input autofocus="" type="text" value="{{ isset($record) ? $record->name : old('name') }}" class="form-control" name="name" id="name" placeholder="" required>
            </div>

            <div class="form-group">
                <label for="title">Client <span style="color: red">*</span></label>
                <input autofocus="" type="text" value="{{ isset($record) ? $record->client_id : old('client_id') }}" class="form-control" name="client_id" id="client_id" placeholder="" required>
            </div>

            <div class="form-group">
                <label for="title">Court<span style="color: red">*</span></label>
                <input autofocus="" type="text" value="{{ isset($record) ? $record->court_id : old('court_id') }}" class="form-control" name="court_id" id="court_id" placeholder="" required>
            </div>
        </div>
    </div>

    




    

    <button type="submit" class="btn btn-primary m-t-10">{{ isset($record) ? 'Edit '.$title_singular : 'Add '.$title_singular }}</button>

</form>
