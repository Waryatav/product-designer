$(document).ready(function () {

    $(document).on('click', '.send_ms', function () {

        // var name = $('.contact_us_js_name').val();
        // var city = $('.contact_us_js_city').val();
        // var we_need = $('.contact_us_js_we_need').val();
        // var budget = $('.contact_us_js_budget').val();
        // var mail = $('.contact_us_js_mail').val();
        // var phone = $('.contact_us_js_phone').val();
        //
        // if ((mail != '' || phone != '') && name != '' && city != '' && we_need != '') {
        //
        //     $.ajax({
        //         url: vars.url,
        //         type: "POST",
        //         data: {
        //             action: 'contact_us',
        //             data: {
        //                 mail: mail,
        //                 phone: phone,
        //                 name: name,
        //                 city: city,
        //                 we_need: we_need,
        //                 budget: budget,
        //
        //             },
        //         },
        //         success: function (data) {
        //             alert('Your request has been sent successfully');
        //             console.log(data);
        //
        //         }
        //     });
        //
        // }

    })

    $(document).on('change', '.contact_us_js_we_need', function () {

        get_service_placeholder(this,$('.contact_us_js_budget'));

    });

    $(document).on('change', '.contact_us_js_we_need2', function () {

        get_service_placeholder(this,$('.contact_us_js_budget2'));

    });



    function get_service_placeholder(select, placeholder) {
        var data_id = $("option:selected", select).attr('data-id');
        placeholder.attr('placeholder', '')
        if (data_id != undefined) {
            $.ajax({
                url: vars.url,
                type: "POST",
                data: {
                    action: 'get_service_placeholder',
                    data_id: data_id,
                },
                success: function (data) {
                    placeholder.attr('placeholder', data)
                }
            });
        }

    }
})