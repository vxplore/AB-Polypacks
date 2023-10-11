<?php if (!empty($page_contents)) {

if (!empty($page_contents->page_background_image)) {
    $page_background_image = base_url($page_contents->page_background_image);
} else {
    $page_background_image = "";
}

if (!empty($page_contents->page_heading)) {
    $page_heading = $page_contents->page_heading;
} else {
    $page_heading = "";
}

if (!empty($page_contents->page_cms_contents)) {
    $CMS_contents = $page_contents->page_cms_contents;

    if (!empty($CMS_contents->main_section_heading)) {
        $main_section_heading = $CMS_contents->main_section_heading;
    } else {
        $main_section_heading = "";
    }

    if (!empty($CMS_contents->main_section_description)) {
        $main_section_description = $CMS_contents->main_section_description;
    } else {
        $main_section_description = "";
    }

    if (!empty($CMS_contents->top_section_description)) {
        $top_section_description = $CMS_contents->top_section_description;
    } else {
        $top_section_description = "";
    }

    if (!empty($CMS_contents->top_section_image)) {
        $top_section_image = base_url($CMS_contents->top_section_image);
    } else {
        $top_section_image = "";
    }

    if (!empty($CMS_contents->small_section1_image)) {
        $small_section1_image = base_url($CMS_contents->small_section1_image);
    } else {
        $small_section1_image = "";
    }

    if (!empty($CMS_contents->small_section1_heading)) {
        $small_section1_heading = $CMS_contents->small_section1_heading;
    } else {
        $small_section1_heading = "";
    }

    if (!empty($CMS_contents->small_section1_sub_heading)) {
        $small_section1_sub_heading = $CMS_contents->small_section1_sub_heading;
    } else {
        $small_section1_sub_heading = "";
    }

    if (!empty($CMS_contents->small_section1_description)) {
        $small_section1_description = $CMS_contents->small_section1_description;
    } else {
        $small_section1_description = "";
    }

    if (!empty($CMS_contents->small_section2_image)) {
        $small_section2_image = base_url($CMS_contents->small_section2_image);
    } else {
        $small_section2_image = "";
    }

    if (!empty($CMS_contents->small_section2_heading)) {
        $small_section2_heading = $CMS_contents->small_section2_heading;
    } else {
        $small_section2_heading = "";
    }

    if (!empty($CMS_contents->small_section2_sub_heading)) {
        $small_section2_sub_heading = $CMS_contents->small_section2_sub_heading;
    } else {
        $small_section2_sub_heading = "";
    }

    if (!empty($CMS_contents->small_section2_description)) {
        $small_section2_description = $CMS_contents->small_section2_description;
    } else {
        $small_section2_description = "";
    }

    if (!empty($CMS_contents->sub_section1_image)) {
        $sub_section1_image = base_url($CMS_contents->sub_section1_image);
    } else {
        $sub_section1_image = "";
    }

    if (!empty($CMS_contents->sub_section1_heading)) {
        $sub_section1_heading = $CMS_contents->sub_section1_heading;
    } else {
        $sub_section1_heading = "";
    }
    
    if (!empty($CMS_contents->sub_section1_description)) {
        $sub_section1_description = $CMS_contents->sub_section1_description;
    } else {
        $sub_section1_description = "";
    }

    if (!empty($CMS_contents->sub_section2_image)) {
        $sub_section2_image = base_url($CMS_contents->sub_section2_image);
    } else {
        $sub_section2_image = "";
    }

    if (!empty($CMS_contents->sub_section2_heading)) {
        $sub_section2_heading = $CMS_contents->sub_section2_heading;
    } else {
        $sub_section2_heading = "";
    }
    
    if (!empty($CMS_contents->sub_section2_description)) {
        $sub_section2_description = $CMS_contents->sub_section2_description;
    } else {
        $sub_section2_description = "";
    }

    if (!empty($CMS_contents->sub_section3_image)) {
        $sub_section3_image = base_url($CMS_contents->sub_section3_image);
    } else {
        $sub_section3_image = "";
    }

    if (!empty($CMS_contents->sub_section3_heading)) {
        $sub_section3_heading = $CMS_contents->sub_section3_heading;
    } else {
        $sub_section3_heading = "";
    }
    
    if (!empty($CMS_contents->sub_section3_description)) {
        $sub_section3_description = $CMS_contents->sub_section3_description;
    } else {
        $sub_section3_description = "";
    }

    if (!empty($CMS_contents->sub_section4_image)) {
        $sub_section4_image = base_url($CMS_contents->sub_section4_image);
    } else {
        $sub_section4_image = "";
    }

    if (!empty($CMS_contents->sub_section4_heading)) {
        $sub_section4_heading = $CMS_contents->sub_section4_heading;
    } else {
        $sub_section4_heading = "";
    }
    
    if (!empty($CMS_contents->sub_section4_description)) {
        $sub_section4_description = $CMS_contents->sub_section4_description;
    } else {
        $sub_section4_description = "";
    }

    if (!empty($CMS_contents->sub_section5_image)) {
        $sub_section5_image = base_url($CMS_contents->sub_section5_image);
    } else {
        $sub_section5_image = "";
    }

    if (!empty($CMS_contents->sub_section5_heading)) {
        $sub_section5_heading = $CMS_contents->sub_section5_heading;
    } else {
        $sub_section5_heading = "";
    }
    
    if (!empty($CMS_contents->sub_section5_description)) {
        $sub_section5_description = $CMS_contents->sub_section5_description;
    } else {
        $sub_section5_description = "";
    }

    if (!empty($CMS_contents->sub_section6_image)) {
        $sub_section6_image = base_url($CMS_contents->sub_section6_image);
    } else {
        $sub_section6_image = "";
    }

    if (!empty($CMS_contents->sub_section6_heading)) {
        $sub_section6_heading = $CMS_contents->sub_section6_heading;
    } else {
        $sub_section6_heading = "";
    }
    
    if (!empty($CMS_contents->sub_section6_description)) {
        $sub_section6_description = $CMS_contents->sub_section6_description;
    } else {
        $sub_section6_description = "";
    }

    if (!empty($CMS_contents->certificates_section_heading)) {
        $certificates_section_heading = $CMS_contents->certificates_section_heading;
    } else {
        $certificates_section_heading = "";
    }

    if (!empty($CMS_contents->certificate1_image)) {
        $certificate1_image = base_url($CMS_contents->certificate1_image);
    } else {
        $certificate1_image = "";
    }

    if (!empty($CMS_contents->certificate1_description)) {
        $certificate1_description = $CMS_contents->certificate1_description;
    } else {
        $certificate1_description = "";
    }

    if (!empty($CMS_contents->certificate2_image)) {
        $certificate2_image = base_url($CMS_contents->certificate2_image);
    } else {
        $certificate2_image = "";
    }

    if (!empty($CMS_contents->certificate2_description)) {
        $certificate2_description = $CMS_contents->certificate2_description;
    } else {
        $certificate2_description = "";
    }

    if (!empty($CMS_contents->certificate3_image)) {
        $certificate3_image = base_url($CMS_contents->certificate3_image);
    } else {
        $certificate3_image = "";
    }

    if (!empty($CMS_contents->certificate3_description)) {
        $certificate3_description = $CMS_contents->certificate3_description;
    } else {
        $certificate3_description = "";
    }

    if (!empty($CMS_contents->certificate4_image)) {
        $certificate4_image = base_url($CMS_contents->certificate4_image);
    } else {
        $certificate4_image = "";
    }

    if (!empty($CMS_contents->certificate4_description)) {
        $certificate4_description = $CMS_contents->certificate4_description;
    } else {
        $certificate4_description = "";
    }
}

} ?>

