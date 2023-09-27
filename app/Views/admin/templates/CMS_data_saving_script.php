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

</script>