<?php

if( function_exists( 'add_theme_support' ) ) { add_theme_support( 'post-thumbnails' );  }

function khrall_comment($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment; ?>
	
    <li>
        <div class="avatar"><?php echo get_avatar($comment, 64); ?></div>
        <div class="author">
        	<span><?php echo get_comment_author_link(); ?></span><br />
          	<small><?php echo get_comment_date(); ?>, <?php echo get_comment_time(); ?></small>
        </div>
        
        <div class="comment">
			<?php if ($comment->comment_approved == '0') : ?>
            <strong>Awaiting approval</strong>
            <?php endif; comment_text(); ?>
        </div>
        
        <br clear="all" />
   </li>
<?php }

function custom_excerpt_length( $length ) {
    return 35;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

?>