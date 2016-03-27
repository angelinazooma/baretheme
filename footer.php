<?php 
global $aa;
?>
	<footer><div class="wrap">
		<p>&copy; <?php echo date("Y",time()); ?> <?php bloginfo('name'); ?>.  All rights reserved.</p>
		<p>Web Design &copy; <a href="#" target="_blank">#</a></p>
	</div></footer> 

<?php wp_footer(); ?>

<script>
$(document).ready(function(){
  
	$( "#menu-show" ).click(function() {
		$( "#menu-header").toggleClass( "menu-open",400 );
	});

});
</script>
	</body>
</html>