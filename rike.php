<?php

$db_host = 'localhost';
$db_navn = 'mag22071';
$db_bruker = 'mag22071';
$db_passord = 'mag2';
 
$db_forbindelse = mysqli_connect($db_host, $db_bruker, $db_passord, $db_navn);

function tell($søk, $db_forbindelse){ 
    $query = "SELECT COUNT(a.navn_norsk) AS Antall FROM ad_hierarki AS a 
    INNER JOIN ad_hierarki b ON b.kategori_id=a.parent
    WHERE b.navn_norsk='{$søk}';";
    $info = mysqli_query($db_forbindelse, $query);
    $antall = mysqli_fetch_row($info);
    return $antall[0];
}


function rike($info){
    $ut = "<div class='alt'>\n";
    while ($rad = mysqli_fetch_row($info)){
        foreach ($rad as $felt) {
        $felt = ucfirst($felt);
        $info2 = tell($felt, $GLOBALS['db_forbindelse']);
        $ut .= "<div class='w3-third w3-container'>\n";
        $ut .= "<div class=\"rundt\">\n";
        $ut .= "<a href=\"https://webkode.skit.no/~ole2602/html/Artsdatabase_test/rike.php?rike={$felt}\" class=\"linker\">\n";
        $ut .= "<p class=\"linker_p\">$felt</p>\n";
        $ut .= "<p class=\"antall\">$info2</p>\n";
        $ut .= "</a>\n";
        $ut .= "</div>\n";
        $ut .= "</div>\n";
        }
    }
    $ut .= "</div>\n";
    return $ut;
}


function rekke($info){
    $ut = "<div class='alt'>\n";
    while ($rad = mysqli_fetch_row($info)){
        foreach ($rad as $felt) {
        $felt = ucfirst($felt);
        $info2 = tell($felt, $GLOBALS['db_forbindelse']);
        $ut .= "<div class='w3-quarter w3-container'>\n";
        $ut .= "<a href=\"https://webkode.skit.no/~ole2602/html/Artsdatabase_test/rike.php?rekke={$felt}\" class=\"linker\">\n";
        $ut .= "<p class=\"linker_p\">$felt</p>\n";
        $ut .= "<p class=\"antall\">$info2</p>\n";
        $ut .= "</a>\n";
        $ut .= "</div>\n";
        }
    }
    $ut .= "</div>\n";
    return $ut;
}
function klasse($info){
    $ut = "<div class='alt'>\n";
    while ($rad = mysqli_fetch_row($info)){
        foreach ($rad as $felt) {
        $felt = ucfirst($felt);
        $info2 = tell($felt, $GLOBALS['db_forbindelse']);
        $ut .= "<div class='w3-quarter w3-container'>\n";
        $ut .= "<a href=\"https://webkode.skit.no/~ole2602/html/Artsdatabase_test/rike.php?klasse={$felt}\" class=\"linker\">\n";
        $ut .= "<p class=\"linker_p\">$felt</p>\n";
        $ut .= "<p class=\"antall\">$info2</p>\n";
        $ut .= "</a>\n";
        $ut .= "</div>\n";
        }
    }
    $ut .= "</div>\n";
    return $ut;
}
function orden($info){
    $ut = "<div class='alt'>\n";
    while ($rad = mysqli_fetch_row($info)){
        foreach ($rad as $felt) {
        $felt = ucfirst($felt);
        $info2 = tell($felt, $GLOBALS['db_forbindelse']);
        $ut .= "<div class='w3-quarter w3-container'>\n";
        $ut .= "<a href=\"https://webkode.skit.no/~ole2602/html/Artsdatabase_test/rike.php?orden={$felt}\" class=\"linker\">\n";
        $ut .= "<p class=\"linker_p\">$felt</p>\n";
        $ut .= "<p class=\"antall\">$info2</p>\n";
        $ut .= "</a>\n";
        $ut .= "</div>\n";
        }
    }
    $ut .= "</div>\n";
    return $ut;
}
function familie($info){
    $ut = "<div class='alt'>\n";
    while ($rad = mysqli_fetch_row($info)){
        foreach ($rad as $felt) {
        $felt = ucfirst($felt);
        $info2 = tell($felt, $GLOBALS['db_forbindelse']);
        $ut .= "<div class='w3-quarter w3-container'>\n";
        $ut .= "<a href=\"https://webkode.skit.no/~ole2602/html/Artsdatabase_test/rike.php?familie={$felt}\" class=\"linker\">\n";
        $ut .= "<p class=\"linker_p\">$felt</p>\n";
        $ut .= "<p class=\"antall\">$info2</p>\n";
        $ut .= "</a>\n";
        $ut .= "</div>\n";
        }
    }
    $ut .= "</div>\n";
    return $ut;
}
function slekt($info){
    $ut = "<div class='alt'>\n";
    while ($rad = mysqli_fetch_row($info)){
        foreach ($rad as $felt) {
        $felt = ucfirst($felt);
        $info2 = tell($felt, $GLOBALS['db_forbindelse']);
        $ut .= "<div class='w3-quarter w3-container'>\n";
        $ut .= "<a href=\"https://webkode.skit.no/~ole2602/html/Artsdatabase_test/rike.php?slekt={$felt}\" class=\"linker\">\n";
        $ut .= "<p class=\"linker_p\">$felt</p>\n";
        $ut .= "<p class=\"antall\">$info2</p>\n";
        $ut .= "</a>\n";
        $ut .= "</div>\n";
        }
    }
    $ut .= "</div>\n";
    return $ut;
}
function id($info){
    $ut = "<div class='alt'>\n";
    while ($rad = mysqli_fetch_row($info)){
        foreach ($rad as $felt) {
        $felt = ucfirst($felt);
        $ut .= "<div class='w3-third w3-container'>\n";
        $ut .= "<a href=\"https://webkode.skit.no/~ole2602/html/Artsdatabase_test/rike.php?id={$felt}\" class=\"linker\">\n";
        $ut .= "<p class=\"linker_p\">$felt</p>\n";
        $ut .= "</a>\n";
        $ut .= "</div>\n";
        }
    }
    $ut .= "</div>\n";
    return $ut;
}


