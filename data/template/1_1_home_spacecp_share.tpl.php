<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('spacecp_share');
0
|| checktplrefresh('./template/default/home/spacecp_share.htm', './template/default/common/seccheck.htm', 1540862035, '1', './data/template/1_1_home_spacecp_share.tpl.php', './template/default', 'home/spacecp_share')
|| checktplrefresh('./template/default/home/spacecp_share.htm', './template/default/common/seccheck.htm', 1540862035, '1', './data/template/1_1_home_spacecp_share.tpl.php', './template/default', 'home/spacecp_share')
|| checktplrefresh('./template/default/home/spacecp_share.htm', './template/default/home/space_share_li.htm', 1540862035, '1', './data/template/1_1_home_spacecp_share.tpl.php', './template/default', 'home/spacecp_share')
|| checktplrefresh('./template/default/home/spacecp_share.htm', './template/default/common/userabout.htm', 1540862035, '1', './data/template/1_1_home_spacecp_share.tpl.php', './template/default', 'home/spacecp_share')
;?><?php include template('common/header'); if(!$_G['inajax']) { ?>
<div id="pt" class="bm cl">
<div class="z">
<a href="./" class="nvhm" title="首页"><?php echo $_G['setting']['bbname'];?></a> <em>&rsaquo;</em> <a href="home.php"><?php echo $_G['setting']['navs']['4']['navname'];?></a>
</div>
</div>
<div id="ct" class="ct2_a wp cl">
<div class="mn">
<div class="bm bw0">
<?php } if($_GET['op'] == 'delete') { ?>
<h3 class="flb">
<em id="return_<?php echo $_GET['handlekey'];?>">删除分享</em>
<?php if($_G['inajax']) { ?><span><a href="javascript:;" onclick="hideWindow('<?php echo $_GET['handlekey'];?>');" class="flbc" title="关闭">关闭</a></span><?php } ?>
</h3>
<form id="shareform_<?php echo $sid;?>" name="shareform_<?php echo $sid;?>" method="post" autocomplete="off" action="home.php?mod=spacecp&amp;ac=share&amp;op=delete&amp;sid=<?php echo $sid;?>&amp;type=<?php echo $_GET['type'];?>" <?php if($_G['inajax'] && $_GET['type']!='view') { ?> onsubmit="ajaxpost(this.id, 'return_<?php echo $_GET['handlekey'];?>');"<?php } ?>>
<input type="hidden" name="referer" value="<?php echo dreferer(); ?>" />
<input type="hidden" name="deletesubmit" value="true" />
<input type="hidden" name="formhash" value="<?php echo FORMHASH;?>" />
<?php if($_G['inajax']) { ?><input type="hidden" name="handlekey" value="<?php echo $_GET['handlekey'];?>" /><?php } ?>
<div class="c">确定删除指定的分享吗？</div>
<p class="o pns">
<button type="submit" name="deletesubmitbtn" value="true" class="pn pnc"><strong>确定</strong></button>
</p>
</form>
<?php if($_G['inajax'] && $_GET['type']!='view') { ?>
<script type="text/javascript">
function succeedhandle_<?php echo $_GET['handlekey'];?>(url, msg, values) {
share_delete(values['sid']);
}
</script>
<?php } } elseif($_GET['op'] == 'edithot') { ?>
<h3 class="flb">
<em id="return_<?php echo $_GET['handlekey'];?>">调整热度</em>
<?php if(!empty($_GET['inajax'])) { ?><span><a href="javascript:;" onclick="hideWindow('<?php echo $_GET['handlekey'];?>');" class="flbc" title="关闭">关闭</a></span><?php } ?>
</h3>
<form method="post" autocomplete="off" action="home.php?mod=spacecp&amp;ac=share&amp;op=edithot&amp;sid=<?php echo $sid;?>">
<input type="hidden" name="referer" value="<?php echo dreferer(); ?>" />
<input type="hidden" name="hotsubmit" value="true" />
<input type="hidden" name="formhash" value="<?php echo FORMHASH;?>" />
<div class="c">新的热度:<input type="text" name="hot" value="<?php echo $share['hot'];?>" size="10" class="px" /></div>
<p class="o pns">
<button type="submit" name="btnsubmit" value="true" class="pn pnc"><strong>确定</strong></button>
</p>
</form>
<?php } elseif($_GET['op']=='link') { if(!$_G['inajax']) { ?>
<h1 class="mt">
<img src="static/image/feed/share.gif" class="vm" alt="share"> 分享
</h1>
<?php } else { ?>
<h3 class="flb">
<em id="return_<?php echo $_GET['handlekey'];?>">分享</em>
<?php if($_G['inajax']) { ?><span><a href="javascript:;" onclick="hideWindow('<?php echo $_GET['handlekey'];?>');" class="flbc" title="关闭">关闭</a></span><?php } ?>
</h3>
<?php } ?>
<form id="shareform" name="shareform" action="home.php?mod=spacecp&amp;ac=share&amp;type=link" method="post" autocomplete="off" <?php if($_G['inajax']) { ?>onsubmit="ajaxpost(this.id, 'return_<?php echo $_GET['handlekey'];?>');"<?php } ?>>
<input type="hidden" name="refer" value="home.php?mod=space&amp;uid=<?php echo $space['uid'];?>&amp;do=share&amp;view=me" />
<input type="hidden" name="topicid" value="<?php echo $_GET['topicid'];?>" />
<input type="hidden" name="formhash" value="<?php echo FORMHASH;?>" />
<input type="hidden" name="sharesubmit" value="true" />
<?php if($_G['inajax']) { ?><input type="hidden" name="handlekey" value="<?php echo $_GET['handlekey'];?>" /><?php } ?>
<div class="c tfm">
<p>分享网址、视频、音乐、Flash:</p>
<p class="mtn mbm"><input type="text" size="30" class="px" name="link" onfocus="javascript:if('http://'==this.value)this.value='';" onblur="javascript:if(''==this.value)this.value='http://'" id="share_link" value="<?php echo $linkdefault;?>" /></p>
<p>描述:</p>
<p class="mtn mbm"><textarea id="share_general" name="general" cols="30" rows="3" class="pt" onkeydown="ctrlEnter(event, 'sharesubmit_btn')"><?php echo $generaldefault;?></textarea></p>
<?php if($type == 'thread') { ?>
<p><a href="javascript:;" onclick="setCopy($('share_general').value + '\n ' + $('share_link').value, '地址复制成功<br />您可以用快捷键 Ctrl + V 粘贴到 QQ、MSN 里')" />通过 QQ、MSN 分享给朋友</a></p>
<?php } if($secqaacheck || $seccodecheck) { ?><?php
$sectpl = <<<EOF
<sec> <span id="sec<hash>" class="secq" onclick="showMenu({'ctrlid':this.id,'win':'{$_GET['handlekey']}'})"><sec></span><div id="sec<hash>_menu" class="p_pop p_opt" style="display:none"><sec></div>
EOF;
?>
<div class="sec"><?php $sechash = !isset($sechash) ? 'S'.($_G['inajax'] ? 'A' : '').$_G['sid'] : $sechash.random(3);
$sectpl = str_replace("'", "\'", $sectpl);?><?php if($secqaacheck) { ?>
<span id="secqaa_q<?php echo $sechash;?>"></span>		
<script type="text/javascript" reload="1">updatesecqaa('q<?php echo $sechash;?>', '<?php echo $sectpl;?>', '<?php echo $_G['basescript'];?>::<?php echo CURMODULE;?>');</script>
<?php } if($seccodecheck) { ?>
<span id="seccode_c<?php echo $sechash;?>"></span>		
<script type="text/javascript" reload="1">updateseccode('c<?php echo $sechash;?>', '<?php echo $sectpl;?>', '<?php echo $_G['basescript'];?>::<?php echo CURMODULE;?>');</script>
<?php } ?></div>
<?php } ?>
</div>
<p class="o pns">
<button type="submit" name="sharesubmit_btn" id="sharesubmit_btn" value="true" class="pn pnc"><strong>分享</strong></button>
</p>
</form>
<?php if($_G['inajax']) { ?>
<script type="text/javascript">
function succeedhandle_<?php echo $_GET['handlekey'];?>(url, message, values) {
showCreditPrompt();
}
</script>
<?php } } else { ?>
<h3 class="flb">
<em id="return_<?php echo $_GET['handlekey'];?>">分享</em>
<?php if($_G['inajax']) { ?><span><a href="javascript:;" onclick="hideWindow('<?php echo $_GET['handlekey'];?>');" class="flbc" title="关闭">关闭</a></span><?php } ?>
</h3>
<form method="post" autocomplete="off" id="shareform_<?php echo $id;?>" name="shareform_<?php echo $id;?>" action="home.php?mod=spacecp&amp;ac=share&amp;type=<?php echo $type;?>&amp;id=<?php echo $id;?>" <?php if($_G['inajax']) { ?>onsubmit="ajaxpost(this.id, 'return_<?php echo $_GET['handlekey'];?>');"<?php } ?>>
<input type="hidden" name="sharesubmit" value="true">
<input type="hidden" name="referer" value="<?php echo dreferer(); ?>">
<input type="hidden" name="formhash" value="<?php echo FORMHASH;?>" />
<?php if($_G['inajax']) { ?><input type="hidden" name="handlekey" value="<?php echo $_GET['handlekey'];?>" /><?php } ?>
<div class="c">
<p class="cl">
<span class="y xg1">已有 <b><?php echo $share_count;?></b> 人分享&nbsp;&nbsp;</span>
分享说明:
</p>
<textarea id="general_<?php echo $id;?>" name="general" cols="50" rows="5" class="pt mtn" style="width: 400px;" onkeydown="ctrlEnter(event, 'sharesubmit_btn')" onkeyup="showPreview(this.value, 'quote_<?php echo $id;?>')"></textarea>
<?php if($secqaacheck || $seccodecheck) { ?><?php
$sectpl = <<<EOF
<sec> <span id="sec<hash>" onclick="showMenu({'ctrlid':this.id,'win':'{$_GET['handlekey']}'})"><sec></span><div id="sec<hash>_menu" class="p_pop p_opt" style="display:none"><sec></div>
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
<ul id="share_preview" class="el mtm cl 1"><?php $value = $arr;?><?php if(empty($ajax_edit)) { ?><li id="share_<?php echo $value['sid'];?>_li"><?php } ?>
<div class="h">
<div class="y">
<?php if($value['uid'] != $_G['uid'] && $value['itemid'] && helper_access::check_module('share')) { ?>
<a href="home.php?mod=spacecp&amp;ac=share&amp;type=<?php echo $value['type'];?>&amp;id=<?php echo $value['itemid'];?>" id="k_share" onclick="showWindow(this.id, this.href, 'get', 0);">我也分享</a>
<span class="pipe">|</span>
<?php } ?>
<?php if(!empty($_G['setting']['pluginhooks']['space_share_comment_op'][$k])) echo $_G['setting']['pluginhooks']['space_share_comment_op'][$k];?>
<?php if($value['sid']) { ?><a href="home.php?mod=space&amp;uid=<?php echo $value['uid'];?>&amp;do=share&amp;id=<?php echo $value['sid'];?>" target="_blank">评论</a><?php } if($value['uid']==$_G['uid']) { ?>
<span class="pipe">|</span>
<a href="home.php?mod=spacecp&amp;ac=share&amp;op=delete&amp;sid=<?php echo $value['sid'];?>&amp;handlekey=dellshk_<?php echo $value['sid'];?>" id="s_<?php echo $value['sid'];?>_delete" onclick="showWindow(this.id, this.href, 'get', 0);">删除</a>
<?php } ?>
</div>
<a href="home.php?mod=space&amp;uid=<?php echo $value['uid'];?>" c="1" target="_blank"><?php echo $value['username'];?></a>
<a href="home.php?mod=space&amp;uid=<?php echo $value['uid'];?>&amp;do=share&amp;id=<?php echo $value['sid'];?>" target="_blank"><?php echo $value['title_template'];?></a>
<?php if($value['status'] == 1) { ?><span class="xgl">(待审核)<?php } ?>
<span class="xg1"><?php echo dgmdate($value[dateline], 'u');?></span>
</div>
<div class="ec cl">
<?php if($value['image']) { ?>
<a href="<?php echo $value['image_link'];?>" target="_blank"><img src="<?php echo $value['image'];?>" class="tn" alt="" /></a>
<?php } ?>
<div class="d">
<?php echo $value['body_template'];?>
</div>
<?php if($value['type'] == 'video') { if(!empty($value['body_data']['imgurl'])) { ?>
<table class="mtm" title="点击播放" onclick="javascript:showFlash('<?php echo $value['body_data']['host'];?>', '<?php echo $value['body_data']['flashvar'];?>', this, '<?php echo $value['sid'];?>');"><tr><td class="vdtn hm" style="background: url(<?php echo $value['body_data']['imgurl'];?>) no-repeat">
<img src="<?php echo IMGDIR;?>/vds.png" alt="点击播放" />
</td></tr></table>
<?php } else { ?>
<img src="<?php echo IMGDIR;?>/vd.gif" alt="点击播放" onclick="javascript:showFlash('<?php echo $value['body_data']['host'];?>', '<?php echo $value['body_data']['flashvar'];?>', this, '<?php echo $value['sid'];?>');" class="tn" />
<?php } } elseif($value['type'] == 'music') { ?>
<img src="<?php echo IMGDIR;?>/music.gif" alt="点击播放" onclick="javascript:showFlash('music', '<?php echo $value['body_data']['musicvar'];?>', this, '<?php echo $value['sid'];?>');" class="tn" />
<?php } elseif($value['type'] == 'flash') { ?>
<img src="<?php echo IMGDIR;?>/flash.gif" alt="点击查看" onclick="javascript:showFlash('flash', '<?php echo $value['body_data']['flashaddr'];?>', this, '<?php echo $value['sid'];?>');" class="tn" />
<?php } if($value['body_general']) { ?>
<div class="quote<?php if($value['image']) { ?> z<?php } ?>"><blockquote id="quote_<?php echo $id;?>"><?php echo $value['body_general'];?></blockquote></div>
<?php } ?>
</div>
<?php if(empty($ajax_edit)) { ?></li><?php } ?></ul>
</div>
<p class="o pns">
<?php if($commentcable[$type]) { ?>
<label><input type="checkbox" class="pc" name="iscomment" value="1"/><?php if($type == 'thread') { ?>同时回复<?php } else { ?>同时作为评论发表<?php } ?></label>
<?php } ?>
<button type="submit" name="sharesubmit_btn" id="sharesubmit_btn" class="pn pnc" value="true"><strong>确定</strong></button>
</p>
</form>
<?php if($_G['inajax']) { ?>
<script type="text/javascript">
function succeedhandle_<?php echo $_GET['handlekey'];?> (url, message, values) {
if(values['cid'] && $('comment_ul') && !$('replynum_'+values['id'])) {
comment_add(values['cid']);
}
if($('replynum_'+values['id'])) {
var a = parseInt($('replynum_'+values['id']).innerHTML);
var b = a + 1;
$('replynum_'+values['id']).innerHTML = b + '';
}
if(values['type'] == 'thread' || values['type'] == 'article') {
setTimeout("location.href='" + url + "';", 3000);
}
showCreditPrompt();
}
</script>
<?php } } if(!$_G['inajax']) { ?>
</div>
</div>
<div class="appl"><?php if(!empty($_G['setting']['pluginhooks']['global_userabout_top'][$_G['basescript'].'::'.CURMODULE])) echo $_G['setting']['pluginhooks']['global_userabout_top'][$_G['basescript'].'::'.CURMODULE];?>
<ul><?php if(is_array($_G['setting']['spacenavs'])) foreach($_G['setting']['spacenavs'] as $nav) { if($nav['available'] && (!$nav['level'] || ($nav['level'] == 1 && $_G['uid']) || ($nav['level'] == 2 && $_G['adminid'] > 0) || ($nav['level'] == 3 && $_G['adminid'] == 1))) { ?>			
<?php echo $nav['code'];?>
<?php } } ?>
</ul>
<?php if(!empty($_G['setting']['pluginhooks']['global_userabout_bottom'][$_G['basescript'].'::'.CURMODULE])) echo $_G['setting']['pluginhooks']['global_userabout_bottom'][$_G['basescript'].'::'.CURMODULE];?></div>
</div>
<?php } include template('common/footer'); ?>