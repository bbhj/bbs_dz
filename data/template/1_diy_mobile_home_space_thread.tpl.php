<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('space_thread');?><?php include template('common/header'); ?><div class="box"><a href="<?php if($forcefid) { ?>forum.php?mod=forumdisplay<?php echo $forcefid;?><?php } else { ?>forum.php<?php } ?>" title="返回论坛">返回论坛</a></div>
<div class="bm mtn">
<div class="bm_h">
    	我的帖子
    </div>
<form method="post" autocomplete="off" name="delform" id="delform" action="home.php?mod=space&amp;do=thread&amp;view=all&amp;order=dateline" onsubmit="showDialog('确定要删除选中的主题吗？', 'confirm', '', '$(\'delform\').submit();'); return false;">
        <input type="hidden" name="formhash" value="<?php echo FORMHASH;?>" />
        <input type="hidden" name="delthread" value="true" />
        <?php if($list) { ?>
        
            <?php if(is_array($list)) foreach($list as $thread) { ?>            	<div class="bm_c">
                    <?php if($viewtype == 'reply' || $viewtype == 'postcomment') { ?>
                        <a href="forum.php?mod=redirect&amp;goto=findpost&amp;ptid=<?php echo $thread['tid'];?>&amp;pid=<?php echo $thread['pid'];?>" target="_blank"><?php echo $thread['subject'];?></a>
                    <?php } else { ?>
                        <a href="forum.php?mod=viewthread&amp;tid=<?php echo $thread['tid'];?>" target="_blank" <?php if($thread['displayorder'] == -1) { ?>class="recy"<?php } ?>><?php echo $thread['subject'];?></a>
                    <?php } ?>
                <?php if($viewtype != 'postcomment') { ?>
                    <?php if(!$actives['me']) { ?>
<a href="home.php?mod=space&amp;uid=<?php echo $thread['authorid'];?>"><?php echo $thread['author'];?></a><?php echo $thread['dateline'];?>
                    <?php } ?>
                    <span class="xg1">回<?php echo $thread['replies'];?></span>
                <?php } ?>
            </div>
            <?php } ?>
        <?php } else { ?>
        	<div class="bm_c">
            还没有相关的帖子
            </div>
        <?php } ?>
        </table>
    </form>
<?php if($multi) { ?><div class="pgs cl mtm"><?php echo $multi;?></div><?php } ?>
</div><?php include template('common/footer'); ?>