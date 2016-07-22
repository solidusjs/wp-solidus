<?php

// http://wycks.wordpress.com/2013/02/14/why-the-content_width-wordpress-global-kinda-sucks
$content_width = 90000; // pixels

function getRedirect($postID) {

  // If bloodwater use bloodwater.org else drop subdomain
  $domain = preg_match('/bloodwater/',$_SERVER['SERVER_NAME'])?'bloodwater.org':preg_replace('/^(.*?)\.(.*)$/','$2', $_SERVER['SERVER_NAME']);
  // Add www unless there is already a subdomain
  $domain = preg_match('/^(.*)\.(.*)\.(.*)$/',$domain)?$domain:'www.'.$domain;

  if (!is_numeric($postID)) return 'http://'.$domain.$_SERVER["REQUEST_URI"];
  $post = get_post($postID);
  if ( is_user_logged_in() ) {
    $wp_json_nonce = wp_create_nonce('wp_json');
    $sample_permalink = get_sample_permalink($post->ID, $post->post_title);
    $permalink_pattern = parse_url($sample_permalink[0])['path'];
    $redirect_path = preg_replace("/%(.*)%/", $sample_permalink[1], $permalink_pattern); //Put the title slug into the permalink path
    $redirect_params = '?_wp_json_nonce='.$wp_json_nonce.'&is_preview=true&post_id='.$postID;
  } else {
    $permalink = parse_url(get_permalink($post->ID));
    $redirect_path = $permalink['path'];
  }
  return 'http://'.$domain.$redirect_path.$redirect_params;
}

function setup(){
  // Enable support for Post Thumbnails on posts and pages
  add_theme_support( 'post-thumbnails' );

  // Enable support for Post Formats
  add_theme_support( 'post-formats', array( 'image', 'quote', 'link', 'chat', 'audio', 'video' ) );
}

function register_media_taxonomies(){
  // Enable category/tag taxonomies for media attachments
  register_taxonomy_for_object_type( 'category', 'attachment' );
  register_taxonomy_for_object_type( 'post_tag', 'attachment' );
}

function add_markdown_support() {
  if (function_exists(jetpack_require_lib)) {
    jetpack_require_lib( 'markdown' );
  }
}

function api_url(){
  wp_redirect( 'http://wp-api.org' );
}

function redirect_to_posts($url) {
  return '/wp-admin/edit.php';
}

function customize_menu(){
  // http://justintadlock.com/archives/2011/06/13/removing-menu-pages-from-the-wordpress-admin
  remove_menu_page('index.php');
  remove_menu_page('edit-comments.php');
  remove_menu_page('themes.php');
  remove_menu_page('tools.php');
  remove_menu_page('edit.php?post_type=feedback');

  // http://codex.wordpress.org/Function_Reference/add_menu_page
  add_menu_page( 'API', 'API', 'activate_plugins', 'api', 'api_url', 'dashicons-admin-links', '20.1' );
}

// Add custom fields created by Types plugin to public types_custom_meta key
function add_types_custom_meta($data, $post, $context) {
  if (function_exists(types_get_fields)) {
    $post_custom_data = get_post_custom( $post['ID'] );

    // Get a list of custom fields added by Types plugin
    $all_types_fields = types_get_fields();

    // Create a new array of custom field names
    $post_custom_types_fields = array();
    foreach ( $all_types_fields as $key => $value ) {
      $post_custom_types_fields[] = $value['meta_key'];
    }

    // Check each post_meta value on post to see if its in the list of Types custom fields
    foreach ( $post_custom_data as $key => $value ) {
      if ( in_array($key, $post_custom_types_fields) ) {
        $types_custom_meta[$key] = $value;
      }
    }

    // If there were any Types custom fields on this post, add them to the API response
    if ( !empty($types_custom_meta) ) {
      $data['types_custom_meta'] = $types_custom_meta;
    }
  }

  return $data;
}

function parse_excerpt_markdown( $excerpt ) {
  if (class_exists(WPCom_Markdown)) {
    $excerpt = WPCom_Markdown::get_instance()->transform( $excerpt );
    $excerpt = stripslashes($excerpt);
    $excerpt = wpautop($excerpt);
    $excerpt = str_replace("\n", "", $excerpt);
  }
  return $excerpt;
}

add_action( 'init', 'register_media_taxonomies' );
add_action( 'init', 'add_markdown_support' );
add_action( 'after_setup_theme', 'setup' );
add_filter( 'login_redirect', 'redirect_to_posts' );
add_action( 'admin_menu', 'customize_menu', 999 );
add_filter( 'json_prepare_post', 'add_types_custom_meta', 10, 3 );
remove_filter( 'the_excerpt', 'wpautop' ); // Remove this and apply in parse_excerpt_markdown
add_filter( 'get_the_excerpt', 'parse_excerpt_markdown' );

if( class_exists( WpeCommon ) ){
  require 'wpengine.php';
}
