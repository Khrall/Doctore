<?php
/*
 * Template Name: Tutorials
 */

/**
 * @package 	WordPress
 * @subpackage 	Doctore
 * @since 		Doctore 2.0
 */
?>
<?php get_template_part( 'header' ); ?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

  	<div class="contentBox">
        <article>
          	<h1 class="title"><?php the_title(); ?></h1>
            
            <?php if ( has_post_thumbnail() ) { the_post_thumbnail(); } ?>
            
            <div class="content"><?php the_content(); ?></div>
      
            <div class="dottedLine"></div>
            
            <?php comments_template(); ?>
        </article>
    </div>
  
<?php endwhile; ?>

<?php get_template_part( 'footer' ); ?>