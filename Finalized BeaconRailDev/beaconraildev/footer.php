<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package BeaconRail
 */

?>

	</div><!-- #content -->





	<footer id="colophon" class="site-footer" role="contentinfo">
		<p style="color: white;">For more information, email us at:
    <a href="mailto:rail@beaconrail.com">rail@beaconrail.com</a>
  </p>
	</footer><!-- #colophon -->

	<header id="masthead" class="site-header" role="banner">
		<div class="site-branding">
			<?php the_header_image_tag(); ?>
			<?php
			if ( is_front_page() && is_home() ) : ?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<?php else : ?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
			<?php
			endif;

			$description = get_bloginfo( 'description', 'display' );
			if ( $description || is_customize_preview() ) : ?>
				<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
			<?php
			endif; ?>
		</div><!-- .site-branding -->

		<nav id="site-navigation" class="main-navigation" role="navigation">
		  <?php wp_nav_menu( array( 'theme_location' => 'menu-1', 'menu_id' => 'primary-menu' ) ); ?>
      <div class="image">
      <?php if (is_front_page()) :
      layerslider(1);
      endif;
      ?>
      </div>

		</nav><!-- #site-navigation -->




		<div class="phone-menu">
    <!-- The overlay -->
    <div id="myMenu" class="nav_overlay">
      <!-- Button to close the overlay navigation -->
      <a href="javascript:void(0)" class="closebtn" onclick="closeMenu()">&times;</a>
      <!-- Overlay content -->
      <div class="nav_overlay-content">

				  <?php wp_nav_menu( array( 'theme_location' => 'menu-2', 'menu_id' => 'phone-menu' ) ); ?>

        <a href="http://beaconrail.com/">HOME</a>
        <a href="http://beaconrail.com/products/">PRODUCTS</a>
        <a href="http://beaconrail.com/where-we-operate/">WHERE WE OPERATE</a>
        <a href="http://beaconrail.com/our-team/">OUR TEAM</a>
        <a href="http://beaconrail.com/contact-us/">CONTACT US</a>
        <a href="http://beaconrail.com/notices/">NOTICES</a>
        <a href="http://beaconrail.com/media/">MEDIA</a>
      </div>
    </div>
    <ul>
      <!-- Use any element to open/show the overlay navigation menu -->
      <li><span style="cursor:pointer;" onclick="openMenu()">&#9776; MENU</span></li>
    </ul>
  </div>

	</header><!-- #masthead -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
