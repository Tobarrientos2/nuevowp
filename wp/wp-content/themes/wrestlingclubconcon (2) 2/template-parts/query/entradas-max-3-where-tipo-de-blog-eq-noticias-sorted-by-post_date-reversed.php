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
  "post_type" => "entradas",
  "posts_per_page" => 3,
  "order" => "ASC",
  "orderby" => "date",
  "meta_query" => [
    "relation" => "AND",
    [
      "key" => "tipo-de-blog",
      "value" => "Noticias",
      "compare" => "=="
    ]
  ],
  "paged" => $paged
];

$args = apply_filters('udesly/posts/entradas-max-3-where-tipo-de-blog-eq-noticias-sorted-by-post_date-reversed', $args);
        
        $query = new WP_Query($args);
?>
<div class="card-wrapper w-dyn-list" udy-collection="entradas">
          <?php if ( $query->have_posts() ) : ?><div role="list" class="card-container grid w-dyn-items">
            <?php while ($query->have_posts()) : $query->the_post(); global $post; ?><div role="listitem" class="card w-dyn-item">
              <a href="<?php the_permalink() ?>" class="link-block w-inline-block">
                <div class="container-info relative card blog">
                  <div class="bg-container card"><img loading="lazy" height="214.03636169433594" src="<?php echo udesly_get_image()->src ?>" alt="<?php echo udesly_get_image()->alt ?>" class="image" srcset="<?php echo udesly_get_image()->srcset ?>">
                    <div class="image is-filter-two"></div>
                    <div class="image is-filter"></div>
                  </div>
                  <div class="container-info horizontal space-around no-wrap">
                    <div class="is-h6 is-txt-white-100"><?php the_title() ?></div>
                    <div class="is-h5 is-txt-white-100 light">Abrir</div>
                  </div>
                </div>
              </a>
            </div><?php endwhile; ?>
          </div>
          <?php else : ?><div class="w-dyn-empty">
            <div>No items found.</div>
          </div><?php endif; ?>
        </div>
<?php wp_reset_postdata(); ?>
 