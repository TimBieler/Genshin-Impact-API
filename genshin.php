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

        $arError = "Artefakt aus der API nicht gefunden, aber schriftlich verfügbar\n";
        $rare4 = "Maximale Seltenheit : 4\n";
        $two = "2-piece_bonus";
        $four = "4-piece_bonus";

        if ($input == 10) {
            echo "\n\n";
            echo $arError;
            echo "\nGlacier and Snowfield\n";
            echo "Ein Artefakt, dass erst in der Beta existiert\n";
            echo "Maximale Seltenheit : 5\n";
            echo "Bonus bei 2 Stück : unbekannt\n";
            echo "Bonus bei 4 Stück : unbekannt";
        } elseif ($input == 20) {
            echo "\n\n";
            echo $arError;
            echo "\nPrayers For Destiny\n";
            echo $rare4;
            echo "Bonus bei 1 Stück : Affected by Hydro for 40% less time\n";
        } elseif ($input == 21) {
            echo "\n\n";
            echo $arError;
            echo "\nPrayers For Illumination\n";
            echo $rare4;
            echo "Bonus bei 1 Stück : Affected by Pyro for 40% less time\n";
        } elseif ($input == 22) {
            echo "\n\n";
            echo $arError;
            echo "\nPrayers For Wisdom\n";
            echo $rare4;
            echo "Bonus bei 1 Stück : Affected by Electro for 40% less time.\n";
        } elseif ($input == 23) {
            echo "\n\n";
            echo $arError;
            echo "\nPrayers For Springtime\n";
            echo $rare4;
            echo "Bonus bei 1 Stück : Affected by Cryo for 40% less time\n";
        } elseif ($input == 24) {
            echo "\n\n";
            echo $arError;
            echo "\nPrayers For The Firmament\n";
            echo "Ein Artefakt, dass in der Beta existierte, heute aber nicht mehr\n";
            echo $rare4;
            echo "Bonus bei 1 Stück : Affected by Anemo for 40% less time\n";
        } else {
            echo $arInfo->name. PHP_EOL;
            echo "Maximale Seltenheit : ", $arInfo->max_rarity;
            echo "\n";
            echo "Bonus bei 2 Stück : ", $arInfo->$two;
            echo "\n";
            echo "Bonus bei 4 Stück : ", $arInfo->$four;
        }
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
