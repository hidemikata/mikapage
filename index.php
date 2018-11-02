<html>
<body><br/><br/><br/><br/><br/>
<form action='' method='POST'>
text<input name='text' type='text'>
url<input name='url' type='text'><br/>
<input type='submit' value='OKOKOKOKO'>
<input type='reset'>
</form>
</body>
</html>


<?php
ini_set('display_errors','1');

require 'vendor/autoload.php';
use GuzzleHttp\Promise;
use GuzzleHttp\Pool;
use GuzzleHttp\Clinet;


$serchurl = 'https://www.yahoo.co.jp';
if($_SERVER['REQUEST_METHOD'] === 'POST'){
	$texttext = $_POST['text'];
	$urlurl = $_POST['url'];
	if ($urlurl != '') {
		$serchurl = $urlurl;
	}else if ($texttext != '') {
		$serchurl = 'https://www.google.co.jp/search?q='.$texttext;
	} else {
	}
}
echo $serchurl;


$client = new \GuzzleHttp\Client(
 [
 'cookies' => true,
 'base_uri' => $serchurl,
 'headers' => [
 'User-Agent' => 'Mozilla/5.0 (Windows NT 6.1; rv:38.0) Gecko/20100101 Firefox/38.0',
 ]
 ]
);


$response = $client->request('GET', $serchurl);
$crawler = new Symfony\Component\DomCrawler\Crawler((string)$response->getBody());

echo ($crawler->html());
