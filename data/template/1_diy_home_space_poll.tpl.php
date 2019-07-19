<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('space_poll');
0
|| checktplrefresh('./template/default/home/space_poll.htm', './template/default/home/space_thread_nav.htm', 1540281562, 'diy', './data/template/1_diy_home_space_poll.tpl.php', './template/default', 'home/space_poll')
;?>
<?php $_G[home_tpl_spacemenus][] = "<a href=\"home.php?mod=space&amp;uid=$space[uid]&amp;do=poll&amp;view=me\">TA 的所有投票</a>";?><?php include template('common/header'); ?><div id="pt" class="bm cl">
<div class="z">
<a href="./" class="nvhm" title="首页"><?php echo $_G['setting']['bbname'];?></a> <em>&rsaquo;</em> 
<a href="home.php?mod=space&amp;do=thread">帖子</a> <em>&rsaquo;</em>
<a href="home.php?mod=space&amp;uid=<?php echo $space['uid'];?>&amp;do=poll&amp;view=me">投票</a>
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
<h1 class="mt"><img alt="poll" src="<?php echo IMGDIR;?>/pollsmall.gif" class="vm" /> 投票</h1>
<?php } if($space['self']) { ?>
<ul class="tb cl">
<li<?php echo $actives['we'];?>><a href="home.php?mod=space&amp;do=poll&amp;view=we">好友发起的投票</a></li>
<li<?php echo $actives['me'];?>><a href="home.php?mod=space&amp;do=poll&amp;view=me">我的投票</a></li>
<?php if($_G['group']['allowpostpoll']) { ?>
<li class="o">
<?php if($_G['setting']['pollforumid']) { ?>
<a href="forum.php?mod=post&amp;action=newthread&amp;fid=<?php echo $_G['setting']['pollforumid'];?>&amp;special=1">发起新投票</a>
<?php } else { ?>
<a href="forum.php?mod=misc&amp;action=nav&amp;special=1" onclick="showWindow('nav', this.href)">发起新投票</a>
<?php } ?>
</li>
<?php } ?>
</ul>
<?php } else { include template('home/space_menu'); } if($_GET['view'] == 'me') { ?>
<p class="tbmu">
<a href="home.php?mod=space&amp;do=poll&amp;view=me"<?php echo $filteractives['publish'];?>>我发起的</a><span class="pipe">|</span>
<a href="home.php?mod=space&amp;do=poll&amp;view=me&amp;filter=join"<?php echo $filteractives['join'];?>>我参与的 </a>
</p>
<?php } if($userlist) { ?>
<p class="tbmu">
按好友查看
<select name="fuidsel" onchange="fuidgoto(this.value);" class="ps">
<option value="">全部好友</option><?php if(is_array($userlist)) foreach($userlist as $value) { ?><option value="<?php echo $value['fuid'];?>"<?php echo $fuid_actives[$value['fuid']];?>><?php echo $value['fusername'];?></option>
<?php } ?>
</select>
</p>
<?php } if($count) { ?>
<ul class="el pll"><?php if(is_array($list)) foreach($list as $thread) { ?><li class="cl">
<div class="u z">
<a href="home.php?mod=space&amp;uid=<?php echo $thread['authorid'];?>" class="avt" c="1" target="_blank"><?php echo avatar($thread[authorid],small);?></a>
<p class="mtn"><a href="home.php?mod=space&amp;uid=<?php echo $thread['authorid'];?>" target="_blank"><?php echo $thread['author'];?></a></p>
</div>
<div class="s y">
<a href="forum.php?mod=viewthread&amp;tid=<?php echo $thread['tid'];?>" class="joins" target="_blank">
<span><?php echo $thread['poll']['voters'];?></span>人参与
</a>
<a href="forum.php?mod=viewthread&amp;tid=<?php echo $thread['tid'];?>" class="go" target="_blank">去投票</a>
</div>
<div class="c">
<h4 class="h"><a href="forum.php?mod=viewthread&amp;tid=<?php echo $thread['tid'];?>" target="_blank"><?php echo $thread['subject'];?></a></h4>
<ol><?php if(is_array($thread['poll']['pollpreview'])) foreach($thread['poll']['pollpreview'] as $key => $value) { ?><li><?php echo $value;?></li>
<?php } ?>
<li style="list-style-type: none;">
...
</li>
</ol>
<div class="mtn xg1">
<?php echo $thread['dateline'];?>
<span class="pipe">|</span>
收藏 <?php echo $thread['favtimes'];?>
<span class="pipe">|</span>
分享 <?php echo $thread['sharetimes'];?>
<span class="pipe">|</span>
热度 <?php echo $thread['heats'];?>
</div>
</div>
</li>
<?php } ?>
</ul>
<?php if($hiddennum) { ?>
<p class="mtm">本页有 <?php echo $hiddennum;?> 个投票因隐私问题而隐藏</p>
<?php } if($multi) { ?><div class="pgs cl mtm"><?php echo $multi;?></div><?php } } else { ?>
<div class="emp">还没有相关的投票</div>
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
window.location.href = 'home.php?mod=space&do=poll&view=we'+parameter;
}
</script><?php include template('common/footer'); ?>