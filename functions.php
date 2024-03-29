<?php
/**
 * Master Template functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Master_Template
 */

if (!defined('_S_VERSION')) {
    // Replace the version number of the theme on each release.
    define('_S_VERSION', '1.0.0');
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function master_template_setup()
{
    /*
        * Make theme available for translation.
        * Translations can be filed in the /languages/ directory.
        * If you're building a theme based on Master Template, use a find and replace
        * to change 'master-template' to the name of your theme in all the template files.
        */
    load_theme_textdomain('master-template', get_template_directory() . '/languages');

    // Add default posts and comments RSS feed links to head.
//	add_theme_support( 'automatic-feed-links' );

    /*
        * Let WordPress manage the document title.
        * By adding theme support, we declare that this theme does not use a
        * hard-coded <title> tag in the document head, and expect WordPress to
        * provide it for us.
        */
    add_theme_support('title-tag');

    /*
        * Enable support for Post Thumbnails on posts and pages.
        *
        * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
        */
    add_theme_support('post-thumbnails');

    // This theme uses wp_nav_menu() in one location.
    register_nav_menus(
        array(
            'menu-header' => esc_html__('Header-Menü', 'master-template'),
            'menu-footer' => esc_html__('Footer-Menü', 'master-template'),
            'menu-info' => esc_html__('Info-Menü', 'master-template'),
        )
    );

    /*
        * Switch default core markup for search form, comment form, and comments
        * to output valid HTML5.
        */
    add_theme_support(
        'html5',
        array(
//			'search-form',
//			'comment-form',
//			'comment-list',
//			'gallery',
            'caption',
            'style',
            'script',
        )
    );

    // Set up the WordPress core custom background feature.
    add_theme_support(
        'custom-background',
        apply_filters(
            'master_template_custom_background_args',
            array(
                'default-color' => 'ffffff',
                'default-image' => '',
            )
        )
    );

//	// Add theme support for selective refresh for widgets.
//	add_theme_support( 'customize-selective-refresh-widgets' );

    /**
     * Add support for core custom logo.
     *
     * @link https://codex.wordpress.org/Theme_Logo
     */
    add_theme_support(
        'custom-logo',
        array(
            'height' => 250,
            'width' => 250,
            'flex-width' => true,
            'flex-height' => true,
        )
    );
}

add_action('after_setup_theme', 'master_template_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function master_template_content_width()
{
    $GLOBALS['content_width'] = apply_filters('master_template_content_width', 640);
}

add_action('after_setup_theme', 'master_template_content_width', 0);


/**
 * Enqueue scripts and styles.
 */
function master_template_scripts()
{
    wp_enqueue_style('master-template-fancybox', get_template_directory_uri() . '/css/jquery.fancybox.min.css');
    wp_enqueue_style('master-template-style', get_stylesheet_uri(), array(), _S_VERSION);
    wp_style_add_data('master-template-style', 'rtl', 'replace');

    wp_deregister_script('jquery');
    wp_register_script('jquery', get_template_directory_uri() . '/js/jquery-3.6.0.min.js');
    wp_enqueue_script('jquery');

    wp_enqueue_script('master-template-slick', get_template_directory_uri() . '/js/slick.min.js', array(), _S_VERSION, true);
    wp_enqueue_script('master-template-aos', get_template_directory_uri() . '/js/aos.min.js', array(), _S_VERSION, true);
    wp_enqueue_script('master-template-fancybox', get_template_directory_uri() . '/js/jquery.fancybox.min.js', array(), _S_VERSION, true);
    wp_enqueue_script('master-template-custom', get_template_directory_uri() . '/js/custom.js', array(), _S_VERSION, true);
}

add_action('wp_enqueue_scripts', 'master_template_scripts');


/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';


require_once get_template_directory() . '/inc/tgm_activation.php';
require_once get_template_directory() . '/inc/acf-settings.php';
require_once get_template_directory() . '/inc/acf-fields.php';


// unregister all widgets
function unregister_default_widgets()
{
    unregister_widget('WP_Widget_Pages');
    unregister_widget('WP_Widget_Calendar');
    unregister_widget('WP_Widget_Archives');
    unregister_widget('WP_Widget_Links');
    unregister_widget('WP_Widget_Meta');
    unregister_widget('WP_Widget_Search');
    unregister_widget('WP_Widget_Text');
    unregister_widget('WP_Widget_Categories');
    unregister_widget('WP_Widget_Recent_Posts');
    unregister_widget('WP_Widget_Recent_Comments');
    unregister_widget('WP_Widget_RSS');
    unregister_widget('WP_Widget_Tag_Cloud');
    unregister_widget('WP_Nav_Menu_Widget');
    unregister_widget('Twenty_Eleven_Ephemera_Widget');
}

add_action('widgets_init', 'unregister_default_widgets', 11);

// REMOVE MENU PAGES
function wpdocs_remove_menus()
{
    remove_submenu_page('themes.php', 'widgets.php');
    remove_menu_page('edit-comments.php');
    remove_menu_page('edit.php');

}

add_action('admin_menu', 'wpdocs_remove_menus');

// IMAGE SIZES
add_image_size('service', 335, 450, true);