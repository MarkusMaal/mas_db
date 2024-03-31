<?php
include($_SERVER["DOCUMENT_ROOT"]."/maintenance.php");
function ms($en, $et) {
	if (date("Y-m-d") == "2024-04-01") {
		return gibberish(strlen($en));
	}
	if ((!empty($_COOKIE["lang"])) && ($_COOKIE["lang"] == "et-EE")) {
		return $et;
	} else {
		return $en;
	}
}
function GetEnd($n) {
	$suf = mb_substr($n, -1);
	if ($suf == "1") {
		return "st";
	}
	else if ($suf == "2") {
		return "nd";
	}
	else if ($suf == "3") {
		return "rd";
	}
	else {
		return "th";
	}
}

function y() {
	if ((!empty($_COOKIE["lang"])) && ($_COOKIE["lang"] == "et-EE")) {
 		return "Jah";
 	} else {
 		return "Yes";
 	}
}
function n() {
	if ((!empty($_COOKIE["lang"])) && ($_COOKIE["lang"] == "et-EE")) {
 		return "Ei";
 	} else {
 		return "No";
 	}
}

function gibberish($length) {
	$charset = "abcdefghijklmnopqrstuvwxyz ";
	$out = "";
	for ($i = 0; $i < $length; $i++) {
		$out .= substr($charset, rand(0, strlen($charset) - 1), 1);
	}
	return $out;
}