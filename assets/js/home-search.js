jQuery(document).ready(function($) {
  // Perform AJAX login on form submit
  $('#search_trigger').on('click', function(e) {
  //$("form#customize_home_search").submit(function(e) {
      e.preventDefault();
      var search_input = $("#search_input").val();
    //$('.customize_partner_details p.status').show().text(ajax_login_object.loadingmessage);
    $('#search-results').show().slideDown(500);
    $('#search-results').html('<span class="loading">'+ajax_search_object.loadingmessage+'</span>');
    $.ajax({
      type: 'POST',
      dataType: 'json',
      url: ajax_search_object.ajaxurl,
      data: {
        'action': 'customize_home_search',
        'search': search_input
      },
      success: function(response) {
        if(response.status == true){
          $('#search-results').html(response.data);
          $('#total-count').html(response.total + ' Result found');
        }else{
          $('#search-results').html(response.message);
        }
      }
    });

  });
});

//close click on out side
jQuery(document).mouseup(function(e)
{
    var container = jQuery("#search_render_model");

    // if the target of the click isn't the container nor a descendant of the container
    if (!container.is(e.target) && container.has(e.target).length === 0)
    {
        container.hide();
    }
});
