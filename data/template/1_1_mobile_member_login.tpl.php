<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('login');
0
|| checktplrefresh('./template/default/mobile/member/login.htm', './template/default/mobile/common/seccheck.htm', 1536569590, '1', './data/template/1_1_mobile_member_login.tpl.php', './template/default', 'mobile/member/login')
;?><?php include template('common/header'); $loginhash = 'L'.random(4);?><div class="box"><a href="forum.php">返回论坛</a><span class="pipe">|</span><a href="javascript:history.back();" onclick="javascript:history.back();" title="返回上一页" >返回上一页</a></div>
<div class="bm mtn">
<div class="bm_h">登录</div>
<form method="post" action="member.php?mod=logging&amp;action=login&amp;loginsubmit=yes&amp;loginhash=<?php echo $loginhash;?>&amp;mobile=yes" onsubmit="<?php if($_G['setting']['pwdsafety']) { ?>pwmd5('password3_<?php echo $loginhash;?>');<?php } ?>" >
<input type="hidden" name="formhash" id="formhash" value='<?php echo FORMHASH;?>' />
<input type="hidden" name="referer" id="referer" value="<?php if(dreferer()) { echo dreferer(); } else { ?>forum.php?mobile=yes<?php } ?>" />
<?php if($auth) { ?>
<input type="hidden" name="auth" value="<?php echo $auth;?>" />
<?php } ?>
<div class="bm_c">
<p>
<select name="fastloginfield" id="fastloginfield_<?php echo $loginhash;?>" >
<option value="username">用户名</option>
<?php if(getglobal('setting/uidlogin')) { ?>
<option value="uid">UID</option>
<?php } ?>
<option value="email">Email</option>
</select>
<input type="text" name="username" id="username_<?php echo $loginhash;?>" class="txt" />
</p>
<p>
密码:<input type="password" name="password" id="password3_<?php echo $loginhash;?>" class="txt" value='' />
</p>
<p>
<?php if($seccodecheck) { $sechash = 'S'.random(4);
$sectpl = !empty($sectpl) ? explode("<sec>", $sectpl) : array('<br />',': ','<br />','');
    $ran = random(5, 1);?><?php if($secqaacheck) { $message = '';
$question = make_secqaa();
$secqaa = lang('core', 'secqaa_tips').$question;?><?php } if($sectpl) { if($secqaacheck) { ?>
<p>
        
        <strong>验证问答</strong>
        <br />
        <span class="xg2"><?php echo $secqaa;?></span>
<input name="secqaahash" type="hidden" value="<?php echo $sechash;?>" />
        <input name="secanswer" id="secqaaverify_<?php echo $sechash;?>" type="text" class="txt" />
        </p>
<?php } if($seccodecheck) { ?>
    	<p>
<strong>验证码</strong><br />
        <img src="misc.php?mod=seccode&amp;update=<?php echo $ran;?>&amp;idhash=<?php echo $sechash;?>&amp;mobile=yes&amp;modid=<?php echo $_G['basescript'];?>::<?php echo CURMODULE;?>" />
        <br />
<input name="seccodehash" type="hidden" value="<?php echo $sechash;?>" />
        <input name="seccodeverify" id="seccodeverify_<?php echo $sechash;?>" type="text" autocomplete="off" class="txt" />
        </p>
<?php } } } ?>
</p>
<p>
<input type="submit" name="submit" id="submit" value="登录" />
<input type="reset" value="重填" />
</p>
<p>
<select name="questionid" id="questionid_<?php echo $loginhash;?>" >
<option value="0">安全提问(未设置请忽略)</option>
<option value="1">母亲的名字</option>
<option value="2">爷爷的名字</option>
<option value="3">父亲出生的城市</option>
<option value="4">您其中一位老师的名字</option>
<option value="5">您个人计算机的型号</option>
<option value="6">您最喜欢的餐馆名称</option>
<option value="7">驾驶执照最后四位数字</option>
</select>
<input type="text" name="answer" id="answer_<?php echo $loginhash;?>" class="txt" />
</p>
<p>
<label><input type="checkbox" name="cookietime" id="cookietime_<?php echo $loginhash;?>" class="pc" value="2592000" checked="checked" />自动登录</label>
</p>
    </div>
</form>
</div>

<?php if($_G['setting']['pwdsafety']) { ?>
<script src="<?php echo $_G['setting']['jspath'];?>md5.js?<?php echo VERHASH;?>" type="text/javascript" reload="1"></script>
<?php } updatesession();?><?php include template('common/footer'); ?>