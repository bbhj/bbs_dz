<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('discuz');?>
<?php if($_G['setting']['mobile']['mobilehotthread'] && $_GET['forumlist'] != 1) { dheader('Location:forum.php?mod=guide&view=hot');exit;?><?php } include template('common/header'); ?><script type="text/javascript">
function getvisitclienthref() {
var visitclienthref = '';
if(ios) {
visitclienthref = 'https://itunes.apple.com/cn/app/zhang-shang-lun-tan/id489399408?mt=8';
} else if(andriod) {
visitclienthref = 'http://www.discuz.net/mobile.php?platform=android';
}
return visitclienthref;
}
</script>

<?php if($_GET['visitclient']) { ?>

<header class="header">
    <div class="nav">
<span>温馨提示</span>
    </div>
</header>
<div class="cl">
<div class="clew_con">
<h2 class="tit">掌上论坛手机客户端</h2>
<p>随时随地上论坛<input class="redirect button" id="visitclientid" type="button" value="点击下载" href="" /></p>
<h2 class="tit">iPhone,Andriod等智能手机</h2>
<p>直接登录手机版，阅读体验更佳<input class="redirect button" type="button" value="访问手机版" href="<?php echo $_GET['visitclient'];?>" /></p>
</div>
</div>
<script type="text/javascript">
var visitclienthref = getvisitclienthref();
if(visitclienthref) {
$('#visitclientid').attr('href', visitclienthref);
} else {
window.location.href = '<?php echo $_GET['visitclient'];?>';
}
</script>

<?php } else { ?>

<!-- header start -->
<?php if($showvisitclient) { ?>

<div class="visitclienttip vm" style="display:block;">
<a href="javascript:;" id="visitclientid" class="btn_download">立即下载</a>	
<p>
下载新版掌上论坛客户端，尊享多项看帖特权!
</p>
</div>
<script type="text/javascript">
var visitclienthref = getvisitclienthref();
if(visitclienthref) {
$('#visitclientid').attr('href', visitclienthref);
$('.visitclienttip').css('display', 'block');
}
</script>

<?php } ?>

<header class="header">
<div class="hdc cl">
<?php if($_G['setting']['domain']['app']['mobile']) { $nav = 'http://'.$_G['setting']['domain']['app']['mobile'];?><?php } else { $nav = "forum.php";?><?php } ?>
<h2><a title="<?php echo $_G['setting']['bbname'];?>" href="<?php echo $nav;?>"><img src="<?php echo STATICURL;?>image/mobile/images/logo.png" /></a></h2>
<ul class="user_fun">
<li><a href="search.php?mod=forum" class="icon_search">搜索</a></li>
<li class="on"><a href="forum.php?forumlist=1" class="icon_threadlist">版块列表</a></li>
<li id="usermsg"><a href="<?php if($_G['uid']) { ?>home.php?mod=space&uid=<?php echo $_G['uid'];?>&do=profile&mycenter=1<?php } else { ?>member.php?mod=logging&action=login<?php } ?>" class="icon_userinfo">用户信息</a><?php if($_G['member']['newpm']) { ?><span class="icon_msg"></span><?php } ?></li>
<?php if($_G['setting']['mobile']['mobilehotthread']) { ?>
<li><a href="forum.php?mod=guide&amp;view=hot" class="icon_hotthread">热帖</a></li>
<?php } ?>
</ul>
</div>
</header>
<!-- header end -->
<?php if(!empty($_G['setting']['pluginhooks']['index_top_mobile'])) echo $_G['setting']['pluginhooks']['index_top_mobile'];?>
<!-- main forumlist start -->
<div class="wp wm" id="wp"><?php if(is_array($catlist)) foreach($catlist as $key => $cat) { ?><div class="bm bmw fl">
<div class="subforumshow bm_h cl" href="#sub_forum_<?php echo $cat['fid'];?>">
<span class="o"><img src="<?php echo STATICURL;?>image/mobile/images/collapsed_<?php if(!$_G['setting']['mobile']['mobileforumview']) { ?>yes<?php } else { ?>no<?php } ?>.png"></span>
<h2><a href="javascript:;"><?php echo $cat['name'];?></a></h2>
</div>
<div id="sub_forum_<?php echo $cat['fid'];?>" class="sub_forum bm_c">
<ul><?php if(is_array($cat['forums'])) foreach($cat['forums'] as $forumid) { $forum=$forumlist[$forumid];?><li><a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $forum['fid'];?>"><?php if($forum['todayposts'] > 0) { ?><span class="num"><?php echo $forum['todayposts'];?></span><?php } ?><?php echo $forum['name'];?></a></li>
<?php } ?>
</ul>
</div>
</div>
<?php } ?>
</div>
<!-- main forumlist end -->
<?php if(!empty($_G['setting']['pluginhooks']['index_middle_mobile'])) echo $_G['setting']['pluginhooks']['index_middle_mobile'];?>
<script type="text/javascript">
(function() {
<?php if(!$_G['setting']['mobile']['mobileforumview']) { ?>
$('.sub_forum').css('display', 'block');
<?php } else { ?>
$('.sub_forum').css('display', 'none');
<?php } ?>
$('.subforumshow').on('click', function() {
var obj = $(this);
var subobj = $(obj.attr('href'));
if(subobj.css('display') == 'none') {
subobj.css('display', 'block');
obj.find('img').attr('src', '<?php echo STATICURL;?>image/mobile/images/collapsed_yes.png');
} else {
subobj.css('display', 'none');
obj.find('img').attr('src', '<?php echo STATICURL;?>image/mobile/images/collapsed_no.png');
}
});
 })();
</script>

<?php } include template('common/footer'); ?>