<?php if(!defined('UC_ROOT')) exit('Access Denied');?>
<?php include $this->gettpl('header');?>

<div class="container">
	<?php if($status) { ?>
		<div class="correctmsg"><p>成功清理的短消息数: <?php echo $delnum;?></p></div>
	<?php } ?>
	<div class="hastabmenu" style="height: 180px;">
		<ul class="tabmenu">
			<li><a href="admin.php?m=pm&a=ls">短消息搜索</a></li>
			<li class="tabcurrent"><a href="javascript:;" class="tabcurrent">清空短消息</a></li>
		</ul>
		<div class="tabcontentcur">
			<form action="admin.php?m=pm&a=clear" method="post">
				<input type="hidden" name="formhash" value="<?php echo FORMHASH;?>">
				<table class="opt">
					<tr>
						<th>清理某用户的短消息:</th>
					</tr>
					<tr>
						<td>输入用户名，多个用户名用半角逗号“,”分隔<br />此功能清空与该用户产生的所有私人消息，由该用户发起的所有群聊消息，以及参与的群聊消息</td>
					</tr>
					<tr>
						<td><input type="text" class="txt" name="usernames"> <input type="submit" name="submit" value=" 提 交 " class="btn" tabindex="3" /></td>
					</tr>
				</table>
			</form>
		</div>
	</div>
</div>

<?php include $this->gettpl('footer');?>