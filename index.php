<?php
/**
 * @package 	WordPress
 * @subpackage 	Doctore
 * @since 		Doctore 2.0
 */
?>

<?php get_template_part( 'header' ); ?>
<?php wp_enqueue_script('index-script', get_stylesheet_directory_uri() . '/js/index.js', array( 'jquery', 'header-script' )); ?>

    <?php $news = get_category_by_slug('news'); ?>

    <div id="slider">
    	<div class="wrapper">
            <ul class="container">
            
            	<?php query_posts('cat=' . $news->cat_ID);
                while ( have_posts() ) : the_post(); ?>
                
                <li><a href="<?php echo get_permalink(); ?>">
                	<?php if ( has_post_thumbnail() ) { the_post_thumbnail(); } ?>
                    <div class="overlay">
                    	<strong><?php the_title(); ?></strong><br>
                        <?php the_excerpt(); ?>
                    </div>
                    </a>
                </li>
                
                <?php endwhile; wp_reset_query(); ?>
            </ul>
        </div>
        <div class="sliderNext"><span>></span></div>
    	<div class="sliderPrev"><span><</span></div>
    </div>
    
    <!--
    <div class="flat-box">
    	<div class="content">
            <h1>Doctore 2.0</h1>
            <h3>Reshaped, redesigned, revamped</h3>
            
            <p>Breathing new life to the old Doctore theme, Doctore 2.0 seeks to improve the visual aspects of reading tutorials and news. Bringing a theme with full WordPress support for both computers and mobile devices, Doctore 2.0 brings you the power of posting media in a readable and visually impressive fashion.</p>
        </div>
    </div>
    -->

    <div class="contentBox">

        <ul id="frontPosts">

            <?php 
                $posts_per_page = 3;
                $postsParsed = 0;

                query_posts('posts_per_page=30&cat=-' . $news->cat_ID);
                while ( have_posts() ) : the_post(); 
            ?>

            <li class="page-<?php echo floor($postsParsed/$posts_per_page) ?>">
                <div class="thumb">
                    <a  title="Read: <?php echo the_title(); ?>" 
                        href="<?php echo get_permalink(); ?>">
                        <?php if ( has_post_thumbnail() ) { the_post_thumbnail(); } ?>
                    </a>
                </div>

                <div class="content">
                    <h2>
                        <a  title="Read: <?php echo the_title(); ?>" 
                            href="<?php echo get_permalink(); ?>">
                            <?php the_title(); ?>
                        </a>
                    </h2>

                    <?php the_excerpt(); ?>

                    <p class="actions">
                        <a  title="Read: <?php echo the_title(); ?>" 
                            href="<?php echo get_permalink(); ?>">
                            Read more ...
                        </a>
                    </p>
                </div>

                <br clear="all" />
                <div class="dottedLine"></div>
            </li>

            <?php
                $postsParsed++;
                endwhile; 
                wp_reset_query(); 
            ?>

        </ul>

        <ul id="frontPostsNav">
        <?php for($i = 0; $i < floor($postsParsed/$posts_per_page); $i++) : ?>
            <li 
                <?php echo $i == 0 ? 'class="active"' : ''; ?>
                page="<?php echo $i; ?>"
            >   <?php echo ($i + 1); ?>
            </li>
        <?php endfor; ?>
        </ul>
    </div>
    
<?php get_template_part( 'footer' ); ?>