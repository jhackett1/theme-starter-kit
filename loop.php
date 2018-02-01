<?php
// Start loop
if (have_posts()):
  while(have_posts()): the_post(); ?>

  <article class="post">
    <a href="<?php the_permalink(); ?>"><h2 class="post-title"><?php the_title(); ?></h2></a>
    <h5 class="post-date"><?php echo human_time_diff( get_the_time('U'), current_time('timestamp') ) . ' ago'; ?></h5>
    <p class="post-excerpt"><?php the_excerpt(); ?></p>
  </article>

  <?php endwhile;
// Finish loop
endif;
