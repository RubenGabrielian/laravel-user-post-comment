$(document).ready(function () {
    $(".add_comment").click(function () {
        let comment = $(this).prev().val();
        let post_id = $(this).attr('data-post');
        let _token = $('meta[name="csrf-token"]').attr('content');
        let newComment = $(`<div class='post-comment'>${comment}</div>`)

        $.ajax({
            url: "/add-comment",
            type: "POST",
            data: {
                comment,
                post_id,
                _token: _token
            },
            success: function (response) {
                if (response == 'saved') {
                    $(".comments").append(newComment)
                    $(".comment").val('')
                }
            },
        });
    })

    $(".reply").click(function (e) {
        e.preventDefault();
        let comment_id = $(this).attr('data-comment');
        let post_id = $(this).attr('data-post');
        let commentArea = $(`<div class="form-group"><input type='text' class='form-control reply_value' />
        <button data-comment="${comment_id}" data-post='${post_id}' class="btn add_reply btn-success mt-2">Add Reply</button></div>`)
        $(this).parents('.comment-area').append(commentArea)
    })




})
