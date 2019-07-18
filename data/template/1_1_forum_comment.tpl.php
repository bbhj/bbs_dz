<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('comment');
0
|| checktplrefresh('./template/default/forum/comment.htm', './template/default/common/seditor.htm', 1536569781, '1', './data/template/1_1_forum_comment.tpl.php', './template/default', 'forum/comment')
|| checktplrefresh('./template/default/forum/comment.htm', './template/default/forum/seccheck_post.htm', 1536569781, '1', './data/template/1_1_forum_comment.tpl.php', './template/default', 'forum/comment')
|| checktplrefresh('./template/default/forum/comment.htm', './template/default/common/seccheck.htm', 1536569781, '1', './data/template/1_1_forum_comment.tpl.php', './template/default', 'forum/comment')
;?><?php include template('common/header'); if(empty($_GET['infloat'])) { ?>
<div id="ct" class="wp cl">
<div class="mn">
<div class="bm bw0">
<?php } ?>

<form method="post" autocomplete="off" id="commentform" action="forum.php?mod=post&amp;action=reply&amp;comment=yes&amp;tid=<?php echo $post['tid'];?>&amp;pid=<?php echo $_GET['pid'];?>&amp;extra=<?php echo $extra;?><?php if(!empty($_GET['page'])) { ?>&amp;page=<?php echo $_GET['page'];?><?php } ?>&amp;commentsubmit=yes&amp;infloat=yes" onsubmit="<?php if(!empty($_GET['infloat'])) { ?>ajaxpost('commentform', 'return_<?php echo $_GET['handlekey'];?>', 'return_<?php echo $_GET['handlekey'];?>', 'onerror');return false;<?php } ?>">
<div class="f_c">
<h3 class="flb">
<em id="return_<?php echo $_GET['handlekey'];?>">点评</em>
<span>
<?php if(!empty($_GET['infloat'])) { ?><a href="javascript:;" class="flbc" onclick="hideWindow('<?php echo $_GET['handlekey'];?>')" title="关闭">关闭</a><?php } ?>
</span>
</h3>
<input type="hidden" name="formhash" id="formhash" value="<?php echo FORMHASH;?>" />
<input type="hidden" name="handlekey" value="<?php echo $_GET['handlekey'];?>" />
<div class="c">
<div class="tedt">
<div class="bar cm"><?php $seditor = array('comment', array('bold', 'color'));?><script src="<?php echo $_G['setting']['jspath'];?>seditor.js?<?php echo VERHASH;?>" type="text/javascript"></script>
<div class="fpd">
<?php if(in_array('bold', $seditor['1'])) { ?>
<a href="javascript:;" title="文字加粗" class="fbld"<?php if(empty($seditor['2'])) { ?> onclick="seditor_insertunit('<?php echo $seditor['0'];?>', '[b]', '[/b]');doane(event);"<?php } ?>>B</a>
<?php } if(in_array('color', $seditor['1'])) { ?>
<a href="javascript:;" title="设置文字颜色" class="fclr" id="<?php echo $seditor['0'];?>forecolor"<?php if(empty($seditor['2'])) { ?> onclick="showColorBox(this.id, 2, '<?php echo $seditor['0'];?>');doane(event);"<?php } ?>>Color</a>
<?php } if(in_array('img', $seditor['1'])) { ?>
<a id="<?php echo $seditor['0'];?>img" href="javascript:;" title="图片" class="fmg"<?php if(empty($seditor['2'])) { ?> onclick="seditor_menu('<?php echo $seditor['0'];?>', 'img');doane(event);"<?php } ?>>Image</a>
<?php } if(in_array('link', $seditor['1'])) { ?>
<a id="<?php echo $seditor['0'];?>url" href="javascript:;" title="添加链接" class="flnk"<?php if(empty($seditor['2'])) { ?> onclick="seditor_menu('<?php echo $seditor['0'];?>', 'url');doane(event);"<?php } ?>>Link</a>
<?php } if(in_array('quote', $seditor['1'])) { ?>
<a id="<?php echo $seditor['0'];?>quote" href="javascript:;" title="引用" class="fqt"<?php if(empty($seditor['2'])) { ?> onclick="seditor_menu('<?php echo $seditor['0'];?>', 'quote');doane(event);"<?php } ?>>Quote</a>
<?php } if(in_array('code', $seditor['1'])) { ?>
<a id="<?php echo $seditor['0'];?>code" href="javascript:;" title="代码" class="fcd"<?php if(empty($seditor['2'])) { ?> onclick="seditor_menu('<?php echo $seditor['0'];?>', 'code');doane(event);"<?php } ?>>Code</a>
<?php } if(in_array('smilies', $seditor['1'])) { ?>
<a href="javascript:;" class="fsml" id="<?php echo $seditor['0'];?>sml"<?php if(empty($seditor['2'])) { ?> onclick="showMenu({'ctrlid':this.id,'evt':'click','layer':2});return false;"<?php } ?>>Smilies</a>
<?php if(empty($seditor['2'])) { ?>
<script type="text/javascript" reload="1">smilies_show('<?php echo $seditor['0'];?>smiliesdiv', <?php echo $_G['setting']['smcols'];?>, '<?php echo $seditor['0'];?>');</script>
<?php } } if(in_array('at', $seditor['1']) && $_G['group']['allowat']) { ?>
<script src="<?php echo $_G['setting']['jspath'];?>at.js?<?php echo VERHASH;?>" type="text/javascript"></script>
<a id="<?php echo $seditor['0'];?>at" href="javascript:;" title="@朋友" class="fat"<?php if(empty($seditor['2'])) { ?> onclick="seditor_menu('<?php echo $seditor['0'];?>', 'at');doane(event);"<?php } ?>>@朋友</a>
<?php } ?>
<?php echo $seditor['3'];?>
</div><span id="itemdiv"></span>
</div>
<div class="area">
<textarea rows="2" cols="50" name="message" id="commentmessage" onKeyUp="strLenCalc(this, 'checklen')" onKeyDown="seditor_ctlent(event, '$(\'commentsubmit\').click();')" tabindex="2" class="pt" style="overflow: auto"></textarea>
</div>
<script type="text/javascript" reload="1">
<?php if($commentitem) { ?>
var items = itemrow = itemcmm = '';<?php $items = range(0, 5);$itemlang = array('差', '一般', '还行', '好', '很好', '非常好');$i = $cmm = 0;?><?php if(is_array($commentitem)) foreach($commentitem as $item) { $item = trim($item);?><?php if($item) { ?>
items += '<input type="hidden" id="itemc_<?php echo $i;?>" name="commentitem[<?php echo $item;?>]" value="" />';
itemrow = '<span id="itemt_<?php echo $i;?>" class="z xg1 cur1" title="放弃此观点" onclick="itemdisable(<?php echo $i;?>)">&nbsp;<?php echo $item;?></span>';
itemstar = '';<?php if(is_array($items)) foreach($items as $j) { ?>itemstar += '<em onclick="itemclk(<?php echo $i;?>, <?php echo $j;?>)" onmouseover="itemop(<?php echo $i;?>, <?php echo $j;?>)" onmouseout="itemset(<?php echo $i;?>)" title="<?php echo $itemlang[$j];?>(<?php echo $j;?>)"<?php if(!$j) { ?> style="width: 10px;"<?php } ?>><?php echo $itemlang[$j];?></em>';
<?php } ?>
itemrow += '<span id="item_<?php echo $i;?>" class="z cmstar">' + itemstar + '</span>';<?php $i++;?><?php if(!$cmm) { ?>items += itemrow;<?php } else { ?>itemcmm += '<div class="cl cmm" style="margin:5px">' + itemrow + '</div>';<?php } } elseif(!$cmm) { ?>
items += '<span class="z" id="itemmore" onmouseover="showMenu({\'ctrlid\':this.id,\'pos\':\'13\'})">&nbsp;&raquo; 更多</span>';<?php $cmm = 1;?><?php } } ?>
$('itemdiv').innerHTML = items;
if(itemcmm) {
cmmdiv = document.createElement('div');
cmmdiv.id = 'itemmore_menu';
cmmdiv.style.display = 'none';
cmmdiv.className = 'p_pop';
cmmdiv.innerHTML = itemcmm;
$('append_parent').appendChild(cmmdiv);
}
<?php } ?>
$('commentmessage').focus();
</script>
</div>
<div id="seccheck_comment">
<?php if($secqaacheck || $seccodecheck) { ?><?php
$sectpl = <<<EOF
<sec> <span id="sec<hash>" onclick="showMenu(
EOF;
 if(!empty($_G['gp_infloat'])) { 
$sectpl .= <<<EOF
{'ctrlid':this.id,'win':'{$_GET['handlekey']}'}
EOF;
 } else { 
$sectpl .= <<<EOF
this.id
EOF;
 } 
$sectpl .= <<<EOF
)"><sec></span><div id="sec<hash>_menu" class="p_pop p_opt" style="display:none"><sec></div>
EOF;
?>
<div class="mtm"><?php $sechash = !isset($sechash) ? 'S'.($_G['inajax'] ? 'A' : '').$_G['sid'] : $sechash.random(3);
$sectpl = str_replace("'", "\'", $sectpl);?><?php if($secqaacheck) { ?>
<span id="secqaa_q<?php echo $sechash;?>"></span>		
<script type="text/javascript" reload="1">updatesecqaa('q<?php echo $sechash;?>', '<?php echo $sectpl;?>', '<?php echo $_G['basescript'];?>::<?php echo CURMODULE;?>');</script>
<?php } if($seccodecheck) { ?>
<span id="seccode_c<?php echo $sechash;?>"></span>		
<script type="text/javascript" reload="1">updateseccode('c<?php echo $sechash;?>', '<?php echo $sectpl;?>', '<?php echo $_G['basescript'];?>::<?php echo CURMODULE;?>');</script>
<?php } ?></div><?php } ?>
</div>
</div>
</div>
<div class="o pns cl<?php if(empty($_GET['infloat'])) { ?> mtm<?php } ?>">
<button type="submit" id="commentsubmit" class="pn pnc z" value="true" name="commentsubmit" tabindex="3"<?php if(!$seccodecheck && !$secqaacheck) { ?> onmouseover="checkpostrule('seccheck_comment', 'ac=reply&infloat=yes&handlekey=<?php echo $_GET['handlekey'];?>');this.onmouseover=null"<?php } ?>><span>发布</span></button>
<span class="y">还可输入 <strong id="checklen">200</strong> 个字符</span>
</div>
</form>

<?php if(empty($_GET['infloat'])) { ?>
</div>
</div>
</div>
<?php } include template('common/footer'); ?>