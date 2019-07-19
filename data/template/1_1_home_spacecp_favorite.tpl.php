<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('spacecp_favorite');
0
|| checktplrefresh('./template/default/home/spacecp_favorite.htm', './template/default/common/userabout.htm', 1536905518, '1', './data/template/1_1_home_spacecp_favorite.tpl.php', './template/default', 'home/spacecp_favorite')
;?><?php include template('common/header'); if(!$_G['inajax']) { ?>
<div id="pt" class="bm cl">
<div class="z"><a href="./" class="nvhm" title="首页"><?php echo $_G['setting']['bbname'];?></a> <em>&rsaquo;</em> <a href="home.php"><?php echo $_G['setting']['navs']['4']['navname'];?></a></div>
</div>
<div id="ct" class="ct2_a wp cl">
<div class="mn">
<div class="bm">
<?php } if($_GET['op'] == 'delete') { ?>
<h3 class="flb">
<em id="return_<?php echo $_GET['handlekey'];?>">取消收藏</em>
<?php if($_G['inajax']) { ?><span><a href="javascript:;" onclick="hideWindow('<?php echo $_GET['handlekey'];?>');" class="flbc" title="关闭">关闭</a></span><?php } ?>
</h3>
<form id="favoriteform_<?php echo $favid;?>" name="favoriteform_<?php echo $favid;?>" method="post" autocomplete="off" action="home.php?mod=spacecp&amp;ac=favorite&amp;op=delete&amp;favid=<?php echo $favid;?>&amp;type=<?php echo $_GET['type'];?>" <?php if($_G['inajax'] && $_GET['type']!='view') { ?> onsubmit="ajaxpost(this.id, 'return_<?php echo $_GET['handlekey'];?>');"<?php } ?>>
<input type="hidden" name="referer" value="<?php echo dreferer(); ?>" />
<input type="hidden" name="deletesubmit" value="true" />
<input type="hidden" name="formhash" value="<?php echo FORMHASH;?>" />
<?php if($_G['inajax']) { ?><input type="hidden" name="handlekey" value="<?php echo $_GET['handlekey'];?>" /><?php } ?>
<div class="c">您确定要删除此收藏吗？</div>
<p class="o pns">
<button type="submit" name="deletesubmitbtn" value="true" class="pn pnc"><strong>确定</strong></button>
</p>
</form>
<?php if($_G['inajax'] && $_GET['type']!='view') { ?>
<script type="text/javascript">
function succeedhandle_<?php echo $_GET['handlekey'];?>(url, msg, values) {
hideWindow('<?php echo $_GET['handlekey'];?>');
}
</script>
<?php } } else { ?>
<h3 class="flb">
<em id="return_<?php echo $_GET['handlekey'];?>">收藏</em>
<?php if($_G['inajax']) { ?><span><a href="javascript:;" onclick="hideWindow('<?php echo $_GET['handlekey'];?>');" class="flbc" title="关闭">关闭</a></span><?php } ?>
</h3>
<form method="post" autocomplete="off" id="favoriteform_<?php echo $id;?>" name="favoriteform_<?php echo $id;?>" action="home.php?mod=spacecp&amp;ac=favorite&amp;type=<?php echo $type;?>&amp;id=<?php echo $id;?>&amp;spaceuid=<?php echo $spaceuid;?>" <?php if($_G['inajax']) { ?>onsubmit="ajaxpost(this.id, 'return_<?php echo $_GET['handlekey'];?>'<?php if($type == 'thread') { ?>, null, null, null, 'favoriteupdate()'<?php } ?>);"<?php } ?>>
<input type="hidden" name="favoritesubmit" value="true" />
<input type="hidden" name="referer" value="<?php echo dreferer(); ?>" />
<input type="hidden" name="formhash" value="<?php echo FORMHASH;?>" />
<?php if($_G['inajax']) { ?><input type="hidden" name="handlekey" value="<?php echo $_GET['handlekey'];?>" /><?php } ?>
<div class="c">
<p>已有 <b><?php echo $fav_count;?></b> 人收藏</p>
<p>收藏说明:</p>
<textarea id="general_<?php echo $id;?>" name="description" cols="50" rows="5" class="pt mtn" style="width: 400px;" onkeydown="ctrlEnter(event, 'favoritesubmit_btn')"><?php echo $description;?></textarea>
</div>
<p class="o pns">
<button type="submit" name="favoritesubmit_btn" id="favoritesubmit_btn" class="pn pnc" value="true"><strong>确定</strong></button>
</p>
</form>
<?php if($_G['inajax']) { ?>
<script type="text/javascript">
function succeedhandle_<?php echo $_GET['handlekey'];?>(url, msg, values) {
hideWindow('<?php echo $_GET['handlekey'];?>');
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