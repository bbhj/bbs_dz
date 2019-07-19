<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('stat_misc');
0
|| checktplrefresh('./template/default/forum/stat_misc.htm', './template/default/common/stat.htm', 1541554380, '1', './data/template/1_1_forum_stat_misc.tpl.php', './template/default', 'forum/stat_misc')
;?><?php include template('common/header'); ?><div id="pt" class="bm cl">
<div class="z">
<a href="./" class="nvhm" title="首页"><?php echo $_G['setting']['bbname'];?></a><em>&rsaquo;</em>
<a href="misc.php?mod=stat">站点统计</a><em>&rsaquo;</em>
<?php if($op == 'views') { ?>
流量统计
<?php } elseif($op == 'agent') { ?>
客户软件
<?php } elseif($op == 'posts') { ?>
发帖量记录
<?php } elseif($op == 'modworks') { ?>
管理统计
<?php } elseif($op == 'forumstat') { ?>
版块统计
<?php } ?>
</div>
</div>

<div id="ct" class="ct2_a wp cl">
<div class="mn">
<?php if($op == 'views') { ?>
<div class="bm bw0">
<h1 class="mt">流量统计</h1>
<table summary="星期流量" class="dt bm">
<caption><h2 class="mbn">星期流量</h2></caption>
<?php echo $statsbar_week;?>
</table>

<table summary="时段流量" class="dt bm">
<caption><h2 class="mbn">时段流量</h2></caption>
<?php echo $statsbar_hour;?>
</table>
</div>
<?php } elseif($op == 'agent') { ?>
<div class="bm bw0">
<h1 class="mt">客户软件</h1>
<table summary="客户软件" class="dt bm">
<caption><h2 class="mbn">操作系统</h2></caption>
<?php echo $statsbar_os;?>
</table>

<table summary="浏览器" class="dt bm">
<caption><h2 class="mbn">浏览器</h2></caption>
<?php echo $statsbar_browser;?>
</table>
</div>
<?php } elseif($op == 'posts') { ?>
<div class="bm bw0">
<h1 class="mt">发帖量记录</h1>
<table summary="每月新增帖子记录" class="dt bm">
<caption><h2 class="mbn">每月新增帖子记录</h2></caption>
<?php echo $statsbar_monthposts;?>
</table>

<table summary="每日新增帖子记录" class="dt bm">
<caption><h2 class="mbn">每日新增帖子记录</h2></caption>
<?php echo $statsbar_dayposts;?>
</table>
<?php } elseif($op == 'forumstat' && !$_GET['fid']) { ?>
<div class="bm bw0">
<h1 class="mt">版块统计</h1>
<table summary="!stats_forum_stat!" class="dt bm">
<tr>
<th class="xw1">版块名称</td>
<th class="xw1">帖子数</td>
</tr><?php if(is_array($forums)) foreach($forums as $forum) { ?><tr class="<?php echo swapclass('alt'); ?>">
<td><a href="misc.php?mod=stat&amp;op=forumstat&amp;fid=<?php echo $forum['fid'];?>"><?php echo $forum['name'];?></a><?php if($forum['type'] == 'sub') { ?><span class="xg1"> (子版)</span><?php } ?></td>
<td><?php echo $forum['posts'];?></td>
</tr>
<?php } ?>
</table>
</div>
<?php } elseif($op == 'forumstat' && $_GET['fid']) { ?>
<div class="bm bw0">
<h1 class="mt">版块统计日志 - <?php echo $foruminfo['name'];?> - <?php echo $month;?></h1>
<script type="text/javascript">
document.write(AC_FL_RunContent(
'width', '100%', 'height', '300',
'src', '<?php echo STATICURL;?>image/common/stat.swf?<?php echo $statuspara;?>',
'quality', 'high'
));
</script>
<?php if($logs) { ?>
<table summary="版块统计日志" class="dt bm mtw mbw">
<tr>
<th width="100">日期</th>
<th>发帖数</th>
</tr><?php if(is_array($logs)) foreach($logs as $log) { ?><tr>
<td><?php echo $log['logdate'];?></td>
<td><?php echo $log['value'];?></td>
</tr>
<?php } ?>
</table>
<?php } ?>

<table class="dt bm">
<caption><h2 class="mbn">历史记录 - <?php echo $foruminfo['name'];?></h2></caption>
<tr>
<th width="100">月份</th>
<th>发帖数</th>
</tr><?php if(is_array($monthlist)) foreach($monthlist as $month) { ?><tr>
<td><a href="misc.php?mod=stat&amp;op=forumstat&amp;fid=<?php echo $_GET['fid'];?>&amp;month=<?php echo $month;?>"><?php echo $month;?></a></td>
<td><?php echo $monthposts[$month];?></td>
</tr>
<?php } ?>
</table>
</div>
<?php } elseif($op == 'modworks' && $uid) { ?>
<div class="bm bw0">
<h1 class="mt">管理统计 - <?php echo $username;?></h1>
<h3><?php echo $username;?> 在 <?php echo $starttime;?> 至 <?php echo $endtime;?> 的管理统计数据 &nbsp; <a href="misc.php?mod=stat&amp;op=modworks&amp;exportexcel=1&amp;uid=<?php echo $uid;?>&amp;modworks_starttime=<?php echo $starttime;?>&amp;modworks_endtime=<?php echo $endtime;?>" class="xi2">[导出]</a></h3>
<ul class="ttp cl"><?php if(is_array($monthlinks)) foreach($monthlinks as $link) { ?><?php echo $link;?>
<?php } ?>
<li>
<script src="<?php echo $_G['setting']['jspath'];?>calendar.js?<?php echo VERHASH;?>" type="text/javascript" type="text/javascript"></script>
<form action="misc.php?mod=stat&amp;op=modworks&amp;uid=<?php echo $uid;?>" method="post">
<input type="hidden" name="formhash" value="<?php echo FORMHASH;?>" />
时间范围: <input type="text" name="modworks_starttime" class="px vm" size="10" onclick="showcalendar(event, this, false)" autocomplete="off" /> 至 <input type="text" name="modworks_endtime" class="px vm" size="10" onclick="showcalendar(event, this, false)" autocomplete="off" />
<button type="submit" class="pn vm" name="modworkssubmit" value="true"><em>查看</em></button></td>
</form>
</li>
</ul>
<div class="cl">
<div class="stl">
<table class="dt bm">
<tr>
<th>时间</th>
</tr><?php if(is_array($modactions)) foreach($modactions as $day => $modaction) { ?><tr class="<?php echo swapclass('alt'); ?>">
<td><?php echo $day;?></td>
</tr>
<?php } ?>
<tr>
<td>合计</td>
</tr>
</table>
</div>
<div class="str">
<table class="dt" style="width: 3000px;">
<tr><?php if(is_array($modactioncode)) foreach($modactioncode as $key => $val) { ?><th width="<?php echo $tdwidth;?>"><?php echo $val;?></th><?php } ?>
<th width="<?php echo $tdwidth;?>">合计</th>
</tr><?php unset($swapc);?><?php if(is_array($modactions)) foreach($modactions as $day => $modaction) { ?><tr class="<?php echo swapclass('alt'); ?>"><?php if(is_array($modactioncode)) foreach($modactioncode as $key => $val) { if($modaction[$key]['posts']) { ?><td title="帖子: <?php echo $modaction[$key]['posts'];?>"><?php echo $modaction[$key]['count'];?><?php } else { ?><td>&nbsp;<?php } ?></td>
<?php } ?>
<td><?php echo $modaction['total'];?></td>
</tr>
<?php } ?>
<tr><?php if(is_array($modactioncode)) foreach($modactioncode as $key => $val) { if($totalactions[$key]['posts']) { ?><td class="<?php echo $bgarray[$key];?>" title="帖子: <?php echo $totalactions[$key]['posts'];?>"><?php echo $totalactions[$key]['count'];?><?php } else { ?><td>&nbsp;<?php } ?></td>
<?php } ?>
<td><?php echo $totalactions['total'];?></td>
</tr>
</table>
</div>
</div>
</div>

<?php } elseif($op == 'modworks') { ?>
<div class="bm bw0">
<h1 class="mt">管理统计 - 全体管理人员</h1>
<h3><?php echo $starttime;?> 至 <?php echo $endtime;?> 的管理统计数据 &nbsp; <a href="misc.php?mod=stat&amp;op=modworks&amp;exportexcel=1&amp;modworks_starttime=<?php echo $starttime;?>&amp;modworks_endtime=<?php echo $endtime;?>" class="xi2">[导出]</a></h3>
<ul class="ttp cl"><?php if(is_array($monthlinks)) foreach($monthlinks as $link) { ?><?php echo $link;?>
<?php } ?>
<li>
<script src="<?php echo $_G['setting']['jspath'];?>calendar.js?<?php echo VERHASH;?>" type="text/javascript" type="text/javascript"></script>
<form action="misc.php?mod=stat&amp;op=modworks" method="post">
<input type="hidden" name="formhash" value="<?php echo FORMHASH;?>" />
时间范围: <input type="text" name="modworks_starttime" class="px vm" size="10" onclick="showcalendar(event, this, false)" autocomplete="off" /> 至 <input type="text" name="modworks_endtime" class="px vm" size="10" onclick="showcalendar(event, this, false)" autocomplete="off" />
<button type="submit" class="pn vm" name="modworkssubmit" value="true"><em>查看</em></button></td>
</form>
</li>
</ul>
<div class="cl">
<div class="stl">
<table class="dt bm">
<tr>
<th>用户名</th>
</tr><?php if(is_array($members)) foreach($members as $uid => $member) { ?><tr class="<?php echo swapclass('alt'); ?>">
<td><a href="misc.php?mod=stat&amp;op=modworks<?php if(isset($_GET['before'])) { ?>&amp;before=<?php echo $_GET['before'];?><?php } ?>&amp;uid=<?php echo $uid;?><?php if($starttime || $endtime) { ?>&amp;modworks_starttime=<?php echo $starttime;?>&amp;modworks_endtime=<?php echo $endtime;?><?php } ?>" title="查看详细管理统计"><?php echo $member['username'];?></a></td>
</tr>
<?php } if($members) { ?>
<tr>
<td>合计</td>
</tr>
<?php } ?>
</table>
</div>

<div class="str">
<table class="dt" style="width: 3000px;">
<tr><?php if(is_array($modactioncode)) foreach($modactioncode as $key => $val) { ?><th width="<?php echo $tdwidth;?>"><?php echo $val;?></th><?php } ?>
<th width="<?php echo $tdwidth;?>">合计</th>
</tr><?php unset($swapc);?><?php if(is_array($members)) foreach($members as $uid => $member) { ?><tr class="<?php echo swapclass('alt'); ?>"><?php if(is_array($modactioncode)) foreach($modactioncode as $key => $val) { if($member[$key]['posts']) { ?><td title="帖子: <?php echo $member[$key]['posts'];?>"><?php echo $member[$key]['count'];?><?php } else { ?><td>&nbsp;<?php } ?></td>
<?php } ?>
<td><?php echo $member['total'];?></td>
</tr>
<?php } if($members) { ?>
<tr><?php if(is_array($modactioncode)) foreach($modactioncode as $key => $val) { if($total[$key]['posts']) { ?><td title="帖子: <?php echo $total[$key]['posts'];?>"><?php echo $total[$key]['count'];?><?php } else { ?><td>&nbsp;<?php } ?></td>
<?php } ?>
<td><?php echo $total['total'];?></td>
</tr>
<?php } ?>
</table>
</div>
</div>
</div>
<?php } ?>

