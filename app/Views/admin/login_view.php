<div class="container login-form-card-container">
    <div class="col-md-5">
        <div class="card o-hidden border-0 shadow-lg">
            <div class="card-body p-0">
                <div class="p-5">
                    <div class="text-center">
                        <img src="<?=base_url('assets/client/images/logo.png')?>" alt="Locaguide logo" width="60" class="mb-2">
                        <h1 class="h4 text-gray-900 mb-4">Admin Login</h1>
                    </div>
                    <form class="user">
                        <div class="form-group">
                            <input type="email" class="form-control form-control-user"
                                id="exampleInputEmail" aria-describedby="emailHelp"
                                placeholder="Enter Email Address...">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control form-control-user"
                                id="exampleInputPassword" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-checkbox small">
                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                <label class="custom-control-label" for="customCheck">Remember
                                    Me</label>
                            </div>
                        </div>
                        <a href="index.html" class="btn btn-primary btn-user btn-block">
                            Login
                        </a>
                    </form>
                    <hr>
                    <div class="text-center">
                        <a class="small" href="forgot-password.html">Forgot Password?</a>
                    </div>
                    <div class="text-center">
                        <a class="small" href="<?=base_url('admin/signup')?>">Create an Account!</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>