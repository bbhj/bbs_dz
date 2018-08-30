<?php


$_config = array();

// ----------------------------  CONFIG DB  ----------------------------- //
$_config['db']['1']['dbhost'] = 'db.airdb.io';
$_config['db']['1']['dbuser'] = 'dbuser';
$_config['db']['1']['dbpw'] = 'dbpasswd';
$_config['db']['1']['dbcharset'] = 'utf8';
$_config['db']['1']['pconnect'] = '0';
$_config['db']['1']['dbname'] = 'dbname';
$_config['db']['1']['tablepre'] = 'pre_';
$_config['db']['slave'] = '';
$_config['db']['common']['slave_except_table'] = '';

// --------------------------  CONFIG MEMORY  --------------------------- //
$_config['memory']['prefix'] = '5YIOEW_';
$_config['memory']['redis']['server'] = '';
$_config['memory']['redis']['port'] = 6379;
$_config['memory']['redis']['pconnect'] = 1;
$_config['memory']['redis']['timeout'] = '0';
$_config['memory']['redis']['requirepass'] = '';
$_config['memory']['redis']['serializer'] = 1;
$_config['memory']['memcache']['server'] = '';
$_config['memory']['memcache']['port'] = 11211;
$_config['memory']['memcache']['pconnect'] = 1;
$_config['memory']['memcache']['timeout'] = 1;
$_config['memory']['apc'] = '0';
$_config['memory']['apcu'] = '0';
$_config['memory']['xcache'] = '0';
$_config['memory']['eaccelerator'] = '0';
$_config['memory']['wincache'] = '0';
$_config['memory']['yac'] = '0';
$_config['memory']['file']['server'] = '';

// --------------------------  CONFIG SERVER  --------------------------- //
$_config['server']['id'] = 1;

// -------------------------  CONFIG DOWNLOAD  -------------------------- //
$_config['download']['readmod'] = 2;
$_config['download']['xsendfile']['type'] = '0';
$_config['download']['xsendfile']['dir'] = '/down/';

// --------------------------  CONFIG OUTPUT  --------------------------- //
$_config['output']['charset'] = 'utf-8';
$_config['output']['forceheader'] = 1;
$_config['output']['gzip'] = '0';
$_config['output']['tplrefresh'] = 1;
// $_config['output']['language'] = 'zh_cn';
$_config['output']['language'] = 'en_US';
$_config['output']['staticurl'] = 'https://static.baobeihuijia.com/static/';
$_config['output']['ajaxvalidate'] = '0';
$_config['output']['iecompatible'] = '0';

// --------------------------  CONFIG COOKIE  --------------------------- //
$_config['cookie']['cookiepre'] = '99qb_';
$_config['cookie']['cookiedomain'] = '';
$_config['cookie']['cookiepath'] = '/';

// -------------------------  CONFIG SECURITY  -------------------------- //
$_config['security']['authkey'] = '51d1d52e9b6040f74cf8592077ada989k0XlmCyIF8xYFOoqJo';
$_config['security']['urlxssdefend'] = 1;
// cc 配置 //0不启用 1 cookie刷新限制 2代理服务器访问限制 4页面二次请求 8验证问答
// 请勿配置为 "1|2|4"。如果配置会导致报错： 本站现在限制使用代理服务器访问，请去除您的代理设置，直接访问本站。
$_config['security']['attackevasive'] = '0';
$_config['security']['querysafe']['status'] = 1;
$_config['security']['querysafe']['dfunction']['0'] = 'load_file';
$_config['security']['querysafe']['dfunction']['1'] = 'hex';
$_config['security']['querysafe']['dfunction']['2'] = 'substring';
$_config['security']['querysafe']['dfunction']['3'] = 'if';
$_config['security']['querysafe']['dfunction']['4'] = 'ord';
$_config['security']['querysafe']['dfunction']['5'] = 'char';
$_config['security']['querysafe']['daction']['0'] = '@';
$_config['security']['querysafe']['daction']['1'] = 'intooutfile';
$_config['security']['querysafe']['daction']['2'] = 'intodumpfile';
$_config['security']['querysafe']['daction']['3'] = 'unionselect';
$_config['security']['querysafe']['daction']['4'] = '(select';
$_config['security']['querysafe']['daction']['5'] = 'unionall';
$_config['security']['querysafe']['daction']['6'] = 'uniondistinct';
$_config['security']['querysafe']['dnote']['0'] = '/*';
$_config['security']['querysafe']['dnote']['1'] = '*/';
$_config['security']['querysafe']['dnote']['2'] = '#';
$_config['security']['querysafe']['dnote']['3'] = '--';
$_config['security']['querysafe']['dnote']['4'] = '"';
$_config['security']['querysafe']['dlikehex'] = 1;
$_config['security']['querysafe']['afullnote'] = '0';
$_config['security']['creditsafe']['second'] = '0';
$_config['security']['creditsafe']['times'] = 10;

// --------------------------  CONFIG ADMINCP  -------------------------- //
// -------- Founders: $_config['admincp']['founder'] = '1,2,3'; --------- //
// $_config['admincp']['founder'] = '1';
$_config['admincp']['founder'] = '0';
$_config['admincp']['forcesecques'] = '0';
$_config['admincp']['checkip'] = 1;
$_config['admincp']['runquery'] = '0';
$_config['admincp']['dbimport'] = 1;

// --------------------------  CONFIG REMOTE  --------------------------- //
$_config['remote']['on'] = '0';
$_config['remote']['dir'] = 'remote';
$_config['remote']['appkey'] = '62cf0b3c3363429448e7216839721d8f';
$_config['remote']['cron'] = '0';

// ---------------------------  CONFIG INPUT  --------------------------- //
$_config['input']['compatible'] = 1;


// -------------------  THE END  -------------------- //

?>
