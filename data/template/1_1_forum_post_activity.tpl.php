<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); ?>
<div class="exfm cl">
<div class="sinf sppoll z">
<dl>
<dt><span class="rq">*</span>活动时间:</dt>
<dd>
<div id="certainstarttime" <?php if($activity['starttimeto']) { ?>style="display: none"<?php } ?>>
<input type="text" name="starttimefrom[0]" id="starttimefrom_0" class="px" onclick="showcalendar(event, this, true)" autocomplete="off" value="<?php echo $activity['starttimefrom'];?>" tabindex="1" />
</div>
<div id="uncertainstarttime" <?php if(!$activity['starttimeto']) { ?>style="display: none"<?php } ?>>
<input type="text" name="starttimefrom[1]" id="starttimefrom_1" class="px" onclick="showcalendar(event, this, true)" autocomplete="off" value="<?php echo $activity['starttimefrom'];?>" tabindex="1" /><span> ~ </span><input onclick="showcalendar(event, this, true)" type="text" autocomplete="off" id="starttimeto" name="starttimeto" class="px" value="<?php if($activity['starttimeto']) { ?><?php echo $activity['starttimeto'];?><?php } ?>" tabindex="1" />
</div>
<div class="spmf cl">
<label for="activitytime"><input type="checkbox" id="activitytime" name="activitytime" class="pc" onclick="if(this.checked) {$('certainstarttime').style.display='none';$('uncertainstarttime').style.display='';} else {$('certainstarttime').style.display='';$('uncertainstarttime').style.display='none';}" value="1" <?php if($activity['starttimeto']) { ?>checked<?php } ?> tabindex="1" />时间范围</label>
</div>
</dd>
<dt><span class="rq">*</span><label for="activityplace">活动地点:</label></dt>
<dd>
<input type="text" name="activityplace" id="activityplace" class="px oinf" value="<?php echo $activity['place'];?>" tabindex="1" />
</dd>
<?php if($_GET['action'] == 'newthread') { ?>
<dt><label for="activitycity">所在城市:</label></dt>
<dd><input name="activitycity" id="activitycity" class="px" type="text" tabindex="1" /></dd>
<?php } ?>
<dt><span class="rq">*</span><label for="activityclass">活动类别:</label></dt>
<dd class="hasd cl">
<?php if($activitytypelist) { ?>
<ul id="activitytypelist" style="display: none"><?php if(is_array($activitytypelist)) foreach($activitytypelist as $type) { ?><li><?php echo $type;?></li>
<?php } ?>
</ul>
<?php } ?>
<span><input type="text" id="activityclass" name="activityclass" class="px" value="<?php echo $activity['class'];?>" tabindex="1" /></span>
<?php if($activitytypelist) { ?>
<a href="javascript:;" class="dpbtn" onclick="showselect(this, 'activityclass', 'activitytypelist')">^</a>
<?php } ?>
</dd>
<dt><label for="activitynumber">需要人数:</label></dt>
<dd>
<input type="text" name="activitynumber" id="activitynumber" class="px z" style="width:55px;" onkeyup="checkvalue(this.value, 'activitynumbermessage')" value="<?php echo $activity['number'];?>" tabindex="1" />
<span class="ftid">
<select name="gender" id="gender" width="38" class="ps">
<option value="0" <?php if(!$activity['gender']) { ?>selected="selected"<?php } ?>>不限</option>
<option value="1" <?php if($activity['gender'] == 1) { ?>selected="selected"<?php } ?>>男</option>
<option value="2" <?php if($activity['gender'] == 2) { ?>selected="selected"<?php } ?>>女</option>
</select>
</span>
<span id="activitynumbermessage"></span>
</dd>
<?php if($_G['setting']['activityfield']) { ?>
<dt>必填资料项:</dt>
<dd>
<ul class="xl2 cl"><?php if(is_array($_G['setting']['activityfield'])) foreach($_G['setting']['activityfield'] as $key => $val) { ?><li><label for="userfield_<?php echo $key;?>"><input type="checkbox" name="userfield[]" id="userfield_<?php echo $key;?>" class="pc" value="<?php echo $key;?>"<?php if($activity['ufield']['userfield'] && in_array($key, $activity['ufield']['userfield'])) { ?> checked="checked"<?php } ?> /><?php echo $val;?></label></li>
<?php } ?>
</ul>
</dd>
<?php } if($_G['setting']['activityextnum']) { ?>
<dt><label for="extfield">扩展资料项:</label></dt>
<dd>
<textarea name="extfield" id="extfield" class="pt" cols="50" style="width: 270px;"><?php if($activity['ufield']['extfield']) { ?><?php echo $activity['ufield']['extfield'];?><?php } ?></textarea><br />每行代表一个项目，最多 <?php echo $_G['setting']['activityextnum'];?> 项
</dd>
<?php } ?>
</dl>
</div>
<div class="sadd z">
<dl>
<?php if($_G['setting']['activitycredit']) { ?>
<dt><label for="activitycredit">消耗积分:</label></dt>
<dd>
<input type="text" name="activitycredit" id="activitycredit" class="px" value="<?php echo $activity['credit'];?>" /><?php echo $_G['setting']['extcredits'][$_G['setting']['activitycredit']]['title'];?>
<p class="xg1">活动参与者需消耗的金钱</p>
</dd>
<?php } ?>
<dt><label for="cost">每人花销:</label></dt>
<dd>
<input type="text" name="cost" id="cost" class="px" onkeyup="checkvalue(this.value, 'costmessage')" value="<?php echo $activity['cost'];?>" tabindex="1" />元
<span id="costmessage"></span>
</dd>
<dt><label for="activityexpiration">报名截止:</label></dt>
<dd class="hasd cl">
<span>
<input type="text" name="activityexpiration" id="activityexpiration" class="px" onclick="showcalendar(event, this, true)" autocomplete="off" value="<?php echo $activity['expiration'];?>" tabindex="1" />
</span>
<a href="javascript:;" class="dpbtn" onclick="showselect(this, 'activityexpiration')">^</a>
</dd>
<?php if($allowpostimg) { ?>
<dt>活动图片:</dt>
<dd class="pns">
<p><button type="button" class="pn" onclick="uploadWindow(function (aid, url){activityaid_upload(aid, url)})"><span><?php if($activityattach['attachment']) { ?>更新<?php } else { ?>上传<?php } ?></span></button></p>
<input type="hidden" name="activityaid" id="activityaid" <?php if($activityattach['attachment']) { ?>value="<?php echo $activityattach['aid'];?>" <?php } ?>/>
<input type="hidden" name="activityaid_url" id="activityaid_url" />
<span class="xg1">
<?php if($activityattach['attachment']) { ?>
点击更新来更换您的图片
<?php } else { ?>
添加一张好看的图片，让活动更吸引人
<?php } ?>
</span>
<div id="activityattach_image">
<?php if($activityattach['attachment']) { ?>
<a href="<?php echo $activityattach['url'];?>/<?php echo $activityattach['attachment'];?>" target="_blank"><img class="spimg" src="<?php echo $activityattach['url'];?>/<?php if($activityattach['thumb']) { echo getimgthumbname($activityattach['attachment']);?><?php } else { ?><?php echo $activityattach['attachment'];?><?php } ?>" alt="" /></a>
<?php } ?>
</div>
</dd>
<?php } ?>
<?php if(!empty($_G['setting']['pluginhooks']['post_activity_extra'])) echo $_G['setting']['pluginhooks']['post_activity_extra'];?>
</dl>
</div>
</div>
<script type="text/javascript" reload="1">
simulateSelect('gender');
function checkvalue(value, message){
if(!value.search(/^\d+$/)) {
$(message).innerHTML = '';
} else {
$(message).innerHTML = '<b>填写无效</b>';
}
}

EXTRAFUNC['validator']['special'] = 'validateextra';
function validateextra() {
if($('postform').starttimefrom_0.value == '' && $('postform').starttimefrom_1.value == '') {
showDialog('抱歉，请输入活动时间', 'alert', '', function () { if($('activitytime').checked) {$('postform').starttimefrom_1.focus();} else {$('postform').starttimefrom_0.focus();} });
return false;
}
if($('postform').activityplace.value == '') {
showDialog('抱歉，请输入活动地点', 'alert', '', function () { $('postform').activityplace.focus() });
return false;
}
if($('postform').activityclass.value == '') {
showDialog('抱歉，请输入活动类别', 'alert', '', function () { $('postform').activityclass.focus() });
return false;
}
return true;
}
function activityaid_upload(aid, url) {
$('activityaid_url').value = url;
updateactivityattach(aid, url, '<?php echo $_G['setting']['attachurl'];?>forum');
}
</script>