<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('space_share_view');
0
|| checktplrefresh('./template/default/home/space_share_view.htm', './template/default/common/seccheck.htm', 1536656459, 'diy', './data/template/1_diy_home_space_share_view.tpl.php', './template/default', 'home/space_share_view')
|| checktplrefresh('./template/default/home/space_share_view.htm', './template/default/home/space_userabout.htm', 1536656459, 'diy', './data/template/1_diy_home_space_share_view.tpl.php', './template/default', 'home/space_share_view')
;?>
<?php $_G['home_tpl_titles'] = array($tpl_title, '分享');?><?php include template('home/space_header'); ?><div id="ct" class="ct2 wp n cl">
<div class="mn">
<div class="bm">
<div class="bm_h">
<h1 class="mt">分享</h1>
</div>
<div class="bm_c">

<div id="share_ul" class="vw">
<div class="h">
<h1 class="ph"><?php echo $share['title_template'];?></h1>
<span class="y">
<?php if($_G['uid'] == $share['uid'] || checkperm('manageshare')) { ?>
<a href="home.php?mod=spacecp&amp;ac=share&amp;sid=<?php echo $share['sid'];?>&amp;op=delete&amp;type=view&amp;handlekey=delsharehk_<?php echo $share['sid'];?>" id="share_delete_<?php echo $share['sid'];?>" onclick="showWindow(this.id, this.href, 'get', 0);">删除</a>&nbsp;&nbsp;&nbsp;
<?php } if(checkperm('manageshare')) { ?>
<a href="home.php?mod=spacecp&amp;ac=share&amp;sid=<?php echo $share['sid'];?>&amp;op=edithot&amp;handlekey=hotsharehk_<?php echo $share['sid'];?>" id="a_hot_<?php echo $share['sid'];?>" onclick="showWindow(this.id, this.href, 'get', 0);">热度</a>
<?php } ?>
<!--<a href="home.php?mod=spacecp&amp;ac=common&amp;op=report&amp;idtype=sid&amp;id=<?php echo $share['sid'];?>&amp;handlekey=reportsharehk_<?php echo $share['sid'];?>" id="a_report" onclick="showWindow(this.id, this.href, 'get', 0);">举报</a>-->
</span>
<?php if($share['hot']) { ?><span class="hot">热度 <em><?php echo $share['hot'];?></em></span><?php } ?>
<span class="xg1"><?php echo dgmdate($share[dateline]);?></span>
</div>
<div id="share_article" class="ec d cl">
<?php if($share['image']) { ?>
<a href="<?php echo $share['image_link'];?>"><img src="<?php echo $share['image'];?>" class="tn" style="margin-top: 0;" alt="" /></a>
<?php } ?>
<?php echo $share['body_template'];?><br />
<?php if('video' == $share['type']) { ?>
<div class="tn" id="flash_div_<?php echo $share['sid'];?>">
<script>showFlash('<?php echo $share['body_data']['host'];?>', '<?php echo $share['body_data']['flashvar'];?>', '', '<?php echo $share['sid'];?>');</script>
</div>
<?php } elseif('music' == $share['type']) { ?>
<div class="tn" id="flash_div_<?php echo $share['sid'];?>">
<script>showFlash('music', '<?php echo $share['body_data']['musicvar'];?>', '', '<?php echo $share['sid'];?>');</script>
</div>
<?php } elseif('flash' == $share['type']) { ?>
<div class="tn" id="flash_div_<?php echo $share['sid'];?>">
<script>showFlash('flash', '<?php echo $share['body_data']['flashaddr'];?>', '', '<?php echo $share['sid'];?>');</script>
</div>
<?php } if($share['body_general']) { ?>
<div class="quote<?php if($share['image']) { ?> z<?php } ?>"><blockquote><?php echo $share['body_general'];?></blockquote></div>
<?php } ?>
</div>
</div>
<!--[diy=diycommenttop]--><div id="diycommenttop" class="area"></div><!--[/diy]-->
<div class="bm bw0 mtm mbm">
<h3 class="bbs pbn">
<?php if(!empty($list)) { ?>
<a href="home.php?mod=space&amp;uid=<?php echo $share['uid'];?>&amp;do=<?php echo $do;?>&amp;id=<?php echo $id;?>#quickcommentform_<?php echo $id;?>" onclick="if($('comment_message')){$('comment_message').focus();return false;}" class="y xi2 xw0">发表评论</a>
<?php } ?>
评论
</h3>
<div id="comment">
<?php if($cid) { ?>
<div class="i">
当前只显示与您操作相关的单个评论，<a href="home.php?mod=space&amp;uid=<?php echo $share['uid'];?>&amp;do=share&amp;id=<?php echo $share['sid'];?>">点击此处查看全部评论</a>
</div>
<?php } ?>
<div id="comment_ul" class="xld xlda"><?php if(is_array($list)) foreach($list as $k => $value) { include template('home/space_comment_li'); } ?>
</div>
</div>
<?php if($multi) { ?><div class="pgs cl mtm"><?php echo $multi;?></div><?php } ?>
</div>
<?php if(!$share['noreply'] && helper_access::check_module('share')) { ?>
<form id="quickcommentform_<?php echo $id;?>" name="quickcommentform_<?php echo $id;?>" action="home.php?mod=spacecp&amp;ac=comment&amp;handlekey=qcshare_<?php echo $id;?>" method="post" autocomplete="off" onsubmit="ajaxpost('quickcommentform_<?php echo $id;?>', 'return_qcshare_<?php echo $id;?>');doane(event);">
<?php if($_G['uid']) { ?>
<p>
<span id="comment_face" onclick="showFace(this.id, 'comment_message');return false;" class="cur1"><img src="<?php echo IMGDIR;?>/facelist.gif" alt="facelist" class="vm" /></span>
<?php if($_G['setting']['magicstatus'] && $_G['setting']['magics']['doodle']) { ?>
<a id="a_magic_doodle" href="home.php?mod=magic&amp;mid=doodle&amp;showid=comment_doodle&amp;target=comment_message" onclick="showWindow(this.id, this.href, 'get', '0')"><img src="<?php echo STATICURL;?>image/magic/doodle.small.gif" alt="doodle" class="vm" /><?php echo $_G['setting']['magics']['doodle'];?></a>
<?php } ?>
</p>
<?php } ?>
<div class="tedt mtn mbn">
<div class="area">
<?php if($_G['uid'] || $_G['group']['allowcomment']) { ?>
<textarea id="comment_message" name="message" rows="5" onkeydown="ctrlEnter(event, 'commentsubmit_btn');" class="pt"></textarea>
<?php } else { ?>
<div class="pt hm">您需要登录后才可以评论 <a href="member.php?mod=logging&amp;action=login" onclick="showWindow('login', this.href)" class="xi2">登录</a> | <a href="member.php?mod=<?php echo $_G['setting']['regname'];?>" class="xi2"><?php echo $_G['setting']['reglinkname'];?></a></div>
<?php } ?>
</div>
</div>
<?php if($secqaacheck || $seccodecheck) { ?><?php
$sectpl = <<<EOF
<sec> <span id="sec<hash>" onclick="showMenu(this.id);"><sec></span><div id="sec<hash>_menu" class="p_pop p_opt" style="display:none"><sec></div>
EOF;
?>
<div class="mtm mbm"><?php $sechash = !isset($sechash) ? 'S'.($_G['inajax'] ? 'A' : '').$_G['sid'] : $sechash.random(3);
$sectpl = str_replace("'", "\'", $sectpl);?><?php if($secqaacheck) { ?>
<span id="secqaa_q<?php echo $sechash;?>"></span>		
<script type="text/javascript" reload="1">updatesecqaa('q<?php echo $sechash;?>', '<?php echo $sectpl;?>', '<?php echo $_G['basescript'];?>::<?php echo CURMODULE;?>');</script>
<?php } if($seccodecheck) { ?>
<span id="seccode_c<?php echo $sechash;?>"></span>		
<script type="text/javascript" reload="1">updateseccode('c<?php echo $sechash;?>', '<?php echo $sectpl;?>', '<?php echo $_G['basescript'];?>::<?php echo CURMODULE;?>');</script>
<?php } ?></div>
<?php } ?>
<p>
<input type="hidden" name="refer" value="home.php?mod=space&amp;uid=<?php echo $share['uid'];?>&amp;do=<?php echo $do;?>&amp;id=<?php echo $id;?>" />
<input type="hidden" name="id" value="<?php echo $id;?>" />
<input type="hidden" name="idtype" value="sid" />
<input type="hidden" name="commentsubmit" value="true" />
<button type="submit" name="commentsubmit_btn" id="commentsubmit_btn" class="pn" value="true"<?php if(!$_G['uid']&&!$_G['group']['allowcomment']) { ?> onclick="showWindow(this.id, this.form.action);return false;"<?php } ?>><strong>评论</strong></button>
<span id="return_qcshare_<?php echo $id;?>"></span>
</p>
<input type="hidden" name="formhash" value="<?php echo FORMHASH;?>" />
</form>
<script type="text/javascript">
function succeedhandle_qcshare_<?php echo $id;?>(url, msg, values) {
comment_add(values['cid']);
<?php if($sechash) { if($secqaacheck) { ?>
updatesecqaa('<?php echo $sechash;?>');
<?php } if($seccodecheck) { ?>
updateseccode('<?php echo $sechash;?>');
<?php } } ?>
}
</script>
<?php } ?>
<script type="text/javascript">
var elems = selector('div[class~=magicflicker]');
for(var i=0; i<elems.length; i++){
magicColor(elems[i]);
}
</script>

