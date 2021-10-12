
<?php

//step1 cURL - Session initialisieren
$curl = curl_init();

// Abhängig von der API, hier json
$headers = array(
    'Accept: application/json',
    'Content-Type: application/json',
);
$url = "https://api.genshin.dev?json";

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
echo "1 " . $array->types[0] . PHP_EOL;
echo "2 " . $array->types[1] . PHP_EOL;
echo "3 " . $array->types[8] . PHP_EOL;
print("\n");
$i = readline("Eingabe: ");
switch ($i) {
    case 1:
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
        break;
    case 2:
        $curl = curl_init();

        // Abhängig von der API, hier json
        $headers = array(
            'Accept: application/json',
            'Content-Type: application/json',
        );
        $url = "https://api.genshin.dev/characters?json";

        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

        //step3 cURL Session ausführen
        $result = curl_exec($curl);

        //step4 cURL Session schliessen
        curl_close($curl);
        $char = json_decode($result);
        for ($x = 0; $x != 43; $x++) {
            echo ($x . " " . $char[$x]);
            print("\n");
        }
        print("\n");
        $a = readline("Eingabe: ");
        $curl = curl_init();

        // Abhängig von der API, hier json
        $headers = array(
            'Accept: application/json',
            'Content-Type: application/json',
        );
        $url = "https://api.genshin.dev/characters/$char[$a]?json";

        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

        //step3 cURL Session ausführen
        $result = curl_exec($curl);

        //step4 cURL Session schliessen
        curl_close($curl);

        $info = json_decode($result);
        echo "Name: " . $info->name . PHP_EOL;
        echo "Nation: " . $info->nation . PHP_EOL;
        echo "Waffe: " . $info->weapon . PHP_EOL;
        echo "Göttliches Auge: Typ " . $info->vision . PHP_EOL;
        break;
    case 3:
        break;
    default:
        print("Das ist keine Auswahl");
        break;
}
