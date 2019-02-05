<?
require_once('vendor/autoload.php');

$climate = new League\CLImate\CLImate;

$var_api_uri = "https://achecker.ca/checkacc.php";
$var_id = "750edf1787d35fc7299b6464a14855959bccb7d8";
$var_uri_file = 'uris.csv';

// Open the file
$fp = @fopen($var_uri_file, 'r');

// Add each line to an array
if ($fp) {
    $array = explode("\n", file_get_contents($var_uri_file));
}

function file_get_contents_curl($url)
{
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);

    $data = curl_exec($ch);
    if ($data === false)
    {
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

foreach ($array as $uri) {
    $uri=trim($uri);
    //echo $uri . PHP_EOL;
    print_r($var_api_uri . "?uri=" . $uri . "&id=" . $var_id . PHP_EOL);
    $html = file_get_contents_curl($uri);
    $title =  get_title($html) . PHP_EOL;
    $response = file_get_contents($var_api_uri . "?uri=" . $uri . "&id=" . $var_id);
    $put = file_put_contents("Results/". trim(mb_ereg_replace("([^\w\s\d\-_~,;\[\]\(\).])", '', $title)) . '.html', $response);
    sleep(1);
}


//
// $response = file_get_contents($var_api_uri . "?uri=" . $uri . "&id=" . $var_id);
// $put = file_put_contents('test.html', $response);
