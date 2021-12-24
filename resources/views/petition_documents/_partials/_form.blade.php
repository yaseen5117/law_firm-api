<form action="{{ $url }}" method="POST" role="form" id="petition_document" class="m-b-20" enctype="multipart/form-data">

    {{ csrf_field() }}

    @if(isset($record))
    <input type="hidden" name="_method" value="put">
    @endif
    @php
    if(request()->petition_id){
        $petition_id = request()->petition_id;
    }
    @endphp
    <input type="hidden" name="petition_id" id="petition_id" value="{{@$petition_id}}">

    <div class="row">
        <div class="col-md-6">
            
                <div class="form-group">
                    <label for="title">Title <span style="color: red">*</span></label>
                    <input autofocus="" type="text" value="{{ isset($record) ? $record->title : old('title') }}" class="form-control" name="title" id="title" placeholder="">
                </div>
            
             
                <div class="form-group file">
                    <label for="file_name">Document <span style="color: red">*</span></label>
                    <input type="file" value="{{ isset($record) ? $record->petition_document_file : old('petition_document_file') }}" class=" " name="petition_document_file" id="petition_document_file">
                    <input type="hidden" name="file_name" id="file_name" value="">

                </div>
             
                <div class="form-group">
                    <label for="comment">Comments </label>
                    <textarea class="form-control" id="comment" name="comment">{{ isset($record) ? $record->comment : old('comment') }}</textarea>
                </div>
                <div class="form-group">
                    <div id="validation_errors"></div>
                </div> 

                <div class="form-group">
                <button type="submit" class="btn btn-primary m-t-10">{{ isset($record) ? 'Edit '.$title_singular : 'Add '.$title_singular }}</button>
                </div> 
            
        </div>

        <div class="col-md-6">
            <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Documents</th>
                        <th>Comments</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                                        
                </tbody>
            </table>
            </div>
        </div>
    </div>
</form>