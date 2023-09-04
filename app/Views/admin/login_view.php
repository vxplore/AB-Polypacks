<div class="container login-form-card-container">
    <div class="col-md-5">
        <div class="card o-hidden border-0 shadow-lg">
            <div class="card-body p-0">
                <div class="p-5">
                    <div class="text-center">
                        <img src="<?=base_url('assets/client/images/logo.png')?>" alt="Locaguide logo" width="80" class="mb-2">
                        <h1 class="h4 text-gray-900 mb-4">Admin Login</h1>
                    </div>
                    <form id="login_form">
                        <div class="form-group">
                            <input type="email" name="email" class="form-control form-control-user" placeholder="Email" required>
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control form-control-user" placeholder="Password" required>
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-checkbox small">
                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                <label class="custom-control-label pt-1" for="customCheck">Remember
                                    Me</label>
                            </div>
                        </div>
                        <button type="submit" id="login_form_submit_button" class="btn btn-primary btn-user btn-block">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>

    $("#login_form").submit(function(){
        let form = document.getElementById("login_form");
        let formData = new FormData(form);
        let submit_button = document.getElementById("login_form_submit_button");

    });

</script>