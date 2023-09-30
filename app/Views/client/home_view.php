<?php function render_rating_HTML($rating) {
    $rating_HTML = "";
    $full_star = "<i class='bi bi-star-fill text-warning'></i>";
    $half_star = "<i class='bi bi-star-half text-warning'></i>";

    $rating_array = explode(".", $rating);
    $value = $rating_array[0];
    $rem = (!empty($rating_array[1])) ? $rating_array[1] : 0;
    for ($i=1; $i<=$value; $i++) {
        $rating_HTML .= $full_star;
    }
    if ($rem > 0) {
        $rating_HTML .= $half_star;
    }

    return $rating_HTML;
}

if (!empty($page_contents->page_cms_contents)) {
    $CMS_contents = $page_contents->page_cms_contents;
    
    if (!empty($CMS_contents->certificates_section_heading)) {
        $certificates_section_heading = $CMS_contents->certificates_section_heading;
    } else {
        $certificates_section_heading = "";
    }

    if (!empty($CMS_contents->certificates_section_image)) {
        $certificates_section_image = base_url($CMS_contents->certificates_section_image);
    } else {
        $certificates_section_image = "";
    }

    if (!empty($CMS_contents->about_us_section_image)) {
        $about_us_section_image = base_url($CMS_contents->about_us_section_image);
    } else {
        $about_us_section_image = "";
    }

    if (!empty($CMS_contents->about_us_section_heading)) {
        $about_us_section_heading = $CMS_contents->about_us_section_heading;
    } else {
        $about_us_section_heading = "";
    }

    if (!empty($CMS_contents->about_us_section_description)) {
        $about_us_section_description = $CMS_contents->about_us_section_description;
    } else {
        $about_us_section_description = "";
    }

    if (!empty($CMS_contents->our_sustainability_section_image)) {
        $our_sustainability_section_image = base_url($CMS_contents->our_sustainability_section_image);
    } else {
        $our_sustainability_section_image = "";
    }

    if (!empty($CMS_contents->our_sustainability_section_heading)) {
        $our_sustainability_section_heading = $CMS_contents->our_sustainability_section_heading;
    } else {
        $our_sustainability_section_heading = "";
    }

    if (!empty($CMS_contents->our_sustainability_section_description)) {
        $our_sustainability_section_description = $CMS_contents->our_sustainability_section_description;
    } else {
        $our_sustainability_section_description = "";
    }

    if (!empty($CMS_contents->products_section_heading)) {
        $products_section_heading = $CMS_contents->products_section_heading;
    } else {
        $products_section_heading = "";
    }

    if (!empty($CMS_contents->products_sub_section1_heading)) {
        $products_sub_section1_heading = $CMS_contents->products_sub_section1_heading;
    } else {
        $products_sub_section1_heading = "";
    }

    if (!empty($CMS_contents->products_sub_section1_description)) {
        $products_sub_section1_description = $CMS_contents->products_sub_section1_description;
    } else {
        $products_sub_section1_description = "";
    }

    if (!empty($CMS_contents->products_sub_section1_image)) {
        $products_sub_section1_image = base_url($CMS_contents->products_sub_section1_image);
    } else {
        $products_sub_section1_image = "";
    }

    if (!empty($CMS_contents->products_sub_section2_heading)) {
        $products_sub_section2_heading = $CMS_contents->products_sub_section2_heading;
    } else {
        $products_sub_section2_heading = "";
    }

    if (!empty($CMS_contents->products_sub_section2_description)) {
        $products_sub_section2_description = $CMS_contents->products_sub_section2_description;
    } else {
        $products_sub_section2_description = "";
    }

    if (!empty($CMS_contents->products_sub_section2_image)) {
        $products_sub_section2_image = base_url($CMS_contents->products_sub_section2_image);
    } else {
        $products_sub_section2_image = "";
    }

    if (!empty($CMS_contents->products_sub_section3_heading)) {
        $products_sub_section3_heading = $CMS_contents->products_sub_section3_heading;
    } else {
        $products_sub_section1_heading = "";
    }

    if (!empty($CMS_contents->products_sub_section3_description)) {
        $products_sub_section3_description = $CMS_contents->products_sub_section3_description;
    } else {
        $products_sub_section3_description = "";
    }

    if (!empty($CMS_contents->products_sub_section3_image)) {
        $products_sub_section3_image = base_url($CMS_contents->products_sub_section3_image);
    } else {
        $products_sub_section3_image = "";
    }

    if (!empty($CMS_contents->products_sub_section4_heading)) {
        $products_sub_section4_heading = $CMS_contents->products_sub_section4_heading;
    } else {
        $products_sub_section4_heading = "";
    }

    if (!empty($CMS_contents->products_sub_section4_description)) {
        $products_sub_section4_description = $CMS_contents->products_sub_section4_description;
    } else {
        $products_sub_section4_description = "";
    }

    if (!empty($CMS_contents->products_sub_section4_image)) {
        $products_sub_section4_image = base_url($CMS_contents->products_sub_section4_image);
    } else {
        $products_sub_section4_image = "";
    }

    if (!empty($CMS_contents->products_sub_section5_heading)) {
        $products_sub_section5_heading = $CMS_contents->products_sub_section5_heading;
    } else {
        $products_sub_section5_heading = "";
    }

    if (!empty($CMS_contents->products_sub_section5_description)) {
        $products_sub_section5_description = $CMS_contents->products_sub_section5_description;
    } else {
        $products_sub_section5_description = "";
    }

    if (!empty($CMS_contents->products_sub_section5_image)) {
        $products_sub_section5_image = base_url($CMS_contents->products_sub_section5_image);
    } else {
        $products_sub_section5_image = "";
    }

}

