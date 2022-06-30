/*--------------------------------------
      		basicform submit With Reload
    	---------------------------------------*/
        $(".basicform_with_reload").on('submit', function(e){
            alert('aa');
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
                    location.reload();
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

