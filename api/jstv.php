<?php
error_reporting(0);
$n = [
   'jsws' => "jsws_live", //江苏卫视 
   'jscs' => "jscs_live", //江苏城市 
   'jszy' => "jszy_live", //江苏综艺 
   'jsys' => "jsys_live", //江苏影视 
   'jsxw' => "jsxw_live", //江苏新闻 
   'jsjy' => "jsjy_live", //江苏教育
   'jsty' => "jsxx_live", //江苏体育休闲 
   'jsgj' => "jsgj_live", //江苏国际 
   'ymkt' => "ymkt_live", //优漫卡通 

   'nj1' => "nanjing", //南京新闻综合 
   'njlh' => "luhe", //六合新闻综合

   'wx1' => "wuxi", //无锡新闻综合 
   'wxjy' => "jiangyin", //江阴新闻综合 

   'xz1' => "xuzhou", //徐州新闻综合 
   'xzpz' => "pizhou", //邳州综合 
   'xzxy' => "xinyi", //新沂新闻综合 
   'xzjw' => "jiawang", //贾汪新闻综合 
   'xzts' => "tongshan", //铜山新闻综合 

   'cz1' => "changzhou", //常州新闻
   'czwj' => "wujin", //武进综合 

   'sz1' => "suzhou", //苏州新闻综合 
   'szcs' => "changshu", // 常熟综合x
   'szwj' => "wujiang", //吴江新闻综合 
   'szzjg' => "zhangjiagang", //张家港新闻综合x 

   'nt1' => "nantong", //南通新闻综合 

   'lyg1' => "lianyungang", //连云港新闻综合 
   'lygdh' => "donghai", //东海新闻综合 

   'ha1' => "huaian", //淮安综合 
   'haxy' => "xuyi", //盱眙综合 
   'hahz' => "hongze", //洪泽综合 

   'yc1' => "yancheng", //盐城1套 
   'ycxs' => "xiangshui", //响水综合

   'yz1' => "yangzhou", //扬州新闻x
   'yzhj' => "hanjiang", //邗江综合x

   'zj1' => "zhenjiang", //镇江新闻综合 
   'zjjr' => "jurong", //句容新闻综合x 

   'tz1' => "taizhou", //泰州新闻 
   'tzjj' => "jingjiang", //靖江新闻 
   'tztx' => "taixing", //泰兴新闻综合 
   'tzxh' => "xinghua", //兴化新闻综合 

   'sq1' => "suqian", //宿迁综合 
   'sqsy' => "siyang", //泗阳综合 
   ];

$id = isset($_GET['id'])?$_GET['id']:'jsws';

$txTime = dechex(floor(time())+180);
$txSecret = md5("HCPMPKxQNrKAyjzR67JG".$n[$id].$txTime);

$url = "https://litchi-play-encrypted-site.jstv.com/applive/{$n[$id]}.m3u8?txSecret={$txSecret}&txTime={$txTime}";

$burl = dirname($url)."/";
$php = "http://".$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
$ts = $_GET['ts'];
if(empty($ts)) {
     header('Content-Type: application/vnd.apple.mpegurl');
     print_r(preg_replace("/(.*?.ts)/i",$php."?ts=$burl$1",get($url)));
     } else {
       $data = get($ts);
       header('Content-Type: video/MP2T');
       echo $data;
       }


function get($url){
     $ch = curl_init($url);
     curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
     curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
     curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
     curl_setopt($ch, CURLOPT_REFERER, 'https://live.jstv.com/');
     $res = curl_exec($ch);
     curl_close($ch);
     return $res;
     }
?>