<?php

get_header();
if (have_posts()) {
	while (have_posts()) {
		the_post();
?>
		<div class="container grid-12 font-sans">
			<?php
			the_content();
			?>
		</div>
<?php
	}
}
get_footer();
