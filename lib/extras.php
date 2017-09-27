<?php

namespace Roots\Sage\Extras;

use Roots\Sage\Setup;

/**
 * Add <body> classes
 */
function body_class($classes) {
  // Add page slug if it doesn't exist
  if (is_single() || is_page() && !is_front_page()) {
    if (!in_array(basename(get_permalink()), $classes)) {
      $classes[] = basename(get_permalink());
    }
  }

  // Add class if sidebar is active
  if (Setup\display_sidebar()) {
    $classes[] = 'sidebar-primary';
  }

  return $classes;
}
add_filter('body_class', __NAMESPACE__ . '\\body_class');

/**
 * Clean up the_excerpt()
 */
function excerpt_more() {
  return ' &hellip; <a href="' . get_permalink() . '">' . __('Continued', 'sage') . '</a>';
}
add_filter('excerpt_more', __NAMESPACE__ . '\\excerpt_more');

add_action( 'wp_print_styles',  __NAMESPACE__ . '\\aa_deregister_styles', 100 );
function aa_deregister_styles() {
    wp_deregister_style( 'contact-form-7' );
}


if ( !function_exists( 'acf_get_language_default' ) )
{
    function acf_get_language_default()
    {
        return acf_get_setting( 'default_language' );
    }
}

if ( !function_exists( 'acf_set_language_to_default' ) )
{
    function acf_set_language_to_default()
    {
        add_filter( 'acf/settings/current_language', __NAMESPACE__ . '\\acf_get_language_default', 100 );
    }
}

if ( !function_exists( 'acf_unset_language_to_default' ) )
{
    function acf_unset_language_to_default()
    {
        remove_filter( 'acf/settings/current_language', __NAMESPACE__ . '\\acf_get_language_default', 100 );
    }
}

function add_coords() {
  if(is_template_page('template-contatti.php')) :
?>
  <script>
    var mapCoords = {
      lat:  <?php $original_id = pll_get_post(get_the_ID(), 'it'); echo get_field('coordinate', $original_id)['lat']; ?>,
      lng:  <?php $original_id = pll_get_post(get_the_ID(), 'it'); echo get_field('coordinate', $original_id)['lng']; ?>
    }
  </script>
<?php
  endif;
}

add_action( 'wp_head',  __NAMESPACE__ . '\\add_coords', 100 );


@ini_set( 'upload_max_size' , '64M' );
@ini_set( 'post_max_size', '64M');
@ini_set( 'max_execution_time', '300' );