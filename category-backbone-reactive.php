
<?php
$currentCategories = get_the_category();
query_posts(array(
    'category_name' => $currentCategories[0]->slug, 
    'posts_per_page' => 20,
    'paged' => $paged,
    'orderby' => 'date', 
    'order' => 'ASC' 
));
?>

<?php get_header(); ?>

<div id="content">
  <div id="inner-content" class="wrap clearfix">
    <div id="main" class="eightcol first clearfix" role="main">
      
      <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
      
      <article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">
	  <h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
          <?php the_excerpt(); ?> 
       
      </article> <!-- end article -->
      
      <?php endwhile; ?>
      
      <?php if (function_exists('bones_page_navi')) { ?>
      <?php bones_page_navi(); ?>
      <?php } else { ?>
      <nav class="wp-prev-next">
	<ul class="clearfix">
	  <li class="prev-link"><?php next_posts_link(__('&laquo; Older Entries', "bonestheme")) ?></li>
	  <li class="next-link"><?php previous_posts_link(__('Newer Entries &raquo;', "bonestheme")) ?></li>
	</ul>
      </nav>
      <?php } ?>
      
      <?php else : ?>
      
      <article id="post-not-found" class="hentry clearfix">
	<header class="article-header">
	  <h1><?php _e("Oops, Post Not Found!", "bonestheme"); ?></h1>
	</header>
	<section class="entry-content">
	  <p>Hmm, we couldn't find the tutorial you were looking for.</p>
          <p>Possibly the tutorial you were after is listed below?</p>

          <ul class="tutorial-list">
          <?php 
          $args = array(
              'child_of' => 2,
              'title_li' => '',
              
          );
          wp_list_categories( $args ); 
          ?> 
          </ul>

	</section>
      </article>
      
      <?php endif; ?>
      
    </div> <!-- end #main -->
    
    <?php get_sidebar(); ?>
    
  </div> <!-- end #inner-content -->
  
</div> <!-- end #content -->

<?php get_footer(); ?>
