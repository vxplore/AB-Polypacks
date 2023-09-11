<main>
    <div class="container">
        <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
            <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
                <div class="card mb-3">
                <div class="card-body">

                    <div class="d-flex justify-content-center pt-4 pb-1">
                        <a href="index.html" class="d-flex align-items-center">
                            <img src="<?=base_url('assets/client/images/logo.png')?>" alt="Locaguide logo" width="60">
                        </a>
                    </div>

                    <div class="pt-0 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Admin Login</h5>
                    </div>

                    <form id="login_form" class="row g-3 needs-validation" novalidate>
                        <div class="col-12">
                            <label for="email" class="form-label">Email</label>
                            <div class="input-group has-validation">
                                <span class="input-group-text" id="inputGroupPrepend">@</span>
                                <input type="email" name="email" class="form-control" id="email" required>
                                <div class="invalid-feedback">Please enter your email!</div>
                            </div>
                        </div>

                        <div class="col-12">
                            <label for="password" class="form-label">Password</label>
                            <div class="input-group has-validation">
                                <span class="input-group-text toggle-password" onclick="togglePasswordVisibility()" style="cursor:pointer;">
                                    <i class="bi bi-eye"></i>
                                </span>
                                <input type="password" name="password" class="form-control" id="password" required>
                                <div class="invalid-feedback">Please enter your password!</div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="remember_me">
                            <label class="form-check-label" for="remember_me">Remember me</label>
                            </div>
                        </div>

                        <div class="col-12">
                            <button id="login_form_submit_button" class="btn btn-primary w-100">Login</button>
                        </div>
                    </form>
                </div>
                </div>
            </div>
            </div>
        </div>
        </section>
    </div>
</main><!-- End #main -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<script>
    
    document.getElementById("login_form").addEventListener("submit", function(e) {
        e.preventDefault();
        let form = document.getElementById("login_form");
        let formData = new FormData(form);

        $.ajax({
            url: "<?=base_url('admin/verify-user')?>",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            error: function(a, b, c) {
                toast("Something went wrong! Failed to verify user.", 3000);
                console.log(a);
                console.log(b);
                console.log(c);
            },
            success: function(response) {
                console.log(response);
                if (response.status == true) {
                    if (response.data.hasOwnProperty("redirect_to")) {
                        location.href = response.data.redirect_to;
                    }
                    else {
                        location.href = "<?=base_url('admin/dashboard')?>";
                    }
                }
                else if (response.status == false) {
                    toast(response.message, 3000);
                }
                else {
                    toast("Something went wrong! Failed to verify user.", 3000);
                    console.log(response);
                }
            }
        });
    });

    function togglePasswordVisibility() {
        var passwordField = document.getElementById("password");
        var toggleIcon = document.querySelector(".toggle-password i");

        if (passwordField.type === "password") {
            passwordField.type = "text";
            toggleIcon.classList.remove("bi-eye");
            toggleIcon.classList.add("bi-eye-slash");
        } else {
            passwordField.type = "password";
            toggleIcon.classList.remove("bi-eye-slash");
            toggleIcon.classList.add("bi-eye");
        }
    }

</script>