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
				<h1 class="page-title"><?php the_title(''); ?></h1>
				<?php the_content(''); ?>
			<?php endwhile; ?>
			<?php endif; ?>
		</article>

		<aside id="sidebar">
			<?php get_sidebar(''); ?>
		</aside>

	</div></section><?php // #main ?>

</div><?php // #container ?>
<?php get_footer(); ?>