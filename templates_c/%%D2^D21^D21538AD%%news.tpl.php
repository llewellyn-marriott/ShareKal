<?php /* Smarty version 2.6.26, created on 2010-12-05 18:04:35
         compiled from content/community/news.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'math', 'content/community/news.tpl', 6, false),array('modifier', 'nl2br', 'content/community/news.tpl', 17, false),)), $this); ?>
<div id="content-box-wrapper">
	<div class="box5-wrapper">
		<div class="box5-content" id="event-box"> <a id="active-event-button" href="#">&nbsp;</a>
			<div class="event-controls"> <?php unset($this->_sections['event_box']);
$this->_sections['event_box']['name'] = 'event_box';
$this->_sections['event_box']['loop'] = is_array($_loop=$this->_tpl_vars['events']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['event_box']['show'] = true;
$this->_sections['event_box']['max'] = $this->_sections['event_box']['loop'];
$this->_sections['event_box']['step'] = 1;
$this->_sections['event_box']['start'] = $this->_sections['event_box']['step'] > 0 ? 0 : $this->_sections['event_box']['loop']-1;
if ($this->_sections['event_box']['show']) {
    $this->_sections['event_box']['total'] = $this->_sections['event_box']['loop'];
    if ($this->_sections['event_box']['total'] == 0)
        $this->_sections['event_box']['show'] = false;
} else
    $this->_sections['event_box']['total'] = 0;
if ($this->_sections['event_box']['show']):

            for ($this->_sections['event_box']['index'] = $this->_sections['event_box']['start'], $this->_sections['event_box']['iteration'] = 1;
                 $this->_sections['event_box']['iteration'] <= $this->_sections['event_box']['total'];
                 $this->_sections['event_box']['index'] += $this->_sections['event_box']['step'], $this->_sections['event_box']['iteration']++):
$this->_sections['event_box']['rownum'] = $this->_sections['event_box']['iteration'];
$this->_sections['event_box']['index_prev'] = $this->_sections['event_box']['index'] - $this->_sections['event_box']['step'];
$this->_sections['event_box']['index_next'] = $this->_sections['event_box']['index'] + $this->_sections['event_box']['step'];
$this->_sections['event_box']['first']      = ($this->_sections['event_box']['iteration'] == 1);
$this->_sections['event_box']['last']       = ($this->_sections['event_box']['iteration'] == $this->_sections['event_box']['total']);
?>
				<input type="hidden" id="event-<?php echo $this->_tpl_vars['events'][$this->_sections['event_box']['index']]['EID']; ?>
-url" value="<?php if ($this->_tpl_vars['events'][$this->_sections['event_box']['index']]['Local']): ?><?php echo $this->_tpl_vars['settings']['site']['root']; ?>
/board/<?php endif; ?><?php echo $this->_tpl_vars['events'][$this->_sections['event_box']['index']]['URL']; ?>
" />
				<a href="javascript:ChangeEvent(<?php echo $this->_tpl_vars['events'][$this->_sections['event_box']['index']]['EID']; ?>
,true)"><?php echo smarty_function_math(array('equation' => "x + y",'x' => $this->_tpl_vars['events'][$this->_sections['event_box']['index']]['EID'],'y' => 1), $this);?>
</a> <?php endfor; endif; ?> </div>
		</div>
	</div>
	<?php unset($this->_sections['news']);
$this->_sections['news']['name'] = 'news';
$this->_sections['news']['loop'] = is_array($_loop=$this->_tpl_vars['posts']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['news']['show'] = true;
$this->_sections['news']['max'] = $this->_sections['news']['loop'];
$this->_sections['news']['step'] = 1;
$this->_sections['news']['start'] = $this->_sections['news']['step'] > 0 ? 0 : $this->_sections['news']['loop']-1;
if ($this->_sections['news']['show']) {
    $this->_sections['news']['total'] = $this->_sections['news']['loop'];
    if ($this->_sections['news']['total'] == 0)
        $this->_sections['news']['show'] = false;
} else
    $this->_sections['news']['total'] = 0;
if ($this->_sections['news']['show']):

            for ($this->_sections['news']['index'] = $this->_sections['news']['start'], $this->_sections['news']['iteration'] = 1;
                 $this->_sections['news']['iteration'] <= $this->_sections['news']['total'];
                 $this->_sections['news']['index'] += $this->_sections['news']['step'], $this->_sections['news']['iteration']++):
$this->_sections['news']['rownum'] = $this->_sections['news']['iteration'];
$this->_sections['news']['index_prev'] = $this->_sections['news']['index'] - $this->_sections['news']['step'];
$this->_sections['news']['index_next'] = $this->_sections['news']['index'] + $this->_sections['news']['step'];
$this->_sections['news']['first']      = ($this->_sections['news']['iteration'] == 1);
$this->_sections['news']['last']       = ($this->_sections['news']['iteration'] == $this->_sections['news']['total']);
?>
	<div class="box4-wrapper">
		<div class="box4-header">
			<div class="post-icon" style="background-image:url(<?php echo $this->_tpl_vars['settings']['site']['root']; ?>
/<?php echo $this->_tpl_vars['settings']['theme']['root']; ?>
/images/post_icons/<?php echo $this->_tpl_vars['posts'][$this->_sections['news']['index']]['Icon']; ?>
)"></div>
			<div class="post-title"><a href="#"><?php echo $this->_tpl_vars['posts'][$this->_sections['news']['index']]['Display_Subject']; ?>
</a></div>
		</div>
		<div class="box4-content">
			<div class="news-post-info">by <strong><?php echo $this->_tpl_vars['posts'][$this->_sections['news']['index']]['Poster']['PrimaryPlayer']['NameLink']; ?>
</strong> <?php echo $this->_tpl_vars['posts'][$this->_sections['news']['index']]['Date']; ?>
&nbsp;&nbsp;&nbsp;<?php if ($this->_tpl_vars['can_edit']): ?><a href="<?php echo $this->_tpl_vars['settings']['site']['root']; ?>
/board/community/news/post?nid=<?php echo $this->_tpl_vars['posts'][$this->_sections['news']['index']]['NID']; ?>
">Edit Post</a> - <a href="<?php echo $this->_tpl_vars['settings']['site']['root']; ?>
/board/community/news/post?delete=1&nid=<?php echo $this->_tpl_vars['posts'][$this->_sections['news']['index']]['NID']; ?>
">Delete Post</a><?php endif; ?></div>
			<div class="box"> <?php echo ((is_array($_tmp=$this->_tpl_vars['posts'][$this->_sections['news']['index']]['Display_Body'])) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
 </div>
		</div>
		<div class="box4-footer"> </div>
	</div>
	<?php endfor; endif; ?> </div>
<div id="sidebar2"> <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "sidebar/top10.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "sidebar/forum_links.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "sidebar/vote.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?> </div>