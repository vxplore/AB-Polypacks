<?php if (!empty($category_details)) {
    if (!empty($category_details->page_background_image)) {
        $page_background_image = base_url($category_details->page_background_image);
    } else {
        $page_background_image = "";
    }

    if (!empty($category_details->page_heading)) {
        $page_heading = $category_details->page_heading;
    } else {
        $page_heading = "";
    }

    if (!empty($category_details->name)) {
        $category_name = $category_details->name;
    } else {
        $category_name = "";
    }

    if (!empty($category_details->description)) {
        $category_description = $category_details->description;
    } else {
        $category_description = "";
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
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item"><a href="product-list.html">Products</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?=$category_name?></li>
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
        <h2 class="text-center mb-3 fadeUp in-view"><?=$category_name?></h2>
        <div class="row justify-content-center mb-3 fadeUp in-view">
            <div class="col-md-8">
                <p class="d-block text-center"><?=$category_description?></p>
            </div>
        </div>
    </div>
</section>

<?php if (!empty($list_of_products)) { ?>
<section class="pb-5">
    <div class="container">
        <div class="row justify-content-center">
            <?php foreach ($list_of_products as $i => $product_details) { ?>
                <div class="col-md-4 mt-4 text-center fadeUp in-view">
                    <div class="productdtlbox rounded bg-white border h-100 p-3">
                        <div class="overflow-hidden mb-3">
                            <img src="<?=(!empty($product_details->image)) ? base_url($product_details->image) : ''?>" alt="" class="w-100">
                        </div>
                        <h4 class="mt-auto"><?=(!empty($product_details->name)) ? $product_details->name : ''?></h4>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>
<?php } ?>

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
                            <img class="" src="<?=(!empty($client_details->image)) ? base_url($client_details->image) : ''?>" alt="">
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</section>
<?php } ?>