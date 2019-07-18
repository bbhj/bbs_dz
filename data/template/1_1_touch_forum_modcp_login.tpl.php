<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); ?>
	<p class="xw1">登录管理面板</p>
<p class="xg1">首次进入管理面板或空闲时间过长, 您输入密码才能进入。如果密码输入错误超过 5 次，管理面板将会锁定 15 分钟。</p>
<form method="post" autocomplete="off" action="<?php echo $cpscript;?>?mod=modcp&action=login&mobile=2" class="exfm">
<input type="hidden" name="formhash" value="<?php echo FORMHASH;?>" />
<input type="hidden" name="fid" value="<?php echo $_G['fid'];?>" />
        <input type="hidden" name="uid" value="<?php echo $_GET['uid'];?>" />
<input type="hidden" name="submit" value="yes" />
<input type="hidden" name="login_panel" value="yes" />
<p>用户名: <strong><?php echo $_G['member']['username'];?></strong></p>

        <p>密码:<input type="password" name="cppwd" id="cppwd" class="txt" /></p>

        <p class="mtn"><input type="submit" name="submit" id="submit"  value="提交" /></p>
</form>
