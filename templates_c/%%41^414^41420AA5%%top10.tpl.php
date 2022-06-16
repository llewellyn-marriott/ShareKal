<?php /* Smarty version 2.6.26, created on 2010-12-05 18:04:35
         compiled from sidebar/top10.tpl */ ?>
<div class="box1-wrapper">
	<div class="box1-header"> <a href="#">Top 10</a> </div>
	<div class="box1-content">
	<ol class="top10-list">
	<?php unset($this->_sections['top10']);
$this->_sections['top10']['name'] = 'top10';
$this->_sections['top10']['loop'] = is_array($_loop=$this->_tpl_vars['top10']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['top10']['show'] = true;
$this->_sections['top10']['max'] = $this->_sections['top10']['loop'];
$this->_sections['top10']['step'] = 1;
$this->_sections['top10']['start'] = $this->_sections['top10']['step'] > 0 ? 0 : $this->_sections['top10']['loop']-1;
if ($this->_sections['top10']['show']) {
    $this->_sections['top10']['total'] = $this->_sections['top10']['loop'];
    if ($this->_sections['top10']['total'] == 0)
        $this->_sections['top10']['show'] = false;
} else
    $this->_sections['top10']['total'] = 0;
if ($this->_sections['top10']['show']):

            for ($this->_sections['top10']['index'] = $this->_sections['top10']['start'], $this->_sections['top10']['iteration'] = 1;
                 $this->_sections['top10']['iteration'] <= $this->_sections['top10']['total'];
                 $this->_sections['top10']['index'] += $this->_sections['top10']['step'], $this->_sections['top10']['iteration']++):
$this->_sections['top10']['rownum'] = $this->_sections['top10']['iteration'];
$this->_sections['top10']['index_prev'] = $this->_sections['top10']['index'] - $this->_sections['top10']['step'];
$this->_sections['top10']['index_next'] = $this->_sections['top10']['index'] + $this->_sections['top10']['step'];
$this->_sections['top10']['first']      = ($this->_sections['top10']['iteration'] == 1);
$this->_sections['top10']['last']       = ($this->_sections['top10']['iteration'] == $this->_sections['top10']['total']);
?>
	<li><a href="<?php echo $this->_tpl_vars['settings']['site']['root']; ?>
/board/player/view?pid=<?php echo $this->_tpl_vars['top10'][$this->_sections['top10']['index']]['PID']; ?>
&sid=<?php echo $this->_tpl_vars['top10'][$this->_sections['top10']['index']]['Server']['SID']; ?>
"><?php echo $this->_tpl_vars['top10'][$this->_sections['top10']['index']]['Name']; ?>
</a></li>
	<?php endfor; endif; ?>
	</ol>
	</div>
	<div class="box1-footer">
		</div>
</div>