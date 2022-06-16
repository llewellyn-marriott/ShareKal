<?php /* Smarty version 2.6.26, created on 2010-12-05 18:05:25
         compiled from sidebar/account.tpl */ ?>
<div class="box2-wrapper">
	<div class="box2-header"> <a href="#">Account</a> </div>
	<div class="box2-content"> Welcome, <b><?php echo $this->_tpl_vars['current_user']['ID']; ?>
</b><br />
		<br />
		Register Date:<br />
 <b><?php echo $this->_tpl_vars['current_user']['RegisterDate']; ?>
</b> <br />
		Email:<br />
 <b><?php echo $this->_tpl_vars['current_user']['Email']; ?>
</b><br />
		<br />

		<?php if ($this->_tpl_vars['current_user']['Activated'] == 0): ?>
		<div class="error">Your account isnt activated yet, you will not be able to play until you <a href="<?php echo $this->_tpl_vars['settings']['site']['root']; ?>
/board/account/activate">activate</a> it.</div>
		<br />
		<?php endif; ?>
		<div class="player-list"> <?php unset($this->_sections['playerlist']);
$this->_sections['playerlist']['name'] = 'playerlist';
$this->_sections['playerlist']['loop'] = is_array($_loop=$this->_tpl_vars['current_user']['Players']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['playerlist']['show'] = true;
$this->_sections['playerlist']['max'] = $this->_sections['playerlist']['loop'];
$this->_sections['playerlist']['step'] = 1;
$this->_sections['playerlist']['start'] = $this->_sections['playerlist']['step'] > 0 ? 0 : $this->_sections['playerlist']['loop']-1;
if ($this->_sections['playerlist']['show']) {
    $this->_sections['playerlist']['total'] = $this->_sections['playerlist']['loop'];
    if ($this->_sections['playerlist']['total'] == 0)
        $this->_sections['playerlist']['show'] = false;
} else
    $this->_sections['playerlist']['total'] = 0;
if ($this->_sections['playerlist']['show']):

            for ($this->_sections['playerlist']['index'] = $this->_sections['playerlist']['start'], $this->_sections['playerlist']['iteration'] = 1;
                 $this->_sections['playerlist']['iteration'] <= $this->_sections['playerlist']['total'];
                 $this->_sections['playerlist']['index'] += $this->_sections['playerlist']['step'], $this->_sections['playerlist']['iteration']++):
$this->_sections['playerlist']['rownum'] = $this->_sections['playerlist']['iteration'];
$this->_sections['playerlist']['index_prev'] = $this->_sections['playerlist']['index'] - $this->_sections['playerlist']['step'];
$this->_sections['playerlist']['index_next'] = $this->_sections['playerlist']['index'] + $this->_sections['playerlist']['step'];
$this->_sections['playerlist']['first']      = ($this->_sections['playerlist']['iteration'] == 1);
$this->_sections['playerlist']['last']       = ($this->_sections['playerlist']['iteration'] == $this->_sections['playerlist']['total']);
?>
			<a class="player" href="<?php echo $this->_tpl_vars['settings']['site']['root']; ?>
/board/player/view?pid=<?php echo $this->_tpl_vars['current_user']['Players'][$this->_sections['playerlist']['index']]['PID']; ?>
&sid=<?php echo $this->_tpl_vars['current_user']['Players'][$this->_sections['playerlist']['index']]['Server']['SID']; ?>
">
			<div class="class-icon" style="background-image: url(<?php echo $this->_tpl_vars['settings']['site']['root']; ?>
/<?php echo $this->_tpl_vars['settings']['theme']['root']; ?>
/images/<?php echo $this->_tpl_vars['current_user']['Players'][$this->_sections['playerlist']['index']]['ClassName']; ?>
_icon_med.png)"> </div>
			<div class="player-info">
				<div class="name"><?php echo $this->_tpl_vars['current_user']['Players'][$this->_sections['playerlist']['index']]['ColoredName']; ?>
</div>
				<div class="info"><?php echo $this->_tpl_vars['current_user']['Players'][$this->_sections['playerlist']['index']]['Level']; ?>
 <?php echo $this->_tpl_vars['current_user']['Players'][$this->_sections['playerlist']['index']]['SpecialtyName']; ?>
</div>
				<div class="info"><em><?php echo $this->_tpl_vars['current_user']['Players'][$this->_sections['playerlist']['index']]['Server']['Name']; ?>
</em></div>
			</div>
			</a> <?php endfor; endif; ?> </div>
		<br />
		<?php unset($this->_sections['links']);
$this->_sections['links']['name'] = 'links';
$this->_sections['links']['loop'] = is_array($_loop=$this->_tpl_vars['user_links']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['links']['show'] = true;
$this->_sections['links']['max'] = $this->_sections['links']['loop'];
$this->_sections['links']['step'] = 1;
$this->_sections['links']['start'] = $this->_sections['links']['step'] > 0 ? 0 : $this->_sections['links']['loop']-1;
if ($this->_sections['links']['show']) {
    $this->_sections['links']['total'] = $this->_sections['links']['loop'];
    if ($this->_sections['links']['total'] == 0)
        $this->_sections['links']['show'] = false;
} else
    $this->_sections['links']['total'] = 0;
if ($this->_sections['links']['show']):

            for ($this->_sections['links']['index'] = $this->_sections['links']['start'], $this->_sections['links']['iteration'] = 1;
                 $this->_sections['links']['iteration'] <= $this->_sections['links']['total'];
                 $this->_sections['links']['index'] += $this->_sections['links']['step'], $this->_sections['links']['iteration']++):
$this->_sections['links']['rownum'] = $this->_sections['links']['iteration'];
$this->_sections['links']['index_prev'] = $this->_sections['links']['index'] - $this->_sections['links']['step'];
$this->_sections['links']['index_next'] = $this->_sections['links']['index'] + $this->_sections['links']['step'];
$this->_sections['links']['first']      = ($this->_sections['links']['iteration'] == 1);
$this->_sections['links']['last']       = ($this->_sections['links']['iteration'] == $this->_sections['links']['total']);
?><a href="<?php if ($this->_tpl_vars['user_links'][$this->_sections['links']['index']]['Local']): ?><?php echo $this->_tpl_vars['settings']['site']['root']; ?>
/board/<?php endif; ?><?php echo $this->_tpl_vars['user_links'][$this->_sections['links']['index']]['URL']; ?>
"><?php echo $this->_tpl_vars['user_links'][$this->_sections['links']['index']]['Text']; ?>
</a><br />
		<?php endfor; endif; ?> </div>
		<div class="box2-footer">
		</div>
</div>