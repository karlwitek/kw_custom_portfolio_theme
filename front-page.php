<?php get_header(); ?>

<div class="kwcpt-header-spacer-front-page"></div>

<div id="kwcpt-parent-container">
  <div class="kwcpt-content-container">
    <?php the_content(); ?>
  </div>
  <div class="kwcpt-nav-container">
    <div class="kwcpt-inner-nav-container">
      <?php get_template_part('includes/section', 'navcontent') ?>
    </div>
  </div>

</div>

<?php get_footer(); ?>