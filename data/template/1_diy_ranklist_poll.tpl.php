<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('poll');
0
|| checktplrefresh('./template/default/ranklist/poll.htm', './template/default/ranklist/side_left.htm', 1536650107, 'diy', './data/template/1_diy_ranklist_poll.tpl.php', './template/default', 'ranklist/poll')
;?><?php include template('common/header'); ?><div id="pt" class="bm cl">
<div class="z">
<a href="./" class="nvhm" title="首页"><?php echo $_G['setting']['bbname'];?></a> <em>&rsaquo;</em>
<a href="misc.php?mod=ranklist">排行</a> <em>&rsaquo;</em>
投票排行
</div>
</div>

<style id="diy_style" type="text/css"></style>

<!--[diy=diyranklisttop]--><div id="diyranklisttop" class="area"></div><!--[/diy]-->

<div class="ct2_a wp cl">
<div class="mn">
<!--[diy=diycontenttop]--><div id="diycontenttop" class="area"></div><!--[/diy]-->
<div class="bm bw0">
<h1 class="mt">投票排行</h1>
<ul class="tb cl">
<li<?php if($_GET['view'] == 'heats') { ?> class="a"<?php } ?>><a href="misc.php?mod=ranklist&amp;type=poll&amp;view=heats&amp;orderby=<?php echo $orderby;?>">热度排行</a></li>
<li<?php if($_GET['view'] == 'favtimes') { ?> class="a"<?php } ?>><a href="misc.php?mod=ranklist&amp;type=poll&amp;view=favtimes&amp;orderby=<?php echo $orderby;?>">收藏排行</a></li>
<li<?php if($_GET['view'] == 'sharetimes') { ?> class="a"<?php } ?>><a href="misc.php?mod=ranklist&amp;type=poll&amp;view=sharetimes&amp;orderby=<?php echo $orderby;?>">分享排行</a></li>
</ul>
<p id="before" class="tbmu">
<a href="misc.php?mod=ranklist&amp;type=poll&amp;view=<?php echo $_GET['view'];?>&amp;orderby=thisweek" id="604800" <?php if($orderby == 'thisweek') { ?>class="a"<?php } ?> />本周</a><span class="pipe">|</span>
<a href="misc.php?mod=ranklist&amp;type=poll&amp;view=<?php echo $_GET['view'];?>&amp;orderby=thismonth" id="2592000" <?php if($orderby == 'thismonth') { ?>class="a"<?php } ?> />本月</a><span class="pipe">|</span>
<a href="misc.php?mod=ranklist&amp;type=poll&amp;view=<?php echo $_GET['view'];?>&amp;orderby=today" id="86400" <?php if($orderby == 'today') { ?>class="a"<?php } ?> />今日</a><span class="pipe">|</span>
<a href="misc.php?mod=ranklist&amp;type=poll&amp;view=<?php echo $_GET['view'];?>&amp;orderby=all" id="all" <?php if($orderby == 'all') { ?>class="a"<?php } ?> />全部</a>
</p>
<?php if($polllist) { ?>
<ul class="el pll"><?php if(is_array($polllist)) foreach($polllist as $poll) { ?><li>
<div class="t"><?php if($poll['rank'] <= 3) { ?><img src="<?php echo IMGDIR;?>/rank_<?php echo $poll['rank'];?>.gif" alt="<?php echo $poll['rank'];?>" /><?php } else { ?><?php echo $poll['rank'];?><?php } ?></div>
<div class="cl">
<div class="u z">
<a href="home.php?mod=space&amp;uid=<?php echo $poll['authorid'];?>" class="avt" target="_blank"><?php echo $poll['avatar'];?></a>
<p class="mtn"><a href="home.php?mod=space&amp;uid=<?php echo $poll['authorid'];?>" target="_blank"><?php echo $poll['author'];?></a></p>
</div>
<div class="s y">
<a href="forum.php?mod=viewthread&amp;tid=<?php echo $poll['tid'];?>" class="joins" target="_blank">
<span><?php echo $poll['voters'];?></span>人参与
</a>
<a href="forum.php?mod=viewthread&amp;tid=<?php echo $poll['tid'];?>" class="go" target="_blank">去投票</a>
</div>
<div class="c">
<h4 class="h"><a href="forum.php?mod=viewthread&amp;tid=<?php echo $poll['tid'];?>" target="_blank"><?php echo $poll['subject'];?></a></h4>
<ol><?php if(is_array($poll['pollpreview'])) foreach($poll['pollpreview'] as $item) { ?><li><?php echo $item;?></li>
<?php } ?>
<li style="list-style-type: none;">...</li>
</ol>
<div class="mtn xg1">
<?php if($_GET['view'] == 'favtimes') { ?>收藏 <?php echo $poll['favtimes'];?>
<?php } elseif($_GET['view'] == 'sharetimes') { ?>分享 <?php echo $poll['sharetimes'];?>
<?php } else { ?>热度 <?php echo $poll['heats'];?><?php } ?>
<span class="pipe">|</span>
<?php echo $poll['dateline'];?>
</div>
</div>
</div>
</li>
<?php } ?>
</ul>
<div class="pgs cl mtm"><?php echo $multi;?></div>
<?php } else { ?>
<div class="emp">没有相关数据</div>
<?php } ?>
<div class="notice">排行榜数据已被缓存，上次于 <?php echo $lastupdate;?> 被更新，下次将于 <?php echo $nextupdate;?> 进行更新</div>
</div>
<!--[diy=diycontentbottom]--><div id="diycontentbottom" class="area"></div><!--[/diy]-->
</div>
<div class="appl">
<!--[diy=diysidetop]--><div id="diysidetop" class="area"></div><!--[/diy]--><div class="tbn">
<h2 class="mt bbda"><?php echo $_G['setting']['navs']['8']['navname'];?></h2>
<ul>
<li class="cl<?php if($_GET['type'] == 'index' || !$_GET['type']) { ?> a<?php } ?>"><a href="misc.php?mod=ranklist">全部</a></li>
<?php if($ranklist_setting['member']['available']) { ?>
<li class="cl<?php if($_GET['type'] == 'member') { ?> a<?php } ?>"><a href="misc.php?mod=ranklist&amp;type=member">用户</a></li>
<?php } if($ranklist_setting['thread']['available']) { ?>
<li class="cl<?php if($_GET['type'] == 'thread') { ?> a<?php } ?>"><a href="misc.php?mod=ranklist&amp;type=thread&amp;view=replies&amp;orderby=thisweek">帖子</a></li>
<?php } if(helper_access::check_module('blog') && $ranklist_setting['blog']['available']) { ?>
<li class="cl<?php if($_GET['type'] == 'blog') { ?> a<?php } ?>"><a href="misc.php?mod=ranklist&amp;type=blog&amp;view=heats&amp;orderby=thisweek">日志</a></li>
<?php } if($ranklist_setting['poll']['available']) { ?>
<li class="cl<?php if($_GET['type'] == 'poll') { ?> a<?php } ?>"><a href="misc.php?mod=ranklist&amp;type=poll&amp;view=heats&amp;orderby=thisweek">投票</a></li>
<?php } if($ranklist_setting['activity']['available']) { ?>
<li class="cl<?php if($_GET['type'] == 'activity') { ?> a<?php } ?>"><a href="misc.php?mod=ranklist&amp;type=activity&amp;view=heats&amp;orderby=thismonth">活动</a></li>
<?php } if(helper_access::check_module('album') && $ranklist_setting['picture']['available']) { ?>
<li class="cl<?php if($_GET['type'] == 'picture') { ?> a<?php } ?>"><a href="misc.php?mod=ranklist&amp;type=picture&amp;view=hot&amp;orderby=thismonth">图片</a></li>
<?php } if($ranklist_setting['forum']['available']) { ?>
<li class="cl<?php if($_GET['type'] == 'forum') { ?> a<?php } ?>"><a href="misc.php?mod=ranklist&amp;type=forum&amp;view=threads">版块</a></li>
<?php } if($ranklist_setting['group']['available']&&$_G['setting']['groupstatus']) { ?>
<li class="cl<?php if($_GET['type'] == 'group') { ?> a<?php } ?>"><a href="misc.php?mod=ranklist&amp;type=group&amp;view=credit">群组</a></li>
<?php } ?>
</ul>
<?php if(!empty($_G['setting']['pluginhooks']['ranklist_nav_extra'])) echo $_G['setting']['pluginhooks']['ranklist_nav_extra'];?>
</div><!--[diy=diysidebottom]--><div id="diysidebottom" class="area"></div><!--[/diy]-->
</div>
</div>

<!--[diy=diyranklistbottom]--><div id="diyranklistbottom" class="area"></div><!--[/diy]--><?php include template('common/footer'); ?>