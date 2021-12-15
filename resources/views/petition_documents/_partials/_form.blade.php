<form action="{{ $url }}" method="POST" role="form" class="m-b-20">

    {{ csrf_field() }}

    @if(isset($record))
        <input type="hidden" name="_method" value="put">
    @endif



    <div class="row">
        <div class="col-md-5">
            <div class="form-group">
                <label for="title">Title <span style="color: red">*</span></label>
                <input autofocus="" type="text" value="{{ isset($record) ? $record->title : old('title') }}" class="form-control" name="title" id="title" placeholder="" required>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-5">
            <div class="form-group">
                <label for="file_name">Document <span style="color: red">*</span></label>
                <input type="file" value="{{ isset($record) ? $record->file_name : old('file_name') }}" class=" " name="file_name" id="file_name">
            </div>
        </div>
    </div> 
    <div class="row">
        <div class="col-md-5">
            <div class="form-group">
                <label for="comments">Comments <span style="color: red"></span></label>
                <textarea class="form-control" id="comments" name="comments">{{ isset($record) ? $record->comments : old('comments') }}</textarea>
            </div>
        </div>         
    </div>

    <button type="submit" class="btn btn-primary m-t-10">{{ isset($record) ? 'Edit '.$title_singular : 'Add '.$title_singular }}</button>

</form>
