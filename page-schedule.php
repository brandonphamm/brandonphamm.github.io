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
 * @package School_Demo_Theme
 */

get_header();
?>

	<main id="primary" class="site-main-schedule">
		<h1>Course Schedule</h1>

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'page' );
			?>

			<div class ='weekly-course'>
				<p>Weekly Course Schedule</p>
		</div>

			<div class ='table'>
			<?php 
			if (function_exists('get_field')) {
				if (get_field('schedule')) {
					echo '<table>';
					echo '<thead>';
					echo '<tr>';
					echo '<th>Date</th>';
					echo '<th>Courses</th>';
					echo '<th>Instructor</th>';
					echo '</tr>';
					echo '</thead>';
					echo '<tbody>';
			
					foreach (get_field('schedule') as $row) {
						$date = $row['date'];
						$courses = $row['course'];
						$instructor = $row['instructor'];
			
						echo '<tr>';
						echo '<td>' . $date . '</td>';
						echo '<td>' . $courses . '</td>';
						echo '<td>' . $instructor . '</td>';
						echo '</tr>';
					}
			
					echo '</tbody>';
					echo '</table>';
				} else {
					echo '<p>No schedule available.</p>';
				}
			}


			endwhile; // End of the loop.

			?>
		</div>
	</main><!-- #main -->




<?php

get_footer();
