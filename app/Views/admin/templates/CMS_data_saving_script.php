<script>
    
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

    function save_CMS_page_content() {
        let CMS_page_content = get_rendered_CMS_page_content();
        let formDataObject = {};
        CMS_page_content.forEach((value, key) => {
            formDataObject[key] = value;
        });

        console.log(formDataObject);
    }

</script>