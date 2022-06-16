<?php /* Smarty version 2.6.26, created on 2010-12-05 18:04:35
         compiled from menu.tpl */ ?>
 <?php unset($this->_sections['menu']);
$this->_sections['menu']['name'] = 'menu';
$this->_sections['menu']['loop'] = is_array($_loop=$this->_tpl_vars['menu_links']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['menu']['show'] = true;
$this->_sections['menu']['max'] = $this->_sections['menu']['loop'];
$this->_sections['menu']['step'] = 1;
$this->_sections['menu']['start'] = $this->_sections['menu']['step'] > 0 ? 0 : $this->_sections['menu']['loop']-1;
if ($this->_sections['menu']['show']) {
    $this->_sections['menu']['total'] = $this->_sections['menu']['loop'];
    if ($this->_sections['menu']['total'] == 0)
        $this->_sections['menu']['show'] = false;
} else
    $this->_sections['menu']['total'] = 0;
if ($this->_sections['menu']['show']):

            for ($this->_sections['menu']['index'] = $this->_sections['menu']['start'], $this->_sections['menu']['iteration'] = 1;
                 $this->_sections['menu']['iteration'] <= $this->_sections['menu']['total'];
                 $this->_sections['menu']['index'] += $this->_sections['menu']['step'], $this->_sections['menu']['iteration']++):
$this->_sections['menu']['rownum'] = $this->_sections['menu']['iteration'];
$this->_sections['menu']['index_prev'] = $this->_sections['menu']['index'] - $this->_sections['menu']['step'];
$this->_sections['menu']['index_next'] = $this->_sections['menu']['index'] + $this->_sections['menu']['step'];
$this->_sections['menu']['first']      = ($this->_sections['menu']['iteration'] == 1);
$this->_sections['menu']['last']       = ($this->_sections['menu']['iteration'] == $this->_sections['menu']['total']);
?> <a href="<?php if ($this->_tpl_vars['menu_links'][$this->_sections['menu']['index']]['Local']): ?><?php echo $this->_tpl_vars['settings']['site']['root']; ?>
/board/<?php endif; ?><?php echo $this->_tpl_vars['menu_links'][$this->_sections['menu']['index']]['URL']; ?>
"><?php echo $this->_tpl_vars['menu_links'][$this->_sections['menu']['index']]['Text']; ?>
</a> <?php endfor; endif; ?> 

 <div id="search-bar">
<form action="<?php echo $this->_tpl_vars['settings']['site']['root']; ?>
/board/server/database/search" method="get">
 <input class="text-field" name="query" type="text" value="Database Search" onfocus="value=''" />
 <input type="submit" value="Search" />
 </form>
 </div>