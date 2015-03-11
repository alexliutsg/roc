<?php
/*
Template Name: Custom Table
*/
?>

<?php get_header(); ?>

<div id="primary" class="content-area">
	<div id="content" class="site-content" role="main">

                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                        <header class="entry-header">
                                <?php if ( has_post_thumbnail() && ! post_password_required() ) : ?>
                                <div class="entry-thumbnail">
                                        <?php the_post_thumbnail(); ?>
                                </div>
                                <?php endif; ?>

                                <h1 class="entry-title"><?php the_title(); ?></h1>
                        </header><!-- .entry-header -->

                        <div class="entry-content">
                     
                                <?php the_content(); ?>
                                
                 <?php
                
                global $wpdb;
                /* wpdb class should not be called directly.global $wpdb variable is an instantiation of the class already set up to talk to the WordPress database */ 
                
                $result = $wpdb->get_results( "SELECT * FROM wp_frm_item_metas "); /*mulitple row results can be pulled from the database with get_results function and outputs an object which is stored in $result */
                
                //echo "<pre>"; print_r($result); echo "</pre>";
                /* If you require you may print and view the contents of $result object */
                
                echo "ID"."  "."Value"."<br><br>";
                foreach($result as $row)
                 {
                
                 echo $row->id."  ".$row->meta_value."<br>";
                
                 }
                 /* Print the contents of $result looping through each row returned in the result */
                
                ?>
                
                                <?php wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentythirteen' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>
                        </div><!-- .entry-content -->

                        <footer class="entry-meta">
                                <?php edit_post_link( __( 'Edit', 'twentythirteen' ), '<span class="edit-link">', '</span>' ); ?>
                        </footer><!-- .entry-meta -->
                </article><!-- #post -->

                

        </div><!-- #content -->
</div><!-- #primary -->


<?php get_sidebar(); ?>
<?php get_footer(); ?>