<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('ranklist');
0
|| checktplrefresh('./template/default/ranklist/ranklist.htm', './template/default/ranklist/side_left.htm', 1536569062, 'diy', './data/template/1_diy_ranklist_ranklist.tpl.php', './template/default', 'ranklist/ranklist')
;?><?php include template('common/header'); ?><div id="pt" class="bm cl">
<div class="z">
<a href="./" class="nvhm" title="首页"><?php echo $_G['setting']['bbname'];?></a> <em>&rsaquo;</em>
<a href="misc.php?mod=ranklist">排行</a> <em>&rsaquo;</em>
全部
</div>
</div>

<style id="diy_style" type="text/css"></style>

<!--[diy=diyranklisttop]--><div id="diyranklisttop" class="area"></div><!--[/diy]-->

<div id="ct" class="ct2_a wp cl">
<div class="mn">

<!--[diy=diycontenttop]--><div id="diycontenttop" class="area"></div><!--[/diy]-->
<?php if($ranklist_setting['member']['available']) { ?>
<div class="bm">
<div class="bm_h cl">
<span class="y">
<?php if($_G['uid']) { ?>
<a href="misc.php?mod=ranklist&amp;type=member" class="xi1 xw1">我要上榜</a>
<span class="pipe">|</span>
<?php } ?>
<a href="misc.php?mod=ranklist&amp;type=member" class="xi2">更多&rsaquo;</a>
</span>
<h2>竞价排名</h2>
</div>
<div class="bm_c bid">
<ul class="biduser cl">
<li class="bidtop">
<?php if($memberlist) { ?>
<a href="home.php?mod=space&amp;uid=<?php echo $memberlist['0']['uid'];?>&amp;do=profile" target="_blank" id="bid_<?php echo $memberlist['0']['uid'];?>" class="hm" <?php if($memberlist['0']['note']) { ?> onmouseover="showTip(this)" tip="<?php echo $memberlist['0']['username'];?>: <?php echo $memberlist['0']['note'];?>"<?php } ?>><?php echo avatar($memberlist[0][uid],middle);?></a>
<?php } ?>
</li><?php unset($memberlist[0]);?><?php if(is_array($memberlist)) foreach($memberlist as $member) { ?><li>
<a href="home.php?mod=space&amp;uid=<?php echo $member['uid'];?>&amp;do=profile" target="_blank" id="bid_<?php echo $member['uid'];?>" <?php if($member['note']) { ?> onmouseover="showTip(this)" tip="<?php echo $member['username'];?>: <?php echo $member['note'];?>"<?php } ?>><?php echo $member['avatar'];?></a>
</li>
<?php } ?>
</ul>
</div>
</div>
<?php } ?>

<!--[diy=diypictop]--><div id="diypictop" class="area"></div><!--[/diy]-->
<?php if(helper_access::check_module('album') && $ranklist_setting['picture']['available']) { ?>
<div class="rnk1">
<div class="bm">
<div class="bm_h cl">
<span class="y xi2">
<a href="misc.php?mod=ranklist&amp;type=picture&amp;view=hot&amp;orderby=all">更多&rsaquo;</a>
</span>
<h2>图片排行</h2>
</div>
<div class="bm_c">
<ul class="ml mlp cl">
<?php if($pictures) { ?>
<li class="d bigpic">
<div class="c">
<a href="home.php?mod=space&amp;uid=<?php echo $pictures['0']['uid'];?>&amp;do=album&amp;picid=<?php echo $pictures['0']['picid'];?>" target="_blank"><img src="<?php echo $pictures['0']['origurl'];?>" alt="" /></a>
</div>
<p class="ptm"><a href="home.php?mod=space&amp;uid=<?php echo $pictures['0']['uid'];?>&amp;do=album&amp;picid=<?php echo $pictures['0']['picid'];?>" target="_blank"><?php echo $pictures['0']['albumname'];?></a></p>
</li>
<?php } unset($pictures[0]);?><?php if(is_array($pictures)) foreach($pictures as $pic) { ?><li class="d">
<div class="c">
<a href="home.php?mod=space&amp;uid=<?php echo $pic['uid'];?>&amp;do=album&amp;picid=<?php echo $pic['picid'];?>" target="_blank"><img src="<?php echo $pic['url'];?>" alt="" /></a>
</div>
<p class="ptm"><a href="home.php?mod=space&amp;uid=<?php echo $pic['uid'];?>&amp;do=album&amp;picid=<?php echo $pic['picid'];?>" target="_blank"><?php echo $pic['albumname'];?></a></p>
</li>
<?php } ?>
</ul>
</div>
</div>
</div>
<?php } ?>

