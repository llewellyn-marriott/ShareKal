<?php /* Smarty version 2.6.26, created on 2010-12-05 18:04:35
         compiled from sidebar/menu.tpl */ ?>
<div class="box1-wrapper">
	<div class="box1-header"> <a href="#">Menu</a> </div>
	<div class="box1-content"> <?php unset($this->_sections['sidebar_menu']);
$this->_sections['sidebar_menu']['name'] = 'sidebar_menu';
$this->_sections['sidebar_menu']['loop'] = is_array($_loop=$this->_tpl_vars['sidebar_menu_links']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['sidebar_menu']['show'] = true;
$this->_sections['sidebar_menu']['max'] = $this->_sections['sidebar_menu']['loop'];
$this->_sections['sidebar_menu']['step'] = 1;
$this->_sections['sidebar_menu']['start'] = $this->_sections['sidebar_menu']['step'] > 0 ? 0 : $this->_sections['sidebar_menu']['loop']-1;
if ($this->_sections['sidebar_menu']['show']) {
    $this->_sections['sidebar_menu']['total'] = $this->_sections['sidebar_menu']['loop'];
    if ($this->_sections['sidebar_menu']['total'] == 0)
        $this->_sections['sidebar_menu']['show'] = false;
} else
    $this->_sections['sidebar_menu']['total'] = 0;
if ($this->_sections['sidebar_menu']['show']):

            for ($this->_sections['sidebar_menu']['index'] = $this->_sections['sidebar_menu']['start'], $this->_sections['sidebar_menu']['iteration'] = 1;
                 $this->_sections['sidebar_menu']['iteration'] <= $this->_sections['sidebar_menu']['total'];
                 $this->_sections['sidebar_menu']['index'] += $this->_sections['sidebar_menu']['step'], $this->_sections['sidebar_menu']['iteration']++):
$this->_sections['sidebar_menu']['rownum'] = $this->_sections['sidebar_menu']['iteration'];
$this->_sections['sidebar_menu']['index_prev'] = $this->_sections['sidebar_menu']['index'] - $this->_sections['sidebar_menu']['step'];
$this->_sections['sidebar_menu']['index_next'] = $this->_sections['sidebar_menu']['index'] + $this->_sections['sidebar_menu']['step'];
$this->_sections['sidebar_menu']['first']      = ($this->_sections['sidebar_menu']['iteration'] == 1);
$this->_sections['sidebar_menu']['last']       = ($this->_sections['sidebar_menu']['iteration'] == $this->_sections['sidebar_menu']['total']);
?> <a href="<?php if ($this->_tpl_vars['sidebar_menu_links'][$this->_sections['sidebar_menu']['index']]['Local']): ?><?php echo $this->_tpl_vars['settings']['site']['root']; ?>
/board/<?php endif; ?><?php echo $this->_tpl_vars['sidebar_menu_links'][$this->_sections['sidebar_menu']['index']]['URL']; ?>
"><?php echo $this->_tpl_vars['sidebar_menu_links'][$this->_sections['sidebar_menu']['index']]['Text']; ?>
</a><br>
		<?php endfor; endif; ?> </div>
		<div class="box1-footer">
		</div>
</div>