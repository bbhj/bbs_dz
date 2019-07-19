<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('space_thread');?><?php include template('common/header'); ?><!-- header start -->
<header class="header">
    <div class="nav">
       <a href="home.php?mod=space&amp;uid=1&amp;do=profile&amp;mycenter=1" class="z"><img src="<?php echo STATICURL;?>image/mobile/images/icon_back.png" /></a>
   <span>我的主题</span>
   </div>
</header>
<!-- header end -->
<!-- main threadlist start -->
<div class="threadlist">
<ul>
<?php if($list) { if(is_array($list)) foreach($list as $thread) { ?><li>
<?php if($viewtype == 'reply' || $viewtype == 'postcomment') { ?>
<a href="forum.php?mod=redirect&amp;goto=findpost&amp;ptid=<?php echo $thread['tid'];?>&amp;pid=<?php echo $thread['pid'];?>" target="_blank"><?php echo $thread['subject'];?></a>
<?php } else { ?>
<a href="forum.php?mod=viewthread&amp;tid=<?php echo $thread['tid'];?>" target="_blank" <?php if($thread['displayorder'] == -1) { ?>class="grey"<?php } ?>><?php echo $thread['subject'];?></a>
<?php } ?>
<span class="num"><?php echo $thread['replies'];?></span>
<?php if(in_array($thread['displayorder'], array(1, 2, 3, 4))) { ?>
<span class="icon_top"><img src="<?php echo STATICURL;?>image/mobile/images/icon_top.png"></span>
<?php } elseif($thread['attachment'] == 2) { ?>
<span class="icon_tu"><img src="<?php echo STATICURL;?>image/mobile/images/icon_tu.png"></span>
<?php } ?>
</li>
<?php } } else { ?>
<li>还没有相关的帖子</li>
<?php } ?>
</ul>
<?php echo $multi;?>
</div>
<!-- main threadlist end --><?php $nofooter = true;?><?php include template('common/footer'); ?>