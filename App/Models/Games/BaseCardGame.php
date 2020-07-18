<?php
/**
 * Created by PhpStorm.
 * User: tblai
 * Date: 18/07/2020
 * Time: 14:17
 */

namespace App\Models\Games;


use App\Models\Player;

abstract class BaseCardGame
{
    // @TODO: I really want to use 7.4 type declarations here, but only have 7.1 installed locally! ARRGH.
    public $cardDeck;
    public $gameDeck;
    public $handSize;
    public $playerCount;
    public $players = [];
    public $gameEnded = false;
    public $winner = null;

    abstract function playHand();

    abstract function gameEnded();

    abstract function getWinner();

    /**
     * BaseCardGame constructor.
     * @param string $cardDeck classname of cards to implement.
     */
    public function __construct($cardDeck)
    {
        $this->cardDeck = "\\App\\Models\\Cards\\$cardDeck";
        try {
            $this->resetDeck();
        } catch (\Exception $exception) {
            // @TODO: Send error to handler (e.g. bugsnag/sentry/kibana)
            // Log::error($exception);
            echo $exception->getMessage();
        }
    }

    /**
     * Add a player to the game
     * @param string $name
     * @throws \Exception
     */
    public function addPlayer($name)
    {
        if (count($this->players) < $this->playerCount) {
            $this->players[] = new Player($name);
        } else {
            throw new \Exception('Too many players', 500);
        }
    }

    /**
     * Hand out cards to players.
     */
    public function dealHand()
    {
        $handSizeCount = 0;
        while ($this->gameDeck->cardCount() > 0 && $handSizeCount < $this->handSize) {
            $handSizeCount++;
            foreach ($this->players as $player) {
                $card = $this->gameDeck->dealCard();
                if (isset($card)) {
                    $player->acceptCard($card);
                }
            }
        }
    }


    private function resetDeck()
    {
        if (class_exists($this->cardDeck)) {
            $this->gameDeck = new $this->cardDeck();
        } else {
            throw new \Exception("Card deck $this->cardDeck does not exist.", 500);
        }
    }

}