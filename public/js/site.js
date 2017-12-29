$(document).ready(function () {
    $(window).scroll(function(){
        if($(this).scrollTop()>150){
            $("#up_to_top").show();
            $(".header-bottom").addClass('fixNav')
        }else{
            $(".header-bottom").removeClass('fixNav')
            $("#up_to_top").hide();
        }}
    );

    $("#up_to_top").click(function(){
        $("html,body").animate({
            scrollTop:0
        },777);
    });

    $('#btn-filter-prd').click(function () {
        $('#filter').slideToggle('slow');
    });

    $('.filter-frm').change(function () {
        var input = $(this).find('.form-val');
        var data = new FormData();

        for (var i = 0; i < input.length; i++) {
            if ($(input[i]).attr("type") == 'radio' || $(input[i]).attr("type") == 'checkbox') {
                if ($(input[i]).is(':checked')) {
                    data.append($(input[i]).attr("name"), $(input[i]).val());
                }
            }
            else {
                data.append($(input[i]).attr("name"), $(input[i]).val());
            }
        }

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: 'loc-san-pham',
            type: 'post',
            contentType: false,
            processData: false,
            cache: false,
            data: data,
            success: function (responce) {
                $('#list-product').html(responce);
            },
            error: function (xhr, ajaxOptions, thrownError) {
                console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            }
        });
    });

    // $('.add-to-cart').click(function (e) {
    //     e.preventDefault();
    //     $.ajax({
    //         url: $(this).attr('href'),
    //         success: function (responce) {
    //             $('#add-cart-success').modal('show');
    //             $('#cart-modal').html(responce);
    //             $('.beta-select').click(function () {
    //                 var drop = $(this).parent().find('.beta-dropdown');

    //                 drop.slideToggle('slow');
    //             });
    //         },
    //         error: function (xhr, ajaxOptions, thrownError) {
    //             console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
    //         }
    //     });
    // });
})