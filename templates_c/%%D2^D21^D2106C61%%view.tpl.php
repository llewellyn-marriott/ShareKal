<?php /* Smarty version 2.6.26, created on 2010-12-05 22:51:25
         compiled from content/player/view.tpl */ ?>
<div class="box3-wrapper">
	<div class="box3-header"> <a href="#"><?php echo $this->_tpl_vars['page_name']; ?>
</a> </div>
	<div class="box3-content">
		<table width="400" border="0">
			<tr>
				<td width="130" rowspan="6"><img src="<?php echo $this->_tpl_vars['settings']['site']['root']; ?>
/<?php echo $this->_tpl_vars['settings']['theme']['root']; ?>
/images/<?php echo $this->_tpl_vars['player']['ClassName']; ?>
_med.jpg" /></td>
				<td colspan="2"><strong><?php echo $this->_tpl_vars['player']['NameLink']; ?>
</strong></td>
			</tr>
			<tr>
				<td colspan="2"><?php echo $this->_tpl_vars['player']['Level']; ?>
 <?php echo $this->_tpl_vars['player']['SpecialtyName']; ?>
</td>
			</tr>
			<tr>
				<td colspan="2"><em><?php echo $this->_tpl_vars['player']['Server']['Name']; ?>
</em></td>
			</tr>
			<tr>
				<td width="100">Guild:</td>
				<td><strong><a href="<?php echo $this->_tpl_vars['settings']['site']['root']; ?>
/board/guild/view?gid=<?php echo $this->_tpl_vars['player']['Guild']['GID']; ?>
&sid=<?php echo $this->_tpl_vars['player']['Guild']['Server']['SID']; ?>
"><?php echo $this->_tpl_vars['player']['Guild']['Name']; ?>
</a></strong></td>
			</tr>
			<tr>
				<td>Contribution:</td>
				<td><strong><?php echo $this->_tpl_vars['player']['SUPoint']; ?>
</strong></td>
			</tr>
			<tr>
				<td>Rank:</td>
				<td><?php echo $this->_tpl_vars['player']['Rank']['Name']; ?>
</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td colspan="2">&nbsp;</td>
			</tr>
			<tr>
				<td>
				<table width="125">
						<tr>
							<td>Health Point:</td>
							<td><strong><?php echo $this->_tpl_vars['player']['CurHP']; ?>
</strong></td>
						</tr>
						<tr>
							<td>Magic Point:</td>
							<td><strong><?php echo $this->_tpl_vars['player']['CurMP']; ?>
</strong></td>
						</tr>
						<tr>
							<td>Strength:</td>
							<td><strong><?php echo $this->_tpl_vars['player']['Strength']; ?>
</strong></td>
						</tr>
						<tr>
							<td>Health:</td>
							<td><strong><?php echo $this->_tpl_vars['player']['Health']; ?>
</strong></td>
						</tr>
						<tr>
							<td>Intelligence:</td>
							<td><strong><?php echo $this->_tpl_vars['player']['Intelligence']; ?>
</strong></td>
						</tr>
						<tr>
							<td>Wisdom:</td>
							<td><strong><?php echo $this->_tpl_vars['player']['Wisdom']; ?>
</strong></td>
						</tr>
						<tr>
							<td>Agility:</td>
							<td><strong><?php echo $this->_tpl_vars['player']['Dexterity']; ?>
</strong></td>
						</tr>
						<tr>
							<td>Stat Points:</td>
							<td><strong><?php echo $this->_tpl_vars['player']['PUPoint']; ?>
</strong></td>
						</tr>
					</table></td>
				<td colspan="2" id="player-links"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "player_links.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></td>
				</td>
			</tr>
		</table>
	</div>
	<div class="box3-footer"> </div>
</div>