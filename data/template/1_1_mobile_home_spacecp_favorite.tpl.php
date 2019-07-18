<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('spacecp_favorite');?><?php include template('common/header'); ?><div class="box">
<?php if($_GET['op'] == 'delete') { ?>
<p class="xw1">取消收藏</p>
<form id="favoriteform_<?php echo $favid;?>" name="favoriteform_<?php echo $favid;?>" method="post" autocomplete="off" action="home.php?mod=spacecp&amp;ac=favorite&amp;op=delete&amp;favid=<?php echo $favid;?>&amp;type=<?php echo $_GET['type'];?>&amp;mobile=yes">
<input type="hidden" name="referer" value="<?php echo dreferer();?>" />
<input type="hidden" name="deletesubmit" value="true" />
<input type="hidden" name="formhash" value="<?php echo FORMHASH;?>" />
    <p class="xw1"><?php echo $thevalue['title'];?></p>
<p>您确定要删除此收藏吗？</p>
<p class="mtn">
<input type="submit" name="deletesubmitbtn" value="确定" />
</p>
</form>
<?php } else { ?>
<p class="xw1">收藏</p>
    <p><?php if($_GET['type'] == 'forum') { ?>收藏此版块: <?php } elseif($_GET['type'] == 'thread') { ?> 收藏此主题: <?php } ?><strong><?php echo $title;?></strong></p>
<form method="post" autocomplete="off" id="favoriteform_<?php echo $id;?>" name="favoriteform_<?php echo $id;?>" action="home.php?mod=spacecp&amp;ac=favorite&amp;type=<?php echo $type;?>&amp;id=<?php echo $id;?>&amp;spaceuid=<?php echo $spaceuid;?>&amp;mobile=yes" >
<input type="hidden" name="favoritesubmit" value="true" />
<input type="hidden" name="referer" value="<?php echo dreferer();?>" />
<input type="hidden" name="formhash" value="<?php echo FORMHASH;?>" />
<p>收藏说明:</p>
<textarea id="general_<?php echo $id;?>" name="description" rows="1" class="txt mtn" ><?php if($description) { ?><?php echo $description;?><?php } else { ?>手机收藏<?php } ?></textarea>
<p class="mtn">
<input type="submit" name="favoritesubmit_btn" id="favoritesubmit_btn"  value="确定" />
</p>
</form>
<?php } ?>
</div><?php include template('common/footer'); ?>