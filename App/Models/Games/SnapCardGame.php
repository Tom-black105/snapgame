<?php
/**
 * Created by PhpStorm.
 * User: tblai
 * Date: 18/07/2020
 * Time: 14:17
 */

namespace App\Models\Games;


use App\Models\Cards\BaseCardDeck;
use App\Models\Player;

class SnapCardGame extends BaseCardGame
{
    public $handSize = 52;
    public $playerCount = 52;
    public $ended = false;

    /**
     * BaseCardGame constructor.
     * @param string $cardDeck classname of cards to implement.
     */
    public function __construct($cardDeck)
    {
        parent::__construct($cardDeck);
    }

    public function playHand()
    {
        foreach ($this->players as $player) {
            $card = array_shift($player->hand);
            echo "{$player->name} Plays the {$card['number']} of {$card['suite']}\n";
            if (count($this->gameDeck->discards) > 0) {
                $previousCard = reset($this->gameDeck->discards);
                if ($card['number'] == $previousCard['number']) {
                    echo "$player->name says 'SNAP!'\n";
                    sleep(1);
                    $discardPile = $this->gameDeck->getDiscards();
                    foreach ($discardPile as $discard) {
                        $player->acceptCard($discard);
                    }
                }
            }
            $this->gameDeck->discard($card);

            if (count($player->hand) == 0) {
                $this->ended = true;
                break;
            }
        }

    }

    public function gameEnded()
    {
        return $this->ended;
    }

    public function getWinner()
    {
        $winningCardCount = 0;
        $winner = null;
        foreach ($this->players as $player) {
            $count = count($player->hand);
            echo "$player->name, $count\n";
            if(count($player->hand) > $winningCardCount) {
                $winningCardCount = count($player->hand);
                $winner = $player;
            }
        }
        echo count($this->gameDeck->discards)." in the discard pile\n";

        return $winner;
    }
}