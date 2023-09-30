<section class="innerpagebanner position-relative" style="
background-image: url(<?=base_url('assets/client/images/Inner-Banners/products.jpg')?>); 
background-size: cover; 
background-repeat: no-repeat; padding: 120px 0;">
    <div class="container py-4">
        <h1 class="mb-3 text-center fadeUp">Our Products</h1>
        <nav class="fadeUp" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Our Products</li>
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

<?php if (!empty($list_of_product_categories)) { ?>
<section class="py-5" id="scrollsec">
    <div class="container">
        <div class="row justify-content-center">
            <?php foreach ($list_of_product_categories as $i => $product_category_details) { ?>
            <div class="col-md-6 col-lg-3 mt-4 fadeUp">
                <a href="#">
                    <div class="produccatbox p-3 bg-white text-center">
                        <div class="card border-0 card__three">
                            <figure class="card__img overflow-hidden">
                            <img src="<?=base_url($product_category_details->image)?>" class="w-100" />
                            </figure>
                            <h3 class="h4"><?=$product_category_details->name?></h3>
                        </div>
                    </div>
                </a>
            </div>
            <?php } ?>
        </div>
    </div>
</section>
<?php } ?>

<!-- <section class="py-5">
    <div class="container py-5">
        <div class="homeproductwrp pb-5">
            <div class="row align-items-center">
                <div class="col-md-6 homeprodcon">
                    <h3 class="mb-2 fadeUp">Pouch for Snacks</h3>
                    <div class="fadeUp linheight2">
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type only five centuries, but also the leap into electronic typesetting.</p>
                    </div>
                    <div class="fadeUp">
                        <a href="" class="btnred">
                            <span>LEARN MORE</span> 
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M5.5 5L11.7929 11.2929C12.1834 11.6834 12.1834 12.3166 11.7929 12.7071L5.5 19" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M13.5 5L19.7929 11.2929C20.1834 11.6834 20.1834 12.3166 19.7929 12.7071L13.5 19" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </a>
                    </div>
                </div>
                <div class="col-md-6 homeprodthmbwrp">
                    <img src="<?=base_url('assets/client/images/home-product-1-min.png')?>" alt="" class="w-100 p-5 fadePopup">
                    <img src="<?=base_url('assets/client/images/product-shape.svg')?>" alt="" class="homeprodthmbbg">
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col-md-6 homeprodcon">
                    <h3 class="mb-2 fadeUp">Pouch for Grains</h3>
                    <div class="fadeUp linheight2">
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type only five centuries, but also the leap into electronic typesetting.</p>
                    </div>
                    <div class="fadeUp">
                        <a href="" class="btnred">
                            <span>LEARN MORE</span> 
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M5.5 5L11.7929 11.2929C12.1834 11.6834 12.1834 12.3166 11.7929 12.7071L5.5 19" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M13.5 5L19.7929 11.2929C20.1834 11.6834 20.1834 12.3166 19.7929 12.7071L13.5 19" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </a>
                    </div>
                </div>
                <div class="col-md-6 homeprodthmbwrp">
                    <img src="<?=base_url('assets/client/images/home-product-2-min.png')?>" alt="" class="w-100 p-5 fadePopup">
                    <img src="<?=base_url('assets/client/images/product-shape.svg')?>" alt="" class="homeprodthmbbg">
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col-md-6 homeprodcon">
                    <h3 class="mb-2 fadeUp">Pouch for Tea</h3>
                    <div class="fadeUp linheight2">
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type only five centuries, but also the leap into electronic typesetting.</p>
                    </div>
                    <div class="fadeUp">
                        <a href="" class="btnred">
                            <span>LEARN MORE</span> 
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M5.5 5L11.7929 11.2929C12.1834 11.6834 12.1834 12.3166 11.7929 12.7071L5.5 19" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M13.5 5L19.7929 11.2929C20.1834 11.6834 20.1834 12.3166 19.7929 12.7071L13.5 19" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </a>
                    </div>
                </div>
                <div class="col-md-6 homeprodthmbwrp">
                    <img src="<?=base_url('assets/client/images/home-product-3-min.png')?>" alt="" class="w-100 p-5 fadePopup">
                    <img src="<?=base_url('assets/client/images/product-shape.svg')?>" alt="" class="homeprodthmbbg">
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col-md-6 homeprodcon">
                    <h3 class="mb-2 fadeUp">Pouch for Juice</h3>
                    <div class="fadeUp linheight2">
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type only five centuries, but also the leap into electronic typesetting.</p>
                    </div>
                    <div class="fadeUp">
                        <a href="" class="btnred">
                            <span>LEARN MORE</span> 
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M5.5 5L11.7929 11.2929C12.1834 11.6834 12.1834 12.3166 11.7929 12.7071L5.5 19" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M13.5 5L19.7929 11.2929C20.1834 11.6834 20.1834 12.3166 19.7929 12.7071L13.5 19" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </a>
                    </div>
                </div>
                <div class="col-md-6 homeprodthmbwrp">
                    <img src="<?=base_url('assets/client/images/home-product-4-min.png')?>" alt="" class="w-100 p-5 fadePopup">
                    <img src="<?=base_url('assets/client/images/product-shape.svg')?>" alt="" class="homeprodthmbbg">
                </div>
            </div>
        </div>
    </div>
</section> -->