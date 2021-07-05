<div class="block md:hidden">
    <div class="grid-6 bg-black text-white px-3 py-2">
        <div class="col-span-1">
            <a href="/kalender" class="hover:fill--blue">
                <?php
                echo file_get_contents(get_template_directory() . '/assets/icons/back--mobile.svg');
                ?>
            </a>
        </div>
        <div class="col-span-5 flex items-center">
            <span class="text-m leading-snug font-normal">Kalender</span>
        </div>
        <div class="col-span-5 col-start-2">
            <div class="flex justify-between">
                <span class="text-4xl leading-none"><?php echo date_short($currentEvent['date'], "."); ?></span>
                <div class="flex h-full items-center">
                    <span><?php echo $l_weekdays[date("N", strtotime(($currentEvent['date']))) - 1]; ?></span>
                </div>
            </div>
        </div>
    </div>

    <div class="grid-6  bg-white text-black">
        <div class="col-span-full">
            <div class="mx-2 my-3">
                <?php
                foreach ($labels as $label) {
                    echo "#" . $label . " ";
                }
                ?>
            </div>
            <div class="mx-2 my-3">
                <?php
                if ($currentEvent['alarm'] !== "") {
                ?>
                    <span class="bg-yellow text-black uppercase font-medium rounded-3xl px-3 py-2 mb-6">
                        <?php echo $currentEvent['alarm']; ?>
                    </span>
                <?php
                }
                if (time_short($currentEvent["time"], ":") !== "00:00") {
                ?>
                    <span class="text-3xl font-medium leading-snug block"><?php print time_short($currentEvent["time"], ":"); ?>h</span>
                <?php
                }
                ?>
                <span class="text-xl font-medium leading-snug block"><?php the_title(); ?></span>
                <div class="flex gap-2">
                    <a href="<?php echo get_fields($currentEvent['venue'][0]->ID)['url']; ?>" target="_blank">
                        <?php
                        echo $currentEvent['venue'][0]->post_title;
                        ?>
                    </a>
                    <?php
                    if (array_key_exists('ticketlink', $currentEvent) && $currentEvent['ticketlink'] !== "") {
                    ?>
                        <a href="<?php $currentEvent['ticketlink']; ?>" target="_blank">
                            Tickets
                        </a>
                    <?php
                    } ?>
                </div>
            </div>
        </div>
        <?php
        if (isset(get_fields()['meta']['feature_image']['image']['ID'])) {
        ?>
            <div class="col-span-full">
                <?php
                $feature_image_srcset = wp_get_attachment_image_srcset(get_fields()['meta']['feature_image']['image']['ID']);
                ?>
                <img srcset="<?php echo $feature_image_srcset; ?>" alt="<?php print $feature_image_alt; ?>" />
            </div>
        <?php
        } ?>
    </div>

    <?php
    if ($feature_image_alt !== "") { ?>
        <div class="grid-6 border-b-2 ">
            <div class="col-span-full py-5 px-3 text-xs leading-snug">
                <?php print $feature_image_alt; ?>
            </div>
        </div>
    <?php
    }

    if (array_key_exists('credits', $currentEvent) && $currentEvent['general']['credits'] !== "") { ?>
        <div class="grid-6 border-b-2 ">
            <div class="col-span-full py-6 px-3 text-lg font-medium leading-wider">
                <?php print $currentEvent['general']['credits']; ?>
            </div>
        </div>
    <?php
    }
    if (array_key_exists('short_description', $currentEvent) && $currentEvent['general']['short_description'] !== "") { ?>
        <div class="grid-6 border-b-2 ">
            <div class="col-span-full py-6 px-3">
                <span class="text-lg leading-wider font-medium">
                    <?php print $currentEvent['general']['short_description']; ?>
                </span>
            </div>
        </div>
    <?php
    }
    ?>

    <div class="grid-6 border-b-2 ">
        <div class="col-span-full py-6 px-3">
            <span class="text-m leading-normal">
                <?php
                echo the_content();
                ?>
            </span>
        </div>
    </div>

    <?php
    if ($currentEvent['general']['duration'] !== "") { ?>
        <div class="grid-6 border-b-2 ">
            <div class="col-span-full py-6 px-3">
                <div class="font-medium text-lg leading-wider">
                    Dauer <?php print $currentEvent['general']['duration']; ?> Minuten
                </div>
            </div>
        </div>
    <?php
    }
    ?>

    <?php
    $items = get_field("meta");

    while (have_rows("meta")) : the_row();
        if (have_rows("occurrences")) : ?>
            <div class="grid-6 border-b-2 ">
                <div class="col-span-full py-6 px-3 text-lg font-medium">
                    <span class="uppercase">Weitere Termine</span>
                    <?php
                    while (have_rows("occurrences")) : the_row();
                        $timestamp = strtotime(str_replace('/', '-', get_sub_field('timestamp')));
                    ?>
                        <a href="<?php echo get_page_uri(); ?>/?date=<?php echo date("dmY", $timestamp); ?>&time=<?php echo date("Hi", $timestamp); ?>" class="block underline hover:no-underline">
                            <?php
                            echo date("j.n.y", $timestamp) . " in " . get_field('address', get_sub_field('venue')[0]->ID)['city'];
                            ?>
                        </a>
                    <?php
                    endwhile;
                    ?>
                </div>
            <?php
        endif;
            ?>
            </div>
        <?php
    endwhile;
    if (array_key_exists('address', $currentVenue)) {
        ?>
            <div class="grid-6 border-b-2 ">
                <div class="col-span-full py-6 px-3 text-lg font-medium">
                    <span class="block uppercase">Ort der Veranstaltung</span>
                    <span class="block">
                        <?php echo $currentVenue['name']; ?><br />
                        <?php echo $currentVenue['address']['street'] . " " . $currentVenue['address']['houseNumber']; ?><br />
                        <?php echo $currentVenue['address']['postleitzahl'] . " " . $currentVenue['address']['city']; ?><br />
                    </span>
                </div>
            </div>

        <?php
    }
    if (array_key_exists('url', $currentVenue) && $currentVenue['url'] !== "") { ?>
            <div class="grid-6 border-b-2 ">
                <div class="col-span-full px-3 py-6">
                    <div class="font-medium text-lg leading-wider">
                        <a href="<?php print $currentVenue['url'] ?>" target="_blank" class="underline hover:no-underline">
                            <?php print explode("/", preg_replace('#^https?://#', '', rtrim($currentVenue['url'], '/')))[0]; ?>
                        </a>
                    </div>
                </div>
            </div>
        <?php
    }
        ?>

        <div class="grid-6 border-b-2 ">
            <div class="col-span-full py-6 px-3">
                <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo get_permalink() . "/?date=" . $date . "&time=" . $time; ?>" target="_blank" class="font-medium underline hover:no-underline flex items-center text-lg">
                    <span class="mr-2">
                        <?php
                        echo file_get_contents(get_template_directory() . '/assets/icons/fb-event.svg');
                        ?>
                    </span>
                    <span>Event teilen</span>
                </a>
            </div>
        </div>
</div>