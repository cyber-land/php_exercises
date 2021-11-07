<?php
require 'vendor/autoload.php';
//use League\Plates\Engine;

$templates = new League\Plates\Engine('templates', 'phtml');

const SQUARE = 0;
const CUBE = 1;
const SQUARE_ROOT = 2;

function getOperator(string $string): int
{
    $string = strtolower($string);
    if ($string == 'square' || $string == 0)
        return SQUARE;
    elseif ($string == 'cube' || $string == 1)
        return CUBE;
    elseif ($string == 'square_root' || $string == 2)
        return SQUARE_ROOT;
    else
        return SQUARE;
}

$list_numbers = explode(',', preg_replace("/[^A-Za-z0-9,]/", '', $_POST['list_numbers']));
//controllo valori non validi
for ($i = 0; $i < count($list_numbers); $i++) {
    if (!is_numeric($list_numbers[$i])) {
        array_splice($list_numbers, $i, 1);
        $i--;
    }
}
$operation = getOperator($_POST['operation']);

//se true valuta i numeri in posizione pari
$selezione_pari = $_POST['selezione_pari'] != null;

//se true valuta i numeri in posizione dispari
$selezione_dispari = $_POST['selezione_dispari'] != null;

$list = array(); //lista numeri su cui operare

for ($i = 0; $i < count($list_numbers); $i++) {
    if ($i % 2 == 0 && $selezione_pari) {
        array_push($list, $list_numbers[$i]);
    } elseif ($i % 2 != 0 && $selezione_dispari) {
        array_push($list, $list_numbers[$i]);
    }
}

$result = array();

if ($operation == SQUARE) {
    $result = array_map(
        function ($number) {
            return pow($number, 2);
        }, $list);
} elseif ($operation == CUBE) {
    $result = array_map(
        function ($number) {
            return pow($number, 3);
        }, $list);
} elseif ($operation == SQUARE_ROOT) {
    $result = array_map(
        function ($number) {
            return sqrt($number);
        }, $list);
} else {
    echo 'panic unreachable';
}
//var_dump($result);
echo $templates->render('accumulate', [
    'list' => $list,
    'result' => $result,
    'operation' => $_POST['operation']
]);
