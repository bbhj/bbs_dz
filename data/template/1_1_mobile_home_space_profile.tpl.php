<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('space_profile');?><?php include template('common/header'); ?><div class="box"><a href="forum.php">返回论坛</a><span class="pipe">|</span><a href="javascript:history.back();" onclick="javascript:history.back();" title="返回上一页" >返回上一页</a></div>
<div class="bm">
<div class="bm_c">
    <div><?php echo $space['username'];?> (UID: <?php echo $space['uid'];?>) <?php if($space['uid'] != $_G['uid']) { ?><a href="home.php?mod=spacecp&amp;ac=pm&amp;touid=<?php echo $space['uid'];?>">发消息</a><?php } ?> <?php if($_G['group']['allowbanuser']) { ?><a href="forum.php?mod=modcp&amp;action=member&amp;op=ban&amp;uid=<?php echo $space['uid'];?>">禁止</a><?php } ?> <br />空间访问量 <strong class="xi1"><?php echo $space['views'];?></strong></div>
</div>
<div class="bm">
<p class="bm_h">个人资料</p>
    <div class="bm_c profile_bm_c">
    <table width="100%" border="0" cellspacing="0" cellpadding="0" class="xs1 profile_table">
    <tr>
        <th align="left" valign="top" class="xw1" >基本资料</th>
        <th>&nbsp;</th>
    </tr>
    <?php if(in_array($_G['adminid'], array(1, 2))) { ?>
      <tr>
        <td width="40%" valign="top">Email: </td>
        <td width="60%"><?php echo $space['email'];?></td>
      </tr>
      <?php } ?>
      <tr>
        <td valign="top">统计信息: </td>
        <td>
            好友数 <?php echo $space['friends'];?>
            <br />
            记录数 <?php echo $space['doings'];?>
            <br />
            日志数 <?php echo $space['blogs'];?>
            <br />
            相册数 <?php echo $space['albums'];?>
        </td>
   	  </tr>
      <?php if(is_array($profiles)) foreach($profiles as $value) { ?>        <tr>
        <td valign="top"><?php echo $value['title'];?>: </td>
        <td><?php echo $value['value'];?></td>
  		</tr>
    	<?php } ?>
        <tr>
        	<th align="left" valign="top" class="xw1">活跃概况</th>
            <th>&nbsp;</th>
        </tr>
        <?php if($space['adminid']) { ?>
        <tr>
            <td >管理组: </td>
            <td><?php echo $space['admingroup']['grouptitle'];?> <?php echo $space['admingroup']['icon'];?></td>
        </tr>
        <?php } ?>
<tr>
        	<td >用户组: </td><td><?php echo $space['group']['grouptitle'];?><?php echo $space['group']['icon'];?></td>
</tr>
        <?php if($space['extgroupids']) { ?>
        <tr>
        	<td valign="top">扩展用户组: </td><td><?php echo $space['extgroupids'];?></td>
        </tr>
        <?php } ?>
        <tr>
        	<td valign="top" >在线时间: </td><td><?php echo $space['oltime'];?> 小时</td>
        <tr>
        	<td valign="top" >注册时间: </td><td><?php echo $space['regdate'];?></td>
        <tr>
        	<td valign="top" >最后访问: </td><td><?php echo $space['lastvisit'];?></td>
        <?php if($_G['uid'] == $space['uid'] || $_G['group']['allowviewip']) { ?>
        <tr>
        	<td valign="top" >注册 IP: </td><td><?php echo $space['regip'];?> - <?php echo $space['regip_loc'];?></td>
        <tr>
        	<td valign="top" >上次访问 IP: </td><td><?php echo $space['lastip'];?> - <?php echo $space['lastip_loc'];?></td>
        <?php } ?>
        <tr>
        	<td valign="top" >上次活动时间: </td><td><?php echo $space['lastactivity'];?></td>
        <tr>
        	<td valign="top" >上次发表时间: </td><td><?php echo $space['lastpost'];?></td>
        <tr>
        	<td valign="top" >上次邮件通知: </td><td><?php echo $space['lastsendmail'];?></td>
        <tr>
        	<td valign="top" >所在时区: </td><td>
            <?php $timeoffset = array(
		'9999' => '使用系统默认',
		'-12' => '(GMT -12:00) 埃尼威托克岛, 夸贾林环礁',
		'-11' => '(GMT -11:00) 中途岛, 萨摩亚群岛',
		'-10' => '(GMT -10:00) 夏威夷',
		'-9' => '(GMT -09:00) 阿拉斯加',
		'-8' => '(GMT -08:00) 太平洋时间(美国和加拿大), 提华纳',
		'-7' => '(GMT -07:00) 山区时间(美国和加拿大), 亚利桑那',
		'-6' => '(GMT -06:00) 中部时间(美国和加拿大), 墨西哥城',
		'-5' => '(GMT -05:00) 东部时间(美国和加拿大), 波哥大, 利马, 基多',
		'-4' => '(GMT -04:00) 大西洋时间(加拿大), 加拉加斯, 拉巴斯',
		'-3.5' => '(GMT -03:30) 纽芬兰',
		'-3' => '(GMT -03:00) 巴西利亚, 布宜诺斯艾利斯, 乔治敦, 福克兰群岛',
		'-2' => '(GMT -02:00) 中大西洋, 阿森松群岛, 圣赫勒拿岛',
		'-1' => '(GMT -01:00) 亚速群岛, 佛得角群岛 [格林尼治标准时间] 都柏林, 伦敦, 里斯本, 卡萨布兰卡',
		'0' => '(GMT) 卡萨布兰卡，都柏林，爱丁堡，伦敦，里斯本，蒙罗维亚',
		'1' => '(GMT +01:00) 柏林, 布鲁塞尔, 哥本哈根, 马德里, 巴黎, 罗马',
		'2' => '(GMT +02:00) 赫尔辛基, 加里宁格勒, 南非, 华沙',
		'3' => '(GMT +03:00) 巴格达, 利雅得, 莫斯科, 奈洛比',
		'3.5' => '(GMT +03:30) 德黑兰',
		'4' => '(GMT +04:00) 阿布扎比, 巴库, 马斯喀特, 特比利斯',
		'4.5' => '(GMT +04:30) 坎布尔',
		'5' => '(GMT +05:00) 叶卡特琳堡, 伊斯兰堡, 卡拉奇, 塔什干',
		'5.5' => '(GMT +05:30) 孟买, 加尔各答, 马德拉斯, 新德里',
		'5.75' => '(GMT +05:45) 加德满都',
		'6' => '(GMT +06:00) 阿拉木图, 科伦坡, 达卡, 新西伯利亚',
		'6.5' => '(GMT +06:30) 仰光',
		'7' => '(GMT +07:00) 曼谷, 河内, 雅加达',
		'8' => '(GMT +08:00) 北京, 香港, 帕斯, 新加坡, 台北',
		'9' => '(GMT +09:00) 大阪, 札幌, 首尔, 东京, 雅库茨克',
		'9.5' => '(GMT +09:30) 阿德莱德, 达尔文',
		'10' => '(GMT +10:00) 堪培拉, 关岛, 墨尔本, 悉尼, 海参崴',
		'11' => '(GMT +11:00) 马加丹, 新喀里多尼亚, 所罗门群岛',
		'12' => '(GMT +12:00) 奥克兰, 惠灵顿, 斐济, 马绍尔群岛');?>            <?php echo $timeoffset[$space['timeoffset']];?>
        </td>
</table>
  </div>
</div><?php include template('common/footer'); ?>