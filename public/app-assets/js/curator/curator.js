(function ($) {
	"use strict";



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
      		New basicform submit With Reload
    	---------------------------------------*/
        $(".new_basicform_approved_with_reload").on('submit', function(e){
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var ContentFromEditor = CKEDITOR.instances.descriptionApprovedDetails.getData();

            let formData = new FormData(this);
            formData.append('description_details',ContentFromEditor);

            var basicbtnhtml=$('.basicbtn').html();
            // showLoader();
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
                    hideLoader();
                    if(response.success)
                    {
                        console.log(response.success);
                        $('.basicbtn').removeAttr('disabled')
                        Sweet('success',response.success);
                        $('.basicbtn').html(basicbtnhtml);
                        location.reload();
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
                }
            })


        });


        $(".new_basicform_reject_with_reload").on('submit', function(e){
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var ContentFromEditor = CKEDITOR.instances.descriptionRejectDetails.getData();

            let formData = new FormData(this);
            formData.append('description_details',ContentFromEditor);

            var basicbtnhtml=$('.basicbtn').html();
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
                        console.log(response.success);
                        $('.basicbtn').removeAttr('disabled')
                        Sweet('success',response.success);
                        $('.basicbtn').html(basicbtnhtml);
                        location.reload();
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
                }
            })


        });

        $(".new_basicform_verified_with_reload").on('submit', function(e){
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var ContentFromEditor = CKEDITOR.instances.descriptionVerifiedDetails.getData();

            let formData = new FormData(this);
            formData.append('description_details',ContentFromEditor);

            var basicbtnhtml=$('.basicbtn').html();
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
                        console.log(response.success);
                        $('.basicbtn').removeAttr('disabled')
                        Sweet('success',response.success);
                        $('.basicbtn').html(basicbtnhtml);
                        location.reload();
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
                }
            })


        });

        $(".new_basicform_verified_reject_with_reload").on('submit', function(e){
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var ContentFromEditor = CKEDITOR.instances.descriptionVerifiedRejectDetails.getData();

            let formData = new FormData(this);
            formData.append('description_details',ContentFromEditor);

            var basicbtnhtml=$('.basicbtn').html();
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
                        console.log(response.success);
                        $('.basicbtn').removeAttr('disabled')
                        Sweet('success',response.success);
                        $('.basicbtn').html(basicbtnhtml);
                        location.reload();
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
