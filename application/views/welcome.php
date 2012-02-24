<?php $this->load->view('layout/header'); ?>

Hi, <strong><?php echo $username; ?></strong>! 

<?php if($user_id > 0) {?>
You are logged in now. <?php echo anchor('/auth/logout', 'Logout'); ?>
<?php } else { ?>
Care to login now? <?php echo anchor('/auth/login', 'Login'); ?>
<?php } ?>

<?php $this->load->view('layout/footer'); ?>
