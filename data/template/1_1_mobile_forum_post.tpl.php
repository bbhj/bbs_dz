<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('post');
0
|| checktplrefresh('./template/default/mobile/forum/post.htm', './template/default/mobile/common/seccheck.htm', 1537075807, '1', './data/template/1_1_mobile_forum_post.tpl.php', './template/default', 'mobile/forum/post')
;?><?php include template('common/header'); ?><?php
$actiontitle = <<<EOF


EOF;
 if($_GET['action'] == 'newthread') { if($special == 0) { 
$actiontitle .= <<<EOF
发表帖子

EOF;
 } elseif($special == 1) { 
$actiontitle .= <<<EOF
发投票

EOF;
 } elseif($special == 2) { 
$actiontitle .= <<<EOF
出售商品

EOF;
 } elseif($special == 3) { 
$actiontitle .= <<<EOF
发悬赏

EOF;
 } elseif($special == 4) { 
$actiontitle .= <<<EOF
发起活动

EOF;
 } elseif($special == 5) { 
$actiontitle .= <<<EOF
发辩论

EOF;
 } elseif($specialextra) { 
$actiontitle .= <<<EOF
{$_G['setting']['threadplugins'][$specialextra]['name']}

EOF;
 } } elseif($_GET['action'] == 'reply') { 
$actiontitle .= <<<EOF

回复

EOF;
 } elseif($_GET['action'] == 'edit') { if($special == 2) { 
$actiontitle .= <<<EOF
编辑商品
EOF;
 } else { 
$actiontitle .= <<<EOF
编辑帖子
EOF;
 } } 
$actiontitle .= <<<EOF


EOF;
?>

<?php if($_GET['action'] != 'newthread') { $subjectcut = cutstr($thread[subject], 30);?><?php } ?><?php
$actionsubject = <<<EOF


EOF;
 if($_GET['action'] == 'reply') { 
$actionsubject .= <<<EOF

<em>&rsaquo;</em><a href="forum.php?mod=viewthread&amp;tid={$thread['tid']}">{$subjectcut}</a>

EOF;
 } elseif($_GET['action'] == 'edit') { 
$actionsubject .= <<<EOF

<em>&rsaquo;</em><a href="forum.php?mod=redirect&amp;goto=findpost&amp;ptid={$thread['tid']}&amp;pid={$pid}">{$subjectcut}</a>

EOF;
 } 
$actionsubject .= <<<EOF


EOF;
?><?php
$upnavlink = <<<EOF

forum.php?mod=forumdisplay&fid={$_GET['fid']}&mobile=yes

EOF;
?>

<?php if($_G['forum']['type'] == 'forum') { ?>
<div class="box"><a href="forum.php" title="<?php echo $_G['setting']['navs']['2']['navname'];?>"><?php echo $_G['setting']['navs']['2']['navname'];?></a> <em> &gt; </em> <a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $_G['forum']['fid'];?>"><?php echo $_G['forum']['name'];?></a> <?php echo $actionsubject;?> <em> > </em> <?php echo $actiontitle;?></div>
<?php } else { ?>
<div class="box"><a href="forum.php" title="<?php echo $_G['setting']['navs']['2']['navname'];?>"><?php echo $_G['setting']['navs']['2']['navname'];?></a> <em> &gt; </em> <a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $fup['fid'];?>"><?php echo $fup['name'];?></a> <em> &gt; </em> <a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $_G['fid'];?>"><?php echo $_G['forum']['name'];?></a> <?php echo $actionsubject;?> <em> &gt; </em> <?php echo $actiontitle;?></div>
<?php } ?>

<div class="tz ptn">
<?php if(!$_G['forum']['allowspecialonly']) { ?><a href="forum.php?mod=post&amp;action=newthread&amp;fid=<?php echo $_G['fid'];?>" title="发帖" <?php if(($_GET['sortid'] || !$special) && $_GET['action'] != 'edit' && $_GET['action'] != 'reply') { ?>class="xw1"<?php } ?>>发帖</a><span class="pipe">|</span><?php } if($_G['group']['allowpostpoll']) { ?><a href="forum.php?mod=post&amp;action=newthread&amp;fid=<?php echo $_G['fid'];?>&amp;special=1" <?php if(!$_GET['sortid'] && $special == 1) { ?>class="xw1"<?php } ?>>发投票</a><span class="pipe">|</span><?php } if($_G['group']['allowpostreward']) { ?><a href="forum.php?mod=post&amp;action=newthread&amp;fid=<?php echo $_G['fid'];?>&amp;special=3" <?php if(!$_GET['sortid'] && $special == 3) { ?>class="xw1"<?php } ?>>发悬赏</a> <span class="pipe">|</span><?php } if($_G['group']['allowpostdebate']) { ?><a href="forum.php?mod=post&amp;action=newthread&amp;fid=<?php echo $_G['fid'];?>&amp;special=5" <?php if(!$_GET['sortid'] && $special == 5) { ?>class="xw1"<?php } ?>>发辩论</a><span class="pipe">|</span><?php } if($_G['setting']['threadplugins']) { if(is_array($_G['forum']['threadplugin'])) foreach($_G['forum']['threadplugin'] as $tpid) { if(array_key_exists($tpid, $_G['setting']['threadplugins']) && @in_array($tpid, $_G['group']['allowthreadplugin'])) { ?>
<a href="forum.php?mod=post&amp;action=newthread&amp;fid=<?php echo $_G['fid'];?>&amp;specialextra=<?php echo $tpid;?>" <?php if($specialextra==$tpid) { ?>class="xw1"<?php } ?>><?php echo $_G['setting']['threadplugins'][$tpid]['name'];?></a><span class="pipe">|</span></li>
<?php } } } ?>
</div>

