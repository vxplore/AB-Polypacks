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

} ?>

<section class="innerpagebanner position-relative" style="
background-image: url(<?=$page_background_image?>); 
background-size: cover; 
background-repeat: no-repeat; padding: 120px 0;">
    <div class="container py-4">
        <h1 class="mb-3 text-center fadeUp"><?=$page_heading?></h1>
        <nav class="fadeUp" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center">
                <li class="breadcrumb-item"><a href="<?=base_url()?>">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Client</li>
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
<section class="py-5" style="background-color: #FDF6F4;">
    <div class="container">
        <div class="title2sec mb-4 fadeUp">
            <small>COMPANIES WHO TRUST US</small>
            <h2>Our Top Clients</h2>
        </div>
        <div class="fadeUp">
            <div class="clientslogoslider">
                <div class="clientslogosec">
                    <div class="clientslogo">
                        <img class="" src="<?=base_url('assets/client/images/client-logo1-min.png')?>" alt="">
                    </div>
                </div>
                <div class="clientslogosec">
                    <div class="clientslogo">
                        <img class="" src="<?=base_url('assets/client/images/client-logo2-min.png')?>" alt="">
                    </div>
                </div>
                <div class="clientslogosec">
                    <div class="clientslogo">
                        <img class="" src="<?=base_url('assets/client/images/client-logo3-min.png')?>" alt="">
                    </div>
                </div>
                <div class="clientslogosec">
                    <div class="clientslogo">
                        <img class="" src="<?=base_url('assets/client/images/client-logo4-min.png')?>" alt="">
                    </div>
                </div>
                <div class="clientslogosec">
                    <div class="clientslogo">
                        <img class="" src="<?=base_url('assets/client/images/client-logo5-min.png')?>" alt="">
                    </div>
                </div>
                <div class="clientslogosec">
                    <div class="clientslogo">
                        <img class="" src="<?=base_url('assets/client/images/client-logo6-min.png')?>" alt="">
                    </div>
                </div>
                <div class="clientslogosec">
                    <div class="clientslogo">
                        <img class="" src="<?=base_url('assets/client/images/client-logo7-min.png')?>" alt="">
                    </div>
                </div>
                <div class="clientslogosec">
                    <div class="clientslogo">
                        <img class="" src="<?=base_url('assets/client/images/client-logo8-min.png')?>" alt="">
                    </div>
                </div>
                <div class="clientslogosec">
                    <div class="clientslogo">
                        <img class="" src="<?=base_url('assets/client/images/client-logo3-min.png')?>" alt="">
                    </div>
                </div>
                <div class="clientslogosec">
                    <div class="clientslogo">
                        <img class="" src="<?=base_url('assets/client/images/client-logo4-min.png')?>" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>