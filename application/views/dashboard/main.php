<!DOCTYPE html>
<html>
<?php $this->load->view('common/head'); ?>
 <body>

  <div id="page-container" class="sidebar-l sidebar-o side-scroll header-navbar-fixed">

    <?php $this->load->view('common/sidebar'); ?>

    <?php $this->load->view('common/header'); ?>

    <?php $this->load->view($page_name); ?>

    <?php $this->load->view('common/footer'); ?>

   </div>
 </body>
</html>