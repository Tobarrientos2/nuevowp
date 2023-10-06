<?php


$args = [
    'wfPage' => '64a71f29a7ddb1725d41ed70',
    'body' => '',
    'head' => 'head/page-planes',
];   

if (function_exists('udesly_set_frontend_editor_data')) {
    udesly_set_frontend_editor_data('page-transaccion-realizada');
}
     
get_header('', $args);

/* Start the Loop */
while ( have_posts() ) :
    the_post();
    udesly_get_content_template( 'page-transaccion-realizada' );
endwhile;
// End of the loop.

$args = [
  'footer' => 'footer/page-transaccion-realizada',
];  

if (function_exists('udesly_output_frontend_editor_data')) {
     udesly_output_frontend_editor_data('page-transaccion-realizada');
}

get_footer('', $args);
