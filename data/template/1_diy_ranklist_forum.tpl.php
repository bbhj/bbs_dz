<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('forum');
0
|| checktplrefresh('./template/default/ranklist/forum.htm', './template/default/ranklist/side_left.htm', 1536654886, 'diy', './data/template/1_diy_ranklist_forum.tpl.php', './template/default', 'ranklist/forum')
;?><?php include template('common/header'); ?><div id="pt" class="bm cl">
<div class="z">
<a href="./" class="nvhm" title="首页"><?php echo $_G['setting']['bbname'];?></a> <em>&rsaquo;</em>
<a href="misc.php?mod=ranklist">排行</a> <em>&rsaquo;</em>
版块排行
</div>
</div>

<style id="diy_style" type="text/css"></style>

<!--[diy=diyranklisttop]--><div id="diyranklisttop" class="area"></div><!--[/diy]-->

<div class="ct2_a wp cl">
<div class="mn">
<!--[diy=diycontenttop]--><div id="diycontenttop" class="area"></div><!--[/diy]-->
<div class="bm bw0">
<h1 class="mt">版块排行</h1>
<ul class="tb cl">
<li<?php if($_GET['view'] == 'threads') { ?> class="a"<?php } ?>><a href="misc.php?mod=ranklist&amp;type=forum&amp;view=threads">发帖排行</a></li>
<li<?php if($_GET['view'] == 'posts') { ?> class="a"<?php } ?>><a href="misc.php?mod=ranklist&amp;type=forum&amp;view=posts">回复排行</a></li>
<li<?php if($_GET['view'] == 'today') { ?> class="a"<?php } ?>><a href="misc.php?mod=ranklist&amp;type=forum&amp;view=today">最近 24 小时发帖排行</a></li>
</ul>
<?php if($forumsrank) { ?>
<div class="tl">
<table cellspacing="0" cellpadding="0">
<tr>
<td class="icn" height="36">&nbsp;</td>
<th>版块</th>
<td width="100">
<?php if($_GET['view'] == 'today') { ?>最近 24 小时发帖
<?php } elseif($_GET['view'] == 'posts') { ?>回复
<?php } elseif($_GET['view'] == 'thismonth') { ?>最近 30 天发帖
<?php } else { ?>发帖<?php } ?>
</td>
</tr><?php if(is_array($forumsrank)) foreach($forumsrank as $forum) { ?><tr>
<td class="icn" height="36"><?php if($forum['rank'] <= 3) { ?><img src="<?php echo IMGDIR;?>/rank_<?php echo $forum['rank'];?>.gif" alt="<?php echo $forum['rank'];?>" /><?php } else { ?><?php echo $forum['rank'];?><?php } ?></td>
<th><a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $forum['fid'];?>" target="_blank"><?php echo $forum['name'];?></a></th>
<td>
<?php echo $forum['posts'];?>
</td>
</tr>
<?php } ?>
</table>
</div>
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