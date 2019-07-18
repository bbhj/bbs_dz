<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('stat_team');
0
|| checktplrefresh('./template/default/forum/stat_team.htm', './template/default/common/stat.htm', 1541553889, '1', './data/template/1_1_forum_stat_team.tpl.php', './template/default', 'forum/stat_team')
;?><?php include template('common/header'); ?><div id="pt" class="bm cl">
<div class="z">
<a href="./" class="nvhm" title="首页"><?php echo $_G['setting']['bbname'];?></a><em>&rsaquo;</em>
<a href="misc.php?mod=stat">站点统计</a><em>&rsaquo;</em>
管理团队
</div>
</div>
<div id="ct" class="ct2_a wp cl">
<div class="mn">
<div class="bm bw0">
<h1 class="mt">管理团队</h1>
<?php if($team['admins']) { ?>
<div id="team_admins_c" class="umh">
<h3 onclick="toggle_collapse('team_admins', 1, 1);">管理员和超级版主</h3>
<div class="umh_act">
<p class="umh_cb" onclick="toggle_collapse('team_admins', 1, 1);">[ 展开 ]</p>
</div>
</div>
<table summary="管理员和超级版主" id="team_admins" class="dt bm mbw">
<tr>
<th>用户名</th>
<th>组头衔</th>
<th>管理级别</th>
<th>上次访问</th>
<th>离开天数</th>
<th>积分</th>
<th>帖子</th>
<th width="50">最近 30 天发帖</th>
<?php if($_G['setting']['modworkstatus']) { ?><th width="30">本月管理</th><?php } if($_G['setting']['oltimespan']) { ?>
<th width="50">总计在线(小时)</th>
<th width="50">本月在线(小时)</th>
<?php } ?>
</tr><?php if(is_array($team['admins'])) foreach($team['admins'] as $uid) { ?><tr class="<?php echo swapclass('alt'); ?>">
<td><a target="_blank" href="home.php?mod=space&amp;uid=<?php echo $uid;?>"><?php echo $team['members'][$uid]['username'];?></a></td>
<td><?php echo $team['members'][$uid]['grouptitle'];?></td>
<td><?php if($team['members'][$uid]['adminid'] == 1) { ?>论坛管理员<?php } elseif($team['members'][$uid]['adminid'] == 2) { ?>超级版主<?php } elseif($team['members'][$uid]['adminid'] == 3) { ?>版主<?php } ?></td>
<td><?php echo $team['members'][$uid]['lastactivity'];?></td>
<td><?php echo $team['members'][$uid]['offdays'];?></td>
<td><?php echo $team['members'][$uid]['credits'];?></td>
<td><?php echo $team['members'][$uid]['posts'];?></td>
<td><?php echo $team['members'][$uid]['thismonthposts'];?></td>
<?php if($_G['setting']['modworkstatus']) { ?>
<td><a href="misc.php?mod=stat&amp;op=modworks&amp;uid=<?php echo $uid;?>"><?php echo $team['members'][$uid]['modactions'];?></a></td>
<?php } if($_G['setting']['oltimespan']) { ?>
<td><?php echo $team['members'][$uid]['totalol'];?></td>
<td><?php echo $team['members'][$uid]['thismonthol'];?></td>
<?php } ?>
</tr>
<?php } ?>
</table>
<?php } if(is_array($team['categories'])) foreach($team['categories'] as $category) { ?><div id="category_<?php echo $category['fid'];?>_c" class="umh">
<h3 onclick="toggle_collapse('category_<?php echo $category['fid'];?>', 1, 1);"><?php echo $category['name'];?></h3>
<div class="umh_act">
<p class="umh_cb" onclick="toggle_collapse('category_<?php echo $category['fid'];?>', 1, 1);">[ 展开 ]</p>
</div>
</div>
<table id="category_<?php echo $category['fid'];?>" summary="<?php echo $category['fid'];?>" class="dt bm mbw">
<tr>
<th>版块</th>
<th>用户名</th>
<th>组头衔</th>
<th>管理级别</th>
<th>上次访问</th>
<th>离开天数</th>
<th>积分</th>
<th>帖子</th>
<th width="50">最近 30 天发帖</th>
<th width="30">本月管理</th>
<?php if($_G['setting']['oltimespan']) { ?>
<th width="50">总计在线(小时)</th>
<th width="50">本月在线(小时)</th>
<?php } ?>
</tr><?php unset($swapc);?><?php if(is_array($team['forums'][$category['fid']])) foreach($team['forums'][$category['fid']] as $fid => $forum) { if(is_array($team['moderators'][$fid])) foreach($team['moderators'][$fid] as $key => $uid) { ?><tr class="<?php echo swapclass('alt'); ?>">
<?php if($key == 0) { ?><td rowspan="<?php echo $forum['moderators'];?>"><?php if($forum['type'] == 'group') { ?><a href="forum.php?gid=<?php echo $fid;?>"><?php } else { ?><a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $fid;?>"><?php } ?><?php echo $forum['name'];?></a></td><?php } ?>
<td><a href="home.php?mod=space&amp;uid=<?php echo $uid;?>"><?php if($forum['inheritedmod']) { ?><b><?php echo $team['members'][$uid]['username'];?></b><?php } else { ?><?php echo $team['members'][$uid]['username'];?><?php } ?></a></td>
<td><?php echo $team['members'][$uid]['grouptitle'];?></td>
<td><?php if($team['members'][$uid]['adminid'] == 1) { ?>论坛管理员<?php } elseif($team['members'][$uid]['adminid'] == 2) { ?>超级版主<?php } elseif($team['members'][$uid]['adminid'] == 3) { ?>版主<?php } ?></td>
<td><?php echo $team['members'][$uid]['lastactivity'];?></td>
<td><?php echo $team['members'][$uid]['offdays'];?></td>
<td><?php echo $team['members'][$uid]['credits'];?></td>
<td><?php echo $team['members'][$uid]['posts'];?></td>
<td><?php echo $team['members'][$uid]['thismonthposts'];?></td>
<td><?php if($_G['setting']['modworkstatus']) { ?><a href="misc.php?mod=stat&amp;op=modworks&amp;uid=<?php echo $uid;?>"><?php echo $team['members'][$uid]['modactions'];?></a><?php } else { ?>N/A<?php } ?></td>
<?php if($_G['setting']['oltimespan']) { ?>
<td><?php echo $team['members'][$uid]['totalol'];?></td>
<td><?php echo $team['members'][$uid]['thismonthol'];?></td>
<?php } ?>
</tr>
<?php } } ?>
</table>
<?php } ?>
<div class="notice">统计数据已被缓存，上次于 <?php echo $lastupdate;?> 被更新，下次将于 <?php echo $nextupdate;?> 进行更新</div>
</div>
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