jQuery(document).ready(function($) {

  $('#productsFilter').on('change', 'input,select', function(event) {
      event.preventDefault();
      let form = $(this).closest('form');
      form.request();
  });
});