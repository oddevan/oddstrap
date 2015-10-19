<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package oddStrap
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="container">
			<div class="text-muted">
				&copy; TODO COPYRIGHT TEXT HERE<br>
				<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'oddstrap' ) ); ?>"><?php printf( esc_html__( 'Powered by %s', 'oddstrap' ), 'WordPress' ); ?></a>
				<?php printf( esc_html__( 'using the %1$s theme built by %2$s.', 'oddstrap' ), 'Oddstrap', '<a href="http://built.oddevan.com/" rel="designer">oddEvan</a>' ); ?>
			</div>
		</div>
	</footer>

<?php wp_footer(); ?>

</body>
</html>
