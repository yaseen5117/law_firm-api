// rurn date picker if existed
if ($('[data-datepicker]').length) {
	var datepickerOptions = {
		format: 'mm/dd/yyyy',
		startDate: '0d',
		autoclose: true
	};
	$('[data-datepicker]').datepicker(datepickerOptions);
};



if ($('[data-datepicker-all]').length) {
	var datepickerOptions = {
		format: 'mm/dd/yyyy',
		autoclose: true
	};
	$('[data-datepicker-all]').datepicker(datepickerOptions);
};

if ($('[data-datepicker-archived]').length) {
	var datepickerOptionsWithPast = {
		format: 'mm/dd/yyyy',
		endDate: '-1d',
		autoclose: true
	};
	$('[data-datepicker-archived]').datepicker(datepickerOptionsWithPast);
};


if ($('[data-datepicker-multi]').length) {
	var datepickerOptions_old = {
		format: 'mm/dd/yyyy',
		multidate: true,
		showClose: true,
	};
	$('[data-datepicker-multi]').datepicker(datepickerOptions_old);
};


if ($('[data-datepickerold]').length) {
	var datepickerOptions_old = {
		format: 'mm/dd/yyyy',
		autoclose: true
	};
	$('[data-datepickerold]').datepicker(datepickerOptions_old);
};

// rurn date picker if existed
if ($('[data-datepicker-month-only]').length) {
	var datepickerOptions = {
		startView: 1,
		minViewMode: 1,
		format: 'MM'
	};
	$('[data-datepicker-month-only]').datepicker(datepickerOptions);
};

// rurn date picker if existed
if ($('[data-datepicker-year-only]').length) {
	var datepickerOptions = {
		startView: 1,
		viewMode: 2,
		minViewMode: 2,
		format: 'yyyy',
	};
	$('[data-datepicker-year-only]').datepicker(datepickerOptions);
};


// rurn select2 if existed
if ($('.select2').length) {
	$('.select2').select2();
};

if ($('.select2_full_width').length) {
	$('.select2_full_width').select2({ width: 'resolve' });    
};


