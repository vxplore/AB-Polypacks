<link href="<?=base_url('assets/admin/vendor/bootstrap-icons/bootstrap-icons.css')?>" rel="stylesheet">
<link href="<?=base_url('assets/admin/css/style.css')?>" rel="stylesheet">
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
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-left" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z"/>
                    <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z"/>
                </svg>
                <span class="mx-1">Exit</span>
            </a>
            <div class="d-flex align-items-center justify-content-start">
                <img src="<?=base_url('assets/admin/img/logo.png')?>" alt="" width="35px" class="mx-2">
                <h5 class="mb-0" style="color:#606060;">
                    <?=(!empty($page_details->name)) ? $page_details->name : ''?> Page Content Editing
                </h5>
            </div>
        </div>
        <button type="button" class="float-right-button btn btn-sm btn-success mx-3 d-flex align-items-center" onclick="save_CMS_page_content()">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-floppy" viewBox="0 0 16 16">
                <path d="M11 2H9v3h2V2Z"/>
                <path d="M1.5 0h11.586a1.5 1.5 0 0 1 1.06.44l1.415 1.414A1.5 1.5 0 0 1 16 2.914V14.5a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 14.5v-13A1.5 1.5 0 0 1 1.5 0ZM1 1.5v13a.5.5 0 0 0 .5.5H2v-4.5A1.5 1.5 0 0 1 3.5 9h9a1.5 1.5 0 0 1 1.5 1.5V15h.5a.5.5 0 0 0 .5-.5V2.914a.5.5 0 0 0-.146-.353l-1.415-1.415A.5.5 0 0 0 13.086 1H13v4.5A1.5 1.5 0 0 1 11.5 7h-7A1.5 1.5 0 0 1 3 5.5V1H1.5a.5.5 0 0 0-.5.5Zm3 4a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 .5-.5V1H4v4.5ZM3 15h10v-4.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5V15Z"/>
            </svg>
            <span class="mx-1">Save</span>
        </button>
    </div>
</header>