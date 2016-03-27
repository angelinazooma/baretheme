<?php 
/* Template Name: Full Width */
get_header();
global $aa;
 ?>
<div id="container">
	<?php get_template_part( 'includes/banner', 'page' ); ?>
    
   	<section id="main" ><div class="wrap">
	
		<article>			
			<?php if(have_posts()) : ?>
				<?php while(have_posts()) : the_post(); ?>
               		 <?php the_content(''); ?>
                <?php endwhile; ?>
             <?php endif; ?>
		</article>
		
	</div></section>

</div>
<?php get_footer(); ?>