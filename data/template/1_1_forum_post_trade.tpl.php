<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); ?>
<input type="hidden" name="trade" value="yes" />
<input type="hidden" name="item_type" value="1" />
<div class="exfm cl">
<div class="sinf sppoll z">
<dl>
<dt><span class="rq">*</span><label for="item_name">商品名称:</label></dt>
<dd><input type="text" name="item_name" id="item_name" class="px oinf" value="<?php echo $trade['subject'];?>" tabindex="1" /></dd>
<dt><span class="rq">*</span><label for="item_number">商品数量:</label></dt>
<dd>
<div class="spmf">
<em>
<input type="text" name="item_number" id="item_number" class="px" value="<?php echo $trade['amount'];?>" tabindex="1" />
</em>
<em>
<span class="ftid">
<select id="item_quality" class="ps" width="108" name="item_quality" tabindex="1">
<option value="1" <?php if($trade['quality'] == 1) { ?>selected="selected"<?php } ?>>全新</option>
<option value="2" <?php if($trade['quality'] == 2) { ?>selected="selected"<?php } ?>>二手</option>
</select>
</span>
</em>
</div>
</dd>
<dt><label for="transport">物流方式:</label></dt>
<dd>
<span class="ftid">
<select name="transport" id="transport" width="108" change="$('logisticssetting').style.display = $('transport').value == 'virtual' ? 'none' : ''" class="ps">
<option value="virtual" <?php if($trade['transport'] == 3) { ?>selected="selected"<?php } ?>>虚拟物品</option>
<option value="seller" <?php if($trade['transport'] == 1) { ?>selected="selected"<?php } ?>>卖家承担运费</option>
<option value="buyer" <?php if($trade['transport'] == 2) { ?>selected="selected"<?php } ?>>买家承担运费</option>
<option value="logistics" <?php if($trade['transport'] == 4) { ?>selected="selected"<?php } ?>>支付给物流公司</option>
<option value="offline" <?php if($trade['transport'] == 0) { ?>selected="selected"<?php } ?>>线下交易</option>
</select>
</span>
</dd>
<dt><span class="rq">*</span>商品价格:</dt>
<dd>
<div class="spmf mbm">
<em>
<input type="text" name="item_price" id="item_price" class="px" value="<?php echo $trade['price'];?>" tabindex="1" />
<label for="item_price">现价(人民币)</label>
</em>
<em>
<input type="text" name="item_costprice" id="item_costprice" class="px" value="<?php echo $trade['costprice'];?>" tabindex="1" />
<label for="item_costprice">原价(人民币)</label>
</em>
</div>
<?php if($_G['setting']['creditstransextra']['5'] != -1) { ?>
<div class="spmf mbm">
<em>
<input type="text" name="item_credit" id="item_credit" class="px" value="<?php echo $trade['credit'];?>" tabindex="1" />
<label for="item_credit">现价积分(<?php echo $_G['setting']['extcredits'][$_G['setting']['creditstransextra']['5']]['title'];?>)</label>
</em>
<em>
<input type="text" name="item_costcredit" id="item_costcredit" class="px" value="<?php echo $trade['costcredit'];?>" tabindex="1" />
<label for="item_costcredit">原价积分(<?php echo $_G['setting']['extcredits'][$_G['setting']['creditstransextra']['5']]['title'];?>)</label>
</em>
</div>
<?php } ?>
<div class="spmf3 mbm" id="logisticssetting" style="display:<?php if(!$trade['transport'] || $trade['transport'] == 3) { ?>none<?php } ?>">
<em>
<input type="text" name="postage_mail" id="postage_mail" class="px" value="<?php echo $trade['ordinaryfee'];?>" tabindex="1" />
<label for="postage_mail">平邮</label>
</em>
<em>
<input type="text" name="postage_express" id="postage_express" class="px" value="<?php echo $trade['expressfee'];?>" tabindex="1" />
<label for="postage_express">快递</label>
</em>
<em>
<input type="text" name="postage_ems" id="postage_ems" class="px" value="<?php echo $trade['emsfee'];?>" tabindex="1" />
<label for="postage_ems">EMS</label>
</em>
</div>
</dd>
<dt><label for="paymethod">交易方式:</label></dt>
<dd>
<span class="ftid">
<select name="paymethod" id="paymethod" width="108" change="display('tenpayseller')" class="ps" tabindex="1">
<?php if($_G['setting']['ec_tenpay_opentrans_chnid']) { ?><option value="0" <?php if($trade['tenpayaccount']) { ?>selected<?php } ?>>在线交易</option><?php } ?>
<option value="1" <?php if(!$trade['tenpayaccount']) { ?>selected<?php } ?>>担保交易</option>
</select>
</span>
</dd>
</dl>
<dl id="tenpayseller" style="<?php if(!$trade['tenpayaccount']) { ?>display:none<?php } ?>">
<dt><label for="tenpay_account">财付通账户:</label></dt>
<dd><input type="text" name="tenpay_account" id="tenpay_account" class="px" value="<?php echo $trade['tenpayaccount'];?>" tabindex="2" /></dd>
</dl>
</div>
<div class="sadd z">
<dl class="cl">
<dt><label for="item_locus">所在地点:</label></dt>
<dd><input type="text" name="item_locus" id="item_locus" class="px" value="<?php echo $trade['locus'];?>" tabindex="1" /></dd>
<dt><label for="item_expiration">有效期至:</label></dt>
<dd class="hasd">
<input type="text" name="item_expiration" id="item_expiration" class="px" onclick="showcalendar(event, this, false)" autocomplete="off" value="<?php echo $trade['expiration'];?>" tabindex="1" />
<a href="javascript:;" class="dpbtn" onclick="showselect(this, 'item_expiration', 1)">^</a>
</dd>
<?php if($allowpostimg) { ?>
<dt>商品图片:</dt>
<dd class="pns">
<button type="button" class="pn" onclick="uploadWindow(function (aid, url){tradeaid_upload(aid, url)})"><span><?php if($tradeattach['attachment']) { ?>更新<?php } else { ?>上传<?php } ?></span></button>
<input type="hidden" name="tradeaid" id="tradeaid" <?php if($tradeattach['attachment']) { ?>value="<?php echo $tradeattach['aid'];?>" <?php } ?>/>
<input type="hidden" name="tradeaid_url" id="tradeaid_url" />
<div id="tradeattach_image" class="ptn">
<?php if($tradeattach['attachment']) { ?>
<a href="<?php echo $tradeattach['url'];?>/<?php echo $tradeattach['attachment'];?>" target="_blank"><img class="spimg" src="<?php echo $tradeattach['url'];?>/<?php if($tradeattach['thumb']) { echo getimgthumbname($tradeattach['attachment']);?><?php } else { ?><?php echo $tradeattach['attachment'];?><?php } ?>" alt="" /></a>
<?php } ?>
</div>
</dd>
<?php } ?>
<?php if(!empty($_G['setting']['pluginhooks']['post_trade_extra'])) echo $_G['setting']['pluginhooks']['post_trade_extra'];?>
</dl>
</div>
</div>

<script type="text/javascript" reload="1">
simulateSelect('item_quality');
simulateSelect('paymethod');
simulateSelect('transport');

EXTRAFUNC['validator']['special'] = 'validateextra';
function validateextra() {
if($('postform').item_name.value == '') {
showDialog('抱歉，请输入商品名称', 'alert', '', function () { $('postform').item_name.focus() });
return false;
}
if($('postform').item_number.value == '') {
showDialog('抱歉，请输入商品数量', 'alert', '', function () { $('postform').item_number.focus() });
return false;
}
if($('postform').item_price.value == '' && $('postform').item_credit.value == '') {
showDialog('抱歉，请输入商品价格', 'alert', '', function () { $('postform').item_price.focus() });
return false;
}
return true;
}
function tradeaid_upload(aid, url) {
$('tradeaid_url').value = url;
updatetradeattach(aid, url, '<?php echo $_G['setting']['attachurl'];?>forum');
}
</script>