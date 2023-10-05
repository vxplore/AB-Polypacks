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

} 

if (!empty($contact_informations)) {
    foreach ($contact_informations as $i => $details) {
        if ($details->type == "OFFICE") {
            if (!empty($details->address)) {
                $office_address = $details->address;
            } else {
                $office_address = "";
            }

            if (!empty($details->phone)) {
                $office_phone_number = $details->phone;
            } else {
                $office_phone_number = "";
            }

            if (!empty($details->landline)) {
                $office_landline_number = $details->landline;
            } else {
                $office_landline_number = "";
            }

            if (!empty($details->email)) {
                $office_email_address = $details->email;
            } else {
                $office_email_address = "";
            }

            if (!empty($details->map_embeded_link)) {
                $office_map_embeded_link = $details->map_embeded_link;
            } else {
                $office_map_embeded_link = "";
            }
        }
        else if ($details->type == "FACTORY") {
            if (!empty($details->address)) {
                $factory_address = $details->address;
            } else {
                $factory_address = "";
            }

            if (!empty($details->map_embeded_link)) {
                $factory_map_embeded_link = $details->map_embeded_link;
            } else {
                $factory_map_embeded_link = "";
            }
        }
    }
}?>

<section class="innerpagebanner position-relative" style="
background-image: url(<?=$page_background_image?>); 
background-size: cover; 
background-repeat: no-repeat; padding: 120px 0;">
    <div class="container py-4">
        <h1 class="mb-3 text-center fadeUp"><?=$page_heading?></h1>
        <nav class="fadeUp" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Contact us</li>
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
<section class="py-5 overflow-hidden" id="scrollsec">
    <div class="container">
        <div class="row align-items-center m-0">
            <div class="col-lg-6 fadeRight p-0">
                <div class="p-4 bg-light">
                <form class="d-block" action="#" method="post">
                    <div class="mb-3">
                        <small class="d-block">Name*</small>
                        <input type="text" class="form-control" placeholder="" required>
                    </div>
                    <div class="mb-3">
                        <small class="d-block">Email id*</small>
                        <input type="email" class="form-control" placeholder="" required>
                    </div>
                    <div class="mb-3">
                        <small class="d-block">Phone no*</small>
                        <input type="tel" class="form-control" placeholder="" required>
                    </div>
                    
                    <div class="mb-3">
                        <small class="d-block">Subject</small>
                        <input type="text" class="form-control" placeholder="">
                    </div>
                    <div class="mb-3">
                        <small class="d-block">Message</small>
                        <textarea class="form-control" rows="4"></textarea>
                    </div>
                    <button class="btnred border-0" type="submit">
                        <span>SUBMIT</span> 
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M5.5 5L11.7929 11.2929C12.1834 11.6834 12.1834 12.3166 11.7929 12.7071L5.5 19" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                            <path d="M13.5 5L19.7929 11.2929C20.1834 11.6834 20.1834 12.3166 19.7929 12.7071L13.5 19" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                    </button>
                </form>
                </div>
            </div>
            <div class="col-lg-6 p-0 fadeLeft">
                <div class="p-4 text-white" style="background: #D75427">
                    <h3 class="text-white mb-4">Registed Office</h3>
                    <div class="contactinffo mb-4">
                        
                        <?php if (!empty($office_address)) { ?>
                            <div class="mb-3 d-flex gap-3 align-items-center">
                                <span>
                                    <svg width="30" height="30" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M12 21C15.5 17.4 19 14.1764 19 10.2C19 6.22355 15.866 3 12 3C8.13401 3 5 6.22355 5 10.2C5 14.1764 8.5 17.4 12 21Z" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M12 13C13.6569 13 15 11.6569 15 10C15 8.34315 13.6569 7 12 7C10.3431 7 9 8.34315 9 10C9 11.6569 10.3431 13 12 13Z" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </span>
                                <a href="https://goo.gl/maps/SDVgjRfRwfnm351bA" target="_blank"><?=$office_address?></a>
                            </div>
                        <?php } ?>

                        <?php if (!empty($office_phone_number)) { ?>
                            <div class="mb-3 d-flex gap-3 align-items-center">
                                <span>
                                    <svg width="30" height="30" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M14 2C14 2 16.2 2.2 19 5C21.8 7.8 22 10 22 10" stroke="#fff" stroke-width="1.5" stroke-linecap="round"/>
                                        <path d="M14.207 5.53564C14.207 5.53564 15.197 5.81849 16.6819 7.30341C18.1668 8.78834 18.4497 9.77829 18.4497 9.77829" stroke="#fff" stroke-width="1.5" stroke-linecap="round"/>
                                        <path d="M4.00655 7.93309C3.93421 9.84122 4.41713 13.0817 7.6677 16.3323C8.45191 17.1165 9.23553 17.7396 10 18.2327M5.53781 4.93723C6.93076 3.54428 9.15317 3.73144 10.0376 5.31617L10.6866 6.4791C11.2723 7.52858 11.0372 8.90532 10.1147 9.8278C10.1147 9.8278 10.1147 9.8278 10.1147 9.8278C10.1146 9.82792 8.99588 10.9468 11.0245 12.9755C13.0525 15.0035 14.1714 13.8861 14.1722 13.8853C14.1722 13.8853 14.1722 13.8853 14.1722 13.8853C15.0947 12.9628 16.4714 12.7277 17.5209 13.3134L18.6838 13.9624C20.2686 14.8468 20.4557 17.0692 19.0628 18.4622C18.2258 19.2992 17.2004 19.9505 16.0669 19.9934C15.2529 20.0243 14.1963 19.9541 13 19.6111" stroke="#fff" stroke-width="1.5" stroke-linecap="round"/>
                                    </svg>
                                </span>
                                <a href="tel:<?=$office_phone_number?>"><?=$office_phone_number?></a>
                            </div>
                        <?php } ?>

                        <?php if (!empty($office_landline_number)) { ?>
                        <div class="mb-3 d-flex gap-3 align-items-center">
                            <span>
                                <svg height="30" width="30" version="1.1" id="_x32_" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512"  xml:space="preserve">
                                    <style type="text/css">
                                        .st0{fill:#fff;}
                                    </style>
                                    <g>
                                        <path class="st0" d="M429.684,163.714V78.711L350.958,0h-4.916h-179.11v148.673c-12.768-10.612-29.068-17.136-46.961-17.136 h-16.586c-20.396-0.015-38.776,8.324-51.953,21.734C38.239,166.674,30.162,185.2,30.17,205.55v221.216 c0.008,47.015,38.219,85.218,85.235,85.234h281.192c47.015-0.016,85.219-38.219,85.234-85.234V242.262 C481.816,206.972,460.298,176.651,429.684,163.714z M190.676,23.743h150.451l1.213,1.213V87.8h62.859l0.742,0.742v69.027 c-3.068-0.34-6.183-0.541-9.344-0.541H190.676V23.743z M56.278,205.55c0-26.016,21.092-47.108,47.107-47.108h16.586 c26.016,0,47.108,21.092,47.108,47.108v119.898c0,26.015-21.092,47.108-47.108,47.108h-16.586 c-26.016,0-47.107-21.093-47.107-47.108V205.55z M454.926,426.766c0,32.214-26.116,58.33-58.33,58.33H115.404 c-32.214,0-58.33-26.116-58.33-58.33v-47.818c12.436,10.782,28.604,17.351,46.311,17.351h16.586 c39.07,0,70.851-31.782,70.851-70.851v-19.376v-77.165v-44.975h205.774c32.214,0,58.33,26.116,58.33,58.331V426.766z"/>
                                        <path class="st0" d="M236.98,386.908c-8.494,0-15.381,6.894-15.381,15.389c0,8.494,6.887,15.38,15.381,15.38 c8.494,0,15.388-6.886,15.388-15.38C252.367,393.802,245.473,386.908,236.98,386.908z"/>
                                        <path class="st0" d="M316.131,386.908c-8.495,0-15.381,6.894-15.381,15.389c0,8.494,6.886,15.38,15.381,15.38 c8.494,0,15.388-6.886,15.388-15.38C331.519,393.802,324.625,386.908,316.131,386.908z"/>
                                        <path class="st0" d="M395.283,386.908c-8.494,0-15.381,6.894-15.381,15.389c0,8.494,6.886,15.38,15.381,15.38 c8.502,0,15.388-6.886,15.388-15.38C410.671,393.802,403.784,386.908,395.283,386.908z"/>
                                        <path class="st0" d="M236.98,336.771c-8.494,0-15.381,6.894-15.381,15.388c0,8.494,6.887,15.381,15.381,15.381 c8.494,0,15.388-6.887,15.388-15.381C252.367,343.665,245.473,336.771,236.98,336.771z"/>
                                        <path class="st0" d="M316.131,336.771c-8.495,0-15.381,6.894-15.381,15.388c0,8.494,6.886,15.381,15.381,15.381 c8.494,0,15.388-6.887,15.388-15.381C331.519,343.665,324.625,336.771,316.131,336.771z"/>
                                        <path class="st0" d="M395.283,336.771c-8.494,0-15.381,6.894-15.381,15.388c0,8.494,6.886,15.381,15.381,15.381 c8.502,0,15.388-6.887,15.388-15.381C410.671,343.665,403.784,336.771,395.283,336.771z"/>
                                        <path class="st0" d="M236.98,286.649c-8.494,0-15.381,6.894-15.381,15.388s6.887,15.381,15.381,15.381 c8.494,0,15.388-6.887,15.388-15.381S245.473,286.649,236.98,286.649z"/>
                                        <path class="st0" d="M316.131,286.649c-8.495,0-15.381,6.894-15.381,15.388s6.886,15.381,15.381,15.381 c8.494,0,15.388-6.887,15.388-15.381S324.625,286.649,316.131,286.649z"/>
                                        <path class="st0" d="M395.283,286.649c-8.494,0-15.381,6.894-15.381,15.388s6.886,15.381,15.381,15.381 c8.502,0,15.388-6.887,15.388-15.381S403.784,286.649,395.283,286.649z"/>
                                        <path class="st0" d="M396.055,231.696H237.768c-8.741,0-15.828,7.088-15.828,15.829c0,8.742,7.087,15.829,15.828,15.829h158.288 c8.742,0,15.829-7.087,15.829-15.829C411.884,238.784,404.797,231.696,396.055,231.696z"/>
                                    </g>
                                </svg>
                            </span>
                            <a href="tel:<?=$office_landline_number?>"><?=$office_landline_number?></a>
                        </div>
                        <?php } ?>

                        <?php if (!empty($office_email_address)) { ?>
                            <div class="mb-3 d-flex gap-3 align-items-center">
                                <span>
                                    <svg fill="#fff" width="30" height="30" viewBox="0 0 36 36" version="1.1"  preserveAspectRatio="xMidYMid meet" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                        <path class="clr-i-outline clr-i-outline-path-1" d="M32,6H4A2,2,0,0,0,2,8V28a2,2,0,0,0,2,2H32a2,2,0,0,0,2-2V8A2,2,0,0,0,32,6ZM30.46,28H5.66l7-7.24-1.44-1.39L4,26.84V9.52L16.43,21.89a2,2,0,0,0,2.82,0L32,9.21v17.5l-7.36-7.36-1.41,1.41ZM5.31,8H30.38L17.84,20.47Z"></path>
                                        <rect x="0" y="0" width="36" height="36" fill-opacity="0"/>
                                    </svg>
                                </span>
                                <a href="mailto:<?=$office_email_address?>"><?=$office_email_address?></a>
                            </div>
                        <?php } ?>
                    </div>

                    <h3 class="text-white mb-4">Plant Address</h3>
                    <div class="contactinffo">
                        <?php if (!empty($factory_address)) { ?>
                            <div class="mb-3 d-flex gap-3 align-items-center">
                                <span>
                                    <svg width="30" height="30" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M12 21C15.5 17.4 19 14.1764 19 10.2C19 6.22355 15.866 3 12 3C8.13401 3 5 6.22355 5 10.2C5 14.1764 8.5 17.4 12 21Z" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M12 13C13.6569 13 15 11.6569 15 10C15 8.34315 13.6569 7 12 7C10.3431 7 9 8.34315 9 10C9 11.6569 10.3431 13 12 13Z" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </span>
                                <a href="https://goo.gl/maps/4mq2HZ4f5QfMC6ug8" target="_blank"><?=$factory_address?></a>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="overflow-hidden mapsec pb-5">
    <div class="container">
        <div class="row m-0">
            <?php if (!empty($office_map_embeded_link)) { ?>
                <div class="col-md-6 ps-md-0 pe-md-3">
                    <h4 class="m-0 p-3 text-white text-center" style="background: #00adf1">A B Polypacks Pvt Ltd Regd. Office</h4>
                    <iframe src="<?=$office_map_embeded_link?>" width="100%" height="200" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            <?php } ?>

            <?php if (!empty($factory_map_embeded_link)) { ?>
                <div class="col-md-6 pe-md-0 ps-md-3">
                    <h4 class="m-0 p-3 text-white text-center" style="background: #00adf1">A B Polypacks Factory Address</h4>
                    <iframe src="<?=$factory_map_embeded_link?>" width="100%" height="200" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            <?php } ?>
        </div>
    </div>
</section>