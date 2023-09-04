<div class="container login-form-card-container">
    <div class="col-md-5">
        <div class="card o-hidden border-0 shadow-lg">
            <div class="card-body p-0">
                <div class="p-5">
                    <div class="text-center">
                        <img src="<?=base_url('assets/client/images/logo.png')?>" alt="Locaguide logo" width="60" class="mb-2">
                        <h1 class="h4 text-gray-900 mb-4">Admin Signup</h1>
                    </div>
                    <form class="user">
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" id="exampleFirstName" placeholder="Username">
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control form-control-user" id="exampleInputEmail"
                                placeholder="Email Address">
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-user" id="exampleRepeatPassword" placeholder="Repeat Password">
                                </div>
                            </div>
                        </div>
                        <a href="login.html" class="btn btn-primary btn-user btn-block">
                            Register Account
                        </a>
                    </form>
                    <hr>
                    <div class="text-center">
                        <a class="small" href="forgot-password.html">Forgot Password?</a>
                    </div>
                    <div class="text-center">
                        <a class="small" href="<?=base_url('admin')?>">Already have an account? Login!</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>