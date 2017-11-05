<?php

include_once("classes.php");

// Connect to database
$pdo = new PDO('mysql:host=127.0.0.1;dbname=db_oblig5;charset=utf8mb4', 'root', 'root');

// Loading xml
$xml = simplexml_load_file('SkierLogs.xml');

// Parsing xml
$cities = parseCities($xml);
$clubs = parseClubs($xml);
$seasons = parseSeasons($xml);

echo '<pre>';
print_r($seasons);


//------------------------------------------------------------------------------
function parseCities($xml) {
  $data = $xml->xpath(
    '//SkierLogs/Clubs/Club'
  );

  $temp = [];
  foreach($data as $city) {
    array_push($temp, new City($city));
  }

  return $temp;
}

//------------------------------------------------------------------------------
function parseClubs($xml) {
  $data = $xml->xpath(
    '//SkierLogs/Clubs/Club'
  );

  $temp = [];
  foreach($data as $club) {
    array_push($temp, new Club($club));
  }

  return $temp;
}

//------------------------------------------------------------------------------
function parseSeasons($xml) {
  $data = $xml->xpath(
    '//SkierLogs/Season'
  );

  $temp = [];
  foreach($data as $season) {
    array_push($temp, new Season($season));
  }

  return $temp;
}
