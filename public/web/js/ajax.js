$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
});

$(document).ready(function() {
    let success = $('#success_flash_msg').text().trim();
    if (success.length > 0) {
        successMsg("Success", success);
    } else {
        let error = $('#error_flash_msg').text().trim();
        if (error.length > 0) {
            errorMsg("Error", error);
        }
    }
});

$('#commentform').on('submit', function(e) {
    e.preventDefault();
    var formdata = new FormData($(this)[0]);
    var url = $(this).attr('action');
    $.ajax({
        url: url,
        type: 'Post',
        cache: false,
        contentType: false,
        processData: false,
        data: formdata,
        success: function(data) {
            console.log(data);
            if (data.success) {
                getCommentTemplate(data.data);
                successMsg("Success", data.msg);
                $('#comment_text_area').val('');
            } else {
                errorMsg("Error", data.msg);
            }
        }

    });
});


function getCommentTemplate(data) {
    var avatar = data.avatar;
    var name = data.name;
    var date = data.date;
    var comment = data.comment;
    var template = $("#comment_template").clone(true, true);
    template.attr("id", null);
    template.find('#temp_img').attr("src", avatar);
    template.find('#temp_name').text(name);
    template.find('#temp_date').text(date);
    template.find('#temp_comment').html(comment);
    template.removeClass('d-none');
    template.appendTo("#comment_list_body");
}




$('.cart_ajax_form').on('submit', function(e) {
    e.preventDefault();
    var formdata = new FormData($(this)[0]);
    var item_id = $(this).attr('item_id');
    var url = $(this).attr('action');
    var hide = $(this).hasClass('hideItem');
    showSpinner(item_id);

    $.ajax({
        url: url,
        type: 'Post',
        cache: false,
        contentType: false,
        processData: false,
        data: formdata,
        success: function(data) {
            if (data.success) {
                successMsg("Success", data.msg);
                $('.course_cart_input_' + item_id).val(data.item_id);
                $('.cart_btn_text_' + item_id).text(data.title);
                $('.cart_btn_' + item_id).attr('title', data.title);
                $('.cart_form_' + item_id).attr('action', data.action);

                if (hide) {
                    $('.cartItem_' + item_id).addClass('d-none');
                }
            } else {
                errorMsg("Error", data.msg);
            }
            updateCart(data.quantity, data.price, data.discount, data.total);
            hideSpinner(item_id);
        }

    });
});

function updateCart(count, price = 0, discount = 0, total) {
    $('.cart_count').text(count);
    $('#cart_price').text(price);
    $('#cart_discount').text(discount);
    $('#cart_total').text(total);

    if (count < 1) {
        $('#has_cart_items').addClass('d-none');
        $('#no_cart_item').removeClass('d-none');
    }
}

function showSpinner(item_id) {
    $('.cart_btn_' + item_id).attr('disabled', true);
    $('.cart_btn_spinner_' + item_id).removeClass('d-none');
}



function hideSpinner(item_id) {
    $('.cart_btn_' + item_id).removeAttr('disabled');
    $('.cart_btn_spinner_' + item_id).addClass('d-none');
}




$('.section_load_video').on('click', function(e) {
    e.preventDefault();
    var url = $(this).attr('href');
    $.ajax({
        url: url,
        type: 'Get',
        cache: false,
        contentType: false,
        processData: false,
        data: null,
        success: function(data) {
            if (data.success) {
                successMsg("Success", data.msg);
                loadVideo(data.data.title, data.data.url);
            } else {
                errorMsg("Error", data.msg);
            }
        }

    });
});



$('#review_form i').on('click', function() {
    var thisVal = $(this).attr('data-alt');
    jQuery.each($('#review_form i'), function() {

        var loopVal = $(this).attr('data-alt');
        if (loopVal == thisVal) {
            $('#review_form #stars').val(thisVal);
        }
        if (loopVal <= thisVal) {
            $(this).removeClass('fa-star-o');
            $(this).addClass('fa-star');
        } else {
            $(this).removeClass('fa-star');
            $(this).addClass('fa-star-o');
        }
    });
});


function rebuildCourseReview(data) {
    $('.review_avg').html(data.avg);
    $('.avg_data_rating').attr('data-rating', data.avg);
    $('.review_count').html(data.count);
    $('.star1count').html(data.stars.one.count);
    $('.star2count').html(data.stars.two.count);
    $('.star3count').html(data.stars.three.count);
    $('.star4count').html(data.stars.four.count);
    $('.star5count').html(data.stars.five.count);

    $('.star1percent').css('width', data.stars.one.percent + '%');
    $('.star2percent').css('width', data.stars.two.percent + '%');
    $('.star3percent').css('width', data.stars.three.percent + '%');
    $('.star4percent').css('width', data.stars.four.percent + '%');
    $('.star5percent').css('width', data.stars.five.percent + '%');

}



$('#review_form').on('submit', function(e) {
    e.preventDefault();
    if ($('#review_form #stars').val().trim().length < 1) {
        return alert('Please select a star rating!');
    }
    if ($('#review_form #comment_field').val().trim().length < 1) {
        return alert('Please add a review comment!');
    }
    var formdata = new FormData($(this)[0]);
    var url = $(this).attr('action');

    $.ajax({
        url: url,
        type: 'Post',
        cache: false,
        contentType: false,
        processData: false,
        data: formdata,
        success: function(data) {
            if (data.success) {
                successMsg("Success", data.msg);
                rebuildCourseReview(data.data);
                $('#review_area').html("");
                getReviewTemplate(data.review);
                generateAllStars();

            } else {
                errorMsg("Error", data.msg);
            }
        }

    });
});


function getReviewTemplate(data) {
    var avatar = data.avatar;
    var name = data.name;
    var date = data.date;
    var stars = data.stars;
    var comment = data.comment;
    var template = $(".comment#template").clone(true, true);
    console.log(template);
    template.attr("id", null);
    template.find('img.avatar').attr("src", avatar);
    template.find('.author').text(name);
    template.find('.time').append(date);
    template.find('.user_review_stars').attr('data-rating', stars);
    template.find('.comment_section').html(comment);
    template.removeClass('d-none');
    template.appendTo(".commentlist");
}

function generateAllStars() {
    jQuery.each($('.user_review_stars'), function() {
        generateStars($(this));
    });
}

function generateStars(body) {
    // var body = $('.user_review_stars');
    var rating = body.attr('data-rating');
    jQuery.each(body.find('i'), function() {
        var loopVal = $(this).attr('data-alt');
        console.log(loopVal);
        console.log(rating);
        if (loopVal <= rating) {
            $(this).removeClass('fa-star-o');
            $(this).addClass('fa-star');
        } else {
            $(this).removeClass('fa-star');
            $(this).addClass('fa-star-o');
        }
    });
}