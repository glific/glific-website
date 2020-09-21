<?php

/**
 * Get Started page for the theme
 *
 * @package glific
 */
get_header();
$main_heading = get_field('main_heading');
?>

<div class="d-flex flex-column main-container bg-theme-white-smoke">
    <?php if (!empty($main_heading)) : ?>
        <div class="justify-content-between w-235 w-md-310 mx-auto pt-18 pt-md-18 pb-md-13.5 pb-11.5">
            <h1 class="font-heebo-bold fz-28 leading-40 fz-md-36 text-theme-primary"><?php echo $main_heading; ?></h1>
        </div>
    <?php endif; ?>
    <div class="subsection-container d-flex flex-column ml-6 ml-xl-26 w-xl-936 w-md-712">
        <?php $primary_section_data = get_field('primary_section');
        if (!empty($primary_section_data)) :
            foreach ($primary_section_data as $key => $data) :
                $primary_count_index = $key >= 9 ? '' : 0; ?>
                <div class="flex-column flex-md-row d-flex justify-content-between mb-13.5 mb-xl-18 mb-md-20 w-full">
                    <div class="d-flex flex-row w-xl-67">
                        <h2 class="font-heebo-light fz-60 text-theme-mine-shaft"><?php echo $primary_count_index; ?><?php echo $key + 1; ?></h2>
                    </div>
                    <div class="d-flex flex-column w-280 w-xl-770 w-md-613 rounded-30 bg-theme-gin get-started-content-box">
                        <?php if (!empty($data['title'])) : ?>
                            <div class="bg-white p-6 pt-md-6 pb-md-4.5 rounded-20 pl-md-8.5">
                                <h2 class="fz-24 font-heebo-regular text-theme-mine-shaft mb-0"><?php echo $data['title']; ?></h2>
                            </div>
                        <?php endif; ?>
                        <div class="d-flex flex-column bg-theme-gin rounded-bottom-30 font-heebo-regular fz-18 leading-28 text-theme-mine-shaft pt-8 pb-6 pl-5 pb-md-6 pl-md-8">
                            <?php if (!empty($data['content'])) :
                                foreach ($data['content'] as $content) : ?>
                                    <div class="d-flex flex-row">
                                        <div class="w-8 h-8 w-md-15 h-md-15 rounded-5 bg-theme-pewter mt-4 mt-md-3.5"></div>
                                        <div class="get-started-description ml-3 ml-xl-9.5 mb-md-6 mb-4 w-xl-633 w-md-540 ml-md-8 w-240">
                                            <?php echo $content['description']; ?>
                                        </div>
                                    </div>
                                <?php endforeach;
                            endif;
                            if (!empty($data['button_url']) && !empty($data['button_label'])) : ?>
                                <a href="<?php echo $data['button_url']; ?>" class="d-block w-154 text-decoration-none bg-theme-primary text-white font-heebo-regular fz-18 px-10 py-4 leading-27 rounded-top-15 rounded-bottom-left-15"><?php echo $data['button_label']; ?></a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
        <?php endforeach;
        endif; ?>
    </div>
    <?php $secondary_section_data = get_field('secondary_section');
    if (!empty($secondary_section_data)) : ?>
        <div class="d-none d-md-flex flex-row w-xl-868 w-md-750 ml-xl-64 justify-content-between mb-md-26 mx-auto">
            <?php foreach ($secondary_section_data as $data) : ?>
                <div class="d-flex flex-column w-xl-426 w-md-360 p-xl-10 p-md-9 bg-white get-started-content-box rounded-top-30 rounded-bottom-right-30">
                    <h2 class="fz-md-24 w-xl-345 w-md-310"><?php echo $data['title']; ?></h2>
                    <?php if (!empty($data['button_url']) && !empty($data['button_text'])) : ?>
                        <div class="d-flex flex-row justify-content-center mt-xl-7 mt-md-8">
                            <a href="<?php $data['button_url']; ?>" class="d-block w-232 text-decoration-none bg-theme-secondary text-white font-heebo-regular fz-18 px-10 py-4 leading-27 rounded-top-15 rounded-bottom-left-15"><?php echo $data['button_text']; ?></a>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>

<?php
get_footer(); ?>