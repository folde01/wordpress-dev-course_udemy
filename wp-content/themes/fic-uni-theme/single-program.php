<?php

get_header();

while (have_posts()) {
  the_post(); 
  pageBanner(); ?>

  <div class="container container--narrow page-section">
    <div class="metabox metabox--position-up metabox--with-home-link">
      <p>
        <a class="metabox__blog-home-link" href="<?php echo get_post_type_archive_link('program') ?>">
          <i class="fa fa-home" aria-hidden="true"></i>
          All programs
        </a>
        <span class="metabox__main"><?php the_title(); ?></span>
      </p>
    </div>

    <div class="generic-content">
      <?php the_content(); ?>
    </div>

    <?php

      // Related professors custom query

      $today = date('Ymd');
      $relatedProfessors = new WP_Query(array(
        'posts_per_page' => -1,
        'post_type' => 'professor',
        'orderby' => 'title',
        'order' => 'ASC',
        'meta_query' => array(
          array(
            'key' => 'related_programs',
            'compare' => 'LIKE',
            // quote marks added due to false positive matches caused by how arrays are 
            // serialized in wp database:
            'value' => '"' . get_the_ID() . '"'
          )
        )
      ));

      // Display any related professors 

      if ($relatedProfessors->have_posts()) {
        echo '<hr class="section-break">';
        echo '<h2 class="headline headline--medium">' . get_the_title() . ' professors</h2>';

        // print_r($relatedProfessors->posts);

        echo '<ul class="professor-cards">';

        while ($relatedProfessors->have_posts()) {
          $relatedProfessors->the_post(); ?>

          <li class="professor-card__list-item">
            <a class="professor-card" href="<?php the_permalink(); ?>">
              <img class="professor-card__image" src="<?php the_post_thumbnail_url('professorLandscape'); ?>" alt="">
              <span class="professor-card__name"><?php the_title(); ?></span>
            </a>
          </li>
        <?php }

        echo '</ul>';
      }

      // Resets post object to object obtained by default (url-based) query i.e. the post, 
      // which is why it should be run in between custom queries occurring on the same page.
      wp_reset_postdata();




      // Related upcoming events custom query

        $today = date('Ymd');

        $upcomingEvents = new WP_Query(array(
          'posts_per_page' => 2,
          'post_type' => 'event',
          'orderby' => 'meta_value_num',
          'meta_key' => 'event_date',
          'order' => 'ASC',
          'meta_query' => array(
            array(
              'key' => 'event_date',
              'compare' => '>=',
              'value' => $today
            ),
            array(
              'key' => 'related_programs',
              'compare' => 'LIKE',
              // quote marks added due to false positive matches caused by how arrays are 
              // serialized in wp database:
              'value' => '"' . get_the_ID() . '"'
            )
          )
        ));

        if ($upcomingEvents->have_posts()) {
          echo '<hr class="section-break">';
          echo '<h2 class="headline headline--medium">Upcoming ' . get_the_title() . ' events</h2>';
        }

        // print_r($upcomingEvents->posts);

        while ($upcomingEvents->have_posts()) {
          $upcomingEvents->the_post();  
          get_template_part('template-parts/content-event');
        }

  ?>

</div>

<?php }

get_footer();
?>