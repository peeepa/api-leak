<?php

// 𝐓𝐡𝐞𝐬𝐞 𝐚𝐫𝐞 𝐭𝐡𝐞 𝐟𝐮𝐧𝐜𝐭𝐢𝐨𝐧𝐬, 𝐓𝐡𝐞𝐲 𝐚𝐥𝐥𝐨𝐰 𝐭𝐡𝐞 𝐏𝐇𝐏 𝐭𝐨 𝐞𝐱𝐞𝐜𝐮𝐭𝐞 𝐜𝐨𝐝𝐞 𝐰𝐡𝐞𝐧 𝐜𝐚𝐥𝐥𝐞𝐝 𝐮𝐩𝐨𝐧.

function SendWebhook()
{

  $username = $_GET['username'];
  $host = $_GET['host'];
  $port = intval($_GET['port']);
  $time = intval($_GET['time']);
  $method = $_GET['method'];

  shell_exec("python /var/www/html/Python/ShisuiWebhook.py '$username' '$host' '$port' '$time' '$method'");
}

?>