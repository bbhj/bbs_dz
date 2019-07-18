<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('discuz');
0
|| checktplrefresh('./template/default/mobile/forum/discuz.htm', './template/default/mobile/common/header.htm', 1541843648, '1', './data/template/1_1_mobile_forum_discuz.tpl.php', './template/default', 'mobile/forum/discuz')
|| checktplrefresh('./template/default/mobile/forum/discuz.htm', './template/default/mobile/common/footer.htm', 1541843648, '1', './data/template/1_1_mobile_forum_discuz.tpl.php', './template/default', 'mobile/forum/discuz')
;?>
<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN" "http://www.wapforum.org/DTD/xhtml-mobile10.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="application/xhtml+xml; charset=utf-8"/>
<meta http-equiv="Cache-control" content="<?php if($_G['setting']['mobile']['mobilecachetime'] > 0) { ?><?php echo $_G['setting']['mobile']['mobilecachetime'];?><?php } else { ?>no-cache<?php } ?>" />
<meta name="viewport" content="width=device-width; initial-scale=1.3;  minimum-scale=1.0; maximum-scale=2.0"/>
<meta name="MobileOptimized" content="240"/>
<meta name="Iphone-content" content="320"/>
<meta name="format-detection" content="telephone=no" />
<meta name="keywords" content="<?php if(!empty($metakeywords)) { echo dhtmlspecialchars($metakeywords); } ?>" />
<meta name="description" content="<?php if(!empty($metadescription)) { echo dhtmlspecialchars($metadescription); ?> <?php } ?>,<?php echo $_G['setting']['bbname'];?>" />
<title><?php if(!empty($navtitle)) { ?><?php echo $navtitle;?> - <?php } if(empty($nobbname)) { ?> <?php echo $_G['setting']['bbname'];?> - <?php } ?> 手机版 - Powered by Discuz!</title>
<style type="text/css">
* { margin: 0; padding: 0; word-wrap: break-word; }
ul li, .xl li { list-style: none; }
.xw0 { font-weight: 400; }
.xw1 { font-weight: 700; }
.xg1, .xg1 a { color: #999 !important; }
.xg1 .xi2 { color: #999 !important; }
.xg2 { color: #666; }
.xi1, .onerror { color: #F60; }
.xi2, .xi2 a, .xi3 a { color: #369 ; }
.mtn { margin-top: 5px !important; }
.mbn { margin-bottom: 5px !important; }
.mtm { margin-top: 10px !important; }
.ptn { padding-top: 5px !important; }
.pbn { padding-bottom: 5px !important; }
.pd2 { padding: 2px !important; }
.pd5 { padding: 5px !important; }
.nopd { padding: 0px !important;}
.bt{ border-top: 1px #F2F2F2 solid !important; }
.bbn{ border-bottom: 1px #efefef solid !important; }
.ban { border: 1px #F2F2F2 solid !important;}
.xs0 { font-size : 8pt;}

a, .lkcss{ color: #004299; text-decoration: none;}
a img{ text-decoration: none; border: 0px none;}
EM { font-style: normal; }
img{border: 0;}

.odd { background: #FFF; }
.even { background: #fbfbff;}

.txt, .txt_s, .px { padding: 5px 0px; border: 1px solid #C3C3C3; background: #FFF url(./static/image/mobile/input_bg.gif) repeat-x 0 0px; width: 100%; }
.txt_s { width: 30px; }


body {background: #FFF; background-image:none; line-height: 130%; font-size: 10pt; font-style: normal; font-family: Arial,Helvetica,sans-serif; }

.hd { padding: 3px; border-bottom: 3px solid #2B7ACD; }
.hd a{ color: #2B7ACD; text-decoration: none; }
.wp { padding: 2px;}

.f_c { margin-top: 5px; padding: 5px; border: 1px #C2D5E3 solid; }
.f_c p{ line-height: 24px;}
/* common border */
.box { margin-top:3px; background: #fbfbff; padding: 3px 0; line-height:18px;}
.box h2 {}
.box .on { font-weight: 700; }
.box_ex { margin-top:0px; border-top: 0px none;}
.box_ex2{ margin-top:0px; border-top:0px none; border-left: 0px none; border-right: 0px none; }

.bm .bm_h { padding: 2px; background: #2A6EB4; border-bottom:1px #02254b solid; color: #FFF; line-height: 20px; font-size: 10pt;  }
.bm .bm_h a, .bm .bm_h .lkcss { color: #FFF; text-decoration: none;}
.bm .bm_c { padding: 3px 2px; border-bottom:1px solid #F2F2F2;  }
.bm .bm_c p{ margin-bottom: 5px; }
.bm .bm_c_bg { background: #f3f3ff; }
.bm .bm_c em { color: #999;}
.bm .bm_inf { background: #FBFBFF; padding: 5px 0;}
.bm_c .bm_user {  padding: 1px 0 1px 0px; line-height: 14px;}
.warning { margin-top: 4px; padding: 3px; border: 1px #CDCDCD solid; color:#666; }
.warning a{ color: #F26C4F;}

.pg { padding: 4px 0;}
.pg strong{ padding:2px 6px; }
.pg a{ padding: 2px 6px; }
.pipe { margin: 0 1px; font-size:12px; font-weight: 300; color: #c4c4c4; }

/* footer */
.ft{ margin:2px 0 2px 2px; padding: 1px; }

.fl { margin-top: 5px; }
.tl { margin-top: 5px;}
.tl a{ text-decoration: none;}
.tl .bm .bm_c img{ vertical-align: middle;}
.moder { margin-top: 2px; padding: 2px; border: 0px none; background: #FFF;}
.flif { border: none; background: none; color: #666;}
.ttp a{ margin: 0 2px;}

/* viewthread */
.vt { margin-top: 5px;}
.vt .bm .bm_h a { display: inline; width: auto;}
.vt .bm .bm_inf{ color: #444; }
.vt .bm .bm_c { padding: 1px; border-top: 1px #e9e9ff solid; border-bottom: 1px #e9e9ff solid; background: #fbfbff; color: #666;  }
.vt .pbody { margin-top: 1px; margin-bottom: 4px;}
.vt .pbody h2{ font-weight: 300;}
.vt .pbody .mes { padding: 1px;}
.vt .bm .bm_c .attach_h { margin-top: 4px;}
.vt .bm .bm_c .attach .vm{ width: 14px; vertical-align: middle;}
.attach img { width: 16px; vertical-align: middle; }
.vt .postmessage{ padding: 3px 0; line-height: normal;}
.inbox { padding: 3px 0;}
.viewimg { padding: 2px;}
.viewsort img { vertical-align:top; }

/* newpost */
.sort { padding: 2px; border: 1px #efefef solid; background: #FFF; }
.quote { padding: 5px; font-style: italic; }

/* profile */
.profile_bm_c { padding: 0px !important;}
.profile_table td{ padding:0 3px; border-top: 1px #efefef solid;}
.profile_table th { border-top: 2px #efefef solid;}
.jammer { font-size: 10px; color:#FFF;}
</style>
</head>
<body>
<?php if($_G['setting']['domain']['app']['mobile']) { $nav = 'http://'.$_G['setting']['domain']['app']['mobile'];?><?php } else { $nav = "forum.php";?><?php } ?>
<div class="hd"><a href="<?php echo $nav;?>" title="<?php if(empty($nobbname)) { ?> <?php echo $_G['setting']['bbname'];?> - <?php } ?>手机版"><?php if($_G['setting']['mobile']['mobilesimpletype'] == 1) { if(empty($nobbname)) { ?> <?php echo $_G['setting']['bbname'];?> - <?php } ?> 手机版<?php } else { ?><img src="./static/image/mobile/logo.gif" /><?php } ?></a></div>
<div class="wp">
<div class="pd2">
<?php if($_G['uid']) { ?><a href="home.php?mod=space&amp;uid=<?php echo $_G['uid'];?>&amp;do=profile"><?php echo $_G['member']['username'];?></a><span class="pipe">|</span><a href="home.php?mod=space&amp;do=pm" <?php if($_G['member']['newpm']) { ?>class="xi1"<?php } ?>><?php if($_G['member']['newpm']) { ?>新短消息<?php } else { ?>消息<?php } ?></a><span class="pipe">|</span><a href="home.php?mod=space&amp;uid=<?php echo $_G['uid'];?>&amp;do=favorite&amp;view=me&amp;type=forum">收藏</a><span class="pipe">|</span><a href="home.php?mod=space&amp;uid=<?php echo $_G['uid'];?>&amp;do=thread&amp;view=me">我的帖子</a><span class="pipe">|</span><a href="member.php?mod=logging&amp;action=logout&amp;formhash=<?php echo FORMHASH;?>" title="退出">退出</a><?php } elseif($_G['connectguest']) { ?><?php echo $_G['member']['username'];?><span class="pipe">|</span><a href="member.php?mod=logging&amp;action=logout&amp;formhash=<?php echo FORMHASH;?>" title="退出">退出</a><?php } else { ?><a href="member.php?mod=logging&amp;action=login" title="登录">登录</a><?php if($_G['setting']['regstatus']) { ?><span class="pipe">|</span><a href="member.php?mod=<?php echo $_G['setting']['regname'];?>" title="<?php echo $_G['setting']['reglinkname'];?>"><?php echo $_G['setting']['reglinkname'];?></a><?php } if($_G['setting']['connect']['allow'] && !$_G['setting']['bbclosed']) { ?><span class="pipe">|</span><a href="<?php echo $_G['connect']['login_url'];?>&statfrom=login_simple">ʹ��QQ�ʺŵ�¼</a><?php } } ?>
</div>
<?php if(!empty($_G['setting']['pluginhooks']['global_header_mobile'])) echo $_G['setting']['pluginhooks']['global_header_mobile'];?>
<?php if(!empty($_G['setting']['pluginhooks']['index_top_mobile'])) echo $_G['setting']['pluginhooks']['index_top_mobile'];?>
<?php if($forum_favlist) { ?>
<div class="fl">
<div class="bm">
<div class="bm_h">
<a href="home.php?mod=space&amp;uid=<?php echo $_G['uid'];?>&amp;do=favorite&amp;view=me&amp;type=forum">我收藏的版块</a>
</div><?php $i=1;?><?php if(is_array($forum_favlist)) foreach($forum_favlist as $key => $val) { ?><div class="bm_c <?php if($i%2 == 1) { ?>add<?php } else { ?>even<?php } ?>"><a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $val['id'];?>"><?php echo $val['title'];?></a> <a href="home.php?mod=spacecp&amp;ac=favorite&amp;op=delete&amp;favid=<?php echo $val['favid'];?>&amp;type=forum" title="取消收藏" class="xg1">[x]</a></div>
  <?php $i++;?><?php } ?>
</div>
</div>
<?php } if(is_array($catlist)) foreach($catlist as $key => $cat) { ?><div class="fl">
<div class="bm">
    	<div class="bm_h">
    	<?php if($_G['setting']['mobile']['mobileforumview'] == 1) { ?><a href="forum.php?viewgid=<?php if($cat['fid'] != $_GET['viewgid']) { ?><?php echo $cat['fid'];?><?php } else { ?>0<?php } ?>"><?php echo $cat['name'];?></a><?php } else { ?><?php echo $cat['name'];?><?php } ?>
        </div>
        <?php if($_G['setting']['mobile']['mobileforumview'] == 0 || ($cat['fid'] == $_GET['viewgid'])) { ?>
            <?php $i=1;?>            <?php if(is_array($cat['forums'])) foreach($cat['forums'] as $forumid) { ?>                <div class="bm_c <?php if($i%2 == 1) { ?>add<?php } else { ?>even<?php } ?>">
                    <?php $forum=$forumlist[$forumid];?>                    <a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $forum['fid'];?>" <?php if($forum_favlist[$forumid]) { ?>class="xi1"<?php } ?>><?php echo $forum['name'];?></a> <?php if($forum['todayposts'] > 0) { ?><font class="xg1">(<?php echo $forum['todayposts'];?>)</font><?php } ?>
                </div>
                <?php $i++;?>            <?php } ?>
        <?php } ?>
    </div>
</div>
<?php } ?>
<?php if(!empty($_G['setting']['pluginhooks']['index_middle_mobile'])) echo $_G['setting']['pluginhooks']['index_middle_mobile'];?>
<div class="box">
今日<?php echo $todayposts;?><span class="pipe">|</span>会员<?php echo $_G['cache']['userstats']['totalmembers'];?><?php if(empty($gid) && $_G['setting']['whosonlinestatus'] && $onlinenum) { ?><span class="pipe">|</span>在线<?php echo $onlinenum;?><?php } ?>
</div>
<?php if(!empty($_G['setting']['pluginhooks']['index_bottom_mobile'])) echo $_G['setting']['pluginhooks']['index_bottom_mobile'];?></div>
<?php if(!empty($_G['setting']['pluginhooks']['global_footer_mobile'])) echo $_G['setting']['pluginhooks']['global_footer_mobile'];?>
<div class="ft">
<p><a href="<?php echo $_G['setting']['siteurl'];?>" target="_blank"><?php echo $_G['setting']['sitename'];?></a></p>
<p>Powered by <strong><a href="http://www.discuz.net" target="_blank">Discuz!</a></strong> <em><?php echo $_G['setting']['version'];?></em></p>
<p><a href="<?php echo $nav;?>">首页</a><span class="pipe">|</span>标准版<span class="pipe">|</span><a href="<?php echo $_G['setting']['mobile']['simpletypeurl']['2'];?>" class="xw0" title="触屏版">触屏版</a><span class="pipe">|</span><a href="<?php echo $_G['setting']['mobile']['nomobileurl'];?>" class="xw0" title="电脑版">电脑版</a></p>
</div>
</body>
</html><?php updatesession();?><?php if(defined('IN_MOBILE')) { output();?><?php } else { output_preview();?><?php } ?>
