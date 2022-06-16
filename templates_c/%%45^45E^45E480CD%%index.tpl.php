<?php /* Smarty version 2.6.26, created on 2010-12-05 18:04:35
         compiled from index.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "head.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<body onLoad="LoadEvents(<?php echo $this->_tpl_vars['event_count']; ?>
, '<?php echo $this->_tpl_vars['settings']['site']['root']; ?>
/<?php echo $this->_tpl_vars['settings']['theme']['root']; ?>
/images/events/events.jpg')">

<div id="wrapper">
<div id="header"></div>
	<div id="top-menu"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "menu.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></div>
	<div id="content-wrapper">
		<div id="sidebar">
			<?php if ($this->_tpl_vars['current_user']['SiteAdmin'] < 0): ?>
			<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "sidebar/login.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
			<?php endif; ?>
			<?php if ($this->_tpl_vars['current_user']['SiteAdmin'] >= 0): ?>
			<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "sidebar/account.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
			<?php endif; ?>
			<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "sidebar/menu.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
			<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "sidebar/server_status.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
		</div>
		<div id="content"> <?php echo $this->_tpl_vars['content']; ?>
 </div>
	</div>
	<!-- Do not remove credits, thanks -->
	<div id="footer">Site coded and designed by <a href="mailto:arty@arturasserver.com">Arturas</a><br>
	Page generated in <?php echo $this->_tpl_vars['gen_time']; ?>
 seconds.<br>
Version <a href="http://www.arturasserver.com/?page=viewproject&prid=3"><?php echo $this->_tpl_vars['version']; ?>
</a>
</div>
</div>

</body>
</html>