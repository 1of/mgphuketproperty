<?php
/**Theme Name    : Quality
 * Theme Core Functions and Codes
 */
/**Includes reqired resources here**/
define('QUALITY_TEMPLATE_DIR_URI', get_template_directory_uri());
define('QUALITY_TEMPLATE_DIR', get_template_directory());
define('QUALITY_THEME_FUNCTIONS_PATH', QUALITY_TEMPLATE_DIR . '/functions');
define('QUALITY_THEME_OPTIONS_PATH', QUALITY_TEMPLATE_DIR_URI . '/functions/theme_options');

require(QUALITY_THEME_FUNCTIONS_PATH . '/menu/new_Walker.php'); //NEW Walker Class Added.
require(QUALITY_THEME_FUNCTIONS_PATH . '/menu/default_menu_walker.php');

require_once(QUALITY_THEME_FUNCTIONS_PATH . '/scripts/scripts.php');     //Theme Scripts And Styles

require(QUALITY_THEME_FUNCTIONS_PATH . '/commentbox/comment-function.php'); //Comment Handling
require(QUALITY_THEME_FUNCTIONS_PATH . '/widget/custom-sidebar.php'); //Sidebar Registration

//Customizer
require(QUALITY_THEME_FUNCTIONS_PATH . '/customizer/customizer-header.php');
require(QUALITY_THEME_FUNCTIONS_PATH . '/customizer/customizer-footer.php');
require(QUALITY_THEME_FUNCTIONS_PATH . '/customizer/customizer-general.php');
require(QUALITY_THEME_FUNCTIONS_PATH . '/customizer/customizer-slider.php');
require(QUALITY_THEME_FUNCTIONS_PATH . '/customizer/customizer-copyright.php');
require(QUALITY_THEME_FUNCTIONS_PATH . '/customizer/customizer-home.php');
require(QUALITY_THEME_FUNCTIONS_PATH . '/customizer/customizer-blog.php');
require(QUALITY_THEME_FUNCTIONS_PATH . '/customizer/customizer-pro.php');
require(QUALITY_THEME_FUNCTIONS_PATH . '/customizer/customizer-archive.php');
require(QUALITY_THEME_FUNCTIONS_PATH . '/customizer/customizer_recommended_plugin.php');
require(QUALITY_THEME_FUNCTIONS_PATH . '/customizer/customizer_import_data.php');
require(QUALITY_THEME_FUNCTIONS_PATH . '/font/font.php');
require(QUALITY_THEME_FUNCTIONS_PATH . '/breadcrumbs/breadcrumbs.php');

//Alpha Color Control
require(QUALITY_THEME_FUNCTIONS_PATH . '/customizer/customizer-alpha-color-picker/class-quality-customize-alpha-color-control.php');

require(QUALITY_THEME_FUNCTIONS_PATH . '/template-tags.php');

$repeater_path = trailingslashit(get_template_directory()) . '/functions/customizer-repeater/functions.php';
if (file_exists($repeater_path)) {
    require_once($repeater_path);
}

//wp title tag starts here
function quality_head($title, $sep)
{
    global $paged, $page;
    if (is_feed())
        return $title;
    // Add the site name.
    $title .= get_bloginfo('name');
    // Add the site description for the home/front page.
    $site_description = get_bloginfo('description');
    if ($site_description && (is_home() || is_front_page()))
        $title = "$title $sep $site_description";
    // Add a page number if necessary.
    if ($paged >= 2 || $page >= 2)
        $title = "$title $sep " . sprintf(_e('Page', 'quality'), max($paged, $page));
    return $title;
}

add_filter('wp_title', 'quality_head', 10, 2);

add_action('after_setup_theme', 'quality_setup');
function quality_setup()
{
    //content width
    if (!isset($content_width)) $content_width = 700;//In PX
    // Load text domain for translation-ready
    load_theme_textdomain('quality', QUALITY_THEME_FUNCTIONS_PATH . '/lang');
    add_theme_support('post-thumbnails'); //supports featured image
    // This theme uses wp_nav_menu() in one location.
    register_nav_menu('primary', __('Primary Menu', 'quality')); //Navigation
    // theme support
    add_theme_support('automatic-feed-links');

    // Add theme support for selective refresh for widgets.
    add_theme_support('customize-selective-refresh-widgets');

    //Title tag
    add_theme_support("title-tag");

    // woocommerce support
    add_theme_support('woocommerce');

    // Woocommerce Gallery Support
    add_theme_support('wc-product-gallery-zoom');
    add_theme_support('wc-product-gallery-lightbox');
    add_theme_support('wc-product-gallery-slider');

    require_once('theme_setup_data.php');
    // setup admin pannel defual data for index page
    $quality_pro_options = theme_data_setup();

    //About Theme
    $theme = wp_get_theme(); // gets the current theme
    if ('Quality' == $theme->name || 'Quality blue' == $theme->name || 'Quality green' == $theme->name || 'Quality orange' == $theme->name) {
        if (is_admin()) {
            require get_template_directory() . '/admin/admin-init.php';
        }
    }


}

