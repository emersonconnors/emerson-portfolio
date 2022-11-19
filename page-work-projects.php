<?php

/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Emerson_Portfolio
 */

get_header();
?>

<main id="primary" class="site-main isotope-container">

	<?php

	while (have_posts()) :
		the_post();
		the_title('<h1 class="entry-title">', '</h1>');
	?>
		<div class="button-group filter-button-group">
			<button aria-label="iso-filter" class="iso-button" data-filter="*">Show All</button>
			<?php
			$terms = get_terms(array(
				'taxonomy' => 'work-languages',
				'hide_empty' => false,
			));
			foreach ($terms as $term) {
				echo '<button aria-label="iso-filter" class="iso-button" data-filter=".' . $term->slug . '">' . $term->name . '</button>';
			}
			?>
		</div>


		<?php
		echo '<div class="grid">';
		$args = array(
			'post_type'      => 'projects-work',
			'posts_per_page' => -1
		);

		$query = new WP_Query($args);

		if ($query->have_posts()) {
			while ($query->have_posts()) {
				$query->the_post();


		?>
				<div class="grid-item <?php $terms = wp_get_post_terms(get_the_id(), $taxonomy = 'work-languages');
										foreach ($terms as $term) {
											echo $term->slug . ' ';
										} ?>">



					<a aria-label="single post link" class="no-deco" href='<?php the_permalink(); ?>'>
						<h2 class="works-h4"><?php the_title(); ?></h2>
						<?php

						echo '<div class="work-image-holder">';
						$image = get_field('work_picture_1');

						if ($image) :
							$url = $image['url'];
							$alt = $image['alt'];
							$size = 'medium_large';
							$thumb = $image['sizes'][$size];

						?>
							<img src="<?php echo esc_url($thumb); ?>" alt="<?php echo esc_attr($alt); ?>" class="single-work-img" />
						<?php endif;

						$image = get_field('work_picture_2');
						if ($image) :
							$url = $image['url'];
							$alt = $image['alt'];
							$size = 'medium_large';
							$thumb = $image['sizes'][$size];

						?>
							<img src="<?php echo esc_url($thumb); ?>" alt="<?php echo esc_attr($alt); ?>" class="single-work-img" />
						<?php endif; ?>

				</div>
	<?php
				echo '<div class="textarea-excerpt">' . custom_field_excerpt() . '</div>';
				echo '</a>';
				echo '</div>';
			}
			wp_reset_postdata();
		}
		echo '</div>';

		// If comments are open or we have at least one comment, load up the comment template.
		if (comments_open() || get_comments_number()) :
			comments_template();
		endif;

	endwhile; // End of the loop.
	?>
	<?php



	?>

</main><!-- #main -->

<?php

get_footer();
