<?php

$userInput = readline('Input a city name: ');

$urlContents = file_get_contents("http://api.openweathermap.org/data/2.5/weather?q=" . urlencode($userInput) . "&appid=bd0768c2551cfbd4d8cd1a531d601c55");
$weatherArray = json_decode($urlContents, true);

if ($weatherArray['cod'] == 200) {
  echo "The weather in " . $userInput . " is currently '" . $weatherArray['weather'][0]['description'] . "'. ";
  $tempInCelsius = intval($weatherArray['main']['temp'] - 273);
  echo " The temperature is " . $tempInCelsius . "degC and the wind speed is " . $weatherArray['wind']['speed'] . "m/s.";
} else {
  $error = "Could not find city - please try again.";
}


