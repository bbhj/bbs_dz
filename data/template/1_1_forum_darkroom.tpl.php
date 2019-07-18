<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('darkroom');?><?php include template('common/header'); ?><div id="pt" class="bm cl">
<div class="z">
<a href="./" class="nvhm" title="首页"><?php echo $_G['setting']['bbname'];?></a> <em>&rsaquo;</em>
<a href="forum.php?mod=misc&amp;action=showdarkroom">小黑屋</a>
</div>
</div>

<div style="margin:10px 0;">
<table id="darkroomtable" summary="小黑屋" cellspacing="0" cellpadding="0" class="bm dt">
<tr>
<th class="xw1" style="width:105px;">用户名</th>
<th class="xw1" style="width:135px;">操作行为</th>
<th class="xw1" style="width:155px;">过期时间</th>
<th class="xw1" style="width:155px;">操作时间</th>
<th class="xw1">操作理由</th>
</tr>
<?php if($crimelist) { $i = 0;?><?php if(is_array($crimelist)) foreach($crimelist as $crime) { $i++;?><tr id="darkroomuid_<?php echo $crime['uid'];?>" <?php if($i % 2 == 0) { ?> class="alt"<?php } ?>>
<td><a href="home.php?mod=space&amp;uid=<?php echo $crime['uid'];?>" targe="_blank"><?php echo $crime['username'];?></a></td>
<td><?php echo $crime['action'];?></td>
<td><?php echo $crime['groupexpiry'];?></td>
<td><?php echo $crime['dateline'];?></td>
<td><?php echo $crime['reason'];?></td>
</tr>
<?php } ?>
</table>
<?php if($dataexist == 1) { ?>
<div class="bm bw0 pgs cl">
<span class="pgb y"><div class="pg"><a href="javascript:;" class="nxt" id="darkroommore" cid="<?php echo $cid;?>">更多</a></div></span>
</div>
<?php } } else { ?>
<tr>
<td colspan="6" align="center">还没有人入住小黑屋，大家都是模范会员~</td>
</tr>
</table>
<?php } ?>
</div>

<script type="text/javascript">
(function() {
 if($('darkroommore')) {
$('darkroommore').onclick = function() {
var obj = this;
var cid = parseInt(obj.getAttribute('cid').valueOf());
var url = 'forum.php?mod=misc&action=showdarkroom&cid=' + cid + '&t=' + parseInt((+new Date()/1000)/(Math.random()*1000));
var table = $('darkroomtable');
var tablerows = table.rows.length;
var x = new Ajax('JSON');
x.getJSON(url, function(s) {
if(s && s.message) {
if(s.message.dataexist == 1) {
obj.setAttribute('cid', s.message.cid);
} else {
obj.style.display = 'none';
}
var list = s.data;
for(i in list) {
if($('darkroomuid_' + list[i].uid)) {
continue;
}
var newtr = table.insertRow(tablerows);
if(tablerows % 2 == 0) {
newtr.className = 'alt';
}
newtr.insertCell(0).innerHTML = '<a href="home.php?mod=space&amp;uid=' + list[i].uid + '" target="_blank">' + list[i].username + '</a>';
newtr.insertCell(1).innerHTML = list[i].action;
newtr.insertCell(2).innerHTML = list[i].groupexpiry;
newtr.insertCell(3).innerHTML = list[i].dateline;
newtr.insertCell(4).innerHTML = list[i].reason;
tablerows++;
}
}
});
};
 }
 })();
</script><?php include template('common/footer'); ?>