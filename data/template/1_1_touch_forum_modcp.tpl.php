<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('modcp');?><?php include template('common/header'); if($script == 'noperm') { ?>
    <div class="bm bw0">
        <h1 class="mt">系统错误</h1>
        <p>抱歉，您无此权限</p>
        <p class="notice">论坛管理员在“管理面板”中权限和超级版主基本相同，如果需要更多功能，请进入 <a href="admin.php?mod=forum" target="_blank"><u>管理中心</u></a> </p>
    </div>
<?php } elseif(!empty($modtpl)) { if(in_array($script, array('member', 'login'))) { ?>
    <?php include(template($modtpl));?>    <?php } else { ?>
    	<div class="box ban pbn">
    		手机版不支持复杂管理操作
        </div>
    <?php } } include template('common/footer'); ?>