<!--[diy=diycontentmiddle]--><div id="diycontentmiddle" class="area"></div><!--[/diy]-->

<?php if($ranklist_setting['thread']['available']) { ?>
<div class="bm">
<div class="bm_h cl">
<span class="y xi2"><a href="misc.php?mod=ranklist&amp;type=thread&amp;view=replies&amp;orderby=<?php echo $before;?>">更多&rsaquo;</a></span>
<h2>帖子排行</h2>
</div>
<div class="bm_c">
<ul class="xl xl2 cl"><?php $key = 0;?><?php if(is_array($threads_hot)) foreach($threads_hot as $thread) { ?><li<?php if($key++%2) { ?> class="xl2_r"<?php } ?>>
<em><a href="home.php?mod=space&amp;uid=<?php echo $thread['authorid'];?>" target="_blank"><?php echo $thread['author'];?></a></em>
&middot; <a href="forum.php?mod=viewthread&amp;tid=<?php echo $thread['tid'];?>" target="_blank"><?php echo $thread['subject'];?></a>
</li>
<?php } ?>
</ul>
</div>
</div>
<?php } if(helper_access::check_module('blog') && $ranklist_setting['blog']['available']) { ?>
<div class="bm">
<div class="bm_h cl">
<span class="y xi2"><a href="misc.php?mod=ranklist&amp;type=blog&amp;view=heats&amp;orderby=<?php echo $before;?>">更多&rsaquo;</a></span>
<h2>日志排行</h2>
</div>
<div class="bm_c">
<ul class="xl xl2 cl"><?php $key = 0;?><?php if(is_array($blogs_hot)) foreach($blogs_hot as $blog) { ?><li<?php if($key++%2) { ?> class="xl2_r"<?php } ?>>
<em><a href="home.php?mod=space&amp;uid=<?php echo $blog['uid'];?>" target="_blank"><?php echo $blog['username'];?></a></em>
&middot; <a href="home.php?mod=space&amp;uid=<?php echo $blog['uid'];?>&amp;do=blog&amp;id=<?php echo $blog['blogid'];?>" target="_blank"><?php echo $blog['subject'];?></a>
</li>
<?php } ?>
</ul>
</div>
</div>
<?php } if($ranklist_setting['poll']['available']) { ?>
<div class="bm">
<div class="bm_h cl">
<span class="y xi2"><a href="misc.php?mod=ranklist&amp;type=poll&amp;view=heats&amp;orderby=<?php echo $before;?>">更多&rsaquo;</a></span>
<h2>投票排行</h2>
</div>
<div class="bm_c">
<ul class="xl xl2 cl"><?php $key = 0;?><?php if(is_array($polls_hot)) foreach($polls_hot as $poll) { ?><li<?php if($key++%2) { ?> class="xl2_r"<?php } ?>>
<em><a href="home.php?mod=space&amp;uid=<?php echo $poll['authorid'];?>" target="_blank"><?php echo $poll['author'];?></a></em>
&middot; <a href="forum.php?mod=viewthread&amp;tid=<?php echo $poll['tid'];?>" target="_blank"><?php echo $poll['subject'];?></a>
</li>
<?php } ?>
</ul>
</div>
</div>
<?php } if($ranklist_setting['activity']['available']) { ?>
<div class="bm">
<div class="bm_h cl">
<span class="y xi2"><a href="misc.php?mod=ranklist&amp;type=activity&amp;view=heats&amp;orderby=<?php echo $before;?>">更多&rsaquo;</a></span>
<h2>活动排行</h2>
</div>
<div class="bm_c">
<ul class="xl xl2 cl"><?php $key = 0;?><?php if(is_array($activities_hot)) foreach($activities_hot as $activity) { ?><li<?php if($key++%2) { ?> class="xl2_r"<?php } ?>>
<em><a href="home.php?mod=space&amp;uid=<?php echo $activity['authorid'];?>" target="_blank"><?php echo $activity['author'];?></a></em>
&middot; <a href="forum.php?mod=viewthread&amp;tid=<?php echo $activity['tid'];?>" target="_blank"><?php echo $activity['subject'];?></a>
</li>
<?php } ?>
</ul>
</div>
</div>
<?php } ?>

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