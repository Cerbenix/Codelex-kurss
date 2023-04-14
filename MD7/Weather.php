<?php declare(strict_types=1);


require_once 'vendor/autoload.php';

$client = new GuzzleHttp\Client();

$base_uri = 'http://api.openweathermap.org/data/2.5/weather';

$userInput = readline('Input the city name: ');

$params = [
  'q' => $userInput,
  'appid' => 'bd0768c2551cfbd4d8cd1a531d601c55',
  'units' => 'metric'
];

$response = $client->request('GET', $base_uri, ['query' => $params]);

$body = $response->getBody()->getContents();

$data = json_decode($body);

/*
if ($data->cod === '404') {
  echo 'Sorry, the city was not found.';
  exit;
}
*/
$temperature = $data->main->temp;

echo "The temperature in $userInput is " . $temperature . ' degrees Celsius.';


