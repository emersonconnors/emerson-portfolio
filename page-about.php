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

	<main id="primary" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'page' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;
			// Check rows existexists.
			if( have_rows('learned_technical_skills') ):
				?>
				<table class='skills-about'>
					<tr>
						<th>Languages/CMS</th>
						<th>Software</th>
					</tr>
				<?php
    			// Loop through rows.
   			 	while( have_rows('learned_technical_skills') ) : the_row();
				?>
        			<tr>
						<td><?php the_sub_field('languages_and_cms'); ?></td>
						<td><?php the_sub_field('software'); ?></td>
					</tr>

			
				<?php
        			// Do something...

    			// End loop.
    			endwhile;
				echo '</table>';
			// No value.
			else :
    		// Do something...
			endif;
		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php

get_footer();
