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

        if (!empty($CMS_contents->sub_section1_image)) {
            $sub_section1_image = base_url($CMS_contents->sub_section1_image);
        } else {
            $sub_section1_image = "";
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

        if (!empty($CMS_contents->sub_section2_image)) {
            $sub_section2_image = base_url($CMS_contents->sub_section2_image);
        } else {
            $sub_section2_image = "";
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

        if (!empty($CMS_contents->sub_section3_image)) {
            $sub_section3_image = base_url($CMS_contents->sub_section3_image);
        } else {
            $sub_section3_image = "";
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

        if (!empty($CMS_contents->sub_section4_image)) {
            $sub_section4_image = base_url($CMS_contents->sub_section4_image);
        } else {
            $sub_section4_image = "";
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

        if (!empty($CMS_contents->sub_section5_image)) {
            $sub_section5_image = base_url($CMS_contents->sub_section5_image);
        } else {
            $sub_section5_image = "";
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

        if (!empty($CMS_contents->sub_section6_image)) {
            $sub_section6_image = base_url($CMS_contents->sub_section6_image);
        } else {
            $sub_section6_image = "";
        }

        if (!empty($CMS_contents->sub_section7_heading)) {
            $sub_section7_heading = $CMS_contents->sub_section7_heading;
        } else {
            $sub_section7_heading = "";
        }

        if (!empty($CMS_contents->sub_section7_description)) {
            $sub_section7_description = $CMS_contents->sub_section7_description;
        } else {
            $sub_section7_description = "";
        }

        if (!empty($CMS_contents->sub_section7_image)) {
            $sub_section7_image = base_url($CMS_contents->sub_section7_image);
        } else {
            $sub_section7_image = "";
        }
    }

}?>

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
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Infrastructure</li>
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

        <div class="row align-items-center" id="QualityControlLab">
            <div class="col-md-6 fadeLeft howmuch">
                <?php if (!empty($page_contents_editable)) { ?>
                    <h3 contentEditable="true" id="sub_section1_heading" class="mb-3 editable-content"><?=$sub_section1_heading?></h3>
                    <div contentEditable="true" id="sub_section1_description" class="editable-content">
                        <?=$sub_section1_description?>
                    </div>
                <?php } else { ?>
                    <h3 class="mb-3"><?=$sub_section1_heading?></h3>
                    <div><?=$sub_section1_description?></div>
                <?php } ?>
            </div>
            <div class="col-md-6 p-3 fadePopup">
                <?php if (!empty($page_contents_editable)) { ?>
                    <label for="sub_section1_image" class="editable-content w-100">
                        <img src="<?=$sub_section1_image?>" alt="" class="w-100">
                        <input type="file" id="sub_section1_image" class="hidden-image-input" onchange="previewImage(this)">
                    </label>
                <?php } else { ?>
                    <img src="<?=$sub_section1_image?>" alt="" class="w-100">
                <?php } ?>
            </div>
        </div>
    </div>
</section>

<section class="bg-light py-5">
    <div class="container">
        <div class="row m-0 bg-white align-items-center" id="BlownPolyFilmUnit">
            <div class="col-md-4 p-0 fadeUp">
                <?php if (!empty($page_contents_editable)) { ?>
                    <label for="sub_section2_image" class="editable-content w-100">
                        <img src="<?=$sub_section2_image?>" alt="" class="w-100">
                        <input type="file" id="sub_section2_image" class="hidden-image-input" onchange="previewImage(this)">
                    </label>
                <?php } else { ?>
                    <img src="<?=$sub_section2_image?>" alt="" class="w-100">
                <?php } ?>
            </div>
            <div class="col-md-8 col-lg-8 p-3 p-md-5 fadeUp">
                <?php if (!empty($page_contents_editable)) { ?>
                    <h3 contentEditable="true" id="sub_section2_heading" class="mb-3 editable-content"><?=$sub_section2_heading?></h3>
                    <div contentEditable="true" id="sub_section2_description" class="editable-content">
                        <?=$sub_section2_description?>
                    </div>
                <?php } else { ?>
                    <h3 class="mb-3"><?=$sub_section2_heading?></h3>
                    <div>
                        <?=$sub_section2_description?>
                    </div>
                <?php } ?>
            </div>
        </div>
        <div class="row m-0 bg-white align-items-center" id="PrintingUnit">
            <div class="col-md-4 p-0 fadeUp">
                <?php if (!empty($page_contents_editable)) { ?>
                    <label for="sub_section6_image" class="editable-content w-100">
                        <img src="<?=$sub_section6_image?>" alt="" class="w-100">
                        <input type="file" id="sub_section6_image" class="hidden-image-input" onchange="previewImage(this)">
                    </label>
                <?php } else { ?>
                    <img src="<?=$sub_section6_image?>" alt="" class="w-100">
                <?php } ?>
            </div>
            <div class="col-md-8 col-lg-8 p-3 p-md-5 fadeUp">
                <?php if (!empty($page_contents_editable)) { ?>
                    <h3 contentEditable="true" id="sub_section6_heading" class="mb-3 editable-content"><?=$sub_section6_heading?></h3>
                    <div contentEditable="true" id="sub_section6_description" class="editable-content">
                        <?=$sub_section6_description?>
                    </div>
                <?php } else { ?>
                    <h3 class="mb-3"><?=$sub_section6_heading?></h3>
                    <div>
                        <?=$sub_section6_description?>
                    </div>
                <?php } ?>
            </div>
        </div>
        <div class="row m-0 bg-white align-items-center" id="LaminationUnit">
            <div class="col-md-4 p-0 fadeUp">
                <?php if (!empty($page_contents_editable)) { ?>
                    <label for="sub_section4_image" class="editable-content w-100">
                        <img src="<?=$sub_section4_image?>" alt="" class="w-100">
                        <input type="file" id="sub_section4_image" class="hidden-image-input" onchange="previewImage(this)">
                    </label>
                <?php } else { ?>
                    <img src="<?=$sub_section4_image?>" alt="" class="w-100">
                <?php } ?>
            </div>
            <div class="col-md-8 col-lg-8 p-3 p-md-5 fadeUp">
                <?php if (!empty($page_contents_editable)) { ?>
                    <h3 contentEditable="true" id="sub_section4_heading" class="mb-3 editable-content"><?=$sub_section4_heading?></h3>
                    <div contentEditable="true" id="sub_section4_description" class="editable-content">
                        <?=$sub_section4_description?>
                    </div>
                <?php } else { ?>
                    <h3 class="mb-3"><?=$sub_section4_heading?></h3>
                    <div>
                        <?=$sub_section4_description?>
                    </div>
                <?php } ?>
            </div>
        </div>
        <div class="row m-0 flex-row-reverse bg-white align-items-center" id="SlittingUnit">
            <div class="col-md-4 p-0 fadeUp">
                <?php if (!empty($page_contents_editable)) { ?>
                    <label for="sub_section7_image" class="editable-content w-100">
                        <img src="<?=$sub_section7_image?>" alt="" class="w-100">
                        <input type="file" id="sub_section7_image" class="hidden-image-input" onchange="previewImage(this)">
                    </label>
                <?php } else { ?>
                    <img src="<?=$sub_section7_image?>" alt="" class="w-100">
                <?php } ?>
            </div>
            <div class="col-md-8 col-lg-8 p-3 p-md-5 fadeUp">
                <?php if (!empty($page_contents_editable)) { ?>
                    <h3 contentEditable="true" id="sub_section7_heading" class="mb-3 editable-content"><?=$sub_section7_heading?></h3>
                    <p contentEditable="true" id="sub_section7_description" class="editable-content">
                        <?=$sub_section7_description?>
                    </p>
                <?php } else { ?>
                    <h3 class="mb-3"><?=$sub_section7_heading?></h3>
                    <p><?=$sub_section7_description?></p>
                <?php } ?>
            </div>
        </div>
        <div class="row m-0 flex-row-reverse bg-white align-items-center" id="ShrinkSleeveUnit">
            <div class="col-md-4 p-0 fadeUp">
                <?php if (!empty($page_contents_editable)) { ?>
                    <label for="sub_section3_image" class="editable-content w-100">
                        <img src="<?=$sub_section3_image?>" alt="" class="w-100">
                        <input type="file" id="sub_section3_image" class="hidden-image-input" onchange="previewImage(this)">
                    </label>
                <?php } else { ?>
                    <img src="<?=$sub_section3_image?>" alt="" class="w-100">
                <?php } ?>
            </div>
            <div class="col-md-8 col-lg-8 p-3 p-md-5 fadeUp">
                <?php if (!empty($page_contents_editable)) { ?>
                    <h3 contentEditable="true" id="sub_section3_heading" class="mb-3 editable-content"><?=$sub_section3_heading?></h3>
                    <p contentEditable="true" id="sub_section3_description" class="editable-content"><?=$sub_section3_description?></p>
                <?php } else { ?>
                    <h3 class="mb-3"><?=$sub_section3_heading?></h3>
                    <p><?=$sub_section3_description?></p>
                <?php } ?>
            </div>
        </div>
        <div class="row m-0 flex-row-reverse bg-white align-items-center" id="PouchingUnit">
            <div class="col-md-4 p-0 fadeUp">
                <?php if (!empty($page_contents_editable)) { ?>
                    <label for="sub_section5_image" class="editable-content w-100">
                        <img src="<?=$sub_section5_image?>" alt="" class="w-100">
                        <input type="file" id="sub_section5_image" class="hidden-image-input" onchange="previewImage(this)">
                    </label>
                <?php } else { ?>
                    <img src="<?=$sub_section5_image?>" alt="" class="w-100">
                <?php } ?>
            </div>
            <div class="col-md-8 col-lg-8 p-3 p-md-5 fadeUp">
                <?php if (!empty($page_contents_editable)) { ?>
                    <h3 contentEditable="true" id="sub_section5_heading" class="mb-3 editable-content"><?=$sub_section5_heading?></h3>
                    <p contentEditable="true" id="sub_section5_description" class="editable-content">
                        <?=$sub_section5_description?>
                    </p>
                <?php } else { ?>
                    <h3 class="mb-3"><?=$sub_section5_heading?></h3>
                    <p><?=$sub_section5_description?></p>
                <?php } ?>
            </div>
        </div>
    </div>
</section>

<?php if (!empty($page_contents_editable)) { ?>
<script>

    function get_rendered_CMS_page_content() {
        let CMS_page_content = new FormData();

        let HTML_content_ids = [
            "main_section_heading",
            "main_section_description",
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
            "sub_section7_heading",
            "sub_section7_description"
        ];
        HTML_content_ids.forEach((HTML_content_name, i) => {
            let HTML_content = $("#"+HTML_content_name).html();
            if (HTML_content) {
                CMS_page_content.append(HTML_content_name, HTML_content);
            }
        });

        let file_content_ids = [
            "sub_section1_image",
            "sub_section2_image",
            "sub_section3_image",
            "sub_section4_image",
            "sub_section5_image",
            "sub_section6_image",
            "sub_section7_image"
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