<?php
$build = "___0002";
$prefix_exception = [
    "Sinililla" => "L",
    "Klaas" => "KL",
    "Hüperkiirendus" => "HK",
    "Kivid" => "KD",
    "Versioonid" => "VS",
    "Lumehelbed/Jõulud 2015" => "LH",
    "Lumemaja" => "LM",
    "Lumemäed" => "LMD",
    "98. Eesti Vabariigi aastapäev" => "EV",
    "Disko R2" => "D2",
    "Kevad" => "KE",
    "Jaanid 2016" => "JKT",
    "Lihtne" => "LI",
    "Lumehelves" => "H",
    "Heksa" => "HE",
    "EV99" => "EV",
    "EV100" => "EV",
    "EV101" => "EV",
    "EV102" => "EV",
    "Suvi" => "SU",
    "Tetra" => "TE",
    "Lumepall" => "LP",
    "Tehnoloogia" => "TH",
    "Tuulelohe" => "TL",
    "Neoon" => "NE",
    "Kakskümmend" => "KK",
    "Sümmeetria" => "SM",
    "Element" => "EL",
    "Spektra" => "SP",
];
if (!isset($_GET["wallpaper"])) {
    header('Content-Type: application/json; charset=utf-8');
}
include_once("connect.php");
if (isset($_GET["latest_version"])) {
    $version_info_query = "SELECT * FROM mas_db WHERE MINI = 0 ORDER BY VERSIOON DESC LIMIT 1";
}
else if (isset($_GET["version_id"])) {
    $version_info_query = "SELECT * FROM mas_db WHERE ID = {$_GET['version_id']} LIMIT 1";
}
else if (isset($_GET["all_versions"])) {
    $version_info_query = "SELECT * FROM mas_db";
}
else if (isset($_GET["all_wallpapers"])) {
    $version_info_query = "SELECT * FROM mas_wallpapers";
}
else {
    http_response_code(400);
    echo json_encode(["MESSAGE" => "400 Bad Request"], JSON_PRETTY_PRINT);
}
$result = mysqli_query($connection, $version_info_query);
if (!isset($_GET["all_versions"]) && !isset($_GET["all_wallpapers"])) {
    $version_info = mysqli_fetch_assoc($result);
    $wallpapers_query = "SELECT * FROM mas_wallpapers WHERE VERSIOONI_ID = {$version_info['ID']}";
    $wallpaper_result = mysqli_query($connection, $wallpapers_query);
    $wallpapers = array();
    while ($row = mysqli_fetch_assoc($wallpaper_result)) {
        $wallpapers[] = $row;
    }
    if (isset($_GET["edition_info"])) {
        $build = substr($version_info["NIMI"], 0, 1) . (str_replace(".", "", $version_info["VERSIOON"]) + 1) . substr($build, 3);
        foreach ($prefix_exception as $key => $value) {
            if ($key == $version_info["NIMI"]) {
                $build = $value . substr($build, 1);
            }
        }
        $suff = "." . substr($build, 3, 1);
        if ($suff == ".0") {
            $suff = "";
        }
        echo json_encode([
            "VERSION" => $version_info["VERSIOON"] . $suff,
            "BUILD" => $build,
            "PIN" => rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9),
            "NAME" => $version_info["NIMI"],
        ], JSON_PRETTY_PRINT);
        exit();
    }
    if (isset($_GET["wallpaper"])) {
        if (count($wallpapers) == 0) {
            header('Content-Type: application/json; charset=utf-8');
            http_response_code(404);
            echo json_encode(["MESSAGE" => "404 Not Found"]);
            exit();
        }
        $imgpath = $_SERVER["DOCUMENT_ROOT"] . "/mas_db/images/" . $wallpapers[(!empty($_GET["wallpaper"])?$_GET["wallpaper"]:0)]["ASUKOHT"];
        if (!file_exists($imgpath) || ($imgpath == $_SERVER["DOCUMENT_ROOT"] . "/mas_db/images/")) {
            header('Content-Type: application/json; charset=utf-8');
            http_response_code(404);
            echo json_encode(["MESSAGE" => "404 Not Found"]);
            exit();
        }
        $imginfo = getimagesize($imgpath);
        header("Content-type: {$imginfo['mime']}");
        echo file_get_contents($imgpath);
        exit();
    }
    echo json_encode(["VERSION_META" => $version_info, "WALLPAPERS" => $wallpapers], JSON_PRETTY_PRINT);
} else {
    $versions = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $versions[] = $row;
    }
    echo json_encode($versions, JSON_PRETTY_PRINT);
}