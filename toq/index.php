<?php include("../head.php") ?>
		<?php
		include($_SERVER["DOCUMENT_ROOT"] . "/mas_db/connect.php");
		//test if connection failed
		if(mysqli_connect_errno()){
    		die("connection failed: "
        		. mysqli_connect_error()
        		. " (" . mysqli_connect_errno()
        		. ")");
		}
		
		$id = 0;
		if (!empty($_GET["id"])) {
			$id = $_GET["id"];
		}
		$y = 0;
		if (!empty($_GET["year"])) {
			$y = $_GET["year"];
		}
		if ($y != 0) {
			if ($y != 1) {
				$query = 'SELECT * FROM mas_db WHERE AASTA=' . $y;
				echo '<h2>Aasta ' . $y . '</h2>';
			} else {
				$query = 'SELECT * FROM mas_db';
				echo '<h2>Kõik versioonid</h2>';
			}
			$result = mysqli_query($connection, $query);
			while ($row = mysqli_fetch_array($result)) {
				$id = $row[0];
				$ver = $row[1];
				$ver_l = $row[2];
				$year = $row[3];
				$name = $row[4];
				$descript = $row[5];
				$mini = $row[6];

				if (date("Y-m-d") == "2024-04-01") {
					$name = gibberish(strlen($name));
					$descript = gibberish(strlen($descript));
				}
				$paper_query = "SELECT DISTINCT * FROM mas_wallpapers LEFT JOIN mas_db ON mas_wallpapers.VERSIOONI_ID WHERE mas_wallpapers.VERSIOONI_ID = " . $id . ";";
				$result2 = mysqli_query($connection, $paper_query);
				echo '<hr/>';
				$last = null;
				$beenhere = array();
				while ($cols = mysqli_fetch_array($result2)) {
					$wallpaper_location = $cols[1];
					if (!in_array($wallpaper_location, $beenhere)) {
                        $wid = $cols[0];
                        if ($wallpaper_location != $last)
                        {
                            echo '<a href="#/" ' . 'onclick="Zoom' . $wid . '();"'  .  '><img id="img' . $wid . '" src="../images/' . $wallpaper_location . '"/></a>';
                            $last = $wallpaper_location;
                        }
                        echo '<script>
                                function Zoom' . $wid .'() {
                                    var image = document.getElementById("img' . $wid . '");
                                    if (image.style.height == "auto")
                                    {
                                        image.style.height = "250px";
                                    }
                                    else {
                                        image.style.height = "auto";
                                    }
                                }
                            </script>';
                        array_push($beenhere, $wallpaper_location);
                    }
				}
				echo '<a href="index.php?id=' . $id . '"><h2>' . $name . '</h2></a>';
				if ($mini == "1") {
					echo '<p>(Miniversioon)</p>';
				}
				if ($ver != $ver_l) {
					echo '<p>Versioon ' . $ver . ' - ' . $ver_l . '</p>';
				} else {
					echo '<p>Versioon ' . $ver . '</p>';
				}
				echo '<p>' . nl2br($descript) . '</p>';
				echo '<p> &copy; ' . $year . ' Markuse asjad</p>';
			}
			echo '<hr/>';
			echo '
				  <div style="text-align: center;">
				  <a class="waves-effect waves-light btn deep-purple lighten-2" href="index.php">Sisukord</a>&nbsp;&nbsp;
				  ';
			echo '<a class="waves-effect waves-light btn deep-purple lighten-2" href="#">Tagasi algusesse</a>
				  </div>';
		}
		else if ($id != 0) {
			$counter = "SELECT * FROM mas_db";
			$cq = mysqli_query($connection, $counter);
			$records = 0;
			while ($row = mysqli_fetch_array($cq)) {
				$records = $row[0];
			}
			$paper_query = "SELECT DISTINCT ASUKOHT FROM mas_wallpapers LEFT JOIN mas_db ON mas_wallpapers.VERSIOONI_ID WHERE mas_wallpapers.VERSIOONI_ID = " . $id . ";";
			$result = mysqli_query($connection, $paper_query);
			while ($row = mysqli_fetch_array($result)) {
				$wallpaper_location = $row[0];
                echo '<a href="../images/' . $wallpaper_location .  '"><img src="../images/' . $wallpaper_location . '"/></a>';
			}
			
			$query = "SELECT VERSIOON, LVERSIOON, AASTA, NIMI, KIRJELDUS, MINI FROM mas_db WHERE ID=" . $id;
			$result = mysqli_query($connection, $query);
			$prev = !empty($_GET["prev"]);
			if ($result->num_rows == 0) {
				if ($prev) {
					header("Location: index.php?id=" . ($_GET["id"] - 1) . "&prev=1", true);
				} else {
					header("Location: index.php?id=" . ($_GET["id"] + 1) , true);
				}
			}
			while ($row = mysqli_fetch_array($result)) {

				if (date("Y-m-d") == "2024-04-01") {
					$row[3] = ucfirst(gibberish(strlen($row[3])));
					$row[4] = ucfirst(gibberish(strlen($row[4])));
				}
				echo '<h2>' . $row[3] . '</h2>';
				if ($row[5] == "1") {
					echo '<p>(Miniversioon)</p>';
				}
				if ($row[0] != $row[1]) {
					echo '<p>Versioon ' . $row[0] . ' - ' . $row[1] . '</p>';
				} else {
					echo '<p>Versioon ' . $row[0] . '</p>';
				}
				echo '<p>' . nl2br($row[4]) . '</p>';
				echo '<p> &copy; ' . $row[2] . ' Markuse asjad</p>';
			}
			$prev = $id - 1;
			$next = $id + 1;
			if ($id > 1) {
				echo '<a class="waves-effect waves-light btn deep-purple lighten-2" href="index.php?id=1">&lt;&lt; Esimene</a>&nbsp;&nbsp;';
				echo '<a class="waves-effect waves-light btn deep-purple lighten-2" href="index.php?id=' . $prev . '&prev=1">&lt; Eelmine</a>&nbsp;&nbsp;';
			}
			if ($id < $records) {
				echo '<a class="waves-effect waves-light btn deep-purple lighten-2" href="index.php?id=' . $next . '">Järgmine &gt;</a>&nbsp;&nbsp;';
				echo '<a class="waves-effect waves-light btn deep-purple lighten-2" href="index.php?id=' . $records . '">Viimane &gt;&gt;</a>';
			}
			echo '<hr>
				  <div style="text-align: center;">';
			echo '<a class="waves-effect waves-light btn deep-purple lighten-2" href="index.php?year=1">Kõik versioonid</a>&nbsp;&nbsp;';
			echo '<a class="waves-effect waves-light btn deep-purple lighten-2" href="index.php">Sisukord</a>';
			echo '</div>';
		} else {
			$counter = "SELECT * FROM mas_db";
			$results = mysqli_query($connection, $counter);
			$mas_versions = array();
			while ($row = mysqli_fetch_array($results)) {
				$mas_versions[] = $row;
			}
			echo '<h1>Sisukord</h1>';
			echo '<a class="waves-effect waves-light btn deep-purple lighten-2" href="index.php?year=1">Kuva kõik versioonid</a>&nbsp;&nbsp;';
			echo '<a class="dropdown-trigger waves-effect waves-light btn deep-purple lighten-2" data-target="years" href="#/">Aasta</a><br><br>';
			$yr = mysqli_query($connection, "SELECT DISTINCT AASTA FROM mas_db");
			echo '<ul id="years" class="dropdown-content">';
			while ($row = mysqli_fetch_array($yr)) {
				$year = $row["AASTA"];
				echo '<li><a class="purple-text" href="index.php?year=' . $year . '">' . $year . '</a></li>';
			}
			echo '</ul>';
			$current = 1;
			echo '<ul class="collection">';
			foreach ($mas_versions as $row) {
				$mini = $row[6];
				$suffix = "";
				if ($mini == "1") {
					$suffix = " [M]";	
				}
				if (date("Y-m-d") == "2024-04-01") {
					$row[4] = ucfirst(gibberish(strlen($row[4])));
				}
				echo '<a style="color: #77b;" class="collection-item" href="index.php?id=' . $row[0] . '">' . $row[1] . "&nbsp;-&nbsp;" . $row[2] . " " . $row[4]  . $suffix .  '<span style="color: #77b;" class="secondary-content">' . $row["AASTA"] . '</span></a>';
				$current++;
			}
			echo '</ul>';
		}
		?>

<?php include("../foot.php"); ?>
