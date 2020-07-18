<?php
require_once (dirname(__DIR__).'/vendor/autoload.php');
$snapGame = new \App\Models\Games\SnapCardGame('SnapCardDeck');

$playerList = [
    'Tom',
    'Richard',
    'Harry',
];

foreach ($playerList as $player) {
    try {
        $snapGame->addPlayer($player);
    } catch (Exception $exception) {
        echo $exception->getMessage();
        break;
    }
}

$snapGame->dealHand();

while ($snapGame->gameEnded() === false) {
    $snapGame->playHand();
}

$winner = $snapGame->getWinner();
echo "=================\n";
$totalCards = count($winner->hand);
echo "{$winner->name} WINS with {$totalCards} cards!\n";