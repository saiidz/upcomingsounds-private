(function ($) {
	"use strict";

	/*----------------------------
      		basicform submit
    	------------------------------*/
	$("#productform").on('submit', function(e){
		e.preventDefault();
		var instance =$('.content').val()

		if (instance != null) {
			for ( instance in CKEDITOR.instances ) {
				CKEDITOR.instances[instance].updateElement();
			}
		}

		var btnhtml=$('.basicbtn').html();

		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
		$.ajax({
			type: 'POST',
			url: this.action,
			data: new FormData(this),
			dataType: 'json',
			contentType: false,
			cache: false,
			processData:false,
			beforeSend: function() {

				$('.basicbtn').attr('disabled','')
				$('.basicbtn').html('<div class="spinner-border text-light" role="status"><span class="sr-only">Loading...</span></div>Please Wait....')

			},

			success: function(response){
				$('.basicbtn').removeAttr('disabled')
				Sweet('success',response)
				$('.basicbtn').html(btnhtml)

			},
			error: function(xhr, status, error)
			{
				$('.basicbtn').removeAttr('disabled');
				$('.basicbtn').html(btnhtml);

				$.each(xhr.responseJSON.errors, function (key, item)
				{
					Sweet('error',item)
					$("#errors").html("<li class='text-danger'>"+item+"</li>")
				});
				errosresponse(xhr, status, error);
			}
		})


	});


	/*----------------------------
      		basicform submit
    	------------------------------*/
	$("#basicform").on('submit', function(e){
		e.preventDefault();

		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
		$.ajax({
			type: 'POST',
			url: this.action,
			data: new FormData(this),
			dataType: 'json',
			contentType: false,
			cache: false,
			processData:false,
			beforeSend: function() {

				   $('.basicbtn').attr('disabled','');



    		},

			success: function(response){
				$('.basicbtn').removeAttr('disabled')
				Sweet('success',response)


			},
			error: function(xhr, status, error)
			{
				$('.basicbtn').removeAttr('disabled')
				$('.errorarea').show();
				$.each(xhr.responseJSON.errors, function (key, item)
				{
					Sweet('error',item)
					$("#errors").html("<li class='text-danger'>"+item+"</li>")
				});
				errosresponse(xhr, status, error);
			}
		})
	});

	/*----------------------------
      		basicform submit
    	------------------------------*/
	$(".basicform").on('submit', function(e){
		e.preventDefault();
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
		var basicbtnhtml=$('.basicbtn').html();
		$.ajax({
			type: 'POST',
			url: this.action,
			data: new FormData(this),
			dataType: 'json',
			contentType: false,
			cache: false,
			processData:false,
			beforeSend: function() {

				$('.basicbtn').html('<div class="spinner-border text-light spinner-border-sm" role="status"><span class="sr-only">Loading...</span></div> Please Wait....');
				$('.basicbtn').attr('disabled','');

			},

			success: function(response){
				$('.basicbtn').removeAttr('disabled')
				Sweet('success',response);
				$('.basicbtn').html(basicbtnhtml);

			},
			error: function(xhr, status, error)
			{
				$('.basicbtn').html(basicbtnhtml);
				$('.basicbtn').removeAttr('disabled')
				$('.errorarea').show();
				$.each(xhr.responseJSON.errors, function (key, item)
				{
					Sweet('error',item)
					$("#errors").html("<li class='text-danger'>"+item+"</li>")
				});
				errosresponse(xhr, status, error);
			}
		})
	});

	/*--------------------------------------
      		basicform submit With Reload
    	---------------------------------------*/
	$(".basicform_with_reload").on('submit', function(e){
		e.preventDefault();
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
		var basicbtnhtml=$('.basicbtn').html();
        showLoader();
		$.ajax({
			type: 'POST',
			url: this.action,
			data: new FormData(this),
			dataType: 'json',
			contentType: false,
			cache: false,
			processData:false,
			beforeSend: function() {

				$('.basicbtn').html('<div class="spinner-border text-light spinner-border-sm" role="status"><span class="sr-only">Loading...</span></div> Please Wait....');
				$('.basicbtn').attr('disabled','');

			},
            success:function(response)
            {
                if(response.success)
                {
                    hideLoader();
                    console.log(response.success);
                    $('.basicbtn').removeAttr('disabled')
                    Sweet('success',response.success);
                    $('.basicbtn').html(basicbtnhtml);
                    location.reload();
                }
                if(response.errors)
                {
                    hideLoader();
                    $('.basicbtn').html(basicbtnhtml);
                    $('.basicbtn').removeAttr('disabled')
                    $('.errorarea').show();
                    $.each(response.errors, function (key, item)
                    {
                        Sweet('error',item)
                        $("#errors").html("<li class='text-danger'>"+item+"</li>");
                    });
                }
                if(response.error)
                {
                    hideLoader();
                    $('.basicbtn').removeAttr('disabled')
                    Sweet('error',response.error);
                }
            }
			// success: function(response){
			// 	$('.basicbtn').removeAttr('disabled')
			// 	Sweet('success',response);
			// 	$('.basicbtn').html(basicbtnhtml);
			// 	location.reload();
			// },
			// error: function(xhr, status, error)
			// {
			// 	$('.basicbtn').html(basicbtnhtml);
			// 	$('.basicbtn').removeAttr('disabled')
			// 	$('.errorarea').show();
			// 	$.each(xhr.responseJSON.errors, function (key, item)
			// 	{
			// 		Sweet('error',item)
			// 		$("#errors").html("<li class='text-danger'>"+item+"</li>");
			// 	});
			// 	errosresponse(xhr, status, error);
			// }
		})


	});

	/*--------------------------------------
      		Loader
    	---------------------------------------*/

    var preload = document.getElementById('loadings');
    function hideLoader()
    {
        preload.style.display = "none";
    }

    function showLoader()
    {
        preload.style.display = "block";
    }


	/*--------------------------------------
      		basicform submit With Reset
    	---------------------------------------*/
	$(".basicform_with_reset").on('submit', function(e){
		e.preventDefault();
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
		var basicbtnhtml=$('.basicbtn').html();
        // showLoader();
		$.ajax({
			type: 'POST',
			url: this.action,
			data: new FormData(this),
			dataType: 'json',
			contentType: false,
			cache: false,
			processData:false,
			beforeSend: function() {

				$('.basicbtn').html('<div class="spinner-border text-light spinner-border-sm" role="status"><span class="sr-only">Loading...</span></div> Please Wait....');
				$('.basicbtn').attr('disabled','');

			},

			success: function(response){
                // hideLoader();
                if(response.error)
                {
                    Sweet('error',response.error);
                }else{
                    Sweet('success',response)
                }

				$('.basicbtn').removeAttr('disabled')
				// Sweet('success',response);
				$('.basicbtn').html(basicbtnhtml);
				$('.basicform_with_reset').trigger('reset');
			},
			error: function(xhr, status, error)
			{
                // hideLoader();
                console.log(xhr);
				$('.basicbtn').html(basicbtnhtml);
				$('.basicbtn').removeAttr('disabled')
				$('.errorarea').show();
				$.each(xhr.responseJSON.errors, function (key, item)
				{
					Sweet('error',item)
					$("#errors").html("<li class='text-danger'>"+item+"</li>")
				});
				errosresponse(xhr, status, error);
			}
		})
	});

    /*--------------------------------------
      		basicform submit With Reset
    	---------------------------------------*/
    $(".basicform_with_track_store").on('submit', function(e){
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var basicbtnhtml=$('.basicbtn').html();
        showLoader();
        $.ajax({
            type: 'POST',
            url: this.action,
            data: new FormData(this),
            dataType: 'json',
            contentType: false,
            cache: false,
            processData:false,
            beforeSend: function() {

                $('.basicbtn').html('<div class="spinner-border text-light spinner-border-sm" role="status"><span class="sr-only">Loading...</span></div> Please Wait....');
                $('.basicbtn').attr('disabled','');

            },

            success: function(response){
                hideLoader();

                if(response.success)
                {
                    $('.basicbtn').removeAttr('disabled')
                    Sweet('success',response.success);
                    $('.basicbtn').html(basicbtnhtml);

                    if (response.promote)
                    {
                        $('.basicform_with_track_store').trigger('reset');
                        $('#add-track-promote').css('display','none');
                        $('#StepFirst').empty();
                        $('#StepFirst').html(response.promote);
                        setTimeout(function () {
                            location.reload();
                        }, 10000);
                    }else {
                        location.reload();
                    }
                }
                if(response.errors)
                {
                    $('.basicbtn').html(basicbtnhtml);
                    $('.basicbtn').removeAttr('disabled')
                    $('.errorarea').show();
                    $.each(response.errors, function (key, item)
                    {
                        Sweet('error',item)
                        $("#errors").html("<li class='text-danger'>"+item+"</li>");
                    });
                }
                if(response.error)
                {
                    $('.basicbtn').removeAttr('disabled');
                    $('.basicbtn').html(basicbtnhtml);
                    Sweet('error',response.error);
                }
            },
            // error: function(xhr, status, error)
            // {
            //     // hideLoader();
            //     console.log(xhr);
            //     $('.basicbtn').html(basicbtnhtml);
            //     $('.basicbtn').removeAttr('disabled')
            //     $('.errorarea').show();
            //     $.each(xhr.responseJSON.errors, function (key, item)
            //     {
            //         Sweet('error',item)
            //         $("#errors").html("<li class='text-danger'>"+item+"</li>")
            //     });
            //     errosresponse(xhr, status, error);
            // }
        })
    });
	/*--------------------------------------
      		basicform submit With Remove
    	---------------------------------------*/
	$(".basicform_with_remove").on('submit', function(e){
		e.preventDefault();
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
		var basicbtnhtml=$('.basicbtn').html();
		$.ajax({
			type: 'POST',
			url: this.action,
			data: new FormData(this),
			dataType: 'json',
			contentType: false,
			cache: false,
			processData:false,
			beforeSend: function() {

				$('.basicbtn').html("Please Wait....");
				$('.basicbtn').attr('disabled','')

			},

			success: function(response){
				$('.basicbtn').removeAttr('disabled')
				Sweet('success',response);
				$('.basicbtn').html(basicbtnhtml);
				$('input[name="ids[]"]:checked').each(function(i){
					var ids = $(this).val();
					$('#row'+ids).remove();
				});

			},
			error: function(xhr, status, error)
			{
				$('.basicbtn').html(basicbtnhtml);
				$('.basicbtn').removeAttr('disabled')
				$('.errorarea').show();
				$.each(xhr.responseJSON.errors, function (key, item)
				{
					Sweet('error',item)
					$("#errors").html("<li class='text-danger'>"+item+"</li>")
				});
				errosresponse(xhr, status, error);
			}
		})
	});


	/*--------------------------------------
      		Login Form submit With Reload
    	---------------------------------------*/
	$(".loginform").on('submit', function(e){
		e.preventDefault();
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
		var basicbtnhtml=$('.basicbtn').html();
		$.ajax({
			type: 'POST',
			url: this.action,
			data: new FormData(this),
			dataType: 'json',
			contentType: false,
			cache: false,
			processData:false,
			beforeSend: function() {

       			$('.basicbtn').html("Please Wait....");
       			$('.basicbtn').attr('disabled','')

    		},

			success: function(response){
				$('.basicbtn').removeAttr('disabled')
				$('.basicbtn').html(basicbtnhtml);
				location.reload();
			},
			error: function(xhr, status, error)
			{
				$('.basicbtn').html(basicbtnhtml);
				$('.basicbtn').removeAttr('disabled')

				$.each(xhr.responseJSON.errors, function (key, item)
				{
					Sweet('error',item)
					$("#errors").html("<li class='text-danger'>"+item+"</li>")
				});
				errosresponse(xhr, status, error);
			}
		})
	});

	/*--------------------------------------
      		id basicform1 when submit
    	---------------------------------------*/
	$("#basicform1").on('submit', function(e){
		e.preventDefault();

		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
		$.ajax({
			type: 'POST',
			url: this.action,
			data: new FormData(this),
			dataType: 'json',
			contentType: false,
			cache: false,
			processData:false,
			success: function(response){

			},
			error: function(xhr, status, error)
			{
				$('.errorarea').show();

				$.each(xhr.responseJSON.errors, function (key, item)
				{
					Sweet('error',item)
					$("#errors").html("<li class='text-danger'>"+item+"</li>")
				});
				errosresponse(xhr, status, error);
			}
		})
	});





    /*--------------------------------------
      		New basicform submit With Reload
    	---------------------------------------*/
	$(".new_basicform_with_reload").on('submit', function(e){
		e.preventDefault();
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
        var ContentFromEditor = CKEDITOR.instances.descriptionDetails.getData();

        let formData = new FormData(this);
        formData.append('description_details',ContentFromEditor);

		var basicbtnhtml=$('.basicbtn').html();
        showLoader();
		$.ajax({
			type: 'POST',
			url: this.action,
			data: formData,
			dataType: 'json',
			contentType: false,
			cache: false,
			processData:false,
			beforeSend: function() {

				$('.basicbtn').html('<div class="spinner-border text-light spinner-border-sm" role="status"><span class="sr-only">Loading...</span></div> Please Wait....');
				$('.basicbtn').attr('disabled','');

			},
            success:function(response)
            {
                if(response.success)
                {
                    hideLoader();
                    console.log(response.success);
                    $('.basicbtn').removeAttr('disabled');
                    $('.basicbtn').html(basicbtnhtml);
                    if(response.directOffer)
                    {
                        Sweet('success',response.directOffer);
                        $('#new_basicform_with_reload_direct')[0].reset();
                        $('#descriptionDetails').val('');
                        $('#submitSuccessMessage').html(response.directOffer);
                    }else {
                        Sweet('success',response.success);
                        location.reload();
                    }
                }
                if(response.errors)
                {
                    hideLoader();
                    $('.basicbtn').html(basicbtnhtml);
                    $('.basicbtn').removeAttr('disabled')
                    $('.errorarea').show();
                    $.each(response.errors, function (key, item)
                    {
                        Sweet('error',item)
                        $("#errors").html("<li class='text-danger'>"+item+"</li>");
                    });
                }
            }
		})


	});

	/*--------------------------------------
      		AllCheck Checkbox Active
    	---------------------------------------*/
	$(".checkAll").on('click',function(){
		$('input:checkbox').not(this).prop('checked', this.checked);
	});


	/*------------------------------------------------------------
      		if all child selected then parent checked - Dynamic
    	--------------------------------------------------------------*/
	$('.child').on('change', function () {
	var parent = $(this).closest('.parent'),
		status = parent.find('input.child').not(':checked').length === 0;
		parent.prev("label").find('.parent').prop('checked', status);
	}).trigger('change');

	$(".cancel").on('click',function(e) {
		e.preventDefault();
		var link = $(this).attr("href");

		Swal.fire({
			title: 'Are you sure?',
			text: "You won't be able to revert this!",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Yes, Do It!'
		}).then((result) => {
			if (result.value == true) {
				window.location.href = link;
			}
		})
	});

	/*--------------------------------------
      		Sweet Alert Active
    	---------------------------------------*/
	function Sweet(icon,title,time=3000){
		const Toast = Swal.mixin({
			toast: true,
			position: 'top-end',
			showConfirmButton: false,
			timer: time,
			timerProgressBar: true,
			onOpen: (toast) => {
				toast.addEventListener('mouseenter', Swal.stopTimer)
				toast.addEventListener('mouseleave', Swal.resumeTimer)
			}
		})
		Toast.fire({
			icon: icon,
			title: title,
		})
	}
})(jQuery);
