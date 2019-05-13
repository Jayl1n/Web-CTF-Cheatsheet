<?php
$descriptorspec = array(
0 => array("pipe", "r"),  
1 => array("pipe", "w"), 
2 => array("file", "/tmp/error-output.txt", "a")
);

$cwd = '/tmp';
$stime=microtime(true);
$process = proc_open('/readflag 2>&1', $descriptorspec, $pipes, $cwd);


$string = stream_get_contents($pipes[1],130);
$string = str_replace('Solve the easy challenge first','',$string);
$string = str_replace('input your answer:','',$string);
$string = str_replace('\n','',$string);
$result = eval("return $rs;");
echo $result;
fwrite($pipes[0], "$result\n");

$rs = stream_get_contents($pipes[1],130);
echo $rs;
fclose($pipes[1]);