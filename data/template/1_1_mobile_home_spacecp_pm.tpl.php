<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('spacecp_pm');?><?php include template('common/header'); ?><div class="box"><a href="<?php if($forcefid) { ?>forum.php?mod=forumdisplay<?php echo $forcefid;?><?php } else { ?>forum.php<?php } ?>" title="返回论坛">返回论坛</a> <span class="pipe">|</span> <a href="home.php?mod=space&amp;do=pm" title="短消息">短消息</a> <span class="pipe">|</span> <a href="home.php?mod=spacecp&amp;ac=pm" title="发消息" class="xw1">发消息</a></div>
<div class="bm mtn">
<div class="bm_h">发消息</div>
<?php if($op != '') { ?>
<div class="bm_c">手机版不支持复杂短消息操作，请返回<a href="home.php?mod=space&amp;do=pm&amp;filter=privatepm">我的短消息</a></div>
<?php } else { ?>
    <form id="pmform_<?php echo $pmid;?>" name="pmform_<?php echo $pmid;?>" method="post" autocomplete="off" action="home.php?mod=spacecp&amp;ac=pm&amp;op=send&amp;touid=<?php echo $touid;?>&amp;pmid=<?php echo $pmid;?>&amp;mobile=yes" >
        <div class="bm_c">
            <input type="hidden" name="referer" value="<?php echo dreferer();; ?>" />
            <input type="hidden" name="pmsubmit" value="true" />
            <input type="hidden" name="formhash" value="<?php echo FORMHASH;?>" />
            <?php if(!$touid) { ?>
            <label for="username"><strong>收件人</strong></label>
            <input type="text" id="username" name="username" value="" class="txt" />
            <?php } ?>
            <span class="xg2">短消息发出后将跳回上一页</span>
            <textarea rows="8" cols="40" name="message" class="txt" id="sendmessage" ></textarea>
            <input type="submit" name="pmsubmit_btn" id="pmsubmit_btn" value="发送" />
        </div>
    </form>
<?php } ?>
</div><?php include template('common/footer'); ?>