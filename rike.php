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


function t($info, $a, $b){
    if ($b == 1) {
        $tilbakenavn = "_dyr";
    }
    $ut = "<div style=\"position:relative;\" class=\"w3-third\">";
    while ($rad = mysqli_fetch_row($info)){
        foreach ($rad as $felt) {
        $felt = ucfirst($felt);
        $ut .= "<a href=\"https://webkode.skit.no/~ole2602/html/Artsdatabase_test/rike.php?{$a}={$felt}\" class=\"tilbake{$tilbakenavn} w3-container\">\n";
        $ut .= "<p class=\"tilbake_p w3-container\">Tilbake til {$felt}</p>\n";
        $ut .= "</a>\n";
        }
    $ut .= "</div>";
    return $ut;
}



function knapp($info, $a, $b){
    if ($b == 1) {
        $noe = "\$info2 = tell(\$felt, \$GLOBALS['db_forbindelse']);\n";
        $noe2 = "\$ut .= \"<p class=\"antall\">\$info2</p>\";\n";
    } else {
        $noe = "";
        $noe2 = "";
    }
    $ut = "<div class='alt'>\n";
    while ($rad = mysqli_fetch_row($info)){
        foreach ($rad as $felt) {
        $felt = ucfirst($felt);
        $noe;
        $ut .= "<div class='w3-third w3-container'>\n";
        $ut .= "<div class=\"rundt\">\n";
        $ut .= "<a href=\"https://webkode.skit.no/~ole2602/html/Artsdatabase_test/rike.php?{$a}={$felt}\" class=\"linker\">\n";
        $ut .= "<p class=\"linker_p\">$felt</p>\n";
        $noe2;
        $ut .= "</a>\n";
        $ut .= "</div>\n";
        $ut .= "</div>\n";
        }
    }
    $ut .= "</div>\n";
    return $ut;
}


function biologisk($a, $b, $c){
    $query = "SELECT a.navn_norsk FROM ad_hierarki AS a 
        INNER JOIN ad_hierarki b ON a.kategori_id=b.parent
        WHERE b.navn_norsk='{$_GET[$a]}' GROUP BY a.navn_norsk;";
    $infoen = mysqli_query($db_forbindelse, $query);
    $link = t($infoen, $a, $b);
    $query = "SELECT a.navn_norsk FROM ad_hierarki AS a 
    INNER JOIN ad_hierarki b ON b.kategori_id=a.parent
    WHERE b.navn_norsk='{\$søk}' GROUP BY a.navn_norsk;";
    $info = mysqli_query($db_forbindelse, $query);
    if (mysqli_num_rows(\$info)){\n
        \$front_end = knapp(\$info, $a, $c);
    } else {\n
       \$front_end = \"<p class=\"w3-container linker\">Ingen data</p>\";
    }\n
    //     $ut =  "elseif (isset(\$_GET['$a'])){\n
    //     \$art = \"\";\n
    //     \$søk = \$_GET['$a'];\n
    //     \$query = \"SELECT a.navn_norsk FROM ad_hierarki AS a \n
    //     INNER JOIN ad_hierarki b ON a.kategori_id=b.parent\n
    //     WHERE b.navn_norsk='{\$søk}' GROUP BY a.navn_norsk;\";\n
    //     \$infoen = mysqli_query(\$db_forbindelse, \$query);\n
    //     \$link = t(\$infoen, $a, $b);\n
    //     \$query = \"SELECT a.navn_norsk FROM ad_hierarki AS a \n
    //     INNER JOIN ad_hierarki b ON b.kategori_id=a.parent\n
    //     WHERE b.navn_norsk='{\$søk}' GROUP BY a.navn_norsk;\";\n
    //     \$info = mysqli_query(\$db_forbindelse, \$query);\n
    //     if (mysqli_num_rows(\$info)){\n
    //         \$front_end = knapp(\$info, $a, $c);
    //     } else {\n
    //        \$front_end = \"<p class=\"w3-container linker\">Ingen data</p>\";
    //     }\n
    // }";
    return eval($ut);
}
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

}
biologisk("rike", 0, 0);
biologisk("rike", 0, 0);


biologisk("rekke", 0, 0);

biologisk("klasse", 0, 0);

biologisk("orden", 0, 0);

biologisk("familie", 0, 0);

biologisk("slekt", 1, 1);
 else {
    $link = "";
    $art = "";
    $query = "SELECT navn_norsk FROM ad_hierarki WHERE parent='1' ORDER BY navn_norsk;";
    $rike =mysqli_query($db_forbindelse, $query);
    $front_end = rike($rike);
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

if (isset($_GET['id'])){
    $art = $_GET['id'];     
    $query = "SELECT a.navn_norsk FROM ad_hierarki AS a 
    INNER JOIN ad_hierarki b ON a.kategori_id=b.parent
    WHERE b.navn_norsk='{$art}' GROUP BY a.navn_norsk;";
    $infoen = mysqli_query($db_forbindelse, $query);
    $link = t_id($infoen);
    $infoen = hent_info_om_art($art, $db_forbindelse);
    $front_end = lag_side($infoen);

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