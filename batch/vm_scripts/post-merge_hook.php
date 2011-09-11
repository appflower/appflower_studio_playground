#!/usr/bin/env php
<?php
$mainProjectDir = dirname(dirname(dirname(__FILE__)));
$vmUpdateScriptPath = "$mainProjectDir/batch/vm_scripts/update_vm.php";
$logFilePath = "$mainProjectDir/batch/vm_scripts/update_vm_".time().'.log';

$log = date('d-m-Y H:i:s') . "\n";
exec($vmUpdateScriptPath. ' 2>&1', $output, $retVal);
$log .= join("\n", $output);
$log .= "\n";
$log .= "Return value: ".print_r($retVal, 1)."\n";
file_put_contents($logFilePath, $log);  