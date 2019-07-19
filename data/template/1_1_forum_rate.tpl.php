<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('rate');?><?php include template('common/header'); if(empty($_GET['showratetip'])) { if(empty($_GET['infloat'])) { ?>
<div id="pt" class="bm cl">
<div class="z"><a href="./" class="nvhm" title="首页"><?php echo $_G['setting']['bbname'];?></a> <em>&rsaquo;</em> <?php echo $navigation;?></div>
</div>
<div id="ct" class="wp cl">
<div class="mn">
<div class="bm bw0">
<?php } if($_GET['action'] == 'rate') { ?>
<div class="tm_c" id="floatlayout_topicadmin">
<h3 class="flb">
<em id="return_rate">评分</em>
<span>
<?php if(!empty($_GET['infloat'])) { ?><a href="javascript:;" class="flbc" onclick="hideWindow('rate')" title="关闭">关闭</a><?php } ?>
</span>
</h3>
<form id="rateform" method="post" autocomplete="off" action="forum.php?mod=misc&amp;action=rate&amp;ratesubmit=yes&amp;infloat=yes" onsubmit="ajaxpost('rateform', 'return_rate', 'return_rate', 'onerror');">
<input type="hidden" name="formhash" value="<?php echo FORMHASH;?>" />
<input type="hidden" name="tid" value="<?php echo $_G['tid'];?>" />
<input type="hidden" name="pid" value="<?php echo $_GET['pid'];?>" />
<input type="hidden" name="referer" value="<?php echo $referer;?>" />
<?php if(!empty($_GET['infloat'])) { ?><input type="hidden" name="handlekey" value="rate"><?php } ?>
<div class="c">
<table cellspacing="0" cellpadding="0" class="dt mbm">
<tr>
<th>&nbsp;</th>
<th width="65">&nbsp;</th>
<th width="65">评分区间</th>
<th width="55">今日剩余</th>
</tr><?php $rateselfflag = 0;?><?php if(is_array($ratelist)) foreach($ratelist as $id => $options) { ?><tr>
<td><?php echo $_G['setting']['extcredits'][$id]['img'];?> <?php echo $_G['setting']['extcredits'][$id]['title'];?></td>
<td>
<input type="text" name="score<?php echo $id;?>" id="score<?php echo $id;?>" class="px z" value="0" style="width: 25px;" />
<a href="javascript:;" class="dpbtn" onclick="showselect(this, 'score<?php echo $id;?>', 'scoreoption<?php echo $id;?>')">^</a>
<ul id="scoreoption<?php echo $id;?>" style="display:none"><?php echo $options;?></ul>
</td>
<td><?php echo $_G['group']['raterange'][$id]['min'];?> ~ <?php echo $_G['group']['raterange'][$id]['max'];?></td><?php $rateselfflag = $_G['group']['raterange'][$id][isself] ? 1 : $rateselfflag;?><td><?php echo $maxratetoday[$id];?></td>
</tr>
<?php } ?>
</table>

<div class="tpclg">
<h4>可选评分理由:</h4>
<table cellspacing="0" cellpadding="0" class="reason_slct"><?php $selectreason = modreasonselect(0, 'userreasons')?><?php if($selectreason) { ?>
 	<tr>
 		<td>
 			<ul id="reasonselect" class="reasonselect pt"><?php echo $selectreason;?></ul>
 			<script type="text/javascript" reload="1">
 				var reasonSelectOption = $('reasonselect').getElementsByTagName('li');
 				if (reasonSelectOption) {
 					for (i=0; i<reasonSelectOption.length; i++) {
 						reasonSelectOption[i].onmouseover = function() { this.className = 'xi2 cur1'; }
 						reasonSelectOption[i].onmouseout = function() { this.className = ''; }
 						reasonSelectOption[i].onclick = function() {
 							$('reason').value = this.innerHTML;
 						}
 					}
 				}
 			</script>
 		</td>
 	</tr>
<?php } ?>
<tr>
 	 	<td><input type="text" name="reason" id="reason" class="px" onkeyup="seditor_ctlent(event, '$(\'rateform\').ratesubmit.click()')" /></td>
</tr>
</table>
</div>
<?php if($rateselfflag) { ?>
<div class="xg1">评分扣除自身相应积分</div>
<?php } ?>
</div>
<p class="o pns">
<label for="sendreasonpm"><input type="checkbox" name="sendreasonpm" id="sendreasonpm" class="pc"<?php if($_G['group']['reasonpm'] == 2 || $_G['group']['reasonpm'] == 3) { ?> checked="checked" disabled="disabled"<?php } ?> />通知作者</label>
<button name="ratesubmit" type="submit" value="true" class="pn pnc"><span>确定</span></button>
</p>
</form>
</div>

<?php } elseif($_GET['action'] == 'removerate') { ?>

<form id="rateform" method="post" autocomplete="off" action="forum.php?mod=misc&amp;action=removerate&amp;ratesubmit=yes&amp;infloat=yes" onsubmit="ajaxpost('rateform', 'return_rate', 'return_rate', 'onerror');return false;">
<div class="f_c">
<h3 class="flb">
<em id="return_rate">撤销评分</em>
<span>
<?php if(!empty($_GET['infloat'])) { ?><a href="javascript:;" class="flbc" onclick="hideWindow('rate')" title="关闭">关闭</a><?php } ?>
</span>
</h3>
<input type="hidden" name="formhash" value="<?php echo FORMHASH;?>" />
<input type="hidden" name="tid" value="<?php echo $_G['tid'];?>">
<input type="hidden" name="pid" value="<?php echo $_GET['pid'];?>">
<input type="hidden" name="referer" value="<?php echo $referer;?>" />
<?php if(!empty($_GET['infloat'])) { ?><input type="hidden" name="handlekey" value="rate"><?php } ?>
<div class="c floatwrap">
<table class="list" cellspacing="0" cellpadding="0">
<thead>
<tr>
<td>&nbsp;</td>
<td>用户名</td>
<td>时间</td>
<td>积分</td>
<td>理由</td>
</tr>
</thead><?php if(is_array($ratelogs)) foreach($ratelogs as $ratelog) { ?><tr>
<td><input type="checkbox" name="logidarray[]" value="<?php echo $ratelog['uid'];?> <?php echo $ratelog['extcredits'];?> <?php echo $ratelog['dbdateline'];?>" /></td>
<td><a href="home.php?mod=space&amp;uid=<?php echo $ratelog['uid'];?>"><?php echo $ratelog['username'];?></a></td>
<td><?php echo $ratelog['dateline'];?></td>
<td><?php echo $_G['setting']['extcredits'][$ratelog['extcredits']]['title'];?> <span class="xw1"><?php echo $ratelog['scoreview'];?></span> <?php echo $_G['setting']['extcredits'][$ratelog['extcredits']]['unit'];?></td>
<td><?php echo $ratelog['reason'];?></td>
</tr>
<?php } ?>
</table>
</div>
</div>
<div class="o pns">
<label class="z" onclick="checkall(this.form, 'logid')"><input class="pc" type="checkbox" name="chkall" />全选</label>
<label for="sendreasonpm"><input type="checkbox" name="sendreasonpm" id="sendreasonpm" class="pc"<?php if($_G['group']['reasonpm'] == 2 || $_G['group']['reasonpm'] == 3) { ?> checked="checked" disabled="disabled"<?php } ?> />通知作者</label>
操作说明: <input name="reason" class="px vm" />
<button class="pn pnc vm" type="submit" value="true" name="ratesubmit"><span>提交</span></button>
</div>
</form>
<?php } ?>

<script type="text/javascript" reload="1">
function succeedhandle_rate(locationhref) {
<?php if(!empty($_GET['from'])) { ?>
location.href = locationhref;
<?php } else { ?>
ajaxget('forum.php?mod=viewthread&tid=<?php echo $_G['tid'];?>&viewpid=<?php echo $_GET['pid'];?>', 'post_<?php echo $_GET['pid'];?>', 'post_<?php echo $_GET['pid'];?>');
hideWindow('rate');
<?php } ?>
}
loadcss('forum_moderator');
</script>

<?php if(empty($_GET['infloat'])) { ?>
</div>
</div>
</div>
<?php } } else { ?>

<h3 class="flb">
<em id="return_<?php echo $_GET['handlekey'];?>">提示信息</em>
<?php if($_G['inajax']) { ?><span><a href="javascript:;" onclick="hideWindow('<?php echo $_GET['handlekey'];?>');" class="flbc" title="关闭">关闭</a></span><?php } ?>
</h3>
<?php if($_G['inajax']) { ?><input type="hidden" name="handlekey" value="<?php echo $_GET['handlekey'];?>" /><?php } ?>
<div class="c altw">
<div class="alert_right">
<p>推送成功</p>
<p class="alert_btnleft">
<a href="javascript:;" class="xi1" onclick="hideWindow('<?php echo $_GET['handlekey'];?>');showWindow('rate', 'forum.php?mod=misc&action=rate&tid=<?php echo $_GET['tid'];?>&pid=<?php echo $_GET['pid'];?>', 'get', -1);return false;">点击这里</a> 给本帖加分
</p>
</div>
</div>
<p class="o pns">
<button onclick="hideWindow('rate');" id="closebtn" class="pn pnc" type="button" fwin="rate"><strong>关闭</strong></button>
</p>

<?php } include template('common/footer'); ?>