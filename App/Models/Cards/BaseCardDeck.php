<?php
/**
 * Created by PhpStorm.
 * User: tblai
 * Date: 18/07/2020
 * Time: 14:25
 */

namespace App\Models\Cards;


abstract class BaseCardDeck
{
    public $discards = [];
    public $cards = [
        [
            'number' => 'Ace',
            'suite' => 'Hearts'
        ],
        [
            'number' => 'Two',
            'suite' => 'Hearts'
        ],
        [
            'number' => 'Three',
            'suite' => 'Hearts'
        ],
        [
            'number' => 'Four',
            'suite' => 'Hearts'
        ],
        [
            'number' => 'Five',
            'suite' => 'Hearts'
        ],
        [
            'number' => 'Six',
            'suite' => 'Hearts'
        ],
        [
            'number' => 'Seven',
            'suite' => 'Hearts'
        ],
        [
            'number' => 'Eight',
            'suite' => 'Hearts'
        ],
        [
            'number' => 'Nine',
            'suite' => 'Hearts'
        ],
        [
            'number' => 'Ten',
            'suite' => 'Hearts'
        ],
        [
            'number' => 'Jack',
            'suite' => 'Hearts'
        ],
        [
            'number' => 'Queen',
            'suite' => 'Hearts'
        ],
        [
            'number' => 'King',
            'suite' => 'Hearts'
        ],
        [
            'number' => 'Ace',
            'suite' => 'Diamonds'
        ],
        [
            'number' => 'Two',
            'suite' => 'Diamonds'
        ],
        [
            'number' => 'Three',
            'suite' => 'Diamonds'
        ],
        [
            'number' => 'Four',
            'suite' => 'Diamonds'
        ],
        [
            'number' => 'Five',
            'suite' => 'Diamonds'
        ],
        [
            'number' => 'Six',
            'suite' => 'Diamonds'
        ],
        [
            'number' => 'Seven',
            'suite' => 'Diamonds'
        ],
        [
            'number' => 'Eight',
            'suite' => 'Diamonds'
        ],
        [
            'number' => 'Nine',
            'suite' => 'Diamonds'
        ],
        [
            'number' => 'Ten',
            'suite' => 'Diamonds'
        ],
        [
            'number' => 'Jack',
            'suite' => 'Diamonds'
        ],
        [
            'number' => 'Queen',
            'suite' => 'Diamonds'
        ],
        [
            'number' => 'King',
            'suite' => 'Diamonds'
        ],
        [
            'number' => 'Ace',
            'suite' => 'Spades'
        ],
        [
            'number' => 'Two',
            'suite' => 'Spades'
        ],
        [
            'number' => 'Three',
            'suite' => 'Spades'
        ],
        [
            'number' => 'Four',
            'suite' => 'Spades'
        ],
        [
            'number' => 'Five',
            'suite' => 'Spades'
        ],
        [
            'number' => 'Six',
            'suite' => 'Spades'
        ],
        [
            'number' => 'Seven',
            'suite' => 'Spades'
        ],
        [
            'number' => 'Eight',
            'suite' => 'Spades'
        ],
        [
            'number' => 'Nine',
            'suite' => 'Spades'
        ],
        [
            'number' => 'Ten',
            'suite' => 'Spades'
        ],
        [
            'number' => 'Jack',
            'suite' => 'Spades'
        ],
        [
            'number' => 'Queen',
            'suite' => 'Spades'
        ],
        [
            'number' => 'King',
            'suite' => 'Spades'
        ],
        [
            'number' => 'Ace',
            'suite' => 'Clubs'
        ],
        [
            'number' => 'Two',
            'suite' => 'Clubs'
        ],
        [
            'number' => 'Three',
            'suite' => 'Clubs'
        ],
        [
            'number' => 'Four',
            'suite' => 'Clubs'
        ],
        [
            'number' => 'Five',
            'suite' => 'Clubs'
        ],
        [
            'number' => 'Six',
            'suite' => 'Clubs'
        ],
        [
            'number' => 'Seven',
            'suite' => 'Clubs'
        ],
        [
            'number' => 'Eight',
            'suite' => 'Clubs'
        ],
        [
            'number' => 'Nine',
            'suite' => 'Clubs'
        ],
        [
            'number' => 'Ten',
            'suite' => 'Clubs'
        ],
        [
            'number' => 'Jack',
            'suite' => 'Clubs'
        ],
        [
            'number' => 'Queen',
            'suite' => 'Clubs'
        ],
        [
            'number' => 'King',
            'suite' => 'Clubs'
        ],
    ];


    public function __construct()
    {
        shuffle($this->cards);
    }

    public function cardCount() {
        return count($this->cards);
    }

    public function dealCard()
    {
        return array_shift($this->cards);
    }

    public function discard($card) {
        array_unshift($this->discards, $card);
    }

    public function getDiscards() {
        $discardPile = $this->discards;
        $this->discards = [];

        return $discardPile;
    }

    public function cardAbility()
    {
        // A standard deck of cards has no abilities to apply on playing a card, extend this class and override this
        // function as needed.
        return;
    }
}