<?php

    function udesly_theme_utils_get_term_id_by_slug( $slug, $type ) {
        $term = get_term_by("slug", $slug, $type);

        if ($term) {
            return $term->term_id;
        }
        return 0;
    }

    function udesly_theme_utils_get_post_id_by_slug( $slug, $type ) {
        $post = get_page_by_path($slug, OBJECT, $type);

        if ($post) {
            return $post->ID;
        }
        return 0;
    }

        
    function udesly_wrestlingclubconcon_setup() {
        
/*
 * Switch default core markup for search form, comment form, and comments
 * to output valid HTML5.
 */
        add_theme_support(
            'html5',
                array(
                    'comment-form',
                    'comment-list',
                    'gallery',
                    'caption',
                    'style',
                    'script',
                    'navigation-widgets',
                )
        );
        
        add_theme_support('woocommerce');

/**
 * Add support for core custom logo.
 *
 * @link https://codex.wordpress.org/Theme_Logo
 */
        $logo_width  = 300;
        $logo_height = 100;

        add_theme_support(
            'custom-logo',
                array(
                    'height'               => $logo_height,
                    'width'                => $logo_width,
                    'flex-width'           => true,
                    'flex-height'          => true,
                    'unlink-homepage-logo' => true,
                )
        );

        add_theme_support( 'title-tag' );
        
        add_theme_support( 'menus' );

        // Add theme support for selective refresh for widgets.
        add_theme_support( 'customize-selective-refresh-widgets' );

        // Add support for Block Styles.
        add_theme_support( 'wp-block-styles' );

        // Add support for full and wide align images.
        add_theme_support( 'align-wide' );

        // Add support for editor styles.
        add_theme_support( 'editor-styles' );
        
        // Add support for responsive embedded content.
        add_theme_support( 'responsive-embeds' );
         
        add_theme_support( 'post-thumbnails' ); 
    }
    
    add_action( 'after_setup_theme', 'udesly_wrestlingclubconcon_setup' );

    add_action( 'admin_notices', function() {
        if (function_exists("udesly_define_post_type")) {
            return;
        }
        $class = 'notice notice-error';
        $message = 'The theme will not work properly without the Udesly App plugin installed!';
        printf( '<div class="%1$s"><p>%2$s</p></div>', esc_attr( $class ), esc_html( $message ) ); 
    });
    
    add_action('wp_loaded', function() {
    
        if (!function_exists("udesly_define_post_type") && !is_admin()) {
                wp_die('The theme will not work properly without the Udesly App plugin installed!');
        }
    
    });

    
    
    require_once get_template_directory() . '/tgm-plugin/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'udesly_register_required_plugins' );

