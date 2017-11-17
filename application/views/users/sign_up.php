<!-- Register Content -->
<div class="content overflow-hidden">
    <div class="row">
        <div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 col-lg-4 col-lg-offset-4">
            <!-- Register Block -->

             <div class="alert hidden toast-message">
                <strong class="strong-message">!</strong> <span class="message"></span>
             </div>

            <div class="block block-themed animated fadeIn">
                <div class="block-header bg-primary">
                    <ul class="block-options">
                        <li>
                            <a href="#" data-toggle="modal" data-target="#modal-terms">View Terms</a>
                        </li>
                        <li>
                            <a href="http://localhost/ui/" data-toggle="tooltip" data-placement="left" title="Log In"><i class="si si-login"></i></a>
                        </li>
                    </ul>
                    <h3 class="block-title">Register</h3>
                </div>
                <div class="block-content block-content-full block-content-narrow">
                    <!-- Register Title -->
                    <h1 class="h2 font-w600 push-30-t push-5">OneUI</h1>
                    <p>Please fill the following details to create a new account.</p>
                    <!-- END Register Title -->

                    <!-- Register Form -->
                    <!-- jQuery Validation (.js-validation-register class is initialized in js/pages/base_pages_register.js) -->
                    <!-- For more examples you can check out https://github.com/jzaefferer/jquery-validation -->
                    <form class="form-horizontal push-50-t push-50 registration_form" id="registration_form" >
                        <div class="form-group">
                            <div class="col-xs-12">
                                <div class="form-material form-material-primary">
                                    <input class="form-control" type="text" id="register-username" name="register-username" placeholder="Please enter a username">
                                    <label for="register-username">Username</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <div class="form-material form-material-primary">
                                    <input class="form-control" type="email" id="register-email" name="register-email" placeholder="Please provide your email">
                                    <label for="register-email">Email</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <div class="form-material form-material-primary">
                                    <input class="form-control" type="password" id="register-password" name="register-password" placeholder="Choose a strong password..">
                                    <label for="register-password">Password</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <div class="form-material form-material-primary">
                                    <input class="form-control" type="password" id="register-password2" name="register-password2" placeholder="..and confirm it">
                                    <label for="register-password2">Confirm Password</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <label class="css-input switch switch-sm switch-success">
                                    <input type="checkbox" id="register-terms" name="register-terms"><span></span> I agree with terms &amp; conditions
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12 col-sm-6 col-md-5">
                                <button class="btn btn-block btn-primary" type="submit"><i class="fa fa-plus pull-right"></i> Sign Up</button>
                            </div>
                        </div>
                    </form>
                    <!-- END Register Form -->
                </div>
            </div>
            <!-- END Register Block -->
        </div>
    </div>
</div>
<!-- END Register Content -->