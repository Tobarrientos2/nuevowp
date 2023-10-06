<?php


$args = [
    'wfPage' => '64a653d2896be480240aafe1',
    'body' => '',
    'head' => 'head/page-planes',
];   

if (function_exists('udesly_set_frontend_editor_data')) {
    udesly_set_frontend_editor_data('401');
}
     
get_header('', $args);

udesly_get_content_template( '401' );

$args = [
  'footer' => 'footer/page-8xflow-figma-to-webflow-styleguide',
];  

if (function_exists('udesly_output_frontend_editor_data')) {
     udesly_output_frontend_editor_data('401');
}

get_footer('', $args);
