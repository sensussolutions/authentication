<!-- Login Footer -->
<div class="push-10-t text-center animated fadeInUp">
    <small class="text-muted font-w600"><span class="js-year-copy"></span> &copy; OneUI 3.2</small>
</div>
<!-- END Login Footer -->

<!-- OneUI Core JS: jQuery, Bootstrap, slimScroll, scrollLock, Appear, CountTo, Placeholder, Cookie and App.js -->
<script src="assets/js/core/jquery.min.js"></script>
<script src="assets/js/core/bootstrap.min.js"></script>
<script src="assets/js/core/jquery.slimscroll.min.js"></script>
<script src="assets/js/core/jquery.scrollLock.min.js"></script>
<script src="assets/js/core/jquery.appear.min.js"></script>
<script src="assets/js/core/jquery.countTo.min.js"></script>
<script src="assets/js/core/jquery.placeholder.min.js"></script>
<script src="assets/js/core/js.cookie.min.js"></script>
<script src="assets/js/app.js"></script>
<?php if ($page_title == 'Sign In'){?>
<script src="assets/js/signin.js"></script>
<?php }else if($page_title == 'New User'){?>
    <script src="assets/js/signup.js"></script>
<?php } else if ($page_title == 'Forgot Password'){?>
    <script src="assets/js/forgot_password.js"></script>
<?php } else if($page_title == 'Password Reset'){?>
    <script src="assets/js/reset_password.js"></script>
<?php }?>
