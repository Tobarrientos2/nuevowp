<?php
// Exit if accessed directly
defined( 'ABSPATH' ) || exit;
?>
<?php
            if (function_exists('udesly_set_frontend_editor_data') && wp_doing_ajax()) {
              udesly_set_frontend_editor_data('page-quienes-somos');
          }
?>
<?php

        if (isset($_GET['p_id'])) {
          $paged = $_GET['p_id'];
        } else {
          $paged = isset($args['paged']) ? $args['paged'] : 1;  
        }
          
        

$args = [
  "post_type" => "profesores",
  "posts_per_page" => 2,
  "paged" => $paged
];

$args = apply_filters('udesly/posts/profesores-max-2', $args);
        
        $query = new WP_Query($args);
?>
<div id="w-node-_4559c602-788e-f274-3963-4e2af3d61b72-3108ee38" class="section-profesores w-dyn-list" udy-collection="profesores">
        <?php if ( $query->have_posts() ) : ?><div role="list" class="container profesores w-dyn-items">
          <?php while ($query->have_posts()) : $query->the_post(); global $post; ?><div id="w-node-_4559c602-788e-f274-3963-4e2af3d61b74-3108ee38" role="listitem" class="w-dyn-item">
            <div id="w-node-fc6421ad-f78e-60fa-4185-977e8ee6e748-3108ee38" class="container-info profesores">
              <address class="image-container profesores" style="<?php echo "background-image: url('" . udesly_get_image()->src . "')" ?>"></address>
              <div class="container-info profesores one">
                <div class="is-h6 is-txt-bold"><?php the_title() ?></div>
                <div class="is-txt-large is-txt-black-100"><?php echo udesly_get_custom_post_field( $post->ID, "funcion", "PlainText" ) ?></div>
              </div>
              <div class="container-info profesores two">
                <div class="is-txt-large is-txt-black-100"><?php the_excerpt() ?></div>
              </div>
              <div class="html-embed w-embed">
                <style>
.image-container{
background-size: cover; 
background-position: center;}    
</style>
              </div>
            </div>
          </div><?php endwhile; ?>
        </div>
        <?php else : ?><div class="no-data-container w-dyn-empty">
          <div class="is-txt-large">No se encontró ni un item.</div>
        </div><?php endif; ?>
      </div>
<?php wp_reset_postdata(); ?>
 