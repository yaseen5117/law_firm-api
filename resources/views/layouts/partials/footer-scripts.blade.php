 <!-- Logout Modal-->
 <!--     <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                     <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                     </form> 
                </div>
            </div>
        </div>
    </div> -->

 <script>
     $(document).ready(function() {
         $("#region_id").select2();
         $("#province_id").select2();
         $("#city_id").select2();
         $("#race_type_id").select2();           
                 
            $("#msform").validate({
            rules: {
                owner_name: "required",
                surname: "required",
                region_id: "required",
                province_id: "required",
                city_id: "required",
                dog_name: "required",
                sex: "required",
                race_type_id: "required",
                email: {
                    required: true,
                    remote: {                    
                    url: "/validate_email",                     
                 }
                },
                password: "required",
            },
            messages: {
                email: {
                    required: "Please enter your email" ,
                    remote:"Email already exist"
                },

            }
            })
                    
         var current_fs, next_fs, previous_fs; //fieldsets
         var opacity;

         $(".next").click(function() {
               if($("#msform").valid()){
                current_fs = $(this).parent();
             next_fs = $(this).parent().next();

             //Add Class Active
             $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

             //show the next fieldset
             next_fs.show();
             //hide the current fieldset with style
             current_fs.animate({
                 opacity: 0
             }, {
                 step: function(now) {
                     // for making fielset appear animation
                     opacity = 1 - now;

                     current_fs.css({
                         'display': 'none',
                         'position': 'relative'
                     });
                     next_fs.css({
                         'opacity': opacity
                     });
                 },
                 duration: 600
             });    
            }          
         });

         $(".previous").click(function() {

             current_fs = $(this).parent();
             previous_fs = $(this).parent().prev();

             //Remove class active
             $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

             //show the previous fieldset
             previous_fs.show();

             //hide the current fieldset with style
             current_fs.animate({
                 opacity: 0
             }, {
                 step: function(now) {
                     // for making fielset appear animation
                     opacity = 1 - now;

                     current_fs.css({
                         'display': 'none',
                         'position': 'relative'
                     });
                     previous_fs.css({
                         'opacity': opacity
                     });
                 },
                 duration: 600
             });
         });

         $('.radio-group .radio').click(function() {
             $(this).parent().find('.radio').removeClass('selected');
             $(this).addClass('selected');
         });

         $(".submit").click(function() {
             return false;
         })
        
     });
 </script>
 <script type="text/javascript">
     /*!**************************************************************
      * Package: floating-form-labels
      * Version: v1.2.4
      * Built  : Thu Jul 05 2018 20:51:51 GMT+0200 (CEST)
      * URL  : https://github.com/Baedda/floating-form-labels
      ***************************************************************/

     ! function(t, i) {
         "function" == typeof define && define.amd ? define(["jquery"], i) : "object" == typeof exports ? i(require("jquery")) : i(t.jQuery)
     }(this, function(e) {
         var l = "floatingFormLabels",
             s = {
                 label: ".ffl-label",
                 formElements: "input, textarea",
                 floatedClass: "ffl-floated"
             };

         function o(t, i) {
             this._name = l, this.el = e(t), this.options = e.extend({}, s, i), this.label = this.el.find(this.options.label), this.input = this.el.find(this.options.formElements), this.floated = !1, this._init()
         }
         o.prototype = {
             _init: function() {
                 var t = this;
                 this._toggleClass(this._isFloated()), this._hasPlaceholder() ? this._toggleClass(!0) : (this.input.on({
                     "focus.ffl": function() {
                         t._toggleClass(!0)
                     },
                     "blur.ffl": function() {
                         t._toggleClass(t._isFloated())
                     },
                     "change.ffl": function() {
                         t._toggleClass(!0)
                     }
                 }), this.el.trigger("init.ffl", this))
             },
             _hasPlaceholder: function() {
                 return "" !== e.trim(this.input.attr("placeholder"))
             },
             _isFloated: function() {
                 return "" !== this.input.val() && null !== this.input.val() && 0 !== this.input.val().length
             },
             _toggleClass: function(t) {
                 t ? (this.el.addClass(this.options.floatedClass), this.floated = !0) : (this.el.removeClass(this.options.floatedClass), this.floated = !1), this.label.trigger("toggle.ffl", this)
             },
             destroy: function() {
                 this.input.off(".ffl"), this.el.removeClass(this.options.floatedClass).removeData(l)
             }
         }, e.fn[l] = function(t) {
             var i, s = Array.prototype.slice.call(arguments, 1);
             return this.each(function() {
                 e.data(this, l) ? "string" == typeof t && (i = e.data(this, l))[t].apply(i, s) : e.data(this, l, new o(this, t))
             })
         }
     });
 </script>
 <script>
     $(document).ready(function() {
     $('.ffl-wrapper').floatingFormLabels();
     });
 </script>

 <script>
     $(document).on("click", ".browse", function() {
  var file = $(this).parents().find(".file");
  file.trigger("click");
});
$('input[type="file"]').change(function(e) {
  var fileName = e.target.files[0].name;
  $("#file").val(fileName);

  var reader = new FileReader();
  reader.onload = function(e) {
    // get loaded data and render thumbnail.
    document.getElementById("preview").src = e.target.result;
  };
  // read the image file as a data URL.
  reader.readAsDataURL(this.files[0]);
});
 </script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>