if (!empty($contact_informations->office)) {
    $office_contact_info = $contact_informations->office;

    if (!empty($office_contact_info->company_name)) {
        $company_name = $office_contact_info->company_name;
    } else {
        $company_name = "";
    }

    if (!empty($office_contact_info->phone)) {
        $office_phone_number = $office_contact_info->phone;
    } else {
        $office_phone_number = "";
    }

    if (!empty($office_contact_info->email)) {
        $office_email_address = $office_contact_info->email;
    } else {
        $office_email_address = "";
    }

    if (!empty($office_contact_info->address)) {
        $office_address = $office_contact_info->address;
    } else {
        $office_address = "";
    }
}?>

<?php if (!empty($page_contents_editable)) {
    echo "<input type='hidden' id='CMS_page_id' value='".$page_id."'>";
}?>

<section class="homebanner position-relative">
    <?php if (!empty($list_of_banners)) { ?>
    <div class="homeslider text-white">
        <?php foreach ($list_of_banners as $i => $banner_details) { ?>
        <div class="homesliderinr" style="background-image:url(<?=base_url($banner_details->image)?>);">
            <?php if (!empty($banner_details->title) || !empty($banner_details->description)) { ?>
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-7 text-center text-md-start">
                        <div class="hmslidertxt fadeUp">
                            <h2 class="mb-3"><?=$banner_details->title?></h2>
                            <?=$banner_details->description?>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
        <?php } ?>
    </div>
    <?php } ?>

    <div class="bnrbtninfo text-center">
        <div class="container">
            <div class="row">
                <div class="col-4 fadeUp" style="background-color: #D75427;">
                    <a href="product-list.html" class="d-block py-4 text-white fw-bold h5 m-0">PRODUCTS</a>
                </div>
                <div class="col-4 fadeUp" style="background-color: #0D9AD7;">
                    <a href="career.html" class="d-block py-4 text-white fw-bold h5 m-0">CAREERS</a>
                </div>
                <div class="col-4 fadeUp" style="background-color: #D75427;">
                    <a href="contact.html" class="d-block py-4 text-white fw-bold h5 m-0">CONTACT US</a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="pt-5">
    <div class="container pt-5">
        <?php if (!empty($page_contents_editable)) { ?>
            <h2 contentEditable="true" id="certificates_section_heading" class="title1 text-center mb-5 fadeUp editable-content"><?=$certificates_section_heading?></h2>
            <div class="row justify-content-center">
                <div class="col-md-10 fadePopup">
                    <label for="certificates_section_image" class="editable-content w-100">
                        <img src="<?=$certificates_section_image?>" alt="" class="w-100">
                        <input type="file" id="certificates_section_image" class="hidden-image-input" onchange="previewImage(this)">
                    </label>
                </div>
            </div>
        <?php } else { ?>
            <h2 class="title1 text-center mb-5 fadeUp"><?=$certificates_section_heading?></h2>
            <div class="row justify-content-center">
                <div class="col-md-10 fadePopup">
                    <img src="<?=$certificates_section_image?>" alt="" class="w-100">
                </div>
            </div>
        <?php } ?>
    </div>
</section>

<section class="py-5" style="background-color: #FDF6F4;">
    <div class="container">
        <div class="row align-items-center">
            <?php if (!empty($page_contents_editable)) { ?>
                <div class="col-md-5">
                    <div class="fadePopup">
                        <label for="about_us_section_image" class="editable-content w-100">
                            <img src="<?=$about_us_section_image?>" alt="" class="w-100 rounded-lg">
                            <input type="file" id="about_us_section_image" class="hidden-image-input" onchange="previewImage(this)">
                        </label>
                    </div>
                </div>
                <div class="col-md-7 mt-4 mt-md-4 ps-lg-5">
                    <div class="title2sec mb-4 fadeUp">
                        <small>ABOUT US</small>
                        <h2 contentEditable="true" id="about_us_section_heading" class="editable-content"><?=$about_us_section_heading?></h2>
                    </div>
                    <div class="fadeUp linheight2">
                        <p contentEditable="true" id="about_us_section_description" class="editable-content"><?=$about_us_section_description?></p>
                    </div>
                    <div class="fadeUp">
                        <a href="about.html" class="btnred">
                            <span>READ MORE</span> 
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M5.5 5L11.7929 11.2929C12.1834 11.6834 12.1834 12.3166 11.7929 12.7071L5.5 19" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M13.5 5L19.7929 11.2929C20.1834 11.6834 20.1834 12.3166 19.7929 12.7071L13.5 19" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </a>
                    </div>
                </div>
                <div class="col-md-7 ps-lg-5">
                    <div class="title2sec mb-4 fadeUp">
                        <small>SUSTAINABILITY</small>
                        <h2 contentEditable="true" id="our_sustainability_section_heading" class="editable-content"><?=$our_sustainability_section_heading?></h2>
                    </div>
                    <div class="fadeUp linheight2">
                        <p contentEditable="true" id="our_sustainability_section_description" class="editable-content"><?=$our_sustainability_section_description?></p>
                    </div>
                </div>
                <div class="col-md-5 mt-4 mt-md-4">
                    <div class="fadePopup">
                        <label for="our_sustainability_section_image" class="editable-content w-100">
                            <img src="<?=$our_sustainability_section_image?>" alt="" class="w-100 rounded-lg">
                            <input type="file" id="our_sustainability_section_image" class="hidden-image-input" onchange="previewImage(this)">
                        </label>
                    </div>
                </div>
            <?php } else { ?>
                <div class="col-md-5">
                    <div class="fadePopup">
                        <img src="<?=$about_us_section_image?>" alt="" class="w-100 rounded-lg">
                    </div>
                </div>
                <div class="col-md-7 mt-4 mt-md-4 ps-lg-5">
                    <div class="title2sec mb-4 fadeUp">
                        <small>ABOUT US</small>
                        <h2><?=$about_us_section_heading?></h2>
                    </div>
                    <div class="fadeUp linheight2">
                        <p><?=$about_us_section_description?></p>
                    </div>
                    <div class="fadeUp">
                        <a href="about.html" class="btnred">
                            <span>READ MORE</span> 
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M5.5 5L11.7929 11.2929C12.1834 11.6834 12.1834 12.3166 11.7929 12.7071L5.5 19" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M13.5 5L19.7929 11.2929C20.1834 11.6834 20.1834 12.3166 19.7929 12.7071L13.5 19" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </a>
                    </div>
                </div>
                <div class="col-md-7 ps-lg-5">
                    <div class="title2sec mb-4 fadeUp">
                        <small>SUSTAINABILITY</small>
                        <h2><?=$our_sustainability_section_heading?></h2>
                    </div>
                    <div class="fadeUp linheight2">
                        <p><?=$our_sustainability_section_description?></p>
                    </div>
                    
                </div>
                <div class="col-md-5 mt-4 mt-md-4">
                    <div class="fadePopup">
                        <img src="<?=$our_sustainability_section_image?>" alt="" class="w-100 rounded-lg">
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>

<section class="pt-5 py-ms-5">
    <div class="container pb-md-5">
        <?php if (!empty($page_contents_editable)) { ?>
            <h2 contentEditable="true" id="products_section_heading" class="title1 text-center mb-5 fadeUp editable-content"><?=$products_section_heading?></h2>
        <?php } else { ?>
                <h2 class="title1 text-center mb-5 fadeUp"><?=$products_section_heading?></h2>
        <?php } ?>
        <div class="homeproductwrp pb-5">

            <div class="row align-items-center">
                <div class="col-md-6 homeprodcon">
                    <?php if (!empty($page_contents_editable)) { ?>
                        <h3 contentEditable="true" id="products_sub_section1_heading" class="mb-2 fadeUp editable-content"><?=$products_sub_section1_heading?></h3>
                        <div class="fadeUp linheight2">
                            <p contentEditable="true" id="products_sub_section1_description" class="editable-content"><?=$products_sub_section1_description?></p>
                        </div>
                    <?php } else { ?>
                        <h3 class="mb-2 fadeUp"><?=$products_sub_section1_heading?></h3>
                        <div class="fadeUp linheight2">
                            <p><?=$products_sub_section1_description?></p>
                        </div>
                    <?php } ?>
                    <div class="fadeUp">
                        <a href="food-packaging.html" class="btnred">
                            <span>LEARN MORE</span> 
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M5.5 5L11.7929 11.2929C12.1834 11.6834 12.1834 12.3166 11.7929 12.7071L5.5 19" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M13.5 5L19.7929 11.2929C20.1834 11.6834 20.1834 12.3166 19.7929 12.7071L13.5 19" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </a>
                    </div>
                </div>
                <div class="col-md-6 homeprodthmbwrp">
                    <?php if (!empty($page_contents_editable)) { ?>
                        <label for="products_sub_section1_image" class="editable-content w-100">
                            <img src="<?=$products_sub_section1_image?>" alt="" class="w-100 p-5 fadePopup">
                            <input type="file" id="products_sub_section1_image" class="hidden-image-input" onchange="previewImage(this)">
                        </label>
                    <?php } else { ?>
                        <img src="<?=$products_sub_section1_image?>" alt="" class="w-100 p-5 fadePopup">
                    <?php } ?>
                    <img src="<?=base_url('assets/client/images/product-shape.svg')?>" alt="" class="homeprodthmbbg">
                </div>
            </div>

            <div class="row align-items-center">
                <div class="col-md-6 homeprodcon">
                    <?php if (!empty($page_contents_editable)) { ?>
                        <h3 contentEditable="true" id="products_sub_section2_heading" class="mb-2 fadeUp editable-content"><?=$products_sub_section2_heading?></h3>
                        <div class="fadeUp linheight2">
                            <p contentEditable="true" id="products_sub_section2_description" class="editable-content"><?=$products_sub_section2_description?></p>
                        </div>
                    <?php } else { ?>
                        <h3 class="mb-2 fadeUp"><?=$products_sub_section2_heading?></h3>
                        <div class="fadeUp linheight2">
                            <p><?=$products_sub_section2_description?></p>
                        </div>
                    <?php } ?>
                    <div class="fadeUp">
                        <a href="beverages.html" class="btnred">
                            <span>LEARN MORE</span> 
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M5.5 5L11.7929 11.2929C12.1834 11.6834 12.1834 12.3166 11.7929 12.7071L5.5 19" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M13.5 5L19.7929 11.2929C20.1834 11.6834 20.1834 12.3166 19.7929 12.7071L13.5 19" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </a>
                    </div>
                </div>
                <div class="col-md-6 homeprodthmbwrp">
                    <?php if (!empty($page_contents_editable)) { ?>
                        <label for="products_sub_section2_image" class="editable-content w-100">
                            <img src="<?=$products_sub_section2_image?>" alt="" class="w-100 p-5 fadePopup">
                            <input type="file" id="products_sub_section2_image" class="hidden-image-input" onchange="previewImage(this)">
                        </label>
                    <?php } else { ?>
                        <img src="<?=$products_sub_section2_image?>" alt="" class="w-100 p-5 fadePopup">
                    <?php } ?>
                    <img src="<?=base_url('assets/client/images/product-shape.svg')?>" alt="" class="homeprodthmbbg">
                </div>
            </div>

            <div class="row align-items-center">
                <div class="col-md-6 homeprodcon">
                    <?php if (!empty($page_contents_editable)) { ?>
                        <h3 contentEditable="true" id="products_sub_section3_heading" class="mb-2 fadeUp editable-content"><?=$products_sub_section3_heading?></h3>
                        <div class="fadeUp linheight2">
                            <p contentEditable="true" id="products_sub_section3_description" class="editable-content"><?=$products_sub_section3_description?></p>
                        </div>
                    <?php } else { ?>
                        <h3 class="mb-2 fadeUp"><?=$products_sub_section3_heading?></h3>
                        <div class="fadeUp linheight2">
                            <p><?=$products_sub_section3_description?></p>
                        </div>
                    <?php } ?>
                    <div class="fadeUp">
                        <a href="liquid-packaging.html" class="btnred">
                            <span>LEARN MORE</span> 
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M5.5 5L11.7929 11.2929C12.1834 11.6834 12.1834 12.3166 11.7929 12.7071L5.5 19" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M13.5 5L19.7929 11.2929C20.1834 11.6834 20.1834 12.3166 19.7929 12.7071L13.5 19" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </a>
                    </div>
                </div>
                <div class="col-md-6 homeprodthmbwrp">
                    <?php if (!empty($page_contents_editable)) { ?>
                        <label for="products_sub_section3_image" class="editable-content w-100">
                            <img src="<?=$products_sub_section3_image?>" alt="" class="w-100 p-5 fadePopup">
                            <input type="file" id="products_sub_section3_image" class="hidden-image-input" onchange="previewImage(this)">
                        </label>
                    <?php } else { ?>
                        <img src="<?=$products_sub_section3_image?>" alt="" class="w-100 p-5 fadePopup">
                    <?php } ?>
                    <img src="<?=base_url('assets/client/images/product-shape.svg')?>" alt="" class="homeprodthmbbg">
                </div>
            </div>

            <div class="row align-items-center">
                <div class="col-md-6 homeprodcon">
                    <?php if (!empty($page_contents_editable)) { ?>
                        <h3 contentEditable="true" id="products_sub_section4_heading" class="mb-2 fadeUp editable-content"><?=$products_sub_section4_heading?></h3>
                        <div class="fadeUp linheight2">
                            <p contentEditable="true" id="products_sub_section4_description" class=" editable-content"><?=$products_sub_section4_description?></p>
                        </div>
                    <?php } else { ?>
                        <h3 class="mb-2 fadeUp"><?=$products_sub_section4_heading?></h3>
                        <div class="fadeUp linheight2">
                            <p><?=$products_sub_section4_description?></p>
                        </div>
                    <?php } ?>
                    <div class="fadeUp">
                        <a href="health-care-and-agriculture.html" class="btnred">
                            <span>LEARN MORE</span> 
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M5.5 5L11.7929 11.2929C12.1834 11.6834 12.1834 12.3166 11.7929 12.7071L5.5 19" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M13.5 5L19.7929 11.2929C20.1834 11.6834 20.1834 12.3166 19.7929 12.7071L13.5 19" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </a>
                    </div>
                </div>
                <div class="col-md-6 homeprodthmbwrp">
                    <?php if (!empty($page_contents_editable)) { ?>
                        <label for="products_sub_section4_image" class="editable-content w-100">
                            <img src="<?=$products_sub_section4_image?>" alt="" class="w-100 p-5 fadePopup">
                            <input type="file" id="products_sub_section4_image" class="hidden-image-input" onchange="previewImage(this)">
                        </label>
                    <?php } else { ?>
                        <img src="<?=$products_sub_section4_image?>" alt="" class="w-100 p-5 fadePopup">
                    <?php } ?>
                    <img src="<?=base_url('assets/client/images/product-shape.svg')?>" alt="" class="homeprodthmbbg">
                </div>
            </div>

            <div class="row align-items-center">
                <div class="col-md-6 homeprodcon">
                    <?php if (!empty($page_contents_editable)) { ?>
                        <h3 contentEditable="true" id="products_sub_section5_heading" class="mb-2 fadeUp editable-content"><?=$products_sub_section5_heading?></h3>
                        <div class="fadeUp linheight2">
                            <p contentEditable="true" id="products_sub_section5_description" class="editable-content"><?=$products_sub_section5_description?></p>
                        </div>
                    <?php } else { ?>
                        <h3 class="mb-2 fadeUp"><?=$products_sub_section5_heading?></h3>
                        <div class="fadeUp linheight2">
                            <p><?=$products_sub_section5_description?></p>
                        </div>
                    <?php } ?>
                    <div class="fadeUp">
                        <a href="personal-care-and-household.html" class="btnred">
                            <span>LEARN MORE</span> 
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M5.5 5L11.7929 11.2929C12.1834 11.6834 12.1834 12.3166 11.7929 12.7071L5.5 19" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M13.5 5L19.7929 11.2929C20.1834 11.6834 20.1834 12.3166 19.7929 12.7071L13.5 19" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </a>
                    </div>
                </div>
                <div class="col-md-6 homeprodthmbwrp">
                    <?php if (!empty($page_contents_editable)) { ?>
                        <label for="products_sub_section5_image" class="editable-content w-100">
                            <img src="<?=$products_sub_section5_image?>" alt="" class="w-100 p-5 fadePopup">
                            <input type="file" id="products_sub_section5_image" class="hidden-image-input" onchange="previewImage(this)">
                        </label>
                    <?php } else { ?>
                        <img src="<?=$products_sub_section5_image?>" alt="" class="w-100 p-5 fadePopup">
                    <?php } ?>
                    <img src="<?=base_url('assets/client/images/product-shape.svg')?>" alt="" class="homeprodthmbbg">
                </div>
            </div>
        </div>
    </div>
</section>

<?php if (!empty($list_of_clients)) { ?>
<section class="py-5" style="background-color: #FDF6F4;">
    <div class="container">
        <div class="title2sec mb-4 fadeUp">
            <small>COMPANIES WHO TRUST US</small>
            <h2>Our Top Clients</h2>
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

<section class="py-5 countsecwrp" style="background-color: #D75427;">
    <div class="container py-md-4">
        <div class="row align-itwems-center">
            <div class="col-md-6 col-lg-3 mb-4 mb-lg-0 fadeUp">
                <h2 class="m-0 text-white fw-bold h1">Achievement</h2>
            </div>
            <div class="col-md-6 col-lg-3 mb-4 mb-lg-0 fadeUp">
                <div class="d-flex align-items-center gap-3" id="counter-box">
                    <div class="countico">
                        <svg width="30" height="30" viewBox="0 0 32 32">
                            <g id="happy-face-svgrepo-com" transform="translate(-0.695 -0.695)">
                                <path id="Path_17" data-name="Path 17" d="M7.3,14a7.6,7.6,0,0,0,13.779.006" transform="translate(2.5 5.63)" fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                                <line id="Line_10" data-name="Line 10" transform="translate(11.695 11.695)" fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                                <line id="Line_11" data-name="Line 11" transform="translate(21.695 11.695)" fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                                <circle id="Ellipse_102" data-name="Ellipse 102" cx="15" cy="15" r="15" transform="translate(1.695 1.695)" fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                            </g>
                        </svg>
                    </div>
                    <div class="counttext">
                        <div class="text-white d-flex align-items-center countsec gap-1">
                            <span class="counter" data-number="250"></span>
                            <span>+</span>
                        </div>
                        <strong class="d-block text-white">Happy Clients</strong>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 mb-4 mb-lg-0 fadeUp">
                <div class="d-flex align-items-center gap-3" id="counter-box">
                    <div class="countico">
                        <svg width="30" height="30" viewBox="0 0 30.5 30.5">
                            <path id="box-svgrepo-com" d="M16.5,1.25a6.434,6.434,0,0,0-2.513.571c-.835.345-1.805.854-3.013,1.488L8.041,4.848c-1.482.778-2.669,1.4-3.585,2.012a6.784,6.784,0,0,0-2.212,2.2A7.146,7.146,0,0,0,1.361,12.1c-.111,1.128-.111,2.514-.111,4.259v.276c0,1.744,0,3.131.111,4.259a7.146,7.146,0,0,0,.884,3.038,6.784,6.784,0,0,0,2.212,2.2c.916.612,2.1,1.234,3.585,2.012l2.933,1.539c1.208.634,2.178,1.143,3.013,1.488a6.435,6.435,0,0,0,2.513.571,6.435,6.435,0,0,0,2.513-.571c.835-.345,1.805-.854,3.013-1.488l2.933-1.539c1.482-.778,2.669-1.4,3.585-2.012a6.783,6.783,0,0,0,2.212-2.2,7.147,7.147,0,0,0,.884-3.038c.111-1.128.111-2.514.111-4.258v-.277c0-1.744,0-3.131-.111-4.258a7.148,7.148,0,0,0-.884-3.038,6.784,6.784,0,0,0-2.212-2.2c-.916-.612-2.1-1.234-3.585-2.012L22.026,3.309c-1.208-.634-2.178-1.143-3.013-1.488A6.434,6.434,0,0,0,16.5,1.25ZM11.919,5.217c1.262-.662,2.147-1.125,2.881-1.429a4.349,4.349,0,0,1,1.7-.409,4.348,4.348,0,0,1,1.7.409c.735.3,1.619.767,2.881,1.429l2.837,1.489c1.546.811,2.632,1.383,3.443,1.925a6.6,6.6,0,0,1,.969.765l-4.725,2.362L11.548,5.411ZM9.329,6.576l-.247.129C7.536,7.517,6.45,8.088,5.639,8.63A6.59,6.59,0,0,0,4.67,9.4L16.5,15.311l4.763-2.381L9.621,6.8A1.062,1.062,0,0,1,9.329,6.576ZM3.644,11.262a7.993,7.993,0,0,0-.165,1.05c-.1,1.011-.1,2.293-.1,4.105v.166c0,1.812,0,3.094.1,4.105a5.063,5.063,0,0,0,.6,2.167,4.694,4.694,0,0,0,1.56,1.515c.811.542,1.9,1.113,3.443,1.925l2.837,1.489c1.262.662,2.147,1.125,2.881,1.429.232.1.442.173.636.233V17.158Zm13.92,18.184c.194-.06.4-.137.636-.233.735-.3,1.619-.767,2.881-1.429l2.837-1.489c1.546-.811,2.632-1.383,3.443-1.925a4.7,4.7,0,0,0,1.56-1.515,5.06,5.06,0,0,0,.6-2.167c.1-1.011.1-2.293.1-4.105v-.166c0-1.812,0-3.094-.1-4.105a7.982,7.982,0,0,0-.165-1.05l-4.7,2.349v4.308a1.064,1.064,0,1,1-2.128,0V14.675l-4.965,2.483Z" transform="translate(-1.25 -1.25)" fill="#fff" fill-rule="evenodd"/>
                        </svg>
                    </div>
                    <div class="counttext">
                        <div class="text-white d-flex align-items-center countsec gap-1">
                            <span class="counter" data-number="100"></span>
                            <span>+</span>
                        </div>
                        <strong class="d-block text-white">Top Products</strong>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 mb-4 mb-lg-0 fadeUp">
                <div class="d-flex align-items-center gap-3" id="counter-box">
                    <div class="countico">
                        <svg width="33.429" height="22.032" viewBox="0 0 33.429 22.032">
                            <path id="users-more-svgrepo-com_2_" data-name="users-more-svgrepo-com (2)" d="M3.857,25H1V23.572a5.717,5.717,0,0,1,4.286-5.534m2.857-4.71a4.288,4.288,0,0,1,0-8.084M29.572,25h2.857V23.572a5.717,5.717,0,0,0-4.286-5.534M25.286,5.244a4.288,4.288,0,0,1,0,8.084m-11.429,4.53h5.714a5.714,5.714,0,0,1,5.714,5.714V25H8.143V23.572A5.714,5.714,0,0,1,13.857,17.857ZM21,9.286A4.286,4.286,0,1,1,16.714,5,4.286,4.286,0,0,1,21,9.286Z" transform="translate(0 -3.968)" fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                        </svg>
                    </div>
                    <div class="counttext">
                        <div class="text-white d-flex align-items-center countsec gap-1">
                            <span class="counter" data-number="300"></span>
                            <span>+</span>
                        </div>
                        <strong class="d-block text-white">Workers Employed</strong>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php if (!empty($list_of_testimonials)) { ?>
<section class="py-5">
    <div class="container">
        <div class="title2sec mb-4 fadeUp">
            <small>TESTIMONIALS</small>
            <h2>What Our Clients Says About us</h2>
        </div>
        <div class="fadeUp">
            <div class="testislider">
                <?php foreach ($list_of_testimonials as $i => $testimonial_details) { ?>
                    <div class="m-3">
                        <div class="testithmb p-3 shadow rounded">
                            <div class="testimonial-message linheight2">
                                <p><?=$testimonial_details->testimonial?></p>
                            </div>
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-flex gap-3 align-items-center">
                                    <div class="testiimg rounded-pill">
                                        <img src="<?=base_url($testimonial_details->customer_image)?>" alt="">
                                    </div>
                                    <div class="testicon">
                                        <h3><?=$testimonial_details->customer_name?></h3>
                                        <div class="d-flex gap-1">
                                            <?php $rating_HTML = render_rating_HTML($testimonial_details->rating);
                                            echo $rating_HTML; ?>
                                        </div>
                                    </div>
                                </div>
                                <svg height="35px" width="35px" version="1.1" id="_x32_" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512"  xml:space="preserve">
                                    <path fill="#cccccc" d="M119.472,66.59C53.489,66.59,0,120.094,0,186.1c0,65.983,53.489,119.487,119.472,119.487
                                c0,0-0.578,44.392-36.642,108.284c-4.006,12.802,3.135,26.435,15.945,30.418c9.089,2.859,18.653,0.08,24.829-6.389
                                c82.925-90.7,115.385-197.448,115.385-251.8C238.989,120.094,185.501,66.59,119.472,66.59z"/>
                                    <path fill="#cccccc" d="M392.482,66.59c-65.983,0-119.472,53.505-119.472,119.51c0,65.983,53.489,119.487,119.472,119.487
                                c0,0-0.578,44.392-36.642,108.284c-4.006,12.802,3.136,26.435,15.945,30.418c9.089,2.859,18.653,0.08,24.828-6.389
                                C479.539,347.2,512,240.452,512,186.1C512,120.094,458.511,66.59,392.482,66.59z"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</section>
<?php } ?>

<section class="contactsec py-5 overflow-hidden leftSlide" style="
background-image: url(<?=base_url('assets/client/images/contact-bg-min.jpg')?>); 
background-size: cover; 
background-repeat: no-repeat;">
    <div class="container">
        <div class="row">
            <div class="col-md-6 text-white fadeLeft">
                <h2 class="title1 text-white">Contact Us</h2>
                <big class="d-block mb-4 text-white"><?=$company_name?></big>
                <div class="contactfiledwrp mb-4">
                    <a href="tel:<?=$office_phone_number?>" class="d-flex align-items-center gap-3 mb-3 text-white">
                        <div class="contactico">
                            <svg width="14" height="20" viewBox="0 0 14 20">
                                <g id="mobile-svgrepo-com" transform="translate(-5 -2)">
                                    <path id="Path_1" data-name="Path 1" d="M6,7c0-1.886,0-2.828.586-3.414S8.114,3,10,3h4c1.886,0,2.828,0,3.414.586S18,5.114,18,7V17c0,1.886,0,2.828-.586,3.414S15.886,21,14,21H10c-1.886,0-2.828,0-3.414-.586S6,18.886,6,17V7Z" fill="none" stroke="#0face7" stroke-linejoin="round" stroke-width="2"/>
                                    <path id="Path_2" data-name="Path 2" d="M11.5,18h1" fill="none" stroke="#0face7" stroke-linecap="round" stroke-width="2"/>
                                </g>
                            </svg>
                        </div>
                        <span><?=$office_phone_number?></span>
                    </a>
                    <a href="mailto:<?=$office_email_address?>" class="d-flex align-items-center gap-3 mb-3 text-white">
                        <div class="contactico">
                            <svg width="18" height="16" viewBox="0 0 21.5 18.5">
                                <g id="style_fill" data-name="style=fill" transform="translate(-1.25 -2.75)">
                                    <g id="email">
                                    <path id="Subtract" d="M7,2.75A5.916,5.916,0,0,0,2.865,4.138,5.7,5.7,0,0,0,1.25,8.5v7a5.7,5.7,0,0,0,1.615,4.362A5.916,5.916,0,0,0,7,21.25H17a5.916,5.916,0,0,0,4.135-1.388A5.7,5.7,0,0,0,22.75,15.5v-7a5.7,5.7,0,0,0-1.615-4.362A5.916,5.916,0,0,0,17,2.75ZM19.229,8.362a.75.75,0,0,0-.917-1.187l-5.547,4.286a1.25,1.25,0,0,1-1.529,0L5.689,7.175a.75.75,0,1,0-.917,1.187l5.547,4.286a2.75,2.75,0,0,0,3.363,0Z" fill="#07a3e0" fill-rule="evenodd"/>
                                    </g>
                                </g>
                            </svg>
                        </div>
                        <span><?=$office_email_address?></span>
                    </a>
                    <a href="https://goo.gl/maps/L7P3zgMmCfH8dumm6" target="_blank" class="d-flex align-items-center gap-3 mb-3 text-white">
                        <div class="contactico">
                            <svg width="18" height="20" viewBox="0 0 17.75 20.5">
                                <path id="location-svgrepo-com" d="M20.621,8.45A8.626,8.626,0,0,0,12,1.75h-.01a8.624,8.624,0,0,0-8.62,6.69c-1.17,5.16,1.99,9.53,4.85,12.28a5.422,5.422,0,0,0,7.55,0C18.631,17.97,21.791,13.61,20.621,8.45ZM12,13.46a3.15,3.15,0,1,1,3.15-3.15A3.15,3.15,0,0,1,12,13.46Z" transform="translate(-3.121 -1.75)" fill="#07a3e0"/>
                            </svg>
                        </div>
                        <span><?=$office_address?></span>
                    </a>
                </div>
                <div class="socblack d-flex gap-3 align-items-center">
                    <a href="" target="_blank">
                        <svg id="XMLID_834_" width="9" height="18" viewBox="0 0 10.5 20.786">
                            <path id="XMLID_835_" d="M77.038,11.07h2.278v9.38a.335.335,0,0,0,.335.335h3.863a.335.335,0,0,0,.335-.335V11.115H86.47a.335.335,0,0,0,.333-.3l.4-3.453a.335.335,0,0,0-.333-.374H83.851V4.826c0-.653.351-.983,1.044-.983h1.973a.335.335,0,0,0,.335-.335V.338A.335.335,0,0,0,86.867,0H84.149c-.019,0-.062,0-.125,0a5.209,5.209,0,0,0-3.406,1.284A3.572,3.572,0,0,0,79.43,4.459V6.991H77.038a.335.335,0,0,0-.335.335v3.409A.335.335,0,0,0,77.038,11.07Z" transform="translate(-76.703 0)" fill="#fff"/>
                        </svg>
                    </a>
                    <a href="" target="_blank">
                        <svg id="XMLID_826_" width="18" height="16" viewBox="0 0 24.45 20.018">
                            <path id="XMLID_827_" d="M23.894,30.407a9.269,9.269,0,0,1-1.183.431,5.227,5.227,0,0,0,1.064-1.872.394.394,0,0,0-.577-.459,9.306,9.306,0,0,1-2.751,1.087,5.251,5.251,0,0,0-8.923,3.751,5.354,5.354,0,0,0,.043.678,13.438,13.438,0,0,1-9.223-4.893.394.394,0,0,0-.646.051,5.256,5.256,0,0,0,.538,6.041,4.447,4.447,0,0,1-.7-.314.394.394,0,0,0-.586.336c0,.023,0,.047,0,.07a5.267,5.267,0,0,0,2.569,4.514c-.133-.013-.267-.033-.4-.058a.394.394,0,0,0-.449.508A5.247,5.247,0,0,0,6.514,43.8,9.286,9.286,0,0,1,1.55,45.213a9.5,9.5,0,0,1-1.112-.065.394.394,0,0,0-.259.724,14.155,14.155,0,0,0,7.654,2.244,13.617,13.617,0,0,0,10.55-4.634,14.688,14.688,0,0,0,3.656-9.572c0-.144,0-.289-.007-.434a10.2,10.2,0,0,0,2.348-2.487.394.394,0,0,0-.488-.58Z" transform="translate(0.002 -28.097)" fill="#fff"/>
                        </svg>
                    </a>
                    <a href="" target="_blank">
                        <svg width="17" height="17" viewBox="0 0 21 22">
                            <g id="instagram-svgrepo-com_1_" data-name="instagram-svgrepo-com (1)" transform="translate(0.569 1.159)">
                                <rect id="Rectangle_213" data-name="Rectangle 213" width="19" height="20" rx="5" transform="translate(0.431 -0.159)" fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                                <path id="Path_102" data-name="Path 102" d="M15.874,11.316A3.937,3.937,0,1,1,12.557,8,3.937,3.937,0,0,1,15.874,11.316Z" transform="translate(-2.096 -2.234)" fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                                <line id="Line_30" data-name="Line 30" x2="0.01" transform="translate(15.255 4.289)" fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                            </g>
                        </svg>
                    </a>
                    <a href="" target="_blank">
                        <svg id="XMLID_822_" width="20" height="15" viewBox="0 0 27.065 19.047">
                            <path id="XMLID_823_" d="M26.01,47.552c-.977-1.161-2.781-1.635-6.225-1.635H7.28c-3.524,0-5.358.5-6.331,1.741C0,48.863,0,50.64,0,53.1v4.686c0,4.763,1.126,7.181,7.28,7.181h12.5c2.987,0,4.643-.418,5.714-1.443,1.1-1.051,1.567-2.767,1.567-5.738V53.1C27.065,50.505,26.992,48.719,26.01,47.552Zm-8.634,8.536L11.7,59.055a.873.873,0,0,1-1.277-.774V52.365A.873.873,0,0,1,11.7,51.59l5.678,2.949a.873.873,0,0,1,0,1.549Z" transform="translate(0 -45.917)" fill="#fff"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<?php if (!empty($page_contents_editable)) { ?>
<script>

    function get_rendered_CMS_page_content() {
        let CMS_page_content = new FormData();

        let text_content_ids = [
            "certificates_section_heading",
            "about_us_section_heading",
            "about_us_section_description",
            "our_sustainability_section_heading",
            "our_sustainability_section_description",
            "products_section_heading",
            "products_sub_section1_heading",
            "products_sub_section1_description",
            "products_sub_section2_heading",
            "products_sub_section2_description",
            "products_sub_section3_heading",
            "products_sub_section3_description",
            "products_sub_section4_heading",
            "products_sub_section4_description",
            "products_sub_section5_heading",
            "products_sub_section5_description"
        ];
        text_content_ids.forEach((text_content_name, i) => {
            let text_content = $("#"+text_content_name).text().trim();
            if (text_content) {
                CMS_page_content.append(text_content_name, text_content);
            }
        });

        let file_content_ids = [
            "certificates_section_image",
            "about_us_section_image",
            "our_sustainability_section_image",
            "products_sub_section1_image",
            "products_sub_section2_image",
            "products_sub_section3_image",
            "products_sub_section4_image",
            "products_sub_section5_image"
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