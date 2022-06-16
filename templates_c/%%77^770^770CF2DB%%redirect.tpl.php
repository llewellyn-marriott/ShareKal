<?php /* Smarty version 2.6.26, created on 2010-12-05 18:05:23
         compiled from redirect.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'default', 'redirect.tpl', 6, false),array('function', 'math', 'redirect.tpl', 13, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "head.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<body>
<?php echo ' 
<script type="text/JavaScript">
<!--
setTimeout("location.href = \''; ?>
<?php echo $this->_tpl_vars['url']; ?>
<?php echo '\';",'; ?>
<?php echo ((is_array($_tmp=@$this->_tpl_vars['time'])) ? $this->_run_mod_handler('default', true, $_tmp, '3000') : smarty_modifier_default($_tmp, '3000')); ?>
<?php echo ');
-->
</script>'; ?>

<div id="redirect-box" class="box3-wrapper">
	<div class="box3-header"> <a href="#">Redirecting...</a> </div>
	<div class="box3-content"> <?php echo $this->_tpl_vars['message']; ?>
<br>
		<br>
		You will be redirected in <?php echo smarty_function_math(array('equation' => ($this->_tpl_vars['time'])."/1000"), $this);?>
 seconds, if not click <a href="<?php echo $this->_tpl_vars['url']; ?>
">here</a> </div>
		<div class="box3-footer"></div>
</div>

</body>