<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('spacecp_album');
0
|| checktplrefresh('./template/default/home/spacecp_album.htm', './template/default/common/userabout.htm', 1536742164, '1', './data/template/1_1_home_spacecp_album.tpl.php', './template/default', 'home/spacecp_album')
;?>
<?php $_G[home_tpl_titles] = array($album[albumname], '相册');?><?php include template('common/header'); if($_GET['op']=='edit' || $_GET['op']=='editpic') { ?>
<div id="pt" class="bm cl">
<div class="z"><a href="./" class="nvhm" title="首页"><?php echo $_G['setting']['bbname'];?></a> <em>&rsaquo;</em> <a href="home.php?mod=space&amp;do=album">相册</a><?php if($album['albumname']) { ?> <em>&rsaquo;</em> <a href="home.php?mod=space&amp;uid=<?php echo $album['uid'];?>&amp;do=album&amp;id=<?php echo $albumid;?>"><?php echo $album['albumname'];?></a><?php } ?> <em>&rsaquo;</em> 编辑相册</div>
</div>

<div id="ct" class="wp ct2_a cl">
<div class="mn">
<div class="bm bw0">
<h1 class="mt"><img alt="album" src="<?php echo STATICURL;?>image/feed/album.gif" class="vm" /> 相册</h1>
<ul class="tb cl"><?php $aid = $albumid ? $albumid : -1;?><li><a href="home.php?mod=space&amp;uid=<?php echo $album['uid'];?>&amp;do=album&amp;id=<?php echo $aid;?>">查看相册</a></li>
<li<?php if($_GET['op']=='edit') { ?> class="a"<?php } ?>><a href="home.php?mod=spacecp&amp;ac=album&amp;op=edit&amp;albumid=<?php echo $albumid;?>">编辑相册信息</a></li>
<li<?php if($_GET['op']=='editpic') { ?> class="a"<?php } ?>><a href="home.php?mod=spacecp&amp;ac=album&amp;op=editpic&amp;albumid=<?php echo $albumid;?>">编辑图片</a></li>
<li class="y"><a href="home.php?mod=space&amp;uid=<?php echo $album['uid'];?>&amp;do=album&amp;view=me">&laquo; 返回相册列表</a></li>
</ul>
<?php } if($_GET['op'] == 'edit') { ?>

<form method="post" autocomplete="off" id="theform" name="theform" action="home.php?mod=spacecp&amp;ac=album&amp;op=edit&amp;albumid=<?php echo $albumid;?>">
<table cellspacing="0" cellpadding="0" class="tfm">
<tr>
<th><label for="albumname">相册名</label></th>
<td><input type="text" id="albumname" name="albumname" value="<?php echo $album['albumname'];?>" size="20" class="px" /></td>
</tr>
<tr>
<th><label for="depict">相册描述</label></th>
<td><textarea name="depict" id="depict" class="pt" cols="40" rows="3"><?php echo $album['depict'];?></textarea></td>
</tr>
<?php if($categoryselect) { ?>
<tr>
<th>站点分类</th>
<td>
<?php echo $categoryselect;?>
(选择一个站点分类，可以让您的相册被更多的人浏览到)
</td>
</tr>
<?php } ?>
<tr>
<th>隐私设置</th>
<td>
<select name="friend" onchange="passwordShow(this.value);" class="ps">
<option value="0"<?php echo $friendarr['0'];?>>全站用户可见</option>
<option value="1"<?php echo $friendarr['1'];?>>仅好友可见</option>
<option value="2"<?php echo $friendarr['2'];?>>指定好友可见</option>
<option value="3"<?php echo $friendarr['3'];?>>仅自己可见</option>
<option value="4"<?php echo $friendarr['4'];?>>凭密码可见</option>
</select>
</td>
</tr>
<tbody id="span_password" style="<?php echo $passwordstyle;?>">
<tr>
<th>密码</th>
<td><input type="text" name="password" value="<?php echo $album['password'];?>" size="10" class="px" /></td>
</tr>
</tbody>
<tbody id="tb_selectgroup" style="<?php echo $selectgroupstyle;?>">
<tr>
<th>指定好友</th>
<td>
<select name="selectgroup" onchange="getgroup(this.value);" class="ps">
<option value="">从好友组选择好友</option><?php if(is_array($groups)) foreach($groups as $key => $value) { ?><option value="<?php echo $key;?>"><?php echo $value;?></option>
<?php } ?>
</select>
<p class="d">多次选择会累加到下面的好友名单</p>
</td>
</tr>
<tr>
<th>&nbsp;</th>
<td>
<textarea name="target_names" id="target_names" rows="3" class="pt"><?php echo $album['target_names'];?></textarea>
<p class="d">可以填写多个好友名，请用空格进行分割</p>
</td>
</tr>
</tbody>
<tr>
<th>&nbsp;</th>
<td>
<input type="hidden" name="referer" value="<?php echo dreferer(); ?>" />
<input type="hidden" name="editsubmit" value="true" />
<button name="submit" type="submit" class="pn" value="true"><strong>确定</strong></button>
</td>
</tr>
<tr>
<th>&nbsp;</th>
<td><a href="home.php?mod=spacecp&amp;ac=album&amp;op=delete&amp;albumid=<?php echo $album['albumid'];?>&amp;handlekey=delalbumhk_<?php echo $album['albumid'];?>" id="album_delete_<?php echo $album['albumid'];?>" onclick="showWindow(this.id, this.href, 'get', 0);">删除相册</a></td>
</tr>
</table>
<input type="hidden" name="formhash" value="<?php echo FORMHASH;?>" />
</form>

<?php } elseif($_GET['op'] == 'editpic') { if($list) { ?>
<form method="post" autocomplete="off" id="theform" name="theform" action="home.php?mod=spacecp&amp;ac=album&amp;op=editpic&amp;albumid=<?php echo $albumid;?>">
<table cellspacing="0" cellpadding="0" class="tfm">
<caption>提示：您可以指定一张图片作为当前相册的封面图片，但是，在下次上传新的图片后，系统会自动选择一张新图片来更新本相册的封面图片 </caption><?php $common = '';?><?php if(is_array($list)) foreach($list as $value) { ?><tr>
<td width="20"><input type="checkbox" name="ids[<?php echo $value['picid'];?>]" value="<?php echo $value['picid'];?>" <?php echo $value['checked'];?> class="pc"></td>
<td width="150" align="center" class="gt">
<a href="<?php echo $value['bigpic'];?>" target="_blank"><img src="<?php echo $value['pic'];?>" alt="" width="140" /></a><?php $ids .= $common.$value['picid'].':'.$value['picid'];?><?php $common = ',';?><?php if($album['albumname']) { ?><p><a href="home.php?mod=spacecp&amp;ac=album&amp;op=setpic&amp;albumid=<?php echo $value['albumid'];?>&amp;picid=<?php echo $value['picid'];?>&amp;handlekey=setpichk" id="a_picid_<?php echo $value['picid'];?>" onclick="showWindow('setpichk', this.href, 'get', 0)">设为封面</a></p><?php } ?>
</td>
<td><textarea name="title[<?php echo $value['picid'];?>]" rows="4" cols="70" class="pt"><?php echo $value['title'];?></textarea><input type="hidden" name="oldtitle[<?php echo $value['picid'];?>]" value="<?php echo $value['title'];?>"></td>
</tr>
<?php } ?>
<tr>
<td colspan="3">
<label for="chkall" onclick="checkAll(this.form, 'ids')"><input type="checkbox" name="chkall" id="chkall" class="pc" />全选</label>
<button type="submit" name="editpicsubmit" value="true" class="pn" onclick="this.form.action+='&subop=update';"><strong>更新说明</strong></button>
<button type="submit" name="editpicsubmit" value="true" class="pn" onclick="this.form.action+='&subop=delete';return ischeck('theform', 'ids')"><strong>删除</strong></button>

<?php if($albumlist) { ?>
<button type="submit" name="editpicsubmit" value="true" class="pn" onclick="this.form.action+='&subop=move';return ischeck('theform', 'ids')"><strong>转移到</strong></button>
<select name="newalbumid" class="ps vm"><?php if(is_array($albumlist)) foreach($albumlist as $key => $value) { if($albumid != $value['albumid']) { ?><option value="<?php echo $value['albumid'];?>"><?php echo $value['albumname'];?></option><?php } } if($albumid>0) { ?><option value="0">默认相册</option><?php } ?>
</select>
<?php } ?>

<p class="d">删除图片提示：如果您要删除的图片出现在您的帖子、日志、话题中，删除后，会导致内容里面的图片同时无法显示 </p>
</td>
</tr>
</table>
<input type="hidden" name="page" value="<?php echo $page;?>" />
<input type="hidden" name="editpicsubmit" value="true" />
<input type="hidden" name="formhash" value="<?php echo FORMHASH;?>" />
</form>
<?php if($multi) { ?><div class="pgs cl"><?php echo $multi;?></div><?php } ?>
<script type="text/javascript">
var picObj = {<?php echo $ids;?>};
function succeedhandle_setpichk(url, msg, values) {
for(var id in picObj) {
$('a_picid_' + picObj[id]).innerHTML = "设为封面";
}
if(values['picid']) {
$('a_picid_' + values['picid']).innerHTML = "封面图片";
}
}
</script>
<?php } else { ?>
<div class="emp">该相册下还没有图片</div>
<?php } } elseif($_GET['op'] == 'delete') { ?>
<h3 class="flb">
<em>删除相册</em>
<?php if($_G['inajax']) { ?><span><a href="javascript:;" onclick="hideWindow('<?php echo $_GET['handlekey'];?>');" class="flbc" title="关闭">关闭</a></span><?php } ?>
</h3>
<form method="post" autocomplete="off" id="theform" name="theform" action="home.php?mod=spacecp&amp;ac=album&amp;op=delete&amp;albumid=<?php echo $albumid;?>&amp;uid=<?php echo $_GET['uid'];?>">
<input type="hidden" name="referer" value="<?php echo dreferer(); ?>" />
<input type="hidden" name="deletesubmit" value="true" />
<input type="hidden" name="formhash" value="<?php echo FORMHASH;?>" />
<div class="c">
<p>确定删除相册吗？</p>
<p>
该相册中的图片:
<select name="moveto" class="ps">
<option value="-1">彻底删除</option>
<option value="0">转移到 默认相册</option><?php if(is_array($albums)) foreach($albums as $value) { ?><option value="<?php echo $value['albumid'];?>">转移到 <?php echo $value['albumname'];?></option>
<?php } ?>
</select>
</p>
</div>
<p class="o pns">
<button type="submit" name="submit" class="pn pnc" value="true"><strong>确定</strong></button>
</p>
</form>
<?php } elseif($_GET['op'] == 'edittitle') { ?>
<h3 class="flb">
<em id="return_<?php echo $_GET['handlekey'];?>">编辑说明</em>
<?php if($_G['inajax']) { ?><span><a href="javascript:;" onclick="hideWindow('<?php echo $_GET['handlekey'];?>');" class="flbc" title="关闭">关闭</a></span><?php } ?>
</h3>
<form id="titleform" name="titleform" action="home.php?mod=spacecp&amp;ac=album&amp;op=editpic&amp;subop=update&amp;albumid=<?php echo $pic['albumid'];?>" method="post" autocomplete="off" <?php if($_G['inajax']) { ?>onsubmit="ajaxpost(this.id, 'return_<?php echo $_GET['handlekey'];?>');"<?php } ?>>
<input type="hidden" name="referer" value="<?php echo dreferer(); ?>" />
<input type="hidden" name="formhash" value="<?php echo FORMHASH;?>" />
<input type="hidden" name="editpicsubmit" value="true" />
<?php if($_G['inajax']) { ?><input type="hidden" name="handlekey" value="<?php echo $_GET['handlekey'];?>" /><?php } ?>
<div class="c">
<textarea name="title[<?php echo $pic['picid'];?>]" cols="50" rows="7" class="pt"><?php echo $pic['title'];?></textarea>
</div>
<p class="o pns">
<button type="submit" name="editpicsubmit_btn" class="pn pnc" value="true"><strong>更新</strong></button>
</p>
</form>
<script type="text/javascript">
function succeedhandle_<?php echo $_GET['handlekey'];?> (url, message, values) {
$('<?php echo $_GET['handlekey'];?>').innerHTML = values['title'];
}
</script>
<?php } elseif($_GET['op'] == 'edithot') { ?>
<h3 class="flb">
<em>调整热度</em>
<?php if($_G['inajax']) { ?><span><a href="javascript:;" onclick="hideWindow('<?php echo $_GET['handlekey'];?>');" class="flbc" title="关闭">关闭</a></span><?php } ?>
</h3>
<form method="post" autocomplete="off" action="home.php?mod=spacecp&amp;ac=album&amp;op=edithot&amp;picid=<?php echo $picid;?>">
<input type="hidden" name="referer" value="<?php echo dreferer(); ?>" />
<input type="hidden" name="hotsubmit" value="true" />
<input type="hidden" name="formhash" value="<?php echo FORMHASH;?>" />
<div class="c">
新的热度:<input type="text" name="hot" value="<?php echo $pic['hot'];?>" size="10" class="px" />
</div>
<p class="o pns">
<button type="submit" name="btnsubmit" value="true" class="pn pnc"><strong>确定</strong></button>
</p>
</form>
<?php } elseif($_GET['op'] == 'saveforumphoto') { ?>
<h3 class="flb">
<em id="return_<?php echo $_GET['handlekey'];?>">保存到相册</em>
<?php if($_G['inajax']) { ?><span><a href="javascript:;" onclick="hideWindow('<?php echo $_GET['handlekey'];?>');" class="flbc" title="关闭">关闭</a></span><?php } ?>
</h3>
<form id="saveforumphoto" method="post" autocomplete="off" action="home.php?mod=spacecp&amp;ac=album&amp;op=saveforumphoto&amp;aid=<?php echo $_GET['aid'];?>" <?php if($_G['inajax']) { ?>onsubmit="ajaxpost(this.id, 'return_<?php echo $_GET['handlekey'];?>');return false;"<?php } ?>>
<input type="hidden" name="referer" value="<?php echo dreferer(); ?>" />
<input type="hidden" name="savephotosubmit" value="true" />
<input type="hidden" name="formhash" value="<?php echo FORMHASH;?>" />
<input type="hidden" name="aid" value="<?php echo $_GET['aid'];?>" />
<?php if($_G['inajax']) { ?><input type="hidden" name="handlekey" value="<?php echo $_GET['handlekey'];?>" /><?php } ?>
<div class="c">
保存到: <select name="albumid" class="ps vm"><?php if(is_array($albumlist)) foreach($albumlist as $key => $value) { ?><option value="<?php echo $value['albumid'];?>"><?php echo $value['albumname'];?></option>
<?php } ?>
<option value="0">默认相册</option>
</select>
</div>
<p class="o pns">
<button type="submit" name="btnsubmit" value="true" class="pn pnc"><strong>确定</strong></button>
</p>
</form>
<script type="text/javascript">
function succeedhandle_<?php echo $_GET['handlekey'];?> (url, message, values) {

}
</script>
<?php } if($_GET['op']=='edit' || $_GET['op']=='editpic') { ?>
</div>
</div>
<div class="appl"><?php if(!empty($_G['setting']['pluginhooks']['global_userabout_top'][$_G['basescript'].'::'.CURMODULE])) echo $_G['setting']['pluginhooks']['global_userabout_top'][$_G['basescript'].'::'.CURMODULE];?>
<ul><?php if(is_array($_G['setting']['spacenavs'])) foreach($_G['setting']['spacenavs'] as $nav) { if($nav['available'] && (!$nav['level'] || ($nav['level'] == 1 && $_G['uid']) || ($nav['level'] == 2 && $_G['adminid'] > 0) || ($nav['level'] == 3 && $_G['adminid'] == 1))) { ?>			
<?php echo $nav['code'];?>
<?php } } ?>
</ul>
<?php if(!empty($_G['setting']['pluginhooks']['global_userabout_bottom'][$_G['basescript'].'::'.CURMODULE])) echo $_G['setting']['pluginhooks']['global_userabout_bottom'][$_G['basescript'].'::'.CURMODULE];?></div>
</div>
<?php } include template('common/footer'); ?>