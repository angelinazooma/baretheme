<?php 
get_header();
//global $aa;
?>
<div id="container">
	<?php get_template_part( 'includes/banner', 'page' ); ?>

	<section id="main" class="columns"><div class="wrap">
	
		<article>			
			<?php if(have_posts()) : ?>
			<?php while(have_posts()) : the_post(); ?>
				<?php
				if(has_post_thumbnail()) {
					$thumb_id = get_post_thumbnail_id( $post_id );
					$thumb = wp_get_attachment_image_src($thumb_id, 'medium');
					$large = wp_get_attachment_image_src($thumb_id, 'large');
				} ?>
				<h1 class="entry-title"><?php the_title(); ?></h1>
				<span class="post-date"><?php the_date(''); ?></span>
				<a href="<?php echo $large[0]; ?>" rel="lightbox" class="post-image"><img src="<?php echo $thumb[0]; ?>" alt="<?php the_title(); ?>" ></a>
				<?php the_content(''); ?>
			<?php endwhile; ?>
			<?php endif; ?>		
		</article>
	
		<aside id="sidebar">
			<a href="<?php echo esc_url(home_url('/')); ?>blog" class="button back"><i class="fa fa-chevron-left"></i> Back to Blog</a>
			<?php get_sidebar("blog"); ?>
		</aside>

	</div></section><?php // #main ?>

</div><?php // #container ?>
<?php get_footer(); ?>