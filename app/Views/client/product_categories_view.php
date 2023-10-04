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
                <a href="<?=base_url('products/'.$product_category_details->slug)?>">
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