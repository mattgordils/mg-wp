<? 
if (!defined('ABSPATH')) exit(); 
// Plugin Name: HyperPress
// Plugin URI: http://hyper-link.us/
// Description: Hyper Functionality  and Style on your site
// Version: a0
// Author: Hyperlink
// Author URI: http://hyper-link.us

function set_login_url() {
  return get_bloginfo('url');
}

function hyperstyles(){
  include(plugin_dir_path(__FILE__)."styles.php");
} 

function include_options(){
  include(plugin_dir_path(__FILE__)."settings.php");
}

function load_scripts() {
  wp_register_script('hyper_js', plugin_dir_url( __FILE__ ) . 'assets/js/hyperpress.js', array('jquery','wp-color-picker' ), false, true);
  wp_enqueue_script('hyper_js');
  wp_enqueue_style('wp-color-picker');
}

function register_settings() {
  $fields = array('test','login_logo','primary_color','darker_color');
  foreach ($fields as $name):
    register_setting('hypersettings', $name);
  endforeach;
}

function add_hypersettings() {
  add_menu_page( 'Home', 'Home', 'edit_posts', '../', '', NULL, -1);
  add_options_page('HyperPress Settings', 'Hyperpress', 'manage_options', 'hypersettings', 'include_options');

}

function remove_default_stylesheets() {
  wp_deregister_style('wp-admin');
}

if (is_admin()):
  add_action('admin_init', 'register_settings');
  add_action('admin_init','remove_default_stylesheets');
  add_action('admin_menu', 'add_hypersettings');
  add_action('admin_enqueue_scripts', 'wp_enqueue_media');
  add_action('admin_enqueue_scripts', 'load_scripts');
  add_action('admin_head', 'hyperstyles');
endif;

add_action('login_head', 'hyperstyles');
add_action( 'login_headerurl', 'set_login_url'); // set Login Logo as site URL

// Thumbnails to admin post view
// Add the posts and pages columns filter. They can both use the same function.
add_filter('manage_pages_columns', 'thumbnail_column', 1);
// This theme uses post thumbnails
add_theme_support( 'post-thumbnails' );
add_image_size( 'admin-thumb', 100, 100, true);

// Add the column
function add_post_thumbnail_column($cols){
  $cols['post_thumb'] = __('Featured');
  return $cols;
}

add_filter('manage_posts_columns', 'thumbnail_column');
function thumbnail_column($columns) {
  $new = array();
  foreach($columns as $key => $title) {
    if ($key=='title') // Put the Thumbnail column before the Author column
      $new['post_thumb'] = 'Featured Image';
    $new[$key] = $title;
  }
  return $new;
}

// Hook into the posts an pages column managing. Sharing function callback again.
add_action('manage_posts_custom_column', 'display_post_thumbnail_column', 1, 2);
add_action('manage_pages_custom_column', 'display_post_thumbnail_column', 1, 2);


// Grab featured-thumbnail size post thumbnail and display it.
function display_post_thumbnail_column($col, $id){
  switch($col){
    case 'post_thumb':
      if( function_exists('the_post_thumbnail') )
        echo the_post_thumbnail( 'admin-thumb' );
      else
        echo 'Not supported in theme';
      break;
  }
}

if (!function_exists('disable_admin_bar')) {

    function disable_admin_bar() {
        // css override for the admin page
        function remove_admin_bar_style_backend() { 
            echo '<style>body.admin-bar #wpcontent, body.admin-bar #adminmenu { padding-top: 0px !important; }#wpadminbar,.show-admin-bar{display:none;}</style>';
        }     
        add_filter('admin_head','remove_admin_bar_style_backend');

        // css override for the frontend
        function remove_admin_bar_style_frontend() {
            echo '<style type="text/css" media="screen">
            html { margin-top: 0px !important; }
            * html body { margin-top: 0px !important; }#wpadminbar{display:none;}
            </style>';
        }
        add_filter('wp_head','remove_admin_bar_style_frontend', 99);
    }
}
add_action('init','disable_admin_bar');

add_action( 'admin_footer', 'add_pageloader_logout' );


function add_pageloader_logout(){
  echo '<div id="pageLoader" class="loading">
  <div class="loader"></div>
</div><a class="hyperpress-logout" href="'.wp_logout_url().'" title="Logout">Log Out</a>';
}

?>