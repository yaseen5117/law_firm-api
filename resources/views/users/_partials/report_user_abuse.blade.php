<div class="modal fade" id="fakeUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display:none">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><i style="font-size: 50px;color: #C22E2E" class="material-icons">&#xe8b2;</i></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form id="reported-user" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
          <input type="radio" class="btn-check" name="options-outlined" id="fake-user" autocomplete="off">
          <label class="btn btn-outline-primary" for="fake-user">FAKE USER</label>
          </div>

          <div class="mb-3">
          <input type="radio" class="btn-check" name="options-outlined" id="try-to-sell" autocomplete="off">
          <label class="btn btn-outline-primary" for="try-to-sell">TRY TO SELL PRODUCT</label>
          </div>
         
          <div class="mb-3">
          <input type="radio" class="btn-check mt-3" name="options-outlined" id="inappropriate-content" autocomplete="off">
          <label class="btn btn-outline-primary" for="inappropriate-content">INAPPROPRIATE POSTED CONTENT</label>
           
          </div>
          <div class="mb-3">
            <label for="message-text" class="col-form-label">Tell Us More:</label>
            <textarea class="form-control" id="message-text"></textarea>
          </div>
          <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Send</button>
          </div>
        </form>
      </div>      
    </div>
  </div>
</div>
<script>
  $(document).ready(function() {
   
    //image uploading
    $('#reported-user').submit(function(e) {
      e.preventDefault();
      var formData = new FormData(this);     
      $.ajax({
        type: 'POST',
        url: "{{ url('report_user')}}",
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        success: (data) => {
          this.reset();           
          console.log(data);
          window.location.href = data.redirect_url;
        },
        error: function(data) {
          console.log(data);
        }
      });
    });
  });
    </script>