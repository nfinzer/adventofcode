<?php

function digits(string $digits): int
{
	$digits = preg_filter('/\D/', '', $digits);
	$i = substr($digits, 0, 1);
	$x = substr($digits, -1);
	return intval("{$i}{$x}");
}

$input = file('input');
if (is_array($input)) {
	$digits = array_map('digits', $input);
	print array_sum($digits);	
}
