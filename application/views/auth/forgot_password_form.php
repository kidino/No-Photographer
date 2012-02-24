<?php $this->load->view('layout/header'); ?>
  <div class="row">
	<div class="span6 offset3 well2">
<?php
$login = array(
	'name'	=> 'login',
	'id'	=> 'login',
	'value' => set_value('login'),
	'maxlength'	=> 80,
	'size'	=> 30,
);
if ($this->config->item('use_username', 'tank_auth')) {
	$login_label = 'Email or login';
} else {
	$login_label = 'Email';
}
?>

<ul class="nav nav-tabs">
  <li><a href="<?php echo site_url('auth/login'); ?>">Login</a></li>
  <li class="active"><a href="<?php echo site_url('auth/forgot_password'); ?>">Forget Password</a></li>
</ul>

<?php echo form_open($this->uri->uri_string()); ?>
<h3>Forget Password</h3>
<table>
	<tr>
		<td><?php echo form_label($login_label, $login['id']); ?></td>
		<td><?php echo form_input($login); ?></td>
		<td style="color: red;"><?php echo form_error($login['name']); ?><?php echo isset($errors[$login['name']])?$errors[$login['name']]:''; ?></td>
	</tr>
	<tr>
		<td> </td>
		<td colspan="2"><button type="submit" class="btn">Get a new password</button></td>
	</tr>
</table>
			
<?php echo form_close(); ?>

</div>
</div>
<?php $this->load->view('layout/footer'); ?>