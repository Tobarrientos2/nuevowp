<?php
// Exit if accessed directly
defined( 'ABSPATH' ) || exit;
?>
<?php
            if (function_exists('udesly_set_frontend_editor_data') && wp_doing_ajax()) {
              udesly_set_frontend_editor_data('front-page');
          }
?>
<?php

        if (isset($_GET['p_id'])) {
          $paged = $_GET['p_id'];
        } else {
          $paged = isset($args['paged']) ? $args['paged'] : 1;  
        }
          
        

$args = [
  "post_type" => "entradas",
  "paged" => $paged
];

$args = apply_filters('udesly/posts/entradas', $args);
        
        $query = new WP_Query($args);
?>
<div class="container w-dyn-list" udy-collection="entradas">
            <?php if ( $query->have_posts() ) : ?><div role="list" class="container grid w-dyn-items">
              <?php while ($query->have_posts()) : $query->the_post(); global $post; ?><div id="w-node-e64f59b7-739e-ead3-6328-69be42c533e2-972fac55" role="listitem" class="container-info novedades w-dyn-item">
                <div id="w-node-_23478428-18b6-ad2e-62ef-73ebf906ebdf-972fac55" class="image-container"><img loading="lazy" height="192" id="w-node-_23478428-18b6-ad2e-62ef-73ebf906ebe0-972fac55" src="<?php echo udesly_get_image()->src ?>" alt="<?php echo udesly_get_image()->alt ?>" class="image" srcset="<?php echo udesly_get_image()->srcset ?>"></div>
              </div><?php endwhile; ?>
            </div>
            <?php else : ?><div class="no-data-container w-dyn-empty">
              <div class="is-txt-large">No hay novedades aún.</div>
            </div><?php endif; ?>
          </div>
<?php wp_reset_postdata(); ?>
 