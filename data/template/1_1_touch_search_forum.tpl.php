<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('forum');
0
|| checktplrefresh('./template/default/touch/search/forum.htm', './template/default/touch/search/pubsearch.htm', 1536568995, '1', './data/template/1_1_touch_search_forum.tpl.php', './template/default', 'touch/search/forum')
|| checktplrefresh('./template/default/touch/search/forum.htm', './template/default/touch/search/thread_list.htm', 1536568995, '1', './data/template/1_1_touch_search_forum.tpl.php', './template/default', 'touch/search/forum')
;?><?php include template('common/header'); ?><!-- header start -->
<header class="header">
<div class="hdc cl">
<?php if($_G['setting']['domain']['app']['mobile']) { $nav = 'http://'.$_G['setting']['domain']['app']['mobile'];?><?php } else { $nav = "forum.php";?><?php } ?>
<h2><a title="<?php echo $_G['setting']['bbname'];?>" href="<?php echo $nav;?>"><img src="<?php echo STATICURL;?>image/mobile/images/logo.png" /></a></h2>
<ul class="user_fun">
<li class="on"><a href="search.php?mod=forum" class="icon_search">搜索</a></li>
<li><a href="forum.php?forumlist=1" class="icon_threadlist">版块列表</a></li>
<li id="usermsg"><a href="<?php if($_G['uid']) { ?>home.php?mod=space&uid=<?php echo $_G['uid'];?>&do=profile&mycenter=1<?php } else { ?>member.php?mod=logging&action=login<?php } ?>" class="icon_userinfo">用户信息</a><?php if($_G['member']['newpm']) { ?><span class="icon_msg"></span><?php } ?></li>
<?php if($_G['setting']['mobile']['mobilehotthread']) { ?>
<li><a href="forum.php?mod=guide&amp;view=hot" class="icon_hotthread">热帖</a></li>
<?php } ?>
</ul>
</div>
</header>
<!-- header end -->
<form id="searchform" class="searchform" method="post" autocomplete="off" action="search.php?mod=forum&amp;mobile=2">
<input type="hidden" name="formhash" value="<?php echo FORMHASH;?>" /><?php if(!empty($srchtype)) { ?><input type="hidden" name="srchtype" value="<?php echo $srchtype;?>" /><?php } ?>
<div class="search">
<table width="100%" cellspacing="0" cellpadding="0">
<tbody>
<tr>
<td>
<input value="<?php echo $keyword;?>" autocomplete="off" class="input" name="srchtxt" id="scform_srchtxt" value="" placeholder="搜索帖子">
</td>
<td width="66" align="center" class="scbar_btn_td">
<div><input type="hidden" name="searchsubmit" value="yes"><input type="submit" value="搜索" class="button2" id="scform_submit"></div>
</td>
</tr>
</tbody>
</table>
</div><?php $policymsgs = $p = '';?><?php if(is_array($_G['setting']['creditspolicy']['search'])) foreach($_G['setting']['creditspolicy']['search'] as $id => $policy) { ?><?php
$policymsg = <<<EOF

EOF;
 if($_G['setting']['extcredits'][$id]['img']) { 
$policymsg .= <<<EOF
{$_G['setting']['extcredits'][$id]['img']} 
EOF;
 } 
$policymsg .= <<<EOF
{$_G['setting']['extcredits'][$id]['title']} {$policy} {$_G['setting']['extcredits'][$id]['unit']}
EOF;
?><?php $policymsgs .= $p.$policymsg;$p = ', ';?><?php } if($policymsgs) { ?><p>每进行一次搜索将扣除 <?php echo $policymsgs;?></p><?php } ?>
</form>

<?php if(!empty($searchid) && submitcheck('searchsubmit', 1)) { ?><div class="threadlist">
<h2 class="thread_tit"><?php if($keyword) { ?>结果: <em>找到 “<span class="emfont"><?php echo $keyword;?></span>” 相关内容 <?php echo $index['num'];?> 个</em> <?php if($modfid) { ?><a href="forum.php?mod=modcp&amp;action=thread&amp;fid=<?php echo $modfid;?>&amp;keywords=<?php echo $modkeyword;?>&amp;submit=true&amp;do=search&amp;page=<?php echo $page;?>" target="_blank">进入管理面板</a><?php } } else { ?>结果: <em>找到相关主题 <?php echo $index['num'];?> 个</em><?php } ?></h2>
<?php if(empty($threadlist)) { ?>
<ul><li><a href="javascript:;">对不起，没有找到匹配结果。</a></li></ul>
<?php } else { ?>
<ul><?php if(is_array($threadlist)) foreach($threadlist as $thread) { ?><li>
<a href="forum.php?mod=viewthread&amp;tid=<?php echo $thread['realtid'];?>&amp;highlight=<?php echo $index['keywords'];?>" target="_blank" <?php echo $thread['highlight'];?>><?php echo $thread['subject'];?></a>
</li>
<?php } ?>
</ul>
<?php } ?>
<?php echo $multipage;?>
</div>
<?php } include template('common/footer'); ?>