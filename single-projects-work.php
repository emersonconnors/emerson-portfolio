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

		the_title('<h1 class="entry-title">', '</h1>');
	?>

	<?php



		// If comments are open or we have at least one comment, load up the comment template.
		if (comments_open() || get_comments_number()) :
			comments_template();
		endif;

	endwhile; // End of the loop.

	?>
	<div class="work-image-holder">
		<?php

		$image = get_field('work_picture_1');
		if ($image) :
			$url = $image['url'];
			$alt = $image['alt'];
		?>
			<img src="<?php echo esc_url($url); ?>" alt="<?php echo esc_attr($alt); ?>" data-action="zoom" class="single-work-img" />
		<?php endif;
		$image = get_field('work_picture_2');
		if ($image) :
			$url = $image['url'];
			$alt = $image['alt'];
		?>
			<img src="<?php echo esc_url($url); ?>" alt="<?php echo esc_attr($alt); ?>" data-action="zoom" class="single-work-img" />
		<?php endif; ?>

	</div>
	<?php
	// Check rows existexists.
	if (have_rows('list_of_skills_used')) :
		echo '<h2 class="skills-used-h4">Skills Used</h2>';
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
		<h2 class='skills-used-h4'>Project Overview</h2>
		<p class='work-page-p'><?php the_field('description_of_work'); ?></p>
		<h2 class='skills-used-h4'>What I Learned</h2>
		<p class='work-page-p'><?php the_field('what_i_learned'); ?></p>
		<br>
	<?php
	}
	?>
	<div class="link-holder">
		<?php
		if (get_field('link_to_github')) {
			// add div and class
		?>



			<a aria-label="link to github" class='work-page-a' href='<?php the_field('link_to_github') ?>'>Link to GitHub.</a>
		<?php
		}
		if (get_field('link_to_live_site')) {
		?>
			<a aria-label="link to live site" class='work-page-a' href='<?php the_field('link_to_live_site') ?>'>Link to Live Site.</a>
		<?php
		}

		?>
	</div>
</main><!-- #main -->

<?php

get_footer();
