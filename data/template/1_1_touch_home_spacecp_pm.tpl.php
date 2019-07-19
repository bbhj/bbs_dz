<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('spacecp_pm');?><?php include template('common/header'); if($op != '') { ?>
<div class="bm_c">手机版不支持复杂短消息操作，请返回<a href="home.php?mod=space&amp;do=pm&amp;filter=privatepm">我的短消息</a></div>
<?php } else { ?>

<form id="pmform_<?php echo $pmid;?>" name="pmform_<?php echo $pmid;?>" method="post" autocomplete="off" action="home.php?mod=spacecp&amp;ac=pm&amp;op=send&amp;touid=<?php echo $touid;?>&amp;pmid=<?php echo $pmid;?>&amp;mobile=2" >
<input type="hidden" name="referer" value="<?php echo dreferer();; ?>" />
<input type="hidden" name="pmsubmit" value="true" />
<input type="hidden" name="formhash" value="<?php echo FORMHASH;?>" />

<!-- header start -->
<header class="header">
    <div class="nav">
<span class="y"><button id="pmsubmit_btn" class="btn_pn btn_pn_grey" disable="true"><span>发送</span></button></span>
<input type="hidden" name="pmsubmit_btn" value="yes" />
        <a href="home.php?mod=space&amp;do=pm" class="z"><img src="<?php echo STATICURL;?>image/mobile/images/icon_back.png" /></a>
<span>发消息</span>
    </div>
</header>
<!-- header end -->
<!-- main post_msg_box start -->
<div class="wp">
<div class="post_msg_from">
<ul>
<?php if(!$touid) { ?>
<li class="bl_line"><input type="text" value="" tabindex="1" class="px" size="30" autocomplete="off" id="username" name="username" placeholder="收件人"></li>
<?php } ?>
<li class="bl_none area">
<textarea class="pt" tabindex="2" autocomplete="off" value="" id="sendmessage" name="message" cols="80" rows="7"  placeholder="内容"></textarea>
</li>
</ul>
</div>
</div>
<!-- main postbox start -->
</form>
<script type="text/javascript">
(function() {
$('#sendmessage').on('keyup input', function() {
var obj = $(this);
if(obj.val()) {
$('.btn_pn').removeClass('btn_pn_grey').addClass('btn_pn_blue');
$('.btn_pn').attr('disable', 'false');
} else {
$('.btn_pn').removeClass('btn_pn_blue').addClass('btn_pn_grey');
$('.btn_pn').attr('disable', 'true');
}
});
var form = $('#pmform_<?php echo $pmid;?>');
$('#pmsubmit_btn').on('click', function() {
var obj = $(this);
if(obj.attr('disable') == 'true') {
return false;
}
$.ajax({
type:'POST',
url:form.attr('action') + '&handlekey='+form.attr('id')+'&inajax=1',
data:form.serialize(),
dataType:'xml'
})
.success(function(s) {
popup.open(s.lastChild.firstChild.nodeValue);
})
.error(function() {
popup.open('网络出现问题，请稍后再试', 'alert');
});
return false;
});
 })();
</script>
<?php } $nofooter = true;?><?php include template('common/footer'); ?>