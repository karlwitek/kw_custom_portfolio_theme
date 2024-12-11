<?php 
$args = array('post_type' => 'post');
$postObj = new WP_Query($args);

if ($postObj->have_posts()) {
  while ($postObj->have_posts()) {
    $postObj->the_post();
    // display : $post accessible now
    $firstName = get_the_author_meta('first_name');
    $lastName = get_the_author_meta('last_name');

    $authorId = $post->post_author; 

    ?>
    <a class="kwcpt-archive-link" href="<?php echo get_permalink(); ?>">
      <div class="kwcpt-blog-content">
          <div class="kwcpt-blog-image">
            <?php if (has_post_thumbnail()): ?>
              <img src="<?php the_post_thumbnail_url('large') ?>" alt="<?php the_title(); ?>">
            <?php endif; ?>
          </div>
          <div class="kwcpt-text-content">
            <h1><?php echo get_the_title(); ?></h1>
            <p><?php the_excerpt(); ?></p>
          </div>
          <div class="kwcpt-blog-meta">
            <!-- <p>Author: <?php //the_author_meta('first_name', $authorId); ?> <?php //the_author_meta('last_name', $authorId); ?></p> -->
            <p>Author: <?php echo $firstName; ?> <?php echo $lastName; ?></p>

            <p>Posted: <?php the_date('F j, Y'); ?> at <?php the_time('g:i a'); ?></p>
          </div>
      </div>
    </a>
    <?php
  }
}
wp_reset_postdata();



  

