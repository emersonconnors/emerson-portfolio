<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Emerson_Portfolio
 */

?>

<footer id="colophon" class="site-footer">
	<div class="site-info">
		<a href="<?php echo esc_url(__('https://wordpress.org/', 'emerson-portfolio')); ?>">
			<?php
			/* translators: %s: CMS name, i.e. WordPress. */

			?>
		</a>

		<?php
		/* translators: 1: Theme name, 2: Theme author. */
		echo '<p>Created By: <a href="https://emersonconnors.com/">Emerson Connors</a></p>'
		?>
	</div><!-- .site-info -->
</footer><!-- #colophon -->
</div><!-- #page -->

<script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js"></script>
<script>
	var $grid = $('.grid').isotope({
		// options
		itemSelector: '.grid-item',
		layoutMode: 'fitRows'
	});

	// filter items on button click
	$('.filter-button-group').on('click', 'button', function() {
		var filterValue = $(this).attr('data-filter');
		$grid.isotope({
			filter: filterValue
		});
	});
</script>

<?php wp_footer(); ?>

</body>

</html>