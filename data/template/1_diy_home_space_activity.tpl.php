<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('space_activity');
0
|| checktplrefresh('./template/default/home/space_activity.htm', './template/default/home/space_thread_nav.htm', 1536907586, 'diy', './data/template/1_diy_home_space_activity.tpl.php', './template/default', 'home/space_activity')
;?>
<?php $_G[home_tpl_spacemenus][] = "<a href=\"home.php?mod=space&amp;uid=$space[uid]&amp;do=activity&amp;view=me\">TA 的所有活动</a>";?><?php include template('common/header'); ?><div id="pt" class="bm cl">
<div class="z">
<a href="./" class="nvhm" title="首页"><?php echo $_G['setting']['bbname'];?></a> <em>&rsaquo;</em>
<a href="home.php?mod=space&amp;do=thread">帖子</a> <em>&rsaquo;</em>
 	<a href="home.php?mod=space&amp;uid=<?php echo $space['uid'];?>&amp;do=activity&amp;view=me">活动</a>
</div>
</div><?php $weekarr = array(0 => '日', 1 => '一', 2 => '二', 3 => '三', 4 => '四', 5 => '五', 6 => '六');?><style id="diy_style" type="text/css"></style>
<div class="wp">
<!--[diy=diy1]--><div id="diy1" class="area"></div><!--[/diy]-->
</div>
<div id="ct" class="ct2_a wp cl">
<div class="mn">
<!--[diy=diycontenttop]--><div id="diycontenttop" class="area"></div><!--[/diy]-->
<div class="bm bw0">
<?php if((!$_G['uid'] && !$space['uid']) || $space['self']) { ?>
<h1 class="mt"><img alt="activity" src="<?php echo IMGDIR;?>/activitysmall.gif" class="vm" /> 活动</h1>
<?php } if($space['self']) { ?>
<ul class="tb cl">
<li<?php echo $actives['we'];?>><a href="home.php?mod=space&amp;do=activity&amp;view=we">好友发起的活动</a></li>
<li<?php echo $actives['me'];?>><a href="home.php?mod=space&amp;do=activity&amp;view=me">我的活动</a></li>
<?php if($_G['group']['allowpostactivity']) { ?>
<li class="o">
<?php if($_G['setting']['activityforumid']) { ?>
<a href="forum.php?mod=post&amp;action=newthread&amp;fid=<?php echo $_G['setting']['activityforumid'];?>&amp;special=4">发起新活动</a>
<?php } else { ?>
<a href="forum.php?mod=misc&amp;action=nav&amp;special=4" onclick="showWindow('nav', this.href)">发起新活动</a>
<?php } ?>
</li>
<?php } ?>
</ul>
<?php } else { include template('home/space_menu'); } if($_GET['view'] == 'me') { ?>
<div class="tbmu">
<a href="home.php?mod=space&amp;do=activity&amp;view=me" <?php echo $orderactives['orig'];?>>我发起的活动</a><span class="pipe">|</span>
<a href="home.php?mod=space&amp;do=activity&amp;view=me&amp;type=apply" <?php echo $orderactives['apply'];?>>我参与的活动</a>
</div>
<?php } if($userlist) { ?>
<p class="tbmu">
按好友筛选
<select name="fuidsel" onchange="fuidgoto(this.value);">
<option value="">全部好友</option><?php if(is_array($userlist)) foreach($userlist as $value) { ?><option value="<?php echo $value['fuid'];?>"<?php echo $fuid_actives[$value['fuid']];?>><?php echo $value['fusername'];?></option>
<?php } ?>
</select>
</p>
<?php } if($list) { if(is_array($list)) foreach($list as $key => $activitylist) { $caption = true;?><table cellpadding="0" cellspacing="0" class="acl mbm"><?php if(is_array($activitylist)) foreach($activitylist as $tid => $thread) { if($caption) { ?>
<caption>
<h3 class="cl">
<span><strong><?php echo $thread['month'];?></strong><em><?php echo $thread['day'];?></em></span>
<?php echo $thread['time'];?><br />
<cite class="xs1">星期<?php echo $weekarr[$thread['week']];?><cite>
</h3>
</caption><?php $caption = false;?><?php } ?>
<tr>
<td class="type"><?php if($thread['aid']) { ?><img src="<?php echo getforumimg($thread['aid']); ?>" alt="<?php echo $thread['subject'];?>" width="80" /><?php } else { ?><img src="<?php echo IMGDIR;?>/nophotosmall.gif" alt="nophoto" width="80" height="80" /><?php } ?></td>
<td>
<h4><a href="forum.php?mod=viewthread&amp;tid=<?php echo $thread['tid'];?>" target="_blank"><?php echo $thread['subject'];?></a></h4>
<p><?php echo $thread['message'];?></p>
</td>
<td class="addr">
<strong><?php echo $thread['class'];?></strong><br />
<?php echo $thread['place'];?><br />
<strong>已有 <em class="xi1"><?php echo $thread['applynumber'];?></em> 人参加</strong><br />
<?php echo $thread['replies'];?> 条留言
</td>
<td class="orgr">
<ul class="ml mls cl">
<li>
<a href="home.php?mod=space&amp;uid=<?php echo $thread['authorid'];?>" class="avt" c="1" target="_blank"><?php echo avatar($thread[authorid],small);?></a>
<p><a title="<?php echo $thread['author'];?>" href="home.php?mod=space&amp;uid=<?php echo $thread['authorid'];?>" target="_blank"><?php echo $thread['author'];?></a></p>
</li>
</ul>
</td>
</tr>
<?php } ?>
</table>
<?php } if($hiddennum) { ?>
<p class="mtm">本页有 <?php echo $hiddennum;?> 个活动因隐私问题而隐藏</p>
<?php } if($multi) { ?><div class="pgs cl"><?php echo $multi;?></div><?php } } else { ?>
<div class="emp">还没有相关的活动</div>
<?php } ?>
</div>
<!--[diy=diycontentbottom]--><div id="diycontentbottom" class="area"></div><!--[/diy]-->
</div>
<div class="appl"><div class="tbn">
<h2 class="mt bbda">帖子</h2>
<ul>
<li <?php echo $opactives['thread'];?>><a href="forum.php?mod=guide&amp;view=my">全部</a></li>
<li <?php echo $opactives['activity'];?>><a href="home.php?mod=space&amp;do=activity&amp;view=me">活动</a></li>
<li <?php echo $opactives['poll'];?>><a href="home.php?mod=space&amp;do=poll&amp;view=me">投票</a></li>
<li <?php echo $opactives['reward'];?>><a href="home.php?mod=space&amp;do=reward&amp;view=me">悬赏</a></li>
<li <?php echo $opactives['trade'];?>><a href="home.php?mod=space&amp;do=trade&amp;view=me">商品</a></li>
<?php if(!empty($_G['setting']['plugins']['space_thread'])) { if(is_array($_G['setting']['plugins']['space_thread'])) foreach($_G['setting']['plugins']['space_thread'] as $id => $module) { if(!$module['adminid'] || ($module['adminid'] && $_G['adminid'] > 0 && $module['adminid'] >= $_G['adminid'])) { ?><li<?php if($_GET['id'] == $id) { ?> class="a"<?php } ?>><a href="home.php?mod=space&amp;do=plugin&amp;op=thread&amp;id=<?php echo $id;?>"><?php echo $module['name'];?></a></li><?php } } } ?>
</ul>
</div><div class="drag">
<!--[diy=diy2]--><div id="diy2" class="area"></div><!--[/diy]-->
</div>
</div>
</div>
<div class="wp mtn">
<!--[diy=diy3]--><div id="diy3" class="area"></div><!--[/diy]-->
</div>

<script type="text/javascript">
function fuidgoto(fuid) {
var parameter = fuid != '' ? '&fuid='+fuid : '';
window.location.href = 'home.php?mod=space&do=activity&view=we'+parameter;
}
</script><?php include template('common/footer'); ?>