function t_rike($info){
    $ut = "<div style=\"position:relative;\" class=\"w3-third\">\n";
    while($rad = mysqli_fetch_row($info)){
        foreach ($rad as $felt) {
        $felt = ucfirst($felt);
        $ut .= "<a href=\"https://webkode.skit.no/~ole2602/html/Artsdatabase_test/rike.php\" class=\"tilbake w3-container\">\n";
        $ut .= "<p class=\"tilbake_p w3-container\">Tilbake til {$felt}</p>\n";
        $ut .= "</a>\n";
        }
    } 
    $ut .= "</div>\n";
    return $ut;
} 


function t_rekke($info){
    $ut = "<div style=\"position:relative;\" class=\"w3-third\">\n";
    while($rad = mysqli_fetch_row($info)){
        foreach ($rad as $felt) {
        $felt = ucfirst($felt);
        $ut .= "<a href=\"https://webkode.skit.no/~ole2602/html/Artsdatabase_test/rike.php?rike={$felt}\" class=\"tilbake w3-container\">\n";
        $ut .= "<p class=\"tilbake_p w3-container\">Tilbake til {$felt}</p>\n";
        $ut .= "</a>\n";
        }
    } 
    $ut .= "</div>\n";
    return $ut;
} 


function t_klasse($info){
    $ut = "<div style=\"position:relative;\" class=\"w3-third\">";
    while ($rad = mysqli_fetch_row($info)){  
        foreach ($rad as $felt) {
        $felt = ucfirst($felt);
        $ut .= "<a href=\"https://webkode.skit.no/~ole2602/html/Artsdatabase_test/rike.php?rekke={$felt}\" class=\"tilbake w3-container\">\n";
        $ut .= "<p class=\"tilbake_p w3-container\">Tilbake til {$felt}</p>\n";
        $ut .= "</a>\n";
        }
$ut .= "</div>\n";

    }
    return $ut;
}


function t_orden($info){
    $ut = "<div style=\"position:relative;\" class=\"w3-third\">\n";
    while ($rad = mysqli_fetch_row($info)){
        foreach ($rad as $felt) {
        $felt = ucfirst($felt);
        $ut .= "<a href=\"https://webkode.skit.no/~ole2602/html/Artsdatabase_test/rike.php?klasse={$felt}\" class=\"tilbake w3-container\">\n";
        $ut .= "<p class=\"tilbake_p w3-container\">Tilbake til {$felt}</p>\n";
        $ut .= "</a>\n";
        }
    $ut .= "</div>\n";

    }
    return $ut;
}


function t_familie($info){
    $ut = "<div style=\"position:relative;\" class=\"w3-third\">";
    while ($rad = mysqli_fetch_row($info)){
        foreach ($rad as $felt) {
        $felt = ucfirst($felt);
        $ut .= "<a href=\"https://webkode.skit.no/~ole2602/html/Artsdatabase_test/rike.php?orden={$felt}\" class=\"tilbake w3-container\">\n";
        $ut .= "<p class=\"tilbake_p w3-container\">Tilbake til {$felt}</p>\n";
        $ut .= "</a>\n";
        $ut .= "</div>\n";
   
   $ut .= "</div>\n";
    }
    }
    return $ut;
}



