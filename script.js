
$(function () {

    $('button.subscribe-button').on('click', function (e) {

        $('#email').remove();
        $('#submit').remove();

        $('#emailDiv').append(
                '<input id="email" class="h-input" type="email" name="email" required="" placeholder="Your email here" value="" autocomplete="email">'
        );
        $('#submitDiv').append(
            '<input id="submit" type="submit" value="Subscribe" class="hs-button primary large">'
        );

    });

    $('form').on('submit', function (e) {
      e.preventDefault();
      $.ajax({
        type: 'post',
        url: $(this).attr('action'),
        data: $('#emailForm').serialize(),
        success: function () {
        //   alert('form was submitted');
            $('#email').remove();
            $('#submit').remove();
            $('h1.blog-modal-header').text("Thank you for subscribing to our Blog!");
        }
      });

    });

    /* Ajax functions */
    $(document).on('click','.eq-load-more:not(.loading)', function(){
      
      var that = $(this);
      var page = $(this).data('page');
      var newPage = page+1;
      var ajaxurl = that.data('url');
      that.addClass('loading');
      that.text("Loading...");
      $.ajax({
        
        url : ajaxurl,
        type : 'post',
        data : {
          
          page : page,
          action: 'eq_load_more'
          
        },
        error : function( response ){
          console.log(response);
        },
        success : function( response ){
          
          that.data('page', newPage);
          $('.eq-posts-container').append( response );
          that.removeClass('loading');
          that.text("Load More Posts");
        }
        
      });
      
    });
  });