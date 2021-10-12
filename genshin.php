
<?php


//step1 cURL - Session initialisieren
$curl = curl_init();

// Abhängig von der API, hier json
$headers = array(
    'Accept: application/json',
    'Content-Type: application/json',
);
$url = "https://api.genshin.dev/characters/Bennett?json";

curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

//step3 cURL Session ausführen
$result = curl_exec($curl);

//step4 cURL Session schliessen
curl_close($curl);

//step5 Ausgabe Ergebniss
$array = json_decode($result);
// print_r($array);
echo $array->name . PHP_EOL;
echo $array->weapon . PHP_EOL;
for ($i = 0; $i < count($array->skillTalents); $i++) {
    echo $array->skillTalents[$i]->name . PHP_EOL;
}

$curl = curl_init();

$headers = array(
    'Accept: application/json',
    'Content-Type: application/json',
);

$url = "https://api.genshin.dev/artifacts?json";

curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$result = curl_exec($curl);
curl_close($curl);
$artifacts = json_decode($result);

for ($set = 0; $set != 30; $set++) {
    echo ($set . " " . $artifacts[$set]);
    print("\n");
}

$input = readline("Eingabe: ");



//Artifacts Info

$curl = curl_init();

$headers = array(
    'Accept: application/json',
    'Content-Type: application/json',
);

$url = "https://api.genshin.dev/artifacts/$artifacts[$input]?json";

curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$result = curl_exec($curl);

curl_close($curl);

$arInfo = json_decode($result);

echo $arInfo->name . PHP_EOL;
echo $arInfo->max_rarity . PHP_EOL;
$twopiece = "2-piece_bonus";
$fourpiece = "4-piece_bonus";
echo $arInfo->$twopiece . PHP_EOL;
echo $arInfo->$fourpiece . PHP_EOL;


/*
Nummer 10, komisches Leaked Artefakt, keine Einträge vorhanden
Number 20

*/
