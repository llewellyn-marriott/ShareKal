<?php /* Smarty version 2.6.26, created on 2010-12-05 22:43:37
         compiled from content/continue.tpl */ ?>
<div class="box3-wrapper">
	<div class="box3-header"> <a href="#"><?php echo $this->_tpl_vars['page_name']; ?>
 - Continue</a> </div>
	<div class="box3-content">
		<?php unset($this->_sections['continue']);
$this->_sections['continue']['name'] = 'continue';
$this->_sections['continue']['loop'] = is_array($_loop=$this->_tpl_vars['messages']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['continue']['show'] = true;
$this->_sections['continue']['max'] = $this->_sections['continue']['loop'];
$this->_sections['continue']['step'] = 1;
$this->_sections['continue']['start'] = $this->_sections['continue']['step'] > 0 ? 0 : $this->_sections['continue']['loop']-1;
if ($this->_sections['continue']['show']) {
    $this->_sections['continue']['total'] = $this->_sections['continue']['loop'];
    if ($this->_sections['continue']['total'] == 0)
        $this->_sections['continue']['show'] = false;
} else
    $this->_sections['continue']['total'] = 0;
if ($this->_sections['continue']['show']):

            for ($this->_sections['continue']['index'] = $this->_sections['continue']['start'], $this->_sections['continue']['iteration'] = 1;
                 $this->_sections['continue']['iteration'] <= $this->_sections['continue']['total'];
                 $this->_sections['continue']['index'] += $this->_sections['continue']['step'], $this->_sections['continue']['iteration']++):
$this->_sections['continue']['rownum'] = $this->_sections['continue']['iteration'];
$this->_sections['continue']['index_prev'] = $this->_sections['continue']['index'] - $this->_sections['continue']['step'];
$this->_sections['continue']['index_next'] = $this->_sections['continue']['index'] + $this->_sections['continue']['step'];
$this->_sections['continue']['first']      = ($this->_sections['continue']['iteration'] == 1);
$this->_sections['continue']['last']       = ($this->_sections['continue']['iteration'] == $this->_sections['continue']['total']);
?>
		<?php echo $this->_tpl_vars['messages'][$this->_sections['continue']['index']]; ?>
<br />
		<?php endfor; endif; ?>
		<a href="<?php echo $this->_tpl_vars['continue_url']; ?>
">Continue</a> </div>
		<div class="box3-footer">
	</div>
</div>