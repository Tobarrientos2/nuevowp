<?php
// Exit if accessed directly
defined( 'ABSPATH' ) || exit;
?>
<?php
            if (function_exists('udesly_set_frontend_editor_data') && wp_doing_ajax()) {
              udesly_set_frontend_editor_data('page-planes');
          }
?>
<?php

        if (isset($_GET['p_id'])) {
          $paged = $_GET['p_id'];
        } else {
          $paged = isset($args['paged']) ? $args['paged'] : 1;  
        }
          
        

$args = [
  "post_type" => "fechas-importantes",
  "paged" => $paged
];

$args = apply_filters('udesly/posts/fechas-importantes', $args);
        
        $query = new WP_Query($args);
?>
<div class="container no-grid w-dyn-list" udy-collection="fechas-importantes">
          <?php if ( $query->have_posts() ) : ?><div role="list" class="container no-grid w-dyn-items">
            <?php while ($query->have_posts()) : $query->the_post(); global $post; ?><div role="listitem" class="container-info horizontal start is-margin-b-16 no-wrap gao w-dyn-item">
              <h1 class="is-txt-large is-txt-black-100 is-txt-bold"><?php echo date_format(date_create(udesly_get_custom_post_field( $post->ID, "fecha", "Date" )), "d/n/Y"); ?></h1>
              <div class="is-txt-large is-txt-black-100"><?php the_title() ?></div>
            </div><?php endwhile; ?>
          </div>
          <?php else : ?><div class="no-data-container w-dyn-empty">
            <div class="is-txt-large">No items found.</div>
          </div><?php endif; ?>
        </div>
<?php wp_reset_postdata(); ?>
 