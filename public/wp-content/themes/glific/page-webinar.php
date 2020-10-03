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
        <div class="heading-section w-150 mx-auto pt-18 pb-10 pb-md-14 pt-md-18 pb-xl-16 text-center">
            <h1 class="fz-28 fz-md-36 leading-40 font-heebo-bold text-theme-primary mb-0"><?php echo $main_heading; ?></h1>
        </div>
    <?php endif; ?>
    <div class="webinar-container bg-theme-pewter">
        <div class="d-flex flex-column py-14 pb-18 py-md-14 pt-xl-20 pb-xl-18 w-328 w-xl-1092 w-md-641 mx-auto">
            <?php if (!empty($webinar_container['heading'])) : ?>
                <h2 class="font-heebo-semibold fz-24 text-theme-mine-shaft mb-0"><?php echo $webinar_container['heading']; ?></h2>
            <?php endif; ?>
            <div class="video-container mt-6 mt-md-3 mt-xl-14 d-flex flex-column flex-md-row justify-content-between h-md-305 h-xl-486">
                <div class="selected-video-container w-328 w-xl-722 w-md-432">
                    <?php foreach ($webinar_container['video_container'] as $video) :
                        $video_id = get_youtube_video_id($video['video_url']);
                        $video_title = get_youtube_video_title($video_id);
                        $video_duration = get_youtube_video_duration($video_id); ?>
                        <div class="single-video-block">
                            <iframe id="#iFrame" src="https://www.youtube.com/embed/<?php echo $video_id; ?>" frameborder="0" allowfullscreen></iframe>
                        </div>
                        <?php if (!empty($video_title) && !empty($video_duration)) : ?>
                            <div class="d-flex flex-row justify-content-between pt-md-4 align-items-center">
                                <h1 class="font-heebo-bold fz-18 mb-0 selected-video-title text-theme-nero"><?php echo $video_title; ?></h1>
                                <p class="font-heebo-regular fz-18 mb-0 selected-video-duration text-theme-mine-shaft"><?php echo $video_duration; ?> min</p>
                            </div>
                    <?php endif;
                        break;
                    endforeach; ?>
                </div>
                <?php if (!empty($webinar_container['video_container'])) : ?>
                    <div class="scrollable-video-container d-flex flex-row flex-md-column h-md-264 w-full w-md-182 w-xl-315 h-xl-456 overflow-auto scrollbar-hidden
                        mx-auto mx-md-0 mt-15 py-10 align-items-md-center pt-md-6 mt-md-0 ml-md-auto box-shadow-dark-inset-10">
                        <?php foreach ($webinar_container['video_container'] as $key => $video) :
                            $video_id = get_youtube_video_id($video['video_url']); ?>
                            <div class="mb-md-6 mb-xl-13">
                                <div class="single-video-container w-124 d-block flex-column mx-4 mx-md-0 w-xl-214 h-82 h-xl-136
                                    <?php echo empty($video_title) && empty($video_duration) ? 'mb-md-6 mb-xl-13' : ''  ?>"
                                        data-target="<?php echo $video_id; ?>">
                                    <div class="w-full rounded-xl-30 rounded-15 c-pointer bg-size-cover align-items-center flex-column flex-md-row justify-content-center h-full position-relative"
                                        style="background-image: url(https://img.youtube.com/vi/<?php echo $video_id ?>/0.jpg" )>
                                        <div class="w-20 w-xl-35 position-absolute mt-9 mt-xl-15.5 ml-15 ml-xl-24">
                                            <?php echo file_get_contents(get_template_directory() . '/dist/images/play-button.svg') ?>
                                        </div>
                                    </div>

                                    <?php if (!empty($video_title) && !empty($video_duration)) : ?>
                                        <div class="d-flex flex-column d-md-none">
                                            <h2 class="font-heebo-bold fz-12 fz-xl-14 text-theme-nero video-title mb-0 mt-4"><?php echo $video['name'] ?></h2>
                                            <p class="font-heebo-regular fz-12 leading-18 mb-0 mt-xl-7 text-left video-duration text-theme-mine-shaft"><?php echo $video['time']; ?> min</p>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <?php if (!empty($video_title) && !empty($video_duration)) : ?>
                                    <div class="w-124 mx-4 mx-md-0 w-xl-214 mb-xl-13 mb-md-6 d-none d-md-flex flex-column">
                                        <h2 class="font-heebo-bold fz-12 fz-xl-14 text-theme-nero video-title mb-0 mt-4"><?php echo $video['name'] ?></h2>
                                        <p class="font-heebo-regular fz-12 leading-18 mb-0 mt-xl-7 text-left video-duration text-theme-mine-shaft"><?php echo $video['time']; ?> min</p>
                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<?php
get_footer();
