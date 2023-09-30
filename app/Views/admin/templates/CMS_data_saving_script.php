<script>
    let baseURL = `<?=base_url()?>`;
    let btnLoader = `<img src="${baseURL}assets/admin/img/loading.svg" style="width:20px; height:20px;">
                     <span class="mx-1"> Saving</span>`;

    function save_CMS_page_content() {
        let CMS_page_id = $("#CMS_page_id").val();
        let CMS_page_content = get_rendered_CMS_page_content();
        let content_saving_button = $("#CMS_content_saving_button");
        let content_saving_button_html = content_saving_button.html();

        $.ajax({
            url: "<?=base_url('/admin/pages/save-CMS-content/')?>"+CMS_page_id,
            type: "POST",
            data: CMS_page_content,
            contentType: false,
            processData: false,
            beforeSend: function() {
                content_saving_button.prop("disabled", true);
                content_saving_button.html(btnLoader);
            },
            complete: function() {
                content_saving_button.html(content_saving_button_html);
                content_saving_button.prop("disabled", false);
            },
            error: function(a, b, c) {
                toast("Something went wrong! Failed to save CMS contents.", 3000);
                console.log(a);
                console.log(b);
                console.log(c);
            },
            success: function(response) {
                if (response.status == true) {
                    toast(response.message, 1500);
                }
                else if (response.status == false) {
                    toast(response.message, 3000);
                    console.log(response);
                }
                else {
                    toast("Something went wrong! Failed to save CMS contents.", 3000);
                    console.log(response);
                }
            }
        });
    }

    function previewImage(imageInput) {
        let imagePreviewer = $(imageInput).prev("img");
        if (imageInput.files && imageInput.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                imagePreviewer.prop("src", e.target.result);
            };
            reader.readAsDataURL(imageInput.files[0]);
        }
    }

</script>