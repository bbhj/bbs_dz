<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); ?>
<table cellpadding="0" cellspacing="0" class="atd">
<tr><?php $clicknum = 0;?><?php if(is_array($clicks)) foreach($clicks as $key => $value) { $clicknum = $clicknum + $value['clicknum'];?><?php $value['height'] = $maxclicknum?intval($value['clicknum']*50/$maxclicknum):0;?><td>
<a href="home.php?mod=spacecp&amp;ac=click&amp;op=add&amp;clickid=<?php echo $key;?>&amp;idtype=<?php echo $idtype;?>&amp;id=<?php echo $id;?>&amp;hash=<?php echo $hash;?>&amp;handlekey=clickhandle" id="click_<?php echo $idtype;?>_<?php echo $id;?>_<?php echo $key;?>" onclick="<?php if($_G['uid']) { ?>ajaxmenu(this);<?php } else { ?>showWindow(this.id, this.href);<?php } ?>doane(event);">
<?php if($value['clicknum']) { ?>
<div class="atdc">
<div class="ac<?php echo $value['classid'];?>" style="height:<?php echo $value['height'];?>px;">
<em><?php echo $value['clicknum'];?></em>
</div>
</div>
<?php } ?>
<img src="<?php echo STATICURL;?>image/click/<?php echo $value['icon'];?>" alt="" /><br /><?php echo $value['name'];?>
</a>
</td>
<?php } ?>
</tr>
</table>
<script type="text/javascript">
function errorhandle_clickhandle(message, values) {
if(values['id']) {
showCreditPrompt();
show_click(values['idtype'], values['id'], values['clickid']);
}
}
</script>

<?php if($clickuserlist) { ?>
<h3 class="mbm xs1">
刚表态过的朋友 (<a href="javascript:;" onclick="show_click('<?php echo $idtype;?>', '<?php echo $id;?>', '<?php echo $key;?>')"><?php echo $clicknum;?> 人</a>)
<?php if($_G['magic']['anonymous']) { ?>
<img src="<?php echo STATICURL;?>image/magic/anonymous.small.gif" alt="anonymous" class="vm" />
<a id="a_magic_anonymous" href="home.php?mod=magic&amp;mid=anonymous&amp;idtype=<?php echo $idtype;?>&amp;id=<?php echo $id;?>" onclick="ajaxmenu(event,this.id, 1)" class="xg1"><?php echo $_G['magic']['anonymous'];?></a>
<?php } ?>
</h3>
<div id="trace_div" class="xs1">
<ul id="trace_ul" class="ml mls cl"><?php if(is_array($clickuserlist)) foreach($clickuserlist as $value) { ?><li>
<?php if($value['username']) { ?>
<div class="avt"><a href="home.php?mod=space&amp;uid=<?php echo $value['uid'];?>" target="_blank" title="<?php echo $value['clickname'];?>"><?php echo avatar($value[uid], 'small');?></a></div>
<p><a href="home.php?mod=space&amp;uid=<?php echo $value['uid'];?>"  title="<?php echo $value['username'];?>" target="_blank"><?php echo $value['username'];?></a></p>
<?php } else { ?>
<div class="avt"><img src="<?php echo STATICURL;?>image/magic/hidden.gif" alt="<?php echo $value['clickname'];?>" /></div>
<p>匿名</p>
<?php } ?>
</li>
<?php } ?>
</ul>
</div>
<?php } if($click_multi) { ?><div class="pgs cl mtm"><?php echo $click_multi;?></div><?php } ?>
