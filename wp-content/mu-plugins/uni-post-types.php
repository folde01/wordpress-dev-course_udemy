<?php

function uni_post_types() {

  // Campus post type
  register_post_type('campus', array(
    'public' => true,
    'supports' => array('title', 'editor', 'excerpt'),
    'rewrite' => array('slug' => 'campuses'),
    'has_archive' => true,
    'labels' => array(
      'name' => 'Campuses',
      'add_new_item' => 'Add new Campus',
      'edit_item' => 'Edit Campus',
      'all_items' => 'All Campuses',
      'singular_name' => 'Campus'
    ),
    'menu_icon' => 'dashicons-location-alt'
  ));

  // Event post type
  register_post_type('event', array(
    'public' => true,
    'supports' => array('title', 'editor', 'excerpt'),
    'rewrite' => array('slug' => 'events'),
    'has_archive' => true,
    'labels' => array(
      'name' => 'Events',
      'add_new_item' => 'Add new Event',
      'edit_item' => 'Edit Event',
      'all_items' => 'All Events',
      'singular_name' => 'Event'
    ),
    'menu_icon' => 'dashicons-calendar'
  ));

  // Program post type
  register_post_type('program', array(
    'public' => true,
    'supports' => array('title', 'editor'),
    'rewrite' => array('slug' => 'programs'),
    'has_archive' => true,
    'labels' => array(
      'name' => 'Programs',
      'add_new_item' => 'Add new Program',
      'edit_item' => 'Edit Program',
      'all_items' => 'All Programs',
      'singular_name' => 'Program'
    ),
    'menu_icon' => 'dashicons-awards'
  ));

    // Professor post type
    register_post_type('professor', array(
      'public' => true,
      'supports' => array('title', 'editor', 'thumbnail'),
      'labels' => array(
        'name' => 'Professors',
        'add_new_item' => 'Add new Professor',
        'edit_item' => 'Edit Professor',
        'all_items' => 'All Professors',
        'singular_name' => 'Professor'
      ),
      'menu_icon' => 'dashicons-welcome-learn-more'
    ));
}


add_action('init', 'uni_post_types');