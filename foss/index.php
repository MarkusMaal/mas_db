<?php include("../head.php");

function GenLink($link) {
    $source_links = [
        "mas-next" => "https://github.com/MarkusMaal/Markuse-asjad-next",
        "mas-legacy" => "https://github.com/MarkusMaal/Markuse-arvuti-asjad",
        "mas-juurariist" => "https://github.com/MarkusMaal/mas-juurariist",
        "mas-maia" => "https://github.com/MarkusMaal/mas_maia",
        "markustation" => "https://github.com/MarkusMaal/MarkuStation",
        "sharpnotepad" => "https://github.com/MarkusMaal/sharpNotepad",
        "mas-corefiles" => "https://github.com/MarkusMaal/mas-corefiles",
        "mas-kontroller" => "https://github.com/MarkusMaal/kontroller",
        "mas-virtualpc" => "https://github.com/MarkusMaal/Markuse-virtuaalarvuti-asjad",
        "mas-db" => "https://github.com/MarkusMaal/mas_db",
        "mas-shell" => "https://github.com/MarkusMaal/mas-shell",
        "startuploader" => "https://github.com/MarkusMaal/StartUpLoader",
        "windowedos" => "https://github.com/MarkusMaal/WindowedOS",
        "mas-ventoy" => "https://github.com/MarkusMaal/mas-ventoy-menu",
        "mas-yumi" => "https://github.com/MarkusMaal/mas-yumi-menu",
        "mas-gadgets" => "https://github.com/MarkusMaal/mas-gadgets-autorun",
        "mas-uniprog" => "https://github.com/MarkusMaal/mas-flash-uniprog",
        "virsh-attach" => "https://github.com/MarkusMaal/virsh_attach_usb",
        "fdpanel" => "https://github.com/MarkusMaal/fdpanel",
        "mas-flash" => "https://github.com/MarkusMaal/Markuse_m2lupulk",
    ];
    return "<a href='" . $source_links[$link] . "' target='_blank'>" . $source_links[$link] . "</a>";
}

?>
<h1><?php echo ms("Source code", "Lähtekood");?></h1>
<p>Siit leiate lingid avatud koodiga Markuse asjade komponentidele</p>
<h3>Markuse arvuti asjad</h3>
<ul>
    <li>Markuse asjad next: <?= GenLink("mas-next") ?></a></li>
    <li>Markuse arvuti asjad (põhifailid): <?= GenLink("mas-corefiles") ?></a></li>
    <li>Juurutamise tööriist: <?= GenLink("mas-juurariist") ?></a></li>
    <li>sharpNotepad: <?= GenLink("sharpnotepad") ?></a></li>
    <li>Markuse arvuti asjad (pärand): <?= GenLink("mas-legacy") ?></a></li>
    <li>MarkuStation (pärand): <?= GenLink("markustation") ?></a></li>
    <li>kontroller (pärand): <?= GenLink("mas-kontroller") ?> </li>
    <li>Lukustusekraan 2.0 (pärand):  <?= GenLink("mas-shell") ?></li>
    <li>Laadimisekraan (pärand):  <?= GenLink("startuploader") ?></li>
    <li>Windowed OS (pärand):  <?= GenLink("windowedos") ?></li>
</ul>
<h3>Markuse virtuaalarvuti asjad</h3>
<ul>
    <li>Markuse virtuaalarvuti asjad: <?= GenLink("mas-virtualpc") ?></li>
    <li>USB ühendamise/eemaldamise skript: <?= GenLink("virsh-attach") ?></li>
</ul>
<h3>Markuse asjade integratsioon arvutiga</h3>
<ul>
    <li>M.A.I.A. server: <?= GenLink("mas-maia") ?></li>
    <li>M.A.I.A. rakendus (klient): (privaatne)</li>
</ul>
<h3>Markuse mälupulk</h3>
<ul>
    <li>Mälupulga juhtpaneel 2.0: (privaatne)</li>
    <li>Ventoy menüü: <?= GenLink("mas-ventoy") ?></li>
    <li>Mälupulga juhtpaneel (JavaFX versioon): <?= GenLink("fdpanel") ?></li>
    <li>Mälupulga juhtpaneel 1.x (pärand): <?= GenLink("mas-flash") ?></li>
    <li>YUMI menüü (pärand): <?= GenLink("mas-yumi") ?></li>
    <li>Universaalprogramm (pärand): <?= GenLink("mas-uniprog") ?></li>
</ul>
<h3>Markuse vidinad/optilised andmekandjad</h3>
<ul>
    <li>Markuse vidinad autorun: <?= GenLink("mas-gadgets") ?></li>
</ul>
<h3>Veebitarkvara</h3>
<ul>
    <li>Markuse asjade versioonid: <?= GenLink("mas-db") ?></li>
</ul>
<?php include("../foot.php"); ?>