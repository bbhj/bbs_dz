<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); 
0
|| checktplrefresh('./template/default/home/space_share_form.htm', './template/default/common/seccheck.htm', 1536655812, '1', './data/template/1_1_home_space_share_form.tpl.php', './template/default', 'home/space_share_form')
;?>
<form id="shareform" name="shareform" action="home.php?mod=spacecp&amp;ac=share&amp;type=link&amp;view=<?php echo $_GET['view'];?>&amp;from=<?php echo $_GET['from'];?>" method="post" autocomplete="off" class="sfm" <?php if($_GET['view'] == 'me') { ?>onsubmit="ajaxpost(this.id, 'return_shareadd')"<?php } ?>>
<p class="mbn c cl"><span id="return_shareadd" class="y xi1"></span>分享网址、视频、音乐、Flash</p>
<p>
<input type="text" name="link" id="share_link" class="px vm" tabindex="1" onfocus="javascript:if('http://'==this.value)this.value='';$('share_desc').style.display='block';" onblur="javascript:if(''==this.value)this.value='http://';" value="http://" />&nbsp;
<button type="submit" name="sharesubmit_btn" id="sharesubmit_btn" class="pn vm" tabindex="3" value="true"><strong>分享</strong></button>
<a href="javascript:;" onclick="showDialog('<strong>如何分享视频？</strong><br/>填写视频所在网页的网址。(不需要填写视频的真实地址)<br/>我们支持的视频网站有：<br/>Youtube、优酷、酷6、Mofile、偶偶视频、56、新浪视频、搜狐视频。<br/><br/><strong>如何分享音乐？</strong><br/>填写音乐文件的地址。(后缀需要是 mp3 或者 wma)<br/><br/><strong>如何分享 Flash？</strong><br/>填写 Flash 文件的地址。(后缀需要是 swf)', 'notice', '分享说明', '', '', '', '');" class="xi2"><img src="<?php echo IMGDIR;?>/faq.gif" alt="faq" class="vm" /> 帮助</a>
</p>
<div id="share_desc" class="cl" style="display: none;">
<p class="mtm mbn">描述</p>
<p><textarea name="general" id="share_general" tabindex="2" rows="3" onkeydown="ctrlEnter(event, 'sharesubmit_btn')" class="pt"></textarea></p>
<?php if($secqaacheck || $seccodecheck) { ?><?php
$sectpl = <<<EOF
<sec> <span id="sec<hash>" onclick="showMenu(this.id)"><sec></span><div id="sec<hash>_menu" class="p_pop p_opt" style="display:none"><sec></div>
EOF;
?>
<div class="mtm sec"><?php $sechash = !isset($sechash) ? 'S'.($_G['inajax'] ? 'A' : '').$_G['sid'] : $sechash.random(3);
$sectpl = str_replace("'", "\'", $sectpl);?><?php if($secqaacheck) { ?>
<span id="secqaa_q<?php echo $sechash;?>"></span>		
<script type="text/javascript" reload="1">updatesecqaa('q<?php echo $sechash;?>', '<?php echo $sectpl;?>', '<?php echo $_G['basescript'];?>::<?php echo CURMODULE;?>');</script>
<?php } if($seccodecheck) { ?>
<span id="seccode_c<?php echo $sechash;?>"></span>		
<script type="text/javascript" reload="1">updateseccode('c<?php echo $sechash;?>', '<?php echo $sectpl;?>', '<?php echo $_G['basescript'];?>::<?php echo CURMODULE;?>');</script>
<?php } ?></div>
<?php } ?>
</div>
<input type="hidden" name="referer" value="home.php?mod=space&amp;uid=<?php echo $space['uid'];?>&amp;do=share&amp;view=me&amp;quickforward=1" />
<input type="hidden" name="sharesubmit" value="true" />
<input type="hidden" name="formhash" value="<?php echo FORMHASH;?>" />
<?php if($_GET['view'] == 'me') { ?>
<input type="hidden" name="handlekey" value="shareadd" />
<?php } ?>
</form>