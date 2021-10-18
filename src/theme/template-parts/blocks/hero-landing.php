<?php

/*
 * Landing Hero
 */

$stripeColor = get_field('stripeColor') ?: 'yellow';
$quotes = get_field('quotes') ?: 1;
$quote = $quotes[rand(0, count($quotes) - 1)];
?>
<div class="wp-block-hero-landing">
    <div class="wp-block-hero-landing__wrapper">
        <div class="wp-block-hero-landing__tab bg-<?php echo $stripeColor; ?> flex items-end z-20">
            <div class="wp-block-hero-landing__tab-content--desktop">
                <div class="mt-6">
                    <?php if (ICL_LANGUAGE_CODE === 'en') {
                        echo file_get_contents(
                            get_template_directory() .
                                '/assets/images/svg/hero-date-en.svg'
                        );
                    } else {
                        echo file_get_contents(
                            get_template_directory() .
                                '/assets/images/svg/hero-date.svg'
                        );
                    } ?>
                </div>
                <div class="">
                    <?php if (ICL_LANGUAGE_CODE === 'en') {
                        echo file_get_contents(
                            get_template_directory() .
                                '/assets/images/svg/hero-description-en.svg'
                        );
                    } else {
                        echo file_get_contents(
                            get_template_directory() .
                                '/assets/images/svg/hero-description.svg'
                        );
                    } ?>
                </div>
            </div>
            <div class="wp-block-hero-landing__tab-content--mobile">


                <?php if (ICL_LANGUAGE_CODE === 'en') {
                    echo file_get_contents(
                        get_template_directory() .
                            '/assets/images/svg/hero-date--straight-en.svg'
                    ); ?>
                    <?php echo file_get_contents(
                        get_template_directory() .
                            '/assets/images/svg/hero-description--straight-en.svg'
                    );
                } else {
                    echo file_get_contents(
                        get_template_directory() .
                            '/assets/images/svg/hero-date--straight.svg'
                    ); ?>
                    <?php echo file_get_contents(
                        get_template_directory() .
                            '/assets/images/svg/hero-description--straight.svg'
                    );
                } ?>
            </div>
        </div>

        <div class="wp-block-hero-landing__quote-wrapper">
            <div class="block md:hidden wp-block-hero-landing__quote" id="marquee-landing-wrapper--mobile">
                <?php echo $quote['text']; ?>
            </div>
            <div class="wp-block-hero-landing__quote-source__wrapper">
                <span class="wp-block-hero-landing__quote-source">
                    <?php echo $quote['author']; ?>
                </span>
            </div>
            <div class="absolute h-full w-full top-0 left-0 z-30 opacity-60" style="background: linear-gradient(90deg, rgb(255 255 255 / 0%) 0%, rgb(89 89 89) 100%); mix-blend-mode: multiply;"></div>
            <img srcset="<?php echo wp_get_attachment_image_srcset(
                $quote['image']['ID']
            ); ?>" class="image-bg" alt="<?php echo array_key_exists(
    'alt',
    $quote['image']
) && $quote['image']['alt']; ?>" />
            <div class="hidden md:block absolute w-full h-full top-0 left-0 z-50">
                <div class="wp-block-hero-landing__quote" id="marquee-landing-wrapper--desktop">
                    <?php echo $quote['text']; ?>
                </div>
                <div class="wp-block-hero-landing__quote-source__wrapper">
                    <span class="wp-block-hero-landing__quote-source">
                        <?php echo $quote['author']; ?>
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>