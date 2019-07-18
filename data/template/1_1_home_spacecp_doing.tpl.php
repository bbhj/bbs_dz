<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('spacecp_doing');
0
|| checktplrefresh('./template/default/home/spacecp_doing.htm', './template/default/common/userabout.htm', 1540826069, '1', './data/template/1_1_home_spacecp_doing.tpl.php', './template/default', 'home/spacecp_doing')
;?><?php include template('common/header'); if($_GET['op'] == 'delete') { if(!$_G['inajax']) { ?>
<div id="pt" class="bm cl">
<div class="z"><a href="./" class="nvhm" title="首页"><?php echo $_G['setting']['bbname'];?></a> <em>&rsaquo;</em> <a href="home.php"><?php echo $_G['setting']['navs']['4']['navname'];?></a></div>
</div>
<div id="ct" class="ct2_a wp cl">
<div class="mn">
<div class="bm bw0">
<?php } ?>
<h3 class="flb">
<em id="return_<?php echo $_GET['handlekey'];?>">删除记录</em>
<?php if($_G['inajax']) { ?><span><a href="javascript:;" onclick="hideWindow('<?php echo $_GET['handlekey'];?>');" class="flbc" title="关闭">关闭</a></span><?php } ?>
</h3>
<form method="post" autocomplete="off" id="doingform_<?php echo $doid;?>_<?php echo $id;?>" name="doingform" action="home.php?mod=spacecp&amp;ac=doing&amp;op=delete&amp;doid=<?php echo $doid;?>&amp;id=<?php echo $id;?>">
<?php if($_G['inajax']) { ?><input type="hidden" name="handlekey" value="<?php echo $_GET['handlekey'];?>" /><?php } ?>
<input type="hidden" name="referer" value="<?php echo dreferer(); ?>" />
<input type="hidden" name="formhash" value="<?php echo FORMHASH;?>" />
<div class="c">确定删除该记录吗？</div>
<p class="o pns">
<button name="deletesubmit" type="submit" class="pn pnc" value="true"><strong>确定</strong></button>
</p>
</form>
<?php if(!$_G['inajax']) { ?>
</div>
</div>
<div class="appl"><?php if(!empty($_G['setting']['pluginhooks']['global_userabout_top'][$_G['basescript'].'::'.CURMODULE])) echo $_G['setting']['pluginhooks']['global_userabout_top'][$_G['basescript'].'::'.CURMODULE];?>
<ul><?php if(is_array($_G['setting']['spacenavs'])) foreach($_G['setting']['spacenavs'] as $nav) { if($nav['available'] && (!$nav['level'] || ($nav['level'] == 1 && $_G['uid']) || ($nav['level'] == 2 && $_G['adminid'] > 0) || ($nav['level'] == 3 && $_G['adminid'] == 1))) { ?>			
<?php echo $nav['code'];?>
<?php } } ?>
</ul>
<?php if(!empty($_G['setting']['pluginhooks']['global_userabout_bottom'][$_G['basescript'].'::'.CURMODULE])) echo $_G['setting']['pluginhooks']['global_userabout_bottom'][$_G['basescript'].'::'.CURMODULE];?></div>
</div>
<?php } } elseif($_GET['op'] == 'spacenote') { if($space['spacenote']) { ?><?php echo $space['spacenote'];?><?php } } elseif($_GET['op'] == 'docomment' || $_GET['op'] == 'getcomment') { if(helper_access::check_module('doing')) { ?>
<div id="<?php echo $_GET['key'];?>_form_<?php echo $doid;?>_<?php echo $id;?>">
<form id="<?php echo $_GET['key'];?>_docommform_<?php echo $doid;?>_<?php echo $id;?>" method="post" autocomplete="off" action="home.php?mod=spacecp&amp;ac=doing&amp;op=comment&amp;doid=<?php echo $doid;?>&amp;id=<?php echo $id;?>" <?php if($_G['inajax']) { ?>onsubmit="ajaxpost(this.id, 'return_<?php echo $_GET['handlekey'];?>');"<?php } ?> class="pns" style="margin: 5px 0 0;">
<span id="<?php echo $_GET['key'];?>_form_<?php echo $doid;?>_<?php echo $id;?>_face" onclick="showFace(this.id, '<?php echo $_GET['key'];?>_form_<?php echo $doid;?>_<?php echo $id;?>_t');return false;" class="cur1"><img src="<?php echo IMGDIR;?>/facelist.gif" alt="facelist" class="vm" /></span>
<textarea name="message" id="<?php echo $_GET['key'];?>_form_<?php echo $doid;?>_<?php echo $id;?>_t" cols="40" class="px pts" oninput="resizeTx(this);" onpropertychange="resizeTx(this);" onkeyup="strLenCalc(this, '<?php echo $_GET['key'];?>_form_<?php echo $doid;?>_<?php echo $id;?>_limit')" onkeydown="ctrlEnter(event, '<?php echo $_GET['key'];?>_replybtn_<?php echo $doid;?>_<?php echo $id;?>');"></textarea>&nbsp;
<input type="hidden" name="commentsubmit" value="true" />
<button type="submit" name="do_button" id="<?php echo $_GET['key'];?>_replybtn_<?php echo $doid;?>_<?php echo $id;?>" class="pn" value="true"><em>回复</em></button>
<?php if($_G['inajax']) { ?><input type="hidden" name="handlekey" value="<?php echo $_GET['handlekey'];?>" /><?php } ?>
<a name="btncancel" href="javascript:;" onclick="docomment_form_close(<?php echo $doid;?>, <?php echo $id;?>, '<?php echo $_GET['key'];?>');">取消</a>
<input type="hidden" name="formhash" value="<?php echo FORMHASH;?>" />
<div id="<?php echo $_GET['key'];?>_form_<?php echo $doid;?>_<?php echo $id;?>_t_limit" class="mtn" style="display: none;">还可输入 <span id="<?php echo $_GET['key'];?>_form_<?php echo $doid;?>_<?php echo $id;?>_limit">200</span> 个字符</div>
</form>
<span id="return_<?php echo $_GET['handlekey'];?>"></span>
</div>
<script type="text/javascript">
function succeedhandle_<?php echo $_GET['handlekey'];?>(url, msg, values) {
docomment_get(values['doid'], '<?php echo $_GET['key'];?>');
}
</script>
<?php } if($_GET['op'] == 'getcomment') { include template('home/space_doing_li'); } } else { ?>

<div id="content">
<?php if(helper_access::check_module('doing')) { include template('home/space_doing_form'); } ?>
</div>

<?php } include template('common/footer'); ?>