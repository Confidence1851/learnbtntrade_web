// $('.dataTable').each(function() {
//     console.log('foiund');
//     if ($(this).hasClass('js-exportable')) {
//         $(this).removeClass('js-exportable');
//     }
//     $(this).addClass('js-basic-example');
// });

// $('.switchTableMode').click(function() {
//     $('.dataTable').removeClass('js-basic-example');
//     $('.dataTable').addClass('js-exportable');
// });

$('document').ready(function() {

    $('.checkItem').click(function() {
        if ($(this).attr('aria-checked') == 'true') {
            handleItem($(this), false);
        } else {
            handleItem($(this), true);
        }
    });

    function handleItem(item, option) {
        if (option) {
            item.attr('aria-checked', option);
            item.html('<i class="material-icons" style="color:green">check</i>')
        } else {
            item.attr('aria-checked', option);
            item.html('<i class="material-icons" style="color:red">cancel</i>')
        }
    }

    $('#checkAllItems').click(function() {
        $('.checkItem').each(function() {
            handleItem($(this), true);
        })
    });

    $('#uncheckAllItems').click(function() {
        $('.checkItem').each(function() {
            handleItem($(this), false);
        })
    });

    $('#approveBtn').click(function(e) {
        var inputItems = $('#inputItems');
        var itemsList = [];
        $('.checkItem').each(function() {
            if ($(this).attr('aria-checked') == 'true') {
                itemsList.push($(this).attr('id'));
            }
        });
        inputItems.val(itemsList);
        if (inputItems.val() == '') {
            e.preventDefault();
            alert('Select Items to approve!')
        }
    });




});