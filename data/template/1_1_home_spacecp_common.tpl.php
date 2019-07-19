<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('spacecp_common');
0
|| checktplrefresh('./template/default/home/spacecp_common.htm', './template/default/common/userabout.htm', 1536778484, '1', './data/template/1_1_home_spacecp_common.tpl.php', './template/default', 'home/spacecp_common')
;?><?php include template('common/header'); if(!$_G['inajax']) { ?>
<div id="pt" class="bm cl">
<div class="z"><a href="./" class="nvhm" title="首页"><?php echo $_G['setting']['bbname'];?></a> <em>&rsaquo;</em> <a href="home.php"><?php echo $_G['setting']['navs']['4']['navname'];?></a></div>
</div>
<div id="ct" class="ct2_a wp cl">
<div class="mn">
<div class="bm bw0">
<?php } if($_GET['op'] == 'ignore') { ?>

<h3 class="flb">
<em id="return_<?php echo $_GET['handlekey'];?>">屏蔽通知</em>
<?php if($_G['inajax']) { ?><span><a href="javascript:;" onclick="hideWindow('<?php echo $_GET['handlekey'];?>');" class="flbc" title="关闭">关闭</a></span><?php } ?>
</h3>
<form method="post" autocomplete="off" id="ignoreform_<?php echo $formid;?>" name="ignoreform_<?php echo $formid;?>" action="home.php?mod=spacecp&amp;ac=common&amp;op=ignore&amp;type=<?php echo $type;?>" <?php if($_G['inajax']) { ?>onsubmit="ajaxpost(this.id, 'return_<?php echo $_GET['handlekey'];?>');"<?php } ?>>
<?php if($_G['inajax']) { ?><input type="hidden" name="handlekey" value="<?php echo $_GET['handlekey'];?>" /><?php } ?>
<input type="hidden" name="ignoresubmit" value="true" />
<input type="hidden" name="formhash" value="<?php echo FORMHASH;?>" />
<input type="hidden" name="referer" value="<?php echo dreferer(); ?>">
<div class="c altw">
<p>在下次浏览时不再显示此类通知</p>
<p class="ptn"><label><input type="radio" name="authorid" id="authorid1" value="<?php echo $_GET['authorid'];?>" checked="checked" />仅屏蔽该好友的</label></p>
<p class="ptn"><label><input type="radio" name="authorid" id="authorid0" value="0" />屏蔽所有好友的</label></p>
</div>
<p class="o pns">
<button type="submit" name="feedignoresubmit" value="true" class="pn pnc"><strong>确定</strong></button>
</p>
</form>

<?php } elseif($_GET['op']=='modifyunitprice') { ?>

<h3 class="flb">
<em id="return_<?php echo $_GET['handlekey'];?>">修改竞价单价</em>
<?php if($_G['inajax']) { ?><span><a href="javascript:;" onclick="hideWindow('<?php echo $_GET['handlekey'];?>');" class="flbc" title="关闭">关闭</a></span><?php } ?>
</h3>
<form method="post" autocomplete="off" id="ignoreform_<?php echo $formid;?>" name="ignoreform_<?php echo $formid;?>" action="home.php?mod=spacecp&amp;ac=common&amp;op=modifyunitprice" <?php if($_G['inajax']) { ?>onsubmit="ajaxpost(this.id, 'return_<?php echo $_GET['handlekey'];?>');"<?php } ?>>
<?php if($_G['inajax']) { ?><input type="hidden" name="handlekey" value="<?php echo $_GET['handlekey'];?>" /><?php } ?>
<input type="hidden" name="modifysubmit" value="true" />
<input type="hidden" name="formhash" value="<?php echo FORMHASH;?>" />
<input type="hidden" name="referer" value="<?php echo dreferer(); ?>">
<div class="c altw">
<p>竞价单价决定您在竞价排行中的排名，单价越高，您的排名越靠前。站上会员访问一次您的个人主页将从您的竞价总额中扣除相应的竞价值 </p>
<p class="ptn"><label>竞价单价: <input type="text" name="unitprice" class="px" value="<?php echo $showinfo['unitprice'];?>" /></label></p>
</div>
<p class="o pns">
<button type="submit" name="unitpriceysubmit" value="true" class="pn pnc"><strong>确定</strong></button>
</p>
</form>
<script type="text/javascript">
function succeedhandle_<?php echo $_GET['handlekey'];?> (url, message, values) {
var priceObj = $('show_unitprice');
if(priceObj) {
priceObj.innerHTML = values['unitprice'];
}

}
</script>
<?php } if(!$_G['inajax']) { ?>
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