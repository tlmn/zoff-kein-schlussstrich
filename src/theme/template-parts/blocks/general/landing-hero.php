<?php

/*
 * Landing Hero
 */

$stripeColor = get_field('stripeColor') ?: 'yellow';
$quotes = get_field('quotes') ?: 1;
$quote = $quotes[rand(0, count($quotes) - 1)];

?>
<div class="wp-block-landing-hero relative">
    <div class="container grid-6 md:grid-16 border-b-2 md:border-l-2 md:border-r-2 border-black">
        <div class="col-span-full md:col-span-2 pb-2 bg-<?php echo $stripeColor; ?> shadow--bottom-right z-30 relative md:gap-collapse--right flex items-end">
            <div class="hidden md:flex flex-col flex-col-reverse items-end gap-5">
                <div class=>
                    <?php
                    echo file_get_contents(get_template_directory() . '/assets/images/svg/hero-date.svg');
                    ?>
                </div>
                <div class="mt-6">
                    <?php
                    echo file_get_contents(get_template_directory() . '/assets/images/svg/hero-description.svg');
                    ?>
                </div>
            </div>
            <div class="md:hidden w-full justify-start flex flex-col gap-5">
                <?php
                echo file_get_contents(get_template_directory() . '/assets/images/svg/hero-date--straight.svg');
                ?>
                <?php
                echo file_get_contents(get_template_directory() . '/assets/images/svg/hero-description--straight.svg');
                ?>
            </div>
        </div>

        <div class="col-span-full md:col-span-14 relative h-full w-full">
            <img srcset="<?php echo wp_get_attachment_image_srcset($quote['image']['ID']) ?>" class="border-0 md:shadow--left md:shadow--bottom-right absolute top-0 left-0 object-cover w-full h-full" alt="<?php echo array_key_exists('alt', $quote['image']) && $quote['image']['alt']; ?>" />
            <div class="hidden md:block wp-block-landing-hero__quote" id="marquee-landing-wrapper">
                <?php echo $quote['text']; ?>
            </div>
            <div class="block md:hidden -mt-2 -ml-4 wp-block-landing-hero__quote">
                <?php echo $quote['text']; ?>
            </div>
            <div class="absolute top-0 flex pl-2 md:pl-0 md:justify-end items-end w-full h-full text-3xl pr-7">
                <span class="md:rotate--90-landing text-white italic text-m">
                    <?php echo $quote["author"]; ?>
                </span>
            </div>
        </div>
    </div>
</div>