<?php
get_header(); 
pageBanner(array(
  'title' => 'Past events',
  'subtitle' => 'c what happend'
)); ?>


<div class="container container--narrow page-section">
  <?php

  $today = date('Ymd');
  $pastEvents = new WP_Query(array(
    'paged' => get_query_var('paged', 1),
    'post_type' => 'event',
    'orderby' => 'meta_value_num',
    // 'posts_per_page' => 1,
    'meta_key' => 'event_date',
    'order' => 'ASC',
    'meta_query' => array(
      array(
        'key' => 'event_date',
        'compare' => '<',
        'value' => $today,
        'type' => 'numeric'
      )
    )
  ));

  while ($pastEvents->have_posts()) {
    $pastEvents->the_post(); 
    get_template_part('template-parts/content-event');
  }

  // default only works with default queries, so:
  echo paginate_links(array(
    'total' => $pastEvents->max_num_pages
  ));

  ?>

</div>

<?php
get_footer();
?>