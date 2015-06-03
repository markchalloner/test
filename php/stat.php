<?php

// Testing stat to work out format of mode: "inode protection mode"

//$override = '/tmp/stat_test_KZfgDc';

$file = isset($override) && 0 < strlen($override) ? $override : tempnam('/tmp', 'stat_test_');

echo 'File: '.$file."\n";
echo "\n";

touch($file)."\n";

print_r(stat($file))."\n";

if (!isset($override) || 0 === strlen($override)) {
    unlink($file);
}