<?php


$args = [
    'wfPage' => '6498a94449f8be158673157f',
    'body' => '',
    'head' => 'head/page-planes',
];   

if (function_exists('udesly_set_frontend_editor_data')) {
    udesly_set_frontend_editor_data('single-entradas');
}
     
get_header('', $args);

/* Start the Loop */
while ( have_posts() ) :
    the_post();
    udesly_get_content_template( 'single-entradas' );
endwhile;
// End of the loop.

$args = [
  'footer' => 'footer/page-blog',
];  

if (function_exists('udesly_output_frontend_editor_data')) {
     udesly_output_frontend_editor_data('single-entradas');
}

get_footer('', $args);
