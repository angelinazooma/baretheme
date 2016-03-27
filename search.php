<?php 
get_header();
//global $aa;
?>
<div id="container">
	<?php get_template_part( 'includes/banner', 'page' ); ?>

	<section id="main" class="columns"><div class="wrap">
	
		<div id="blog-posts">
		<h1 class="page-title">Search</h1>

			<?php if(have_posts()) : ?>
				<?php while(have_posts()) : the_post(); ?>

					<?php 
						if(has_post_thumbnail()) {
							$thumb_id = get_post_thumbnail_id( $post_id );
							$thumb = wp_get_attachment_image_src($thumb_id, 'home-thumb');
						}
					?>
					<article>
						<div class="post-thumb">
							<a href="<?php echo get_permalink(); ?>"><img src="<?php echo $thumb[0]; ?>" alt="<?php the_title(); ?>"></a>
						</div>
						<h3 class="entry-title"><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h3>
						<span class="post-date"><?php the_date(''); ?></span>
						<p><?php echo excerpt(100); ?></p>
						<p class="readmore"><a href="<?php echo get_permalink(); ?>"> read more <i class="fa fa-angle-double-right"></i></a></p>
					</article>
				<?php endwhile; ?>

				<div id="pagination">
					<div class="nav-previous"><?php next_posts_link( 'next <i class="fa fa-chevron-right"></i>' ); ?></div>
					<div class="nav-next"><?php previous_posts_link( '<i class="fa fa-chevron-left"></i> back' ); ?></div>
				</div>
			<?php endif; ?>
		</div>

		<aside id="sidebar">
			<?php get_sidebar('blog'); ?>
		</aside>
	</div></section> <?php // #main ?>

</div><?php // #container ?>
<?php get_footer(); ?>