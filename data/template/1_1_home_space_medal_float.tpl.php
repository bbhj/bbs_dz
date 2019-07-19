<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('space_medal_float');?><?php include template('common/header'); if(empty($_GET['infloat'])) { ?>
<div id="pt" class="bm cl">
<div class="z"><a href="./" class="nvhm" title="首页"><?php echo $_G['setting']['bbname'];?></a> <em>&rsaquo;</em> <?php echo $navigation;?></div>
</div>
<div id="ct" class="wp cl">
<div class="mn">
<div class="bm bw0">
<?php } ?>

<form id="medalform" method="post" autocomplete="off" action="home.php?mod=medal&amp;action=apply&amp;medalsubmit=yes">
<div class="f_c">
<h3 class="flb">
<em id="return_<?php echo $_GET['handlekey'];?>"><?php if($medal['price']) { ?>购买勋章<?php } else { ?>申请勋章<?php } ?></em>
<span>
<?php if(!empty($_GET['infloat'])) { ?><a href="javascript:;" class="flbc" onclick="hideWindow('<?php echo $_GET['handlekey'];?>')" title="关闭">关闭</a><?php } ?>
</span>
</h3>
<input type="hidden" name="formhash" value="<?php echo FORMHASH;?>" />
<input type="hidden" name="medalid" value="<?php echo $medal['medalid'];?>" />
<input type="hidden" name="operation" value="" />
<?php if(!empty($_GET['infloat'])) { ?><input type="hidden" name="handlekey" value="<?php echo $_GET['handlekey'];?>" /><?php } ?>

<div class="c">
<dl class="xld cl">
<dd class="m">
<div class="mg_img hm">
<img src="<?php echo STATICURL;?>image/common/<?php echo $medal['image'];?>" alt="<?php echo $medal['name'];?>" style="margin: 20px 0 0 0" />
</div>
</dd>
<dt class="z">
<p class="xw1"><?php echo $medal['name'];?></p>
<p class="pbm mbm bbda xw0"><?php echo $medal['description'];?></p>
<p>
<?php if($medal['expiration']) { ?>
有效期 <?php echo $medal['expiration'];?> 天<br />
<?php } if($medal['permission']) { ?>
<?php echo $medal['permission'];?><br />
<?php } if($medal['type'] == 0) { ?>
人工授予
<?php } elseif($medal['type'] == 1) { if($medal['price']) { if($_G['setting']['extcredits'][$medal['credit']]['unit']) { ?>
<?php echo $_G['setting']['extcredits'][$medal['credit']]['title'];?> <strong class="xi1 xw1 xs2"><?php echo $medal['price'];?></strong> <?php echo $_G['setting']['extcredits'][$medal['credit']]['unit'];?>
<?php } else { ?>
<strong class="xi1 xw1 xs2"><?php echo $medal['price'];?></strong> <?php echo $_G['setting']['extcredits'][$medal['credit']]['title'];?>
<?php } } else { ?>
自主申请
<?php } } elseif($medal['type'] == 2) { ?>
人工审核
<?php } ?>
</p>
</dt>
</dl>
</div>
</div>
<div class="o pns">
<?php if($medal['type'] && $_G['uid']) { ?>
<button class="pn pnc vm" type="submit" value="true" name="medalsubmit"><span>
<span>
<?php if($medal['price']) { ?>
购买
<?php } else { if(!$medal['permission']) { ?>
申请
<?php } else { ?>
领取
<?php } } ?>
</span>
</button>
<?php } ?>
</div>
</form>

<?php if(empty($_GET['infloat'])) { ?>
</div>
</div>
</div>
<?php } include template('common/footer'); ?>