function udesly_register_required_plugins() {

    $plugins = array(

        array(
            'name'      => 'Udesly App',
            'slug'      => 'udesly-wp-app',
            'source'    => 'https://github.com/udesly-adapter/udesly-wp-app/archive/master.zip',
        ),
        
    );

    /*
     * Array of configuration settings. Amend each line as needed.
     *
     * TGMPA will start providing localized text strings soon. If you already have translations of our standard
     * strings available, please help us make TGMPA even better by giving us access to these translations or by
     * sending in a pull-request with .po file(s) with the translations.
     *
     * Only uncomment the strings in the config array if you want to customize the strings.
     */
    $config = array(
        'id'           => 'udesly',                 // Unique ID for hashing notices for multiple instances of TGMPA.
        'default_path' => '',                      // Default absolute path to bundled plugins.
        'menu'         => 'tgmpa-install-plugins', // Menu slug.
        'parent_slug'  => 'themes.php',            // Parent menu slug.
        'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
        'has_notices'  => true,                    // Show admin notices or not.
        'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
        'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => false,                   // Automatically activate plugins after installation or not.
        'message'      => '',                      // Message to output right before the plugins table.
    );

    tgmpa( $plugins, $config );
}




   

    function define_post_types_for_wrestlingclubconcon() {

        if (!function_exists('udesly_define_post_type')) {
            return;
        }
        
        udesly_define_post_type("fechas-importantes", [
        "labels" => [
            "name" => __("Fechas Importantes"),
            "singular_name" => __("Fechas Importante"),
        ],
        "rewrite" => [
            "name" => __("fechas-importantes"),
        ],
    ]);
udesly_define_post_type("clases", [
        "labels" => [
            "name" => __("Clases"),
            "singular_name" => __("Clase"),
        ],
        "rewrite" => [
            "name" => __("clases"),
        ],
    ]);
udesly_define_post_type("profesores", [
        "labels" => [
            "name" => __("Profesores"),
            "singular_name" => __("Profesore"),
        ],
        "rewrite" => [
            "name" => __("profesores"),
        ],
    ]);
udesly_define_post_type("entradas", [
        "labels" => [
            "name" => __("Entradas"),
            "singular_name" => __("Entrada"),
        ],
        "rewrite" => [
            "name" => __("entradas"),
        ],
    ]);
        
        
    
    }
    
    add_action('init', 'define_post_types_for_wrestlingclubconcon');
    

        
        add_action('acf/init', function() {

            if (!function_exists('udesly_custom_field_text')) {
                return;
            }
        
            udesly_register_custom_fields_for_post_type('fechas-importantes',[
         udesly_custom_field_date([
            "name" => "fecha",
            "label" => "Fecha",
            "instructions" => ""
            ])
    ]);        
udesly_register_custom_fields_for_post_type('clases',[
         udesly_custom_field_textarea([
            "name" => "descripcion-2", 
            "label" => "descripción 2", 
            "instructions" => "descripción 2", 
            ]),   
udesly_custom_field_text([
            "name" => "precio", 
            "label" => "precio", 
            "instructions" => "precio", 
            "type" => "number",
            ])
    ]);        
udesly_register_custom_fields_for_post_type('profesores',[
         udesly_custom_field_text([
            "name" => "funcion", 
            "label" => "función", 
            "instructions" => "", 
            ])
    ]);        
udesly_register_custom_fields_for_post_type('entradas',[
         udesly_custom_field_text([
            "name" => "titulo", 
            "label" => "título", 
            "instructions" => "", 
            ]),   
udesly_custom_field_text([
            "name" => "descrpicion-2", 
            "label" => "descrpicion 2", 
            "instructions" => "", 
            ]),   
udesly_custom_field_text([
            "name" => "descrpicion-3", 
            "label" => "descrpicion 3", 
            "instructions" => "", 
            ]),   
udesly_custom_field_text([
            "name" => "descripcion-4", 
            "label" => "descripción 4", 
            "instructions" => "", 
            ]),   
udesly_custom_field_text([
            "name" => "descrpicion-5", 
            "label" => "descrpicion 5", 
            "instructions" => "", 
            ]),   
udesly_custom_field_textarea([
            "name" => "descrpicion-6", 
            "label" => "descrpicion 6", 
            "instructions" => "", 
            ]),   
udesly_custom_field_textarea([
            "name" => "descrpicion-7", 
            "label" => "descrpicion 7", 
            "instructions" => "", 
            ]),   
udesly_custom_field_textarea([
            "name" => "descrpicion-8", 
            "label" => "descrpicion 8", 
            "instructions" => "", 
            ]),   
udesly_custom_field_textarea([
            "name" => "descrpicion-9", 
            "label" => "descrpicion 9", 
            "instructions" => "", 
            ]),   
udesly_custom_field_date([
            "name" => "fecha",
            "label" => "fecha",
            "instructions" => ""
            ]),   
udesly_custom_field_select([
            "name" => "tipo-de-blog", 
            "label" => "Tipo de Blog", 
            "instructions" => "Tipo de Blog", 
            "choices" => [
                "Anuncios y politicas " => "Anuncios y politicas ",
            "Campeonatos e Información Comunitaria" => "Campeonatos e Información Comunitaria",
            "Noticias" => "Noticias",
            "Artículos Informativos y Deportivos" => "Artículos Informativos y Deportivos",
            
               ]
            ]),   
udesly_custom_field_text([
            "name" => "tiempo-de-lectura", 
            "label" => "tiempo de lectura", 
            "instructions" => "", 
            "type" => "number",
            ])
    ]);
        
        });
        