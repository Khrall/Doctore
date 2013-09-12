<?php if ( have_comments() ) : ?>
	<div id="commentsHeader">
		<span><?php comments_number('', '1 Comment', '% Comments'); ?></span>
	</div>
    <ul id="comments">
    	<?php wp_list_comments(array('type' => 'comment', 'callback' => 'khrall_comment')); ?>
    </ul>
    <div class="dottedLine"></div>
<?php endif; ?>

<div id="respond">
    
    <form id="commentform" method="post" action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php">

        <div class="author">
            
            <?php if($user_ID) : //If user is signed in: ?>  
                <p class="name"><?php echo get_userdata( $user_ID )->display_name; ?></p>
            <?php else : ?>
                <p><input type="text" name="author" id="author" value="Nickname" size="22" tabindex="1" /></p>
                <p><input type="text" name="email" id="email" value="E-mail" size="22" tabindex="2" /></p>
            <?php endif; ?>
            
            <p><input name="submit" type="submit" id="submit" tabindex="5" value="Submit Comment" />  
        	<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" /></p>  
            
        </div>
    	
        <div class="response">
        
            <p><textarea style="height: <?php echo is_user_logged_in() ? 71 : 124; ?>px;" name="comment" id="comment" tabindex="4">Leave a comment</textarea></p>  
            <?php do_action('comment_form', $post->ID); ?> 
            
		</div>
        
        <br clear="all" />
    </form>
</div>