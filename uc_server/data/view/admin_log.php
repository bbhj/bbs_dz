<?php if(!defined('UC_ROOT')) exit('Access Denied');?>
<?php include $this->gettpl('header');?>

<div class="container">
	<h3 class="marginbot">		
		<a href="admin.php?m=feed&a=ls" class="sgbtn">事件列表</a>
		<?php if($user['allowadminnote'] || $user['isfounder']) { ?><a href="admin.php?m=note&a=ls" class="sgbtn">通知列表</a><?php } ?>
		日志列表
		<a href="admin.php?m=mail&a=ls" class="sgbtn">邮件队列</a>
	</h3>
	<div class="mainbox">
		<?php if($loglist) { ?>
			<table class="datalist">
				<tr>
					<th>操作者</th>
					<th>IP</th>
					<th>时间</th>
					<th>操作</th>
					<th>其他 </th>
				</tr>
				<?php foreach((array)$loglist as $log) {?>
					<tr>
						<td><strong><?php echo $log[1];?></strong></td>
						<td><?php echo $log[2];?></td>
						<td><?php echo $log[3];?></td>
						<td><?php echo $log[4];?></td>
						<td><?php echo $log[5];?></td>
					</tr>
				<?php } ?>
				<tr class="nobg">
					<td class="tdpage" colspan="5"><?php echo $multipage;?></td>
				</tr>
			</table>
		<?php } else { ?>
			<div class="note">
				<p class="i">目前没有相关记录!</p>
			</div>
		<?php } ?>
	</div>
</div>

<?php include $this->gettpl('footer');?>