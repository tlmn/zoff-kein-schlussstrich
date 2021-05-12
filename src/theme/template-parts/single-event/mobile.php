<div class="block md:hidden">
    <div class="grid-6 bg-black text-white ">
        <div class="col-span-1">
            <button role="button" onclick="window.history.back()">
                <?php
                echo file_get_contents(get_template_directory() . '/assets/icons/back--mobile.svg');
                ?>
            </button>
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
            <div class="mx-2 mt-3 mb-7">labels</div>
            <div class="mx-2 mb-3">
                <span class="text-xl font-medium leading-snug block"><?php print time_short($currentEvent["time"], ":"); ?>
                    Uhr</span>
                <span class="text-xl font-medium leading-snug block"><?php the_title(); ?></span>
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
            <div class="col-span-full py-5 text-xs leading-snug">
                <?php print $feature_image_alt; ?>
            </div>
        </div>
    <?php
    }

    if ($currentEvent['general']['credits'] !== "") { ?>
        <div class="grid-6 border-b-2 ">
            <div class="col-span-full py-6 text-lg font-medium leading-wider">
                <?php print $currentEvent['general']['credits']; ?>
            </div>
        </div>
    <?php
    }
    if ($currentEvent['general']['short_description'] !== "") { ?>
        <div class="grid-6 border-b-2 ">
            <div class="col-span-full py-6">
                <span class="text-lg leading-wider font-medium">
                    <?php print $currentEvent['general']['short_description']; ?>
                </span>
            </div>
        </div>
    <?php
    }
    ?>

    <div class="grid-6 border-b-2 ">
        <div class="col-span-full py-6">
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
            <div class="col-span-full py-6">
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
        if (have_rows("occurences")) : ?>
            <div class="grid-6 border-b-2 ">
                <div class="col-span-full py-6 text-lg font-medium">
                    <span class="uppercase">Weitere Termine</span>
                    <?php
                    while (have_rows("occurences")) : the_row();
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
        ?>

        <div class="grid-6 border-b-2 ">
            <div class="col-span-full py-6 text-lg font-medium">
                <span class="block uppercase">Ort der Veranstaltung</span>
                <span class="block">
                    <?php echo $currentVenue['name']; ?><br />
                    <?php echo $currentVenue['address']['street'] . " " . $currentVenue['address']['houseNumber']; ?><br />
                    <?php echo $currentVenue['address']['postleitzahl'] . " " . $currentVenue['address']['city']; ?><br />
                </span>
            </div>
        </div>

        <?php
        if ($currentVenue['url'] !== "") { ?>
            <div class="grid-6 border-b-2 ">
                <div class="col-span-full py-6">
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
            <div class="col-span-full py-6">
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