// rurn daterangepicker if existed
if ($('[data-daterangepicker]').length) {
	$('[data-daterangepicker]').daterangepicker({
		autoApply:true
	});
};



		var CORE = (function($){
			function __ajaxCall(url, type, method, successCallback){
				$.ajax({
					url: url,
					type: type,
					data: {_method: method},
					success: successCallback
				});
			}

			return {
				ajaxDelete : function(url, successCallback){
					__ajaxCall(url, 'post', 'delete', successCallback);
				},
				ajaxPatch : function(url, successCallback){
					__ajaxCall(url, 'post', 'patch', successCallback);
				},
				confirmDeletion : function(callback){
					swal({
						title: "Are you sure?",
						text: "You will not be able to recover this record!",
						type: "warning",
						showCancelButton: true,
						confirmButtonColor: "#DD6B55",
						confirmButtonText: "Yes, delete it!",
						closeOnConfirm: true
					}, callback);
				}
			};
		})($);

		var GLOBAL = (function($, CORE){

			// displays flash message if it's present
			function __displayFlashMessage(flashMessage){
				// choose title depending on the type of the flash message
				var title = '';
				switch(flashMessage.type){
					case 'success'  : title = 'Success!';               break;
					case 'info'     : title = 'Oops, can\'t do that!!'; break;
					case 'warning'  : title = 'Warning!';               break;
					case 'error'    : title = 'Error!';                 break;

					default: return; // return if the type is not present or is incorrect
				}

				if(flashMessage.type === 'success'){
					swal({
						title: title,
						text: flashMessage.description,
						type: "success",
						timer: 1000,
						showConfirmButton: false
					});
				} else {
					swal({
						title: title,
						text: flashMessage.description,
						type: flashMessage.type,
						showConfirmButton: true
					});
				}
			}

			//// USAGE
			// data-delete          - used to mark the element to delete. if url is provided, the ajax
			//                        call will be issued to that email
			// data-delete-trigger  - used to mark the element that triggers the deletion. if 'no-confirm'
			//                        flag is set, confirmation popup won't appear

			function itemDeletionHandler(event){
				event.preventDefault();

				var $deletionTrigger = $(this);
				var $itemToDelete = $deletionTrigger.closest('[data-delete]');

				// set flags
				var noConfirm   = $deletionTrigger.data('delete-trigger') === 'no-confirm';
				var local       = !$itemToDelete.data('delete');

				// if trigger-delete is set to no-confirm, just delete
				// the html element without making a call to the server
				if(noConfirm && local){
					$itemToDelete.remove();
					return;
				}

				CORE.confirmDeletion(function(){
					// DO NOT send a request to the server
					if(local){
						$itemToDelete.remove();
						return;
					}

					// TODO: refactor the code into slimmer chunks
					// send request to the server
					CORE.ajaxDelete($itemToDelete.data('delete'), function(response){
						var defaultFlashMessage = {};
						var customFlashMessage = {};
						
						if(response=='success'){
							$itemToDelete.remove();

							defaultFlashMessage.type = 'success';
							defaultFlashMessage.description = 'The entry was successfully deleted';
						} else if(response=='info') {
							defaultFlashMessage.type = 'info';
							defaultFlashMessage.description = "This record in being used in reservation";
						}else if(response=='error_inventories') {
							defaultFlashMessage.type = 'info';
							defaultFlashMessage.description = "There are Inventories in system related to this attribute. Please delete inventories and then you can delete this attribute";
						}else if(response=='error_values') {
							defaultFlashMessage.type = 'info';
							defaultFlashMessage.description = "There are Attribute Values in system related to this attribute type. Please delete its values and then you can delete this attribute type";
						}else if(response=='error_reservees') {
							defaultFlashMessage.type = 'info';
							defaultFlashMessage.description = "There are reservations in system linked to this product.";
						} else {
							defaultFlashMessage.type = 'error';
							defaultFlashMessage.description = 'The entry could not be deleted';
						}


						// if flash message is set, display it, if not - display the default one
						if(response.flashMessage){
							__displayFlashMessage(response.flashMessage)
						} else {
							__displayFlashMessage(defaultFlashMessage);
						}
					});
				});
			}

			function itemRefreshHandler(e){
				e.preventDefault();

				var $parent = $(this).closest('[data-refresh]');
				var shouldReloadPage = $(this).data('refresh-trigger');

				$.ajax({
					url: $parent.data('refresh'),
					type: 'get',
					success: function(response){
						if(response.html){
							var $html = $(response.html);

							$parent.fadeOut(250, function(){
								if($(this).prev().length){
									$(this).prev().after($html);
								} else {
									$(this).parent().prepend($html)
								}

								$(this).remove();
							});
						}

						if(shouldReloadPage) location.reload(true);
					}
				});
			}

			return {
				configureAjax : function(){
					// includes csrf token for every ajax call
					$.ajaxSetup({
						headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
					});
				},
				registerEventHandlers : function() {
					$(document).on('click', '[data-delete-trigger]', itemDeletionHandler);
					$(document).on('click', '[data-refresh-trigger]', itemRefreshHandler);
				},
				displayFlashMessage : function(flashMessage){
					__displayFlashMessage(flashMessage);
				}
			};
		})($, CORE);
		GLOBAL.configureAjax();
		GLOBAL.registerEventHandlers();

		//var ADDITIONAL_MAIL_ADDITION = (function(){
		//
		//	function itemAdditionHandler(event){
		//		event.preventDefault();
		//
		//		var $itemToAdd = $('[data-add]');
		//
		//		CORE.ajaxPatch($itemToAdd.data('add'), function(response, $itemToAdd){
		//			console.log($itemToAdd);
		//
		//			if(response.success){
		//				var $table = $('[data-add-target]');
		//				var $templateTr = $table.find('tr').last();
		//
		//				var $templateTrClone = $templateTr.clone;
		//
		//				// set number of the new entry
		//				var $firstTd = $templateTrClone.find('td:nth-child(1)');
		//
		//				var $previousTrFirstTd = $templateTrClone.prev().find('td:nth-child(1)');
		//				var num = Number($previousTrFirstTd.text()) ? Number($previousTrFirstTd.text()) + 1 : 1;
		//
		//				$firstTd.text(num + '.');
		//
		//				// set the email of the new entry
		//				var $secondTd = $templateTrClone.find('td:nth-child(2)');
		//				$secondTd.text($itemToAdd.val());
		//
		//				// configure the ajax deletion for the new entry
		//				var itemDeletionLink = $templateTrClone.data('delete').replace('placeholder', $itemToAdd.val());
		//				$templateTrClone.data('delete', itemDeletionLink);
		//			}
		//		});
		//		$('data-add-info')
		//	}
		//
		//	return {
		//		registerEventHandlers : function(){
		//			$(document).on('click', '[data-add-trigger]', itemAdditionHandler)
		//		}
		//	}
		//})($, CORE);
		//ADDITIONAL_MAIL_ADDITION.registerEventHandlers();


