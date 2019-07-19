<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); include template('common/header_ajax'); $i = 0;?><table cellspacing="2" cellpadding="2" class="imgl"><tr><?php if(is_array($photolist)) foreach($photolist as $photo) { $i++;?><td valign="bottom" width="25%">
<a href="javascript:;"><img src="<?php echo $photo['thumburl'];?>" title="<?php echo $photo['filename'];?>" onclick="wysiwyg ? insertText('<img src=\'<?php echo $photo['url'];?>\' border=0 style=\'max-width:400px\'/>', false) : insertText('[img]<?php echo $photo['url'];?>[/img]', <?php echo strlen($photo['url']) + 11; ?>, 0);doane(event);" onload="thumbImg(this, 1)" width="110" style="height:auto" _width="110" _height="110"></a>
</td>
<?php if($i % 4 == 0 && isset($photolist[$i])) { ?></tr><tr><?php } } if(($imgpad = $i % 4) > 0) { echo str_repeat('<td width="25%"></td>', 4 - $imgpad);; } ?>
</tr></table>
<div class="pgs cl"><?php echo $multi;?></div><?php include template('common/footer_ajax'); ?>