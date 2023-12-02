<?php

$digitNames = [
	'zero',
	'one',
	'two',
	'three',
	'four',
	'five',
	'six',
	'seven',
	'eight',
	'nine',
];

$numbers = array_merge($digitNames, range(0, 9));

function digits(string $digits): int
{
	global $numbers, $digitNames;

	$arr = [];

	foreach ($numbers as $num) {
		$loc = stripos($digits, $num);
		if ($loc !== false) {
			$arr[$loc] = in_array($num, $digitNames) ? array_search($num, $digitNames) : $num;
		}
		$last = strripos($digits, $num);
		if ($last !== false) {
			$arr[$last] = in_array($num, $digitNames) ? array_search($num, $digitNames) : $num;
		}
	}
	ksort($arr);
	reset($arr);
	return intval(current($arr) . end($arr));
}


$input = file('input');
if (is_array($input)) {
	$digits = array_map('digits', $input);
	print array_sum($digits) . "\n";	
}

