<?php


$args = [
    'wfPage' => '649622168d660537972fac56',
    'body' => 'dsg-body',
    'head' => 'head/page-8xflow-figma-to-webflow-styleguide',
];   

if (function_exists('udesly_set_frontend_editor_data')) {
    udesly_set_frontend_editor_data('page-8xflow-figma-to-webflow-styleguide');
}
     
get_header('', $args);

/* Start the Loop */
while ( have_posts() ) :
    the_post();
    udesly_get_content_template( 'page-8xflow-figma-to-webflow-styleguide' );
endwhile;
// End of the loop.

$args = [
  'footer' => 'footer/page-8xflow-figma-to-webflow-styleguide',
];  

if (function_exists('udesly_output_frontend_editor_data')) {
     udesly_output_frontend_editor_data('page-8xflow-figma-to-webflow-styleguide');
}

get_footer('', $args);
