<?php

$dir = "Results/";
$files = scandir($dir);

include('inc/functions.php');

foreach ($files as $file) {
    if (($file == ".")||($file == "..")||($file == ".html")||($file==".DS_Store")||($file==".place")) {
        //Do Nothing
    } else {
        echo "<a href='".$dir.$file."''>".$file."</a> ".get_result($file)."</br>";
    }
}
