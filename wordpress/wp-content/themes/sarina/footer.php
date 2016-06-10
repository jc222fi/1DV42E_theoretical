<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package sarina
 */
?>
	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="container">
			<div class="site-info">
				<a href="<?php echo esc_url( __( 'http://wordpress.org/', 'sarina' ) ); ?>"><?php printf( __( 'Proudly powered by %s', 'sarina' ), 'WordPress' ); ?></a>
				<span class="sep"> | </span>
				<?php printf( __( 'Theme %1$s by %2$s.', 'sarina' ), 'sarina', '<a href="http://sarina.tidyhive.com" rel="designer">Tidyhive</a>' ); ?>
			</div><!-- .site-info -->
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer();
timer_stop(1);
echo ' seconds to load ' . get_num_queries() . ' queries';
?>

</body>
</html>
