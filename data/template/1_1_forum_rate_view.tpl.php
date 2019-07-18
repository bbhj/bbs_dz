<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('rate_view');?><?php include template('common/header'); if(empty($_GET['infloat'])) { ?>
<div id="pt" class="bm cl">
<div class="z"><a href="./" class="nvhm" title="首页"><?php echo $_G['setting']['bbname'];?></a> <em>&rsaquo;</em> <?php echo $navigation;?></div>
</div>
<div id="ct" class="wp cl">
<div class="mn">
<div class="bm bw0">
<?php } ?>

<div class="f_c">
<h3 class="flb">
<em id="return_<?php echo $_GET['handlekey'];?>">查看全部评分</em>
<span>
<?php if(!empty($_GET['infloat'])) { ?><a href="javascript:;" class="flbc" onclick="hideWindow('<?php echo $_GET['handlekey'];?>')" title="关闭">关闭</a><?php } ?>
</span>
</h3>
<div class="c floatwrap">
<table class="list" cellspacing="0" cellpadding="0">
<thead>
<tr>
<td>积分</td>
<td>用户名</td>
<td>时间</td>
<td>理由</td>
</tr>
</thead><?php if(is_array($loglist)) foreach($loglist as $log) { ?><tr>
<td><?php echo $_G['setting']['extcredits'][$log['extcredits']]['title'];?> <?php echo $log['score'];?> <?php echo $_G['setting']['extcredits'][$log['extcredits']]['unit'];?></td>
<td><a href="home.php?mod=space&amp;uid=<?php echo $log['uid'];?>"><?php echo $log['username'];?></a></td>
<td><?php echo $log['dateline'];?></td>
<td><?php echo $log['reason'];?></td>
</tr>
<?php } ?>
</table>
</div>
</div>
<div class="o pns">
总计:<?php if(is_array($logcount)) foreach($logcount as $id => $count) { ?>&nbsp;<?php echo $_G['setting']['extcredits'][$id]['title'];?> <?php if($count>0) { ?>+<?php } ?><?php echo $count;?> <?php echo $_G['setting']['extcredits'][$id]['unit'];?> &nbsp;
<?php } ?>
</div>

<?php if(empty($_GET['infloat'])) { ?>
</div>
</div>
</div>
<?php } include template('common/footer'); ?>