<?php

// @ini_set( 'upload_max_size' , '64M' );
// @ini_set( 'post_max_size', '64M');
// @ini_set( 'max_execution_time', '300' );


function pageBanner($args = array()) {
  // NULL would be a valid default value for args but array_key_exists chokes on it, so use empty array instead.

  // avoid notice by using array_key_exists instead of eg "if (!$args['title'])":
  if (!array_key_exists('title', $args)) {
    $args['title'] = get_the_title();
  }

  if (!array_key_exists('subtitle', $args)) {
    $args['subtitle'] = get_field('page_banner_subtitle');
  }

  if (!array_key_exists('photo', $args)) {
    // then if page has a page banner image ie...
    if (get_field('page_banner_background_image')) {
      $args['photo'] = get_field('page_banner_background_image')['sizes']['pageBanner'];
    } else {
      // default banner pic
      $args['photo'] = get_theme_file_uri('/images/ocean.jpg');
    }
  }

  ?>
  <div class="page-banner">
    <div class="page-banner__bg-image" 
      style="background-image: url(<?php echo $args['photo']; ?>)">
    </div>
    <div class="page-banner__content container container--narrow">
      <h1 class="page-banner__title"><?php echo $args['title']; ?></h1>
      <div class="page-banner__intro">
        <p><?php echo $args['subtitle']; ?></p>
      </div>
    </div>
  </div>
<?php }

function uni_files() {
  // NOTE: microtime() is a hack to give a unique version string, to prevent browser caching
  // during development. Use a static version string (e.g. '1.0') on live if you want
  // browser caching.
  wp_enqueue_script('main-uni-js', get_theme_file_uri('/js/scripts-bundled.js'), NULL, microtime(), true);
  wp_enqueue_style('google-custom-fonts', '//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i');
  wp_enqueue_style('font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
  wp_enqueue_style('uni_main_styles', get_stylesheet_uri(), NULL, microtime());
}
add_action('wp_enqueue_scripts', 'uni_files');

function uni_features() {
  // register_nav_menu('headerMenuLocation', 'Header menu location');
  // register_nav_menu('footerLocation1', 'Footer location 1');
  // register_nav_menu('footerLocation2', 'Footer location 2');
  add_theme_support('title-tag');
  add_theme_support('post-thumbnails');
  // final arg is whether/how to crop. false will constrain to dimensions given.
  add_image_size('professorLandscape', 400, 260, true);
  add_image_size('professorPortrait', 480, 650, true);
  add_image_size('pageBanner', 1500, 350, true);
}

add_action('after_setup_theme', 'uni_features');

function uni_adjust_queries($query) {
  
  // Sort programs a-z
  if (!is_admin() AND is_post_type_archive('program') AND $query->is_main_query()) {
    $query->set('orderby', 'title');
    $query->set('order', 'ASC');
    $query->set('posts_per_page', '-1');
  }
  
  
  //  Show approaching events first, exclude past ones
  if (!is_admin() AND is_post_type_archive('event') AND $query->is_main_query()) {
    $today = date('Ymd');
    $query->set('meta_key', 'event_date');
    $query->set('orderby', 'meta_value_num');
    $query->set('order', 'ASC');
    $query->set('meta_query', array(
      array(
        'key' => 'event_date',
        'compare' => '>=',
        'value' => $today,
        'type' => 'numeric'
        )
      ));
      // $query->set('', '');
    }
  }
  
  add_action('pre_get_posts', 'uni_adjust_queries');
  
  
  
  
  