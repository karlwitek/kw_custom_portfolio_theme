jQuery(document).ready(function($) {

  $('#kwcpt-contact-form').on('focusin', function(event) {
    $('#kwcpt-user-message').removeClass('kwcpt-show-submit-message');
  });

  $('#kwcpt-contact-form').submit(function(e) {
    e.preventDefault();

    $('#kwcpt-submit-btn').addClass('kwcpt-pushed-btn');

    $('#kwcpt-submit-btn').on('animationend', function(event) {
      $(this).removeClass('kwcpt-pushed-btn');
    });

    const formData = new FormData(this);
    formData.append('action', 'contact_form_submit');
    formData.append('nonce', ajaxObj.nonce);

    $.ajax({
      url: ajaxObj.ajaxUrl,
      type: 'POST',
      data: formData,
      processData: false,
      contentType: false,
      success: function(response) {
        if (response.success) {
          console.log(response.data);

          $('#kwcpt-user-message').text('Form submitted.  Thank you!');
          $('#kwcpt-user-message').addClass('kwcpt-show-submit-message');

          setTimeout(() => {
            $('#kwcpt-user-message').removeClass('kwcpt-show-submit-message');
            $('#kwcpt-contact-form').trigger('reset');
          }, 2000);
        } else {
          $('#kwcpt-user-message').text('Something went wrong. Please try again or email me at:  karl.witek20@gmail.com');
          $('#kwcpt-user-message').addClass('kwcpt-show-submit-message');

          setTimeout(() => {
            $('#kwcpt-contact-form').trigger('reset');
          }, 2000);

          console.log(response.data.errorMsg);
          console.log(response.data.origMsg);
        }
      },
      error: function(xhr, status, error) {
        console.error('Ajax error:', error);
        alert('Connection Error With Server');
      }
    });

  });

});

