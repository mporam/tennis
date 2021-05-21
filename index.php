<?php
function getDB()
{
    $db = new PDO('mysql:host=db;dbname=tennis', 'root', 'password');
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    return $db;
}

function getPlayers($db): array
{
    $query = $db->prepare('SELECT * FROM `players`;');
    $query->execute();
    return $query->fetchAll();
}

function drawPlayers($players)
{
    $draw = [];
    shuffle($players);
    $count = count($players)/2;
    for ($i = 0; $i < $count; $i++) {
        $draw[$i][] = array_pop($players);
        $draw[$i][] = array_pop($players);
    }
    return $draw;
}

function play(array $draw): array
{
    $winners = [];
    foreach($draw as $players) {
        $court = pickCourt();
        $weather = pickWeather();

        echo $players[0]['name'] . ' playing ' . $players[1]['name'] . ' on ' . $court . ' in ' . $weather . '<br>';

        $p1Score = $players[0][$court] * $players[0][$weather];
        $p2Score = $players[1][$court] * $players[1][$weather];


        if ($p1Score > $p2Score) {
            $winners[] = $players[0];
            echo $players[0]['name'] . ' Wins!<br><br>';
        } else { // does not account for a draw - draws mean player 2 wins lol
            $winners[] = $players[1];
            echo $players[1]['name'] . ' Wins!<br><br>';
        }
    }

    return $winners;
}

function pickCourt()
{
    $courts = ['lawn', 'clay', 'hard'];
    shuffle($courts);
    return array_pop($courts);
}

function pickWeather()
{
    $weather = ['rain', 'dry', 'snow', 'sun'];
    shuffle($weather);
    return array_pop($weather);
}

$db = getDB();
$players = getPlayers($db);

$round = 1;
while (count($players) > 1) {
    echo "Round " . $round . '<br>';
    $draw = drawPlayers($players);
    $players = play($draw);
    $round++;
    echo '<hr>';
}

echo $players[0]['name'] . ' is the grand champion!';
