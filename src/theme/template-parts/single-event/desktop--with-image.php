<div class="relative hidden md:block">
    <div class="flex absolute top-0 left-0 w-full h-full z-0">
        <div class="bg-black flex-1"></div>
        <div class="bg-white flex-1"></div>
    </div>
    <div class="flex justify-center">
        <div class="container grid-16 relative z-10 text-white border-b-2 border-black gap-collapse border-l-2 border-r-2">
            <div class="col-span-1 bg-black shadow--bottom-right">
                <h3 class="rotate--90 text-white text-3xl pr-7">Kalender</h3>
            </div>

            <div class="col-span-1">
                <button role="button" onclick="window.history.back()" class="mt-7 outline-none">
                    <?php
                    echo file_get_contents(get_template_directory() . '/assets/icons/back--desktop.svg');
                    ?>
                </button>
            </div>

            <div class="col-span-8 shadow--bottom-right">
                <div class="h-full w-full relative">
                    <?php
                    $feature_image_srcset = wp_get_attachment_image_srcset(get_fields()['meta']['feature_image']['image']['ID']);
                    ?>
                    <img srcset="<?php echo $feature_image_srcset; ?>" alt="<?php print $feature_image_alt; ?>" class="object-cover absolute top-0 left-0 h-full w-full" />
                </div>
            </div>

            <div class="col-span-6 flex flex-col">
                <div class="bg-black text-white flex justify-between gap-collapse">
                    <span class="text-6xl font-light mt-2 leading-none">
                        <?php echo date_short($currentEvent['date'], "."); ?>
                    </span>
                    <span class="text-base font-normal">
                        <?php echo $l_weekdays[date("N", strtotime(($currentEvent['date']))) - 1]; ?>
                    </span>
                </div>
                <div class="bg-white flex flex-1 flex-col justify-between text-black gap-collapse">
                    <div class="mx-2 mb-3 mt-7">
                        <span class="text-3xl font-medium leading-snug block"><?php print time_short($currentEvent["time"], ":"); ?>
                            Uhr</span>
                        <span class="text-3xl font-medium leading-snug block"><?php the_title(); ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="relative hidden md:block">
    <div class="flex justify-center">
        <div class="container grid-16 border-l-2 border-b-2">
            <div class="col-span-10 border-r-2 border-black bg-white text-black relative">
                <?php
                if ($feature_image_description !== "") { ?>
                    <div class="grid-10 border-b-2">
                        <div class="col-span-7 col-start-3 py-5 font-normal text-xs leading-snug">
                            <?php print $feature_image_description; ?>
                        </div>
                    </div>
                <?php
                }

                if ($currentEvent['general']['subline'] !== "") { ?>
                    <div class="grid-10">
                        <div class="col-span-7 col-start-3 py-7">
                            <h6><?php print $currentEvent['general']['subline']; ?></h6>
                        </div>
                    </div>
                <?php
                }
                ?>

                <div class="grid-10">
                    <div class="col-span-7 col-start-3 py-7 font-normal">
                        <div class="font-normal text-m leading-normal">
                            <?php

                            echo the_content();

                            ?>
                        </div>
                    </div>
                </div>

                <?php
                if ($currentEvent['general']['credits'] !== "") { ?>
                    <div class="grid-10 border-t-2">
                        <div class="col-span-7 col-start-3 py-7">
                            <h6><?php print $currentEvent['general']['credits']; ?></h6>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
            <div class="col-span-6 text-black border-r-2">
                <?php
                if ($currentEvent['general']['duration'] !== "") { ?>
                    <div class="font-medium text-lg leading-wider border-b-2 gap-collapse--left">
                        <div class="p-5">
                            Dauer <?php print $currentEvent['general']['duration']; ?> Minuten
                        </div>
                    </div>
                    <?php
                }
                $items = get_field("meta");
                while (have_rows("meta")) : the_row();
                    if (have_rows("occurrences") && count(get_field("meta")["occurrences"]) > 1) :
                    ?>
                        <div class="font-medium text-lg leading-wider border-b-2 gap-collapse--left">
                            <div class="p-5">

                                <span class="uppercase">Weitere Termine</span>
                                <?php
                                while (have_rows("occurrences")) : the_row();
                                    $timestamp = strtotime(str_replace('/', '-', get_sub_field('timestamp')));
                                    if (get_sub_field('timestamp') !== $currentEvent['timestamp']) {
                                ?>
                                        <a href="<?php echo get_page_uri(); ?>/?date=<?php echo date("dmY", $timestamp); ?>&time=<?php echo date("Hi", $timestamp); ?>" class="block underline hover:no-underline">
                                            <?php
                                            echo date("j.n.y", $timestamp) . " in " . get_field('address', get_sub_field('venue')[0]->ID)['city']; ?>
                                        </a>
                                <?php
                                    }
                                endwhile; ?>

                            </div>
                        </div>
                    <?php
                    endif;
                endwhile;

                if (array_key_exists("address", $currentVenue) && $currentVenue['address']) {
                    ?>
                    <div class="font-medium text-lg leading-wider border-b-2 gap-collapse--left">
                        <div class="p-5">
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

                ?>


                <?php
                if (array_key_exists("url", $currentVenue) && $currentVenue['url'] !== "") { ?>
                    <div class="font-medium text-lg leading-wider border-b-2 gap-collapse--left">
                        <div class="p-5">
                            <a href="<?php print $currentVenue['url'] ?>" target="_blank" class="underline hover:no-underline">
                                <?php print explode("/", preg_replace('#^https?://#', '', rtrim($currentVenue['url'], '/')))[0]; ?>
                            </a>
                        </div>
                    </div>
                <?php
                }
                ?>


                <div class="font-medium text-lg leading-wider gap-collapse--left">
                    <div class="p-5">
                        <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo get_permalink()    . "/?date=" . $date . "&time=" . $time; ?>" target="_blank" class="underline hover:no-underline flex items-center">
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
        </div>
    </div>
    <?php
    while ($the_query_teaser->have_posts()) : $the_query_teaser->the_post();
        the_content();
    endwhile;
    wp_reset_query();
    ?>
</div>