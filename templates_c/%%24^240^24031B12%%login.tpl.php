<?php /* Smarty version 2.6.26, created on 2010-12-05 18:05:18
         compiled from content/account/login.tpl */ ?>
<div class="box3-wrapper">
	<div class="box3-header"> <a href="#"><?php echo $this->_tpl_vars['page_name']; ?>
</a> </div>
	<div class="box3-content"> <?php if ($this->_tpl_vars['error'] != ""): ?>
		<div class="error"><?php echo $this->_tpl_vars['error']; ?>
</div>
		<?php endif; ?>
		<form action="<?php echo $this->_tpl_vars['settings']['site']['root']; ?>
/board/account/login" method="post">
			<strong>Username:</strong><br />
			<input class="text_field" autocomplete="off" name="username" type="text" />
			<br />
			<strong>Password:</strong><br />
			<input class="text_field" autocomplete="off" name="password" type="password" maxlength="8" />
			<br />
			<input type="submit" value="Login" />
			<input type="hidden" name="redirect" value="<?php echo $this->_tpl_vars['request']['redirect']; ?>
" />
		</form>
		<br />
		<a href="<?php echo $this->_tpl_vars['settings']['site']['root']; ?>
/board/account/recoverdetails">Forgot Login?</a><br />
	</div>
	<div class="box3-footer">
	</div>
</div>