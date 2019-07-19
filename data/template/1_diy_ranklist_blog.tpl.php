<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('blog');
0
|| checktplrefresh('./template/default/ranklist/blog.htm', './template/default/ranklist/side_left.htm', 1536654884, 'diy', './data/template/1_diy_ranklist_blog.tpl.php', './template/default', 'ranklist/blog')
;?><?php include template('common/header'); ?><div id="pt" class="bm cl">
<div class="z">
<a href="./" class="nvhm" title="首页"><?php echo $_G['setting']['bbname'];?></a> <em>&rsaquo;</em>
<a href="misc.php?mod=ranklist">排行</a> <em>&rsaquo;</em>
日志排行
</div>
</div>

<style id="diy_style" type="text/css"></style>

<!--[diy=diyranklisttop]--><div id="diyranklisttop" class="area"></div><!--[/diy]-->

<div class="ct2_a wp cl">
<div class="mn">
<!--[diy=diycontenttop]--><div id="diycontenttop" class="area"></div><!--[/diy]-->
<div class="bm bw0">
<h1 class="mt">日志排行</h1>
<ul class="tb cl">
<li<?php if($_GET['view'] == 'heats') { ?> class="a"<?php } ?>><a href="misc.php?mod=ranklist&amp;type=blog&amp;view=heats&amp;orderby=<?php echo $orderby;?>">人气排行</a></li>
<li<?php if($_GET['view'] == 'replies') { ?> class="a"<?php } ?>><a href="misc.php?mod=ranklist&amp;type=blog&amp;view=replies&amp;orderby=<?php echo $orderby;?>">评论排行</a></li>
<li<?php if($_GET['view'] == 'views') { ?> class="a"<?php } ?>><a href="misc.php?mod=ranklist&amp;type=blog&amp;view=views&amp;orderby=<?php echo $orderby;?>">查看排行</a></li>
<li<?php if($_GET['view'] == 'sharetimes') { ?> class="a"<?php } ?>><a href="misc.php?mod=ranklist&amp;type=blog&amp;view=sharetimes&amp;orderby=<?php echo $orderby;?>">分享排行</a></li>
<li<?php if($_GET['view'] == 'favtimes') { ?> class="a"<?php } ?>><a href="misc.php?mod=ranklist&amp;type=blog&amp;view=favtimes&amp;orderby=<?php echo $orderby;?>">收藏排行</a></li>
<?php if($clicks) { if(is_array($clicks)) foreach($clicks as $key => $value) { ?><li<?php if($_GET['view'] == $key) { ?> class="a"<?php } ?>><a href="misc.php?mod=ranklist&amp;type=blog&amp;view=<?php echo $key;?>&amp;orderby=<?php echo $orderby;?>"><?php echo $value['name'];?>排行</a></li>
<?php } } ?>
</ul>
<p id="before" class="tbmu">
<a href="misc.php?mod=ranklist&amp;type=blog&amp;view=<?php echo $_GET['view'];?>&amp;orderby=thisweek" id="604800" <?php if($orderby == 'thisweek') { ?>class="a"<?php } ?> />本周</a><span class="pipe">|</span>
<a href="misc.php?mod=ranklist&amp;type=blog&amp;view=<?php echo $_GET['view'];?>&amp;orderby=thismonth" id="2592000" <?php if($orderby == 'thismonth') { ?>class="a"<?php } ?> />本月</a><span class="pipe">|</span>
<a href="misc.php?mod=ranklist&amp;type=blog&amp;view=<?php echo $_GET['view'];?>&amp;orderby=today" id="86400" <?php if($orderby == 'today') { ?>class="a"<?php } ?> />今日</a><span class="pipe">|</span>
<a href="misc.php?mod=ranklist&amp;type=blog&amp;view=<?php echo $_GET['view'];?>&amp;orderby=all" id="all" <?php if($orderby == 'all') { ?>class="a"<?php } ?> />全部</a>
</p>
<?php if($bloglist) { ?>
<div class="xld xlda hasrank"><?php if(is_array($bloglist)) foreach($bloglist as $blog) { ?><dl class="bbda">
<dd class="ranknum"><?php if($blog['rank'] <= 3) { ?><img src="<?php echo IMGDIR;?>/rank_<?php echo $blog['rank'];?>.gif" alt="<?php echo $blog['rank'];?>" /><?php } else { ?><?php echo $blog['rank'];?><?php } ?></dd>
<dd class="m">
<div class="avt">
<a href="home.php?mod=space&amp;uid=<?php echo $blog['uid'];?>" target="_blank"><?php echo $blog['avatar'];?></a>
</div>
</dd>
<dt class="xs2">
<?php if(helper_access::check_module('share')) { ?>
<a href="home.php?mod=spacecp&amp;ac=share&amp;type=blog&amp;id=<?php echo $blog['blogid'];?>&amp;handlekey=lsbloghk_<?php echo $blog['blogid'];?>" id="a_share_<?php echo $blog['blogid'];?>" onclick="showWindow(this.id, this.href, 'get', 0);" class="oshr xs1 xw0">分享</a>
<?php } ?>
<a href="home.php?mod=space&amp;uid=<?php echo $blog['uid'];?>&amp;do=blog&amp;id=<?php echo $blog['blogid'];?>" target="_blank"><?php echo $blog['subject'];?></a>
</dt>
<dd>
<a href="home.php?mod=space&amp;uid=<?php echo $blog['uid'];?>" target="_blank"><?php echo $blog['username'];?></a> <span class="xg1"><?php echo $blog['dateline'];?></span>
</dd>
<dd class="cl">
<?php echo $blog['message'];?>
</dd>
<dd class="xg1">
<?php if($_GET['view'] == 'heats') { ?>人气: <?php echo $blog['hot'];?>
<?php } elseif($_GET['view'] == 'replies') { ?><a href="home.php?mod=space&amp;uid=<?php echo $blog['uid'];?>&amp;do=blog&amp;id=<?php echo $blog['blogid'];?>#comment" target="_blank">评论 <?php echo $blog['replynum'];?></a>
<?php } elseif($_GET['view'] == 'views') { ?>查看 <?php echo $blog['viewnum'];?>
<?php } elseif($_GET['view'] == 'sharetimes') { ?>分享 <?php echo $blog['sharetimes'];?>
<?php } elseif($_GET['view'] == 'favtimes') { ?>收藏 <?php echo $blog['favtimes'];?>
<?php } else { ?><?php echo $clicks[$_GET['view']]['name'];?> <?php echo $blog['click'.$_GET['view']];?><?php } ?>
</dd>
</dl>
<?php } ?>
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