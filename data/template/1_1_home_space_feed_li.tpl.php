<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); ?>
<li class="cl <?php echo $value['magic_class'];?>" id="feed_<?php echo $value['feedid'];?>_li" onmouseover="feed_menu(<?php echo $value['feedid'];?>,1);" onmouseout="feed_menu(<?php echo $value['feedid'];?>,0);">
<?php if($value['uid'] && empty($_G['home']['tpl']['hidden_more'])) { ?>
<a href="home.php?mod=spacecp&amp;ac=feed&amp;op=menu&amp;feedid=<?php echo $value['feedid'];?>" class="o<?php if($_G['uid'] == $value['uid']) { ?> del<?php } ?>" id="a_feed_menu_<?php echo $value['feedid'];?>" onclick="showWindow(this.id, this.href, 'get', 0);doane(event);" title="<?php if($_G['uid'] != $value['uid']) { ?>屏蔽动态<?php } else { ?>删除动态<?php } ?>" style="display:none;">菜单</a>
<?php } ?>
<div class="cl" <?php echo $value['style'];?>>
<a class="t" href="home.php?mod=space&amp;uid=<?php echo $uid;?>&amp;do=home&amp;view=<?php echo $_GET['view'];?>&amp;appid=<?php echo $value['appid'];?>&amp;icon=<?php echo $value['icon'];?>" title="只看此类动态"><img src="<?php echo $value['icon_image'];?>" /></a>
<?php echo $value['title_template'];?> 
<?php if($value['new']) { ?>
<span style="color:red;">New</span> 
<?php } ?>
<span class="xg1"><?php echo dgmdate($value[dateline], 'u');?></span>

<?php if(empty($_G['home']['tpl']['hidden_menu'])) { $_GET[key] = $key = random(8);?><?php if($value['idtype']=='doid') { ?>
(<a href="javascript:;" <?php if($_G['uid']) { ?>onclick="docomment_get('<?php echo $value['id'];?>', '<?php echo $key;?>');"<?php } else { ?>onclick="showWindow(this.id, 'home.php?mod=spacecp&ac=feed', 'get', 0);doane(event);"<?php } ?> id="<?php echo $_GET['key'];?>_do_a_op_<?php echo $value['id'];?>">回复</a>)
<?php } elseif(in_array($value['idtype'], array('blogid','picid','sid','eventid'))) { ?>
(<a href="javascript:;" <?php if($_G['uid']) { ?>onclick="feedcomment_get(<?php echo $value['feedid'];?>);"<?php } else { ?>onclick="showWindow(this.id, 'home.php?mod=spacecp&ac=feed', 'get', 0);doane(event);"<?php } ?> id="feedcomment_a_op_<?php echo $value['feedid'];?>">评论</a>)
<?php } } ?>

<div class="ec">

<?php if(empty($_G['home']['tpl']['hidden_hot']) && $value['hot']) { ?>
<div class="hot"><a href="home.php?mod=spacecp&amp;ac=feed&amp;feedid=<?php echo $value['feedid'];?>"><em><?php echo $value['hot'];?></em>马上参与</a></div>
<?php } if($value['image_1']) { ?>
<a href="<?php echo $value['image_1_link'];?>"<?php echo $value['target'];?>><img src="<?php echo $value['image_1'];?>" alt="" class="tn" /></a>
<?php } if($value['image_2']) { ?>
<a href="<?php echo $value['image_2_link'];?>"<?php echo $value['target'];?>><img src="<?php echo $value['image_2'];?>" alt="" class="tn" /></a>
<?php } if($value['image_3']) { ?>
<a href="<?php echo $value['image_3_link'];?>"<?php echo $value['target'];?>><img src="<?php echo $value['image_3'];?>" alt="" class="tn" /></a>
<?php } if($value['image_4']) { ?>
<a href="<?php echo $value['image_4_link'];?>"<?php echo $value['target'];?>><img src="<?php echo $value['image_4'];?>" alt="" class="tn" /></a>
<?php } if($value['body_template']) { ?>
<div class="d"<?php if($value['image_3']) { ?> style="clear: both; zoom: 1;"<?php } ?>>
<?php echo $value['body_template'];?>
</div>
<?php } if(!empty($value['body_data']['flashvar'])) { if(!empty($value['body_data']['imgurl'])) { ?>
<table class="mtm" title="点击播放" onclick="javascript:showFlash('<?php echo $value['body_data']['host'];?>', '<?php echo $value['body_data']['flashvar'];?>', this, '<?php echo $value['feedid'];?>');"><tr><td class="vdtn hm" style="background: url(<?php echo $value['body_data']['imgurl'];?>) no-repeat">
<img src="<?php echo IMGDIR;?>/vds.png" alt="点击播放" />
</td></tr></table>
<?php } else { ?>
<img src="<?php echo IMGDIR;?>/vd.gif" alt="点击播放" onclick="javascript:showFlash('<?php echo $value['body_data']['host'];?>', '<?php echo $value['body_data']['flashvar'];?>', this, '<?php echo $value['feedid'];?>');" class="tn" />
<?php } } elseif(!empty($value['body_data']['musicvar'])) { ?>
<img src="<?php echo IMGDIR;?>/music.gif" alt="点击播放" onclick="javascript:showFlash('music', '<?php echo $value['body_data']['musicvar'];?>', this, '<?php echo $value['feedid'];?>');" class="tn" />
<?php } elseif(!empty($value['body_data']['flashaddr'])) { ?>
<img src="<?php echo IMGDIR;?>/flash.gif" alt="点击查看" onclick="javascript:showFlash('flash', '<?php echo $value['body_data']['flashaddr'];?>', this, '<?php echo $value['feedid'];?>');" class="tn" />
<?php } if($user_list[$value['hash_data']]) { ?>
<p>其他参与者:<?php echo implode(', ', $user_list[$value['hash_data']]);?></p>
<?php } if(trim(str_replace('&nbsp;', '', $value['body_general']))) { ?>
<div class="quote<?php if($value['image_1']) { ?> z<?php } ?>"><blockquote><?php echo $value['body_general'];?></blockquote></div>
<?php } ?>
</div>
</div>

<?php if($value['idtype']=='doid') { ?>
<div id="<?php echo $key;?>_<?php echo $value['id'];?>" style="display:none;"></div>
<?php } elseif($value['idtype']) { ?>
<div id="feedcomment_<?php echo $value['feedid'];?>" style="display:none;"></div>
<?php } ?>
</li>