<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('space_reward');
0
|| checktplrefresh('./template/default/home/space_reward.htm', './template/default/home/space_thread_nav.htm', 1562137768, 'diy', './data/template/1_diy_home_space_reward.tpl.php', './template/default', 'home/space_reward')
;?>
<?php $_G[home_tpl_spacemenus][] = "<a href=\"home.php?mod=space&amp;uid=$space[uid]&amp;do=reward&amp;view=me\">TA 的所有悬赏</a>";?><?php include template('common/header'); ?><div id="pt" class="bm cl">
<div class="z">
<a href="./" class="nvhm" title="首页"><?php echo $_G['setting']['bbname'];?></a> <em>&rsaquo;</em>
<a href="home.php?mod=space&amp;do=thread">帖子</a> <em>&rsaquo;</em>
<a href="home.php?mod=space&amp;uid=<?php echo $space['uid'];?>&amp;do=reward&amp;view=me">悬赏</a>
</div>
</div>
<style id="diy_style" type="text/css"></style>
<div class="wp">
<!--[diy=diy1]--><div id="diy1" class="area"></div><!--[/diy]-->
</div>
<div id="ct" class="ct2_a wp cl">
<div class="mn">
<!--[diy=diycontenttop]--><div id="diycontenttop" class="area"></div><!--[/diy]-->
<div class="bm bw0">
<?php if((!$_G['uid'] && !$space['uid']) || $space['self']) { ?>
<h1 class="mt"><img alt="reward" src="<?php echo IMGDIR;?>/rewardsmall.gif" class="vm" /> 悬赏</h1>
<?php } if($space['self']) { ?>
<ul class="tb cl">
<li<?php echo $actives['we'];?>><a href="home.php?mod=space&amp;do=reward&amp;view=we">好友发布的悬赏</a></li>
<li<?php echo $actives['me'];?>><a href="home.php?mod=space&amp;do=reward&amp;view=me">我的悬赏</a></li>
<?php if($_G['group']['allowpostreward']) { ?>
<li class="o">
<?php if($_G['setting']['rewardforumid']) { ?>
<a href="forum.php?mod=post&amp;action=newthread&amp;fid=<?php echo $_G['setting']['rewardforumid'];?>&amp;special=3">发布新悬赏</a>
<?php } else { ?>
<a href="forum.php?mod=misc&amp;action=nav&amp;special=3" onclick="showWindow('nav', this.href)">发布新悬赏</a>
<?php } ?>
</li>
<?php } ?>
</ul>
<?php } else { include template('home/space_menu'); } ?>
<p class="tbmu cl"><?php $flag = array(0 => '全部', 1 => '未解决', -1 => '已解决');?><span class="y">
<select onchange="filterFlag(this.value)"><?php if(is_array($flag)) foreach($flag as $key => $str) { ?><option value="<?php echo $key;?>"<?php if($_GET['flag']==$key) { ?> selected="selected"<?php } ?>><?php echo $str;?></option>
<?php } ?>
</select>
</span>
<?php if($userlist) { ?>
按好友查看
<select name="fuidsel" onchange="fuidgoto(this.value);" class="ps">
<option value="">全部好友</option><?php if(is_array($userlist)) foreach($userlist as $value) { ?><option value="<?php echo $value['fuid'];?>"<?php echo $fuid_actives[$value['fuid']];?>><?php echo $value['fusername'];?></option>
<?php } ?>
</select>
<?php } ?>
</p>
<?php if($count) { ?>
<ul class="rwdl cl"><?php if(is_array($list)) foreach($list as $thread) { ?><li class="bbda">
<div class="uslvd <?php if($thread['price'] < 0) { ?> slvd<?php } ?>">
<cite><?php echo abs($thread['price']);?><span><?php echo $_G['setting']['extcredits'][$creditid]['title'];?></span></cite>
<em><?php if($thread['price'] < 0) { ?>已解决<?php } else { ?>未解决<?php } ?></em>
</div>
<h4><a href="forum.php?mod=viewthread&amp;tid=<?php echo $thread['tid'];?>" target="_blank"><?php echo $thread['subject'];?></a></h4>
<p class="mtm"><a href="home.php?mod=space&amp;uid=<?php echo $thread['authorid'];?>" c="1" target="_blank"><?php echo $thread['author'];?></a> <span class="xg1"><?php echo $thread['dateline'];?></span></p>
<p class="mtm xg1"><?php if($thread['replies']) { ?>已有 <?php echo $thread['replies'];?> 个<?php } else { ?>暂无<?php } ?>回答<span class="pipe">|</span><a href="forum.php?mod=post&amp;action=reply&amp;fid=<?php echo $thread['fid'];?>&amp;tid=<?php echo $thread['tid'];?>" target="_blank">我来回答</a></p>
</li>
<?php } if(count($list)%2!=0) { ?>
<li class="bbda">&nbsp;</li>
<?php } ?>
</ul>
<?php if($hiddennum) { ?>
<p class="mtm">本页有 <?php echo $hiddennum;?> 个悬赏因隐私问题而隐藏</p>
<?php } if($multi) { ?><div class="pgs cl mtm"><?php echo $multi;?></div><?php } } else { ?>
<div class="emp">还没有相关的悬赏</div>
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
window.location.href = 'home.php?mod=space&do=reward&view=we<?php if($_GET['flag']) { ?>&flag=<?php echo $_GET['flag'];?><?php } ?>'+parameter;
}
function filterFlag(flag) {
window.location.href = 'home.php?mod=space&do=reward&<?php if($_GET['order']) { ?>order=hot&<?php } ?>view=<?php echo $_GET['view'];?>&<?php if($_GET['fuid']) { ?>fuid=<?php echo $_GET['fuid'];?>&<?php } ?>flag='+flag;
}
</script><?php include template('common/footer'); ?>