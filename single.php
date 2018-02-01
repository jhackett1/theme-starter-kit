<?php get_header(); ?>

<div class="side-body">
  <main class="site-content">
    <?php
    // Start loop
    if (have_posts()):
      while(have_posts()): the_post(); ?>

      <article class="post">
        <h1 class="post-title"><?php the_title(); ?></h1>
        <h5 class="post-date"><?php echo human_time_diff( get_the_time('U'), current_time('timestamp') ) . ' ago'; ?></h5>
        <?php the_content(); ?>
      </article>

      <?php endwhile;
    // Finish loop
    endif; ?>
  </main>
  <?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>