// Read more tag to formatting in blog page
function quality_new_content_more($more)
{
    global $post;
    return '<p><a href="' . get_permalink() . "#more-{$post->ID}\" class=\"more-link\">" . __('Read More', 'quality') . "</a></p>";
}

add_filter('the_content_more_link', 'quality_new_content_more');


add_filter("the_excerpt", "quality_add_class_to_excerpt");
function quality_add_class_to_excerpt($excerpt)
{
    return str_replace('<p', '<p class="qua-blog-post-description"', $excerpt);
}

add_action('admin_init', 'quality_detect_button');
function quality_detect_button()
{
    wp_enqueue_style('quality-info-button', get_template_directory_uri() . '/css/import-button.css');
}

function quality_theme_plugin_notify()
{

}

$old_theme = get_option('quality_pro_options');
if ($old_theme != '') {
    include_once(ABSPATH . 'wp-admin/includes/plugin.php');
    if (is_plugin_active('webriti-companion/webriti-companion.php')) {
    } else {
        add_action('admin_notices', 'quality_theme_plugin_notify');

    }
}
the_tags();

//Connecting custom styles
add_action('wp_enqueue_scripts', 'quality_custom_styles');
function quality_custom_styles()
{
    wp_enqueue_style('customstyles', get_stylesheet_directory_uri() . '/css/custom/customstyles.css');
}


function quality_real_estate_init() {
$labels = array(
    'name'               => _x( __('Real Estate', 'quality'), 'Testimonials', 'masu' ),
    'singular_name'      => _x( 'Real Estate', 'Testimonial', 'masu' ),
    'menu_name'          => _x( __('Real Estates', 'quality'), 'admin menu', 'masu' ),
    'name_admin_bar'     => _x( 'Real Estate', 'add new on admin bar', 'masu' ),
    'add_new'            => _x( __('Add New', 'quality'), 'real-estate', 'masu' ),
    'add_new_item'       => __( __('Add New Real Estate', 'quality'), 'masu' ),
    'new_item'           => __( 'New Real Estate', 'masu' ),
    'edit_item'          => __( __('Edit Real Estate', 'quality'), 'masu' ),
    'view_item'          => __( 'View Real Estate', 'masu' ),
    'all_items'          => __( __('All Real Estate', 'quality'), 'masu' ),
    'search_items'       => __( __('Search Real Estates', 'quality'), 'masu' ),
    'parent_item_colon'  => __( 'Parent Real Estates:', 'masu' ),
    'not_found'          => __( 'No real estates found.', 'masu' ),
    'not_found_in_trash' => __( 'No real estates found in Trash.', 'masu' )
);

	$args = array(
        'labels'             => $labels,
        'description'        => __( 'Description.', 'masu' ),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'estate' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array( 'title', 'author' )
    );

	register_post_type( 'estate', $args );
    //flush_rewrite_rules();
}
add_action( 'init', 'quality_real_estate_init' );

function themes_taxonomy() {
    register_taxonomy(
        'realestates_categories',  //The name of the taxonomy. Name should be in slug form (must not contain capital letters or spaces).
        'estate',        //post type name
        array(
            'hierarchical' => true,
            'label' => __('Real Estates Category', 'quality'),  //Display name
            'query_var' => true,
            'rewrite' => array(
                'slug' => 'real-estates-category', // This controls the base slug that will display before each term
                'with_front' => true // Don't display the category base before
            )
        )
    );
}
add_action( 'init', 'themes_taxonomy');

add_action('wpcf7_mail_sent', function ($cf7) {
    // Run code after the email has been sent
    $wpcf = WPCF7_ContactForm::get_current();
    $wpccfid=$wpcf->id;
    // if you wanna check the ID of the Form $wpcf->id
    if ( '598' !== $wpccfid ) { // Change 123 to the ID of the form
        echo '
 <div class="modal fade in formids" id="myModal2" role="dialog" style="display:block;" tabindex="-1">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content no_pad text-center">
         <button type="button" class="close" data-dismiss="modal">&times;</button>
        <div class="modal-header heading">
          <h3 class="modal-title">Message Sent!</b></h3>
        </div>
        <div class="modal-body">

            <div class="thanku_outer define_float text-center">
                <h3>Thank you for getting in touch!</h3>
            </div>
        </div>
        <div class="modal-footer">
        </div>
      </div>

    </div>
    </div>
';
    }
});