<div class="modal fade" id="userImgUpload" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display:none">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h6>Change User Image</h6>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="POST" enctype="multipart/form-data" id="user-image" action="javascript:void(0)" > 
      <div class="modal-body">
        
          @csrf
          <div class="mb-3">
            <input type="hidden" @if(Auth::user()) value="{{Auth::user()->id}}" @endif id="id" name="id">
            <input type="file" class="form-control" id="file" name="file" accept="image/*"/>
          </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Upload</button>
      </div>
      </form>
    </div>
  </div>
</div>