</div><div class="appl">
<div class="tbn">
<h2 class="mt bbda">站点统计</h2>
<ul>
<li class="cl<?php if($op == 'basic') { ?> a<?php } ?>"><a href="misc.php?mod=stat&amp;op=basic">基本概况</a></li>
<li class="cl<?php if($op == 'forumstat') { ?> a<?php } ?>"><a href="misc.php?mod=stat&amp;op=forumstat">版块统计</a></li>
<li class="cl<?php if($op == 'team') { ?> a<?php } ?>"><a href="misc.php?mod=stat&amp;op=team">管理团队</a></li>
<?php if($_G['setting']['modworkstatus']) { ?>
<li class="cl<?php if($op == 'modworks') { ?> a<?php } ?>"><a href="misc.php?mod=stat&amp;op=modworks">管理统计</a></li>
<?php } if($_G['setting']['memliststatus']) { ?>
<li class="cl<?php if($op == 'memberlist') { ?> a<?php } ?>"><a href="misc.php?mod=stat&amp;op=memberlist">会员列表</a></li>
<?php } if($_G['setting']['updatestat']) { ?>
<li class="cl<?php if($op == 'trend') { ?> a<?php } ?>"><a href="misc.php?mod=stat&amp;op=trend">趋势统计</a></li>
<?php } ?>
</ul>
</div>
</div></div><?php include template('common/footer'); ?>