<?php if (!empty($page_contents_editable)) {
echo "<input type='hidden' id='CMS_page_id' value='".$page_id."'>";
}?>

<section class="innerpagebanner position-relative" style="
background-image: url(<?=$page_background_image?>); 
background-size: cover; 
background-repeat: no-repeat; padding: 120px 0;">
    <div class="container py-4">
        <h1 class="mb-3 text-center fadeUp"><?=$page_heading?></h1>
        <nav class="fadeUp" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center">
                <li class="breadcrumb-item"><a href="<?=base_url()?>">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">About Us</li>
            </ol>
        </nav>
    </div>
    <a href="#scrollsec" class="scrollclk">
        <div id="mouse-scroll">
            <div class="mouse">
            <div class="mouse-in"></div>
            </div>
            <div>
                <span class="down-arrow-1"></span>
                <span class="down-arrow-2"></span>
                <span class="down-arrow-3"></span>
            </div>
        </div>
    </a>
</section>

<section class="py-5" id="scrollsec">
    <div class="container">
        <?php if (!empty($page_contents_editable)) { ?>
            <h2 contentEditable="true" id="main_section_heading" class="text-center mb-3 fadeUp editable-content"><?=$main_section_heading?></h2>
            <div class="row justify-content-center mb-3 fadeUp">
                <div class="col-md-8">
                    <big contentEditable="true" id="main_section_description" class="d-block text-center editable-content"><?=$main_section_description?></big>
                </div>
            </div>
        <?php } else { ?>
            <h2 class="text-center mb-3 fadeUp"><?=$main_section_heading?></h2>
            <div class="row justify-content-center mb-3 fadeUp">
                <div class="col-md-8">
                    <big class="d-block text-center"><?=$main_section_description?></big>
                </div>
            </div>
        <?php } ?>

        <div class="row align-items-center">
            <?php if (!empty($page_contents_editable)) { ?>
                <div contentEditable="true" id="top_section_description" class="col-md-6 fadeLeft editable-content">
                    <?=$top_section_description?>
                </div>
                <div class="col-md-6 p-3 fadePopup">
                    <label for="top_section_image" class="editable-content w-100">
                        <img src="<?=$top_section_image?>" alt="" class="w-100">
                        <input type="file" id="top_section_image" class="hidden-image-input" onchange="previewImage(this)">
                    </label>
                </div>
            <?php } else { ?>
                <div class="col-md-6 fadeLeft">
                    <?=$top_section_description?>
                </div>
                <div class="col-md-6 p-3 fadePopup">
                    <img src="<?=$top_section_image?>" alt="" class="w-100">
                </div>
            <?php } ?>
        </div>
    </div>
