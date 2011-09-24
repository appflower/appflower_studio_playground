#!/usr/bin/php
<?php
sleep(3);
$ipAddr = `ifconfig eth0 | grep inet\ addr | cut -f2 -d: | cut -f1 -d\  2> /dev/null`;
$ipAddr = trim($ipAddr);

$issueContent=
'
To use your AppFlower Virtual Machine - open below URL in your browser:

http://'.$ipAddr.'/

';
$appflowerAscii = file_get_contents(__DIR__.'/appflower.ascii');
$appflowerAscii = str_replace('\\', '\\\\', $appflowerAscii);
file_put_contents('/etc/issue', $appflowerAscii.$issueContent);
?>
