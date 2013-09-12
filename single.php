<?php
/**
 * @package 	WordPress
 * @subpackage  Doctore
 * @since       Doctore 2.0
 */
?>
<?php get_template_part( 'header' ); ?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

	<div class="contentBox">
        <article>
        	<h1 class="title"><?php the_title(); ?></h1>
            
            <ul class="meta">
            	<li class="author"><span></span>by <?php the_author(); ?></li>
                <li class="date"><span></span><?php the_date(); ?></li>
                <li class="comments"><span></span><?php comments_number( 'No comments', '1 comment', '% comments' ); ?></li>
            </ul>
            
            <br clear="all" />
            
            
            <?php if ( has_post_thumbnail() ) { the_post_thumbnail(); } ?>
            
            <div class="content"><?php the_content(); ?></div>
    	
            <div class="dottedLine"></div>
            
            <?php comments_template(); ?>
        </article>
    </div>
	
<?php endwhile; ?>

<?php get_template_part( 'footer' ); ?>