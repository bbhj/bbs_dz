<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('spacecp_feed');
0
|| checktplrefresh('./template/default/home/spacecp_feed.htm', './template/default/common/seccheck.htm', 1537154802, '1', './data/template/1_1_home_spacecp_feed.tpl.php', './template/default', 'home/spacecp_feed')
;?><?php include template('common/header'); if($_GET['op'] == 'getcomment') { ?>

<div class="cmt brm">
<div id="comment_ol_<?php echo $feedid;?>" class="xld xlda"><?php if(is_array($list)) foreach($list as $k => $value) { include template('home/space_comment_li'); } ?>
</div>
<?php if($multi) { ?><div class="pgs cl mtm"><?php echo $multi;?></div><?php } ?>
<form id="feedform_<?php echo $feedid;?>" method="post" autocomplete="off" action="home.php?mod=spacecp&amp;ac=feed&amp;feedid=<?php echo $feedid;?>" <?php if($_G['inajax']) { ?>onsubmit="ajaxpost(this.id, 'return_<?php echo $_GET['handlekey'];?>');"<?php } ?>>
<span id="face_<?php echo $feedid;?>" title="插入表情" onclick="showFace(this.id, 'feedmessage_<?php echo $feedid;?>');return false;" class="cur1"><img src="<?php echo IMGDIR;?>/facelist.gif" alt="facelist" class="vm" /></span>
<span id="note_<?php echo $feedid;?>"></span>
<textarea id="feedmessage_<?php echo $feedid;?>" name="message" rows="2" class="pt"  onkeydown="return ctrlEnter(event, 'feedbutton');"></textarea>
<?php if($secqaacheck || $seccodecheck) { ?><?php
$sectpl = <<<EOF
<sec> <span id="sec<hash>" onclick="showMenu(this.id);"><sec></span><div id="sec<hash>_menu" class="p_pop p_opt" style="display:none"><sec></div>
EOF;
?>
<div class="mtm mbm sec"><?php $sechash = !isset($sechash) ? 'S'.($_G['inajax'] ? 'A' : '').$_G['sid'] : $sechash.random(3);
$sectpl = str_replace("'", "\'", $sectpl);?><?php if($secqaacheck) { ?>
<span id="secqaa_q<?php echo $sechash;?>"></span>		
<script type="text/javascript" reload="1">updatesecqaa('q<?php echo $sechash;?>', '<?php echo $sectpl;?>', '<?php echo $_G['basescript'];?>::<?php echo CURMODULE;?>');</script>
<?php } if($seccodecheck) { ?>
<span id="seccode_c<?php echo $sechash;?>"></span>		
<script type="text/javascript" reload="1">updateseccode('c<?php echo $sechash;?>', '<?php echo $sectpl;?>', '<?php echo $_G['basescript'];?>::<?php echo CURMODULE;?>');</script>
<?php } ?></div>
<?php } ?>
<input type="hidden" name="commentsubmit" value="true" />
<p class="pns"><button type="submit" name="feedbutton" id="feedbutton" class="pn" value="true"><strong>评论</strong></button></p>
<span id="return_<?php echo $_GET['handlekey'];?>"></span>
<input type="hidden" name="referer" value="home.php?mod=space&amp;do=hot&amp;id=<?php echo $feedid;?>" />
<input type="hidden" name="formhash" value="<?php echo FORMHASH;?>" />
<input type="hidden" name="quickcomment" value="1" />
<?php if($_G['inajax']) { ?><input type="hidden" name="handlekey" value="<?php echo $_GET['handlekey'];?>" /><?php } ?>
</form>
</div>
<script type="text/javascript">
function succeedhandle_<?php echo $_GET['handlekey'];?> (url, message, values) {
feedcomment_add(values['cid'], <?php echo $feedid;?>);
hideWindow('<?php echo $_GET['handlekey'];?>');
<?php if($sechash) { if($secqaacheck) { ?>
updatesecqaa('<?php echo $sechash;?>');
<?php } if($seccodecheck) { ?>
updateseccode('<?php echo $sechash;?>');
<?php } } ?>

}
</script>

<?php } elseif($_GET['op'] == 'menu') { if($feed['uid']==$_G['uid']) { ?>
<h3 class="flb">
<em id="return_<?php echo $_GET['handlekey'];?>">删除动态</em>
<?php if($_G['inajax']) { ?><span><a href="javascript:;" onclick="hideWindow('<?php echo $_GET['handlekey'];?>');" class="flbc" title="关闭">关闭</a></span><?php } ?>
</h3>
<form method="post" autocomplete="off" id="feedform_<?php echo $feedid;?>" name="feedform_<?php echo $feedid;?>" action="home.php?mod=spacecp&amp;ac=feed&amp;op=delete&amp;feedid=<?php echo $feedid;?>&amp;handlekey=<?php echo $_GET['handlekey'];?>" <?php if($_G['inajax']) { ?>onsubmit="ajaxpost(this.id, 'return_<?php echo $_GET['handlekey'];?>');"<?php } ?>>
<input type="hidden" name="referer" value="<?php echo dreferer(); ?>" />
<input type="hidden" name="feedsubmit" value="true" />
<input type="hidden" name="formhash" value="<?php echo FORMHASH;?>" />
<div class="c altw">
<div class="alert_info">确定删除该动态吗？</div>
</div>
<p class="o pns">
<button name="feedsubmitbtn" type="submit" class="pn pnc" value="true"><strong>确定</strong></button>
<!--
<?php if(checkperm('managefeed')) { ?>
<a href="home.php?mod=spacecp&amp;ac=feed&amp;op=edit&amp;feedid=<?php echo $feedid;?>" target="_blank" class="pn"><strong class="z">编辑</strong></a>
<?php } ?>
-->
</p>
</form>
<?php } else { ?>
<h3 class="flb">
<em id="return_<?php echo $_GET['handlekey'];?>">屏蔽动态</em>
<?php if($_G['inajax']) { ?><span><a href="javascript:;" onclick="hideWindow('<?php echo $_GET['handlekey'];?>');" class="flbc" title="关闭">关闭</a></span><?php } ?>
</h3>
<form method="post" autocomplete="off" id="feedform_<?php echo $feedid;?>" name="feedform_<?php echo $feedid;?>" action="home.php?mod=spacecp&amp;ac=feed&amp;op=ignore&amp;icon=<?php echo $feed['icon'];?>&amp;feedid=<?php echo $feedid;?>" <?php if($_G['inajax']) { ?>onsubmit="ajaxpost(this.id, 'return_<?php echo $_GET['handlekey'];?>');"<?php } ?>>
<input type="hidden" name="referer" value="<?php echo dreferer(); ?>" />
<input type="hidden" name="feedignoresubmit" value="true" />
<input type="hidden" name="formhash" value="<?php echo FORMHASH;?>" />
<?php if($_G['inajax']) { ?><input type="hidden" name="handlekey" value="<?php echo $_GET['handlekey'];?>" /><?php } ?>
<div class="c altw">
<p>在下次浏览时不再显示此类动态</p>
<p class="ptn"><label for="uid1"><input type="radio" name="uid" id="uid1" value="<?php echo $feed['uid'];?>" checked="checked" />仅屏蔽该好友的</label></p>
<p class="ptn"><label for="uid0"><input type="radio" name="uid" id="uid0" value="0" />屏蔽所有好友的</label></p>
</div>
<p class="o pns">
<button name="feedignoresubmitbtn" type="submit" class="pn pnc" value="true"><strong>确定</strong></button>
<!--
<?php if(checkperm('managefeed')) { ?>
<a href="admin.php?action=feed&amp;operation=edit&amp;feedid=<?php echo $feedid;?>" target="_blank" class="pn"><strong class="z">编辑</strong></a>
<?php } ?>
-->
</p>
</form>
<?php } ?>
<script type="text/javascript">
function succeedhandle_<?php echo $_GET['handlekey'];?>(url, msg, values) {
var obj = $('feed_'+ values['feedid'] +'_li');
obj.style.display = "none";
hideWindow('<?php echo $_GET['handlekey'];?>');
}
</script>
<?php } include template('common/footer'); ?>