// rurn date picker if existed
if ($('[data-dt-start]').length) {
	var datepickerOptions = {
		format: 'mm/dd/yyyy',
		startDate: '0d',
		autoclose: true
	};
	
		$start_date = $('[data-dt-start]');
		$end_date = $('[data-dt-end]');

		//Date picker
		$start_date.datepicker(datepickerOptions);
		$end_date.datepicker(datepickerOptions);

		
		$start_date.datepicker().on('changeDate', function (ev) {
		    console.log($(this).val());
		    $end_date.val("");
		    $end_date.datepicker('setStartDate', $(this).val());
		});
		
};

// rurn date picker if existed
if ($('[data-dt-start1]').length) {
	var datepickerOptions1 = {
		format: 'mm/dd/yyyy',
		startDate: '0d',
		autoclose: true
	};
	
		$start_date1 = $('[data-dt-start1]');
		$end_date1 = $('[data-dt-end1]');

		//Date picker
		$start_date1.datepicker(datepickerOptions1);
		$end_date1.datepicker(datepickerOptions1);

		
		$start_date1.datepicker().on('changeDate', function (ev) {
		    console.log($(this).val());
		    $end_date1.val("");
		    $end_date1.datepicker('setStartDate', $(this).val());
		});
		
};

// rurn date picker if existed
if ($('[data-dt-start-all]').length) {
	var datepickerOptions1 = {
		format: 'mm/dd/yyyy',
		autoclose: true
	};
	
		$start_date1 = $('[data-dt-start-all]');
		$end_date1 = $('[data-dt-end-all]');

		//Date picker
		$start_date1.datepicker(datepickerOptions1);
		$end_date1.datepicker(datepickerOptions1);

		
		$start_date1.datepicker().on('changeDate', function (ev) {
			  var date = new Date($(this).val());
	          //date.setDate(date.getDate() + 1);
	          date.setDate(date.getDate());
	          $end_date1.val("");
	          //$end_date1.datepicker('destroy');
	          $end_date1.datepicker(datepickerOptions);
	          $end_date1.datepicker('setStartDate', date);
		});
		
};

// rurn date picker if existed
if ($('[data-dt-start-future]').length) {
	var datepickerOptions1 = {
		format: 'mm/dd/yyyy',
		startDate: '1d',
		autoclose: true
	};
	
		$start_date1 = $('[data-dt-start-future]');
		$end_date1 = $('[data-dt-end-future]');

		//Date picker
		$start_date1.datepicker(datepickerOptions1);
		$end_date1.datepicker(datepickerOptions1);

		
		$start_date1.datepicker().on('changeDate', function (ev) {
			  var date = new Date($(this).val());
	          //date.setDate(date.getDate() + 1);
	          date.setDate(date.getDate());
	          $end_date1.val("");
	          //$end_date1.datepicker('destroy');
	          $end_date1.datepicker(datepickerOptions);
	          $end_date1.datepicker('setStartDate', date);
		});
		
};

$('[data-datepicker-dynamic]').on('click', function(event) {
	
	var datepickerOptions = {
		format: 'mm/dd/yyyy',
		startDate: '0d',
		autoclose: true
	};
	$('[data-datepicker-dynamic]').datepicker(datepickerOptions);
});

var delay = (function(){
            var timer = 0;
            return function(callback, ms){
                clearTimeout (timer);
                timer = setTimeout(callback, ms);
            };
        })();



$("#phone").mask("(999) 999-9999");