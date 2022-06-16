<?php /* Smarty version 2.6.26, created on 2010-12-05 18:04:35
         compiled from sidebar/server_status.tpl */ ?>
<div class="box1-wrapper">
	<div class="box1-header"> <a href="#">Server Status</a> </div>
	<div class="box1-content"> <?php unset($this->_sections['status']);
$this->_sections['status']['name'] = 'status';
$this->_sections['status']['loop'] = is_array($_loop=$this->_tpl_vars['servers_status']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['status']['show'] = true;
$this->_sections['status']['max'] = $this->_sections['status']['loop'];
$this->_sections['status']['step'] = 1;
$this->_sections['status']['start'] = $this->_sections['status']['step'] > 0 ? 0 : $this->_sections['status']['loop']-1;
if ($this->_sections['status']['show']) {
    $this->_sections['status']['total'] = $this->_sections['status']['loop'];
    if ($this->_sections['status']['total'] == 0)
        $this->_sections['status']['show'] = false;
} else
    $this->_sections['status']['total'] = 0;
if ($this->_sections['status']['show']):

            for ($this->_sections['status']['index'] = $this->_sections['status']['start'], $this->_sections['status']['iteration'] = 1;
                 $this->_sections['status']['iteration'] <= $this->_sections['status']['total'];
                 $this->_sections['status']['index'] += $this->_sections['status']['step'], $this->_sections['status']['iteration']++):
$this->_sections['status']['rownum'] = $this->_sections['status']['iteration'];
$this->_sections['status']['index_prev'] = $this->_sections['status']['index'] - $this->_sections['status']['step'];
$this->_sections['status']['index_next'] = $this->_sections['status']['index'] + $this->_sections['status']['step'];
$this->_sections['status']['first']      = ($this->_sections['status']['iteration'] == 1);
$this->_sections['status']['last']       = ($this->_sections['status']['iteration'] == $this->_sections['status']['total']);
?> <strong><?php echo $this->_tpl_vars['servers_status'][$this->_sections['status']['index']]['Name']; ?>
</strong><br />
		<div class="server-status"><font color="<?php if ($this->_tpl_vars['servers_status'][$this->_sections['status']['index']]['Status'] == 1): ?>green<?php else: ?>red<?php endif; ?>"><?php if ($this->_tpl_vars['servers_status'][$this->_sections['status']['index']]['Status'] == 1): ?>Online<?php else: ?>Offline<?php endif; ?></font></div>
		<?php endfor; endif; ?>
		 </div>
	<div class="box1-footer"> </div>
</div>