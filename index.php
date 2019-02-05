<?

$dir = "Results/";
$files = scandir($dir);

function get_result($file)
{
    //parsing begins here:
    $html = file_get_contents("Results/".$file);

    $passmatch = preg_match("'<span style=\"background-color: green; border: solid green; padding-right: 1em; padding-left: 1em\">(.*?)</span>'si", $html, $match);
    $failmatch = preg_match("'<span style=\"background-color: red; border: solid green; padding-right: 1em; padding-left: 1em\">(.*?)</span>'si", $html, $match);

    if($passmatch == "1") {
        return $match[1];
    }
    if($failmatch == "1") {
        return $match[1];
    }
}

foreach ($files as $file) {
    if (($file == ".")||($file == "..")||($file == ".html")||($file==".DS_Store")||($file==".place")) {
        //Do Nothing
    } else {
        echo "<a href='".$dir.$file."''>".$file."</a> ".get_result($file)."</br>";
    }
}
