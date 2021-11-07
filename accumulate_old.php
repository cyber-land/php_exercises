<?php
enum Operation {
    case QUADRATO;
    case CUBO;
    case RADICE_QUADRATA;
    public static function make(String $string): Operation {
        $string = strtolower($string);
        return match ($string) {
            'quadrato' => Operation::QUADRATO,
            'cubo' => Operation::CUBO,
            'radice_quadrata' => Operation::RADICE_QUADRATA,
            default => Operation::QUADRATO
        };
    }
}

$list_numbers = $_POST['list_numbers'];
$operation = Operation::make($_POST['operation']);
//se true valutare i numeri in posizione pari
$selezione_pari = boolval($_POST['selezione_pari']);
//se true valutare i numeri in posizione dispari
$selezione_dispari = boolval($_POST['selezione_dispari']);

$list = array(); //lista numeri su cui operare
//inserire nella lista i nuemeri pari e/o quelli dispari
if ($selezione_pari)
    for($i = 0; $i < sizeof($list_numbers); $i+=2)
        array_push($list, $list_numbers[$i]);
if ($selezione_dispari)
    for($i = 1; $i < sizeof($list_numbers); $i+=2)
        array_push($list, $list_numbers[$i]);

//result
$result = match ($operation) {
    Operation::QUADRATO => array_map(
        function ($number) {
            return pow($number, 2);
        },$list),
    Operation::CUBO => array_map(
        function ($number) {
            return pow($number, 3);
        },$list),
    Operation::RADICE_QUADRATA => array_map(
        function ($number) {
            return sqrt($number);
        },$list)
};
