<?php
// THEME FUNCTIONS

// Get the customiser functions file
require_once "customiser.php";

// Enqueue scripts and styles
function smallwins_enqueuer(){
  wp_enqueue_style('main', get_template_directory_uri() . '/css/main.css');
  wp_enqueue_style('font-awesome', get_template_directory_uri() . '/font-awesome/css/fontawesome-all.min.css');
  wp_enqueue_script('bundle', get_template_directory_uri() . '/js/bundle.js', false, false, true);
}
add_action('wp_enqueue_scripts', 'smallwins_enqueuer');

// Add support for a site logo and featured images
add_theme_support('custom-logo');
add_theme_support('post-thumbnails');

// Register two menus
register_nav_menus( array(
  'main' => 'Main',
  'social' => 'Social'
));

// Register a widgetised area
function smallwins_widgets_init() {
  register_sidebar( array(
      'name'          => __( 'Sidebar', 'smallwins' ),
      'id'            => 'sidebar',
      'before_widget' => '<section id="%1$s" class="widget %2$s">',
      'after_widget'  => '</aside>',
      'before_title'  => '<h3 class="widget-title">',
      'after_title'   => '</h3>',
  ) );
}
add_action('widgets_init', 'smallwins_widgets_init');

// Prettify excerpts
function smallwins_excerpt_length( $length ) {
	return 20;
}
function smallwins_excerpt_more($more) {
  global $post;
	return '...';
}
add_filter( 'excerpt_length', 'smallwins_excerpt_length', 999 );
add_filter('excerpt_more', 'smallwins_excerpt_more');

// Remove unneeded Wordpress widgets and menus for a cleaner client experience
function smallwins_disable_dashboard_widgets() {
    remove_menu_page( 'about.php' );
    remove_meta_box('dashboard_primary', 'dashboard', 'core');// Remove WordPress Events and News
}
add_action('admin_menu', 'smallwins_disable_dashboard_widgets');

add_action( 'wp_before_admin_bar_render', function() {
  global $wp_admin_bar;
  $wp_admin_bar->remove_menu('wp-logo');
}, 7 );

// Do not auto-P images
function smallwins_unautop_images($content){
  return preg_replace('/<p>(\s*)(<img .* \/>)(\s*)<\/p>/iU', '\2', $content);
}
add_filter('the_content', 'smallwins_unautop_images');

// Customise the wp_login logo to the site logo
function smallwins_custom_login(){
  ?>
    <style type="text/css">
      .login h1 a{
        background-image: none, url(<?php echo wp_get_attachment_image_src( get_theme_mod( 'custom_logo' ), 'medium' )[0]; ?>);
        background-size: contain;
      }
    </style>
  <?php
};
add_action('login_head', 'smallwins_custom_login');
