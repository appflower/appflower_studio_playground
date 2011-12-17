#!/usr/bin/php
<?php
/**
 * Lame and quick way to update local IP entry for afservice.local domain
 * This name is hardcoded on both sides (playground and appFlowerService)
 */
$ipAddr = `ifconfig eth0 | grep inet\ addr | cut -f2 -d: | cut -f1 -d\  2> /dev/null`;
$ipAddr = trim($ipAddr);

if ($ipAddr != '') {
    passthru("grep -v afservice.local /etc/hosts > /etc/hosts_tmp");
    passthru("echo '$ipAddr afservice.local' >> /etc/hosts_tmp");
    passthru("mv /etc/hosts_tmp /etc/hosts");
}
?>