function t_slekt($info){
    $ut = "<div style=\"position:relative;\" class=\"w3-third\">";
    while ($rad = mysqli_fetch_row($info)){
        foreach ($rad as $felt) {
        $felt = ucfirst($felt);
        $ut .= "<a href=\"https://webkode.skit.no/~ole2602/html/Artsdatabase_test/rike.php?familie={$felt}\" class=\"tilbake w3-container\">\n";
        $ut .= "<p class=\"tilbake_p w3-container\">Tilbake til {$felt}</p>\n";
        $ut .= "</a>\n";
        }
$ut .= "</div>";

    }
    return $ut;
}


function t_id($info){
    $ut = "<div style=\"position:relative;\" class=\"w3-third\">";
    while ($rad = mysqli_fetch_row($info)){
        foreach ($rad as $felt) {
        $felt = ucfirst($felt);
        $ut .= "<a href=\"https://webkode.skit.no/~ole2602/html/Artsdatabase_test/rike.php?slekt={$felt}\" class=\"tilbake_dyr w3-container\">\n";
        $ut .= "<p class=\"tilbake_p w3-container\">Tilbake til {$felt}</p>\n";
        $ut .= "</a>\n";
        }
$ut .= "</div>";

    }
    return $ut;
}


function hent_info_om_art($art, $db_forbindelse) {
    $query = "SELECT ad_hierarki.kategori_id, ad_hierarki.navn AS latinsk, ad_hierarki.navn_norsk AS art, ad_sider.info as informasjon, 
    ad_sider.info2 AS 'annen-info', ad_bilder.file_path AS Bilde, slekt.navn_norsk AS slekt, familie.navn_norsk AS familie, 
    orden.navn_norsk AS orden, klasse.navn_norsk AS klasse, rekke.navn_norsk AS rekke, rike.navn_norsk AS rike
    FROM ad_hierarki
    JOIN ad_sider ON ad_hierarki.kategori_id = ad_sider.kategori_id
    JOIN ad_bilder ON ad_hierarki.kategori_id = ad_bilder.kategori_id
    JOIN ad_hierarki slekt ON ad_hierarki.parent = slekt.kategori_id
    JOIN ad_hierarki familie ON slekt.parent = familie.kategori_id
    JOIN ad_hierarki orden ON familie.parent = orden.kategori_id
    JOIN ad_hierarki klasse ON orden.parent = klasse.kategori_id
    JOIN ad_hierarki rekke ON klasse.parent = rekke.kategori_id
    JOIN ad_hierarki rike ON rekke.parent = rike.kategori_id
    WHERE ad_hierarki.navn_norsk = '{$art}'";
return mysqli_query($db_forbindelse, $query);
}

$link = "";


$bio = array("rekke","klasse", "orden", "familie", "slekt", "id");

