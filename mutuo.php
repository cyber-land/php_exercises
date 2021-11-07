<?php
    require 'vendor/autoload.php';
    use League\Plates\Engine;

    $templates = new League\Plates\Engine('templates', 'phtml');

    $capitale = $_POST['capitale'];
    $percentuale_interesse = $_POST['percentuale'];
    $durata_in_anni = $_POST['durata'];

    $quota_capitale = $capitale/$durata_in_anni;
    $rimanente = $capitale;
    $quote_interesse = array();

    for($i = 0; $i < $durata_in_anni; $i++) {
        array_push($quote_interesse,$rimanente * $percentuale_interesse / 100);
        $rimanente -= $quota_capitale;
    }

    $totale = $capitale;

    for($i = 0; $i < sizeof($quote_interesse); $i++)
        $totale += $quote_interesse[$i];

    $mutuo = $quota_capitale . " /\n";

    for($i = 0; $i < sizeof($quote_interesse); $i++)
        $mutuo .= $quote_interesse[$i] . "\n";

    $mutuo .= " / " . $totale;

    echo $templates -> render('mutuo', ['mutuo' => $mutuo]);
