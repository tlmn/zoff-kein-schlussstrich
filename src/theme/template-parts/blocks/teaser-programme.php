<?php

/*
 *  Programme Teaser Container
 */

$programmeLinks = get_field('programmeLinks') ?: '1';
$featureImage = get_field('featureImage');

$allowed_blocks = array('core/heading', 'core/paragraph', 'acf/button');

$template = array(
    array('core/heading', array(
        'content'   => '18 Tage 150 Veranstaltungen 14 Städte',
        'level'     => 3,
    )),
    array('core/paragraph', array(
        'content' => 'Bundesweites & interdisziplinäres Theaterprojekt „Kein Schlussstrich!“ thematisiert künstlerisch die Taten und Hintergründe des NSU künstlerisch zu thematisieren. Mit dem Vorhaben sollen die Perspektiven der Familien der Opfer und der migrantischen Communities in den Fokus der Öffentlichkeit gebracht werden.',
    )),
    array('acf/button', array(
        'content' => 'About',
    )),
);

?>

<div class="border-t-2 border-b-2 row-collapse flex justify-center">
    <div class="container grid-6 md:grid-16 md:border-l-2 md:border-r-2">
        <div class="md:border-r-2 col-span-full md:col-span-1 flex md:gap-collapse--right h-full items-center justify-center md:relative">
            <span class="font-sans font-medium md:absolute md:rotate--270 text-3xl md:text-xl py-3 md:py-0 leading-snug md:max-w-max md:whitespace-nowrap">
                Programm
            </span>
        </div>
        <div class="col-span-full md:col-span-4 flex flex-col md:border-r-2">
            <div class="flex-1 w-full shadow--bottom" style="z-index: 100">
                <img srcset="<?php echo wp_get_attachment_image_srcset($featureImage['ID']); ?>" alt="<?php echo $featureImage['alt']; ?>" class="w-full h-full object-cover" />
            </div>
            <div class="self-end w-full flex flex-col">
                <?php
                $i = 1;
                foreach ($programmeLinks as $programmeLink) {
                ?>
                    <a href="<?php echo get_permalink($programmeLink['link']->ID); ?>" class="no-underline w-full px-2 py-1 h4 mb-0 text-black shadow--bottom z-20 bg-<?php echo $programmeLink['bgColor'] ?>" style="z-index: <?php echo 100 - ($i * 10); ?>">
                        <?php echo $programmeLink['link']->post_title ?>
                    </a>
                <?php
                    $i++;
                }
                ?>
            </div>
        </div>

        <div class="col-span-full md:col-span-9 md:col-start-7 py-2 md:py-7 px-2 md:px-0 md:py-">
            <InnerBlocks allowedBlocks="<?php echo esc_attr(wp_json_encode($allowed_blocks)); ?>" template="<?php echo esc_attr(wp_json_encode($template)); ?>" templateLock="all" />
        </div>
    </div>
</div>