<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('topicadmin');?><?php include template('common/header'); ?><div class="tip">
<?php if(($_GET['optgroup'] == 3 && $operation == 'delete') || ($_GET['optgroup'] == 4 && $operation == '')) { ?>
    <form id="moderateform" method="post" autocomplete="off" action="forum.php?mod=topicadmin&amp;action=moderate&amp;optgroup=<?php echo $optgroup;?>&amp;modsubmit=yes&amp;mobile=2" >
        <input type="hidden" name="frommodcp" value="<?php echo $frommodcp;?>" />
        <input type="hidden" name="formhash" value="<?php echo FORMHASH;?>" />
        <input type="hidden" name="fid" value="<?php echo $_G['fid'];?>" />
        <input type="hidden" name="redirect" value="<?php echo dreferer(); ?>" />
        <input type="hidden" name="reason" value="手机版主题操作" />
        <?php if(is_array($threadlist)) foreach($threadlist as $thread) { ?>            <input type="hidden" name="moderate[]" value="<?php echo $thread['tid'];?>" />
        <?php } ?>
        <?php if($_GET['optgroup'] == 3) { ?>
            <?php if($operation == 'delete') { ?>
                <?php if($_G['group']['allowdelpost']) { ?>
                    <input name="operations[]" type="hidden" value="delete"/>
                    <dt>您确认要删除？</dt>
<dd><input type="submit" class="formdialog button2" name="modsubmit" id="modsubmit"  value="确定"><a href="javascript:;" onclick="popup.close();">取消</a></dd>
                <?php } else { ?>
                    <dt>您没有删除此主题权限</dt>
                <?php } ?>
            <?php } ?>
        <?php } elseif($_GET['optgroup'] == 4) { ?>
<dt style="height:110px;">
                <p>有效期:&nbsp;</p>
                <p>
                    <input type="text" name="expirationclose" id="expirationclose" class="px" autocomplete="off" value="<?php echo $expirationclose;?>"  />
                </p>
                <p><span class="xg1">选填日期格式：2010-12-01 10:50</span></p>
                <p>
                    <label><input type="radio" name="operations[]" class="pr" value="open" <?php echo $closecheck['0'];?> />打开主题</label></p>
                <p>
                    <label><input type="radio" name="operations[]" class="pr" value="close" <?php echo $closecheck['1'];?> />关闭主题</label></p>
</dt>
<dd><input type="submit" name="modsubmit" id="modsubmit"  value="确定" class="formdialog button2"><a href="javascript:;" onclick="popup.close();">取消</a></dd>
        <?php } ?>
    </form>
<?php } else { ?>
    	<dt>手机版不支持复杂管理操作</dt>
<dd><input type="button" onclick="popup.close();" value="确定" class="button2"></dd>
<?php } ?>
</div><?php include template('common/footer'); ?>