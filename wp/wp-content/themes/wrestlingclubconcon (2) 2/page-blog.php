<?php


$args = [
    'wfPage' => '6497c6e3fbb0d7da9456fb76',
    'body' => '',
    'head' => 'head/page-planes',
];   

if (function_exists('udesly_set_frontend_editor_data')) {
    udesly_set_frontend_editor_data('page-blog');
}
     
get_header('', $args);

/* Start the Loop */
while ( have_posts() ) :
    the_post();
    udesly_get_content_template( 'page-blog' );
endwhile;
// End of the loop.

$args = [
  'footer' => 'footer/page-blog',
];  

if (function_exists('udesly_output_frontend_editor_data')) {
     udesly_output_frontend_editor_data('page-blog');
}

get_footer('', $args);