if (isset($_GET['id'])){
    $art = $_GET['id'];     
    function lag_side($info){
    $ut = "";
    while ($rad = mysqli_fetch_assoc($info)){
        $ut .= "<div class=\"informasjon_art w3-container\">\n";
        $ut .= "<div class=\"art w3-container w3-row\">\n";  
        $ut .= "<div class=\"navn w3-row\">\n";
        $ut .= "<h1 class=\"norsk_navn\">{$rad['art']}</h1>\n";
        $ut .= "<p class=\"latinsk_navn\">{$rad['latinsk']}</p>\n";
        $ut .= "</div>\n";
        $ut .= "<div class=\"informasjon w3-row\">\n";
        $ut .= "<p class=\"info w3-container\">{$rad['informasjon']}</p>\n";
        $ut .= "</div>\n";
        $ut .= "<div class=\"informasjon w3-row\">\n";
        $ut .= "<div class=\"w3-half\">\n";
        $ut .= "<p class=\"annen-info w3-container\">{$rad['annen-info']}</p>\n";
        $ut .= "<div class=\"biologisk_klassifikasjonw3-container\">\n";
        $ut .= "<dl>";
        $ut .= "<dt>Rike:</dt>\n";
        $ut .= "<dd>{$rad['rike']}</dd>\n";
        $ut .= "<dt>Rekke:</dt>\n"; 
        $ut .= "<dd>{$rad['rekke']}</dd>\n";
        $ut .= "<dt>Klasse:</dt>\n";
        $ut .= "<dd>{$rad['klasse']}</dd>\n";
        $ut .= "<dt>Orden:</dt>\n";
        $ut .= "<dd>{$rad['orden']}</dd>\n";
        $ut .= "<dt>Familie:</dt>\n";
        $ut .= "<dd>{$rad['familie']}</dd>\n";
        $ut .= "<dt>Slekt:</dt>\n";
        $ut .= "<dd>{$rad['slekt']}</dd>\n";
        $ut .= "<dt>Art:</dt>\n";
        $ut .= "<dd>{$rad['art']}</dd>\n";
        $ut .= "</dl>";
        $ut .= "</div>\n";
        $ut .= "</div>\n";
        $ut .= "<div class=\"w3-half\">\n";
        #if (file_exists("https://webkode.skit.no/~ole2602/html/Artsdatabase_test/bilder/" . $rad['bilde'])){
        $ut .= "<img src=\"{$rad['Bilde']}\" class=\"bilde\"\n";
       # }
        $ut .= "</div>\n";
        $ut .= "</div>\n";
        $ut .= "</div>\n";
        $ut .= "</div>\n";
        $ut .= "<div class=\"bunn\">\n";
        $ut .= "<h3>Info:</h3>";
        $ut .= "<p>Her skal det være info om siden vår, og litt linker.</p>";
        $ut .= "</div>\n";
        }
    return $ut;
    }
    $query = "SELECT a.navn_norsk FROM ad_hierarki AS a 
    INNER JOIN ad_hierarki b ON a.kategori_id=b.parent
    WHERE b.navn_norsk='{$art}' GROUP BY a.navn_norsk;";
    $infoen = mysqli_query($db_forbindelse, $query);
    $link = t_id($infoen);
    $infoen = hent_info_om_art($art, $db_forbindelse);
    $front_end = lag_side($infoen);

} elseif (isset($_GET){
    $c = array_keys($_GET);
    $b = array_diff($bio, $c);
    $a = $c[0]
    print($a);
    print($b);
    $art = "";
    $søk = $_GET[$a];
    $query = "SELECT a.navn_norsk FROM ad_hierarki AS a 
    INNER JOIN ad_hierarki b ON a.kategori_id=b.parent
    WHERE b.navn_norsk='{$søk}' GROUP BY a.navn_norsk;";
    $infoen = mysqli_query($db_forbindelse, $query);
    $link = t_{$a}($infoen);
    $query = "SELECT a.navn_norsk FROM ad_hierarki AS a 
    INNER JOIN ad_hierarki b ON b.kategori_id=a.parent
    WHERE b.navn_norsk='{$søk}' GROUP BY a.navn_norsk;";
    $info = mysqli_query($db_forbindelse, $query);
    if (mysqli_num_rows($info)){
        $front_end = $b[0]($info);
    } else {
        $front_end = "<p class=\"w3-container linker\">Ingen data</p>\n";
    }
 } else {
    $link = "";
    $art = "";
    $query = "SELECT navn_norsk FROM ad_hierarki WHERE parent='1' ORDER BY navn_norsk;";
    $rike =mysqli_query($db_forbindelse, $query);
    $front_end = rike($rike);
}


if (isset($_POST['dyr'])){
    $dyrnavn = $_POST['dyr'];
    $queryh1 = "SELECT navn_norsk FROM art_db WHERE navn_norsk LIKE '%{$dyrnavn}%' AND kategori_id = ANY (SELECT kategori_id FROM art_db_info);";
    $resultath1 = mysqli_query($db_forbindelse, $queryh1);
    $h1_text = mysqli_fetch_row($resultath1)[0];
    $querycount = "SELECT COUNT(navn_norsk) AS NavnDyr FROM art_db WHERE navn_norsk LIKE '%{$dyrnavn}%' AND kategori_id = ANY (SELECT kategori_id FROM art_db_info);";
    $resultatcount = mysqli_query($db_forbindelse, $querycount);
    $count = mysqli_fetch_row($resultatcount)[0];
    $mintekst = "";
    if ($result = mysqli_query($db_forbindelse, $queryh1)) {
        while ($row = mysqli_fetch_row($result)) {
            $mintekst .= "<div><a href='rike.php?id={$row[0]}'><h1>{$row[0]}</h1></a></div>\n";
        }
        mysqli_free_result($result);
    }
    if ($h1_text == ''){
        $h1_text = "<h1>Det finnes ikke noe resultater i databasen vår</h1>";
    } else {
        $h1_text = "";
    }
}

    $infoen = hent_info_om_art($art, $db_forbindelse);
    $tabell = mysqli_fetch_assoc($infoen);


?>
<!DOCTYPE html>
<html lang="en">
<head>  
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo ($tabell["art"]);?> - Database Klosterøya</title>
    <link rel="stylesheet" type="text/css" href="stil_til_rike.css">
</head>
<body>
    <div class="w3-row w3-container header">
        <div class="w3-third">
            <a href="https://webkode.skit.no/~and06011/artsdatabase/nettside.php">
            <h2>Artsdatabase 1.0</h2>
            </a>
        </div>
        <div class="w3-third">
            <div class="sokefelt">
                <form action="https://webkode.skit.no/~and06011/artsdatabase/nettside.php" method="post" class="form">
                    <input type="text" name="dyr" id="dyr" class="w3-input w3-border felt" placeholder="Søk" required>
                    <input type="submit" class="knapp" value="Søk etter dyr">
                </form>
            </div>
        </div> 
        <?php echo ($link); ?>
    </div>
    <?php
    echo ($front_end);

    ?>
</body>
</html>