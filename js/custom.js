(function($) {
  $(document).ready(function() {
    let lastpage = '';
    //get a random post and append to body
    $('#new-quote-button').on('click', function(event) {
      event.preventDefault();
      console.log('click');
      $('.thequote').remove();
      $('.quotetitle').remove();
      getQuote();
    }); //on click event

    function getQuote() {
      //store url of last page into the last page variable.
      lastpage = document.URL;
      $.ajax({
        method: 'GET',
        url:
          qod_vars.rest_url +
          'wp/v2/posts?filter[orderby]=rand&filter[posts_per_page]=1'
      })
        .done(function(data) {
          // $('.entry-content').remove();
          //append content to the DOM  e.g. replace the quote conent with rest API content
          //no loop no filter, just figure out what the content is, and replace it.
          console.log(data);
          const quote = data[0];

          $('.entry-content').append(
            `<div class="thequote">
            ${quote.content.rendered}
            </div>`
          );
          $('.entry-meta').append(
            `<h2 class="quotetitle">-  ${quote.title.rendered} 
            </h2>`
          );

          if (quote._qod_quote_source == 0) {
            console.log('nosource');
          } else {
            $('.quotetitle').append(
              `, <a href="${quote._qod_quote_source_url}">${
                quote._qod_quote_source
              }</a>`
            );
            console.log(quote._qod_quote_source);
            console.log(quote._qod_quote_source_url);
          }

          //figure out the post slug
          history.pushState(null, null, qod_vars.home_url + '/' + quote.slug);
        })
        .fail(function(err) {
          //append a message for the users or have an alert
          console.log(err);
        });
    } // end of getquote()

    //when hit the back button, will refresh papage and replace the url with the lastpage url
    $(window).on('popstate', function() {
      window.location.replace(lastpage);
    });

    //submit the form and create a new quote post
    $('#quote-submission-form').on('submit', function(event) {
      event.preventDefault();
      postQuote();
    });

    function postQuote() {
      //get vaue of your form input
      const quotecontent = $('#quote-content').val();
      const quotetitle = $('#quote-submission-form').val();
      const quotesource = $('#quote-source').val();
      const quotesourceurl = $('#quote-source-url').val();

      $.ajax({
        method: 'POST',
        url: qod_vars.rest_url + 'wp/v2/posts',
        data: {
          title: quotetitle,
          content: quotecontent,
          qod_quote_source: quotesource,
          qod_quote_sourceurl: quotesourceurl
        },
        beforeSend: function(xhr) {
          xhr.setRequestHeader('X-WP-Nonce', qod_vars.nonce);
        }
      })
        .done(function(response) {
          //not appending anything.
          //.slideup the form
          //append a success message
          console.log(response);
          // $('.form-fields').slideUp(1000);
          $('.quote-submission-wraper').slideUp(1700);
          $('.quote-submission').append(
            '<p class="submission-msg">Your form has been submitted!</p>'
          );

          // alert('form submitted!');
        })
        .fail(function(err) {
          console.log(err);
          alert('Form did not submit, missing some fields?');
          // output message for the user somehting went wrong
        });
    } //end of post quote
  }); //doc ready
})(jQuery);
