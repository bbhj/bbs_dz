<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('space_medal');?><?php include template('common/header'); ?><div id="pt" class="bm cl">
<div class="z">
<a href="./" class="nvhm" title="首页"><?php echo $_G['setting']['bbname'];?></a> <em>&rsaquo;</em>
<a href="home.php?mod=medal">勋章</a>
</div>
</div>

<div id="ct" class="ct2_a wp cl">
<div class="mn">
<div class="bm bw0">
<h1 class="mt">
<img src="<?php echo STATICURL;?>image/feed/medal.gif" alt="勋章" class="vm" />
<?php if($_GET['action'] == 'log') { ?>我的勋章
<?php } else { ?>勋章中心<?php } ?>
</h1>

<?php if(empty($_GET['action'])) { if($medallist) { if($medalcredits) { ?>
<div class="tbmu">
目前有<?php $i = 0;?><?php if(is_array($medalcredits)) foreach($medalcredits as $id) { if($i != 0) { ?>, <?php } ?><?php echo $_G['setting']['extcredits'][$id]['img'];?> <?php echo $_G['setting']['extcredits'][$id]['title'];?> <span class="xi1"><?php echo getuserprofile('extcredits'.$id);; ?></span> <?php echo $_G['setting']['extcredits'][$id]['unit'];?><?php $i++;?><?php } ?>
</div>
<?php } ?>
<ul class="mtm mgcl cl"><?php if(is_array($medallist)) foreach($medallist as $key => $medal) { ?><li>
<div id="medal_<?php echo $medal['medalid'];?>_menu" class="tip tip_4" style="display:none">
<div class="tip_horn"></div>
<div class="tip_c" style="text-align:left">
<p><?php echo $medal['description'];?></p>
<p class="mtn">
<?php if($medal['expiration']) { ?>
有效期 <?php echo $medal['expiration'];?> 天,
<?php } if($medal['permission'] && !$medal['price']) { ?>
<?php echo $medal['permission'];?>
<?php } else { if($medal['type'] == 0) { ?>
人工授予
<?php } elseif($medal['type'] == 1) { if($medal['price']) { if($_G['setting']['extcredits'][$medal['credit']]['unit']) { ?>
<?php echo $_G['setting']['extcredits'][$medal['credit']]['title'];?> <strong class="xi1 xw1 xs2"><?php echo $medal['price'];?></strong> <?php echo $_G['setting']['extcredits'][$medal['credit']]['unit'];?>
<?php } else { ?>
<strong class="xi1 xw1 xs2"><?php echo $medal['price'];?></strong> <?php echo $_G['setting']['extcredits'][$medal['credit']]['title'];?>
<?php } } else { ?>
自主申请
<?php } } elseif($medal['type'] == 2) { ?>
人工审核
<?php } } ?>
</p>
</div>
</div>
<div id="medal_<?php echo $medal['medalid'];?>" class="mg_img" onmouseover="showMenu({'ctrlid':this.id, 'menuid':'medal_<?php echo $medal['medalid'];?>_menu', 'pos':'12!'});"><img src="<?php echo STATICURL;?>image/common/<?php echo $medal['image'];?>" alt="<?php echo $medal['name'];?>" style="margin-top: 20px;width:auto; height: auto;" /></div>
<p class="xw1"><?php echo $medal['name'];?></p>
<p>
<?php if(in_array($medal['medalid'], $membermedal)) { ?>
已拥有
<?php } else { if($medal['type'] && $_G['uid']) { if(in_array($medal['medalid'], $mymedals)) { if($medal['price']) { ?>
已购买
<?php } else { if(!$medal['permission']) { ?>
已申请
<?php } else { ?>
已领取
<?php } } } else { ?>
<a href="javascript:;" onclick="showWindow('medal', 'home.php?mod=medal&action=confirm&medalid=<?php echo $medal['medalid'];?>')" class="xi2">
<?php if($medal['price']) { ?>
购买
<?php } else { if(!$medal['permission']) { ?>
申请
<?php } else { ?>
领取
<?php } } ?>
</a>
<?php } } } ?>
</p>
</li>
<?php } ?>
</ul>
<?php } else { if($medallogs) { ?>
<p class="emp">您已经获得所有勋章了，恭喜您！</p>
<?php } else { ?>
<p class="emp">没有可用的勋章</p>
<?php } } if($lastmedals) { ?>
<h3 class="tbmu">勋章记录</h3>
<ul class="el ptm pbw mbw"><?php if(is_array($lastmedals)) foreach($lastmedals as $lastmedal) { ?><li>
<a href="home.php?mod=space&amp;uid=<?php echo $lastmedal['uid'];?>" class="t"><?php echo avatar($lastmedal[uid],small);?></a>
<a href="home.php?mod=space&amp;uid=<?php echo $lastmedal['uid'];?>" class="xi2"><?php echo $lastmedalusers[$lastmedal['uid']]['username'];?></a> 在 <?php echo $lastmedal['dateline'];?> 获得 <strong><?php echo $medallist[$lastmedal['medalid']]['name'];?></strong> 勋章
</li>
<?php } ?>
</ul>
<?php } } elseif($_GET['action'] == 'log') { if($mymedals) { ?>
<ul class="mtm mgcl cl"><?php if(is_array($mymedals)) foreach($mymedals as $mymedal) { ?><li>
<div class="mg_img"><img src="<?php echo STATICURL;?>image/common/<?php echo $mymedal['image'];?>" alt="<?php echo $mymedal['name'];?>" style="margin-top: 20px;width:auto; height: auto;" /></div>
<p><strong><?php echo $mymedal['name'];?></strong></p>
</li>
<?php } ?>
</ul>
<?php } if($medallogs) { ?>
<h3 class="tbmu">勋章记录</h3>
<ul class="el ptm pbw mbw"><?php if(is_array($medallogs)) foreach($medallogs as $medallog) { ?><li style="padding-left:10px;">
<?php if($medallog['type'] == 2 || $medallog['type'] == 3) { ?>
我在 <?php echo $medallog['dateline'];?> 申请了 <strong><?php echo $medallog['name'];?></strong> 勋章,<?php if($medallog['type'] == 2) { ?>等待审核<?php } elseif($medallog['type'] == 3) { ?>未通过审核<?php } } elseif($medallog['type'] != 2 && $medallog['type'] != 3) { ?>
我在 <?php echo $medallog['dateline'];?> 被授予了 <strong><?php echo $medallog['name'];?></strong> 勋章,<?php if($medallog['expiration']) { ?>有效期: <?php echo $medallog['expiration'];?><?php } else { ?>永久有效<?php } } ?>
</li>
<?php } ?>
</ul>
<?php if($multipage) { ?><div class="pgs cl mtm"><?php echo $multipage;?></div><?php } } else { ?>
<p class="emp">您还没有获得过勋章</p>
<?php } } ?>
</div>
</div>
<div class="appl">
<div class="tbn">
<h2 class="mt bbda">勋章</h2>
<ul>
<li<?php if(empty($_GET['action'])) { ?> class="a"<?php } ?>><a href="home.php?mod=medal">勋章中心</a></li>
<li<?php if($_GET['action'] == 'log') { ?> class="a"<?php } ?>><a href="home.php?mod=medal&amp;action=log">我的勋章</a></li>
<?php if(!empty($_G['setting']['pluginhooks']['medal_nav_extra'])) echo $_G['setting']['pluginhooks']['medal_nav_extra'];?>
</ul>
</div>
</div>
</div><?php include template('common/footer'); ?>