<?php


$args = [
    'wfPage' => '6497b81f42ff31f2af2dff17',
    'body' => '',
    'head' => 'head/page-planes',
];   

if (function_exists('udesly_set_frontend_editor_data')) {
    udesly_set_frontend_editor_data('page-planes-page');
}
     
get_header('', $args);

/* Start the Loop */
while ( have_posts() ) :
    the_post();
    udesly_get_content_template( 'page-planes-page' );
endwhile;
// End of the loop.

$args = [
  'footer' => 'footer/page-8xflow-figma-to-webflow-styleguide',
];  

if (function_exists('udesly_output_frontend_editor_data')) {
     udesly_output_frontend_editor_data('page-planes-page');
}

get_footer('', $args);
