#!/usr/bin/env php
<?php

function arrayToGenerator(array $array) {
	foreach ($array as $key => $value) {
		yield $key => $value;
	}
}

$gen1 = arrayToGenerator([
	'a' => 0,
	'b' => 1,
	'c' => 2,
	'd' => 4,
	'e' => 8,
]);
$gen2 = arrayToGenerator([
	'a' => 0,
	'c' => 2,
	'b' => 1,
	'e' => 8,
]);
$iter = new \MultipleIterator(\MultipleIterator::MIT_NEED_ALL|\MultipleIterator::MIT_KEYS_ASSOC);
$iter->attachIterator($gen1, 0);
$iter->attachIterator($gen2, 1);
foreach ($iter as list($gen1Value, $gen2Value)) {
	list($gen1Key, $gen2Key) = $iter->key();
	var_dump($gen1Key, $gen2Key, $gen1Value, $gen2Value);
}

