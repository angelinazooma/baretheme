<?php 
/* Template Name: Contact */
get_header();
global $aa;
?>
<div id="container">
	<?php get_template_part( 'includes/banner', 'page' ); ?>
    
   	<section id="main" class="columns"><div class="wrap">
	
		<article>			
			<?php if(have_posts()) : ?>
				<?php while(have_posts()) : the_post(); ?>
               		 <?php the_content(''); ?>
                <?php endwhile; ?>
             <?php endif; ?>
		</article>

		<aside id="sidebar">
			contact page sidebar stuff
		</aside>
		
	</div></section>

</div>
<?php get_footer(); ?>