<?php if($special != 2 && $special != 4 ) { $adveditor = $isfirstpost && $special && ($_GET['action'] == 'newthread' || $_GET['action'] == 'reply' && !empty($_GET['addtrade']) || $_GET['action'] == 'edit' );?><form method="post" id="postform" enctype="multipart/form-data"
<?php if($_GET['action'] == 'newthread') { ?>action="forum.php?mod=post&amp;action=<?php if($special != 2) { ?>newthread<?php } else { ?>newtrade<?php } ?>&amp;fid=<?php echo $_G['fid'];?>&amp;extra=<?php echo $extra;?>&amp;topicsubmit=yes&amp;mobile=yes"
<?php } elseif($_GET['action'] == 'reply') { ?>action="forum.php?mod=post&amp;action=reply&amp;fid=<?php echo $_G['fid'];?>&amp;tid=<?php echo $_G['tid'];?>&amp;extra=<?php echo $extra;?>&amp;replysubmit=yes&amp;mobile=yes"
<?php } elseif($_GET['action'] == 'edit') { ?>action="forum.php?mod=post&amp;action=edit&amp;extra=<?php echo $extra;?>&amp;editsubmit=yes&amp;mobile=yes" <?php echo $enctype;?>
<?php } ?>>
<input type="hidden" name="formhash" id="formhash" value="<?php echo FORMHASH;?>" />
<input type="hidden" name="posttime" id="posttime" value="<?php echo TIMESTAMP;?>" />
<?php if(!empty($_GET['modthreadkey'])) { ?><input type="hidden" name="modthreadkey" id="modthreadkey" value="<?php echo $_GET['modthreadkey'];?>" /><?php } if($_GET['action'] == 'reply') { ?>
<input type="hidden" name="noticeauthor" value="<?php echo $noticeauthor;?>" />
<input type="hidden" name="noticetrimstr" value="<?php echo $noticetrimstr;?>" />
<input type="hidden" name="noticeauthormsg" value="<?php echo $noticeauthormsg;?>" />
<?php if($reppid) { ?>
<input type="hidden" name="reppid" value="<?php echo $reppid;?>" />
<?php } if($_GET['reppost']) { ?>
<input type="hidden" name="reppost" value="<?php echo $_GET['reppost'];?>" />
<?php } elseif($_GET['repquote']) { ?>
<input type="hidden" name="reppost" value="<?php echo $_GET['repquote'];?>" />
<?php } } if($_GET['action'] == 'edit') { ?>
<input type="hidden" name="fid" id="fid" value="<?php echo $_G['fid'];?>" />
<input type="hidden" name="tid" value="<?php echo $_G['tid'];?>" />
<input type="hidden" name="pid" value="<?php echo $pid;?>" />
<input type="hidden" name="page" value="<?php echo $_GET['page'];?>" />
<?php } if($special) { ?>
<input type="hidden" name="special" value="<?php echo $special;?>" />
<?php } if($specialextra) { ?>
<input type="hidden" name="specialextra" value="<?php echo $specialextra;?>" />
<?php } ?>
<div class="box">
<?php if($isfirstpost && !empty($_G['forum']['threadtypes']['types'])) { ?>
<div class="inbox">
<span class="xw1">主题分类</span>
        <?php if($_G['forum']['threadtypes']['required'] == 1) { ?>
        	<span class="xi1">必填</span>
        <?php } ?>
        <select name="typeid" id="typeid" width="80"  >
            <option value="0">选择主题分类</option>
            <?php if(is_array($_G['forum']['threadtypes']['types'])) foreach($_G['forum']['threadtypes']['types'] as $typeid => $name) { if(empty($_G['forum']['threadtypes']['moderators'][$typeid]) || $_G['forum']['ismoderator']) { ?>
<option value="<?php echo $typeid;?>"<?php if($thread['typeid'] == $typeid || $_GET['typeid'] == $typeid) { ?> selected="selected"<?php } ?>><?php echo strip_tags($name);; ?></option>
<?php } ?>
            <?php } ?>
        </select>

    </div>
    <?php } ?>

    <?php if($adveditor) { ?>
        <?php if($special == 1) { include template('forum/post_poll'); ?>        <?php } elseif($special == 3) { include template('forum/post_reward'); ?>        <?php } elseif($special == 5) { include template('forum/post_debate'); ?>        <?php } elseif($specialextra) { ?><div><?php echo $threadplughtml;?></div>
        <?php } ?>
    <?php } if($isfirstpost && $sortid) { ?>
<div class="bm inbox xg1">
发布分类信息请使用电脑版
</div>
<?php } else { ?>
<div class="inbox<?php if($_GET['action'] != 'reply') { ?> bt mtn<?php } ?>">
<?php if($_GET['action'] != 'reply') { ?>
<span class="xw1">标题</span>
<input type="text" name="subject" value="<?php echo $postinfo['subject'];?>" class="txt" size="25"  />
<?php } else { ?>
RE: <?php echo $thread['subject'];?>
<?php if($quotemessage) { ?>
<?php echo $quotemessage;?>
<?php } } ?>
</div>
<div class="inbox">
  	<textarea name="<?php echo $editor['textarea'];?>" cols="24" rows="5" id="<?php echo $editorid;?>_textarea" class="txt" ><?php echo $postinfo['message'];?></textarea>
</div>

<div class="inbox">
<?php if($_GET['action'] != 'edit' && ($secqaacheck || $seccodecheck)) { $sechash = 'S'.random(4);
$sectpl = !empty($sectpl) ? explode("<sec>", $sectpl) : array('<br />',': ','<br />','');
    $ran = random(5, 1);?><?php if($secqaacheck) { $message = '';
$question = make_secqaa();
$secqaa = lang('core', 'secqaa_tips').$question;?><?php } if($sectpl) { if($secqaacheck) { ?>
<p>
        
        <strong>验证问答</strong>
        <br />
        <span class="xg2"><?php echo $secqaa;?></span>
<input name="secqaahash" type="hidden" value="<?php echo $sechash;?>" />
        <input name="secanswer" id="secqaaverify_<?php echo $sechash;?>" type="text" class="txt" />
        </p>
<?php } if($seccodecheck) { ?>
    	<p>
<strong>验证码</strong><br />
        <img src="misc.php?mod=seccode&amp;update=<?php echo $ran;?>&amp;idhash=<?php echo $sechash;?>&amp;mobile=yes&amp;modid=<?php echo $_G['basescript'];?>::<?php echo CURMODULE;?>" />
        <br />
<input name="seccodehash" type="hidden" value="<?php echo $sechash;?>" />
        <input name="seccodeverify" id="seccodeverify_<?php echo $sechash;?>" type="text" autocomplete="off" class="txt" />
        </p>
<?php } } } ?>
</div>

<div class="inbox">
    <input type="submit" id="postsubmit" name="<?php if($_GET['action'] == 'newthread') { ?>topicsubmit<?php } elseif($_GET['action'] == 'reply') { ?>replysubmit<?php } elseif($_GET['action'] == 'edit') { ?>editsubmit<?php } ?>" value="<?php if($_GET['action'] == 'newthread') { ?>发表帖子<?php } elseif($_GET['action'] == 'reply') { ?>回复<?php } elseif($_GET['action'] == 'edit') { ?>保存<?php } ?>" />
    <?php if($_GET['action'] == 'edit' && $isorigauthor && ($isfirstpost && $thread['replies'] < 1 || !$isfirstpost) && !$rushreply && $_G['setting']['editperdel']) { ?>
        <label><input type="checkbox" name="delete" id="delete" class="pc" value="1" title="删除本帖<?php if($thread['special'] == 3) { ?>，返还悬赏费用，不退还手续费<?php } ?>"> 删?</label>
    <?php } ?>
<input type="hidden" name="uid" value="<?php echo $_G['uid'];?>" />
<input type="hidden" name="type" value="image" />
<input type="hidden" name="hash" value="<?php echo md5(substr(md5($_G['config']['security']['authkey']), 8).$_G['uid']); ?>">
<input type="file" name="Filedata">
</div>
<?php } ?>
</div>
</form>
<?php } else { ?>
<div class="box xg1">
<?php if($special == '2') { ?>
手机版不支持<strong>商品</strong>发布，请点击上方发帖选择其他方式
    <?php } elseif($special == '4') { ?>
手机版不支持<strong>活动</strong>发布，请点击上方发帖选择其他方式
    <?php } ?>
    </div>
<?php } include template('common/footer'); ?>