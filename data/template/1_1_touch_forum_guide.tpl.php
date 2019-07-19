<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('guide');
0
|| checktplrefresh('./template/default/touch/forum/guide.htm', './template/default/touch/forum/guide_list_row.htm', 1536916024, '1', './data/template/1_1_touch_forum_guide.tpl.php', './template/default', 'touch/forum/guide')
;?><?php include template('common/header'); ?><!-- header start -->
<header class="header">
<div class="hdc cl">
<?php if($_G['setting']['domain']['app']['mobile']) { $nav = 'http://'.$_G['setting']['domain']['app']['mobile'];?><?php } else { $nav = "forum.php";?><?php } ?>
<h2><a title="<?php echo $_G['setting']['bbname'];?>" href="<?php echo $nav;?>"><img src="<?php echo STATICURL;?>image/mobile/images/logo.png" /></a></h2>
<ul class="user_fun">
<li><a href="search.php?mod=forum" class="icon_search">搜索</a></li>
<li><a href="forum.php?forumlist=1" class="icon_threadlist">版块列表</a></li>
<li id="usermsg"><a href="<?php if($_G['uid']) { ?>home.php?mod=space&uid=<?php echo $_G['uid'];?>&do=profile&mycenter=1<?php } else { ?>member.php?mod=logging&action=login<?php } ?>" class="icon_userinfo">用户信息</a><?php if($_G['member']['newpm']) { ?><span class="icon_msg"></span><?php } ?></li>
<li class="on"><a href="forum.php?mod=guide&amp;view=hot" class="icon_hotthread">热帖</a></li>
</ul>
</div>
</header>
<!-- header end -->
<!-- main threadlist start -->
<div class="threadlist">
<h2 class="thread_tit">精彩热帖</h2><?php if(is_array($data)) foreach($data as $key => $list) { if($list['threadcount']) { ?>
<ul class="hotlist"><?php if(is_array($list['threadlist'])) foreach($list['threadlist'] as $key => $thread) { ?><li>
<a href="forum.php?mod=viewthread&amp;tid=<?php echo $thread['tid'];?>&amp;fromguid=hot&amp;<?php if($_GET['archiveid']) { ?>archiveid=<?php echo $_GET['archiveid'];?>&amp;<?php } ?>extra=<?php echo $extra;?>">
<?php if(!$thread['forumstick'] && $thread['closed'] > 1 && ($thread['isgroup'] == 1 || $thread['fid'] != $_G['fid'])) { $thread[tid]=$thread[closed];?><?php } ?>
<?php echo $thread['typehtml'];?> <?php echo $thread['sorthtml'];?>
<?php echo $thread['subject'];?>
<span class="by"><?php echo $thread['author'];?></span>
<span class="num"><?php if($thread['isgroup'] != 1) { ?><?php echo $thread['replies'];?><?php } else { ?><?php echo $groupnames[$thread['tid']]['replies'];?><?php } ?></span>
<?php if($thread['digest'] > 0) { ?>
<span class="icon_top"><img src="<?php echo STATICURL;?>image/mobile/images/icon_digest.png"></span>
<?php } elseif($thread['attachment'] == 2 && $_G['setting']['mobile']['mobilesimpletype'] == 0) { ?>
<span class="icon_tu"><img src="<?php echo STATICURL;?>image/mobile/images/icon_tu.png"></span>
<?php } ?>
</a>
</li>
<?php } ?>
</ul>
<?php } else { ?>
<p>暂时还没有帖子</p>
<?php } } ?>

</div>
<!-- main threadlist end -->

<?php echo $multipage;?>

<div class="pullrefresh" style="display:none;"></div><?php include template('common/footer'); ?>