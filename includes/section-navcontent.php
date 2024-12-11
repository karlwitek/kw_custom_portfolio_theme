<?php

function get_content_for_nav($pagename) {
  $post = get_page_by_path($pagename);
  $content = apply_filters('the_content', $post->post_content);
  return $content;
}

echo get_content_for_nav('nav-content');

