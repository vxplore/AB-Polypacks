<?php if (!empty($banner_details)) {
    $page_heading = "Edit Banner";
    $page_type = "Edit";
    $form_heading = "Banner Editing Form";
    $hidden_banner_id_input = "<input type='hidden' name='banner_id' value='".$banner_details->banner_id."'>";
    $text_preview_status = "hide";
    $banner_image = base_url($banner_details->image);
    $submit_button_text = "Save";
    $submit_button_class = "btn btn-primary";
}
else {
    $page_heading = "Add New Banner";
    $page_type = "Add";
    $form_heading = "New Banner Adding Form";
    $image_preview_status = "hide";
    $submit_button_text = "Add";
    $submit_button_class = "btn btn-success";    
}?>

<link rel="stylesheet" href="<?=base_url('assets/admin/css/banner_content_view_style.css')?>">
<main id="main" class="main">
    <div class="pagetitle d-flex align-items-center justify-content-between">
        <div>
            <h1><?=$page_heading?></h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?=base_url('admin')?>">Home</a></li>
                    <li class="breadcrumb-item"><a href="<?=base_url('admin/banners')?>">Banners</a></li>
                    <li class="breadcrumb-item active"><?=$page_type?></li>
                </ol>
            </nav>
        </div>
        <div>
            <a href="<?=base_url('admin/banners')?>" class="btn btn-dark font-14">
                <i class="bi bi-arrow-left-short"></i>
            </a>
        </div>
    </div>

    <section class="section">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title"><?=$form_heading?></h5>
                <form id="banner_data_form">
                    <?=(!empty($hidden_banner_id_input)) ? $hidden_banner_id_input : ''?>
                    <div class="row">
                        <div class="col-md-12">
                            <label for="banner_image" id="banner_image_label" class="image-preview-container mb-3">
                                <div id="text_preview_container" class="text-preview-container <?=(isset($text_preview_status)) ? $text_preview_status : ''?>">
                                    <span class="text-preview">Upload Banner Image</span>
                                </div>
                                <img src="<?=(isset($banner_image)) ? $banner_image : ''?>" id="image_preview" class="image-preview <?=(isset($image_preview_status)) ? $image_preview_status : ''?>">
                                <input type="file" accept="image/jpg image/jpeg image/png" name="image" id="banner_image" class="hidden-image-input" onchange="previewImage(this)">
                            </label>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" name="title" id="title" class="form-control" 
                                placeholder="Enter Banner Title Here..." 
                                value="<?=(!empty($banner_details->title)) ? $banner_details->title : ''?>" required>
                                <label for="title">Title</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" name="link" id="link" class="form-control" 
                                placeholder="Enter Banner Link Here..."
                                value="<?=(!empty($banner_details->link)) ? $banner_details->link : ''?>">
                                <label for="link">Link</label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="description" class="floatingInput mb-2">Description</label>
                                <textarea name="description" id="description">
                                    <?=(!empty($banner_details->description)) ? $banner_details->description : ''?>
                                </textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mt-3 text-end">
                                <button type="submit" id="banner_data_form_submit_button" class="<?=$submit_button_class?>">
                                    <?=$submit_button_text?>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</main>

<script>

    window.onload = function() {
        tinymce.init({
            selector: "#description",
            height: "300px"
        });
    }

    function previewImage(input) {
        const imagePreview = document.getElementById('image_preview');
        const textPreviewContainer = document.getElementById('text_preview_container');
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                imagePreview.src = e.target.result;
                imagePreview.classList.remove("hide");
                textPreviewContainer.classList.add("hide");
                
            };
            reader.readAsDataURL(input.files[0]);
        }
        else {
            textPreviewContainer.classList.remove("hide");
            imagePreview.classList.add("hide");
        }
    }

    $("#banner_data_form").submit(function(e) {
        e.preventDefault();
        let formData = new FormData(this);

        let description = tinymce.get("description").getContent();
        formData.append("description", description);

        if (formData.has("banner_id")) {
            var URL = "<?=base_url('admin/banners/save-banner-details')?>";
            var errorMessage = "Something went wrong! Failed to save banner details.";
        } else {
            var URL = "<?=base_url('admin/banners/add-new-banner')?>";
            var errorMessage = "Something went wrong! Failed to add new banner.";
        }

        // let formDataObject = {};
        // formData.forEach((value, key) => {
        //     formDataObject[key] = value;
        // });

        // console.log(formDataObject);

        $.ajax({
            url: URL,
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            error: function(a, b, c) {
                toast(errorMessage, 3000);
                console.log(a);
                console.log(b);
                console.log(c);
            },
            success: function(response) {
                if (response.status == true) {
                    toast(response.message, 1200);
                    if (response.data.hasOwnProperty("redirect_to")) {
                        setTimeout(() => {
                            location.href = response.data.redirect_to;
                        }, 800);
                    }
                }
                else if (response.status == false) {
                    toast(response.message, 3000);
                    console.log(response);
                }
                else {
                    toast(errorMessage, 3000);
                    console.log(response);
                }
            }
        });
    });

</script>