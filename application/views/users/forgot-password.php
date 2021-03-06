<!-- Reminder Content -->
<div class="content overflow-hidden">
    <div class="row">
        <div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 col-lg-4 col-lg-offset-4">
            <!-- Reminder Block -->

            <div class="alert hidden toast-message">
                <strong class="strong-message">!</strong> <span class="message">test</span>
            </div>

            <div class="block block-themed animated fadeIn">
                <div class="block-header bg-primary">
                    <ul class="block-options">
                        <li>
                            <a href="<?php echo base_url(); ?>" data-toggle="tooltip" data-placement="left" title="Log In"><i class="si si-login"></i></a>
                        </li>
                    </ul>
                    <h3 class="block-title">Password Reminder</h3>
                </div>
                <div class="block-content block-content-full block-content-narrow">
                    <!-- Reminder Title -->
                    <h1 class="h2 font-w600 push-30-t push-5">OneUI</h1>
                    <p>Please provide your account’s email and we will send you your password.</p>
                    <!-- END Reminder Title -->

                    <!-- Reminder Form -->
                    <!-- jQuery Validation (.js-validation-reminder class is initialized in js/pages/base_pages_reminder.js) -->
                    <!-- For more examples you can check out https://github.com/jzaefferer/jquery-validation -->
                    <form class="form-horizontal push-30-t push-50 forgot_password_form" id="forgot_password_form">
                        <div class="form-group">
                            <div class="col-xs-12">
                                <div class="form-material form-material-primary floating">
                                    <input class="form-control reminder-email" type="email" id="reminder-email" name="reminder-email">
                                    <label for="reminder-email">Email</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12 col-sm-6 col-md-5">
                                <button class="btn btn-block btn-primary" type="submit"><i class="si si-envelope-open pull-right"></i> Send Mail</button>
                            </div>
                        </div>
                    </form>
                    <!-- END Reminder Form -->
                </div>
            </div>
            <!-- END Reminder Block -->
        </div>
    </div>
</div>
<!-- END Reminder Content -->