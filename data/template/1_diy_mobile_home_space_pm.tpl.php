<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('space_pm');
0
|| checktplrefresh('./template/default/mobile/home/space_pm.htm', './template/default/mobile/home/space_pm_node.htm', 1539764798, 'diy', './data/template/1_diy_mobile_home_space_pm.tpl.php', './template/default', 'mobile/home/space_pm')
;?>
<?php $_G['home_tpl_titles'] = array('短消息');?><?php include template('common/header'); ?><div class="box"><a href="<?php if($forcefid) { ?>forum.php?mod=forumdisplay<?php echo $forcefid;?><?php } else { ?>forum.php<?php } ?>" title="返回论坛">返回论坛</a><span class="pipe">|</span> <a href="home.php?mod=space&amp;do=pm" title="发消息" class="xw1">消息</a> <span class="pipe">|</span><a href="home.php?mod=spacecp&amp;ac=pm" title="发消息">发消息</a></div>

<div class="bm mtn">
<?php if(in_array($filter, array('privatepm')) || in_array($_GET['subop'], array('view'))) { ?>
<div class="bm_h"><?php if(in_array($_GET['subop'], array('view'))) { ?><a href="javascript:history.back();">[返回]</a><?php if($membernum >= 2 && $subject) { ?><?php echo $membernum;?>人话题:<?php echo $subject;?><?php } elseif($tousername) { ?>与<?php echo $tousername;?>交谈<?php } } else { ?>短消息<?php } ?></div>
<?php if(in_array($filter, array('privatepm'))) { ?>
    <?php if(is_array($list)) foreach($list as $key => $value) { ?>    <div class="bm_c">
        <p class="<?php if($value['new']) { ?>xw1<?php } ?>">
        <a href="<?php if($value['touid']) { ?>home.php?mod=space&do=pm&subop=view&touid=<?php echo $value['touid'];?><?php } else { ?>home.php?mod=space&do=pm&subop=view&plid=<?php echo $value['plid'];?>&daterange=1&type=1<?php } ?>"><?php if($value['pmtype'] == 2) { ?>[群聊]<?php if($value['subject']) { ?><?php echo $value['subject'];?><br><?php } } if($value['pmtype'] == 2 && $value['lastauthor']) { ?><?php echo $value['lastauthor'];?> : <?php } ?><?php echo $value['message'];?></a></p>
        <p>
        	<?php if($value['touid']) { if($value['msgfromid'] == $_G['uid']) { ?>
<span class="xg1">我对<?php echo $value['tousername'];?>说</span>
<?php } else { ?>
<span class="xg1"><?php echo $value['tousername'];?>对我说</span>
<?php } ?>
            <?php } elseif($value['pmtype'] == 2) { ?>
<span class="xg1">发起者:<?php echo $value['firstauthor'];?></span>
<?php } ?>
            <span class="xg1"><?php echo dgmdate($value[dateline], 'u');?></span>
        </p>
    </div>
    <?php } } elseif(in_array($_GET['subop'], array('view'))) { if($list) { if(is_array($list)) foreach($list as $key => $value) { ?><div class="bm_c">
<?php if($value['msgfromid']) { ?>
<a href="home.php?mod=space&amp;uid=<?php echo $value['msgfromid'];?>" class="xi2"><?php echo $value['msgfrom'];?></a> <?php } ?>
<span class="xg1"><?php echo dgmdate($value[dateline], 'u');?></span>
<?php if($value['new']) { ?><img src="<?php echo IMGDIR;?>/new_pm.gif" alt="!unread_pm!" title="!unread_pm!" /><?php } ?>
<dd class="xs1"><?php if(!$value['msgfromid'] && !$value['msgtoid']) { ?><?php echo $value['subject'];?><br><?php } ?><?php echo $value['message'];?></dd>
</div><?php } } else { ?>
<div class="ban pd5 mtn mbn">
当前没有相应的短消息
</div>
<?php } ?>
<?php echo $multi;?>
<?php if($list) { ?>
<div class="bm"></div>
        <a name="last"></a>
        <div class="bm_c">
            <form id="pmform" class="pmform" name="pmform" method="post" action="home.php?mod=spacecp&amp;ac=pm&amp;op=send&amp;pmid=<?php echo $pmid;?>&amp;daterange=<?php echo $daterange;?>&amp;pmsubmit=yes&amp;mobile=yes" >
<input type="hidden" name="formhash" value="<?php echo FORMHASH;?>" />
<?php if(!$touid) { ?>
<input type="hidden" name="plid" value="<?php echo $plid;?>" />
<?php } else { ?>
<input type="hidden" name="touid" value="<?php echo $touid;?>" />
<?php } ?>
<textarea rows="2" cols="40" name="message" class="txt" id="replymessage" onkeydown="ctrlEnter(event, 'pmsubmit');"></textarea>
<p class="mtn">
<input type="submit" name="pmsubmit" id="pmsubmit" value="回复" />
</p>
            </form>
        </div>
     </div>
    <?php } } } else { ?>
<div class="bm_c">
手机版不支持复杂短消息操作，请返回<a href="home.php?mod=space&amp;do=pm&amp;filter=privatepm">我的短消息</a>
    </div>
<?php } ?>
</div><?php include template('common/footer'); ?>