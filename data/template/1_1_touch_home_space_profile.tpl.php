<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('space_profile');?>
<?php if($_GET['mycenter'] && !$_G['uid']) { dheader('Location:member.php?mod=logging&action=login');exit;?><?php } include template('common/header'); if(!$_GET['mycenter']) { ?>

<!-- header start -->
<header class="header">
    <div class="nav">
<a href="javascript:;" onclick="history.go(-1);" class="z"><img src="<?php echo STATICURL;?>image/mobile/images/icon_back.png" /></a>
<span><?php if($_G['uid'] == $space['uid']) { ?>我的资料<?php } else { ?><?php echo $space['username'];?>的资料<?php } ?></span>
    </div>
</header>
<!-- header end -->
<!-- userinfo start -->
<div class="userinfo">
<div class="user_avatar">
<div class="avatar_m"><span><img src="<?php echo avatar($space[uid], small, true);?>" /></span></div>
<h2 class="name"><?php echo $space['username'];?></h2>
</div>
<div class="user_box">
<ul>
<li><span><?php echo $space['credits'];?></span>积分</li><?php if(is_array($_G['setting']['extcredits'])) foreach($_G['setting']['extcredits'] as $key => $value) { if($value['title']) { ?>
<li><span><?php echo $space["extcredits$key"];?> <?php echo $value['unit'];?></span><?php echo $value['title'];?></li>
<?php } } ?>
</ul>
</div>
<?php if($space['uid'] == $_G['uid']) { ?>
<div class="btn_exit"><a href="member.php?mod=logging&amp;action=logout&amp;formhash=<?php echo FORMHASH;?>">退出登录</a></div>
<?php } ?>
</div>
<!-- userinfo end -->

<?php } else { ?>

<!-- header start -->
<header class="header">
<div class="hdc cl">
<?php if($_G['setting']['domain']['app']['mobile']) { $nav = 'http://'.$_G['setting']['domain']['app']['mobile'];?><?php } else { $nav = "forum.php";?><?php } ?>
<h2><a title="<?php echo $_G['setting']['bbname'];?>" href="<?php echo $nav;?>"><img src="<?php echo STATICURL;?>image/mobile/images/logo.png" /></a></h2>
<ul class="user_fun">
<li><a href="search.php?mod=forum" class="icon_search">搜索</a></li>
<li><a href="forum.php?forumlist=1" class="icon_threadlist">版块列表</a></li>
<li class="on" id="usermsg"><a href="<?php if($_G['uid']) { ?>home.php?mod=space&uid=<?php echo $_G['uid'];?>&do=profile&mycenter=1<?php } else { ?>member.php?mod=logging&action=login<?php } ?>" class="icon_userinfo">用户信息</a><?php if($_G['member']['newpm']) { ?><span class="icon_msg"></span><?php } ?></li>
<?php if($_G['setting']['mobile']['mobilehotthread']) { ?>
<li><a href="forum.php?mod=guide&amp;view=hot" class="icon_hotthread">热帖</a></li>
<?php } ?>
</ul>
</div>
</header>
<!-- header end -->
<!-- userinfo start -->
<div class="userinfo">
<div class="user_avatar">
<div class="avatar_m"><span><img src="<?php echo avatar($_G[uid], small, true);?>" /></span></div>
<h2 class="name"><?php echo $_G['username'];?></h2>
</div>
<div class="myinfo_list cl">
<ul>
<li><a href="home.php?mod=space&amp;uid=<?php echo $_G['uid'];?>&amp;do=favorite&amp;view=me&amp;type=thread">我的收藏</a></li>
<li><a href="home.php?mod=space&amp;uid=<?php echo $_G['uid'];?>&amp;do=thread&amp;view=me">我的主题</a></li>
<li class="tit_msg"><a href="home.php?mod=space&amp;do=pm">我的消息<?php if($_G['member']['newpm']) { ?><img src="<?php echo STATICURL;?>image/mobile/images/icon_msg.png" /><?php } ?></a></li>
<li><a href="home.php?mod=space&amp;uid=<?php echo $_G['uid'];?>">我的资料</a></li>
</ul>
</div>
</div>
<!-- userinfo end -->

<?php } $nofooter = true;?><?php include template('common/footer'); ?>