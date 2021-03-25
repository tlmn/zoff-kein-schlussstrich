<?php
get_header();

$args = array(
	'numberposts'	=> 1,
	'post_type'		=> 'event',
	'meta_query'	=> array(
		'key'		=> 'meta_occurences_$_timestamp',
		'compare'	=> '=',
		'value'		=> '2021-03-26 19:32:00',
	)
);

$the_query = new WP_Query($args);

function date_long($date)
{
	$date_split = str_split($date, 2);
	return "20" . $date_split[2] . "-" . $date_split[1] . "-" . $date_split[0];
}

isset($_GET['date']) ? $date = $_GET['date'] : $date = 0;

if ($the_query->have_posts()) : ?>
	<?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
		<div class="container grid-12">
			<div class="col-span-12 my-2">
				<span>Datum, Uhrzeit</span>
				<h1 class="text-5xl font-black uppercase"><?php the_title(); ?></h1>

				<div class="w-full flex justify-between items-center">
					<div class="labels__bar">
						<?php
						$tax_labels = get_the_terms($post->ID, 'label');

						if (isset($tax_labels[0])) {
							foreach ($tax_labels as $tax_label) {
						?>
								<span class="label">
									<?php echo $tax_label->name; ?>
								</span>
						<?php
							}
						}
						?>
					</div>
					<span class="button">Tickets</span>
				</div>

				<?php
				$items = get_field("meta");

				while (have_rows("meta")) : the_row();
					if (have_rows("occurences")) :
						while (have_rows("occurences")) : the_row();
							$timestamp = strtotime(str_replace('/', '-', get_sub_field('timestamp')));
				?>
							<a href="<?php echo get_page_uri(); ?>?date=<?php echo date("dmY", $timestamp); ?>&time=<?php echo date("Hi", $timestamp); ?>" class="bg-gray">
								<?php
								echo get_sub_field('city') . ", " . date("d.m.Y", $timestamp) . " " . date("H:i", $timestamp) . " Uhr";
								?>
							</a>
				<?php
						endwhile;
					endif;
				endwhile; ?>
			</div>
			<div class="">
				<img srcset="" />
			</div>
			<div class="">
				<?php
				the_content();

				?>
			</div>
		</div>
<?php
	endwhile;
endif;

get_footer();
