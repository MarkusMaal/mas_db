<?php
	if(session_status()!=PHP_SESSION_ACTIVE) session_start();

?>
<?php include("lang.php");
	  $rec = ms(" record", " kirje");?>
<!DOCTYPE html>
<html lang="<?php echo ms("en", "et");?>">
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
	  <link rel="shortcut icon" type="image/svg" href="/favicons/mas_web.svg" />
		<title><?php echo ms("Markus' stuff versions", "Markuse asjade versioonid");?></title>
		<link rel="stylesheet" href="/mas_db/style.css"/>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

   <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
			<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
	</head>
	<body>
		<div class="navbar-fixed" style="height: 5.7em;">
			<nav>
			<div class="nav-wrapper blue lighten-2" style="height: 5.738em;">
			<a href="/mas_db" class="brand-logo"><img class="secondary-content" style="width: 50px; margin: 5px;" src="/mas_db/images/mas_web.svg"/></a>
						<a href="#" data-target="mobile-menu" class="sidenav-trigger" style="margin-top: 1.76em;">
                        <i class="large material-icons">menu</i>
                        </a>
      					<ul id="nav-mobile" class="right hide-on-med-and-down" style="padding-bottom: 2em;">
                            <li <?php echo (str_contains($_SERVER["REQUEST_URI"], "toq")?"class=\"active\"":""); ?>><a style="padding-top: 1.2em;" href="/mas_db/toq">Sisukord</a></li>
                            <li <?php echo (str_contains($_SERVER["REQUEST_URI"], "foss")?"class=\"active\"":""); ?>><a style="padding-top: 1.2em;" href="/mas_db/foss">Avatud kood</a></li>
							<li <?php echo (str_contains($_SERVER["REQUEST_URI"], "faq")?"class=\"active\"":""); ?>><a style="padding-top: 1.2em;" href="/mas_db/faq">Korduma kippuvad küsimused</a></li>
							<li <?php echo (str_contains($_SERVER["REQUEST_URI"], "specs")?"class=\"active\"":""); ?>><a style="padding-top: 1.2em;" href="/mas_db/specs">Spetsifikatsioonid</a></li>
							<li><a style="padding-top: 1.2em;" href="https://markuseasjad.blogspot.com">Ametlik ajaveeb</a></li>
							<li><a style="padding-top: 1.2em;" href="/">Välju</a></li>
						</ul>
		</div>
		</nav>
		</div>
			<ul class="sidenav" id="mobile-menu">
				<li <?php echo (str_contains($_SERVER["REQUEST_URI"], "toq")?"class=\"active\"":""); ?>><a href="/mas_db/toq">Sisukord</a></li>
                <li <?php echo (str_contains($_SERVER["REQUEST_URI"], "foss")?"class=\"active\"":""); ?>><a style="padding-top: 1.2em;" href="/mas_db/foss">Avatud kood</a></li>
				<li <?php echo (str_contains($_SERVER["REQUEST_URI"], "faq")?"class=\"active\"":""); ?>><a href="/mas_db/faq">Korduma kippuvad küsimused</a></li>
				<li <?php echo (str_contains($_SERVER["REQUEST_URI"], "specs")?"class=\"active\"":""); ?>><a href="/mas_db/specs">Spetsifikatsioonid</a></li>
				<li><a href="https://markuseasjad.blogspot.com">Ametlik ajaveeb</a></li>
				<li><a href="/">Välju</a></li>
			</ul>
			<script>
			  document.addEventListener('DOMContentLoaded', function() {
				var elems = document.querySelectorAll('.dropdown-trigger');
				var instances = M.Dropdown.init(elems, "alignment='bottom'");
			  });
			</script>
	<div class="container">
	<div class="pad">
