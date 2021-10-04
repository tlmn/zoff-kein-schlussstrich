<div class="relative hidden md:block">
    <div class="flex justify-center">
        <div
            class="container grid-6 grid-16 relative z-10 text-white border-black gap-collapse border-l-2 border-r-2 border-b-2">
            <div class="col-span-1 bg-black gap-collapse-left--no-padding border-black border-b-2">
                <h3 class="rotate--90 text-white text-3xl pr-7">Kalender</h3>
            </div>

            <div class="col-span-1 bg-black gap-collapse border-black border-b-2">
                <a href="/kalender" class="mt-7 block outline-none hover:fill--blue">
                    <?php echo file_get_contents(
                        get_template_directory() .
                            '/assets/icons/back--desktop.svg'
                    ); ?>
                </a>
            </div>

            <div class="col-span-8 border-black border-b-2 border-r-2 gap-collapse--left pl-5 flex flex-col">
                <div class="bg-black text-white flex justify-between">
                    <span class="text-6xl font-light mt-2 leading-none">
                        <?php echo date_short($currentEvent['date'], '.'); ?>
                    </span>
                    <span class="block text-base font-normal mt-2 mr-2">
                        <?php echo $l_weekdays[
                            date('N', strtotime($currentEvent['date'])) - 1
                        ]; ?>
                    </span>
                </div>
                <div class="bg-white flex flex-1 flex-col justify-between text-black" style="min-height: 60vh;">
                    <div class="mt-2 ml-2">
                        <?php foreach ($labels as $label) {
                            echo '#' . $label . ' ';
                        } ?>
                    </div>
                    <div class="mx-2 mb-3 mt-7">
                        <?php
                        if ($currentEvent['alarm'] !== '') { ?>
                        <span class="bg-yellow inline-block text-black uppercase font-medium rounded-3xl px-3 py-2 mb-6">
                            <?php echo $currentEvent['alarm']; ?>
                        </span>
                        <?php }

                        if (
                            time_short($currentEvent['time'], ':') !== '00:00'
                        ) { ?>
                        <span
                            class="text-3xl font-medium leading-snug block"><?php print time_short(
                                $currentEvent['time'],
                                ':'
                            ); ?>h</span>
                        <?php }
                        ?>
                        <span class="text-3xl font-medium leading-snug block"><?php the_title(); ?></span>
                        <div class="flex gap-2">
                            <a href="<?php echo get_fields(
                                $currentEvent['venue'][0]->ID
                            )['url']; ?>" target="_blank">
                                <?php echo $currentEvent['venue'][0]
                                    ->post_title; ?>
                            </a>
                            <?php if (
                                array_key_exists('ticketlink', $currentEvent) &&
                                $currentEvent['ticketlink'] !== ''
                            ) { ?>
                            <a href="<?php echo $currentEvent[
                                'ticketlink'
                            ]; ?>" target="_blank">
                                Tickets
                            </a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-span-6 text-black">
                <?php
                if ($currentEvent['general']['duration'] !== '') { ?>
                <div class="font-medium text-lg leading-wider border-b-2 gap-collapse">
                    <div class="p-5">
                        Dauer <?php print $currentEvent['general'][
                            'duration'
                        ]; ?> Minuten
                    </div>
                </div>
                <?php }

                if ($currentVenue) { ?>
                <div class="font-medium text-lg leading-wider border-b-2 gap-collapse">
                    <div class="p-5">
                        <?php echo $currentVenue['name'] .
                            '<br />' .
                            $currentVenue['address']['street'] .
                            ' ' .
                            $currentVenue['address']['houseNumber'] .
                            '<br />' .
                            $currentVenue['address']['postleitzahl'] .
                            ' ' .
                            $currentVenue['address']['city']; ?>
                    </div>
                </div>
                <?php }
                ?>


                <?php if ($currentVenue['url'] !== '') { ?>
                <div class="font-medium text-lg leading-wider border-b-2 gap-collapse">
                    <div class="p-5">
                        <a href="<?php print $currentVenue[
                            'url'
                        ]; ?>" target="_blank"
                            class="underline hover:no-underline">
                            <?php print explode(
                                '/',
                                preg_replace(
                                    '#^https?://#',
                                    '',
                                    rtrim($currentVenue['url'], '/')
                                )
                            )[0]; ?>
                        </a>
                    </div>
                </div>
                <?php } ?>
                <div class="font-medium text-lg leading-wider gap-collapse border-b-2">
                    <div class="p-5">
                        <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo get_permalink() .
                            '/?date=' .
                            $date .
                            '&time=' .
                            $time; ?>"
                            target="_blank" class="underline hover:no-underline flex items-center">
                            <span class="mr-2">
                                <?php echo file_get_contents(
                                    get_template_directory() .
                                        '/assets/icons/fb-event.svg'
                                ); ?>
                            </span>
                            <span>Event teilen</span>
                        </a>
                    </div>
                </div>
                <?php
                $items = get_field('meta');
                while (have_rows('meta')):
                    the_row();
                    if (
                        have_rows('occurrences') &&
                        count(get_field('meta')['occurrences']) > 1
                    ): ?>
                <div class="font-medium text-lg leading-wider gap-collapse--left">
                    <div class="p-5">
                        <span class="uppercase">Weitere Termine</span>
                        <?php while (have_rows('occurrences')):
                            the_row();
                            $timestamp = strtotime(
                                str_replace(
                                    '/',
                                    '-',
                                    get_sub_field('timestamp')
                                )
                            );
                            if (
                                get_sub_field('timestamp') !==
                                    $currentEvent['timestamp'] &&
                                isset(get_sub_field('venue')[0])
                            ) { ?>
                        <a href="<?php echo get_permalink(); ?>?date=<?php echo date(
    'dmY',
    $timestamp
); ?>&time=<?php echo date('Hi', $timestamp); ?>"
                            class="block underline hover:no-underline">
                            <?php echo date('j.n.y', $timestamp) .
                                ' in ' .
                                get_field(
                                    'address',
                                    get_sub_field('venue')[0]->ID
                                )['city']; ?>
                        </a>
                        <?php }
                        endwhile; ?>
                    </div>
                </div>
                <?php endif;
                endwhile;
                ?>
            </div>
            <div class="col-span-10 border-r-2 border-black bg-white text-black relative gap-collapse-left--no-padding">
                <?php if ($feature_image_alt !== '') { ?>
                <div class="pl-3 w-full grid-10 border-b-2 py-5">
                    <div class="col-span-8 col-start-3 is-style-caption">
                        <?php print $feature_image_alt; ?>
                    </div>
                </div>
                <?php } ?>

                <?php if ($currentEvent['general']['subline'] !== '') { ?>
                <div class="pl-3 w-full grid-10 border-b-2 py-5">
                    <div class="col-span-7 col-start-3 is-style-text-medium">
                        <?php print $currentEvent['general']['subline']; ?>
                    </div>
                </div>
                <?php } ?>

                <div class="pl-3 w-full grid-10 py-7 border-b-2">
                    <div class="col-span-7 col-start-3">
                        <?php the_content(); ?>
                    </div>
                </div>

                <?php if ($currentEvent['general']['credits'] !== '') { ?>
                <div class="pl-3 w-full grid-10 py-7">
                    <div class="col-span-7 col-start-3">
                        <h6><?php print $currentEvent['general'][
                            'credits'
                        ]; ?></h6>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <?php
    while ($the_query_teaser->have_posts()):
        $the_query_teaser->the_post();
        the_content();
    endwhile;
    wp_reset_query();
    ?>
</div>