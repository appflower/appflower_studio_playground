#!/usr/bin/php
<?php
sleep(3);
$ipAddr = `ifconfig eth0 | grep inet\ addr | cut -f2 -d: | cut -f1 -d\  2> /dev/null`;
$ipAddr = trim($ipAddr);

$issueContent=
'
Welcome to the AppFlower Virtual Machine.

To use the AppFlower IDE open the following URL in your browser:
';

if ($ipAddr != '') {
$issueContent.=
'
http://'.$ipAddr.'/';
} else {
$issueContent.=
'
Error: we couldn\'t predict the IP address. Login and use \'ifconfig\' command.';
}
$issueContent.=
'

To login to the Console use user: root and password: appflower
You can change the password after login with the command passwd
';

$appflowerAscii = file_get_contents(__DIR__.'/appflower.ascii');
$appflowerAscii = str_replace('\\', '\\\\', $appflowerAscii);
file_put_contents('/etc/issue', $appflowerAscii.$issueContent);
?>
