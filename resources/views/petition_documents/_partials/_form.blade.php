<form action="{{ $url }}" method="POST" role="form" id="petition_document" class="m-b-20">

    {{ csrf_field() }}

    @if(isset($record))
        <input type="hidden" name="_method" value="put">        
    @endif
    <input type="hidden" name="petition_id" id="petition_id" value="{{request()->petition_id}}">


    <div class="row">
        <div class="col-md-5">
            <div class="form-group">
                <label for="title">Title <span style="color: red">*</span></label>
                <input autofocus="" type="text" value="{{ isset($record) ? $record->title : old('title') }}" class="form-control" name="title" id="title" placeholder="">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-5">
            <div class="form-group">
                <label for="file_name">Document <span style="color: red">*</span></label>
                <input type="file" value="{{ isset($record) ? $record->petition_document_file : old('petition_document_file') }}" class=" " name="petition_document_file" id="petition_document_file">
            </div>
        </div>
    </div> 
    <div class="row">
        <div class="col-md-5">
            <div class="form-group">
                <label for="comments">Comments </label>
                <textarea class="form-control" id="comments" name="comments">{{ isset($record) ? $record->comments : old('comments') }}</textarea>
            </div>
        </div>         
    </div>
    <div id="validation_errors"></div>
    <button type="submit" class="btn btn-primary m-t-10">{{ isset($record) ? 'Edit '.$title_singular : 'Add '.$title_singular }}</button>

</form>
