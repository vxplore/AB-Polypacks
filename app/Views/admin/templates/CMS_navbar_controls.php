<link href="<?=base_url('assets/admin/vendor/bootstrap-icons/bootstrap-icons.css')?>" rel="stylesheet">
<link href="<?=base_url('assets/admin/css/style.css')?>" rel="stylesheet">

<!-- Toastify CSS File -->
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">

<!-- Toastify JS File -->
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
<script type="text/javascript" src="<?=base_url('assets/admin/js/toast_message.js')?>"></script>

<style>

    body {
        background: transparent !important;
    }

    .flex-container {
        display: flex;
        justify-content: space-between; /* Optional: This will evenly distribute content */
        align-items: center; /* Optional: This will vertically center content */
    }

    .float-right-button {
        margin-left: auto; /* Push the button to the right */
    }

    .editable-content {
        border: 2px dashed #c1c1c1;
        border-radius: 5px;
        cursor: text;
        outline: none;   
    }

    label.editable-content {
        cursor: pointer;
    }
</style>

<header id="header" class="header fixed-top pt-3">
    <div class="flex-container">
        <div class="d-flex align-items-center justify-content-start">
            <a href="<?=base_url('admin')?>" class="btn btn-sm btn-danger mx-3">
                <img src="<?=base_url('assets/admin/img/exit.svg')?>" style="width:16px; height:16px;">
                <span class="mx-1">Exit</span>
            </a>
            <div class="d-flex align-items-center justify-content-start">
                <img src="<?=base_url('assets/admin/img/logo.png')?>" alt="" width="35px" class="mx-2">
                <h5 class="mb-0" style="color:#606060;">
                    <?=(!empty($page_details->name)) ? $page_details->name : ''?> Page Content Editing
                </h5>
            </div>
        </div>
        <button type="button" id="CMS_content_saving_button" class="float-right-button btn btn-sm btn-success mx-3 d-flex align-items-center justify-content-evenly" onclick="save_CMS_page_content()" style="width:88.3px; height:31px; text-align:center;">
            <img src="<?=base_url('assets/admin/img/save.svg')?>" style="width:16px; height:16px;">
            <span class="mx-1"> Save</span>
        </button>
    </div>
</header>