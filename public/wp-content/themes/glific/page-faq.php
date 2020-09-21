<?php

/**
 * File functions.php for theme glific
 *
 * @package glific
 */

get_header();

$faqs = get_field('faq_content');
$page_title = get_field('faq_page_title');
?>


<div class="bg-theme-white-smoke page-faq">
    <div class="demo-section d-flex flex-column flex-md-row justify-content-md-between w-320 w-md-660 w-xl-880 mx-auto">
        <div class="d-flex flex-column w-full justify-content-center pt-18 text-center">
            <h3 class="text-theme-primary font-heebo-bold fz-28 fz-md-36 leading-40 mb-0"><?php echo $page_title; ?></h3>
        </div>
    </div>

    <div class="pb-26 px-6 px-xl-31">
        <?php 
        if(!empty($faqs)) :
            foreach ($faqs as $key => $faq) : $faq_count = $key + 1; ?>
            <div class="accordion py-4" id="accordionFaq">
                <div class="card rounded-20 card-shadow">
                    <div class="card-header bg-white rounded-20 p-0 card-shadow" id="heading<?php echo $faq_count; ?>">
                        <button class="btn btn-link btn-block text-left rounded-20 px-6 text-decoration-none fz-24 font-heebo-regular text-theme-mine-shaft"
                            type="button"
                            data-toggle="collapse"
                            data-target="#collapse<?php echo $faq_count;?>"
                            aria-expanded="false"
                            aria-controls="collapse<?php echo $faq_count;?>"
                        >
                        <div class="d-flex flex-column flex-md-row">
                            <div class="d-flex flex-row justify-content-between">
                                <div class="fz-36 font-heebo-light my-auto pr-md-6 pr-xl-16">
                                    <?php echo $faq_count < 10 ? '0' . $faq_count : $faq_count;?>
                                </div>
                                <div class="icon-dropdown d-md-none w-22 h-30 mt-4"> 
                                    <?php echo file_get_contents(get_template_directory(). '/dist/images/icon-arrow.svg') ?>
                                </div>
                            </div>
                            <div class="my-auto py-6 w-md-85p">
                                <?php echo $faq['title']; ?>
                            </div>
                            <div class="icon-dropdown d-none d-md-block w-22 h-30 mt-6 ml-auto"> 
                                <?php echo file_get_contents(get_template_directory(). '/dist/images/icon-arrow.svg') ?>
                            </div>
                        </div>
                        </button>
                    </div>
                    <div id="collapse<?php echo $faq_count;?>" class="collapse" aria-labelledby="heading<?php echo $faq_count; ?>" data-parent="#accordionFaq">
                        <div class="card-body fz-18 font-heebo-regular pl-xl-31 pr-xl-15 py-xl-15">
                        <?php echo $faq['description']; ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach;
        endif; ?>
    </div>
   
</div>

<?php
get_footer();