<?php  
//贵州地方台代理
$id = isset($_GET['id'])?$_GET['id']:1;
$ids=array(

"1"=>"01",
"gzgg"=>"02",
"gzwy"=>"03",
"dzsh"=>"04",
"dwpd"=>"05",
"kjjk"=>"06",
"gzjj"=>"09",
"8"=>"10",
);
$id = isset($_GET['id'])?$_GET['id']:01;
$url="https://api.gzstv.com/v1/tv/ch".$ids[$id]."/?remote_address=&fields=title,stream_url";
$iisfu=file_get_contents($url);
preg_match('/"stream_url":"(.*)"/i',$iisfu, $m);
header('location:'.$m[1]);

?>
