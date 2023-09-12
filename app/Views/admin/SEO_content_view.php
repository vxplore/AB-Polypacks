<main id="main" class="main">
    <div class="pagetitle d-flex align-items-center justify-content-between">
        <div> <h1>Edit SEO Data</h1>
        <nav>
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item ">SEO</li>
            <li class="breadcrumb-item active">Edit SEO Data</li>
            </ol>
        </nav></div>
        <div>
        <a href="<?=base_url('admin/SEO')?>" class="btn btn-dark font-14"><i class="bi bi-arrow-left-short"></i></a>
        </div>
    </div>
    <!-- End Page Title -->

    <section class="section">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">SEO Data Editing Form</h5>
                <form id="SEO_data_editing_form">
                    <input type="hidden" name="page_id" id="page_id" value="<?=(!empty($page_details->page_id)) ? $page_details->page_id : ''?>">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" name="name" id="name" class="form-control" placeholder="Enter Page Name Here..." value="<?=(!empty($page_details->name)) ? $page_details->name : '';?>" required>
                                <label for="name">Name</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" name="slug" id="slug" class="form-control" placeholder="Enter Slug Here..." value="<?=(!empty($page_details->slug)) ? $page_details->slug : ''?>" required>
                                <label for="slug">Slug</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" name="meta_title" id="meta_title" class="form-control" placeholder="Enter Meta Title Here..." value="<?=(!empty($page_details->meta_title)) ? $page_details->meta_title : ''?>" required>
                                <label for="meta_title">Meta Title</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" name="meta_keywords" id="meta_keywords" class="form-control" placeholder="Enter Meta Keywords Here..." value="<?=(!empty($page_details->meta_keywords)) ? $page_details->meta_keywords : ''?>" required>
                                <label for="meta_keywords">Meta Keywords</label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-floating mb-3">
                                <textarea name="meta_description" id="meta_description" class="form-control" placeholder="Enter Meta Description Here..." required style="height:150px;"><?=(!empty($page_details->meta_description)) ? $page_details->meta_description : ''?></textarea>
                                <label for="meta_description">Meta Description</label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mt-3 text-end">
                                <button type="submit" id="SEO_data_editing_form_submit_button" class="btn btn-success">
                                    Save
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</main><!-- End #main -->

<script>

    $("#SEO_data_editing_form").submit(function(e) {
        e.preventDefault();
        let form = document.getElementById("SEO_data_editing_form");
        let formData = new FormData(form);

        // let formDataObject = {};
        // formData.forEach((value, key) => {
        //     formDataObject[key] = value;
        // });

        // console.log(formDataObject);

        $.ajax({
            url: "<?=base_url('admin/SEO/save-content')?>",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            error: function(a, b, c) {
                toast("Something went wrong! Failed to save SEO data.", 3000);
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
                    toast("Something went wrong! Failed to save SEO data.", 3000);
                    console.log(response);
                }
            }
        });
    });

</script>