<?php

function get_result($file)
{
    //parsing begins here:
    $html = file_get_contents("Results/".$file);

    $passmatch = preg_match("'<span style=\"background-color: green; border: solid green; padding-right: 1em; padding-left: 1em\">(.*?)</span>'si", $html, $match);
    $failmatch = preg_match("'<span style=\"background-color: red; border: solid green; padding-right: 1em; padding-left: 1em\">(.*?)</span>'si", $html, $match);

    if ($passmatch == "1") {
        return $match[1];
    }
    if ($failmatch == "1") {
        return $match[1];
    }
}

function file_get_contents_curl($url)
{
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);

    $data = curl_exec($ch);
    if ($data === false) {
        echo 'Curl error: ' . curl_error($ch);
    } else {
        curl_close($ch);

        return $data;
    }
}

function get_title($html)
{
    //parsing begins here:
    $doc = new DOMDocument();
    @$doc->loadHTML($html);
    $nodes = $doc->getElementsByTagName('title');

    //get and display what you need:
    $title = $nodes->item(0)->nodeValue;

    $cleantitle = substr($title, 0, strpos($title, "|")-1);
    return $cleantitle;
}
