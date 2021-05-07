<div class="relative hidden md:block">
    <div class="flex justify-center">
        <div class="container grid-6 grid-16 relative z-10 text-white border-black gap-collapse border-l-2 border-r-2">
            <div class="col-span-1 bg-black gap-collapse border-black border-b-2">
                <h3 class="rotate--90 text-white text-3xl pr-7">Kalender</h3>
            </div>

            <div class="col-span-1 bg-black gap-collapse border-black border-b-2">
                <button role="button" onclick="window.history.back()" class="mt-7">
                    <?php
                    echo file_get_contents(get_template_directory() . '/assets/icons/back--desktop.svg');
                    ?>
                </button>
            </div>

            <div class="col-span-8 border-black border-b-2 border-r-2 gap-collapse-right flex flex-col">
                <div class="bg-black text-white flex justify-between">
                    <span class="text-6xl font-light mt-2 leading-none">
                        <?php echo date_short($currentEvent['date'], "."); ?>
                    </span>
                    <span class="text-base font-normal">
                        <?php echo $l_weekdays[date("N", strtotime(($currentEvent['date']))) - 1]; ?>
                    </span>
                </div>
                <div class="bg-white flex flex-1 flex-col justify-between text-black">
                    <div class="mx-2 mt-3">labels</div>
                    <div class="mx-2 mb-3">
                        <span class="text-3xl font-medium leading-snug block"><?php print time_short($currentEvent["time"], ":"); ?> Uhr</span>
                        <span class="text-3xl font-medium leading-snug block"><?php the_title(); ?></span>
                    </div>
                </div>
            </div>


            <div class="col-span-6 text-black">
                <?php
                if ($currentEvent['general']['duration'] !== "") { ?>
                    <div class="font-medium text-lg leading-wider py-6 border-b-2 gap-collapse">
                        Dauer <?php print $currentEvent['general']['duration']; ?> Minuten
                    </div>
                <?php
                }
                ?>

                <div class="font-medium text-lg leading-wider py-6 border-b-2 gap-collapse">
                    <?php
                    $items = get_field("meta");

                    while (have_rows("meta")) : the_row();
                        if (have_rows("occurences")) :
                    ?>
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
                        endif;
                    endwhile; ?>
                </div>

                <?php
                if ($currentVenue) { ?>
                    <div class="font-medium text-lg leading-wider py-6 border-b-2 gap-collapse">
                        <?php
                        echo $currentVenue['name'] . "<br />" . $currentVenue['address']['street'] . " " . $currentVenue['address']['houseNumber'] . "<br />" . $currentVenue['address']['postleitzahl'] . " " . $currentVenue['address']['city'];
                        ?>
                    </div>
                <?php
                }
                ?>


                <?php
                if ($currentVenue['url'] !== "") { ?>
                    <div class="font-medium text-lg leading-wider py-6 border-b-2 gap-collapse">
                        <a href="<?php print $currentVenue['url'] ?>" target="_blank" class="underline hover:no-underline">
                            <?php print explode("/", preg_replace('#^https?://#', '', rtrim($currentVenue['url'], '/')))[0]; ?>
                        </a>
                    </div>
                <?php
                }
                ?>



                <div class="font-medium text-lg leading-wider py-6 gap-collapse">
                    <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo get_page_uri() . "/?date=" . $date . "&time=" . $time; ?>" target="_blank" class="underline hover:no-underline flex items-center">
                        <span class="mr-2">
                            <?php
                            echo file_get_contents(get_template_directory() . '/assets/icons/fb-event.svg');
                            ?>
                        </span>
                        <span>Event teilen</span>
                    </a>
                </div>
            </div>
            <div class="col-span-8 col-start-3 border-r-2 border-black bg-white text-black relative">
                <?php
                if ($feature_image_alt !== "") { ?>
                    <div class="border-b-2 py-5 font-normal text-xs leading-snug">
                        <?php print $feature_image_alt; ?>
                    </div>
                <?php
                }
                ?>

                <?php
                if ($currentEvent['general']['credits'] !== "") { ?>
                    <div class="border-b-2 py-7 font-normal text-lg leading-snug">
                        <?php print $currentEvent['general']['credits']; ?>
                    </div>
                <?php
                }
                ?>

                <div class="py-7">
                    <?php
                    if ($currentEvent['general']['short_description'] !== "") { ?>
                        <div class="font-medium text-lg leading-wider mb-7 border-b-2">
                            <?php print $currentEvent['general']['short_description']; ?>
                        </div>
                    <?php
                    }
                    ?>

                    <div class="font-normal text-m leading-normal">
                        <?php

                        the_content();

                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    while ($the_query_teaser->have_posts()) : $the_query_teaser->the_post();
        the_content();
    endwhile;
    wp_reset_query();
    ?>
</div>