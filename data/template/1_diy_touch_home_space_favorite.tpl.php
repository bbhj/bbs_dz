<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('space_favorite');?><?php include template('common/header'); ?><!-- header start -->
<header class="header">
    <div class="nav">
<a href="home.php?mod=space&amp;uid=<?php echo $_G['uid'];?>&amp;do=profile&amp;mycenter=1" class="z"><img src="<?php echo STATICURL;?>image/mobile/images/icon_back.png" /></a>
<?php if($_GET['type'] == 'forum') { ?>
<span class="category">
<span class="display name vm" href="#subname_list">
<h2 class="tit">收藏版块</h2>
<img src="<?php echo STATICURL;?>image/mobile/images/icon_arrow_down.png" />
</span>
        <div id="subname_list" class="subname_list" display="true">
<ul>
<li><a href="home.php?mod=space&amp;uid=<?php echo $_G['uid'];?>&amp;do=favorite&amp;view=me&amp;type=thread">收藏帖子</a></li>
</ul>
        </div>
</span>
<?php } else { ?>
<span class="category">
<span class="display name vm" href="#subname_list">
<h2 class="tit">收藏帖子</h2>
<img src="<?php echo STATICURL;?>image/mobile/images/icon_arrow_down.png" />
</span>
        <div id="subname_list" class="subname_list" display="true">
<ul>
<li><a href="home.php?mod=space&amp;uid=<?php echo $_G['uid'];?>&amp;do=favorite&amp;view=me&amp;type=forum">收藏版块</a></li>
</ul>
        </div>
</span>
<?php } ?>
    </div>
</header>

<!-- main collectlist start -->
<?php if($_GET['type'] == 'forum') { ?>
<div class="coll_list b_radius">
<ul>
<?php if($list) { if(is_array($list)) foreach($list as $k => $value) { ?><li><a href="<?php echo $value['url'];?>"><?php echo $value['title'];?></a></li>
<?php } } else { ?>
<li>您还没有添加任何收藏</li>
<?php } ?>

</ul>
</div>
<?php } else { ?>
<div class="threadlist">
<ul>
<?php if($list) { if(is_array($list)) foreach($list as $k => $value) { ?><li><a href="<?php echo $value['url'];?>"><?php echo $value['title'];?></a></li>
<?php } } else { ?>
<li>您还没有添加任何收藏</li>
<?php } ?>
</ul>
</div>
<?php } ?>
<!-- main collectlist end -->
<?php echo $multi;?><?php $nofooter = true;?><?php include template('common/footer'); ?>