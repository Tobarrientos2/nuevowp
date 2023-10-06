<?php
// Exit if accessed directly
defined( 'ABSPATH' ) || exit;
?>
<?php
            if (function_exists('udesly_set_frontend_editor_data') && wp_doing_ajax()) {
              udesly_set_frontend_editor_data('page-blog');
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
  "posts_per_page" => 4,
  "meta_query" => [
    "relation" => "AND",
    [
      "key" => "tipo-de-blog",
      "value" => "Anuncios y politicas ",
      "compare" => "=="
    ]
  ],
  "paged" => $paged
];

$args = apply_filters('udesly/posts/entradas-max-4-where-tipo-de-blog-eq-anuncios-y-politicas', $args);
        
        $query = new WP_Query($args);
?>
<div id="w-node-_88470cc4-e71b-a5cb-fff2-e7e45d87d321-9456fb76" class="sliders in w-dyn-list" udy-collection="entradas">
        <?php if ( $query->have_posts() ) : ?><div id="w-node-_88470cc4-e71b-a5cb-fff2-e7e45d87d322-9456fb76" role="list" class="slide slick-wrapper w-dyn-items">
          <?php while ($query->have_posts()) : $query->the_post(); global $post; ?><div role="listitem" class="card blog three w-dyn-item">
            <a href="<?php the_permalink() ?>" class="container-card w-inline-block">
              <div class="image-container card-image three"><img loading="lazy" width="294" height="168" src="<?php echo udesly_get_image()->src ?>" alt="<?php echo udesly_get_image()->alt ?>" class="image" srcset="<?php echo udesly_get_image()->srcset ?>">
                <div class="image is-filter-two"></div>
                <div class="image is-filter"></div>
              </div>
              <div class="container-info is-margin-t-16">
                <div class="is-h6 is-txt-white-100"><?php the_title() ?></div>
                <div class="is-txt-medium"><?php echo date_format(date_create(udesly_get_custom_post_field( $post->ID, "fecha", "Date" )), "d/n/Y"); ?></div>
                <div class="container-info horizontal no-wrap no-gap">
                  <div class="icon-container hour">
                    <div class="w-embed"><svg width="14" height="15" viewBox="0 0 14 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M7.19898 13.7905C10.6227 13.7905 13.398 11.0153 13.398 7.59156C13.398 4.16786 10.6227 1.39258 7.19898 1.39258C3.77528 1.39258 1 4.16786 1 7.59156C1 11.0153 3.77528 13.7905 7.19898 13.7905Z" stroke="#D0D0D0" stroke-linejoin="round"></path>
                        <path d="M7.20215 3.87207V7.59456L9.83021 10.2229" stroke="#D0D0D0" stroke-linecap="round" stroke-linejoin="round"></path>
                      </svg></div>
                  </div>
                  <div class="is-h5 is-txt-white-100 mukta"><?php echo udesly_get_custom_post_field( $post->ID, "tiempo-de-lectura", "Number" ) ?></div>
                  <div class="is-h5 is-txt-white-100 mukta">minutos</div>
                </div>
              </div>
            </a>
          </div><?php endwhile; ?>
        </div>
        <?php else : ?><div class="no-data-container w-dyn-empty">
          <div class="is-txt-large">Sin información actualizada.</div>
        </div><?php endif; ?>
      </div>
<?php wp_reset_postdata(); ?>
 