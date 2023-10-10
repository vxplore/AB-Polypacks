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
            <h2 contentEditable="true" id="main_section_heading" class="text-center mb-3 fadeUp editable-content">About AB Polypacks</h2>
            <div class="row justify-content-center mb-3 fadeUp">
                <div class="col-md-8">
                    <big contentEditable="true" id="main_section_description" class="d-block text-center editable-content">Over the last decade and a half, A B Polypacks has established itself as a reliable business partner for Brand owners for all their flexible packaging needs.</big>
                </div>
            </div>
        <?php } else { ?>
            <h2 class="text-center mb-3 fadeUp">About AB Polypacks</h2>
            <div class="row justify-content-center mb-3 fadeUp">
                <div class="col-md-8">
                    <big class="d-block text-center">Over the last decade and a half, A B Polypacks has established itself as a reliable business partner for Brand owners for all their flexible packaging needs.</big>
                </div>
            </div>
        <?php } ?>

        <div class="row align-items-center">
            <?php if (!empty($page_contents_editable)) { ?>
                <div contentEditable="true" id="top_section_description" class="col-md-6 fadeLeft editable-content">
                    <p>Today, A B polypacks is a “one stop shop” for different kind of packaging solutions that boasts of a manufacturing capacity of 1500 MT and a responsible workforce that works towards value creation and customer satisfaction.</p>
                        <p>
                        We provide a wide range of flexible packaging solutions that include Collation Shrink Films, Shrink Labels, Wrap Around Labels, Laminates, All kinds of Pouches, and all these under one roof.</p>
                        <p>
                        With a state of the art, fully integrated Manufacturing facility located at Howrah and a team that is highly skilled, A B Polypacks provides end to end packaging solutions, from just a thought of the product to the supermarket we are there for our customers.</p>
                        <p>
                        With our technical expertise and qualitative superiority our customers enjoy the benefits of great aesthetics, reliable shelf life and tension free transportation of their products.</p>
                        <p>
                        Today, we are proud to be partners of some of the biggest brands in both global and Indian Market like Coca-Cola, Britannia, Parle Agro, Haldiram’s, Pidilite Industries etc.
                        <p>
                        Our commitment to supply quality products is recognized and certified under BRCS, ISO 9001 - 2015 and FSSC 22000.</p>
                        <p>
                        Our greatest resource, i.e., “Human Resource” is provided with a safe and secure work environment, where progressive ideas are welcomed and innovative mindset takes the front seat.</p>
                </div>
                <div class="col-md-6 p-3 fadePopup">
                    <label for="top_section_image" class="editable-content w-100">
                        <img src="<?=base_url('assets/client/images/about-thmb.jpg')?>" alt="" class="w-100">
                        <input type="file" id="top_section_image" class="hidden-image-input" onchange="previewImage(this)">
                    </label>
                </div>
            <?php } else { ?>
                <div class="col-md-6 fadeLeft">
                    <p>Today, A B polypacks is a “one stop shop” for different kind of packaging solutions that boasts of a manufacturing capacity of 1500 MT and a responsible workforce that works towards value creation and customer satisfaction.</p>
                        <p>
                        We provide a wide range of flexible packaging solutions that include Collation Shrink Films, Shrink Labels, Wrap Around Labels, Laminates, All kinds of Pouches, and all these under one roof.</p>
                        <p>
                        With a state of the art, fully integrated Manufacturing facility located at Howrah and a team that is highly skilled, A B Polypacks provides end to end packaging solutions, from just a thought of the product to the supermarket we are there for our customers.</p>
                        <p>
                        With our technical expertise and qualitative superiority our customers enjoy the benefits of great aesthetics, reliable shelf life and tension free transportation of their products.</p>
                        <p>
                        Today, we are proud to be partners of some of the biggest brands in both global and Indian Market like Coca-Cola, Britannia, Parle Agro, Haldiram’s, Pidilite Industries etc.
                        <p>
                        Our commitment to supply quality products is recognized and certified under BRCS, ISO 9001 - 2015 and FSSC 22000.</p>
                        <p>
                        Our greatest resource, i.e., “Human Resource” is provided with a safe and secure work environment, where progressive ideas are welcomed and innovative mindset takes the front seat.</p>
                </div>
                <div class="col-md-6 p-3 fadePopup">
                    <img src="<?=base_url('assets/client/images/about-thmb.jpg')?>" alt="" class="w-100">
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
                    <img src="<?=base_url('assets/client/images/Mission.jpg')?>" alt="" class="w-100 fadePopup">
                    <input type="file" id="small_section1_image" class="hidden-image-input" onchange="previewImage(this)">
                </label>
            </div>
            <div class="col-md-3 p-4">
                <h3 contentEditable="true" id="small_section1_heading" class="mb-2 fadeUp editable-content">Our Mission</h3>
                <big contentEditable="true" id="small_section1_sub_heading" class="d-block mb-2 fadeUp editable-content">Our Indomitable Spirit to thrive for Excellence</big>
                <p contentEditable="true" id="small_section1_description" class="fadeUp p-0 editable-content">To be the most preferred supplier of consistent quality in packaging printing , an innovative and cost effective flexible packaging solution provider.</p>
            </div>

            <div class="col-md-3 p-0">
                <label for="small_section2_image" class="editable-content w-100">
                    <img src="<?=base_url('assets/client/images/Vision.jpg')?>" alt="" class="w-100 fadePopup">
                    <input type="file" id="small_section2_image" class="hidden-image-input" onchange="previewImage(this)">
                </label>
            </div>
            <div class="col-md-3 p-4">
                <h3 contentEditable="true" id="small_section2_heading" class="mb-2 fadeUp editable-content">Our Vision</h3>
                <big contentEditable="true" id="small_section2_sub_heading" class="d-block mb-2 fadeUp editable-content">The Vision for the company and strategy for achieving the Vision , are well articulated.</big>
                <p contentEditable="true" id="small_section2_description" class="fadeUp p-0 editable-content">To be the preferred packaging partner for brands that are a part of daily life across the globe.</p>
            </div>
        <?php } else { ?>
            <div class="col-md-3 p-0">
                <img src="<?=base_url('assets/client/images/Mission.jpg')?>" alt="" class="w-100 fadePopup">
            </div>
            <div class="col-md-3 p-4">
                <h3 class="mb-2 fadeUp">Our Mission</h3>
                <big class="d-block mb-2 fadeUp">Our Indomitable Spirit to thrive for Excellence</big>
                <p class="fadeUp p-0">To be the most preferred supplier of consistent quality in packaging printing , an innovative and cost effective flexible packaging solution provider.</p>
            </div>

            <div class="col-md-3 p-0">
                <img src="<?=base_url('assets/client/images/Vision.jpg')?>" alt="" class="w-100 fadePopup">
            </div>
            <div class="col-md-3 p-4">
                <h3 class="mb-2 fadeUp">Our Vision</h3>
                <big class="d-block mb-2 fadeUp">The Vision for the company and strategy for achieving the Vision , are well articulated.</big>
                <p class="fadeUp p-0">To be the preferred packaging partner for brands that are a part of daily life across the globe.</p>
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
                        <img src="<?=base_url('assets/client/images/INTEGRITY.jpg')?>" alt="" class="w-100">
                        <input type="file" id="sub_section1_image" class="hidden-image-input" onchange="previewImage(this)">
                    </label>
                </div>
                <div class="col-md-6 p-3 p-md-5 fadeUp">
                    <h3 contentEditable="true" id="sub_section1_heading" class="mb-3 editable-content">INTEGRITY</h3>
                    <div contentEditable="true" id="sub_section1_description" class="editable-content">
                        <p>With a Manufacturing facility that is spread over 1.5 Lakh Sq. Ft. we boast of quality as well as quantity, which adds to our reliability even more. Moreover, we possess World’s Best machine…</p>
                    </div>
                </div>
            <?php } else { ?>
                <div class="col-md-6 p-0 fadeUp">
                    <img src="<?=base_url('assets/client/images/INTEGRITY.jpg')?>" alt="" class="w-100">
                </div>
                <div class="col-md-6 p-3 p-md-5 fadeUp">
                    <h3 class="mb-3">INTEGRITY</h3>
                    <div>
                        <p>With a Manufacturing facility that is spread over 1.5 Lakh Sq. Ft. we boast of quality as well as quantity, which adds to our reliability even more. Moreover, we possess World’s Best machine…</p>
                    </div>
                </div>
            <?php } ?>
        </div>

        <div class="row m-0 flex-row-reverse bg-white align-items-center" id="TeamWork">
            <?php if (!empty($page_contents_editable)) { ?>
                <div class="col-md-6 p-0 fadeUp">
                    <label for="sub_section2_image" class="editable-content w-100">
                        <img src="<?=base_url('assets/client/images/team.jpg')?>" alt="" class="w-100">
                        <input type="file" id="sub_section2_image" class="hidden-image-input" onchange="previewImage(this)">
                    </label>
                </div>
                <div class="col-md-6 p-3 p-md-5 fadeUp">
                    <h3 contentEditable="true" id="sub_section2_heading" class="mb-3 editable-content">TEAM WORK</h3>
                    <div contentEditable="true" id="sub_section2_description" class="editable-content">
                        <p>With a Manufacturing facility that is spread over 1.5 Lakh Sq. Ft. we boast of quality as well as quantity, which adds to our reliability even more. Moreover, we possess World’s Best machines…..</p>
                    </div>
                </div>
            <?php } else { ?>
                <div class="col-md-6 p-0 fadeUp">
                    <img src="<?=base_url('assets/client/images/team.jpg')?>" alt="" class="w-100">
                </div>
                <div class="col-md-6 p-3 p-md-5 fadeUp">
                    <h3 class="mb-3">TEAM WORK</h3>
                    <div>
                        <p>With a Manufacturing facility that is spread over 1.5 Lakh Sq. Ft. we boast of quality as well as quantity, which adds to our reliability even more. Moreover, we possess World’s Best machines…..</p>
                    </div>
                </div>
            <?php } ?>
        </div>

        <div class="row m-0 bg-white align-items-center" id="SafetyMeasures">
            <?php if (!empty($page_contents_editable)) { ?>
                <div class="col-md-6 p-0 fadeUp">
                    <label for="sub_section3_image" class="editable-content w-100">
                        <img src="<?=base_url('assets/client/images/safety.jpg')?>" alt="" class="w-100">
                        <input type="file" id="sub_section3_image" class="hidden-image-input" onchange="previewImage(this)">
                    </label>
                </div>
                <div class="col-md-6 p-3 p-md-5 fadeUp">
                    <h3 contentEditable="true" id="sub_section3_heading" class="mb-3 editable-content">SAFETY MEASURES</h3>
                    <div contentEditable="true" id="sub_section3_description" class="editable-content">
                        <p>“Safety First” is not just a proverb for us but a way of life. We have structured our work culture in a way in which the safety of all our Human Resource is very well thought through and proper safety guidelines are predefined.</p>
                        
                        <p>Various safety drills and trainings are conducted at regular intervals to make our Human Resource ready for any untoward situation.</p>
                    </div>
                </div>
            <?php } else { ?>
                <div class="col-md-6 p-0 fadeUp">
                    <img src="<?=base_url('assets/client/images/safety.jpg')?>" alt="" class="w-100">
                </div>
                <div class="col-md-6 p-3 p-md-5 fadeUp">
                    <h3 class="mb-3">SAFETY MEASURES</h3>
                    <div>
                        <p>“Safety First” is not just a proverb for us but a way of life. We have structured our work culture in a way in which the safety of all our Human Resource is very well thought through and proper safety guidelines are predefined.</p>
                        
                        <p>Various safety drills and trainings are conducted at regular intervals to make our Human Resource ready for any untoward situation.</p>
                    </div>
                </div>
            <?php } ?>
        </div>

        <div class="row m-0 flex-row-reverse bg-white align-items-center" id="CustomerSatisfaction">
            <?php if (!empty($page_contents_editable)) { ?>
                <div class="col-md-6 p-0 fadeUp">
                    <label for="sub_section4_image" class="editable-content w-100">
                        <img src="<?=base_url('assets/client/images/customer-experience.jpg')?>" alt="" class="w-100">
                        <input type="file" id="sub_section4_image" class="hidden-image-input" onchange="previewImage(this)">
                    </label>
                </div>
                <div class="col-md-6 p-3 p-md-5 fadeUp">
                    <h3 contentEditable="true" id="sub_section4_heading" class="mb-3 editable-content">CUSTOMER SATISFACTIONS</h3>
                    <div contentEditable="true" id="sub_section4_description" class="editable-content">
                        <p>With a Manufacturing facility that is spread over 1.5 Lakh Sq. Ft. we boast of quality as well as quantity, which adds to our reliability even more. Moreover, we possess World’s Best machines…</p>
                    </div>
                </div>
            <?php } else { ?>
                <div class="col-md-6 p-0 fadeUp">
                    <img src="<?=base_url('assets/client/images/customer-experience.jpg')?>" alt="" class="w-100">
                </div>
                <div class="col-md-6 p-3 p-md-5 fadeUp">
                    <h3 class="mb-3">CUSTOMER SATISFACTIONS</h3>
                    <div>
                        <p>With a Manufacturing facility that is spread over 1.5 Lakh Sq. Ft. we boast of quality as well as quantity, which adds to our reliability even more. Moreover, we possess World’s Best machines…</p>
                    </div>
                </div>
            <?php } ?>
        </div>

        <div class="row m-0 bg-white align-items-center" id="QualityPolicy">
            <?php if (!empty($page_contents_editable)) { ?>
                <div class="col-md-6 p-0 fadeUp">
                    <label for="sub_section5_image" class="editable-content w-100">
                        <img src="<?=base_url('assets/client/images/quality.jpg')?>" alt="" class="w-100">
                        <input type="file" id="sub_section5_image" class="hidden-image-input" onchange="previewImage(this)">
                    </label>
                </div>
                <div class="col-md-6 p-3 p-md-5 fadeUp">
                    <h3 contentEditable="true" id="sub_section5_heading" class="mb-3 editable-content">QUALITY POLICY</h3>
                    <div contentEditable="true" id="sub_section5_description" class="editable-content">
                        <p>At AB Polypacks, we take stringent quality control measures, which enables us to deliver high quality products to our customers.</p>
                        <p>In order to eliminate the slightest of errors, our dedicated and proactive QA team conducts micro and macro level quality tests at every stage of the production process which results in reliable and sustainable products.</p>
                    </div>
                </div>
            <?php } else { ?>
                <div class="col-md-6 p-0 fadeUp">
                    <img src="<?=base_url('assets/client/images/quality.jpg')?>" alt="" class="w-100">
                </div>
                <div class="col-md-6 p-3 p-md-5 fadeUp">
                    <h3 class="mb-3">QUALITY POLICY</h3>
                    <div>
                        <p>At AB Polypacks, we take stringent quality control measures, which enables us to deliver high quality products to our customers.</p>
                        <p>In order to eliminate the slightest of errors, our dedicated and proactive QA team conducts micro and macro level quality tests at every stage of the production process which results in reliable and sustainable products.</p>
                    </div>
                </div>
            <?php } ?>
        </div>

        <div class="row m-0 flex-row-reverse bg-white align-items-center" id="Sustainability">
            <?php if (!empty($page_contents_editable)) { ?>
                <div class="col-md-6 p-0 fadeUp">
                    <label for="sub_section6_image" class="editable-content w-100">
                        <img src="<?=base_url('assets/client/images/SUSTAINABILITY.jpg')?>" alt="" class="w-100">
                        <input type="file" id="sub_section6_image" class="hidden-image-input" onchange="previewImage(this)">
                    </label>
                </div>
                <div class="col-md-6 p-3 p-md-5 fadeUp">
                    <h3 contentEditable="true" id="sub_section6_heading" class="mb-3 editable-content">SUSTAINABILITY</h3>
                    <div contentEditable="true" id="sub_section6_description" class="editable-content">
                        <p>With a Manufacturing facility that is spread over 1.5 Lakh Sq. Ft. we boast of quality as well as quantity, which adds to our reliability even more. Moreover, we possess World’s Best machines.</p>
                    </div>
                </div>
            <?php } else { ?>
                <div class="col-md-6 p-0 fadeUp">
                    <img src="<?=base_url('assets/client/images/SUSTAINABILITY.jpg')?>" alt="" class="w-100">
                </div>
                <div class="col-md-6 p-3 p-md-5 fadeUp">
                    <h3 class="mb-3">SUSTAINABILITY</h3>
                    <div>
                        <p>With a Manufacturing facility that is spread over 1.5 Lakh Sq. Ft. we boast of quality as well as quantity, which adds to our reliability even more. Moreover, we possess World’s Best machines.</p>
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
                <h2 contentEditable="true" id="certificates_section_heading" class="editable-content">Certification</h2>
            <?php } else { ?>
                <h2>Certification</h2>
            <?php } ?>
        </div>

        <div class="row">
            <div class="col-md-3 mt-3">
                <div class="bg-light p-3 text-center h-100">
                    <?php if (!empty($page_contents_editable)) { ?>
                        <div class="mb-2">
                            <label for="certificate1_image" class="editable-content w-100">
                                <img src="<?=base_url('assets/client/images/iso.png')?>" class="mx-auto" width="120px" height="120px" alt="">
                                <input type="file" id="certificate1_image" class="hidden-image-input" onchange="previewImage(this)">
                            </label>
                        </div>
                        <div contentEditable="true" id="certificate1_description" class="editable-content">A B Polypacks is certified as an ISO 9001:2015 company</div>
                    <?php } else { ?>
                        <div class="mb-2">
                            <img src="<?=base_url('assets/client/images/iso.png')?>" class="mx-auto" width="120px" height="120px" alt="">
                        </div>
                        <div>A B Polypacks is certified as an ISO 9001:2015 company</div>
                    <?php } ?>
                </div>
            </div>

            <div class="col-md-3 mt-3">
                <div class="bg-light p-3 text-center h-100">
                    <?php if (!empty($page_contents_editable)) { ?>
                        <div class="mb-2">
                            <label for="certificate2_image" class="editable-content w-100">
                                <img src="<?=base_url('assets/client/images/brc.png')?>" class="mx-auto" width="120px" height="120px" alt="">
                                <input type="file" id="certificate2_image" class="hidden-image-input" onchange="previewImage(this)">
                            </label>
                        </div>
                        <div contentEditable="true" id="certificate2_description" class="editable-content">Our packaging manufacturing processes are certified by BRC (British Retail Consortium) for food, quality and safety standards developed by British retailers.</div>
                    <?php } else { ?>
                        <div class="mb-2">
                            <img src="<?=base_url('assets/client/images/brc.png')?>" class="mx-auto" width="120px" height="120px" alt="">
                        </div>
                        <div>Our packaging manufacturing processes are certified by BRC (British Retail Consortium) for food, quality and safety standards developed by British retailers.</div>
                    <?php } ?>
                </div>
            </div>

            <div class="col-md-3 mt-3">
                <div class="bg-light p-3 text-center h-100">
                    <?php if (!empty($page_contents_editable)) { ?>
                        <div class="mb-2">
                            <label for="certificate3_image" class="editable-content w-100">
                                <img src="<?=base_url('assets/client/images/fssc.jpg')?>" class="mx-auto" width="120px" height="120px" alt="">
                                <input type="file" id="certificate3_image" class="hidden-image-input" onchange="previewImage(this)">
                            </label>
                        </div>
                        <div contentEditable="true" id="certificate3_description" class="editable-content">We are also certified by the scheme for food safety management systems known as FSSC 22000</div>
                    <?php } else { ?>
                        <div class="mb-2">
                            <img src="<?=base_url('assets/client/images/fssc.jpg')?>" class="mx-auto" width="120px" height="120px" alt="">
                        </div>
                        <div>We are also certified by the scheme for food safety management systems known as FSSC 22000</div>
                    <?php } ?>
                </div>
            </div>

            <div class="col-md-3 mt-3">
                <div class="bg-light p-3 text-center h-100">
                    <?php if (!empty($page_contents_editable)) { ?>
                        <div class="mb-2">
                            <label for="certificate4_image" class="editable-content w-100">
                                <img src="<?=base_url('assets/client/images/hse.png')?>" alt="">
                                <input type="file" id="certificate4_image" class="hidden-image-input" onchange="previewImage(this)">
                            </label>
                        </div>
                        <div contentEditable="true" id="certificate4_description" class="editable-content">Our safety standards have been certified by SGP &amp; URSA</div>
                    <?php } else { ?>
                        <div class="mb-2"><img src="<?=base_url('assets/client/images/hse.png')?>" alt=""></div>
                        <div>Our safety standards have been certified by SGP &amp; URSA</div>
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