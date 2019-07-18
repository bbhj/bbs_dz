<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('space_favorite');?><?php include template('common/header'); ?><div class="box"><a href="<?php if($forcefid) { ?>forum.php?mod=forumdisplay<?php echo $forcefid;?><?php } else { ?>forum.php<?php } ?>" title="返回论坛">返回论坛</a> </div>
<div class="box"><a href="home.php?mod=space&amp;uid=<?php echo $_G['uid'];?>&amp;do=favorite&amp;view=me&amp;type=forum" <?php if($_GET['type'] == 'forum') { ?>class="xw1"<?php } ?>>我收藏的版块</a> <span class="pipe">|</span> <a href="home.php?mod=space&amp;uid=<?php echo $_G['uid'];?>&amp;do=favorite&amp;view=me&amp;type=thread" <?php if($_GET['type'] == 'thread') { ?>class="xw1"<?php } ?>>我收藏的帖子</a></div>
<div class="bm mtn">
<div class="bm_h">
    	<?php if($_GET['type'] == 'forum') { ?>我收藏的版块<?php } elseif($_GET['type'] == 'thread') { ?>我收藏的帖子<?php } else { ?>收藏<?php } ?>
    </div>
    <?php if($list) { ?>

        <?php if(is_array($list)) foreach($list as $k => $value) { ?>            <div class="bm_c">
                <a href="<?php echo $value['url'];?>" target="_blank"><?php echo $value['title'];?></a>
                <p>
                <?php if($value['description']) { ?>
<span class="xg1"><?php echo $value['description'];?></span>
                <?php } ?><span class="xg1"><?php echo dgmdate($value[dateline], 'u');?></span>
                <a class="o" id="a_delete_<?php echo $k;?>" href="home.php?mod=spacecp&amp;ac=favorite&amp;op=delete&amp;favid=<?php echo $k;?>&amp;type=<?php echo $_GET['type'];?>" >取消收藏</a>
                </p>
            </div>
        <?php } ?>
    <?php } else { ?>
    	<div class="bm_c">您还没有添加任何收藏</div>
    <?php } if($multi) { ?><div class="pgs cl mtm"><?php echo $multi;?></div><?php } ?>
</div><?php include template('common/footer'); ?>