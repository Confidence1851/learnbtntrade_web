<script>
$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
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
</script>
