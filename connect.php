<?php
$whitelist = array(
    '127.0.0.1',
    '::1',
    'localhost'
);
$remote = !in_array($_SERVER['REMOTE_ADDR'], $whitelist);
$isSsl = false; 
$hacking_time = '<iframe width="560" height="315" src="https://www.youtube-nocookie.com/embed/pgl37R7hILE?autoplay=1&amp;showinfo=0&amp;loop=1&amp;start=2&amp;list=PL6WkVx7vhlogvj4kxSizthqQgxq3j0BmD&amp;rel=0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
if (isset($_SERVER['HTTP_CF_VISITOR'])) {
    $cfDecode = json_decode($_SERVER['HTTP_CF_VISITOR']);
    if (!empty($cfDecode) && !empty($cfDecode->scheme) && $cfDecode->scheme == 'https') {
        $isSsl = true;
    }
} else if (!empty($_SERVER["HTTPS"])) {
	$isSsl = true;
}
if ($isSsl || empty($_POST) || ($remote == false)) {
	ob_start();
//if ($isSsl || empty($_POST)) {
	if (empty($_SESSION["level"]) || ($_SESSION["level"] != "owner")) {
		foreach($_GET as $key => $value) {
		    if (str_contains($value, "<script>") || str_contains($value, "';") || str_contains($value, "\";")) {
		    	echo '<p>You are just a dirty hacker, aren\'t you?</p>';
				echo $hacking_time;
		    	die();
		    }
		}
		if (!empty($_POST)) {
			foreach($_POST as $key => $value) {
				if (str_contains($value, "<script>") || str_contains($value, "';") || str_contains($value, "\";")) {
		    		echo '<head><style>body { background: #000; color: #0f0; }</style></head><body><p>You are just a dirty hacker, aren\'t you?</p>';
					echo $hacking_time;
					echo '</body>';
					die();
				}
			}
		}
		if (!empty($_SESSION)) {
			foreach($_SESSION as $key => $value) {
				if (str_contains($value, "<script>") || str_contains($value, "';") || str_contains($value, "\";")) {
		    		echo '<p>You are just a dirty hacker, aren\'t you?</p>';
					echo $hacking_time;
					die();
				}
			}
		}
		if (!empty($_COOKIE)) {
			foreach($_COOKIE as $key => $value) {
				if (str_contains($value, "<script>") || str_contains($value, "';") || str_contains($value, "\";")) {
					echo '<p>You are just a dirty hacker, aren\'t you?</p>';
					echo $hacking_time;
					die();
				}
			}
		}
	}
	
	
	
	if ($remote == true) {
	$user    = "u712253692_user";
	$pass    = "GLQ2T?\c7>%uv?l8";
	$db_name = "u712253692_markustegelane";
	} else {
	$user    = "root";
	$pass    = "defPassWD345";
	$db_name = "mas_db";
	}
	$host    = "localhost";
	#$db_name = "id17352682_id14214583_asdf";
	error_reporting(0);
	//create connection
	$connection = mysqli_connect($host, $user, $pass, $db_name);
	$connection_error = 0;
	//test if connection failed
	if(mysqli_connect_errno()){
		$connection_error = 1;
	}
	error_reporting(E_ALL);
} else {
	$lang = "et-EE";
	if (!empty($_COOKIE["lang"])) {
		$lang = $_COOKIE["lang"];
	}
}
?>
