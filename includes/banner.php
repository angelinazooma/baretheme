<header id="site-header">
	<div class="wrap">
        <h1 id="logo"><a href="<?php echo esc_url(home_url('/')); ?>"><span><?php bloginfo('name'); ?></span></a></h1>
	</div>
	<nav id="menu-header"><?php
$args = array( 'container' => false, 'menu_class' => '', 'menu_id' => 'main-menu', 'theme_location' => 'main_nav' );
wp_nav_menu( $args ); ?><div id="menu-show"><i class="fa fa-bars"></i>Menu</div>
	</nav>
</header>