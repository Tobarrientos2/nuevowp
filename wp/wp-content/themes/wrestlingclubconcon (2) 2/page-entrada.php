<?php


$args = [
    'wfPage' => '649d94a1e7cfba8808b23168',
    'body' => '',
    'head' => 'head/page-planes',
];   

if (function_exists('udesly_set_frontend_editor_data')) {
    udesly_set_frontend_editor_data('page-entrada');
}
     
get_header('', $args);

/* Start the Loop */
while ( have_posts() ) :
    the_post();
    udesly_get_content_template( 'page-entrada' );
endwhile;
// End of the loop.

$args = [
  'footer' => 'footer/page-blog',
];  

if (function_exists('udesly_output_frontend_editor_data')) {
     udesly_output_frontend_editor_data('page-entrada');
}

get_footer('', $args);
