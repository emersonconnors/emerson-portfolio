<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Emerson_Portfolio
 */

get_header();
?>

<main id="primary" class="site-main">

	<?php
	while (have_posts()) :
		the_post();

		get_template_part('template-parts/content', get_post_type());



		// If comments are open or we have at least one comment, load up the comment template.
		if (comments_open() || get_comments_number()) :
			comments_template();
		endif;

	endwhile; // End of the loop.
	if (function_exists('get_field')) {
	?>
		<?php if (get_field('work_picture_1')) : ?>
			<img class='work-page-img' src="<?php the_field('work_picture_1'); ?>" />
		<?php endif; ?>
		<?php
		?>
		<?php if (get_field('work_picture_2')) : ?>
			<img class='work-page-img' src="<?php the_field('work_picture_2'); ?>" />
		<?php endif; ?>
		<?php
		// Check rows existexists.
		if (have_rows('list_of_skills_used')) :
			echo '<h4 class="skills-used-h4">Skills Used</h4>';
			// Loop through rows.
			echo '<section class="skills-list">';
			while (have_rows('list_of_skills_used')) : the_row();

				// Load sub field value.
		?>
				<p> <?php the_sub_field('skills_used') ?></p>
			<?php
			// Do something...

			// End loop.
			endwhile;
			echo '</section>';
		// No value.
		else :
		// Do something...
		endif;
		if (get_field('description_of_work')) {
			?>
			<h4 class='skills-used-h4'>Project Overview</h4>
			<p class='work-page-p'><?php the_field('description_of_work'); ?></p>
		<?php
		}
		if (get_field('link_to_github')) {
			// add div and class
		?>

			<br>
			<a class='work-page-p' href='<?php the_field('link_to_github') ?>'>Link to GitHub.</a>
		<?php
		}
		if (get_field('link_to_live_site')) {
		?>
			<a class='work-page-p' href='<?php the_field('link_to_live_site') ?>'>Link to Live Site.</a>
	<?php
		}
	}
	?>

</main><!-- #main -->

<?php

get_footer();
