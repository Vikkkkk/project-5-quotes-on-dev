(function($) {
  $(document).ready(function() {
    //get a random post and append to body
    $('#new-quote-button').on('click', function(event) {
      event.preventDefault();
      console.log('click');
      //create ajax request here
    }); //on click event

    function getQuote() {
      $.ajax({
        method: 'GET',
        url:
          qod_vars.rest_url +
          'wp/v2/posts?filter[orderby]=rand&filter[posts_per_page]=1'
      })
        .done(function(data) {
          //append content to the DOM  e.g. replace the quote conent with rest API content
          //no loop no filter, just figure out what the content is, and replace it.
          console.log(data);
        })
        .fail(function(err) {
          //append a message for the users or have an alert
          console.log(err);
        });
    }
  }); //doc ready
})(jQuery);
