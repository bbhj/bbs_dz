<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('topicadmin_action');?><?php include template('common/header'); ?><div class="tip">
<?php if(in_array($_GET['action'], array('delpost', 'banpost', 'warn'))) { ?>
<form id="topicadminform" method="post" autocomplete="off" action="forum.php?mod=topicadmin&amp;action=<?php echo $_GET['action'];?>&amp;modsubmit=yes&amp;modclick=yes&amp;mobile=2" >
<input type="hidden" name="formhash" value="<?php echo FORMHASH;?>" />
<input type="hidden" name="fid" value="<?php echo $_G['fid'];?>" />
<input type="hidden" name="tid" value="<?php echo $_G['tid'];?>" />
<input type="hidden" name="page" value="<?php echo $_G['page'];?>" />
<input type="hidden" name="reason" value="手机版主题操作" />
    <?php if($_GET['action'] == 'delpost') { ?>
            <dt>您确定要删除此回复？</dt>
            <?php echo $deleteid;?>
<dd><input type="submit" name="modsubmit" id="modsubmit" value="确定" class="formdialog button2"><a href="javascript:;" onclick="popup.close();" >取消</a></dd>
<?php } elseif($_GET['action'] == 'banpost') { ?>
<dt>
            <p>您要进行屏蔽操作</p>
            <?php echo $banid;?>
            <p><label><input type="radio" name="banned" class="pr" value="1" <?php echo $checkban;?> />屏蔽</label></p>
<p><label><input type="radio" name="banned" class="pr" value="0" <?php echo $checkunban;?> />解除</label></p>
</dt>
<dd><input type="submit" name="modsubmit" id="modsubmit" value="确定" class="formdialog button2"><a href="javascript:;" onclick="popup.close();" >取消</a></dd>
    <?php } elseif($_GET['action'] == 'warn') { ?>
<dt>
            <p>您要进行警告操作</p>
            <?php echo $warnpid;?>
            <p><label><input type="radio" name="warned" class="pr" value="1" <?php echo $checkwarn;?> />警告</label></p>
<p><label><input type="radio" name="warned" class="pr" value="0" <?php echo $checkunwarn;?> />解除</label></p>
</dt>
<dd><input type="submit" name="modsubmit" id="modsubmit" value="确定" class="formdialog button2"><a href="javascript:;" onclick="popup.close();" >取消</a></dd>
    <?php } ?>
    </form>
<?php } else { ?>
    	<dt>手机版不支持复杂管理操作</dt>
<dd><input type="button" onclick="popup.close();" value="确定" /></dd>
<?php } ?>
</div><?php include template('common/footer'); ?>