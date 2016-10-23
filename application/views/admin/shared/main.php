<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view('admin/shared/template_admin/head') ?>
</head>
<body>
    <div id="left_content">
        <?php $this->load->view('admin/shared/template_admin/left_content') ?>
    </div>
    <div id="rightSide">
        <?php $this->load->view('admin/shared/template_admin/header') ?>
        
        <!-- Content -->
        <?php $this->load->view($temp,$this->data) ?>
        <!-- End-Content -->

        <?php $this->load->view('admin/shared/template_admin/footer') ?>
    </div>
    <div class="clear"></div>
</body>
</html>