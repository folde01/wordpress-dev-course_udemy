<?php
get_header();
// pageBanner();
pageBanner(array(
  'title' => 'All our amazing events',
  'subtitle' => 'See what\'s happening',
));
?>

<div class="container container--narrow page-section">
  <?php
  while (have_posts()) {
    the_post();
    get_template_part('template-parts/content-event'); 
  }
  echo paginate_links();
  ?>

  <hr>
  
  <p>Looking for our past events? Check <a href="<?php echo site_url('/past-events') ?>">here.</a></p>

</div>

<?php
get_footer();
?>