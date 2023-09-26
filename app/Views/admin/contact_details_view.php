<main id="main" class="main">
    <div class="pagetitle d-flex align-items-center justify-content-between">
        <div>
            <h1>Contact Details</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?=base_url('admin')?>">Home</a></li>
                    <li class="breadcrumb-item active">Contact Details</li>
                </ol>
            </nav>
        </div>
    </div>

    <section class="section">
        <?php if (!empty($contact_informations->office)) { 
        $office_contact_info = $contact_informations->office; ?>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Registered Office Contact Details</h5>
                <form id="office_contact_details_form">
                    <input type="hidden" name="uid" value="<?=$office_contact_info->uid?>">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" name="company_name" id="company_name" class="form-control" 
                                placeholder="Enter Company Name Here..." required value="<?=$office_contact_info->company_name?>">
                                <label for="company_name">Company Name</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <input type="email" name="email" id="email" class="form-control" 
                                placeholder="Enter Email Here..." value="<?=$office_contact_info->email?>">
                                <label for="email">Email</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <input type="tel" name="phone" id="phone" class="form-control" 
                                placeholder="Enter Phone Here..." value="<?=$office_contact_info->phone?>">
                                <label for="phone">Phone</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <input type="tel" name="landline" id="landline" class="form-control" 
                                placeholder="Enter Landline Here..." value="<?=$office_contact_info->landline?>">
                                <label for="landline">Landline</label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-floating mb-3">
                                <textarea name="address" id="address" class="form-control" placeholder="Write the address here..." required style="height:120px;"><?=$office_contact_info->address?></textarea>
                                <label for="address">Address</label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-floating mb-3">
                                <input type="text" name="map_embeded_link" id="map_embeded_link" class="form-control" 
                                placeholder="Enter Map Embeded Link Here..." required value="<?=$office_contact_info->map_embeded_link?>">
                                <label for="map_embeded_link">Google Map Embeded Link</label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mt-3 text-end">
                                <button type="submit" id="office_contact_details_form_submit_button" class="btn btn-primary" style="width:60.64px; height:38px;">Save</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <?php } ?>

        <?php if (!empty($contact_informations->factory)) { 
        $factory_contact_info = $contact_informations->factory; ?>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Factory Contact Details</h5>
                <form id="factory_contact_details_form">
                    <input type="hidden" name="uid" value="<?=$factory_contact_info->uid?>">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" name="company_name" id="company_name" class="form-control" 
                                placeholder="Enter Company Name Here..." required value="<?=$factory_contact_info->company_name?>">
                                <label for="company_name">Company Name</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <input type="email" name="email" id="email" class="form-control" 
                                placeholder="Enter Email Here..." value="<?=$factory_contact_info->email?>">
                                <label for="email">Email</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <input type="tel" name="phone" id="phone" class="form-control" 
                                placeholder="Enter Phone Here..." value="<?=$factory_contact_info->phone?>">
                                <label for="phone">Phone</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <input type="tel" name="landline" id="landline" class="form-control" 
                                placeholder="Enter Landline Here..." value="<?=$factory_contact_info->landline?>">
                                <label for="landline">Landline</label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-floating mb-3">
                                <textarea name="address" id="address" class="form-control" placeholder="Write the address here..." required style="height:120px;"><?=$factory_contact_info->address?></textarea>
                                <label for="address">Address</label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-floating mb-3">
                                <input type="text" name="map_embeded_link" id="map_embeded_link" class="form-control" 
                                placeholder="Enter Map Embeded Link Here..." required value="<?=$factory_contact_info->map_embeded_link?>">
                                <label for="map_embeded_link">Google Map Embeded Link</label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mt-3 text-end">
                                <button type="submit" id="factory_contact_details_form_submit_button" class="btn btn-primary" style="width:60.64px; height:38px;">Save</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <?php } ?>
    </section>
</main>

<script>

    $("#office_contact_details_form").submit(function(e){
        e.preventDefault();
        let formData = new FormData(this);
        let submitButton = $("#office_contact_details_form_submit_button");
        saveContactInformations(this, formData, submitButton); 
    });

    $("#factory_contact_details_form").submit(function(e){
        e.preventDefault();
        let formData = new FormData(this);
        let submitButton = $("#factory_contact_details_form_submit_button");
        saveContactInformations(this, formData, submitButton); 
    });

    function saveContactInformations(form, formData, submitButton) {
        let submitButtonText = submitButton.text();
        $.ajax({
            url: "<?=base_url('admin/contact-details/edit')?>",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            beforeSend: function() {
                submitButton.prop("disabled", true);
                submitButton.html(btnLoader);
            },
            complete: function() {
                submitButton.html(submitButtonText);
                submitButton.prop("disabled", false);
            },
            error: function(a, b, c) {
                toast("Something went wrong! Failed to save contact informations.", 3000);
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
                    toast("Something went wrong! Failed to save contact informations.", 3000);
                    console.log(response);
                }
            }
        });
    }

</script>