    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


    $('#find_account').on('click', function(e) {
        e.preventDefault();
        var acct_no = $('#account_no').val();
        var acct_name = $('#account_name');
        acct_name.text('Loading...');

        var formdata = new FormData();
        formdata.append("account_no", acct_no);

        $.ajax({
            url: "/agent/find-account-details",
            type: "POST",
            enctype: 'multipart/form-data',
            cache: false,
            contentType: false,
            processData: false,
            data: formdata,
            success: function(data) {
                console.log(data);
                acct_name.text(data.name);
                if (data.success) {
                    acct_name.css('color', 'green');
                } else {
                    acct_name.css('color', 'red');
                }

            }

        });

    });