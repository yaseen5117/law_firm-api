<form id="sample_form" action="{{ $url }}" method="POST" role="form" class="m-b-20">

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
        <div class="col-md-3">
            <div class="form-group">
                <label for="title">Display Order <span style="color: red">*</span></label>
                <input required="" autocomplete="off" style="width: 40%" type="text" name="display_order"  value="{{ isset($record) ? $record->display_order : old('display_order') }}"  class="form-control">
            </div>
        </div>
    </div>

    
    <div id="validation_errors"></div>
    <button type="submit" class="btn btn-primary m-t-10">{{ isset($record) ? 'Edit '.$title_singular : 'Add '.$title_singular }}</button>

</form>
