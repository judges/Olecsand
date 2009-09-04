<html><head>
<title>Весільний світ</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>
<body leftmargin="0" topmargin="0" bgcolor="#000000" marginheight="0" marginwidth="0">
<div align="center">
  <table id="Table_01" align="center" border="0" cellpadding="0" cellspacing="0" width="800" height="600">
    <tbody><tr>
      <td colspan="3">
        <img src="<?php echo base_url()?>images/index_01.jpg" alt="" width="800" height="163"></td>
    </tr>
    <tr valign="top">
        <td rowspan="2" style="background-image:url(/images/index_02.jpg)" width="328" height="411" align="right">
<?php
$username = array(
	'name'	=> 'username',
	'id'	=> 'username',
	'size'	=> 20,
	'value' => set_value('username')
);

$password = array(
	'name'	=> 'password',
	'id'	=> 'password',
	'size'	=> 20
);

$remember = array(
	'name'	=> 'remember',
	'id'	=> 'remember',
	'value'	=> 1,
	'checked'	=> set_value('remember'),
	'style' => 'margin:0;padding:0'
);

$confirmation_code = array(
	'name'	=> 'captcha',
	'id'	=> 'captcha',
	'maxlength'	=> 8
);

?>
<?php echo form_open($this->uri->uri_string())?>
<?php echo $this->dx_auth->get_auth_error(); ?>

<dl>
	<dt><?php echo form_label('Username', $username['id']);?></dt>
	<dd>
		<?php echo form_input($username)?>
    <?php echo form_error($username['name']); ?>
	</dd>

  <dt><?php echo form_label('Password', $password['id']);?></dt>
	<dd>
		<?php echo form_password($password)?>
    <?php echo form_error($password['name']); ?>
	</dd>

<?php if ($show_captcha): ?>

	<dt>Enter the code exactly as it appears. There is no zero.</dt>
	<dd><?php echo $this->dx_auth->get_captcha_image(); ?></dd>

	<dt><?php echo form_label('Confirmation Code', $confirmation_code['id']);?></dt>
	<dd>
		<?php echo form_input($confirmation_code);?>
		<?php echo form_error($confirmation_code['name']); ?>
	</dd>

<?php endif; ?>

	<dt></dt>
	<dd>
		<?php echo form_checkbox($remember);?> <?php echo form_label('Remember me', $remember['id']);?>
		<?php echo anchor($this->dx_auth->forgot_password_uri, 'Forgot password');?>
		<?php 
			if ($this->dx_auth->allow_registration) {
				echo anchor($this->dx_auth->register_uri, 'Register');
			};
		?>
	</dd>

	<dt></dt>
	<dd><?php echo form_submit('login','Login');?></dd>
</dl>
<?php echo form_close()?>
        </td>
        <td>
            <img src="<?php echo base_url()?>images/index_03.jpg" alt="" border="0" width="329" height="298"></td>
        <td rowspan="2">
            <img src="<?php echo base_url()?>images/index_04.jpg" alt="" width="143" height="411">
        </td>
    </tr>
    <tr>
        <td>
            <img src="<?php echo base_url()?>images/index_05.jpg" alt="" width="329" height="113">
        </td>
    </tr>
    <tr>
      <td colspan="3">
        <img src="<?php echo base_url()?>images/index_06.gif" alt="" width="800" height="26"></td>
    </tr>
  </tbody></table>
</div>
</body></html>


