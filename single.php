<?php get_header(); ?>

<div class="kwcpt-header-spacer"></div>
<section id="kwcpt-single-parent">
  <?php if ( have_posts() ): while( have_posts() ): the_post(); ?>

    <div class="kwcpt-single-content">
        <div class="kwcpt-single-image-container">
          <?php if (has_post_thumbnail()): ?>
            <img src="<?php the_post_thumbnail_url('large')?>" alt="<?php the_title(); ?>">
            <?php  endif; ?>
        </div>
        <h2><?php the_title(); ?></h2>
        <p><?php the_content(); ?></p>
        <p>Posted by <?php the_author(); ?></p>
        <p><?php echo get_the_date('l jS F, Y'); ?></p>
    </div>
  <?php  endwhile; endif; ?>
</section>

<?php get_footer(); ?>
