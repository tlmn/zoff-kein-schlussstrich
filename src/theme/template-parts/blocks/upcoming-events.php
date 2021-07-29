<?php

/*
 * Upcoming Events
 */

$upcomingEvents = get_field('events');
$eventsParsed = [];
foreach ($upcomingEvents as $upcomingEvent) {
    $datetime = explode(' ', $upcomingEvent['timestamp']);
    array_push($eventsParsed, [
        'title' => $upcomingEvent['event'][0]->post_title,
        'permalink' => get_permalink($upcomingEvent['event'][0]->ID),
        'featureImage' => get_field('meta', $upcomingEvent['event'][0]->ID)[
            'feature_image'
        ]['image']['url'],
        'date' => $datetime[0],
        'time' => $datetime[1],
    ]);
}
?>
<div class="wp-block-upcoming-events">
    <div class="wp-block-upcoming-events__wrapper">
        <div class="wp-block-upcoming-events__tab bg-yellow">
            <div class="mt-6">
                    <?php echo file_get_contents(
                        get_template_directory() .
                            '/assets/images/svg/hero-date.svg'
                    ); ?>
            </div>
            <div class="">
                    <?php echo file_get_contents(
                        get_template_directory() .
                            '/assets/images/svg/hero-description.svg'
                    ); ?>
            </div>
        </div>

        <div class="wp-block-upcoming-events__image-wrapper">
            <?php
            $index = 1;
            foreach ($eventsParsed as $event) { ?>
                <img src="<?php echo $event[
                    'featureImage'
                ]; ?>" class="wp-block-upcoming-events__image wp-block-upcoming-events__image--<?php echo $index; ?>">
                
                <?php $index++;}
            ?>
        </div>

        <div class="wp-block-upcoming-events__content-wrapper">
        <?php
        $index = 1;
        foreach ($eventsParsed as $event) { ?>
                <div class="wp-block-upcoming-events__content wp-block-upcoming-events__content--<?php echo $index; ?>" <?php if (
    $index !== 1
) {
    echo 'style="display:none;"';
} ?>>
            <div>
                <span class="">
                    Aktuelles
                </span>
                <h3>
                    <?php echo $event['date']; ?>
                    <br/>
                    <?php echo $event['title']; ?>
                </h3>
            </div>
            <div>
            <?php if ($is_preview) { ?>
                <div class="wp-block-button wp-block-button--black">
                
                <?php } else { ?>
                <a class="wp-block-button wp-block-button--black" href="<?php echo $event[
                    'permalink'
                ] .
                    '?date' .
                    str_replace('.', '', $event['date']) .
                    '2021&time=' .
                    $event['time']; ?>00" target="">
                    
                    <?php } ?>
                    <div class="wp-block-button__text">zum Termin</div>
                    <div class="ml-2">
                        <div>
                            <?php echo file_get_contents(
                                get_template_directory() .
                                    '/assets/icons/arrow.svg'
                            ); ?>
                        </div>
                    </div>
                </a>
            </div>
               <?php  ?>
            </div>
                <?php $index++;}
        ?> 
        </div>
    </div>
</div>