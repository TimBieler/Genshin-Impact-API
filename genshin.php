
<?php
//Chinesische Republikaner
function loadData($url)
{
    $curl = curl_init();

    $headers = array(
        'Accept: application/json',
        'Content-Type: application/json',
    );

    $url = $url;

    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

    $result = curl_exec($curl);
    curl_close($curl);
    return $result;
}

$result = loadData("https://api.genshin.dev?json");

$array = json_decode($result);
// print_r($array);
echo "1 " . $array->types[0] . PHP_EOL;
echo "2 " . $array->types[1] . PHP_EOL;
echo "5 " . $array->types[4] . PHP_EOL;
echo "9 " . $array->types[8] . PHP_EOL;
print("\n");
$i = readline("Eingabe: ");
switch ($i) {
    case 1:
        $result = loadData("https://api.genshin.dev/artifacts?json");

        $artifacts = json_decode($result);

        for ($set = 0; $set != 37; $set++) {
            echo ($set . " " . $artifacts[$set]);
            print("\n");
        }

        $input = readline("Eingabe: ");

        if ($input > 36) {
            print("Das ist keine Auswahl\n");
            exit;
        }
        $result = loadData("https://api.genshin.dev/artifacts/$artifacts[$input]?json");

        $arInfo = json_decode($result);

        $arError = "Artefakt aus der API nicht gefunden, aber schriftlich verfügbar\n";
        $rare4 = "Maximale Seltenheit : 4\n";
        $two = "2-piece_bonus";
        $four = "4-piece_bonus";

        $arrnam = array("Prayers For Destiny", "Prayers For Illumination", "Prayers For Wisdom", "Prayers For Springtime
        ", "Prayers For The Firmament\nEin Artefakt, dass in der Beta existierte, heute aber nicht mehr");
        $arrbon = array("Hydro", "Pyro", "Electro", "Cryo", "Anemo");
        $arrcou = $input - 20;

        if ($input == 10) {
            echo "\n\n";
            echo $arError;
            echo "\nGlacier and Snowfield\n";
            echo "Ein Artefakt, dass erst in der Beta existiert\n";
            echo "Maximale Seltenheit : 5\n";
            echo "Bonus bei 2 Stück : unbekannt\n";
            echo "Bonus bei 4 Stück : unbekannt";
        } elseif ($input > 19 && $input < 25) {
            echo "\n\n";
            echo $arError;
            echo "\n$arrnam[$arrcou]\n";
            echo $rare4;
            echo "Bonus bei 1 Stück: Affected by $arrbon[$arrcou] for 40% less time\n";
        } else {
            echo $arInfo->name . PHP_EOL;
            echo "Maximale Seltenheit : ", $arInfo->max_rarity;
            echo "\n";
            echo "Bonus bei 2 Stück : ", $arInfo->$two;
            echo "\n";
            echo "Bonus bei 4 Stück : ", $arInfo->$four;
            echo "\n";
        }
        break;
    case 2:
        $result = loadData("https://api.genshin.dev/characters?json");

        $char = json_decode($result, true);
        for ($x = 0; $x != 43; $x++) {
            echo ($x . " " . $char[$x]);
            print("\n");
        }
        print("\n");
        $a = readline("Eingabe: ");
        $curl = curl_init();

        if ($a > -1 && $a < 43) {
            $result = loadData("https://api.genshin.dev/characters/$char[$a]?json");
        } else {
            print("Das ist kein Mögliche Auswahl\n");
            exit;
        }
        $info = json_decode($result);
        echo "Name: " . $info->name . PHP_EOL;
        echo "Nation: " . $info->nation . PHP_EOL;
        echo "Waffe: " . $info->reactions . PHP_EOL;
        echo "Göttliches Auge: Typ " . $info->vision . PHP_EOL;
        break;
    case 3:
        break;
    case 4:
        break;
    case 5:
        //ELEMENTS---------------------------------
        $result = loadData("https://api.genshin.dev/elements?json");

        $elements = json_decode($result, true);
        for ($x = 0; $x != 7; $x++) {
            echo ($x . " " . $elements[$x]);
            print("\n");
        }

        $input = readline("\nEingabe: ");

        $result = loadData("https://api.genshin.dev/elements/$elements[$input]?json");

        $effect = json_decode($result);

        echo "\nName: ", $effect->name . PHP_EOL;
        if ($input == 1 || $input == 3 || $input == 5) {
            for ($w = 0; $w < 3; $w++){
                echo "\nEffekt: ", $effect->reactions[$w]->name . PHP_EOL;
                echo "Reaktion mit: ", $effect->reactions[$w]->elements[0] . PHP_EOL;
                echo $effect->reactions[$w]->description . PHP_EOL;
                echo "\n";
            }
        } elseif ($input == 6) {
            for ($w = 0; $w < 4; $w++){
                echo "Effekt: ", $effect->reactions[$w]->name . PHP_EOL;
                echo "Reaktion mit: ", $effect->reactions[$w]->elements[0] . PHP_EOL;
                echo $effect->reactions[$w]->description . PHP_EOL;
                echo "\n";
            }
        } elseif ($input == 0 || $input == 4) {
            for ($w = 0; $w < 4; $w++){
                echo "Effekt: ", $effect->reactions[0]->name . PHP_EOL;
                echo "Reaktion mit: ", $effect->reactions[0]->elements[$w] . PHP_EOL;
                echo $effect->reactions[0]->description . PHP_EOL;
                echo "\n";
            }
        } elseif ($input == 2) {
            for ($w = 0; $w < 1; $w++){
                echo "Effekt: ", $effect->reactions[0]->name . PHP_EOL;
                echo "Reaktion mit: ", $effect->reactions[0]->elements[$w] . PHP_EOL;
                echo $effect->reactions[0]->description . PHP_EOL;
                echo "\n";
            }
        } else {
            print("Das ist keine Auswahl!");
        }
        break;
    case 6:
        break;
    case 7:
        break;
    case 8:
        break;
    case 9:
        $result = loadData("https://api.genshin.dev/weapons?json");
        $weapon = json_decode($result, true);
        for ($c = 0; $c != 124; $c++) {
            echo ($c . " " . $weapon[$c]);
            print("\n");
        }
        print("\n\n");
        $putwea = readline("Eingabe: ");
        if ($putwea > -1 && $putwea < 124) {
            $result = loadData("https://api.genshin.dev/weapons/$weapon[$putwea]?json");
        } else {
            print("Keine Mögliche Auswahl\n");
            exit;
        }
        $weapstat = json_decode($result);

        print("\n\n");
        echo "Name: ", $weapstat->name . "\n";
        echo "Typ: ", $weapstat->type . "\n";
        echo "Seltenheit: ", $weapstat->rarity . " Sterne\n";
        echo "Standard Schaden: ", $weapstat->baseAttack . "\n";
        echo "Substat: ", $weapstat->subStat . "\n";
        echo "Fähigkeit: ", $weapstat->passiveDesc . "\n";
        break;
    default:
        print("Das ist keine Auswahl\n");
        break;
}