</section>

<!-- <section class="howmuchsec overflow-hidden">
    <div class="row m-0 align-items-center">
        <div class="col-md-4 p-0 howmuchimg position-relative">
            <img src="<?=base_url('assets/client/images/strength-min.jpg')?>" alt="" class="w-100">
        </div>
        <div class="col-md-8 p-5 howmuch">
            <h2 class="mb-2 fadeUp">Our Strength</h2>
            <big class="d-block fadeUp mb-2">A mammoth 50,000 square feet well-planned factory with highly fabricated & ultra-modern production facilities, Quality Assurance Laboratory with all the modern and the latest equipment with a production capacity of over 400 MT per month.</big>
            <h4 class="mb-2 fadeUp">Technical and Process :</h4>
            <p class="fadeUp">With the most advanced and State of the art machinery, the company takes pride in the following :</p>
            <ul class="mb-2">
                <li>ISO 9001: 2015 and FSSC 22000:2017 Certified.</li>
                <li>Roto -gravure printing facility with contemporary features like auto-registration, web-video defect detection system and reverse station option.</li>
                <li>Solvent-free and solvent-based Lamination facilities.</li>
                <li>Multilayer Polyethylene Film Manufacturing facility.</li>
                <li>Shrink sleeves manufacturing facility.</li>
                <li>All types of Pouching Facilities (Side sealed, Center Sealed, Side Gusseted, Stand up, Zip Lock, D-Cut, V-Notch, Loop, Easy Pour for Liquid packs, etc.</li>
                <li>Sophisticated equipment for Quality Testing.</li>
            </ul>
            <h4 class="mb-2 fadeUp">Business Ethics</h4>
            <p class="fadeUp">Our Business ethics stays loyal to vendors and customers  event in challenging times.</p>
            <h4 class="mb-2 fadeUp">R& D and Quality Assurance</h4>
            <p class="fadeUp">On line testing of material to ensure zero defect with robust Quality Management System. Creating R& D facilities in house to develop new products , substitutes and alternatives with Client partnering.</p>
            <h4 class="mb-2 fadeUp">Human Resource</h4>
            <p class="fadeUp">A host of Committed, Passionate and Skilled Manpower with a Professional outlook. Who are young and vibrant, are the real assets for the Company.</p>
        </div>
    </div>
</section> -->

<section class="pt-5">
    <!-- <div class="container">
        <h2 class="text-center m-0 fadeUp">The Dream</h2>
        <div class="row justify-content-center mb-5 fadeUp">
            <div class="col-md-10 text-center">
                <big class="d-block text-center mb-3">A B Polypacks : The Future Leader</big>
                <p>Company’s ethical business approach over the years has helped in establishing a satisfied and prestigious clientele. Company’s professional and innovative approach has been viewed by the Clients  with a lot of appreciation, thereby projecting the company as one of the most potential and preferred  manufacturers of finest flexible packaging materials in the country.</p>
                <p>Currently the Company is at its best when it comes to understanding the Client’s stated as well as unstated needs, on time delivery, consistent quality. Price parity as also in transparency, integrity  and perfectionism.</p>
            </div>
        </div>
    </div> -->
    <div class="row m-0 bg-white align-items-center" id="Mission&Vission">
        <?php if (!empty($page_contents_editable)) { ?>
            <div class="col-md-3 p-0">
                <label for="small_section1_image" class="editable-content w-100">
                    <img src="<?=$small_section1_image?>" alt="" class="w-100 fadePopup">
                    <input type="file" id="small_section1_image" class="hidden-image-input" onchange="previewImage(this)">
                </label>
            </div>
            <div class="col-md-3 p-4">
                <h3 contentEditable="true" id="small_section1_heading" class="mb-2 fadeUp editable-content"><?=$small_section1_heading?></h3>
                <big contentEditable="true" id="small_section1_sub_heading" class="d-block mb-2 fadeUp editable-content"><?=$small_section1_sub_heading?></big>
                <p contentEditable="true" id="small_section1_description" class="fadeUp p-0 editable-content"><?=$small_section1_description?></p>
            </div>

            <div class="col-md-3 p-0">
                <label for="small_section2_image" class="editable-content w-100">
                    <img src="<?=$small_section2_image?>" alt="" class="w-100 fadePopup">
                    <input type="file" id="small_section2_image" class="hidden-image-input" onchange="previewImage(this)">
                </label>
            </div>
            <div class="col-md-3 p-4">
                <h3 contentEditable="true" id="small_section2_heading" class="mb-2 fadeUp editable-content"><?=$small_section2_heading?></h3>
                <big contentEditable="true" id="small_section2_sub_heading" class="d-block mb-2 fadeUp editable-content"><?=$small_section2_sub_heading?></big>
                <p contentEditable="true" id="small_section2_description" class="fadeUp p-0 editable-content"><?=$small_section2_description?></p>
            </div>
        <?php } else { ?>
            <div class="col-md-3 p-0">
                <img src="<?=$small_section1_image?>" alt="" class="w-100 fadePopup">
            </div>
            <div class="col-md-3 p-4">
                <h3 class="mb-2 fadeUp"><?=$small_section1_heading?></h3>
                <big class="d-block mb-2 fadeUp"><?=$small_section1_sub_heading?></big>
                <p class="fadeUp p-0"><?=$small_section1_description?></p>
            </div>

            <div class="col-md-3 p-0">
                <img src="<?=$small_section2_image?>" alt="" class="w-100 fadePopup">
            </div>
            <div class="col-md-3 p-4">
                <h3 class="mb-2 fadeUp"><?=$small_section2_heading?></h3>
                <big class="d-block mb-2 fadeUp"><?=$small_section2_sub_heading?></big>
                <p class="fadeUp p-0"><?=$small_section2_description?></p>
            </div>
        <?php } ?>
    </div>
</section>

<section class="bg-light py-5">
    <div class="container">
        <div class="row m-0 bg-white align-items-center" id="Integrity">
            <?php if (!empty($page_contents_editable)) { ?>
                <div class="col-md-6 p-0 fadeUp">
                    <label for="sub_section1_image" class="editable-content w-100">
                        <img src="<?=$sub_section1_image?>" alt="" class="w-100">
                        <input type="file" id="sub_section1_image" class="hidden-image-input" onchange="previewImage(this)">
                    </label>
                </div>
                <div class="col-md-6 p-3 p-md-5 fadeUp">
                    <h3 contentEditable="true" id="sub_section1_heading" class="mb-3 editable-content"><?=$sub_section1_heading?></h3>
                    <div contentEditable="true" id="sub_section1_description" class="editable-content">
                        <?=$sub_section1_description?>
                    </div>
                </div>
            <?php } else { ?>
                <div class="col-md-6 p-0 fadeUp">
                    <img src="<?=$sub_section1_image?>" alt="" class="w-100">
                </div>
                <div class="col-md-6 p-3 p-md-5 fadeUp">
                    <h3 class="mb-3"><?=$sub_section1_heading?></h3>
                    <div>
                        <?=$sub_section1_description?>
                    </div>
                </div>
            <?php } ?>
        </div>

        <div class="row m-0 flex-row-reverse bg-white align-items-center" id="TeamWork">
            <?php if (!empty($page_contents_editable)) { ?>
                <div class="col-md-6 p-0 fadeUp">
                    <label for="sub_section2_image" class="editable-content w-100">
                        <img src="<?=$sub_section2_image?>" alt="" class="w-100">
                        <input type="file" id="sub_section2_image" class="hidden-image-input" onchange="previewImage(this)">
                    </label>
                </div>
                <div class="col-md-6 p-3 p-md-5 fadeUp">
                    <h3 contentEditable="true" id="sub_section2_heading" class="mb-3 editable-content"><?=$sub_section2_heading?></h3>
                    <div contentEditable="true" id="sub_section2_description" class="editable-content">
                        <?=$sub_section2_description?>
                    </div>
                </div>
            <?php } else { ?>
                <div class="col-md-6 p-0 fadeUp">
                    <img src="<?=$sub_section2_image?>" alt="" class="w-100">
                </div>
                <div class="col-md-6 p-3 p-md-5 fadeUp">
                    <h3 class="mb-3"><?=$sub_section2_heading?></h3>
                    <div>
                        <?=$sub_section2_description?>
                    </div>
                </div>
            <?php } ?>
        </div>

        <div class="row m-0 bg-white align-items-center" id="SafetyMeasures">
            <?php if (!empty($page_contents_editable)) { ?>
                <div class="col-md-6 p-0 fadeUp">
                    <label for="sub_section3_image" class="editable-content w-100">
                        <img src="<?=$sub_section3_image?>" alt="" class="w-100">
                        <input type="file" id="sub_section3_image" class="hidden-image-input" onchange="previewImage(this)">
                    </label>
                </div>
                <div class="col-md-6 p-3 p-md-5 fadeUp">
                    <h3 contentEditable="true" id="sub_section3_heading" class="mb-3 editable-content"><?=$sub_section3_heading?></h3>
                    <div contentEditable="true" id="sub_section3_description" class="editable-content">
                        <?=$sub_section3_description?>
                    </div>
                </div>
            <?php } else { ?>
                <div class="col-md-6 p-0 fadeUp">
                    <img src="<?=$sub_section3_image?>" alt="" class="w-100">
                </div>
                <div class="col-md-6 p-3 p-md-5 fadeUp">
                    <h3 class="mb-3"><?=$sub_section3_heading?></h3>
                    <div>
                        <?=$sub_section3_description?>
                    </div>
                </div>
            <?php } ?>
        </div>

        <div class="row m-0 flex-row-reverse bg-white align-items-center" id="CustomerSatisfaction">
            <?php if (!empty($page_contents_editable)) { ?>
                <div class="col-md-6 p-0 fadeUp">
                    <label for="sub_section4_image" class="editable-content w-100">
                        <img src="<?=$sub_section4_image?>" alt="" class="w-100">
                        <input type="file" id="sub_section4_image" class="hidden-image-input" onchange="previewImage(this)">
                    </label>
                </div>
                <div class="col-md-6 p-3 p-md-5 fadeUp">
                    <h3 contentEditable="true" id="sub_section4_heading" class="mb-3 editable-content"><?=$sub_section4_heading?></h3>
                    <div contentEditable="true" id="sub_section4_description" class="editable-content">
                        <?=$sub_section4_description?>
                    </div>
                </div>
            <?php } else { ?>
                <div class="col-md-6 p-0 fadeUp">
                    <img src="<?=$sub_section4_image?>" alt="" class="w-100">
                </div>
                <div class="col-md-6 p-3 p-md-5 fadeUp">
                    <h3 class="mb-3"><?=$sub_section4_heading?></h3>
                    <div>
                        <?=$sub_section4_description?>
                    </div>
                </div>
            <?php } ?>
        </div>

        <div class="row m-0 bg-white align-items-center" id="QualityPolicy">
            <?php if (!empty($page_contents_editable)) { ?>
                <div class="col-md-6 p-0 fadeUp">
                    <label for="sub_section5_image" class="editable-content w-100">
                        <img src="<?=$sub_section5_image?>" alt="" class="w-100">
                        <input type="file" id="sub_section5_image" class="hidden-image-input" onchange="previewImage(this)">
                    </label>
                </div>
                <div class="col-md-6 p-3 p-md-5 fadeUp">
                    <h3 contentEditable="true" id="sub_section5_heading" class="mb-3 editable-content"><?=$sub_section5_heading?></h3>
                    <div contentEditable="true" id="sub_section5_description" class="editable-content">
                        <?=$sub_section5_description?>
                    </div>
                </div>
            <?php } else { ?>
                <div class="col-md-6 p-0 fadeUp">
                    <img src="<?=$sub_section5_image?>" alt="" class="w-100">
                </div>
                <div class="col-md-6 p-3 p-md-5 fadeUp">
                    <h3 class="mb-3"><?=$sub_section5_heading?></h3>
                    <div>
                        <?=$sub_section5_description?>
                    </div>
                </div>
            <?php } ?>
        </div>

        <div class="row m-0 flex-row-reverse bg-white align-items-center" id="Sustainability">
            <?php if (!empty($page_contents_editable)) { ?>
                <div class="col-md-6 p-0 fadeUp">
                    <label for="sub_section6_image" class="editable-content w-100">
                        <img src="<?=$sub_section6_image?>" alt="" class="w-100">
                        <input type="file" id="sub_section6_image" class="hidden-image-input" onchange="previewImage(this)">
                    </label>
                </div>
                <div class="col-md-6 p-3 p-md-5 fadeUp">
                    <h3 contentEditable="true" id="sub_section6_heading" class="mb-3 editable-content"><?=$sub_section6_heading?></h3>
                    <div contentEditable="true" id="sub_section6_description" class="editable-content">
                        <?=$sub_section6_description?>
                    </div>
                </div>
            <?php } else { ?>
                <div class="col-md-6 p-0 fadeUp">
                    <img src="<?=$sub_section6_image?>" alt="" class="w-100">
                </div>
                <div class="col-md-6 p-3 p-md-5 fadeUp">
                    <h3 class="mb-3"><?=$sub_section6_heading?></h3>
                    <div>
                        <?=$sub_section6_description?>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>

<section class="py-5" id="Certification">
    <div class="container">
        <div class="title2sec mb-4 fadeUp">
            <small>WE ARE THE BEST</small>
            <?php if (!empty($page_contents_editable)) { ?>
                <h2 contentEditable="true" id="certificates_section_heading" class="editable-content"><?=$certificates_section_heading?></h2>
            <?php } else { ?>
                <h2><?=$certificates_section_heading?></h2>
            <?php } ?>
        </div>

        <div class="row">
            <div class="col-md-3 mt-3">
                <div class="bg-light p-3 text-center h-100">
                    <?php if (!empty($page_contents_editable)) { ?>
                        <div class="mb-2">
                            <label for="certificate1_image" class="editable-content w-100">
                                <img src="<?=$certificate1_image?>" class="mx-auto" width="120px" height="120px" alt="">
                                <input type="file" id="certificate1_image" class="hidden-image-input" onchange="previewImage(this)">
                            </label>
                        </div>
                        <div contentEditable="true" id="certificate1_description" class="editable-content"><?=$certificate1_description?></div>
                    <?php } else { ?>
                        <div class="mb-2">
                            <img src="<?=$certificate1_image?>" class="mx-auto" width="120px" height="120px" alt="">
                        </div>
                        <div><?=$certificate1_description?></div>
                    <?php } ?>
                </div>
            </div>

            <div class="col-md-3 mt-3">
                <div class="bg-light p-3 text-center h-100">
                    <?php if (!empty($page_contents_editable)) { ?>
                        <div class="mb-2">
                            <label for="certificate2_image" class="editable-content w-100">
                                <img src="<?=$certificate2_image?>" class="mx-auto" width="120px" height="120px" alt="">
                                <input type="file" id="certificate2_image" class="hidden-image-input" onchange="previewImage(this)">
                            </label>
                        </div>
                        <div contentEditable="true" id="certificate2_description" class="editable-content"><?=$certificate2_description?></div>
                    <?php } else { ?>
                        <div class="mb-2">
                            <img src="<?=$certificate2_image?>" class="mx-auto" width="120px" height="120px" alt="">
                        </div>
                        <div><?=$certificate2_description?></div>
                    <?php } ?>
                </div>
            </div>

            <div class="col-md-3 mt-3">
                <div class="bg-light p-3 text-center h-100">
                    <?php if (!empty($page_contents_editable)) { ?>
                        <div class="mb-2">
                            <label for="certificate3_image" class="editable-content w-100">
                                <img src="<?=$certificate3_image?>" class="mx-auto" width="120px" height="120px" alt="">
                                <input type="file" id="certificate3_image" class="hidden-image-input" onchange="previewImage(this)">
                            </label>
                        </div>
                        <div contentEditable="true" id="certificate3_description" class="editable-content"><?=$certificate3_description?></div>
                    <?php } else { ?>
                        <div class="mb-2">
                            <img src="<?=$certificate3_image?>" class="mx-auto" width="120px" height="120px" alt="">
                        </div>
                        <div><?=$certificate3_description?></div>
                    <?php } ?>
                </div>
            </div>

            <div class="col-md-3 mt-3">
                <div class="bg-light p-3 text-center h-100">
                    <?php if (!empty($page_contents_editable)) { ?>
                        <div class="mb-2">
                            <label for="certificate4_image" class="editable-content w-100">
                                <img src="<?=$certificate4_image?>" alt="">
                                <input type="file" id="certificate4_image" class="hidden-image-input" onchange="previewImage(this)">
                            </label>
                        </div>
                        <div contentEditable="true" id="certificate4_description" class="editable-content"><?=$certificate4_description?></div>
                    <?php } else { ?>
                        <div class="mb-2"><img src="<?=$certificate4_image?>" alt=""></div>
                        <div><?=$certificate4_description?></div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php if (!empty($list_of_clients)) { ?>
<section class="py-5" style="background-color: #FDF6F4;" id="Clientele">
    <div class="container">
        <div class="title2sec mb-4 fadeUp">
            <small>COMPANIES WHO TRUST US</small>
            <h2>Clientele</h2>
        </div>
        <div class="fadeUp">
            <div class="clientslogoslider">
                <?php foreach ($list_of_clients as $i => $client_details) { ?>
                    <div class="clientslogosec">
                        <div class="clientslogo">
                            <img class="" src="<?=base_url($client_details->image)?>" alt="">
                        </div>
                    </div>   
                <?php } ?>
            </div>
        </div>
    </div>
</section>
<?php } ?>

<?php if (!empty($page_contents_editable)) { ?>
<script>

    function get_rendered_CMS_page_content() {
        let CMS_page_content = new FormData();

        let HTML_content_ids = [
            "main_section_heading",
            "main_section_description",
            "top_section_description",
            "small_section1_heading",
            "small_section1_sub_heading",
            "small_section1_description",
            "small_section2_heading",
            "small_section2_sub_heading",
            "small_section2_description",
            "sub_section1_heading",
            "sub_section1_description",
            "sub_section2_heading",
            "sub_section2_description",
            "sub_section3_heading",
            "sub_section3_description",
            "sub_section4_heading",
            "sub_section4_description",
            "sub_section5_heading",
            "sub_section5_description",
            "sub_section6_heading",
            "sub_section6_description",
            "certificates_section_heading",
            "certificate1_description",
            "certificate2_description",
            "certificate3_description",
            "certificate4_description"
        ];
        HTML_content_ids.forEach((HTML_content_name, i) => {
            let HTML_content = $("#"+HTML_content_name).html();
            if (HTML_content) {
                CMS_page_content.append(HTML_content_name, HTML_content);
            }
        });

        let file_content_ids = [
            "top_section_image",
            "small_section1_image",
            "small_section2_image",
            "sub_section1_image",
            "sub_section2_image",
            "sub_section3_image",
            "sub_section4_image",
            "sub_section5_image",
            "sub_section6_image",
            "certificate1_image",
            "certificate2_image",
            "certificate3_image",
            "certificate4_image"
        ];
        file_content_ids.forEach((file_content_name, i) => {
            let file_contents = $("#"+file_content_name).prop("files");
            if (file_contents.length > 0) {
                CMS_page_content.append(file_content_name, file_contents[0]);
            }
        });

        return CMS_page_content;
    }

</script>
<?php } ?>