</div>
</div>
</div>
<div class="sd"><div id="pcd" class="bm cl"><?php $encodeusername = rawurlencode($space[username]);?><div class="bm_c">
<div class="hm">
<p><a href="home.php?mod=space&amp;uid=<?php echo $space['uid'];?>" class="avtm"><?php echo avatar($space[uid],middle);?></a></p>
<h2 class="xs2"><a href="home.php?mod=space&amp;uid=<?php echo $space['uid'];?>"><?php echo $space['username'];?></a></h2>
</div>
<ul class="xl xl2 cl ul_list">
<?php if($space['self']) { if($_G['setting']['homepagestyle']) { ?>
<li class="ul_diy"><a href="home.php?mod=space&amp;do=index&amp;diy=yes">装扮空间</a></li>
<?php } if(helper_access::check_module('wall')) { ?>
<li class="ul_msg"><a href="home.php?mod=space&amp;do=wall">查看留言</a></li>
<?php } ?>
<li class="ul_avt"><a href="home.php?mod=spacecp&amp;ac=avatar">编辑头像</a></li>
<li class="ul_profile"><a href="home.php?mod=spacecp&amp;ac=profile">更新资料</a></li>
<?php } else { if(helper_access::check_module('follow')) { ?>
<li class="ul_broadcast"><a href="home.php?mod=space&amp;uid=<?php echo $space['uid'];?>">查看广播</a></li>
<?php } if(helper_access::check_module('follow') && $space['uid'] != $_G['uid']) { ?>
<li class="ul_flw"><?php $follow = 0;?><?php $follow = C::t('home_follow')->fetch_all_by_uid_followuid($_G['uid'], $space['uid']);?><?php if(!$follow) { ?>
<a id="followmod" onclick="showWindow(this.id, this.href, 'get', 0);" href="home.php?mod=spacecp&amp;ac=follow&amp;op=add&amp;hash=<?php echo FORMHASH;?>&amp;fuid=<?php echo $space['uid'];?>">收听TA</a>
<?php } else { ?>
<a id="followmod" onclick="showWindow(this.id, this.href, 'get', 0);" href="home.php?mod=spacecp&amp;ac=follow&amp;op=del&amp;fuid=<?php echo $space['uid'];?>">取消收听</a>
<?php } ?>
</li>
<?php } require_once libfile('function/friend');$isfriend=friend_check($space[uid]);?><?php if(!$isfriend) { ?>
<li class="ul_add"><a href="home.php?mod=spacecp&amp;ac=friend&amp;op=add&amp;uid=<?php echo $space['uid'];?>&amp;handlekey=addfriendhk_<?php echo $space['uid'];?>" id="a_friend_li_<?php echo $space['uid'];?>" onclick="showWindow(this.id, this.href, 'get', 0);">加为好友</a></li>
<?php } else { ?>
<li class="ul_ignore"><a href="home.php?mod=spacecp&amp;ac=friend&amp;op=ignore&amp;uid=<?php echo $space['uid'];?>&amp;handlekey=ignorefriendhk_<?php echo $space['uid'];?>" id="a_ignore_<?php echo $space['uid'];?>" onclick="showWindow(this.id, this.href, 'get', 0);">解除好友</a></li>
<?php } if(helper_access::check_module('wall')) { ?>
<li class="ul_contect"><a href="home.php?mod=space&amp;uid=<?php echo $space['uid'];?>&amp;do=wall">给我留言</a></li>
<?php } ?>
<li class="ul_poke"><a href="home.php?mod=spacecp&amp;ac=poke&amp;op=send&amp;uid=<?php echo $space['uid'];?>&amp;handlekey=propokehk_<?php echo $space['uid'];?>" id="a_poke_<?php echo $space['uid'];?>" onclick="showWindow(this.id, this.href, 'get', 0);">打个招呼</a></li>

<li class="ul_pm"><a href="home.php?mod=spacecp&amp;ac=pm&amp;op=showmsg&amp;handlekey=showmsg_<?php echo $space['uid'];?>&amp;touid=<?php echo $space['uid'];?>&amp;pmid=0&amp;daterange=2" id="a_sendpm_<?php echo $space['uid'];?>" onclick="showWindow('showMsgBox', this.href, 'get', 0)">发送消息</a></li>
<?php } ?>
</ul>
<?php if(checkperm('allowbanuser') || checkperm('allowedituser') || $_G['adminid'] == 1) { ?>
<hr class="da mtn m0">
<ul class="ptn xl xl2 cl">
<?php if(checkperm('allowbanuser') || checkperm('allowedituser')) { ?>
<li>
<?php if(checkperm('allowbanuser')) { ?>
<a href="<?php if($_G['adminid'] == 1) { ?>admin.php?action=members&operation=ban&username=<?php echo $encodeusername;?>&frames=yes<?php } else { ?>forum.php?mod=modcp&action=member&op=ban&uid=<?php echo $space['uid'];?><?php } ?>" id="usermanageli" onmouseover="showMenu(this.id)" class="showmenu" target="_blank">用户管理</a>
<?php } else { ?>
<a href="<?php if($_G['adminid'] == 1) { ?>admin.php?action=members&operation=search&username=<?php echo $encodeusername;?>&submit=yes&frames=yes<?php } else { ?>forum.php?mod=modcp&action=member&op=edit&uid=<?php echo $space['uid'];?><?php } ?>" id="usermanageli" onmouseover="showMenu(this.id)" class="showmenu" target="_blank">用户管理</a>
<?php } ?>
</li>
<?php } if($_G['adminid'] == 1) { ?>
<li><a href="forum.php?mod=modcp&amp;action=thread&amp;op=post&amp;do=search&amp;searchsubmit=1&amp;users=<?php echo $encodeusername;?>" id="umanageli" onmouseover="showMenu(this.id)" class="showmenu">内容管理</a></li>
<?php } ?>
</ul>
<?php if(checkperm('allowbanuser') || checkperm('allowedituser')) { ?>
<ul id="usermanageli_menu" class="p_pop" style="width: 80px; display:none;">
<?php if(checkperm('allowbanuser')) { ?>
<li><a href="<?php if($_G['adminid'] == 1) { ?>admin.php?action=members&operation=ban&username=<?php echo $encodeusername;?>&frames=yes<?php } else { ?>forum.php?mod=modcp&action=member&op=ban&uid=<?php echo $space['uid'];?><?php } ?>" target="_blank">禁止用户</a></li>
<?php } if(checkperm('allowedituser')) { ?>
<li><a href="<?php if($_G['adminid'] == 1) { ?>admin.php?action=members&operation=search&username=<?php echo $encodeusername;?>&submit=yes&frames=yes<?php } else { ?>forum.php?mod=modcp&action=member&op=edit&uid=<?php echo $space['uid'];?><?php } ?>" target="_blank">编辑用户</a></li>
<?php } ?>
</ul>
<?php } if($_G['adminid'] == 1) { ?>
<ul id="umanageli_menu" class="p_pop" style="width: 80px; display:none;">
<li><a href="forum.php?mod=modcp&amp;action=thread&amp;op=post&amp;searchsubmit=1&amp;do=search&amp;users=<?php echo $encodeusername;?>" target="_blank">管理帖子</a></li>
<?php if(helper_access::check_module('doing')) { ?>
<li><a href="admin.php?action=doing&amp;searchsubmit=1&amp;detail=1&amp;search=true&amp;fromumanage=1&amp;users=<?php echo $encodeusername;?>" target="_blank">管理记录</a></li>
<?php } if(helper_access::check_module('blog')) { ?>
<li><a href="admin.php?action=blog&amp;searchsubmit=1&amp;detail=1&amp;search=true&amp;fromumanage=1&amp;uid=<?php echo $space['uid'];?>" target="_blank">管理日志</a></li>
<?php } if(helper_access::check_module('feed')) { ?>
<li><a href="admin.php?action=feed&amp;searchsubmit=1&amp;detail=1&amp;fromumanage=1&amp;uid=<?php echo $space['uid'];?>" target="_blank">管理动态</a></li>
<?php } if(helper_access::check_module('album')) { ?>
<li><a href="admin.php?action=album&amp;searchsubmit=1&amp;detail=1&amp;search=true&amp;fromumanage=1&amp;uid=<?php echo $space['uid'];?>" target="_blank">管理相册</a></li>
<li><a href="admin.php?action=pic&amp;searchsubmit=1&amp;detail=1&amp;search=true&amp;fromumanage=1&amp;users=<?php echo $encodeusername;?>" target="_blank">管理图片</a></li>
<?php } if(helper_access::check_module('wall')) { ?>
<li><a href="admin.php?action=comment&amp;searchsubmit=1&amp;detail=1&amp;fromumanage=1&amp;authorid=<?php echo $space['uid'];?>" target="_blank">管理评论</a></li>
<?php } if(helper_access::check_module('share')) { ?>
<li><a href="admin.php?action=share&amp;searchsubmit=1&amp;detail=1&amp;search=true&amp;fromumanage=1&amp;uid=<?php echo $space['uid'];?>" target="_blank">管理分享</a></li>
<?php } if(helper_access::check_module('group')) { ?>
<li><a href="admin.php?action=threads&amp;operation=group&amp;searchsubmit=1&amp;detail=1&amp;search=true&amp;fromumanage=1&amp;users=<?php echo $encodeusername;?>" target="_blank">群组主题</a></li>
<li><a href="admin.php?action=prune&amp;searchsubmit=1&amp;detail=1&amp;operation=group&amp;fromumanage=1&amp;users=<?php echo $encodeusername;?>" target="_blank">群组帖子</a></li>
<?php } ?>
</ul>
<?php } } ?>
</div>
</div>
</div>
<script type="text/javascript">
function succeedhandle_followmod(url, msg, values) {
var fObj = $('followmod');
if(values['type'] == 'add') {
fObj.innerHTML = '取消收听';
fObj.href = 'home.php?mod=spacecp&ac=follow&op=del&fuid='+values['fuid'];
} else if(values['type'] == 'del') {
fObj.innerHTML = '收听TA';
fObj.href = 'home.php?mod=spacecp&ac=follow&op=add&hash=<?php echo FORMHASH;?>&fuid='+values['fuid'];
}
}
</script></div>
</div><?php include template('common/footer'); ?>