$(window).on('load',function() {

    $(document).on('click','.upvote', function(){

        $post_id = $(this).closest('.post').attr('id').substring('5');
        $vote_count = $(this).siblings('.vote');
        $this = $(this);

        $.ajax({
            url:'/api/upvote/'+$post_id,
            type: 'GET',
            success: function(result){
                $vote_count.html(result);
                $this.addClass('text-success');
                $this.siblings('.downvote-style').removeClass('text-info').removeClass('undovote').addClass('downvote');
                $this.removeClass('upvote');
                $this.addClass('undovote');
            }
        })
    });

    $(document).on('click','.downvote', function(){

        $post_id = $(this).closest('.post').attr('id').substring('5');
        $vote_count = $(this).siblings('.vote');
        $this = $(this);

        $.ajax({
            url:'/api/downvote/'+$post_id,
            type: 'GET',
            success: function(result){
                $vote_count.html(result);
                $this.addClass('text-info');
                $this.siblings('.upvote-style').removeClass('text-success').removeClass('undovote').addClass('upvote');
                $this.removeClass('downvote');
                $this.addClass('undovote');
            }
        })
    });

    $(document).on('click','.undovote', function(){

        $post_id = $(this).closest('.post').attr('id').substring('5');
        $vote_count = $(this).siblings('.vote');
        $this = $(this);

        $.ajax({
            url:'/api/undovote/'+$post_id,
            type: 'GET',
            success: function(result){
                $vote_count.html(result);
                if ($this.hasClass('upvote-style')) {
                    $this.removeClass('text-success').addClass('upvote');
                    $this.siblings('.downvote-style').removeClass('text-info').addClass('downvote');
                } else {
                    $this.removeClass('text-info').addClass('downvote');
                    $this.siblings('.upvote-style').removeClass('text-success').addClass('upvote');
                }
                $this.removeClass('undovote');
            }
        })
    });


});