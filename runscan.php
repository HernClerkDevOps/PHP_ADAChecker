<?php

$var_api_uri = "https://achecker.ca/checkacc.php";
$var_id = "750edf1787d35fc7299b6464a14855959bccb7d8";
$var_uri_file = 'uris.csv';

include('inc/functions.php');

// Open the file
$fp = @fopen($var_uri_file, 'r');

// Add each line to an array
if ($fp) {
    $array = explode("\n", file_get_contents($var_uri_file));
}

foreach ($array as $uri) {
    $uri=trim($uri);
    //echo $uri . PHP_EOL;
    print_r($var_api_uri . "?uri=" . $uri . "&id=" . $var_id . PHP_EOL);
    $html = file_get_contents_curl($uri);
    $title =  get_title($html) . PHP_EOL;
    $response = file_get_contents($var_api_uri . "?uri=" . $uri . "&id=" . $var_id);
    $put = file_put_contents("Results/".trim(mb_ereg_replace("([^\w\s\d\-_~,;\[\]\(\).])", '', $title)) . '.html', $response);
    sleep(1);
}
