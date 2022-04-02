<?php

require_once('remove_accents.php');

function encode($input) {
	$code = array("sch" => "80",
				  "ver" => "89",
				  "ab" => "51",
				  "ag" => "52",
				  "am" => "53",
				  "au" => "54",
				  "be" => "56",
				  "ch" => "57",
				  "ck" => "58",
				  "de" => "60",
				  "fr" => "62",
				  "ge" => "64",
				  "kl" => "67",
				  "ma" => "70",
				  "mi" => "71",
				  "nd" => "72",
				  "ng" => "73",
				  "nt" => "74",
				  "qu" => "77",
				  "ra" => "79",
				  "sp" => "81",
				  "st" => "82",
				  "tr" => "84",
				  "tz" => "85",
				  "un" => "87",
				  "wa" => "91",
				  "wi" => "92",
				  "a" => "50",
				  "b" => "55",
				  "d" => "59",
				  "f" => "61",
				  "g" => "63",
				  "h" => "65",
				  "k" => "66",
				  "l" => "68",
				  "m" => "69",
				  "o" => "75",
				  "p" => "76",
				  "r" => "78",
				  "t" => "83",
				  "u" => "86",
				  "v" => "88",
				  "w" => "90",
				  "z" => "93",
				  "," => "97",
				  ";" => "97",
				  "e" => "1",
				  "n" => "2",
				  "i" => "3",
				  "s" => "4",
				  "ß" => "962",
				  "c" => "963",
				  "j" => "964",
				  "q" => "965",
				  "x" => "966",
				  "y" => "967",
				  "?" => "960",
				  "!" => "961");

	$input = remove_accents($input);
	$input = strtolower($input);
	// Move to remove_accents
	$input = str_replace("'", '', $input);
	$input = str_replace("-", '', $input);
	$input = str_replace(".", '', $input);
	$input = str_replace("Ø", 'o', $input);
	$input = str_replace("ø", 'o', $input);
	$input = str_replace("æ", 'ae', $input);
	$input = str_replace("Æ", 'ae', $input);
	$input = str_replace("Ð", 'D', $input);
	$input = str_replace("ð", 'd', $input);
	$input = preg_replace('/[^a-z]/', '', $input);
	$result = strtr($input, $code);
	return $result;
}

?>
