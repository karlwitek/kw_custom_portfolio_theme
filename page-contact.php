<?php get_header(); ?>

<div class="kwcpt-header-spacer"></div>

<div class="kwcpt-page-main-container">
  <div class="kwcpt-page-content-container">
    <?php the_content(); ?>
    <?php get_template_part('includes/section', 'form'); ?>
  </div>
</div>

<?php get_footer(); ?>