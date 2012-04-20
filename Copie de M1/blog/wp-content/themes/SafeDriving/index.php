<?php get_header(); ?>

<div class="posts">
<?php if ( have_posts() ) : ?>
  <?php while ( have_posts() ) : the_post(); ?>
  <div class="post">
    <h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></h2>
    <?php the_content(); ?>
  </div>
  <?php endwhile; ?>
<?php endif; ?>
</div>

<?php get_footer(); ?>