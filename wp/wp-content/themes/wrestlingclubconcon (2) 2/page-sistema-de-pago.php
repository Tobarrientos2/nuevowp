<?php


$args = [
    'wfPage' => '6498ac0e91cd5ba2e18f5d4d',
    'body' => '',
    'head' => 'head/page-planes',
];   

if (function_exists('udesly_set_frontend_editor_data')) {
    udesly_set_frontend_editor_data('page-sistema-de-pago');
}
     
get_header('', $args);

/* Start the Loop */
while ( have_posts() ) :
    the_post();
    udesly_get_content_template( 'page-sistema-de-pago' );
endwhile;
// End of the loop.

$args = [
  'footer' => 'footer/page-sistema-de-pago',
];  

if (function_exists('udesly_output_frontend_editor_data')) {
     udesly_output_frontend_editor_data('page-sistema-de-pago');
}

get_footer('', $args);
