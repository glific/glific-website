<?php

/**
 * Webinar page for the theme
 *
 * @package glific
 */
get_header();
$main_heading = get_field('main_heading');
$webinar_container = get_field('webinar_container');
?>

<div class="main-container d-flex flex-column w-full bg-theme-white-smoke">
    <?php if (!empty($main_heading)) : ?>
        <div class="heading-section w-150 mx-auto pt-xl-18 pb-xl-16">
            <h1 class="fz-xl-36 leading-xl-40 font-heebo-bold text-theme-primary mb-0"><?php echo $main_heading; ?></h1>
        </div>
    <?php endif; ?>
    <div class="webinar-container bg-theme-pewter">
        <div class="d-flex flex-column pt-xl-20 pb-xl-18 w-xl-1092 w-md-641 mx-auto">
            <?php if (!empty($webinar_container['heading'])) : ?>
                <h2 class="font-heebo-semibold fz-xl-24 text-theme-mine-shaft mb-0"><?php echo $webinar_container['heading']; ?></h2>
            <?php endif; ?>
            <div class="video-container mt-xl-14 d-flex flex-row justify-content-between h-xl-456">
                <div class="selected-video-container w-xl-722 rounded-30">
                    
                </div>
                <?php if (!empty($webinar_container['video_container'])) : ?>
                    <div class="scrollable-video-container w-xl-315 py-xl-9.5 overflow-auto">
                        <div class="w-xl-214 mx-auto">
                            <?php foreach ($webinar_container['video_container'] as $key => $video) : ?>
                                <div class="single-video-container">
                                   <?php echo $video['video_url']; ?>
                                </div>
                                <div class="mt-xl-6 mb-xl-18">
                                    <h2></h2>
                                    <p>10</p>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>

    </div>
</div>

<?php
get_footer();
