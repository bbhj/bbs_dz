<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); ?>
<div class="exfm cl">
<div class="sinf sppoll z">
<dl>
<dt><span class="rq">*</span><label for="affirmpoint">正方观点:</label></dt>
<dd><textarea name="affirmpoint" id="affirmpoint" class="pt" tabindex="1" style="width:210px;"><?php echo $debate['affirmpoint'];?></textarea></dd>
<dt><span class="rq">*</span><label for="negapoint">反方观点:</label></dt>
<dd><textarea name="negapoint" id="negapoint" class="pt" tabindex="1" style="width:210px;"><?php echo $debate['negapoint'];?></textarea></dd>
</dl>
</div>
<div class="sadd z">
<dl>
<dt><label for="endtime">结束时间:</label></dt>
<dd class="hasd cl">
<input type="text" name="endtime" id="endtime" class="px" onclick="showcalendar(event, this, true)" autocomplete="off" value="<?php echo $debate['endtime'];?>" tabindex="1" />
<a href="javascript:;" class="dpbtn" onclick="showselect(this, 'endtime')">^</a>
</dd>
<dt><label for="umpire">裁判:</label></dt>
<dd>
<p><input type="text" name="umpire" id="umpire" class="px" onblur="checkuserexists(this.value, 'checkuserinfo')" value="<?php echo $debate['umpire'];?>" tabindex="1" /><span id="checkuserinfo"></span></p>
</dd>
<?php if(!empty($_G['setting']['pluginhooks']['post_debate_extra'])) echo $_G['setting']['pluginhooks']['post_debate_extra'];?>
</dl>
</div>
</div>

<script type="text/javascript" reload="1">
function checkuserexists(username, objname) {
if(!username) {
$(objname).innerHTML = '';
return;
}
var x = new Ajax();
username = BROWSER.ie && document.charset == 'utf-8' ? encodeURIComponent(username) : username;
x.get('forum.php?mod=ajax&inajax=1&action=checkuserexists&username=' + username, function(s){
var obj = $(objname);
obj.innerHTML = s;
});
}

EXTRAFUNC['validator']['special'] = 'validateextra';
function validateextra() {
if($('postform').affirmpoint.value == '') {
showDialog('抱歉，请输入正方观点', 'alert', '', function () { $('postform').affirmpoint.focus() });
return false;
}
if($('postform').negapoint.value == '') {
showDialog('抱歉，请输入反方观点', 'alert', '', function () { $('postform').negapoint.focus() });
return false;
}
return true;
}
</script>