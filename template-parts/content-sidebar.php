<?php
/**
 * Template part for displaying the content of the sidebar
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package A_Wordpress_Blog_Theme
 */

?>

<div class="site-sidebar-wrapper">
  <?php get_search_form(); ?>
  <section id="posts-2">
    <p class="section-title">Latest Posts</p>
    <ul>
      <?php $the_query = new WP_Query('posts_per_page=5'); ?>
      <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
        <li class="">
          <div class="recent-post mb-4 d-flex">
            <img class="post-image" src="<?php the_post_thumbnail_url('thumbnail'); ?>" />
            <div class="post-text">
              <h3 class="post-title">
                <a class="d-block" href="<?php the_permalink() ?>"><?php the_title(); ?></a>
              </h3>
              <div class="post-meta">
                <div class="post-date">
                  <i class="fas fa-calendar-alt"></i>
                  <?php echo get_the_date() ?>
                </div>
                <div class="post-author">
                  <i class="fas fa-user"></i>
                  <?php the_author(); ?>
                </div>
                <div class="post-comment-count">
                  <i class="fas fa-comment-alt"></i>
                  <?php echo get_comments_number(); ?>
                </div>
              </div>
            </div>
          </div>
        </li>
      <?php
      endwhile;
      wp_reset_postdata();
      ?>
    </ul>
  </section>
  <?php dynamic_sidebar('sidebar-1'); ?>
</div>
