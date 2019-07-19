<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('stat_main');
0
|| checktplrefresh('./template/default/forum/stat_main.htm', './template/default/common/stat.htm', 1541553737, '1', './data/template/1_1_forum_stat_main.tpl.php', './template/default', 'forum/stat_main')
;?><?php include template('common/header'); ?><div id="pt" class="bm cl">
<div class="z">
<a href="./" class="nvhm" title="首页"><?php echo $_G['setting']['bbname'];?></a><em>&rsaquo;</em> 站点统计
</div>
</div>
<div id="ct" class="ct2_a wp cl">
<div class="mn">
<div class="bm bw0">
<h1 class="mt">基本概况</h1>
<table summary="会员统计" class="dt bm mbw">
<caption><h2 class="mbn">会员统计</h2></caption>
<tr>
<th width="16%">注册会员</th>
<td width="34%"><?php echo $members;?></td>
<th width="16%">发帖会员</th>
<td width="34%"><?php echo $mempost;?></td>
</tr>
<tr>
<th>管理成员</th>
<td><?php echo $admins;?></td>
<th>未发帖会员</th>
<td><?php echo $memnonpost;?></td>
</tr>
<tr>
<th>新会员</th>
<td><?php echo $lastmember;?></td>
<th>发帖会员占总数</th>
<td><?php echo $mempostpercent;?>%</td>
</tr>
<tr>
<th>今日论坛之星</th>
<td><?php if($bestmemposts) { ?><?php echo $bestmem;?> <em title="发帖数">(<?php echo $bestmemposts;?>)</em><?php } else { ?><em>无</em><?php } ?></td>
<th>平均每人发帖数</th>
<td><?php echo $mempostavg;?></td>
</tr>
</table>

<table summary="站点统计" class="dt bm">
<caption><h2 class="mbn">站点统计</h2></caption>
<tr>
<th width="150">版块数</th>
<td width="60"><?php echo $forums;?></td>
<th width="150">平均每日新增帖子数</th>
<td width="60"><?php echo $postsaddavg;?></td>
<th width="150">最热门的版块</th>
<td><a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $hotforum['fid'];?>" target="_blank"><?php echo $hotforum['name'];?></a></td>
</tr>
<tr>
<th>主题数</th>
<td><?php echo $threads;?></td>
<th>平均每日注册会员数</th>
<td><?php echo $membersaddavg;?></td>
<th>主题数</th>
<td><?php echo $hotforum['threads'];?></td>
</tr>
<tr>
<th>帖子数</th>
<td><?php echo $posts;?></td>
<th>最近 24 小时新增帖子数</th>
<td><?php echo $postsaddtoday;?></td>
<th>帖子数</th>
<td><?php echo $hotforum['posts'];?></td>
</tr>
<tr>
<th>平均每个主题被回复次数</th>
<td><?php echo $threadreplyavg;?></td>
<th>最近 24 小时新增会员数</th>
<td><?php echo $membersaddtoday;?></td>
<th>论坛活跃指数</th>
<td><?php echo $activeindex;?></td>
</tr>
</table>
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